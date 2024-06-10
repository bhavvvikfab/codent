<?php

namespace App\Controllers;

use App\Models\Appointments;
use App\Models\EnquiryModel;
use App\Models\UserModel;
use App\Models\DoctorModel;

// use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
{
    $appointmentModel = new Appointments();
    $enquiryModel = new EnquiryModel();
    $userModel = new UserModel();

    // Get current date components
    $currentYear = date('Y');

    // Fetch appointments month-wise
    $appointmentsByMonth = [];
    for ($month = 1; $month <= 12; $month++) {
        $monthAppointments = $appointmentModel
            ->where('MONTH(created_at)', $month)
            ->where('YEAR(created_at)', $currentYear)
            ->findAll();
        $appointmentsByMonth[$month] = $monthAppointments;
    }

    // Fetch enquiries month-wise
    $enquiriesByMonth = [];
    for ($month = 1; $month <= 12; $month++) {
        $monthEnquiries = $enquiryModel
            ->where('MONTH(created_at)', $month)
            ->where('YEAR(created_at)', $currentYear)
            ->findAll();
        $enquiriesByMonth[$month] = $monthEnquiries;
    }

    // Fetch users month-wise
    $usersByMonth = [];
    for ($month = 1; $month <= 12; $month++) {
        $monthUsers = $userModel
            ->where('MONTH(created_at)', $month)
            ->where('YEAR(created_at)', $currentYear)
            ->findAll();
        $usersByMonth[$month] = $monthUsers;
    }

    // Count total appointments, enquiries, and users
    $countAppointments = $appointmentModel->countAll(); 
    $countEnquiries = $enquiryModel->countAll(); 
    $countUsers = $userModel->countAll();

    // Find all appointments, enquiries, and users
    

    // Additional data for appointments
    $appointments = $appointmentModel
        ->select('appointments.*, users.fullname as user_name,users.email,enquiries.*,')
        ->join('users', 'appointments.assigne_to = users.id')
        ->join('enquiries', 'appointments.inquiry_id = enquiries.id')
        ->findAll();
    // $countAppointments = count($appointments);

    // echo "<pre>";
    // print_r($appointments);
    // echo "</pre>";
    // die;


    // Prepare data to return
    $data = [
        'appointments' => [
            'by_month' => $appointmentsByMonth,
        ],
        'enquiries' => [
            'by_month' => $enquiriesByMonth,
        ],
        'users' => [
            'by_month' => $usersByMonth,
        ],
    ];

    return view('dashboard', [
        'data' => $data,
        'countApp' => $countAppointments,
        'countEn' => $countEnquiries,
        'countUsers' => $countUsers,
        'appointments' => $appointments
    ]);
}

        
//     private function combineWithEnquiriesAndDoctors($appointments, $enquiryModel, $doctorModel, $userModel)
// {
//     foreach ($appointments as &$appointment) {
//         // Combine with enquiry
//         $appointment['enquiry'] = $enquiryModel->find($appointment['inquiry_id']);

//         // Combine with doctor
//         if (isset($appointment['assigne_to'])) {
//             $appointment['doctor'] = $doctorModel->where('user_id', $appointment['assigne_to'])->first();

//             if ($appointment['doctor']) {
//                 $dr_id = $appointment['doctor']['user_id'];
//                 $doctorData = $userModel->find($dr_id);
//                 if ($doctorData) {
//                     $appointment['doctor']['doctor_data'] = $doctorData;
//                 } else {
//                     // Handle case where doctor data is null
//                     $appointment['doctor']['doctor_data'] = null;
//                 }
//             } else {
//                 // Handle case where doctor is null
//                 $appointment['doctor'] = null;
//             }
//         } else {
//             // Handle case where assignee is not set
//             $appointment['doctor'] = null;
//         }
//     }
//     return $appointments;
// }





}  


























    // use ResponseTrait;
    
    // public function index()
    // {
    //     $appointmentModel = new Appointments();
    //     $enquiryModel = new EnquiryModel();
    //     $userModel = new UserModel();

    //     // Get total counts
    //     $countAppointments = $appointmentModel->countAll(); 
    //     $countEnquiries = $enquiryModel->countAll(); 
    //     $countUsers = $userModel->countAll(); 

    //     // Get monthly counts
    //     $appointments = $appointmentModel->getMonthlyCounts();
    //     $enquiries = $enquiryModel->getMonthlyCounts();
    //     $users = $userModel->getMonthlyCounts();

    //     // Prepare data for the chart
    //     $months = [];
    //     $appointmentData = [];
    //     $enquiryData = [];
    //     $userData = [];

    //     foreach ($appointments as $appointment) {
    //         $months[] = $appointment['month'];
    //         $appointmentData[] = $appointment['count'];
    //     }

    //     foreach ($enquiries as $enquiry) {
    //         $enquiryData[] = $enquiry['count'];
    //     }

    //     foreach ($users as $user) {
    //         $userData[] = $user['count'];
    //     }

    //     // Ensure all arrays have the same length
    //     $maxLength = max(count($appointmentData), count($enquiryData), count($userData));
    //     $months = array_pad($months, $maxLength, end($months));
    //     $appointmentData = array_pad($appointmentData, $maxLength, 0);
    //     $enquiryData = array_pad($enquiryData, $maxLength, 0);
    //     $userData = array_pad($userData, $maxLength, 0);

    //     // Prepare data to return
    //     $data = [
    //         'appointments' => [],
    //         'enquiries' => [],
    //         'users' => [],
    //         'countApp' => $countAppointments,
    //         'countEn' => $countEnquiries,
    //         'countUsers' => $countUsers,
    //         'months' => json_encode($months),
    //         'appointmentData' => json_encode($appointmentData),
    //         'enquiryData' => json_encode($enquiryData),
    //         'userData' => json_encode($userData),
    //     ];

    //     return view('dashboard', $data);
    // }

    // public function filter($filter)
    // {
    //     $appointmentModel = new Appointments();
    //     $enquiryModel = new EnquiryModel();
    //     $userModel = new UserModel();

    //     $today = date('Y-m-d');
    //     $currentMonth = date('m');
    //     $currentYear = date('Y');

    //     $countAppointments = 0;
    //     $countEnquiries = 0;
    //     $countUsers = 0;
        
    //     switch ($filter) {
    //         case 'today':
    //             $countAppointments = $appointmentModel->where('DATE(created_at)', $today)->countAllResults();
    //             $countEnquiries = $enquiryModel->where('DATE(created_at)', $today)->countAllResults();
    //             $countUsers = $userModel->where('DATE(created_at)', $today)->countAllResults();
    //             break;

    //         case 'this-month':
    //             $countAppointments = $appointmentModel->where('MONTH(created_at)', $currentMonth)->where('YEAR(created_at)', $currentYear)->countAllResults();
    //             $countEnquiries = $enquiryModel->where('MONTH(created_at)', $currentMonth)->where('YEAR(created_at)', $currentYear)->countAllResults();
    //             $countUsers = $userModel->where('MONTH(created_at)', $currentMonth)->where('YEAR(created_at)', $currentYear)->countAllResults();
    //             break;

    //         case 'this-year':
    //             $countAppointments = $appointmentModel->where('YEAR(created_at)', $currentYear)->countAllResults();
    //             $countEnquiries = $enquiryModel->where('YEAR(created_at)', $currentYear)->countAllResults();
    //             $countUsers = $userModel->where('YEAR(created_at)', $currentYear)->countAllResults();
    //             break;
    //     }

    //     // Prepare the response
    //     $response = [
    //         'countApp' => $countAppointments,
    //         'countEn' => $countEnquiries,
    //         'countUsers' => $countUsers,
    //     ];

    //     return $this->respond($response);
    // }
      
    // public function index()
    // {
    //     $appointmentModel = new Appointments();
    //     $enquiryModel = new EnquiryModel();
    //     $userModel = new UserModel();

    //     $countAppointments = $appointmentModel->countAll(); 
    //         $countEnquiries = $enquiryModel->countAll(); 
    //         $countUsers = $userModel->countAll(); 

    //     $appointments = $appointmentModel->getMonthlyCounts();
    //     $enquiries = $enquiryModel->getMonthlyCounts();
    //     $users = $userModel->getMonthlyCounts();

    //     // Prepare data for the chart
    //     $months = [];
    //     $appointmentData = [];
    //     $enquiryData = [];
    //     $userData = [];

    //     foreach ($appointments as $appointment) {
    //         $months[] = $appointment['month'];
    //         $appointmentData[] = $appointment['count'];
    //     }

    //     foreach ($enquiries as $enquiry) {
    //         $enquiryData[] = $enquiry['count'];
    //     }

    //     foreach ($users as $user) {
    //         $userData[] = $user['count'];
    //     }

    //     // Ensure all arrays have the same length
    //     $maxLength = max(count($appointmentData), count($enquiryData), count($userData));
    //     $months = array_pad($months, $maxLength, end($months));
    //     $appointmentData = array_pad($appointmentData, $maxLength, 0);
    //     $enquiryData = array_pad($enquiryData, $maxLength, 0);
    //     $userData = array_pad($userData, $maxLength, 0);

    //     return view('dashboard', [
    //         'months' => json_encode($months),
    //         'appointmentData' => json_encode($appointmentData),
    //         'enquiryData' => json_encode($enquiryData),
    //         'userData' => json_encode($userData),
    //         'countApp' => $countAppointments,
    //         'countEn' => $countEnquiries,
    //         'countUsers' => $countUsers,
    //     ]);
    // }

    

//     public function fetchChartData()
// {
//     // Load the models
//     $appointmentsModel = new Appointments();
//     $enquiryModel = new EnquiryModel();
//     $userModel = new UserModel();

//     // Fetch data from the database
//     $data['appointments'] = $appointmentsModel->findAll();
//     $data['enquiries'] = $enquiryModel->findAll();
//     $data['users'] = $userModel->find();

//     // Return the data as JSON
//     return $this->response->setJSON($data);
// }


