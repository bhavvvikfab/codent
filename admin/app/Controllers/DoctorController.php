<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DoctorModel;
use CodeIgniter\HTTP\ResponseInterface;

class DoctorController extends BaseController
{
     public function index()
    {
       $model = new DoctorModel();
       
       $data['doctors'] = $model->findAll();
       
        return view('hospitals/doctors_view',$data);
    }
    public function add_doctor_fun()
    {
       
        return view('hospitals/add_doctors_view');
    }
    
     public function doctor_register_form()
{
    $model = new DoctorModel();
    
    $doctorName = $this->request->getPost("name");
    $qualification = $this->request->getPost("qualification");
    $specialist = $this->request->getPost("specialist");
    $email = $this->request->getPost("email");
    $phone = $this->request->getPost("phone");
    $image = $this->request->getPost("image");
    $schedule = $this->request->getPost("schedule");
    $about = $this->request->getPost("about");
    
    $data = [
        'hospital_id' => $doctorName,
        'qualification' => $qualification,
        'specialist_of' => $specialist,
        'schedule' => $schedule,
        'about' => $about,
        // Add other fields as needed
    ];
    
    print_r($data);die;
    $result = $model->insert($data);
    
    if ($result) {
        return "inserted";
    } else {
        return "not inserted";
    }
}

        
    
    
}