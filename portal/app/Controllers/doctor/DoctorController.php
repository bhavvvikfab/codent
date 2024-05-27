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
        $hospitalId=session('user_id');
        $doctors = $doctorModel->where('hospital_id', $hospitalId)->findAll();
       
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
        $validationRules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email,id,{user_id}]',
                'errors' => [
                    'is_unique' => 'This email address is already in use.'
                ]
            ],
            'address' => 'required|min_length[4]|max_length[255]',
            'dob' => 'required|valid_date',
            'phone' => 'required|min_length[10]|max_length[15]',
            'specialist' => 'required|min_length[3]|max_length[255]',
            'qualification' => 'required|min_length[3]|max_length[255]',
            'schedule' => 'required|min_length[3]|max_length[255]',
            'about' => 'required|min_length[3]|max_length[255]',
            'specialistOrPractice' => 'required|integer',
            'user_id' => 'required|integer',
            'dr_id' => 'required|integer',
        ];
    
        if (!$this->validate($validationRules)) {
            $validation = Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        $dr_id = $this->request->getPost("dr_id");
        $user_id = $this->request->getPost("user_id");
    
        $doctorName = $this->request->getPost("name");
        $email = $this->request->getPost("email");
        $address = $this->request->getPost("address");
        $dob = $this->request->getPost("dob");
        $phone = $this->request->getPost("phone");
        $specialist = $this->request->getPost("specialist");
        $qualification = $this->request->getPost("qualification");
        $schedule = $this->request->getPost("schedule");
        $about = $this->request->getPost("about");
        $image = $this->request->getFile("image");
        $specialistOrPractice = $this->request->getPost("specialistOrPractice");
    
        // Image upload handling
       
    
        $doctorModel = new DoctorModel();
        $userModel = new UserModel();
    
        // Doctor data array
        $doctorData = [
            'qualification' => $qualification,
            'specialist_of' => $specialist,
            'schedule' => $schedule,
            'about' => $about,
        ];
    
        $doctorUpdateResult = $doctorModel->update($dr_id, $doctorData);
    
        $userData = [
            'role' => $specialistOrPractice,
            'fullname' => $doctorName,
            'email' => $email,
            'address' => $address,
            'date_of_birth' => $dob,
            'phone' => $phone,
            
        ];
       
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = time() . '.' . $image->getExtension();
            $image->move(ROOTPATH . 'public/images', $imageName);
            $userData['profile'] = $imageName;
        }
        
    
        $userUpdateResult = $userModel->update($user_id, $userData);
    
        if ($doctorUpdateResult && $userUpdateResult) {
            return redirect()->to(base_url() . session('prefix') . '/doctor')->with('edit_dr', 'Doctor Info Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function doctor_details($id){

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
            return view('doctor/single_doctor_view.php',['doctor'=>$data]);
        }else{
            return view('doctor/single_doctor_view.php');
        }

    }

    public function doctor_delete($id)
    {
        $userModel = new UserModel();
        $doctorModel=new DoctorModel(); 
        $user = $doctorModel->find($id);
        $userfind= $user['user_id'];
       
        if ($doctorModel->delete($id) && $userModel->delete($userfind)) {
            
            return redirect()->to(base_url() . session('prefix') . '/doctor')->with('delete_dr', 'Doctor deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Doctor not found.');
        }
    }

    public function doctor_status(){

        $id = $this->request->getGet('id'); 
        $usermodel = new UserModel();
    
        if (!empty($id)) {

            $user = $usermodel->find($id);
        
            if ($user) {
                $newStatus = ($user['status'] == 'active') ? 'inactive' : 'active';
        
                $usermodel->update($id, ['status' => $newStatus]);
                return response()->setJSON(['status'=>'success','msg'=>'Doctor status changed.']);
            } else {
                return response()->setJSON(['status'=>'error','msg'=>'User not found...!']);
            }
        } else {
            return response()->setJSON(['status'=>'error','msg'=>'User not found...!']);
        }
    }
    























    
    
    
}
