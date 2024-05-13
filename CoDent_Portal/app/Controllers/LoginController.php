<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
                        'logged_in' => true,
                    ]);
                    switch ($user['role']) {
                        case '2':
                            return redirect()->to('/hospital/dashboard');
                        case '3':
                            return redirect()->to('/receptionist/dashboard');
                        case '4':
                            return redirect()->to('/specialist/dashboard');
                        case '5':
                            return redirect()->to('/practices/dashboard');
                        case '6':
                            return redirect()->to('/user/dashboard');
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
        return view('registerpage');
       
    }





    

















}
