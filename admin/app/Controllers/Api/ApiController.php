<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\HospitalsModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use \Firebase\JWT\JWT;
class ApiController extends BaseController
{
    use ResponseTrait;
     
    //user register function
    public function userRegister()
    {
        $fullname = $this->request->getPost('fullname');
        $email = $this->request->getPost('email');
        $password = $this->request->getVar('password');
        $address = $this->request->getPost('address');
        $dob = $this->request->getPost('dob');
        $image = $this->request->getFile('image');
        $phone = $this->request->getPost('phone');
        $hospital = $this->request->getPost('hospital');
        
        // Validation rules
        $rules = [
            'fullname' => ['rules' => 'required|min_length[3]|max_length[255]'],
            'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]'],
            'password' => ['rules' => 'required|min_length[5]|max_length[255]'],
            'address' => ['rules' => 'required|min_length[4]|max_length[255]'],
            'dob' => ['rules' => 'required|valid_date'],
            'phone' => ['rules' => 'required|min_length[10]|max_length[15]'],
            'hospital' => ['rules' => 'required|max_length[3]'],
            'image' => ['rules' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]']
        ];
    
        // Validate input
        if($this->validate($rules)){
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
                'hospital_id' => $hospital,
                'role' => 6,
                'profile' => $newName 
            ];
            
            $model->save($data);
             
            return $this->respond(['status'=>200,'message' => 'Registered Successfully'], 200);
        } else {
            $response = [
                'errors' => $this->validator->getErrors(),
                'message' => 'Invalid Inputs'
            ];
            return $this->fail($response, 409);
        }
    }
    
    //user login function
    public function login()
    {
        $userModel = new UserModel();
  
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
          
        $user = $userModel->where('email', $email)->first();
  
        if(is_null($user)) {
            return $this->respond(['error' => 'Invalid email or password.'], 401);
        }
  
        $pwd_verify = password_verify($password, $user['password']);
  
        if(!$pwd_verify) {
            return $this->respond(['error' => 'Invalid email or password.'], 401);
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
            'token' => $token
        ];
         
        return $this->respond($response, 200);
    }


  
    //get all patient function
    public function patients()
    {
        $users = new UserModel();
    
        $result = $users->where('role', 6)->findAll();
    
        if (empty($result)) {
            return $this->respond(['message' => 'No patient found'], 404);
        }
    
        return $this->respond(['patients' => $result], 200);
    }


    //get all users function
    public function allUsers(){

        $users = new UserModel();
    
        $result = $users->findAll();
    
        if (empty($result)) {
            return $this->respond(['message' => 'No user found'], 404);
        }    
        return $this->respond(['users' => $result], 200);
    }

    //get all hospital function
    public function hospitals()
    {
        $users = new UserModel();
    
        $result = $users->where('role', 2)->findAll();
    
        if (empty($result)) {
            return $this->respond(['message' => 'No hospital found'], 404);
        }
    
        return $this->respond(['hospitals' => $result], 200);
    }
   
    

    //get all receptinist function
    public function receptinists()
    {
        $users = new UserModel();
    
        $result = $users->where('role', 5)->findAll();
    
        if (empty($result)) {
            return $this->respond(['message' => 'No receptinist found'], 404);
        }
    
        return $this->respond(['receptinists' => $result], 200);
    }




}
