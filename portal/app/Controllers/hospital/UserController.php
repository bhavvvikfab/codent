<?php

namespace App\Controllers\hospital;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
{
    $userModel = new UserModel();
    $email = session()->get('email');

    // Retrieve user data based on email
    $userData = $userModel->where('email', $email)->first();

    if (!$userData) {
        // User not found, handle the error (e.g., redirect or return an error message)
        return 'User not found';
    }

    // User data found, load the view with the user's data
    return view('hospital/user_profile', ['user' => $userData]);
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



    // $validationRules = [
    //     'id' => 'required|integer', // Adjust validation rules as needed
    //     'fullname' => 'required',
    //     'address' => 'required',
    //     'date_of_birth' => 'required|valid_date',
    //     'phone' => 'required',
    //     'email' => 'required|valid_email',
    // ];
    // $validationMessages = [
    //     'id' => [
    //         'required' => 'The ID field is required.',
    //         'integer' => 'The ID must be an integer.',
    //     ],
    //     'fullname' => 'The Full Name field is required.',
    //     'address' => 'The Address field is required.',
    //     'date_of_birth' => [
    //         'required' => 'The Date of Birth field is required.',
    //         'valid_date' => 'Please enter a valid date for Date of Birth.',
    //     ],
    //     'phone' => 'The Phone field is required.',
    //     'email' => [
    //         'required' => 'The Email field is required.',
    //         'valid_email' => 'Please enter a valid email address.',
    //     ],
    // ];

    
// if (!$this->validate($validationRules, $validationMessages)) {
//     // If validation fails, return validation errors
//     return $this->response->setJSON(['errors' => $this->validator->getErrors()]);
// }

    // If validation passes, update the user data
    $userData = [
        'fullname' => $fullname,
        'address' => $address,
        'date_of_birth' => $date_of_birth,
        'phone' => $phone,
        'email' => $email,
    ];
    if ($image && $image->isValid() && !$image->hasMoved()) {
    $newImageName = $image->getRandomName();
    $image->move(ROOTPATH . 'public/images', $newImageName);

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

public function change_password()
    {
        

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