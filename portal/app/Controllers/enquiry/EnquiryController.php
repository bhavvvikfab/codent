<?php

namespace App\Controllers\Enquiry;

use App\Controllers\BaseController;
use App\Models\DoctorModel;
use App\Models\UserModel;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\ResponseInterface;

class EnquiryController extends BaseController
{
    public function all_enquiry()
    {
        return view('enquiry/enquiry.php');
    }

    public function add_enquiry(){
        $userModel=new UserModel();
        $Hospitals= $userModel->where('role', 2)
        ->where('status', 'active')
        ->findAll();
       
        $hospital_id=session('user_id');
        $Doctors = $userModel->where('hospital_id', $hospital_id)
        ->where('status', 'active')
        ->findAll();
        return view('enquiry/add_enquiry.php',['hospitals'=>$Hospitals,'doctors'=>$Doctors]);
    }

    public function store_enquiry(){
        $userModel = new EnquiryModel();
    
        $validationRules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'hospital' => 'required|min_length[3]|max_length[255]',
            'dob' => 'required|valid_date',
            'app_date' => 'required|valid_date',
            'phone' => 'required|min_length[10]|max_length[15]',
            'required_specialist' => 'required|min_length[3]|max_length[255]',
            'referral_doctor' => 'required',
            'note' => 'max_length[255]',
            'images[]' => 'uploaded[images.*]|max_size[images,10240]', 
        ];
    
        if (!$this->validate($validationRules)) {
            $validation = Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        // $doctorName = $this->request->getPost("name");
        // $email = $this->request->getPost("email");
        // $password = $this->request->getPost("password");
        // $address = $this->request->getPost("address");
        // $dob = $this->request->getPost("dob");
        // $phone = $this->request->getPost("phone");
        // $specialist = $this->request->getPost("required_specialist");
        // $schedule = $this->request->getPost("schedule");
        // $about = $this->request->getPost("note");
        // $app_date = $this->request->getPost("app_date"); 
        // $hospital_id = session('user_id');
        // $images = $this->request->getFiles("images");
    
        // // if ($image->isValid() && !$image->hasMoved()) {
        // //     $imageName = time() . '.' . $image->getExtension();
        // //     $image->move(ROOTPATH . 'public/images', $imageName);
        // // }
    
        // $data = [
        //     'hospital_id' => $hospital_id,
        //     'fullname' => $doctorName,
        //     'email' => $email,
        //     'address' => $address,
        //     'date_of_birth' => $dob,
        //     'phone' => $phone,
        //     'app_date' => $app_date, 
        // ];
    
        // $result = $userModel->insertUser($data);
    
   
        
    
        // if ($result) {
        //     return redirect()->to( base_url().''.session('prefix').'/'.'enquiry')->with('enquiry_add', 'Enquiry Register Successfully');
        // } else {
        //     return redirect()->back()->with('error', 'Something is wrong....Try again next time');
        // }

    }






















}
