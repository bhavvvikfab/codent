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

       $image= $this->request->getFile('image');

        // Load validation service
        $validation = Services::validation();
        // Get the request data
        $field = [

            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'date_of_birth' => $this->request->getPost('date_of_birth'),
            'profile'=>$image

        ];
      
        // Set custom error messages
        $validation->setRules([
            'name' => ['label' => 'Patient Name', 'rules' => 'required'],
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
            'address' => ['label' => 'Address', 'rules' => 'required'],
            'date_of_birth' => ['label' => 'Date of Birth', 'rules' => 'required']

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
           
           
           

        $userModel = new UserModel(); // Instantiate your UserModel


            $data=[
                'role' => 6,
                'fullname' => $field['name'],
                'email' => $field['email'], 
                'phone' => $field['phone'], 
                'address' => $field['address'], 
                'date_of_birth' => $field['date_of_birth'], 
                'password' =>password_hash($field['password'], PASSWORD_DEFAULT),
            ];
            
               if($image->isValid() && !$image->hasMoved())
               {
                $extension = $image->getClientExtension();
                $newName = time() . '.' . $extension;
                $image->move(FCPATH . 'public/images', $newName);
                $data['profile'] = $newName; 
                 }
                 
            $result = $userModel->insert($data);
            
            
            if ($result) {
                // Data inserted successfully
                return redirect()->to('/patient')->with('status', 'success');
            } else {
                // Error while inserting data
                return redirect()->to('/add_patient')->with('status', 'error');
            }
        }
    }

    
    public function editpait_fun()
    {
        $userModel = new UserModel();

        $id = $this->request->getGet('id');

        $data['patients'] = $userModel->where('id', $id)->findAll();
        // $data['patients'] = $userModel->findAll();

        return view('patients/edit_patients_view',$data);
        
    }
    public function viewpait_fun()
    {

        $userModel = new UserModel();

        $id = $this->request->getGet('id');

        $data['patients'] = $userModel->where('id', $id)->findAll();

        return view('patients/View_patients_details',$data);
        
    }


    public function update_patient_fun()
{

    $id = $this->request->getPost('id');

    // Load validation service
    $validation = \Config\Services::validation();

    // Get the request data
    $field = [
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
        'phone' => $this->request->getPost('phone'),
        'address' => $this->request->getPost('address'),
        'date_of_birth' => $this->request->getPost('dob'),
    ];

    $image = $this->request->getFile('image');


    // Set custom error messages and validation rules
    $validation->setRules([
        'name' => ['label' => 'Patient Name', 'rules' => 'required'],
        'phone' => ['label' => 'Phone Number', 'rules' => 'required|numeric|min_length[10]|max_length[15]'],
        'email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email',
        ],
        'address' => ['label' => 'Address', 'rules' => 'required'],
        'date_of_birth' => ['label' => 'Date of Birth', 'rules' => 'required']
    ]);

    // Add validation for the profile image if it's uploaded
    // if ($image->isValid()) {
    //     $validation->setRules([
    //         'image' => [
    //             'rules' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
    //             'errors' => [
    //                 'uploaded' => 'Please upload a valid profile image.',
    //                 'max_size' => 'The profile image file size should not exceed 1MB.',
    //                 'is_image' => 'The profile image must be in PNG, JPG, or JPEG format.',
    //             ],
    //         ],
    //     ]);
    // }


    // Validate the form inputs


    if (!$validation->run($field)) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    } else {
    // if (!$validation->run($field) || ($image->isValid() && !$validation->run(['image' => $image]))) {
    //     return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    // print_r("fgdfgfg");die;

    // } 
    // else 
    // {

        $userModel = new UserModel(); // Instantiate your UserModel

        $data = [
            'fullname' => $field['name'],
            'email' => $field['email'],
            'phone' => $field['phone'],
            'address' => $field['address'],
            'date_of_birth' => $field['date_of_birth'],
        ];

        if ($image->isValid() && !$image->hasMoved()) {
            // Get current patient data
            $patient = $userModel->find($id);

            // Delete old profile image if exists
            if (!empty($patient['profile'])) {
                @unlink(FCPATH . 'public/images/' . $patient['profile']);
            }

            // Save new profile image
            $extension = $image->getClientExtension();
            $newName = time() . '.' . $extension;
            $image->move(FCPATH . 'public/images', $newName);
            $data['profile'] = $newName;
        }

        // Update patient data in the database
        $result = $userModel->update($id, $data);

        if ($result) {
            // Data updated successfully
            return redirect()->to('/patient')->with('update_status', 'success');
        } else {
            // Error while updating data
            return redirect()->to('/update_patient_form')->with('status', 'error');
        }
    }
}


public function delete_fun()
{

    $id = $this->request->getGet('id');


    $userModel = new UserModel(); // Instantiate your UserModel

    // Check if the patient record exists
    $patient = $userModel->find($id);

    if (!$patient) {
        // Patient record not found, redirect with error message
        return redirect()->to('/patient')->with('delete_status', 'error')->with('message', 'Patient record not found.');
    }

    // Delete the patient record
    $result = $userModel->delete($id);

    if ($result) {
        // Deletion successful, redirect with success message
        return redirect()->to('/patient')->with('delete_status', 'success')->with('message', 'Patient record deleted successfully.');
    } else {
        // Deletion failed, redirect with error message
        return redirect()->to('/patient')->with('delete_status', 'error')->with('message', 'Error deleting patient record. Please try again.');
    }
}




    
}

