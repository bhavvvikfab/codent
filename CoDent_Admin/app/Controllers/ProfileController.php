<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\ResponseInterface;

class ProfileController extends BaseController
{
    public function index()
    {
        $email = session()->get('email');
        $LoginController = new LoginController();
        $user = $LoginController->getUserDetailsFromDatabase($email);

        return view('profile/profile.php', ['user' => $user]);
    }

    public function editProfile()
    {
        // Load form validation library
        $validation = Services::validation();
        $id = session('id');
        // Set form validation rules with custom error messages
        $validation->setRules([
            'fullname' => 'required',
            'phone' => 'required|numeric|min_length[10]|max_length[15]',
            'email' => "required|valid_email|is_unique[users.email,id,{$id}]",
            'dob' => 'required',
        ]);
        
        // Check if the profile image is uploaded and add validation rules for it
        if ($this->request->getFile('profile')->isValid()) {
            $validation->setRules([
                'profile' => [
                    'rules' => 'uploaded[profile]|max_size[profile,1024]|is_image[profile]',
                    'errors' => [
                        'uploaded' => 'Please upload a valid profile image.',
                        'max_size' => 'The profile image file size should not exceed 1MB.',
                        'is_image' => 'The profile image must be in PNG, JPG, or JPEG format.',
                    ],
                ],
            ]);
        }
    
        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, return validation errors
            return $this->response->setJSON(['status' => 'error', 'errors' => $validation->getErrors()]);
        }
    
        // Validation passed, process the form data
        $profileImage = $this->request->getFile('profile');
        $fullName = $this->request->getPost('fullname');
        $phone = $this->request->getPost('phone');
        $email = $this->request->getPost('email');
        $dob = $this->request->getPost('dob');
    
        // Data to update
        $data = [
            'fullname' => $fullName,
            'phone' => $phone,
            'email' => $email,
            'date_of_birth' => $dob,
        ];
       

        // Check if the profile image is uploaded and valid
        if ($profileImage && $profileImage->isValid() && !$profileImage->hasMoved()) {
            $extension = $profileImage->getClientExtension();
            $newName = time() . '_' . $id . '.' . $extension;
            $profileImage->move(FCPATH . 'images', $newName);
            $data['profile_image'] = $newName; 
        }
    
        // Update user's profile
        $user = new UserModel();
        $user->editData($id, $data);
    
        return $this->response->setJSON(['status' => 'success', 'message' => 'Profile updated successfully!']);
    }

    public function change_password()
    {
        $validationRules = [
            'currentPassword' => 'required',
            'newpassword' => 'required|min_length[5]',
            'confirm_Password' => 'required|matches[newpassword]'
        ];
    
        $validation = Services::validation();
        $validation->setRules($validationRules);
    
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON(['status' => 'error', 'errors' => $validation->getErrors()]);
        }
    
        $user = new UserModel();
        $id = session('id');
        $oldPassword = $this->request->getPost('currentPassword');
    
        $newPassword = $this->request->getPost('newpassword');
        
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
