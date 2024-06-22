<?php

namespace App\Controllers;

use App\Models\HospitalsModel;
use App\Models\UserModel;
use App\Models\Appointments;

use App\Models\DoctorModel;
use App\Models\EnquiryModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
class AppointmentController extends BaseController
{
    public function index()
    {
        $appointmentModel = new Appointments();
        

        // Fetch all appointments
        $data['appointments'] = $appointmentModel
        ->select('appointments.*,users.fullname,enquiries.patient_name')
        ->join('users','users.id=appointments.assigne_to')
        ->join('enquiries','enquiries.id=appointments.inquiry_id')
        ->findAll();

       

        return view('appointment/appointment', $data);

        
    }

    public function get_doctors_by_hospital($hospital_id)
{
    $userModel = new UserModel();
    $doctors = $userModel->where('hospital_id', $hospital_id)->findAll();
    return $this->response->setJSON($doctors);
}



    public function add_appointment_view()
    {
        $enquiryModel = new EnquiryModel();
        $userModel = new UserModel();
    
        // Fetch all enquiries with patient_name and referral_doctor
        $enquiries = $enquiryModel->findAll();
    
        // Fetch referral doctor names and IDs and add them to the enquiries array
        foreach ($enquiries as &$enquiry) {
            $referralDoctorId = $enquiry['referral_doctor'];
            if ($referralDoctorId) 
            {
                $referralDoctor = $userModel->find($referralDoctorId);
    
                if ($referralDoctor && isset($referralDoctor['id'], $referralDoctor['fullname'])) {
                    $enquiry['referral_doctor_id'] = $referralDoctor['id']; // Add ID to array
                    $enquiry['referral_doctor_name'] = $referralDoctor['fullname']; // Add name to array
                } else {
                    // Handle case where referral doctor is not found or structure is unexpected
                    $enquiry['referral_doctor_id'] = null;
                    $enquiry['referral_doctor_name'] = 'Unknown Doctor';
                }
            } 
            else 
            {
                // Handle case where referral_doctor is not set in enquiry
                $enquiry['referral_doctor_id'] = null;
                $enquiry['referral_doctor_name'] = 'No Referral Doctor';
            }
        }
    
        return view('appointment/add_appointment', ['enquiries' => $enquiries]);
    }
    

public function register_fun()
{
    $appointmentModel = new Appointments();
    $enquiryModel = new EnquiryModel();

    // Define validation rules
    // $validationRules = [
    //     'patient_name' => 'required|integer',
    //     'doctor_name' => 'required|integer',
    //     'appointment_slot' => 'required',
    //     'note' => 'permit_empty|string',
    //     // 'time' => 'required',
    //     'referral' => 'permit_empty|string'
    // ];

    // // Validate the request
    // if (!$this->validate($validationRules))
    // {
    //     // If validation fails, redirect back with input and errors
    //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    // }

    // Retrieve form data
    $patient_id = $this->request->getPost('patient_name');

    $enquiry = $enquiryModel->where('id', $patient_id)->first();

    if (!$enquiry) {
        return redirect()->back()->with('error', 'Invalid patient ID');
    }

    $hospital_id = $enquiry['hospital_id'];
    

    // print_r($defaultDateTime);die;
    $doctor_id = $this->request->getPost('doctor_name');
    $appointment_slot = $this->request->getPost('appointment_slot') ?? '';
    $note = $this->request->getPost('note');
    $method = $this->request->getPost('method');
    $instruction_for_lead = $this->request->getPost('instruction_for_lead');
    $contacted_via = $this->request->getPost('contacted_via');
    $assign_next_to = $this->request->getPost('assign_next_to');


    $data = [
        'inquiry_id' => $patient_id,
        'assigne_to' => $doctor_id,
        'schedule' => $appointment_slot,
        'note_for_team' => $note,
        'hospital_id' => $hospital_id,
        'method' => $method,
        'instruction_for_lead' => $instruction_for_lead,
        'contacted_via' => $contacted_via,
        'next_task_assign_to' => $assign_next_to,


    ];

    $result = $appointmentModel->insert($data);

    if ($result) {
        // If the insert is successful, redirect or show success message
        return redirect()->to('/appointment')->with('status', 'success');
    } else {
        // If there is an error, redirect or show error message
        return redirect()->to('/add_appointment')->with('status', 'error');
    }
}

    
public function editappoint($id)
{
    $appointmentModel = new Appointments();
    $enquiryModel = new EnquiryModel();
    $userModel = new UserModel();

    // Fetch the specific appointment by ID with joined data
    $appointment = $appointmentModel
        ->select('appointments.*, users.fullname as doctor_name, enquiries.patient_name, enquiries.hospital_id')
        ->join('users', 'users.id = appointments.assigne_to', 'left')
        ->join('enquiries', 'enquiries.id = appointments.inquiry_id', 'left')
        ->where('appointments.id', $id)
        ->first();

    if ($appointment) {
        // Fetch all patients for the dropdown
        $patients = $enquiryModel->findAll();

        // Fetch doctors based on the hospital ID of the selected patient
        $doctors = $userModel->where('hospital_id', $appointment['hospital_id'])->findAll();

        // Pass the appointment, patients, and doctors data to the edit view
        return view('appointment/edit_appointment', [
            'appointment' => $appointment,
            'patients' => $patients,
            'doctors' => $doctors
        ]);
    } else {
        // Handle the case where the appointment is not found
        return redirect()->to('/appointments')->with('error', 'Appointment not found');
    }
}

    


    public function update_appointment_fun()
    {

        $appointmentModel = new Appointments();
        $enquiryModel = new EnquiryModel();
    
        // Define validation rules
        // $validationRules = [
        //     // 'appointment_id' => 'required|integer',
        //     // 'patient_name' => 'required|integer',
        //     // 'doctor_name' => 'required|integer',
        //     // 'appointment_slot' => 'required',
        //     'note' => 'permit_empty|string',
        //     // 'time' => 'required',
        //     'referral' => 'permit_empty|string'
        // ];
    
        // Validate the request
        // if (!$this->validate($validationRules)) {
        //     // If validation fails, redirect back with input and errors
        //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        // }
        $appointment_id = $this->request->getPost('id');
        // print_r($appointment_id );die;



        $patient_id = $this->request->getPost('patient_name');

    $enquiry = $enquiryModel->where('id', $patient_id)->first();

    if (!$enquiry) {
        return redirect()->back()->with('error', 'Invalid patient ID');
    }

    $hospital_id = $enquiry['hospital_id'];
    $defaultDateTime = date('Y-m-d H:i:s');

    // print_r($defaultDateTime);die;
    $doctor_id = $this->request->getPost('doctor_name');
    $appointment_slot = $this->request->getPost('appointment_slot') ?? '';
    if ($appointment_slot) {
        $dateTime = \DateTime::createFromFormat('d/m/Y h:i A', $appointment_slot);

        if ($dateTime) {
            $appointment_slot = $dateTime->format('Y-m-d H:i:s');
        } else {
            $appointment_slot = $defaultDateTime;
        }
    } else {
        $appointment_slot = $defaultDateTime;
    }


    $note = $this->request->getPost('note');
    $method = $this->request->getPost('method');
    $instruction_for_lead = $this->request->getPost('instruction_for_lead');
    $contacted_via = $this->request->getPost('contacted_via');
    $assign_next_to = $this->request->getPost('assign_next_to');


    $data = [
        'inquiry_id' => $patient_id,
        'assigne_to' => $doctor_id,
        'schedule' => $appointment_slot,
        'note_for_team' => $note,
        'hospital_id' => $hospital_id,
        'method' => $method,
        'instruction_for_lead' => $instruction_for_lead,
        'contacted_via' => $contacted_via,
        'next_task_assign_to' => $assign_next_to,


    ];
    
        // Update the data in the database
        if ($appointmentModel->update($appointment_id, $data)) {
            // If the update is successful, redirect or show success message
            return redirect()->to('/appointment')->with('status', 'success');
        } else {
            // If there is an error, redirect or show error message
            return redirect()->to('/edit_appointment/'.$appointment_id)->with('status', 'error');
        }
    }
    



    

    public function viewappoint_fun($id)
{

    $appointmentModel = new Appointments();

    // Fetch the specific appointment by ID with joined data
    $appointment = $appointmentModel
        ->select('appointments.*, users.fullname as doctor_name,users.profile, enquiries.*')
        ->join('users', 'users.id = appointments.assigne_to')
        ->join('enquiries', 'enquiries.id = appointments.inquiry_id')
        ->where('appointments.id', $id)
        ->first();
// echo "<pre>";
//         print_r($appointment);
// echo "</pre>";
// die;


    if ($appointment) {
        // Pass the appointment data to the view
        return view('appointment/view_appointment', ['appointment' => $appointment]);
    } else {
        // Handle the case where the appointment is not found
        return redirect()->to('/appointments')->with('error', 'Appointment not found');
    }
}

    public function deleteappoint_fun($id)
{
    $appointmentModel = new Appointments();

    // Fetch the specific appointment by ID
    $appointment = $appointmentModel->find($id);

    if ($appointment) {
        // Attempt to delete the appointment
        if ($appointmentModel->delete($id)) {
            // If the deletion is successful, redirect with a success message
            return redirect()->to('/appointment')->with('delete_status', 'success');
        } else {
            // If there is an error during deletion, redirect with an error message
            return redirect()->to('/appointment')->with('delete_status', 'error');
        }
    } else {
        // Handle the case where the appointment is not found
        return redirect()->to('/appointment')->with('delete_status', 'error');
    }

}






}
