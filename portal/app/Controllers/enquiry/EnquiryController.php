<?php

namespace App\Controllers\Enquiry;

use App\Controllers\BaseController;
use App\Models\AppointmentModel;
use App\Models\DoctorModel;
use App\Models\EnquiryModel;
use App\Models\UserModel;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\ResponseInterface;

class EnquiryController extends BaseController
{
    public function all_enquiry()
    {
        $enquiryModel = new EnquiryModel();
        $enquiries = $enquiryModel->findAll();
        return view('enquiry/enquiry.php', ['enquiries' => $enquiries]);

    }

    public function view_enquiry($id)
    {
        $enquiryModel = new EnquiryModel();

        $enquiry = $enquiryModel->find($id);

        if ($enquiry) {
            $user_id = $enquiry['user_id'];

            $details = $enquiryModel->getEnquiryAndUserById($id, $user_id);

            $enquiryDetails = $details['enquiry'];
            $userDetails = $details['user'];

            return view('enquiry/view_enquiry.php', ['enquiry' => $enquiryDetails, 'user' => $userDetails]);
        }
    }

    public function delete_enquiry($id)
    {
        $enquiryModel = new EnquiryModel();
        $appointmentModel = new AppointmentModel();

        $appointment =
            $enquiry = $enquiryModel->find($id);
        if ($enquiry) {
            $appointment = $appointmentModel->where('inquiry_id', $enquiry['id'])->first();
            if ($appointment) {
                $appointmentModel->delete($appointment['id']);
            }
            if ($enquiryModel->delete($id)) {
                return redirect()->to(base_url() . '' . session('prefix') . '/' . 'enquiry')->with('success', 'Enquiry deleted successfully.');
            } else {
                return redirect()->to(base_url() . '' . session('prefix') . '/' . 'enquiry')->with('error', 'Failed to delete the enquiry. Please try again.');
            }
        } else {
            return redirect()->to(base_url() . '' . session('prefix') . '/' . 'enquiry')->with('error', 'Enquiry not found.');
        }
    }
    public function add_enquiry()
    {
        $userModel = new UserModel();
        $Hospitals = $userModel->where('role', 2)
            ->where('status', 'active')
            ->findAll();

        $hospital_id = session('user_id');
        $Doctors = $userModel->where('hospital_id', $hospital_id)
            ->where('status', 'active')
            ->groupStart()
            ->where('role', 4)
            ->orWhere('role', 3)
            ->groupEnd()
            ->findAll();
        return view('enquiry/add_enquiry.php', ['hospitals' => $Hospitals, 'doctors' => $Doctors]);
    }

    public function store_enquiry()
    {
        $enquiryModel = new EnquiryModel();

        $validationRules = [
            'patient_name' => 'required|min_length[3]|max_length[255]',
            'dob' => 'required|valid_date',
            'app_date' => 'required|valid_date',
            'phone' => 'required|min_length[10]|max_length[15]',
        ];
        if (session('user_role') == 6) {
            $validationRules['hospital'] = 'required|min_length[1]|max_length[255]';
        }

        if (!$this->validate($validationRules)) {
            $validation = Services::validation();
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $patient_name = $this->request->getPost("patient_name");
        $dob = $this->request->getPost("dob");
        $phone = $this->request->getPost("phone");
        $specialist = $this->request->getPost("required_specialist");
        $note = $this->request->getPost("note");
        $app_date = $this->request->getPost("app_date");
        $ref_doctor = $this->request->getPost("referral_doctor");

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

        $images = $this->request->getFiles("images");
        $profile = $this->request->getFile("profile");
        if ($profile) {
            if ($profile->isValid() && !$profile->hasMoved()) {
                $profileName = time() . '_' . uniqid() . '.' . $profile->getExtension();
                $destinationPath = ROOTPATH . '../admin/public/images';
                $profile->move($destinationPath, $profileName);
                $data['profile'] = $profileName;
            }
        }

        $uploadedImages = [];
        if ($images) {
            foreach ($images['images'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $imageName = time() . '_' . uniqid() . '.' . $image->getExtension();
                    $destinationPath = ROOTPATH . '../admin/public/images';
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
        $result = $enquiryModel->insertEnquiry($data);

        if ($result) {
            return redirect()->to(base_url() . '' . session('prefix') . '/' . 'enquiry')->with('success', 'Enquiry Register Successfully');
        } else {
            return redirect()->back()->with('error', 'Something is wrong....Try again next time');
        }

    }

    public function edit_enquiry($id)
    {

        $enquiryModel = new EnquiryModel();

        $enquiry = $enquiryModel->find($id);

        if ($enquiry) {
            $user_id = $enquiry['user_id'];

            $details = $enquiryModel->getEnquiryAndUserById($id, $user_id);

            $enquiryDetails = $details['enquiry'];
            $userDetails = $details['user'];

            return view('enquiry/edit_enquiry.php', ['enquiry' => $enquiryDetails, 'user' => $userDetails]);
        }
    }

    public function convert_into_lead()
    {
        $id = $this->request->getPost('id');
        $enquiryModel = new EnquiryModel();
        $updated = $enquiryModel->Enquiry_Status_update($id, 'lead');

        if ($updated) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }


    public function update_enquiry()
{
    $enquiryModel = new EnquiryModel();

    // Get data from POST request
    $id = $this->request->getPost("id");
    $patient_name = $this->request->getPost("patient_name");
    $dob = $this->request->getPost("dob");
    $phone = $this->request->getPost("phone");
    $specialist = $this->request->getPost("required_specialist");
    $note = $this->request->getPost("note");
    $app_date = $this->request->getPost("app_date");
    $gender = $this->request->getPost("gender");
    $age = $this->request->getPost("age");
    $email = $this->request->getPost("email");
    $address = $this->request->getPost("address");

    if ($id) {
        $data = [
            'patient_name' => $patient_name,
            'date_of_birth' => $dob,
            'required_specialist' => $specialist,
            'phone' => $phone,
            'appointment_date' => $app_date,
            'note' => $note,
            'age' => $age,
            'email' => $email,
            'gender' => $gender,
            'address' => $address
        ];

        $profile = $this->request->getFile("profile");
        if ($profile && $profile->isValid() && !$profile->hasMoved()) {
            $profileName = time() . '_' . uniqid() . '.' . $profile->getExtension();
            $destinationPath = ROOTPATH . '../admin/public/images';
            $profile->move($destinationPath, $profileName);
            $data['profile'] = $profileName;
        }

        $images = $this->request->getFiles("images");
        $uploadedImages = [];
        if ($images) {
            foreach ($images['images'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $imageName = time() . '_' . uniqid() . '.' . $image->getExtension();
                    $destinationPath = ROOTPATH . '../admin/public/images';
                    $image->move($destinationPath, $imageName);
                    $uploadedImages[] = $imageName;
                }
            }
        }

        if (!empty($uploadedImages)) {
            $data['image'] = json_encode($uploadedImages);
        }

        $result = $enquiryModel->where('id', $id)->set($data)->update();

        if ($result) {
            return redirect()->to(base_url() . '' . session('prefix') . '/' . 'enquiry')->with('success', 'Enquiry updated successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    return redirect()->back()->with('error', 'Invalid ID. Please try again.');
}























}
