<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Config\Services;


class PatientController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $data['patients'] = $userModel->where('role', 6)->findAll();
        // $data['patients'] = $userModel->findAll();

        return view('patients/patients_view',$data);

    }
    public  function patient_status_fun(){

        $id = $this->request->getGet('id'); 
        $model = new UserModel();
    
        // Check if the ID is valid
        if (!empty($id)) {
            // Fetch the hospital data by ID
            $user = $model->find($id);
        
            // Check if the hospital exists
            if ($user) {
                // Toggle the status
                $newStatus = ($user['status'] == 'active') ? 'inactive' : 'active';
        
                // Update the status
                $model->update($id, ['status' => $newStatus]);
                return response()->setJSON(['status'=>'success','msg'=>'status changed']);
            } else {
                return response()->setJSON(['status'=>'error','msg'=>'User not found']);
                // Hospital with the provided ID not found, handle error
            }
            
        } 
        else 
        {
            return response()->setJSON(['status'=>'error','msg'=>'User not found']);
            // Invalid or missing ID, handle error
        }
    }

    public function add_patient_view()
    {
        return view('patients/add_patients_view');
        
    }
    

public function register_form_fun()
    {
        $usermodel = new UserModel(); // Instantiate your UserModel

       $image= $this->request->getFile('image');

        $formdata = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'date_of_birth' => $this->request->getPost('date_of_birth'),
            'profile'=>$image

        ];


            if($image->isValid() && !$image->hasMoved())
            {
             $extension = $image->getClientExtension();
             $newName = time() . '.' . $extension;
             $image->move(FCPATH . 'public/images', $newName);
             $data['profile'] = $newName; 
             }


        // If validation passes, proceed to insert data
        $data = [
            'role' => 6,
            'fullname' => $formdata['name'],
            'email' => $formdata['email'], 
            'phone' => $formdata['phone'], 
            'address' => $formdata['address'], 
            'date_of_birth' => $formdata['date_of_birth'], 
            'password' =>password_hash($formdata['password'], PASSWORD_DEFAULT),

        ];

        $result = $usermodel->insert($data); // Assuming UserModel has an insert method

        if ($result) {
            return "User registered successfully!";
        } else {
            return "Failed to register user.";
        }
    }

    public function editpait_fun()
    {
        return view('patients/edit_patients_view');
        
    }
    public function viewpait_fun()
    {
        return view('patients/View_patients_details');
        
    }

    

    
}

