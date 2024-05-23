<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HospitalsModel;
use App\Models\DoctorModel;
use CodeIgniter\HTTP\ResponseInterface;

class DoctorController extends BaseController
{
    public function editDoctor()
    {
        $doctorModel = new DoctorModel();
        $hospitalModel = new HospitalsModel();
        
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

        // Pass doctor and hospitals data to the view
        $data = [
            'doctors' => $doctor,
            'hospitals' => $hospitals,
        ];
        
        return view('hospitals/edit_doctors_view', $data);
    }
    public function index()
    {
        $doctorModel = new DoctorModel();
        $hospitalModel = new HospitalsModel();

        // Fetch all doctors
        $doctors = $doctorModel->findAll();

        // Log doctors

        // Append hospital names to the doctors array
        foreach ($doctors as &$doctor) {
            if (isset($doctor['hospital_id'])) {
                $hospital = $hospitalModel->where('id', $doctor['hospital_id'])->first();
                $doctor['hospital_name'] = $hospital ? $hospital['name'] : 'Unknown Hospital';
            } else {
                $doctor['hospital_name'] = 'Unknown Hospital';
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
    $model = new DoctorModel();
    
    $doctorName = $this->request->getPost("name");
    $qualification = $this->request->getPost("qualification");
    $specialist = $this->request->getPost("specialist");
    $email = $this->request->getPost("email");
    $phone = $this->request->getPost("phone");
    $schedule = $this->request->getPost("schedule");
    $about = $this->request->getPost("about");
    $hospital_id = $this->request->getPost("hospital_id");
    $image = $this->request->getFile("image");


   
        $imageName = $image->getRandomName();
    
        // Move the uploaded file to the writable/uploads directory
        $image->move(ROOTPATH . 'public/uploads', $imageName);

    
    $data = [
        'hospital_id' => $hospital_id,
        'qualification' => $qualification,
        'specialist_of' => $specialist,
        'schedule' => $schedule,
        'about' => $about,
        'name' => $doctorName,
        'image' =>  $imageName,
    ];
    
    // print_r($data);die;
    $result = $model->insert($data);
    
    if ($result) {
        return 'Data Inserted Successfully';
    } else {
        return 'Something is wrong....Try again next time';
    }
}

    

 
    public function updateDoctor()
    {
        $doctorModel = new DoctorModel();

        // Get the data from the AJAX request
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');
        $qualification = $this->request->getPost('qualification');
        $specialist_of = $this->request->getPost('specialist_of');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $schedule = $this->request->getPost('schedule');
        $about = $this->request->getPost('about');
        $hospital_id = $this->request->getPost('hospital_id');
        $Newimage = $this->request->getFile('image');

        $imageName = $Newimage->getRandomName();
    
        // Move the uploaded file to the writable/uploads directory
        $Newimage->move(ROOTPATH . 'public/uploads', $imageName);
    
            // Add the image name to the data array
            $data['image'] = $imageName;
        


        // Check if the ID is valid 
        if (!empty($id)) {
            // Update the doctor's information
            $data = [
                'name' => $name,
                'hospital_id' => $hospital_id,
                'qualification' => $qualification,
                'specialist_of' => $specialist_of,
                'email' => $email,
                'phone' => $phone,
                'schedule' => $schedule,
                'about' => $about,
            ];
            if (isset($imageName)) {
                $data['image'] = $imageName;
            }
            
            // Add a WHERE clause to the update operation
            $result = $doctorModel->update($id, $data);

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
        $model = new DoctorModel();
        $id = $this->request->getGet('id'); // Get the 'id' from the query string
    
        $data['doctor_data'] = null; // Initialize as null
    
        if ($id) {
            $doctor = $model->find($id); // Fetch the doctor by ID
            if ($doctor) {
                $data['doctor_data'] = $doctor; // Pass the doctor data directly
            }
        }
    
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