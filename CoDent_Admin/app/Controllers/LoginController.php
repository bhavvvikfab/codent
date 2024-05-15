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
            // Check user role before allowing login
            if ($user['role'] == '1') {
                // Set user details in session
                session()->set([
                    'id'=> $user['id'],
                    'user_role' => $user['role'],
                    'email' => $user['email'],
                    'fullname' => $user['fullname'],
                    'profile' => $user['profile'],
                    'logged_in' => true,
                ]);
                // Redirect to admin dashboard
                return redirect()->to('/dashboard');
            } else {
                // User does not have admin role
                return redirect()->to('/')->with('error', 'You do not have permission to log in.');
            }
        } else {
            // User details not found
            return redirect()->to('/')->with('error', 'User details not found.');
        }
    } else {
        // Invalid credentials
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


    public function getUserDetailsFromDatabase($email)
    {
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            return [
                'id' => $user['id'],
                'role' => $user['role'],
                'email' => $user['email'],
                'profile' => $user['profile'],
                'phone'=> $user['phone'],
                'fullname'=> $user['fullname'],
                'dob'=>$user['date_of_birth']
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
