<?php

namespace App\Controllers\doctor;

use App\Controllers\BaseController;
use App\Models\DoctorModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class DoctorController extends BaseController
{
    public function index()
    {
        $doctorModel = new DoctorModel();
        $userModel = new UserModel();
    
        $doctors = $doctorModel->findAll();
    
        $combinedData = [];
    
        foreach ($doctors as $doctor) {
            $user_id = $doctor['user_id'];
            $user = $userModel->find($user_id);
    
            $combinedData[] = [
                'doctor' => $doctor,
                'user' => $user
            ];
        }
    
        return view('doctor/doctor_view', ['doctors' => $combinedData]);
    }
    
    
    public function addDoctor()
    {
        return view('doctor/add_doctor');
    }

    public function doctor_register()
    {
        $doctorModel = new DoctorModel();
        $userModel = new UserModel();
    
        $validationRules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]|max_length[255]',
            'address' => 'required|min_length[4]|max_length[255]',
            'dob' => 'required|valid_date',
            'phone' => 'required|min_length[10]|max_length[15]',
            'specialist' => 'required|min_length[3]|max_length[255]',
            'qualification' => 'required|min_length[3]|max_length[255]',
            'schedule' => 'required|min_length[3]|max_length[255]',
            'about' => 'required|min_length[3]|max_length[255]',
            'specialistOrPractice' => 'required|integer',
        ];
    
        if (!$this->validate($validationRules)) {
            $validation = Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
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
        $hospital_id = session('user_id');
        $image = $this->request->getFile("image");
        $specialistOrPractice = $this->request->getPost("specialistOrPractice");
    
        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = time() . '.' . $image->getExtension();
            $image->move(ROOTPATH . 'public/images', $imageName);
        }
    
        $data = [
            'role' => $specialistOrPractice,
            'hospital_id' => $hospital_id,
            'fullname' => $doctorName,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'address' => $address,
            'date_of_birth' => $dob,
            'phone' => $phone,
            'profile' => $imageName ?? null,
        ];
    
        $user_id = $userModel->insertUser($data);
    
        $doctorData = [
            'user_id' => $user_id,
            'hospital_id' => $hospital_id,
            'qualification' => $qualification,
            'specialist_of' => $specialist,
            'schedule' => $schedule,
            'about' => $about
        ];
    
        $result = $doctorModel->insert($doctorData);
    
        if ($result) {
            return redirect()->to( base_url().''.session('prefix').'/'.'doctor')->with('added_dr', 'Doctor Register Successfully');
        } else {
            return redirect()->back()->with('error', 'Something is wrong....Try again next time');
        }
    }

    
    public function doctor_edit_view($id){

        if(!$id==null){

            $doc=new DoctorModel;
            $doctorData=$doc->getDoctorById($id);
            $user_id=$doctorData['user_id'];
            $user=new UserModel;
            $doctor=$user->getUserById($user_id);
            $data = [
                'doctor' => $doctorData,
                'user' => $doctor
            ];
            return view('doctor/edit_doctor.php',['doctor'=>$data]);
        }else{
            return view('doctor/edit_doctor.php');
        }
            

    }

    public function doctor_edit()
    {
        $doctorModel = new DoctorModel();
        $userModel = new UserModel();
    
        $validationRules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]|max_length[255]',
            'address' => 'required|min_length[4]|max_length[255]',
            'dob' => 'required|valid_date',
            'phone' => 'required|min_length[10]|max_length[15]',
            'specialist' => 'required|min_length[3]|max_length[255]',
            'qualification' => 'required|min_length[3]|max_length[255]',
            'schedule' => 'required|min_length[3]|max_length[255]',
            'about' => 'required|min_length[3]|max_length[255]',
            'specialistOrPractice' => 'required|integer',
        ];
    
        if (!$this->validate($validationRules)) {
            $validation = Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
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
        $hospital_id = session('user_id');
        $image = $this->request->getFile("image");
        $specialistOrPractice = $this->request->getPost("specialistOrPractice");
    
        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = time() . '.' . $image->getExtension();
            $image->move(ROOTPATH . 'public/images', $imageName);
        }
    
        $data = [
            'role' => $specialistOrPractice,
            'hospital_id' => $hospital_id,
            'fullname' => $doctorName,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'address' => $address,
            'date_of_birth' => $dob,
            'phone' => $phone,
            'profile' => $imageName ?? null,
        ];
    
        $user_id = $userModel->insertUser($data);
    
        $doctorData = [
            'user_id' => $user_id,
            'hospital_id' => $hospital_id,
            'qualification' => $qualification,
            'specialist_of' => $specialist,
            'schedule' => $schedule,
            'about' => $about
        ];
    
        $result = $doctorModel->insert($doctorData);
    
        if ($result) {
            return redirect()->to( base_url().''.session('prefix').'/'.'doctor')->with('added_dr', 'Doctor Register Successfully');
        } else {
            return redirect()->back()->with('error', 'Something is wrong....Try again next time');
        }
    }
























    
    
    
}
