<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HospitalsModel;
use App\Models\PackagesModel;
use App\Models\UserModel;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\ResponseInterface;

class HospitalController extends BaseController
{
    public function index()
    {
        $data = new UserModel;
        $hospitals = $data->getUsersByRole('2');
        return view('hospitals/hospitals.php', ['hospitals' => $hospitals]);
    }

    public function add_hospital_view()
    {
        $packages = new PackagesModel;
        $data = $packages->getAllPackages();
        return view('hospitals/add_hospital.php', ['data' => $data]);
    }

    public function add_hospital()
    {

       $image= $this->request->getFile('profile');
        // Load validation service
        $validation = Services::validation();
        // Get the request data
        $field = [
            'hospital_name' => $this->request->getPost('hospital_name'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'plan_name' => $this->request->getPost('plan_name'),
            'address' => $this->request->getPost('address'),
            'about' => $this->request->getPost('about'),
            'profile'=>$image

        ];
      
        // Set custom error messages
        $validation->setRules([
            'hospital_name' => ['label' => 'Hospital Name', 'rules' => 'required'],
            'phone' => ['label' => 'Phone Number', 'rules' => 'required|numeric|min_length[10]|max_length[15]'],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'is_unique' => 'This email is already registered.'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'min_length' => 'The password must be at least 5 characters long.'
                ]
            ],
            'plan_name' => ['label' => 'Select Plan', 'rules' => 'required'],
            'address' => ['label' => 'Address', 'rules' => 'required'],
            'about' => ['label' => 'About', 'rules' => 'required'],
        ]);

        // if ($image->isValid()) {
        //     $validation->setRules([
        //         'profile' => [
        //             'rules' => 'uploaded[profile]|max_size[profile,1024]|is_image[profile]',
        //             'errors' => [
        //                 'uploaded' => 'Please upload a valid profile image.',
        //                 'max_size' => 'The profile image file size should not exceed 1MB.',
        //                 'is_image' => 'The profile image must be in PNG, JPG, or JPEG format.',
        //             ],
        //         ],
        //     ]);
        // }
    
        if (!$validation->run($field)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        } else {
           
            $hospitalModel = new HospitalsModel;
            $user=new UserModel;

            $hospital_arr=[
                'name'=>$field['hospital_name'],
                'address'=>$field['address'],
                'note'=>$field['about']
            ];
            $user_arr=[
                'fullname'=>$field['hospital_name'],
                'role'=>2,
                'email'=>$field['email'],
                'phone'=>$field['phone'],
                'password'=>password_hash($field['password'], PASSWORD_DEFAULT),
            ];

            if($image->isValid() && !$image->hasMoved()) {
                $extension = $image->getClientExtension();
                $newName = time() . '.' . $extension;
                $image->move(FCPATH . 'images', $newName);
                $user_arr['profile'] = $newName; 
            }


            $user_in=$user->insertUser($user_arr);
            $hospital_in = $hospitalModel->addHospital($hospital_arr);
    
            if ($hospital_in && $user_in) {
                // Data inserted successfully
                return redirect()->to('hospitals')->with('status', 'success');
            } else {
                // Error while inserting data
                return $this->response->setJSON(['success' => false, 'message' => 'Error adding hospital.']);
            }
        }
    }
    
    public function hospital_status(){

        $id = $this->request->getGet('id'); 
        $usermodel = new UserModel;
    
        // Check if the ID is valid
        if (!empty($id)) {
            // Fetch the hospital data by ID
            $user = $usermodel->find($id);
        
            // Check if the hospital exists
            if ($user) {
                // Toggle the status
                $newStatus = ($user['status'] == 'active') ? 'inactive' : 'active';
        
                // Update the status
                $usermodel->update($id, ['status' => $newStatus]);
                return response()->setJSON(['status'=>'success','msg'=>'status changed']);
            } else {
                return response()->setJSON(['status'=>'error','msg'=>'User not found']);
                // Hospital with the provided ID not found, handle error
            }
        } else {
            return response()->setJSON(['status'=>'error','msg'=>'User not found']);
            // Invalid or missing ID, handle error
        }
    }
    

}
