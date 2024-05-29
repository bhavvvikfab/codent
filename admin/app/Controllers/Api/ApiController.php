<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\HospitalsModel;
use App\Models\UserModel;
use App\Models\DoctorModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use \Firebase\JWT\JWT;

class ApiController extends BaseController
{
    use ResponseTrait;

    //user register function
    public function userRegister()
    {
        try {
            $fullname = $this->request->getPost('fullname');
            $email = $this->request->getPost('email');
            $password = $this->request->getVar('password');
            $address = $this->request->getPost('address');
            $dob = $this->request->getPost('dob');
            $image = $this->request->getFile('image');
            $phone = $this->request->getPost('phone');

            // Validation rules
            $rules = [
                'fullname' => ['rules' => 'required|min_length[3]|max_length[255]'],
                'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]'],
                'password' => ['rules' => 'required|min_length[5]|max_length[255]'],
                'address' => ['rules' => 'required|min_length[4]|max_length[255]'],
                'dob' => ['rules' => 'required|valid_date'],
                'phone' => ['rules' => 'required|min_length[10]|max_length[15]'],
                'image' => ['rules' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]']
            ];

            // Validate input
            if ($this->validate($rules)) {
                // Process image upload if available
                $newName = null;
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = time() . '.' . $image->getExtension();
                    $image->move(WRITEPATH . 'Api-images', $newName);
                }

                // Prepare user data
                $model = new UserModel();
                $data = [
                    'fullname' => $fullname,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'address' => $address,
                    'date_of_birth' => $dob,
                    'phone' => $phone,
                    'role' => 6,
                    'profile' => $newName
                ];

                $model->save($data);

                return $this->respond(['status' => 200, 'message' => 'Registered Successfully'],200);
            } else {
                $messageErr = '';
                foreach($this->validator->getErrors() as $key=>$messages){
                    $messageErr .= $messages;
                }
                $response = [
                    'status' => 409,
                    'message'=> $messageErr,
                ];
               
                return $this->respond($response,409);
            }
        } catch (\Exception $e) {
            $error = array($e->getmessage());
            $errormsg = json_encode($error);
            echo $errormsg;
        }
    }

    //user login function
    public function login()
    {
        try {
            $userModel = new UserModel();

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $user = $userModel->where('email', $email)->first();

            if (is_null($user)) {
                return $this->respond([
                     'status' => 409,
                     'message' => 'User not found',
                     'token'=> null,
                     'role'=>null
                     ],409);
                   
            }

            $pwd_verify = password_verify($password, $user['password']);

            if (!$pwd_verify) {
                return $this->respond([
                'status' => 409,
                'message' => 'Invalid email or password',
                'token'=> null,
                'role'=>null
                ],409);
            }

            $key = getenv('JWT_SECRET');
            $iat = time(); // current timestamp value
            $exp = $iat + 3600;

            $payload = array(
                "iss" => "Issuer of the JWT",
                "aud" => "Audience that the JWT",
                "sub" => "Subject of the JWT",
                "iat" => $iat, //Time the JWT issued at
                "exp" => $exp, // Expiration time of token
                "email" => $user['email'],
            );

            $token = JWT::encode($payload, $key, 'HS256');

            $response = [
                'status' => 200,
                'message' => 'Login Succesful',
                'token' => $token,
                'role'=>$user['role']
            ];

            return $this->respond($response, 200);
        } catch (\Exception $e) {
            $error = array($e->getmessage());
            $errormsg = json_encode($error);
            echo $errormsg;
        }
    }



    //get all patient function
    public function patients()
    {
        try {
            $users = new UserModel();

            $result = $users->where('role', 6)->findAll();

            if (empty($result)) {
                return $this->respond(['message' => 'No patient found','patients'=> [] ], 404);
            }

            return $this->respond(['patients' => $result], 200);
        } catch (\Exception $e) {
            $error = array($e->getmessage());
            $errormsg = json_encode($error);
            echo $errormsg;
        }
    }


    //get all users function
    public function allUsers()
    {
        try {
            $users = new UserModel();

            $result = $users->findAll();

            if (empty($result)) {
                return $this->respond(['message' => 'No user found','users'=> []], 404);
            }
            return $this->respond(['users' => $result], 200);

        } catch (\Exception $e) {
            $error = array($e->getmessage());
            $errormsg = json_encode($error);
            echo $errormsg;
        }

    }
    
    //searching doctors//
     public function doctor_search()
    {
            try {
                $keyword = $this->request->getPost('keyword');
                
                $users = new UserModel();
                $doctors = new DoctorModel();
                
                // Base query with role and status conditions
                $users->select('users.*, doctors.*')
                      ->join('doctors', 'doctors.user_id = users.id')
                      ->where('users.status', 'active')
                      ->groupStart()
                      ->where('users.role', 3)
                      ->orWhere('users.role', 4)
                      ->groupEnd();
        
                // If keyword is provided, add search conditions
                if ($keyword) {
                    $users->groupStart()
                          ->like('users.fullname', $keyword)
                          ->orLike('users.email', $keyword)
                          ->orLike('doctors.specialist_of', $keyword)
                          ->groupEnd();
                }
                
                $id = $this->request->getPost('id');
                if ($id) {
                    $users->where('doctors.id', $id);
                }
        
                $result = $users->findAll();
        
                if (empty($result)) {
                    return $this->respond(['message' => 'No doctors found', 'doctors' => []], 404);
                }
                return $this->respond(['doctors' => $result], 200);
            } catch (\Exception $e) {
                $error = [$e->getMessage()];
                $errormsg = json_encode($error);
                return $this->respond(['error' => $errormsg], 500);
            }
        }

    //get all hospital function
    public function hospitals()
    {
        try {

            $users = new UserModel();
            $result = $users->where('role', 2)->findAll();

            if (empty($result)) {
                return $this->respond(['message' => 'No hospital found','hospitals' => []], 404);
            }
            return $this->respond(['hospitals' => $result], 200);
        } catch (\Exception $e) {
            $error = array($e->getmessage());
            $errormsg = json_encode($error);
            echo $errormsg;
        }


    }


    //get all receptinist function
    public function receptinists()
    {
        try {
            $users = new UserModel();

            $result = $users->where('role', 5)->findAll();

            if (empty($result)) {
                return $this->respond(['message' => 'No receptinist found','receptinists' =>[]], 404);
            }
            return $this->respond(['receptinists' => $result], 200);
        } catch (\Exception $e) {
            $error = array($e->getmessage());
            $errormsg = json_encode($error);
            echo $errormsg;
        }

    }
    
    
    //change password//
    public function change_password()
    {
        try {
            $validationRules = [
                'userId' => 'required',
                'currentPassword' => 'required',
                'newPassword' => 'required|min_length[5]',
                'confirmPassword' => 'required|matches[newPassword]'
            ];

            $validation = Services::validation();
            $validation->setRules($validationRules);

            if (!$validation->withRequest($this->request)->run()) {
                
                  $messageErr = '';
                foreach($this->validator->getErrors() as $key=>$messages){
                    $messageErr .= $messages;
                }
                return $this->response->setJSON([
                    'status' => 409,
                    'message' => $messageErr,
                 
                ])->setStatusCode(409);
            }

            $user = new UserModel();

            $id = $this->request->getPost('userId');
            $oldPassword = $this->request->getPost('currentPassword');
            $newPassword = $this->request->getPost('newPassword');

            $result = $user->updatePassword($id, $oldPassword, $newPassword);

            if ($result === true) {

                return $this->response->setJSON([
                    'status' => 200,
                    'message' => 'Password updated successfully'
                ])->setStatusCode(200);

            } elseif ($result === 'error') {

                return $this->response->setJSON([
                    'status' => 401,
                    'message' => 'Incorrect old password'
                ])->setStatusCode(401);

            } else {

                return $this->response->setJSON([
                    'status' => 401,
                    'message' => 'Failed to Update password'
                ])->setStatusCode(401);
            }
        } catch (\Exception $e) {
            $error = array($e->getmessage());
            $errormsg = json_encode($error);
            echo $errormsg;
        }
    }

    //edit profile//
    public function edit_profile(){

        try {
            $userid = $this->request->getPost('userId');
            $fullname = $this->request->getPost('fullname');
            $email = $this->request->getPost('email');
            $address = $this->request->getPost('address');
            $dob = $this->request->getPost('dob');
            $image = $this->request->getFile('image');
            $phone = $this->request->getPost('phone');

            // Validation rules
            $rules = [
                'userId'=>['rules'=>'required|max_length[3]'],
                'fullname' => ['rules' => 'required|min_length[3]|max_length[255]'],
                'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]'],
                'address' => ['rules' => 'required|min_length[4]|max_length[255]'],
                'dob' => ['rules' => 'required|valid_date'],
                'phone' => ['rules' => 'required|min_length[10]|max_length[15]'],
                'image' => ['rules' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]']

            ];

            // Validate input
            if ($this->validate($rules)) {
                // Process image upload if available
                $newName = null;
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = time() . '.' . $image->getExtension();
                    $image->move(WRITEPATH . 'Api-images', $newName);
                }

                // Prepare user data
                $model = new UserModel();
                $data = [
                    'fullname' => $fullname,
                    'email' => $email,
                    'address' => $address,
                    'date_of_birth' => $dob,
                    'phone' => $phone,
                    'role' => 6,
                   
                ];
                if($newName){
                    $data['profile'] =$newName;
                }

                $model->editData($userid,$data);

                return $this->respond(['status' => 200, 'message' => 'Registered Successfully'], 200);
            } else {
                    $response = [
                    'status' => 409,
                   'message'=> $this->validator->getErrors(),
                ];
                return $this->respond($response);
            }
        } catch (\Exception $e) {
            $error = array($e->getmessage());
            $errormsg = json_encode($error);
            echo $errormsg;
        }



    }





























}
