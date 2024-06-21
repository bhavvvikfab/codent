<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ActivePlanHospital;
use App\Models\AppointmentModel;
use App\Models\DoctorModel;
use App\Models\EnquiryModel;
use App\Models\NotificationModel;
use App\Models\PackagesModel;
use App\Models\UserModel;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $packageHospitalModel=new ActivePlanHospital();
        $packageModel=new PackagesModel();
        $email = session()->get('email');
        $allPackage=$packageModel->findAll();
        $userData = $userModel->where('email', $email)->first();
        if(session('user_role') == 2 ){
            $id=$userData['id'];
        }else{
            $id=$userData['hospital_id'];
        }
        $Activepackage = $packageHospitalModel->where('hospital_id',$id)->first();
        $Activepackage['package'] = $packageModel->where('id',$Activepackage['package_id'])->first();
        return view('user_profile.php', ['user' => $userData,'package' => $Activepackage,'allPackages'=>$allPackage]);
    }


    public function update_profile()
    {
        // Load form validation library
        $validation = Services::validation();
        $id = session('user_id');
        // Set form validation rules with custom error messages
        $validation->setRules([
            'fullname' => [
                'label' => 'Full Name',
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Full Name is required.'
                ]
            ],
            'phone' => [
                'label' => 'Phone',
                'rules' => 'required|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'required' => 'The Phone is required.',
                    'numeric' => 'The Phone must contain only numbers.',
                    'min_length' => 'The Phone must be at least 10 digits long.',
                    'max_length' => 'The Phone cannot exceed 15 digits.'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => "required|valid_email|is_unique[users.email,id,{$id}]",
                'errors' => [
                    'required' => 'The Email is required.',
                    'valid_email' => 'Please enter a valid Email address.',
                    'is_unique' => 'This Email is already in use.'
                ]
            ],
            'dob' => [
                'label' => 'Date of Birth',
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Date of Birth is required.'
                ]
            ],
        ]);

        // Check if the profile image is uploaded and add validation rules for it
        if ($this->request->getFile('profile')->isValid()) {
            $validation->setRules([
                'profile' => [
                    'rules' => 'uploaded[profile]|max_size[profile,1024]|is_image[profile]',
                    'errors' => [
                        'uploaded' => 'Please upload a valid profile image.',
                        'max_size' => 'The profile image file size should not exceed 1MB.',
                        'is_image' => 'The profile image must be in PNG, JPG, or JPEG format.',
                    ],
                ],
            ]);
        }

        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, return validation errors
            return $this->response->setJSON(['status' => 'error', 'errors' => $validation->getErrors()]);
        }

        // Validation passed, process the form data
        $profileImage = $this->request->getFile('profile');
        $fullName = $this->request->getPost('fullname');
        $phone = $this->request->getPost('phone');
        $email = $this->request->getPost('email');
        $dob = $this->request->getPost('dob');

        // Data to update
        $data = [
            'fullname' => $fullName,
            'phone' => $phone,
            'email' => $email,
            'date_of_birth' => $dob,
        ];


        // Check if the profile image is uploaded and valid
        if ($profileImage && $profileImage->isValid() && !$profileImage->hasMoved()) {
            
            $imageName = time() . '.' . $profileImage->getExtension();
            $destinationPath = ROOTPATH . '../admin/public/images';
            $profileImage->move($destinationPath, $imageName);
            $data['profile'] = $imageName;
            session()->set([
                'profile' => $imageName,
            ]);
        }

        // Update user's profile
        $user = new UserModel();
        $result = $user->editData($id, $data);
        if ($result) {
            session()->set([
                'email' => $email,
                'fullname' => $fullName,
                'dob' => $dob,
            ]);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Profile updated successfully!']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Profile updated failed!']);
        }
    }

    public function change_password()
    {
        $validationRules = [
            'currentPassword' => [
                'label' => 'Current Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'The Current Password is required.'
                ]
            ],
            'newPassword' => [
                'label' => 'New Password',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'The New Password is required.',
                    'min_length' => 'The New Password must be at least 5 characters long.'
                ]
            ],
            'confirmPassword' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[newPassword]',
                'errors' => [
                    'required' => 'The Confirm Password is required.',
                    'matches' => 'The Confirm Password does not match the New Password field.'
                ]
            ]
        ];
        

        $validation = Services::validation();
        $validation->setRules($validationRules);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON(['status' => 'error', 'errors' => $validation->getErrors()]);
        }

        $user = new UserModel();
        $id = session('user_id');
        $oldPassword = $this->request->getPost('currentPassword');

        $newPassword = $this->request->getPost('newPassword');

        $result = $user->updatePassword($id, $oldPassword, $newPassword);

        if ($result === true) {
            return $this->response->setJSON(['status' => 'success']);
        } elseif ($result === 'error') {
            return $this->response->setJSON(['status' => 'error', 'errors' => ['Incorrect old password']]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'errors' => ['Failed to update password']]);
        }
    }

    public function notification()
    {
        $notificationModel = new NotificationModel();
        $appointmentModel = new AppointmentModel();
        $enquiryModel = new EnquiryModel();
        $userModel = new UserModel();
    
        // Determine the user ID based on their role
        if (session('user_role') == 2) {
            $id = session('user_id');
        } else {
            $id = session('hospital_id');
        }
    
        // Fetch recent notifications for the user/hospital
        $recentNotifications = $notificationModel->where('receiver_id', $id)
                                                 ->where('status','0')
                                                 ->orderBy('created_at', 'DESC')
                                                 ->findAll();
    
        // Process each notification to include sender and appointment details
        foreach ($recentNotifications as &$notification) {
            $notificationData = json_decode($notification['notification'], true);
    
            if ($notificationData && isset($notificationData['appointment_id'])) {
                $appointmentId = $notificationData['appointment_id'];
                $senderId = $notification['sender_id'];
    
                // Fetch sender details
                $senderDetails = $userModel->find($senderId);
                if ($senderDetails) {
                    $notification['dr_name'] = $senderDetails['fullname'];
                } else {
                    $notification['dr_name'] = 'Unknown';
                }
    
                // Fetch appointment details
                $appointmentDetails = $appointmentModel->find($appointmentId);
                if ($appointmentDetails) {
                    $notification['appointment_details'] = $appointmentDetails;
    
                    // Fetch enquiry details using inquiry_id from appointment details
                    $enquiryDetails = $enquiryModel->find($appointmentDetails['inquiry_id']);
                    if ($enquiryDetails) {
                        $notification['patient_name'] = $enquiryDetails['patient_name'];
                    } else {
                        $notification['patient_name'] = 'Unknown';
                    }
                } else {
                    $notification['appointment_details'] = 'Unknown';
                    $notification['patient_name'] = 'Unknown';
                }
            }
        }
    
        // Return the response with the notifications
        return $this->response->setJSON(['notifications' => $recentNotifications]);
    }

    public function notification_status(){
        $notificationId = $this->request->getPost('noti_id');
        $notificationModel = new NotificationModel();
        $data = ['status' => '1'];
        $updated = $notificationModel->update($notificationId, $data);
        if($updated){
            return $this->response->setJSON(['status' => 'seen']);
        }
    }

    
    public function dashboard() 

        {
            $appointmentModel = new AppointmentModel();
            $enquiryModel = new EnquiryModel();
            $doctorModel = new DoctorModel();
            $userModel = new UserModel();
            if(session('user_role')==2){
                $hospital_id = session('user_id');
            }else{
                $hospital_id = session('hospital_id');
            }
           
            $currentYear = date('Y');
        
            // Fetch appointments month-wise
            $appointmentsByMonth = [];
            for ($month = 1; $month <= 12; $month++) {
                $monthAppointments = $appointmentModel
                    ->where('hospital_id', $hospital_id)
                    ->where('MONTH(created_at)', $month)
                    ->where('YEAR(created_at)', $currentYear)
                    ->findAll();
                $appointmentsByMonth[$month] = $monthAppointments;
            }
        
            // Fetch enquiries month-wise
            $enquiriesByMonth = [];
            for ($month = 1; $month <= 12; $month++) {
                $monthEnquiries = $enquiryModel
                    ->where('hospital_id', $hospital_id)
                    ->where('status', null)
                    ->where('MONTH(created_at)', $month)
                    ->where('YEAR(created_at)', $currentYear)
                    ->findAll();
                $enquiriesByMonth[$month] = $monthEnquiries;
            }
        
            // Fetch users month-wise
            $usersByMonth = [];
            for ($month = 1; $month <= 12; $month++) {
                $monthUsers = $userModel
                    ->where('hospital_id', $hospital_id)
                    ->where('MONTH(created_at)', $month)
                    ->where('YEAR(created_at)', $currentYear)
                    ->findAll();
                $usersByMonth[$month] = $monthUsers;
            }
        
            // Count total appointments, enquiries, and users
            $countAppointments = $appointmentModel->where('hospital_id', $hospital_id)
                                                 ->countAllResults();

            $enquiries = $enquiryModel->where('hospital_id', $hospital_id)
                                            ->where('status', null)
                                            ->findAll();

            $leadsCount = $enquiryModel->where('hospital_id', $hospital_id)
                                        ->where('status', 'lead')
                                        ->countAllResults();

            $countUsers = $userModel->where('hospital_id', $hospital_id)
                                    ->countAllResults();
            

            $appointments = $appointmentModel
                        ->select('appointments.*, enquiries.*')
                        ->join('enquiries', 'appointments.inquiry_id = enquiries.id')
                        ->where('appointments.hospital_id', $hospital_id)
                        ->findAll();
                                 
                                 
            $countAppointments = count($appointments);
        
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
                'enquiries' => $enquiries,
                'countUsers' => $countUsers,
                'appointments' => $appointments,
                'leadsCount'=>$leadsCount,
            ]);
        
        // $appointmentModel = new AppointmentModel();
        // $enquiryModel = new EnquiryModel();
        // $doctorModel = new DoctorModel();
        // $userModel = new UserModel();
        
        // // Get current date components
        // $today = date('Y-m-d');
        // $currentMonth = date('m');
        // $currentYear = date('Y');
        
        // // Filter appointments
        // $appointmentsToday = $appointmentModel->where('DATE(created_at)', $today)->where('hospital_id', session('user_id'))->findAll();
        // $appointmentsThisMonth = $appointmentModel->where('MONTH(created_at)', $currentMonth)->where('YEAR(created_at)', $currentYear)->where('hospital_id', session('user_id'))->findAll();
        // $appointmentsThisYear = $appointmentModel->where('YEAR(created_at)', $currentYear)->where('hospital_id', session('user_id'))->findAll();
        // $allAppointments = $appointmentModel->where('hospital_id', session('user_id'))->findAll();
        
        // // Combine with enquiries and doctors
        // $appointmentsTodayCombined = $this->combineWithEnquiriesAndDoctors($appointmentsToday, $enquiryModel, $doctorModel, $userModel);
        // $appointmentsThisMonthCombined = $this->combineWithEnquiriesAndDoctors($appointmentsThisMonth, $enquiryModel, $doctorModel, $userModel);
        // $appointmentsThisYearCombined = $this->combineWithEnquiriesAndDoctors($appointmentsThisYear, $enquiryModel, $doctorModel, $userModel);
        // $allAppointmentsCombined = $this->combineWithEnquiriesAndDoctors($allAppointments, $enquiryModel, $doctorModel, $userModel);
        
        // // Filter enquiries
        // $enquiriesToday = $enquiryModel->where('DATE(created_at)', $today)->where('hospital_id', session('user_id'))->findAll();
        // $enquiriesThisMonth = $enquiryModel->where('MONTH(created_at)', $currentMonth)->where('YEAR(created_at)', $currentYear)->where('hospital_id', session('user_id'))->findAll();
        // $enquiriesThisYear = $enquiryModel->where('YEAR(created_at)', $currentYear)->where('hospital_id', session('user_id'))->findAll();
        // $allEnquiries = $enquiryModel->where('hospital_id', session('user_id'))->findAll();
        
        // // Filter users
        // $usersToday = $userModel->where('DATE(created_at)', $today)->where('hospital_id', session('user_id'))->findAll();
        // $usersThisMonth = $userModel->where('MONTH(created_at)', $currentMonth)->where('YEAR(created_at)', $currentYear)->where('hospital_id', session('user_id'))->findAll();
        // $usersThisYear = $userModel->where('YEAR(created_at)', $currentYear)->where('hospital_id', session('user_id'))->findAll();
        // $allUsers = $userModel->where('hospital_id', session('user_id'))->findAll();
        
        // // Prepare data to return
        // $data = [
        //     'appointments' => [
        //         'today' => $appointmentsTodayCombined,
        //         'this_month' => $appointmentsThisMonthCombined,
        //         'this_year' => $appointmentsThisYearCombined,
        //         'all' => $allAppointmentsCombined,
        //     ],
        //     'enquiries' => [
        //         'today' => $enquiriesToday,
        //         'this_month' => $enquiriesThisMonth,
        //         'this_year' => $enquiriesThisYear,
        //         'all' => $allEnquiries,
        //     ],
        //     'users' => [
        //         'today' => $usersToday,
        //         'this_month' => $usersThisMonth,
        //         'this_year' => $usersThisYear,
        //         'all' => $allUsers,
        //     ]
        // ];
        
        // return view('dashboard', ['data' => $data]);
        
    }
    
    private function combineWithEnquiriesAndDoctors($appointments, $enquiryModel, $doctorModel ,$userModel) {
        foreach ($appointments as &$appointment) {
            // Combine with enquiry
            $appointment['enquiry'] = $enquiryModel->find($appointment['inquiry_id']);
    
            // Combine with doctor
            if (isset($appointment['assigne_to'])) {
                $appointment['doctor'] = $doctorModel->where('user_id', $appointment['assigne_to'])->first();

                $dr_id = $appointment['doctor']['user_id'];
                $doctorData = $userModel->find($dr_id);
                $appointment['doctor']['doctor_data'] = $doctorData;
                
            } else {
                $appointment['doctor'] = null;
            }
        }
        return $appointments;
    }
    


}