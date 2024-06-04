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
    public function index() {
        $appointmentModel = new Appointments();
        $enquiryModel = new EnquiryModel();
        $doctorModel = new DoctorModel();
        $userModel = new UserModel();
        
        // Get current date components
        $today = date('Y-m-d');
        $currentMonth = date('m');
        $currentYear = date('Y');
        
        // Filter appointments
        $appointmentsToday = $appointmentModel->where('DATE(created_at)', $today)->findAll();
        $appointmentsThisMonth = $appointmentModel->where('MONTH(created_at)', $currentMonth)->where('YEAR(created_at)', $currentYear)->findAll();
        $appointmentsThisYear = $appointmentModel->where('YEAR(created_at)', $currentYear)->findAll();
        $allAppointments = $appointmentModel->findAll();
        
        // Combine with enquiries and doctors
        $appointmentsTodayCombined = $this->combineWithEnquiriesAndDoctors($appointmentsToday, $enquiryModel, $doctorModel, $userModel);
        $appointmentsThisMonthCombined = $this->combineWithEnquiriesAndDoctors($appointmentsThisMonth, $enquiryModel, $doctorModel, $userModel);
        $appointmentsThisYearCombined = $this->combineWithEnquiriesAndDoctors($appointmentsThisYear, $enquiryModel, $doctorModel, $userModel);
        $allAppointmentsCombined = $this->combineWithEnquiriesAndDoctors($allAppointments, $enquiryModel, $doctorModel, $userModel);
        
        // Filter enquiries
        $enquiriesToday = $enquiryModel->where('DATE(created_at)', $today)->findAll();
        $enquiriesThisMonth = $enquiryModel->where('MONTH(created_at)', $currentMonth)->where('YEAR(created_at)', $currentYear)->findAll();
        $enquiriesThisYear = $enquiryModel->where('YEAR(created_at)', $currentYear)->findAll();
        $allEnquiries = $enquiryModel->findAll();
        
        // Filter users
        $usersToday = $userModel->where('DATE(created_at)', $today)->findAll();
        $usersThisMonth = $userModel->where('MONTH(created_at)', $currentMonth)->where('YEAR(created_at)', $currentYear)->findAll();
        $usersThisYear = $userModel->where('YEAR(created_at)', $currentYear)->findAll();
        $allUsers = $userModel->findAll();


                $countAppointments = $appointmentModel->countAll(); 
                $countEnquiries = $enquiryModel->countAll(); 
                $countUsers = $userModel->countAll(); 
        
        // Prepare data to return
        $data = [
            'appointments' => [
                'today' => $appointmentsTodayCombined,
                'this_month' => $appointmentsThisMonthCombined,
                'this_year' => $appointmentsThisYearCombined,
                'all' => $allAppointmentsCombined,
            ],
            'enquiries' => [
                'today' => $enquiriesToday,
                'this_month' => $enquiriesThisMonth,
                'this_year' => $enquiriesThisYear,
                'all' => $allEnquiries,
            ],
            'users' => [
                'today' => $usersToday,
                'this_month' => $usersThisMonth,
                'this_year' => $usersThisYear,
                'all' => $allUsers,
            ]
        ];
        
        
        return view('dashboard', ['data' => $data,
                'countApp' => $countAppointments,
                'countEn' => $countEnquiries,
                'countUsers' => $countUsers,]);
        
    }
    
    private function combineWithEnquiriesAndDoctors($appointments, $enquiryModel, $doctorModel, $userModel)
{
    foreach ($appointments as &$appointment) {
        // Combine with enquiry
        $appointment['enquiry'] = $enquiryModel->find($appointment['inquiry_id']);

        // Combine with doctor
        if (isset($appointment['assigne_to'])) {
            $appointment['doctor'] = $doctorModel->where('user_id', $appointment['assigne_to'])->first();

            if ($appointment['doctor']) {
                $dr_id = $appointment['doctor']['user_id'];
                $doctorData = $userModel->find($dr_id);
                if ($doctorData) {
                    $appointment['doctor']['doctor_data'] = $doctorData;
                } else {
                    // Handle case where doctor data is null
                    $appointment['doctor']['doctor_data'] = null;
                }
            } else {
                // Handle case where doctor is null
                $appointment['doctor'] = null;
            }
        } else {
            // Handle case where assignee is not set
            $appointment['doctor'] = null;
        }
    }
    return $appointments;
}





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


