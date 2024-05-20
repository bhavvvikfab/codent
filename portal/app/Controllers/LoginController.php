<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HospitalModel;
use App\Models\PackagesModel;
use App\Models\UserModel;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\ResponseInterface;

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

            if (!empty($user['role'])) {

                if ($user['role'] == 1) {
                    return redirect()->to('/')->with('error', 'Invalid username or password.');
                }else{
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
        $model = new UserModel;
        $data['hospitals'] = $model->getUsersByRole('2');

        $packagesModel = new PackagesModel();
        $data['packages'] = $packagesModel->getActivePackages();

        return view('registerpage.php',['data'=> $data]);
    }
    
  function register_data()
    {
        $usermodel = new UserModel();
        $hospitalmodel = new HospitalModel();
    
        $fullname = $this->request->getPost('fullname');
        $email = $this->request->getPost('email');
        $password = $this->request->getVar('password');
        $address = $this->request->getPost('address');
        $dob = $this->request->getPost('dob');
        $image = $this->request->getFile('image');
        $phone = $this->request->getPost('phone');
        $hospital = $this->request->getPost('hospital');
        $role = $this->request->getPost('role');
    
        $emailExists = $usermodel->where('email', $email)->countAllResults() > 0;
    
        if ($emailExists) {
            return $this->response->setJSON(['status' => 2]);
        } else {
            $originalName = $image->getName();
            $newName = $image->getRandomName();
            $image->move(WRITEPATH . 'public/uploads', $newName);
    
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    
            if ($role == 'hospital' || $role == 'patient') {
    
                $data = [
                    'fullname' => $fullname,
                    'email' => $email,
                    'password' => $hashpassword,
                    'address' => $address,
                    'date_of_birth' => $dob,
                    'phone' => $phone,
                    'profile' => $originalName,
                    
                ];
    
                if ($role == 'hospital') {
                    $data['role'] = 2;
                    $data['hospital_id']=0;
                    $user_id = $usermodel->insertUser($data);
    
                    $hospital_data = [
                        'name' => $fullname,
                        'hospital_id' => $user_id
                    ];
    
                    $hospital_in = $hospitalmodel->insertHospital($hospital_data);
    
                    if ($hospital_in) {
                        return $this->response->setJSON(['status' => 1,'hospital_id'=> $user_id]);
                    } else {
                        return $this->response->setJSON(['status' => 3]);
                    }
                } else {
                    $data['role'] = 6;
                    $data['hospital_id']=$hospital;
                    $user_id = $usermodel->insertUser($data);
    
                    return $this->response->setJSON(['status' => 1]);
                }
            } else {
                return $this->response->setJSON(['status' => 3]);
            }
        }
    }


    

















}
