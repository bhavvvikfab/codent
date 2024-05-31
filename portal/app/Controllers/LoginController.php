<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HospitalModel;
use App\Models\PackagesModel;
use App\Models\TransactionModel;
use App\Models\UserModel;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\ResponseInterface;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Stripe\SetupIntent;
use Stripe\Stripe;
use Stripe\Subscription;

class LoginController extends BaseController
{


    public function index(): string
    {
        return view('loginpage');
    }

    public function login()
    {

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Authenticate user
        if ($this->authenticate($email, $password)) {

            $user = $this->getUserDetailsFromDatabase($email);

            if ($user['status'] == 'active') {

                if (!empty($user['role'])) {

                    if ($user['role'] == 1) {
                        return redirect()->to('/')->with('error', 'Invalid username or password.');
                    } else {
                        session()->set([
                            'user_id' => $user['id'],
                            'user_role' => $user['role'],
                            'email' => $user['email'],
                            'fullname' => $user['fullname'],
                            'profile' => $user['profile'],
                            'logged_in' => true,
                        ]);
                        switch ($user['role']) {
                            case '2':
                                session()->set([
                                    'prefix' => 'hospital'
                                ]);
                                return redirect()->to('/hospital/dashboard');
                            case '3':
                                session()->set([
                                    'prefix' => 'receptionist'
                                ]);
                                return redirect()->to('/receptionist/dashboard');
                            case '4':
                                session()->set([
                                    'prefix' => 'specialist'
                                ]);
                                return redirect()->to('/specialist/dashboard');
                            case '5':
                                session()->set([
                                    'prefix' => 'practices'
                                ]);
                                return redirect()->to('/practices/dashboard');
                            case '6':
                                session()->set([
                                    'prefix' => 'patient'
                                ]);
                                return redirect()->to('/patient/dashboard');
                            default:
                                return redirect()->to('/');
                        }
                    }
                } else {
                    return redirect()->to('/')->with('error', 'User details not found.');
                }
            } else {
                return redirect()->to('/')->with('error', 'Your account is deactivated');
            }
        } else {
            return redirect()->to('/')->with('error', 'Invalid username or password.');

        }
    }

    private function authenticate($email, $password)
    {

        $userModel = new UserModel;
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            return true;
        } else {
            return false;
        }
    }


    private function getUserDetailsFromDatabase($email)
    {
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            return [
                'id' => $user['id'],
                'role' => $user['role'],
                'email' => $user['email'],
                'fullname' => $user['fullname'],
                'profile' => $user['profile'],
                'status' => $user['status'],
            ];
        } else {
            return null; // User not found
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function register()
    {
        // $model = new UserModel;
        // $data['hospitals'] = $model->getUsersByRole('2');

        $packagesModel = new PackagesModel();
        $data['packages'] = $packagesModel->getActivePackages();

        return view('registerpage.php', ['data' => $data]);
    }

    public function register_data()
    {
        $usermodel = new UserModel();
        $hospitalmodel = new HospitalModel();
    
        // Retrieve POST data
        $fullname = $this->request->getPost('fullname');
        $email = $this->request->getPost('email');
        $password = $this->request->getVar('password');
        $address = $this->request->getPost('address');
        $dob = $this->request->getPost('dob');
        $image = $this->request->getFile('image');
        $phone = $this->request->getPost('phone');
    
        $emailExists = $usermodel->where('email', $email)->countAllResults() > 0;
    
        if ($emailExists) {
            return $this->response->setJSON(['status' => 2]);
        } else {   
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    
            $userdata = [
                'fullname' => $fullname,
                'email' => $email,
                'password' => $hashpassword,
                'address' => $address,
                'date_of_birth' => $dob,
                'phone' => $phone,
                'role'=>2
                
            ];
            if ($image && $image->isValid()) {
                $newName = time() . '.' . $image->getExtension();
                $destinationPath = ROOTPATH . '../admin/public/images';
                $image->move($destinationPath, $newName);
                $userdata['profile'] = $newName;
            }
    
            $userid = $usermodel->insertUser($userdata);
    
            if ($userid) {
                $hospitaldata = [
                    'hospital_id' => $userid,
                    'name' => $fullname
                ];
    
                $result = $hospitalmodel->insertHospital($hospitaldata); //this function return insert id
    
                if ($result) {
                    return $this->response->setJSON(['status' => 1,'hospital_id'=>$result]);
                } else {
                    return $this->response->setJSON(['status' => 3]);
                }
            } else {
                return $this->response->setJSON(['status' => 3]);
            }
        }
    }
    
    public function subscription_payment()
    {
        $stripeSecretKey = config('App')->stripe_secret;

        $token = $this->request->getPost('stripeToken');
        $package_id = $this->request->getPost('package_id');
        $hospital_id = $this->request->getPost('hospital_id');

        
        if ($package_id && $hospital_id) {
            $package_model = new PackagesModel();
            $package = $package_model->where('id', $package_id)->first();


            $hospitalModel=new HospitalModel();
            $hospital=$hospitalModel->where('id',$hospital_id)->first();
            $userid = $hospital['hospital_id'];

            $userModel= new UserModel();
            $user=$userModel->where('id',$userid)->first();

            if (!$package) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Package not found']);
            }

            $plan_id = $package['package_id'];
            $amount = $package['price']; 

            // Initialize Stripe
            Stripe::setApiKey($stripeSecretKey);

            try {
                $customer = Customer::create([
                    'email' => $user['email'],
                    'phone'=>$user['phone'],
                    'description' => 'Customer address : ' . $user['address']

                ]);
                $paymentMethod = PaymentMethod::create([
                    'type' => 'card',
                    'card' => [
                        'token' => $token, 
                    ],
                ]);

                // Create a Payment Intent
                $paymentIntent = PaymentIntent::create([
                    'amount' => $amount * 100,
                    'currency' => 'inr',
                    'payment_method' => $paymentMethod->id,
                    'customer' => $customer->id,
                    'description' => "Payment for package ID: $package_id by hospital ID: $hospital_id",
                    'metadata' => [
                        'package_id' => $package_id,
                        'hospital_id' => $hospital_id,
                    ],
                ]);

                // $paymentIntent = SetupIntent::create([
                       
                //         'payment_method_types'=>['card'],
                //         'payment_method' => $paymentMethod->id,
                //         'customer' => $customer->id,
                //         'confirm' => true,
                //         'usage' => "off_session"
                //     ]);

            //  $subscription = Subscription::create([
            //             'customer' =>  $customer->id,
            //             'default_payment_method' => $paymentMethod->id,
            //             'items' => ['price' => $amount ],
            //  ]);
                
              $status='failed';
              if($paymentIntent->status== 'succeed'){
                $status='success';
              }
               $transactionModel=new TransactionModel;
               $data=[
                'hospital_id'=>$hospital_id,
                'amount'=> $amount,
                'status'=>$status,
                'transaction_id'=>$paymentIntent->id
               ];
                $result = $transactionModel->insert($data);

               if($result){
                   return redirect('/')->with('have_package','Your Package is activated. Now you can login...Thank You! ');
               }

            // return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid package or hospital ID']);

            } catch (\Stripe\Exception\ApiErrorException $e) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => $e->getMessage(),
                ]);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid package or hospital ID']);
        }
    }



















}
