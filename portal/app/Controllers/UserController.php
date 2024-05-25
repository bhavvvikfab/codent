<?php

namespace App\Controllers;

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

        $userData = $userModel->where('email', $email)->first();

        if (!$userData) {
            return 'User not found';
        }
        return view('user_profile.php', ['user' => $userData]);
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

        $userData = [
            'fullname' => $fullname,
            'address' => $address,
            'date_of_birth' => $date_of_birth,
            'phone' => $phone,
            'email' => $email,
        ];


        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = time() . '.' . $image->getExtension();
            $image->move(ROOTPATH . 'public/images', $newName);

            $userData['profile'] = $newName;
            session()->set([
                'profile' => $newName,
            ]);
        }
        $updated = $usermodel->update($userId, $userData);

        if ($updated) {

            session()->set([
                'email' => $email,
                'fullname' => $fullname,
                'dob' => $date_of_birth,
            ]);
            // Return success message
            return $this->response->setJSON(['message' => 'User profile updated successfully']);
        } else {
            // Return error message
            return $this->response->setJSON(['error' => 'Failed to update user profile']);
        }

    }

    public function change_password()
    {



        $validationRules = [
            'currentPassword' => 'required',
            'newpassword' => 'required|min_length[5]',
            // 'confirm_Password' => 'required|matches[newpassword]'
        ];

        $validation = Services::validation();
        $validation->setRules($validationRules);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON(['status' => 'error', 'errors' => $validation->getErrors()]);
        }

        $user = new UserModel();
        // $id = session('id');
    $userId = $this->request->getPost('ids');

        $oldPassword = $this->request->getPost('currentPassword');

        $newPassword = $this->request->getPost('newpassword');

        $result = $user->updatePassword($userId, $oldPassword, $newPassword);

        if ($result === true) {
            return $this->response->setJSON(['status' => 'success']);
        } elseif ($result === 'error') {
            return $this->response->setJSON(['status' => 'error', 'errors' => ['Incorrect old password']]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'errors' => ['Failed to update password']]);
        }
    }







}