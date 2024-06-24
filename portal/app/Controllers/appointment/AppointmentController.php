<?php

namespace App\Controllers\Appointment;

use App\Controllers\BaseController;
use App\Models\AppointmentModel;
use App\Models\DoctorModel;
use App\Models\EnquiryModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AppointmentController extends BaseController
{
    public function all_appointment()
    {
        $inquiryModel = new EnquiryModel();
        $appointmentModel = new AppointmentModel();
        if(session('user_role')==2){
            $hospitalId = session('user_id');
        }else{
            $hospitalId = session('hospital_id');
        }
        
        $appointments = $appointmentModel
                        ->where('hospital_id', $hospitalId)
                        ->orderBy('created_at', 'DESC')
                        ->findAll();
        
        $combinedData = [];
        foreach ($appointments as $appointment) {
            $inquiry = $inquiryModel->find($appointment['inquiry_id']);
    
            $combinedData[] = [
                'appointment' => $appointment,
                'inquiry' => $inquiry
            ];
        }
    
        return view('appointment/appointment.php', ['data' => $combinedData]);
    }


    public function add_appointment()
    {
        $enquiryModel = new EnquiryModel();
        $userModel = new UserModel();
        if(session('user_role')==2){
            $hospitalId = session('user_id');
        }else{
            $hospitalId = session('hospital_id');
        }
        $enquiries = $enquiryModel->groupStart()
                                    ->Where('status', 'lead')
                                    ->where('hospital_id', $hospitalId)
                                    ->groupEnd()
                                    ->findAll();

        // echo '<pre>';
        // print_r($enquiries);
        // die;
        foreach ($enquiries as &$enquiry) {
            $referralDoctorId = $enquiry['referral_doctor'];
            if ($referralDoctorId) {
                $referralDoctor = $userModel->find($referralDoctorId);

                if ($referralDoctor && isset($referralDoctor['id'], $referralDoctor['fullname'])) {
                    $enquiry['referral_doctor_id'] = $referralDoctor['id'];
                    $enquiry['referral_doctor_name'] = $referralDoctor['fullname'];
                } else {

                    $enquiry['referral_doctor_id'] = null;
                    $enquiry['referral_doctor_name'] = 'Unknown Doctor';
                }
            } else {

                $enquiry['referral_doctor_id'] = null;
                $enquiry['referral_doctor_name'] = 'No Referral Doctor';
            }
        }
        return view('appointment/add_appointment.php', ['enquiries' => $enquiries]);
    }


    public function get_dr_from_enquiry()
    {
        $enq_id = $this->request->getGet('id');
        $enquiryModel = new EnquiryModel();
        $enquiry = $enquiryModel->find($enq_id);
        $hospital_id = $enquiry['hospital_id'];
        $userModel = new UserModel();
        if ($hospital_id) {
            // Assuming 'role' column values are integers
            $doctors = $userModel->where('hospital_id', $hospital_id)
                                ->whereIn('role', [3, 4])
                                ->where('status', 'active')
                                ->findAll();

            // Convert $doctors to JSON for response
            echo json_encode($doctors);
        }else{
            echo json_encode([]);
        }

    }

    public function store_appointment()
    {

        $appointmentModel = new AppointmentModel();
        $enquiryModel = new EnquiryModel();

        // Define validation rules
        // $validationRules = [
        //     // 'patient_name' => 'required',
        //     // 'doctor_name' => 'required',
        //     // 'appointment_slot' => 'required',
        //     // 'note' => 'permit_empty|string',
        //     // 'time' => 'required',
        //     // 'referral' => 'permit_empty|string'
        // ];

        // Validate the request
        // if (!$this->validate($validationRules)) {
        //     // If validation fails, redirect back with input and errors
        //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        // }

        // Retrieve form data
        $patient_id = $this->request->getPost('patient_name');

        // Find the enquiry by patient ID to get the hospital ID
        $enquiry = $enquiryModel->where('id', $patient_id)->first();
        
        if (!$enquiry) {
            // Handle the case where the enquiry is not found
            return redirect()->back()->with('error', 'Invalid patient ID');
        }
        // else{
        //     $enquiryModel->update($patient_id, ['status' => 'appointment']);
        // }

        $hospital_id = $enquiry['hospital_id'];

        // Retrieve other form data
        $doctor_id = $this->request->getPost('doctor_name');
        $appointment_slot = $this->request->getPost('appointment_slot');
        $note = $this->request->getPost('note');
        $method = $this->request->getPost('method');
        $next_task_assign = $this->request->getPost('assign_next_to');
        $instruction_for_lead = $this->request->getPost('instruction_for_lead');
        $contacted_via = $this->request->getPost('contacted_via');


        $data = [
            'inquiry_id' => $patient_id,
            'assigne_to' => $doctor_id,
            'schedule' => $appointment_slot,
            'note_for_team' => $note,
            'hospital_id' => $hospital_id,
            'method'=>$method,
            'next_task_assign_to'=>$next_task_assign,
            'instruction_for_lead'=>$instruction_for_lead,
            'contacted_via'=>$contacted_via

        ];

        $result = $appointmentModel->insert($data);

        if ($result) {
            // If the insert is successful, redirect or show success message
            return redirect()->to(base_url() . '' . session('prefix') . '/' . 'appointment')->with('status', 'success');
        } else {
            // If there is an error, redirect or show error message
            return redirect()->to(base_url() . '' . session('prefix') . '/' . 'appointment')->with('status', 'error');
        }
    }

    public function deleteAppointment($id){

        $appointmentModel = new AppointmentModel();
    
        $deleted = $appointmentModel->delete($id);
    
        if ($deleted) {
            return redirect()->back()->with('delete', 'Appointment deleted successfully.');
        } else {
            return redirect()->back()->with('delete', 'Failed to delete appointment.');
        }
    }

    public function view_Appointment($id){
        $inquiryModel = new EnquiryModel();
        $appointmentModel = new AppointmentModel();
        $userModel=new UserModel();
        $doctorModel=new DoctorModel();
        $appointment = $appointmentModel->find($id);
        
        $doctor = $doctorModel->where('user_id', $appointment['assigne_to'])->first();
        $doctor['data']= $userModel->find( $appointment['assigne_to']);
        $inquiry = $inquiryModel->find($appointment['inquiry_id']);
        $user_id=$inquiry['user_id'];
        $user = $userModel->find($user_id);
        $combinedData = [
            'appointment' => $appointment,
            'enquiry' => $inquiry,
            'patient'=> $user,
            'doctor'=>$doctor
        ];
    
        return view('appointment/view_appointment.php', ['data' => $combinedData]);
    }
    


    public function edit_appointment($id)
    {
        $appointmentModel = new AppointmentModel();
        $enquiryModel = new EnquiryModel();
        $userModel = new UserModel();

        $appointment=$appointmentModel->find($id);
        // Fetch the specific appointment by ID with joined data
        // $appointment = $appointmentModel
        //     ->select('appointments.*, users.fullname, enquiries.patient_name')
        //     ->join('users', 'users.id = appointments.assigne_to')
        //     ->join('enquiries', 'enquiries.id = appointments.inquiry_id')
        //     ->where('appointments.id', $id)
        //     ->first();
        if ($appointment) {
            
            $enquiry = $enquiryModel->find($appointment['inquiry_id']);
            if(session('user_role')==2){
                $hospitalId = session('user_id');
            }else{
                $hospitalId = session('hospital_id');
            }
            $enquirys = $enquiryModel->where('hospital_id', $hospitalId)->where('status', 'lead')->findAll();

            // $enquirys = $enquiryModel->findAll();
            $user=$appointment['assigne_to'];
            $doc = $userModel->find($user);
            return view('appointment/edit_appointment.php', [
                'appointment' => $appointment,
                'enquiry' => $enquiry,
                'enquirys' => $enquirys,
                'doctor' => $doc
            ]);
        } else {
            // Handle the case where the appointment is not found
            return redirect()->to('/appointment/appointmet.php')->with('error', 'Appointment not found');
        }
    }





    public function update_appointment()
    {

        $appointmentModel = new AppointmentModel();
        $enquiryModel = new EnquiryModel();


        // Retrieve form data
        $appointment_id = $this->request->getPost('id');
        $enquery_id = $this->request->getPost('patient_name');

        $enquiry = $enquiryModel->where('id', $enquery_id)->first();

        $hospital_id = $enquiry['hospital_id'];

        $doctor_id = $this->request->getPost('doctor_name');
        $appointment_slot = $this->request->getPost('schedule');
        $note = $this->request->getPost('note');

        $method = $this->request->getPost('method');
        $next_task_assign = $this->request->getPost('assign_next_to');
        $instruction_for_lead = $this->request->getPost('instruction_for_lead');
        $contacted_via = $this->request->getPost('contacted_via');

        $data = [
            'inquiry_id' => $enquery_id,
            'assigne_to' => $doctor_id,
            'schedule' => $appointment_slot,
            'note' => $note,
            'note_for_team' => $note,
            'hospital_id' => $hospital_id,
            'method'=>$method,
            'next_task_assign_to'=>$next_task_assign,
            'instruction_for_lead'=>$instruction_for_lead,
            'contacted_via'=>$contacted_via
        ];

        if ($appointmentModel->update($appointment_id, $data)) {

            return redirect()->to(base_url() . '' . session('prefix') . '/' . 'appointment')->with('edit_success', 'Appointmetn Updated Successfully.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function confirm_appointment(){

        $appointmentId = $this->request->getPost('appointmentId');
        $treatment_price = $this->request->getPost('treatment_price');
        $note_for_team = $this->request->getPost('note_for_team');
    
        $appointmentsModel = new AppointmentModel();
    
      
        if($appointmentId){
            $dataToUpdate = [
                'treatment_price' => $treatment_price,
                'note_for_team' => $note_for_team,
                'appointment_status'=>'Confirmed'
            ];
        
            $updated = $appointmentsModel->update($appointmentId, $dataToUpdate);
        
            if ($updated) {
                return $this->response->setJSON(['success' => true, 'message' => 'Appointment confirmed successfully']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to confirm appointment']);
            }
        }else{
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to confirm appointment']);
        }
      
    }

    public function cancel_appointment(){

        $appointmentId = $this->request->getPost('id');
        $appointmentsModel = new AppointmentModel();
        if($appointmentId){
            $result=$appointmentsModel->update($appointmentId,['appointment_status'=>'Cancelled']);
            if($result){
                return $this->response->setJSON(['success' => true, 'message' => 'Appointment Cancel successfully']);
            }else{
                return $this->response->setJSON(['success' => false, 'message' => 'Failed to Cancel appointment']);
            }
        }else{
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to Cancel appointment']);
            
        }
    }
    







}
