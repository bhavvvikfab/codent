<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\HospitalsModel;
use App\Models\DoctorModel;
use App\Models\EnquiryModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Config\Services;


class EnquiryController extends BaseController
{
    public function index()
    {
        $userModel = new EnquiryModel();


        $data['enquiries'] = $userModel->findAll();


        return view('enquiry/eqnuiry_view',$data);
    }


   public function add_enquiries_view()
{
    $userModel = new UserModel();
    $hospitalModel = new HospitalsModel();

    // Fetch all users with role 2 (hospitals)
    $users = $userModel->where('role', 2)->findAll();

    // Collect user IDs
    $userIds = array_column($users, 'id');

    // Fetch all hospitals where user_id is in the list of user IDs
    $hospitals = [];
    if (!empty($userIds)) {
        $hospitals = $hospitalModel->whereIn('hospital_id', $userIds)->findAll();
    }

    // Pass the data to the view
    $data['hospitals'] = $hospitals;

    return view('enquiry/add_eqnuiry_view', $data);
}


public function get_doctors($hospitalId)
    {

        $userModel = new UserModel();

        // Fetch all doctors for the selected hospital with roles 3 and 4
        $doctors = $userModel->select('id, fullname')
                     ->where('hospital_id', $hospitalId)
                     ->whereIn('role', [3, 4])
                     ->findAll();


        // Return the doctors as JSON response
        return $this->response->setJSON($doctors);
    }



    public function add_Enquery_fun()
{

    // $validation = Services::validation(); // Load validation service

    // // Define validation rules
    // $validation->setRules([
    //     // 'hospital' => 'required',
    //     'name' => 'required',
    //     'dob' => 'required',
    //     'appointment_date' => 'required',
    //     'phone' =>['label' => 'Phone Number', 'rules' => 'required|numeric|min_length[10]|max_length[15]'],
    //     'note' => 'required',
    //     'specialty' => 'required',
    //     // 'doctor' => 'required',
    //     // 'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
    // ]);


    // Check if the form data passes the validation rules
    // if (!$validation->withRequest($this->request)->run()) {
    //     // Validation failed, return back with errors
    //     return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    // }

    // Validation passed, proceed with inserting data
    $enquiryModel = new EnquiryModel();

    // Get form data
    $userId = session()->get('id');
    $hospitalId = $this->request->getPost('hospital');
    $name = $this->request->getPost('name');
    $dob = $this->request->getPost('dob');
    $appointment_date = $this->request->getPost('appointment_date');
    $phone = $this->request->getPost('phone');
    $note = $this->request->getPost('note');
    $specialty = $this->request->getPost('specialty');
    $doctor = $this->request->getPost('doctor');

 


    // Prepare data for insertion
    $data = [
        'user_id'=>$userId,
        'hospital_id' => $hospitalId,
        'patient_name' => $name,
        'date_of_birth' => $dob,
        'appointment_date' => $appointment_date,
        'phone' => $phone,
        'note' => $note,
        'required_specialist' => $specialty,
        'referral_doctor' => $doctor,
        // Image path to be inserted into the database
    ];

    $images = $this->request->getFiles('images');
    $uploadedImages = [];

    if ($images && isset($images['images'])) {
        foreach ($images['images'] as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getExtension();
                $destinationPath = ROOTPATH . 'public/images';
                $image->move($destinationPath, $imageName);
                $uploadedImages[] = $imageName;
            }
        }
        $data['image'] = json_encode($uploadedImages);
    }



    // Insert data into the database
    $inserted = $enquiryModel->insert($data);

    if ($inserted) {
        // Data inserted successfully
        return redirect()->to('/enquiries')->with('status','success');
    } else {
        // Error while inserting data
        return redirect()->to('/add_enquiries')->with('status','error');
    }

   
}

public function editEnquiry_fun()
{
    $id = $this->request->getGet('id');
    $enquiryModel = new EnquiryModel();
    $hospitalModel = new HospitalsModel(); // Adjust as per your actual model name
    $userModel = new UserModel();

    // Get the current hospital ID from your enquiries data (adjust this as per your data structure)
    $enquiry = $enquiryModel->find($id);
    $currentHospitalId = $enquiry['hospital_id'] ?? null;

    // Fetch only doctors from the current hospital with roles 3 or 4
    if ($currentHospitalId) {
        $data['doctors'] = $userModel->findDoctorsByHospitalAndRoles($currentHospitalId);
    } else {
        // If hospital ID is not available, fetch all doctors
        $data['doctors'] = $userModel->findAllDoctors();
    }


    $data['enquiries'] = $enquiryModel->where('id', $id)->findAll();
    $data['hospitals'] = $hospitalModel->findAllHospitals(); // Fetch all hospitals
    // echo "<pre>";
    // print_r($data['enquiries']);
    // echo "</pre>";

    // die;


    return view('enquiry/edit_eqnuiry_view', $data);
}


public function getDoctorsByHospital($hospitalId)
{
    $userModel = new UserModel();

    // Fetch doctors for the selected hospital with roles 3 and 4
    $doctors = $userModel->select('id, fullname')
                         ->where('hospital_id', $hospitalId)
                         ->whereIn('role', [3, 4])
                         ->findAll();

    // Return the doctors as JSON response
    return $this->response->setJSON($doctors);
}




    public function viewEnquiry_fun()
    {
        $id = $this->request->getGet('id');
    
        $enquiryModel = new EnquiryModel();
        $enquiryData = $enquiryModel->where('id', $id)->findAll();

    
        $userModel = new UserModel();
        $doctorName = '';
    
        if (!empty($enquiryData)) {
            $doctorId = $enquiryData[0]['referral_doctor'];
            $doctor = $userModel->where('id', $doctorId)->first();
    
            if ($doctor) {
                $doctorName = $doctor['fullname'];
            }
        }
    
        $data = [
            'enquiries' => $enquiryData,
            'doctorName' => $doctorName
        ];
    
        return view('enquiry/view_eqnuiry', $data);
    }
    


    


    
    public function deleteEnquiry_fun()
    {
        $enquiryModel = new EnquiryModel();

        $id  =  $this->request->getGet('id');

        $enquiry = $enquiryModel->find($id);

        if ($enquiry) {
            if ($enquiryModel->delete($id)) {
                return redirect()->to('enquiries')->with('delete_status', 'success');
            } else {
                return redirect()->to('enquiries')->with('delete_status', 'error');
            }
        } else 
        {
            return redirect()->to('enquiries')->with('delete_status', 'error');
        }
    }



    public function update_enquiry_fun()
    {

        $enquiryModel = new EnquiryModel();

        $validationRules = [
            // 'hospital_id' => 'required|integer',
            'name' => 'required|string|max_length[255]',
            'dob' => 'required|valid_date',
            'appointment_date' => 'required|valid_date',
            'phone' => 'required|string|max_length[20]',
            // 'note' => 'permit_empty|string',
            'required_specialist' => 'required|string|max_length[255]',
            // 'doctor_id' => 'required|integer',
            'images' => 'permit_empty|uploaded[images.*]|max_size[images.*,2048]|is_image[images.*]|mime_in[images.*,image/jpg,image/jpeg,image/png,image/gif]'
        ];

        // Validate input data
        if (!$this->validate($validationRules)) {
            // Validation failed
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }



        $id =  $this->request->getPost('id');



    $data = [
        'hospital_id' => $this->request->getPost('hospital_id'),
        'patient_name' => $this->request->getPost('name'),
        'date_of_birth' => $this->request->getPost('dob'),
        'appointment_date' => $this->request->getPost('appointment_date'),
        'phone' => $this->request->getPost('phone'),
        'note' => $this->request->getPost('note'),
        'required_specialist' => $this->request->getPost('required_specialist'),
        'referral_doctor' => $this->request->getPost('doctor_id'),
    ];
//     echo '<pre>';
//     print_r($data);
//     echo '</pre>';

// die;


    $images = $this->request->getFiles('images');
$uploadedImages = [];

// Check if new images are uploaded
if ($images && isset($images['images'])) {
    foreach ($images['images'] as $image) {
        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getExtension();
            $destinationPath = ROOTPATH . 'public/images';
            $image->move($destinationPath, $imageName);
            $uploadedImages[] = $imageName;
        }
    }
}

// Update image data only if new images are uploaded
if (!empty($uploadedImages)) {
    $data['image'] = json_encode($uploadedImages);
}

    $result = $enquiryModel->update($id, $data);

    if ( $result) {
        // Success message
        return redirect()->to('/enquiries')->with('update_status', 'success');
    } else {
        // Error message
        return redirect()->back()->with('error', 'something is wrong');

    }


        
    }
   
  



    

    
}
