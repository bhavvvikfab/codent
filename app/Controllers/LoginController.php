<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\HospitalModel;


use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    public function index()
    {
        $id = session()->get('user_id');
        if (empty($id)) 
        {
            return view('login_page');
        }   
    
        // Add your logic for logged-in users here
        return redirect()->to('profile'); // Example of a different page for logged-in users
    }
    
    public function login_fun()
    {

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Authenticate user
        if ($this->authenticate($email, $password)) {

            $user = $this->getUserDetailsFromDatabase($email);

            if ($user['status'] == 'active') {

                if (!empty($user['role'])) {

                    if ($user['role'] == 1) {
                        return redirect()->to('dentist_login')->with('error', 'Invalid username or password.');
                    } else {
                        session()->set([
                            'user_id' => $user['id'],
                            'user_role' => $user['role'],
                            'email' => $user['email'],
                            'fullname' => $user['fullname'],
                            'profile' => $user['profile'],
                            'logged_in' => true,
                            'hospital_id'=>$user['hospital_id']
                        ]);
                        switch ($user['role']) {
                            case '2':
                                session()->set([
                                    'prefix' => 'hospital'
                                ]);
                                return redirect()->to('profile');

                                // return redirect()->to('/hospital/dashboard');
                            case '3':
                                session()->set([
                                    'prefix' => 'practices'
                                ]);
                                return redirect()->to('/practices/dashboard');
                            case '4':
                                session()->set([
                                    'prefix' => 'specialist'
                                ]);
                                return redirect()->to('/specialist/dashboard');
                            case '5':
                                session()->set([
                                    'prefix' => 'receptionist'
                                ]);
                                return redirect()->to('/receptionist/dashboard');
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
                    return redirect()->to('dentist_login')->with('error', 'User details not found.');
                }
            } else {
                return redirect()->to('dentist_login')->with('error', 'Your account is deactivated');
            }
        } else {
            return redirect()->to('dentist_login')->with('error', 'Invalid username or password.');

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
                'hospital_id'=>$user['hospital_id']
            ];
        } else {
            return null; // User not found
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('dentist_login');
    }


 public function dashboard_fun() 
 {
    return view('dashboard');
    
}




    public function register_view() 
    {    
        return view('register_page');
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
        // $hospital = $this->request->getPost('hospital');

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
                'role' => 2,
                // 'hospital_id'=>$hospital

            ];

            // print_r($userdata);die;
            if ($image && $image->isValid()) {
                $newName = time() . '.' . $image->getExtension();
                $destinationPath = ROOTPATH . 'public/images';
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
                    // return "successs";
                    return $this->response->setJSON(['status' => 1]);
                } else {
                        //   return 'failed';
                    return $this->response->setJSON(['status' => 3]);
                }
            } else {
                // return 'failed';
                return $this->response->setJSON(['status' => 3]);
            }
        }
    }

   

       
   
        

    public function dentist_portal_view() 
    {
        return view('dentist_portal_page');
    }


    
}
