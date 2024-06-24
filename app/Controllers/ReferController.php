<?php

namespace App\Controllers;
use App\Models\EnquiryModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ReferController extends BaseController
{
    public function index()
    {
        $id = session()->get('user_id');

        // print_r($id );die;

        if (!$id == '') 
        {
            return view('make_refer_page');
        }
        else 
        {
            return view('login_page');

        }
        
    }

    public function add_enquiry_fun()
    {
        $enquiryModel = new EnquiryModel();

        

        $patient_name = $this->request->getPost("name");
        $dob = $this->request->getPost("dob");
        $phone = $this->request->getPost("number");
        $specialist = $this->request->getPost("referral_type");
        $note = $this->request->getPost("referring_dentist_practice");
        $app_date = $this->request->getPost("app_date");
        $ref_doctor = $this->request->getPost("referring_dentist_name");

        $gender = $this->request->getPost("gender");
        $age = $this->request->getPost("age");
        $email = $this->request->getPost("email");
        $address = $this->request->getPost("address");



        $data = [
            'patient_name' => $patient_name,
            'date_of_birth' => $dob,
            'required_specialist' => $specialist,
            'phone' => $phone,
            'appointment_date' => $app_date,
            'note' => $note,
            'referral_doctor' => $ref_doctor,
            'age' => $age,
            'email' => $email,
            'gender' => $gender,
            'address' => $address

        ];

        // print_r($data);die;

        $images = $this->request->getFiles("images");
        // $profile = $this->request->getFile("profile");
        // if ($profile) {
        //     if ($profile->isValid() && !$profile->hasMoved()) {
        //         $profileName = time() . '_' . uniqid() . '.' . $profile->getExtension();
        //         $destinationPath = ROOTPATH . 'public/images';
        //         $profile->move($destinationPath, $profileName);
        //         $data['profile'] = $profileName;
        //     }
        // }

        $uploadedImages = [];
        if ($images) {
            foreach ($images['images'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $imageName = time() . '_' . uniqid() . '.' . $image->getExtension();
                    $destinationPath = ROOTPATH . 'public/images';
                    $image->move($destinationPath, $imageName);
                    $uploadedImages[] = $imageName;
                }
            }
        }
        if (!empty($uploadedImages)) {
            $data['image'] = json_encode($uploadedImages);
        }
        if (session('user_role') == 2) {

            $data['hospital_id'] = session('user_id');
            $data['user_id'] = session('user_id');

        }
        if (session('user_role') == 6) {

            $user_hospital = $this->request->getPost("hospital");
            $user_id = $this->request->getPost("user_id");
            if ($user_id) {
                $data['user_id'] = $user_id;
                $data['hospital_id'] = $user_hospital;
            }
        }
        $result = $enquiryModel->insert($data);

        if ($result) {
            return 'success';
            // return redirect()->to(base_url() . '' . session('prefix') . '/' . 'enquiry')->with('success', 'Enquiry Register Successfully');
        } else {
            return 'error';

            // return redirect()->back()->with('error', 'Something is wrong....Try again next time');
        }



    }

    public function checkEmailExist()
{
    $email = $this->request->getPost('email');
    $userModel = new EnquiryModel();
    
    $emailExists = $userModel->where('email', $email)->first();

    return $this->response->setJSON(['exists' => $emailExists ? true : false]);
}




}
