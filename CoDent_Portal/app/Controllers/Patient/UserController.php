<?php

namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index(): string
    {

        $usermodel = new UserModel;
        $userId = session()->get('user_id');
          
        $userData = $usermodel->find($userId);

        if (!$userData) {
            return 'User not found';
        }


        return view('user_view\user_profile',['user' => $userData]);
    }
    public function update_profile() 
{
    $usermodel = new UserModel;

    $userId = $this->request->getPost('id');
    $fullname = $this->request->getPost('fullname');
    $address = $this->request->getPost('address');
    $date_of_birth = $this->request->getPost('date_of_birth');
    $phone = $this->request->getPost('phone');
    $email = $this->request->getPost('email');
    $image = $this->request->getFile('new_image');



    $validationRules = [
        'id' => 'required|integer', // Adjust validation rules as needed
        'fullname' => 'required',
        'address' => 'required',
        'date_of_birth' => 'required|valid_date',
        'phone' => 'required',
        'email' => 'required|valid_email',
    ];
    $validationMessages = [
        'id' => [
            'required' => 'The ID field is required.',
            'integer' => 'The ID must be an integer.',
        ],
        'fullname' => 'The Full Name field is required.',
        'address' => 'The Address field is required.',
        'date_of_birth' => [
            'required' => 'The Date of Birth field is required.',
            'valid_date' => 'Please enter a valid date for Date of Birth.',
        ],
        'phone' => 'The Phone field is required.',
        'email' => [
            'required' => 'The Email field is required.',
            'valid_email' => 'Please enter a valid email address.',
        ],
    ];

    
if (!$this->validate($validationRules, $validationMessages)) {
    // If validation fails, return validation errors
    return $this->response->setJSON(['errors' => $this->validator->getErrors()]);
}

    // If validation passes, update the user data
    $userData = [
        'fullname' => $fullname,
        'address' => $address,
        'date_of_birth' => $date_of_birth,
        'phone' => $phone,
        'email' => $email,
    ];
    if ($image && $image->isValid() && !$image->hasMoved()) {
    $newImageName = $image->getName();
    $image->move(ROOTPATH . 'public/uploads', $newImageName);

    // Save the new image name to the user data
    $userData['profile'] = $newImageName;
}

    $updated = $usermodel->update($userId, $userData);

    if ($updated) {
        // Return success message
        return $this->response->setJSON(['message' => 'User profile updated successfully']);
    } else {
        // Return error message
        return $this->response->setJSON(['error' => 'Failed to update user profile']);
    }
     
}

public function update_password()  
{
    // Load the UserModel
    $usermodel = new UserModel;

    $userId  = $this->request->getPost('id');

    $current_password  = $this->request->getPost('currentPassword');
    $newPassword  = $this->request->getPost('newPassword');
    $renewPassword  = $this->request->getPost('renewPassword');

    if ($newPassword ==! $renewPassword ) 
    {
        return "New password and re-entered password do not match ";
    }
    else 
    {
         $is_current_password_valid = $usermodel->verify_password($userId, $current_password);

         if (!$is_current_password_valid) 
         {
           return "Current password is incorrect" ;
         }
         else 
         {

            $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
            $updated = $usermodel->update($userId, $hashed_password);

            if ($updated) 
            {
                // Password updated successfully
                return'Password updated successfully.';
            } 
            else 
            {
                // Failed to update password
                return  'Failed to update password.';
            }

            
         } 
        
    } 
   
}
}