<?php

namespace App\Controllers\doctor;

use App\Controllers\BaseController;
use App\Models\DoctorModel;
use App\Models\DoctorScheduleModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use DateTime;

class DoctorController extends BaseController
{
    public function index()
    {
        $doctorModel = new DoctorModel();
        $userModel = new UserModel();
        if(session('user_role')==2){
            $hospitalId = session('user_id');
        }else{
            $hospitalId = session('hospital_id');
        }
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
        $scheduleModel = new DoctorScheduleModel;

        $validationRules = [
            // 'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email]',
            // 'password' => 'required|min_length[5]|max_length[255]',
            // 'address' => 'required|min_length[4]|max_length[255]',
            // 'dob' => 'required|valid_date',
            // 'phone' => 'required|min_length[10]|max_length[15]',
            // 'specialist' => 'required|min_length[3]|max_length[255]',
            // 'qualification' => 'required|min_length[3]|max_length[255]',
            // 'schedule' => 'required|min_length[3]|max_length[255]',
            // 'about' => 'required|min_length[3]|max_length[255]',
            // 'specialistOrPractice' => 'required|integer',
        ];

        if (!$this->validate($validationRules)) {
            $validation = Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $monday_time = $this->request->getPost("monday_time");
        $tuesday_time = $this->request->getPost("tuesday_time");
        $wednesday_time = $this->request->getPost("wednesday_time");
        $thursday_time = $this->request->getPost("thursday_time");
        $friday_time = $this->request->getPost("friday_time");
        $saturday_time = $this->request->getPost("saturday_time");
        $sunday_time = $this->request->getPost("sunday_time");

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
        $hospital_id = 1;
        if (session('user_role') == 2) {
            $hospital_id = session('user_id');
        }

        $image = $this->request->getFile("image");
        $specialistOrPractice = $this->request->getPost("specialistOrPractice");

        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getExtension();
            $destinationPath = ROOTPATH . '../admin/public/images';
            $image->move($destinationPath, $imageName);
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

        $dr_id = $doctorModel->insertDoctor($doctorData);

        $schedule = [
            'user_id' => $user_id,
            'doctor_id' => $dr_id,
            'monday' => $monday_time,
            'tuesday' => $tuesday_time,
            'wednesday' => $wednesday_time,
            'thursday' => $thursday_time,
            'friday' => $friday_time,
            'saturday' => $saturday_time,
            'sunday' => $sunday_time,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $result = $scheduleModel->insert($schedule);

        if ($result) {
            return redirect()->to(base_url() . '' . session('prefix') . '/' . 'doctor')->with('added_dr', 'Doctor Register Successfully');
        } else {
            return redirect()->back()->with('error', 'Something is wrong....Try again next time');
        }
    }


    public function doctor_edit_view($id)
    {

        if (!$id == null) {

            $doc = new DoctorModel;
            $doctorData = $doc->getDoctorById($id);
            $user_id = $doctorData['user_id'];
            $user = new UserModel;
            $scheduleModel=new DoctorScheduleModel();
            $schedule=$scheduleModel->getScheduleByUserId($user_id);
            $doctor = $user->getUserById($user_id);
            $data = [
                'doctor' => $doctorData,
                'user' => $doctor,
                'schedule'=>$schedule
            ];
            return view('doctor/edit_doctor.php', ['doctor' => $data]);
        } else {
            return view('doctor/edit_doctor.php');
        }


    }

    public function doctor_edit()
    {
        $validationRules = [
            // 'name' => 'required|min_length[3]|max_length[255]',
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email,id,{user_id}]',
                'errors' => [
                    'is_unique' => 'This email address is already in use.'
                ]
            ],
            // 'address' => 'required|min_length[4]|max_length[255]',
            // 'dob' => 'required|valid_date',
            // 'phone' => 'required|min_length[10]|max_length[15]',
            // 'specialist' => 'required|min_length[3]|max_length[255]',
            // 'qualification' => 'required|min_length[3]|max_length[255]',
            // 'schedule' => 'required|min_length[3]|max_length[255]',
            // 'about' => 'required|min_length[3]|max_length[255]',
            // 'specialistOrPractice' => 'required|integer',
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
        $about = $this->request->getPost("about");
        $image = $this->request->getFile("image");
        $specialistOrPractice = $this->request->getPost("specialistOrPractice");

        $monday_time = $this->request->getPost("monday_time");
        $tuesday_time = $this->request->getPost("tuesday_time");
        $wednesday_time = $this->request->getPost("wednesday_time");
        $thursday_time = $this->request->getPost("thursday_time");
        $friday_time = $this->request->getPost("friday_time");
        $saturday_time = $this->request->getPost("saturday_time");
        $sunday_time = $this->request->getPost("sunday_time");
        $schedule_id = $this->request->getPost("schedule_id");


        $doctorModel = new DoctorModel();
        $userModel = new UserModel();
        $scheduleModel = new DoctorScheduleModel();

        // Doctor data array
        $doctorData = [
            'qualification' => $qualification,
            'specialist_of' => $specialist,
            'about' => $about,
            'schedule'=>null
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

        $scheduledata = [
            'monday' => $monday_time ?? null,
            'tuesday' => $tuesday_time ?? null,
            'wednesday' => $wednesday_time ?? null,
            'thursday' => $thursday_time ?? null,
            'friday' => $friday_time ?? null,
            'saturday' => $saturday_time ?? null,
            'sunday' => $sunday_time ?? null,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        
        // Remove null values from the array
        $scheduledata = array_filter($scheduledata);

        $scheduleUpdate = $scheduleModel->update($schedule_id,$scheduledata);
                       
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getExtension();
            $destinationPath = ROOTPATH . '../admin/public/images';
            $image->move($destinationPath, $imageName);
            $userData['profile'] = $imageName;
        }

        $userUpdateResult = $userModel->update($user_id, $userData);

        if ($doctorUpdateResult && $userUpdateResult && $scheduleUpdate ) {
            return redirect()->to(base_url() . session('prefix') . '/doctor')->with('edit_dr', 'Doctor Info Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function doctor_details($id)
    {

        if (!$id == null) {

            $doc = new DoctorModel;
            $doctorData = $doc->getDoctorById($id);
            $user_id = $doctorData['user_id'];
            $user = new UserModel;
            $schedule=  new DoctorScheduleModel();
            $schedules = $schedule->where('doctor_id', $id)->first();
            echo $schedule->getLastQuery();
            $doctor = $user->getUserById($user_id);
            $data = [
                'doctor' => $doctorData,
                'user' => $doctor,
                'schedule'=> $schedules
            ];
            return view('doctor/single_doctor_view.php', ['doctor' => $data]);
        } else {
            return view('doctor/single_doctor_view.php');
        }

    }

    public function doctor_delete($id)
    {
        $userModel = new UserModel();
        $doctorModel = new DoctorModel();
        $user = $doctorModel->find($id);
        $userfind = $user['user_id'];

        if ($doctorModel->delete($id) && $userModel->delete($userfind)) {

            return redirect()->to(base_url() . session('prefix') . '/doctor')->with('delete_dr', 'Doctor deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Doctor not found.');
        }
    }

    public function doctor_status()
    {

        $id = $this->request->getGet('id');
        $usermodel = new UserModel();

        if (!empty($id)) {

            $user = $usermodel->find($id);

            if ($user) {
                $newStatus = ($user['status'] == 'active') ? 'inactive' : 'active';

                $usermodel->update($id, ['status' => $newStatus]);
                return response()->setJSON(['status' => 'success', 'msg' => 'Doctor status changed.']);
            } else {
                return response()->setJSON(['status' => 'error', 'msg' => 'User not found...!']);
            }
        } else {
            return response()->setJSON(['status' => 'error', 'msg' => 'User not found...!']);
        }
    }



























}
