<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;
use App\Models\HospitalsModel;
use App\Models\DoctorModel;
use CodeIgniter\HTTP\ResponseInterface;

class DoctorController extends BaseController
{
    public function editDoctor()
    {
        $doctorModel = new DoctorModel();
        $hospitalModel = new HospitalsModel();
        $userModel = new UserModel();

        
        $id = $this->request->getGet('id');

        // Fetch the doctor data
        $doctor = $doctorModel->find($id);
        
        if (!$doctor) {
            return redirect()->back()->with('error', 'Doctor not found.');
        }

        // Fetch all hospitals
        $hospitals = $hospitalModel->findAll();

        
        // Add the hospital name to the doctor if it exists
        if (isset($doctor['hospital_id'])) {
            $hospital = $hospitalModel->where('id', $doctor['hospital_id'])->first();
            $doctor['hospital_name'] = $hospital ? $hospital['name'] : 'Unknown Hospital';
        } else {
            $doctor['hospital_name'] = 'Unknown Hospital';
        }

        if (isset($doctor['user_id'])) {
            $user = $userModel->where('id', $doctor['user_id'])->first();
            $doctor['full_name'] = $user ? $user['fullname'] : 'Unknown user';
            $doctor['email'] = $user ? $user['email'] : 'Unknown email';
            $doctor['address'] = $user ? $user['address'] : 'Unknown address';
            $doctor['date_of_birth'] = $user ? $user['date_of_birth'] : 'Unknown date_of_birth';
            $doctor['phone'] = $user ? $user['phone'] : 'Unknown phone';
            $doctor['profile'] = $user ? $user['profile'] : 'Unknown image';
            $doctor['status'] = $user ? $user['status'] : 'Unknown status';



        } else {
            $doctor['full_name'] = 'Unknown user';
            $doctor['email'] = 'Unknown email';
            $doctor['address'] = 'Unknown address';
            $doctor['date_of_birth'] = 'Unknown date_of_birth';
            $doctor['phone'] = 'Unknown phone';
            $doctor['profile'] = 'Unknown image';
            $doctor['status'] = 'Unknown image';


        }
        
        // Pass doctor and hospitals data to the view
        $data = [
            'doctors' => $doctor,
            'hospitals' => $hospitals,

        ];
        
        return view('hospitals/edit_doctors_view', $data);
    }
   public function index()
{
    $hospitalModel = new HospitalsModel();
    $doctorModel = new DoctorModel();
    $userModel = new UserModel();

    // Fetch all doctors
    $doctors = $doctorModel->findAll();

    // Fetch all users
    $users = $userModel->findAll();

    // Append hospital names and user data to the doctors array
    foreach ($doctors as &$doctor) {
        // Append hospital name
        if (isset($doctor['hospital_id'])) {
            $hospital = $hospitalModel->where('id', $doctor['hospital_id'])->first();
            $doctor['hospital_name'] = $hospital ? $hospital['name'] : 'Unknown Hospital';
        } else {
            $doctor['hospital_name'] = 'Unknown Hospital';
        }

        // Append user data
        if (isset($doctor['user_id'])) {
            $user = $userModel->where('id', $doctor['user_id'])->first();
            $doctor['full_name'] = $user ? $user['fullname'] : 'Unknown user';
            $doctor['image'] = $user ? $user['profile'] : 'Unknown image';

        } else {
            $doctor['full_name'] = null;
            $doctor['image'] = null;

        }
    }

    // Prepare data for the view
    $data = [
        'doctors' => $doctors
    ];

    return view('hospitals/doctors_view', $data);
}

    
    public function add_doctor_fun()
    {
        $model = new HospitalsModel();

      
       $data['hospitals'] = $model->findAll();

        return view('hospitals/add_doctors_view',$data);
    }
    
     public function doctor_register_form()
{
    $doctorModel = new DoctorModel();
    $userModel=new UserModel;
    
    $doctorName = $this->request->getPost("name");
    $email = $this->request->getPost("email");
    $password = $this->request->getPost("password");
    $address = $this->request->getPost("address");
    $dob = $this->request->getPost("dob");
    $phone = $this->request->getPost("phone");
    $specialist = $this->request->getPost("specialist");
    $qualification = $this->request->getPost("qualification");
    $schedule = $this->request->getPost("schedule");
    $about = $this->request->getPost("about");
    $hospital_id = $this->request->getPost("hospital_id");
    $image = $this->request->getFile("image");
    $specialistOrPractice = $this->request->getPost("specialistOrPractice");


    if ($image->isValid() && !$image->hasMoved()) {
        $imageName = time() . '.' . $image->getExtension();
        $image->move(ROOTPATH . 'public/images', $imageName);
    }

    
    $data = [
        'role'=> $specialistOrPractice,
        'hospital_id' => $hospital_id,
        'fullname' => $doctorName,
        'email' => $email,
        'password' => $password,
        'address' => $address,
        'date_of_birth' => $dob,
        'phone' =>  $phone,
        'profile' =>  $imageName,
    ];
    

      // print_r($data);die;
       $user_id = $userModel->insertUser($data);


       $doctorData = [
        'user_id'=>$user_id,
        'hospital_id' => $hospital_id,
        'qualification' => $qualification,
        'specialist_of' => $specialist,
        'schedule' => $schedule,
        'about' => $about
    ];
 
    $result = $doctorModel->insertDoctor($doctorData);
     
    
    if ($result) {
        return 'Data Inserted Successfully';
    } else {
        return 'Something is wrong....Try again next time';
    }
}

    

 
    public function updateDoctor()
    {
        $doctorModel = new DoctorModel();
       $userModel=new UserModel;


        // Get the data from the AJAX request
        $id = $this->request->getPost('id');
        $doctorName = $this->request->getPost("name");
        $email = $this->request->getPost("email");
        $address = $this->request->getPost("address");
        $dob = $this->request->getPost("dob");
        $phone = $this->request->getPost("phone");
        $specialist = $this->request->getPost("specialist");
        $qualification = $this->request->getPost("qualification");
        $schedule = $this->request->getPost("schedule");
        $about = $this->request->getPost("about");
        $hospital_id = $this->request->getPost("hospital_id");
        $image = $this->request->getFile("image");

        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = time() . '.' . $image->getExtension();
            $image->move(ROOTPATH . 'public/images', $imageName);
        }
        


        // Check if the ID is valid 
        if (!empty($id)) 
        {
            // Update the doctor's information
            $user_arr = [
                'hospital_id' => $hospital_id,
                'fullname' => $doctorName,
                'email' => $email,
                'address' => $address,
                'date_of_birth' => $dob,
                'phone' =>  $phone,
                'profile' =>  $imageName,
            ];


            $user_id = $userModel->editData($id, $user_arr);

    

            $doctorData = [
                'hospital_id' => $hospital_id,
                'qualification' => $qualification,
                'specialist_of' => $specialist,
                'schedule' => $schedule,
                'about' => $about
            ];


          $result = $doctorModel->editData($id,$doctorData);



         

            if ($result) {
                return $this->response->setJSON(['success' => true, 'message' => 'Doctor information updated successfully.']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to update doctor information.']);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid ID.']);
        }
    }

    
    public function viewDoctor_fun()
    {
        $doctorModel = new DoctorModel();
        $userModel = new UserModel();
    
        $id = $this->request->getGet('id'); // Get the 'id' from the query string
    
        // Fetch doctor data
        $doctor = $doctorModel->where('user_id', $id)->first();
    
        // Fetch user data
        $user = $userModel->find($id);
    
        $data = [
            'doctor' => $doctor ? $doctor : null,
            'user' => $user ? $user : null,
        ];
    
        return view('hospitals/view_doctor_page', $data);
    }
    


   
    public function deleteDoctor_fun()
{
    $model = new DoctorModel(); // Create a new instance of DoctorModel
    $id = $this->request->getPost('id');

    if (!empty($id)) {
        // Attempt to delete the doctor using the model
        $deleted = $model->delete($id);

        if ($deleted) {
            // Doctor successfully deleted, return JSON response
            return 'Doctor deleted successfully';
        } else {
            // Failed to delete doctor, return JSON response
            return 'Doctor not found';
        }
    } else {
        // Invalid or missing ID, return JSON response
        return   'Doctor not found';
    }
}




    








    

}