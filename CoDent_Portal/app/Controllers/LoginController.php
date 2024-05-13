<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
   
    
    public function index(): string
    {
        return view('loginpage');
    }

    public function login()
    {
        // Get username and password from POST data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        // Authenticate user
        if ($this->authenticate($email, $password)) {
            // Get user details 
            $user = $this->getUserDetailsFromDatabase($email);
    
            if ($user) {
                // Set user details in session
                session()->set([
                    'user_id' => $user['id'],
                    'user_role' => $user['role'],
                    'logged_in' => true,
                ]);
    
                // Redirect based on role
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
            } else {
                // Debugging: Check if user details are not found
                echo "User details not found for email: " . $email;
                return redirect()->to('/')->with('error', 'User details not found.');
            }
        } else {
            // Debugging: Check if invalid credentials are detected
            echo "Invalid credentials for email: " . $email;
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


    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
























}
