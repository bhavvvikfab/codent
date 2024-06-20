<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ActivePlanHospital;
use App\Models\ChatModel;
use App\Models\DoctorModel;
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
use Stripe\Plan;
use Stripe\SetupIntent;
use Stripe\Stripe;
use Stripe\Subscription;

class LoginController extends BaseController
{


    public function index(): string
    {
        return view('loginpage');
    }

    public function checkEmail(){
        $email = $this->request->getVar('email');
        $userModel= new UserModel();
        $user = $userModel->where('email',$email)->first();
        if($user){
            return response()->setJSON(['status'=>1]);
        }else{
            return response()->setJSON(['status'=>0]);
        }
    }
    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        // Authenticate user
        if ($this->authenticate($email, $password)) {
            $user = $this->getUserDetailsFromDatabase($email);
           
            // Proceed with login if active plan is valid
            if ($user['status'] == 'active') {

                if (!empty($user['role'])) {

                    if ($user['role'] == 1) {
                        return $this->response->setJSON(['error' =>true,'msg'=> 'Invalid username or password.']);
                    } else {
                        session()->set([
                            'user_id' => $user['id'],
                            'user_role' => $user['role'],
                            'email' => $user['email'],
                            'fullname' => $user['fullname'],
                            'profile' => $user['profile'],
                            'logged_in' => true,
                            'hospital_id' => $user['hospital_id']
                        ]);
                        switch ($user['role']) {
                            case '2':
                                session()->set(['prefix' => 'hospital']);
                                return redirect()->to('/hospital/dashboard');
                            case '3':
                                session()->set(['prefix' => 'practices']);
                                return redirect()->to('/practices/dashboard');
                            case '4':
                                session()->set(['prefix' => 'specialist']);
                                return redirect()->to('/specialist/dashboard');
                            case '5':
                                session()->set(['prefix' => 'receptionist']);
                                return redirect()->to('/receptionist/dashboard');
                            default:
                                return redirect()->to('/');
                        }
                    }
                } else {
                    return $this->response->setJSON(['error'=>true,'msg'=> 'User details not found.']);
                }
            } else {
                return $this->response->setJSON(['error'=>true,'msg'=> 'Your account is deactivated']);
            }
        } else {
            return $this->response->setJSON(['error' =>true,'msg'=> 'Invalid username or password.']);
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


    public function getUserDetailsFromDatabase($email)
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
                'hospital_id' => $user['hospital_id']
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
                'role' => 2

            ];
            if ($image && $image->isValid()) {
                $newName = time() . '.' . $image->getExtension();
                $destinationPath = ROOTPATH . '../admin/public/images';
                $image->move($destinationPath, $newName);
                $userdata['profile'] = $newName;
            }

            $userid = $usermodel->insertUser($userdata);

            if ($userid) {
                return $this->response->setJSON(['status' => 1, 'hospital_id' => $userid]);
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

        if (!$package_id || !$hospital_id || !$token) {
            session()->setFlashdata('error', 'Invalid package, hospital ID, or token');
            return redirect()->back();
        }
        
        $package_model = new PackagesModel();
        $package = $package_model->where('id', $package_id)->first();
        
        if (!$package) {
            session()->setFlashdata('error', 'Package not found');
            return redirect()->back();
        }
        
        $userModel = new UserModel();
        $user = $userModel->where('id', $hospital_id)->first();
        
        if (!$user) {
            session()->setFlashdata('error', 'User not found');
            return redirect()->back();
        }

        $amount = $package['price'];

        // Initialize Stripe
        Stripe::setApiKey($stripeSecretKey);

        try {
            $customer = Customer::create([
                'email' => $user['email'],
                'phone' => $user['phone'],
                'name' => $user['fullname'],
                'address' => [
                    'line1' => $user['address'],
                    'country' => 'IN',
                ],
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
                'currency' => 'usd',
                'customer' => $customer->id,
                'payment_method' => $paymentMethod->id,
                'off_session' => true,
                'confirm' => true,
                'description' => "Payment for package: {$package['plan_name']} by hospital: {$user['fullname']}",
            ]);


            // Check the status of the PaymentIntent
            $status = 'failed';
            if ($paymentIntent->status == 'succeeded') {
                $status = 'success';
            }

            // Insert the transaction into the database
            $transactionModel = new TransactionModel();
            $activePlanModel = new ActivePlanHospital();

            $starting_date = date('Y-m-d');
            $duration = !empty($package['duration']) ? intval($package['duration']) : 0;
            $endDate = date('Y-m-d', strtotime($starting_date . ' + ' . $duration . ' days'));

            $plan = [
                'hospital_id' => $hospital_id,
                'package_id' => $package_id,
                'starting_date' => $starting_date,
                'ending_date' => $endDate,
            ];

            $active_plan = $activePlanModel->insert($plan);

            $data = [
                'hospital_id' => $hospital_id,
                'amount' => $amount,
                'status' => $status,
                'transaction_id' => $paymentIntent->id
            ];
            $result = $transactionModel->insert($data);

            $set_plan = $userModel->where('id', $hospital_id)
                                   ->set('package_status','active')
                                   ->update();        

            if ($result && $status == 'success' && $active_plan && $set_plan) {
                session()->set('have_package', 'Your Package is activated. Thank you!');
                return redirect('/');
            }

        } catch (\Stripe\Exception\ApiErrorException $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'An unexpected error occurred']);
    }






















    // Forgot Password - Send Email
    public function forgot_password()
    {
        return view('password_recovery.php');
    }

    public function forgotPassword()
    {
        $userEmail = $this->request->getPost('email');

        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $userModel = new UserModel();
        $checkUser = $userModel->where('email', $userEmail)->first();

        if ($checkUser) {
            $key = substr(str_shuffle($str_result), 0, 56);
            $setKey = $userModel->where('email', $userEmail)->set('forgot_password_key', $key)->update();

            $subject = 'Forgot Password';
            $message = '<!doctype html>
                     <html lang="en-US">
                     <head>
                         <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                         <meta name="description" content="Reset Password Email Template.">
                         <style type="text/css">
                             a:hover {text-decoration: underline !important;}
                         </style>
                     </head>
                     <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
                         <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
                             style="font-family: \'Open Sans\', sans-serif;">
                             <tr>
                                 <td>
                                     <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                         <tr>
                                             <td style="height:80px;">&nbsp;</td>
                                         </tr>
                                         <tr>
                                             <td style="text-align:center;"></td>
                                         </tr>
                                         <tr>
                                             <td style="height:20px;">&nbsp;</td>
                                         </tr>
                                         <tr>
                                             <td>
                                                 <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                                     style="max-width:670px;background:#fff; border-radius:3px; text-align:center;box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                                     <tr>
                                                         <td style="height:40px;">&nbsp;</td>
                                                     </tr>
                                                     <tr>
                                                         <td style="padding:0 35px">
                                                             <h1>Forgot Password</h1>
                                                             <span style="display:inline-block;vertical-align:middle;margin:29px 0 26px;border-bottom:1px solid #cecece;width: 260px;"></span>
                                                             <br>
                                                             <i>Follow the below link to reset password:</i>
                                                             <br>
                                                             <a href="' . base_url() . '/confirmforgotPassword/' . $checkUser['id'] . '/' . $key . '" style="background: #357f8347;text-decoration:none!important;font-weight:500;margin-top: 18px;color: #2a2727;text-transform:uppercase;font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px" target="_blank">Confirm Reset</a>
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <td style="height:40px;">&nbsp;</td>
                                                     </tr>
                                                 </table>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td style="height:20px;">&nbsp;</td>
                                         </tr>
                                         <tr>
                                             <td style="height:80px;">&nbsp;</td>
                                         </tr>
                                     </table>
                                 </td>
                             </tr>
                         </table>
                     </body>
                     </html>';

            $email_dt = Services::email();

            $email_dt->setTo($userEmail);
            $email_dt->setfrom('smtp@fableadtechnolabs.com', 'fableadtechnolabs-com');



            $email_dt->setSubject($subject);
            $email_dt->setMessage($message);

            if ($email_dt->send()) {
                return redirect('forgot_password')->with('email', 'We have sent email for password recovery.');
            } else {

                return redirect('forgot_password')->with('email', 'Something went wrong..!!');
            }


        } else {
            return redirect('forgot_password')->with('email', 'User not found..!!');
        }

        return redirect('forgot_password')->with('email', 'Something went wrong..!!');
    }

    public function confirmforgotPassword($userID, $key)
    {
        $baseUrl = base_url();
        $url = 'http://' . $_SERVER['HTTP_HOST'];
        $redirectUrl = base_url() . 'forget_pass.php?url=' . $baseUrl . '&userID=' . $userID . '&key=' . $key;
        return redirect()->to($redirectUrl);

    }


    public function resetPassword()
    {
        $userId = $this->request->getPost('user_id');
        $key = $this->request->getPost('key');
        $password = $this->request->getPost('new_password');
        $confirm_password = $this->request->getPost('confirm_password');

        $updatedeData = [
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        $usermodel = new UserModel();
        $updatePassword = $usermodel->update($userId, $updatedeData);
        if ($updatePassword) {
            echo 1;
            // return redirect('/')->with('password_changed','Your password updated successfully.');
        } else {
            echo 2;
        }

    }
    // END Forgot Password - 




















}
