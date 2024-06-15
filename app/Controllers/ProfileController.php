<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Config\Services;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProfileController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $email = session()->get('email');

        if (!$email == '') 
        {
        // print_r($email);die;
        $data['users'] = $userModel->where('email', $email)->findAll();
    
        return view('user_profile', $data);
        }
        else 
        {
            return view('login_page');

        }
    }
    public function editProfile($id)
    {
        $userModel = new UserModel();

        $data['users'] = $userModel->where('id', $id)->findAll();

        return view('edit_view_page',$data);
       
    
        
    }
    

    public function profile_update_fun()
    {
        $userId = $this->request->getPost('id');
        
        
        // Get form data
        $data = [
            'fullname' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'date_of_birth' => $this->request->getPost('dob'),
            'address' => $this->request->getPost('address'),
        ];

        // Handle file upload
        $image = $this->request->getFile('image');

        

        if ($image && $image->isValid()) {
            $newName = time() . '.' . $image->getExtension();
            $destinationPath = ROOTPATH . 'public/images';
            $image->move($destinationPath, $newName);
            $data['profile'] = $newName;
        }

        // Update the user's profile data in the database
        $userModel = new UserModel();
        $updated = $userModel->update($userId, $data);

        if ($updated) {
            // Return success response
            return $this->response->setJSON(['status' => 'success']);
        } else {
            // Return error response if the update failed
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update profile. Please try again.']);
        }
    }

    public function change_password()
    {
        $validationRules = [
            'currentPassword' => [
                'label' => 'Current Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Current Password is required.'
                ]
            ],
            'newPassword' => [
                'label' => 'New Password',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'The New Password is required.',
                    'min_length' => 'The New Password must be at least 5 characters long.'
                ]
            ],
            'confirmPassword' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[newPassword]',
                'errors' => [
                    'required' => 'The Confirm Password is required.',
                    'matches' => 'The Confirm Password does not match the New Password field.'
                ]
            ]
        ];
        

        $validation = Services::validation();
        $validation->setRules($validationRules);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON(['status' => 'error', 'errors' => $validation->getErrors()]);
        }

        $user = new UserModel();
        $id = session('user_id');
        $oldPassword = $this->request->getPost('currentPassword');

        $newPassword = $this->request->getPost('newPassword');

        $result = $user->updatePassword($id, $oldPassword, $newPassword);

        if ($result === true) {
            return $this->response->setJSON(['status' => 'success']);
        } elseif ($result === 'error') {
            return $this->response->setJSON(['status' => 'error', 'errors' => ['Incorrect old password']]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'errors' => ['Failed to update password']]);
        }
    }


    



}
