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

            $user_arr=[
                'fullname'=>$field['hospital_name'],
                'role'=>2,
                'email'=>$field['email'],
                'phone'=>$field['phone'],
                'address'=>$field['address'],
                'password'=>password_hash($field['password'], PASSWORD_DEFAULT),
            ];
            
               if($image->isValid() && !$image->hasMoved())
               {
                $extension = $image->getClientExtension();
                $newName = time() . '.' . $extension;
                $image->move(FCPATH . 'public/images', $newName);
                $user_arr['profile'] = $newName; 
                 }
                 
            $user_id=$user->insertUser($user_arr);

            $hospital_arr=[
                'name'=>$field['hospital_name'],
                'note'=>$field['about'],
                'current_plan'=>$field['plan_name'],
                'hospital_id'=>$user_id
            ];
            
            $hospital_in = $hospitalModel->addHospital($hospital_arr);
            
            if ($hospital_in) {
                // Data inserted successfully
                return redirect()->to('hospitals')->with('hospital_status', 'success');
            } else {
                // Error while inserting data
                return redirect()->to('add_hospital')->with('hospital_status', 'error');
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
    
    public function hospital_delete(){
        
         $id = $this->request->getGet('id'); 
         
         if(!empty($id)){
             
             $hospital=new UserModel;
             
             $delete=$hospital->deleteUser($id);
             
             if($delete){
                   return response()->setJSON(['success' => 1, 'message' => 'Hospital deleted successfully.']);
             }else{
                   return response()->setJSON(['success' => 2, 'message' => 'Hospital not deleted.']);
             }
             
         }else{
               return response()->setJSON(['success' => 3, 'message' => 'Hospital not found.']);
         }
        
    }
    
    public function edit_hospital($id){
        
        $model=new UserModel;
        $data=$model->findUserById($id);
        
        $packages = new PackagesModel;
        $packages = $packages->getAllPackages();
        
        $hospital= new HospitalsModel;
        $hospital= $hospital->getDataByHospitalId($id);
        return view('hospitals/edit_hospital.php',['hospital'=>$data,'data'=>$packages,'hospital_data'=>$hospital]);
    }
    

        
        public function edit_hospital_data()
    {

       $image= $this->request->getFile('profile');
       $id= $this->request->getPost('id');
       
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
                'rules' => "required|valid_email|is_unique[users.email,id,{$id}]",
                'errors' => [
                    'is_unique' => 'This email is already registered.'
                ]
            ],
            'plan_name' => ['label' => 'Select Plan', 'rules' => 'required'],
            'address' => ['label' => 'Address', 'rules' => 'required'],
            'about' => ['label' => 'About', 'rules' => 'required'],
        ]);

       
    
        if (!$validation->run($field)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        } else {
           
         
            $user=new UserModel;

            $user_arr=[
                'fullname'=>$field['hospital_name'],
                'role'=>2,
                'email'=>$field['email'],
                'phone'=>$field['phone'],
                'address'=>$field['address'],
            ];
            
            if (!empty($field['password'])) {
                $user_arr['password'] = password_hash($field['password'], PASSWORD_DEFAULT);
            }
            
            if($image->isValid() && !$image->hasMoved()) {
                $extension = $image->getClientExtension();
                $newName = time() . '.' . $extension;
                $image->move(FCPATH . 'public/images', $newName);
                $user_arr['profile'] = $newName; 
            }
            
            $user_id=$user->editData($id,$user_arr);
            
            
            $hospitalModel = new HospitalsModel;
             
            $hospital_arr=[
                'name'=>$field['hospital_name'],
                'note'=>$field['about'],
                'current_plan'=>$field['plan_name'],
            ];
            
            $hospital_in = $hospitalModel->editData($id,$hospital_arr);
            
            
            if ($hospital_in){
                // Data inserted successfully
                return redirect()->to('hospitals')->with('hospital_edit_status', 'success');
            }
            else{
                // Error while inserting data//
                return redirect()->to('edit_hospital')->with('hospital_edit_status', 'error');
            }
        }
        
    }
    
    public function view_hospital($id){
    
        $model=new UserModel;
        $data=$model->findUserById($id);
        
        $packages = new PackagesModel;
        $packages = $packages->getAllPackages();
        
        $hospital= new HospitalsModel;
        $hospital= $hospital->getDataByHospitalId($id);
        if (!empty($hospital) && !empty($data) ) {
        return view('hospitals/view_hospital.php',['hospital'=>$data,'package'=>$packages,'hospital_data'=>$hospital]);
           
        } else {
            return redirect()->to('hospitals/hospitals.php')->with('view_error', 'error');
        }
    }
    
    

}
