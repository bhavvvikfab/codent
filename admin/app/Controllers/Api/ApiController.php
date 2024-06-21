<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\AppointmentModel;
use App\Models\Appointments;
use App\Models\ChatModel;
use App\Models\DoctorScheduleModel;
use App\Models\EnquiryModel;
use App\Models\HospitalsModel;
use App\Models\NotificationModel;
use App\Models\UserModel;
use App\Models\DoctorModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use CodeIgniter\Pager\PagerRenderer;

class ApiController extends BaseController
{
    use ResponseTrait;
   
    public function __construct()
    {
        $this->imagePath = base_url().'public/images/';
        $this->chat_imagePath = base_url().'public/chat_files/';
    }

    //user login function
    public function login()
    {
        // echo $this->imagePath;
        // die;
        try {
            $userModel = new UserModel();

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $user = $userModel->where('email', $email)->first();

            if (is_null($user)) {
                return $this->respond([
                    'status' => 409,
                    'message' => 'User not found',
                    'token' => null,
                    'role' => null,
                    'id' => null
                ], 409);

            }

            $pwd_verify = password_verify($password, $user['password']);

            if (!$pwd_verify) {
                return $this->respond([
                    'status' => 409,
                    'message' => 'Invalid email or password',
                    'token' => null,
                    'role' => null
                ], 409);
            }

            $key = getenv('JWT_SECRET');
            $iat = time(); // current timestamp value
            $exp = $iat + 3600;

            $payload = array(
                "iss" => "Issuer of the JWT",
                "aud" => "Audience that the JWT",
                "sub" => "Subject of the JWT",
                "iat" => $iat, //Time the JWT issued at
                "exp" => $exp, // Expiration time of token
                "id" => $user['id'],
            );

            $token = JWT::encode($payload, $key, 'HS256');

            $response = [
                'status' => 200,
                'message' => 'Login Succesful',
                'token' => $token,
                'role' => $user['role'],
                'id' => $user['id']
            ];

            return $this->respond($response, 200);
        } catch (\Exception $e) {
            $error = array($e->getmessage());
            $errormsg = json_encode($error);
            echo $errormsg;
        }
    }


    //searching doctors//
    public function get_doctor_details()
    {
        try {
            $id = $this->request->getPost('id');

            if ($id) {
                $doctorModel = new DoctorModel();
                $userModel = new UserModel();
                $scheduleModel = new DoctorScheduleModel();

                // Fetch doctor details
                $doctor = $doctorModel->select('doctors.*, users.*')
                    ->join('users', 'users.id = doctors.user_id')
                    ->where('users.id', $id)
                    ->first();

                if ($doctor) {
                    if (!empty($doctor['profile'])) {
                        $doctor['profile'] = $this->imagePath . $doctor['profile'];
                    }
                    // Fetch schedule details
                    $schedule = $scheduleModel->where('user_id', $id)->first();
                    if ($schedule) {
                        unset($doctor['schedule']);
                        $doctor['schedule'] = $schedule;
                    }

                    $response = [
                        'status' => 200,
                        'message' => 'Doctor details',
                        'doctor' => $doctor,
                    ];

                    return $this->respond($response, 200);
                } else {
                    return $this->respond(['status' => 404, 'message' => 'Doctor not found', 'doctor' => null], 404);
                }
            } else {
                return $this->respond(['status' => 400, 'message' => 'ID is required', 'doctor' => null], 400);
            }
        } catch (\Exception $e) {
            // Handle any exceptions
            return $this->respond(['status' => 500, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }


    //change password//
    public function change_password()
    {
        $key = getenv('JWT_SECRET');
        $authHeader = $this->request->getHeader("Authorization");

        if ($authHeader) {
            $authHeader = $authHeader->getValue();
            $token = str_replace('Bearer ', '', $authHeader);
            $token = trim($token);
            try {
                $decoded = JWT::decode($token, new Key($key, "HS256"));
                $userModel = new UserModel();
                $userId = $decoded->id; // Adjust this based on your token's payload structure

                $validationRules = [
                    'currentPassword' => 'required',
                    'newPassword' => 'required|min_length[5]',
                ];

                $validation = Services::validation();
                $validation->setRules($validationRules);

                if (!$validation->withRequest($this->request)->run()) {
                    $messageErr = '';
                    foreach ($validation->getErrors() as $key => $messages) {
                        $messageErr .= $messages . ' ';
                    }
                    return $this->response->setJSON([
                        'status' => 409,
                        'message' => $messageErr,
                    ])->setStatusCode(409);
                }

                $userModel = new UserModel();

                $oldPassword = $this->request->getPost('currentPassword');
                $newPassword = $this->request->getPost('newPassword');

                $result = $userModel->updatePasswordUsingId($userId, $oldPassword, $newPassword);

                if ($result === true) {
                    return $this->response->setJSON([
                        'status' => 200,
                        'message' => 'Password updated successfully'
                    ])->setStatusCode(200);
                } elseif ($result === 'error') {
                    return $this->response->setJSON([
                        'status' => 404,
                        'message' => 'Incorrect old password'
                    ])->setStatusCode(404);
                } else {
                    return $this->response->setJSON([
                        'status' => 404,
                        'message' => 'Failed to update password'
                    ])->setStatusCode(404);
                }
            } catch (\Exception $e) {
                $error = [$e->getMessage()];
                $errormsg = json_encode($error);
                return $this->response->setJSON([
                    'status' => 500,
                    'message' => $errormsg
                ])->setStatusCode(500);
            }
        } else {
            $response = [
                'status' => 404,
                'messages' => 'Authorization header missing',
                'user' => null
            ];
            return $this->response->setJSON($response)->setStatusCode(404);
        }
    }


    //edit doctor profile 
    public function edit_profile()
    {
        try {
            $dr_id = $this->request->getPost('dr_id');
            $fullname = $this->request->getPost('fullname');
            $email = $this->request->getPost('email');
            $address = $this->request->getPost('address');
            $dob = $this->request->getPost('dob');
            $image = $this->request->getFile('profile');
            $phone = $this->request->getPost('phone');
            // $role = $this->request->getPost('role');

            // dr_extra details
            $qualification = $this->request->getPost('qualification');
            $specialist_in = $this->request->getPost('specialist_in');
            $about = $this->request->getPost('about');

            // Process image upload if available
            $newName = null;
            if ($image && $image->isValid() && !$image->hasMoved()) {
                $newName = time() . '.' . $image->getExtension();
                $image->move(ROOTPATH . '../admin/public/images', $newName);
            }

            // Fetch existing user data
            $userModel = new UserModel();
            $existingUserData = $userModel->find($dr_id);

            // Prepare updated user data
            $userData = [
                'fullname' => $fullname ?? $existingUserData['fullname'],
                'email' => $email ?? $existingUserData['email'],
                'address' => $address ?? $existingUserData['address'],
                'date_of_birth' => $dob ?? $existingUserData['date_of_birth'],
                'phone' => $phone ?? $existingUserData['phone'],
                // 'role' => $role ?? $existingUserData['role'],
            ];
            if ($newName) {
                $userData['profile'] = $newName;
            }

            // Update user data
            $userModel->update($dr_id, $userData);

            // Fetch existing doctor data
            $doctorModel = new DoctorModel();
            $existingDoctorData = $doctorModel->where('user_id', $dr_id)->first();

            // Prepare updated doctor data
            $doctorData = [
                'qualification' => $qualification ?? $existingDoctorData['qualification'],
                'specialist_of' => $specialist_in ?? $existingDoctorData['specialist_of'],
                'about' => $about ?? $existingDoctorData['about'],
            ];

            // Update doctor data directly
            $doctorModel->where('user_id', $dr_id)->set($doctorData)->update();

            return $this->respond(['status' => 200, 'message' => 'Profile updated successfully'], 200);
        } catch (\Exception $e) {
            return $this->respond(['status' => 500, 'message' => $e->getMessage()], 500);
        }
    }


    //user details using token
    public function user_details()
    {
        $key = 'JWT SECRET KEY SAMPLE HERE';
        $authHeader = $this->request->getHeader("Authorization");

        if ($authHeader) {
            $authHeader = $authHeader->getValue();
            $token = str_replace('Bearer ', '', $authHeader);
            $token = trim($token);

            try {
                $decoded = JWT::decode($token, new Key($key, "HS256"));
                $userModel = new UserModel();
                $userId = $decoded->id; // Adjust this based on your token's payload structure

                // Fetch user details from UserModel using the decoded user ID
                $user = $userModel->find($userId);

                if (!empty($user['profile'])) {
                    $user['profile'] = $this->imagePath . $user['profile'];
                }

                if ($user) {
                    $response = [
                        'status' => 200,
                        'messages' => 'User details',
                        'user' => $user
                    ];
                    return $this->respondCreated($response, 200);
                } else {
                    $response = [
                        'status' => 404,
                        'messages' => 'User not found',
                        'user' => null
                    ];
                    return $this->respondCreated($response, 404);
                }

            } catch (\Exception $ex) {
                $response = [
                    'status' => 404,
                    'messages' => 'User details',
                    'user' => null
                ];
                return $this->respondCreated($response, 404);
            }
        } else {
            $response = [
                'status' => 404,
                'messages' => 'Authorization header missing',
                'user' => null
            ];
            return $this->respondCreated($response, 404);
        }
    }

    // Forgot Password - Send Email
    public function forgotPassword()
    {
        $userEmail = $this->request->getPost('email');

        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $userModel = new UserModel();
        $checkUser = $userModel->where('email', $userEmail)->first();

        if ($checkUser) {
            $key = substr(str_shuffle($str_result), 0, 56);
            $setKey = $userModel->where('email', $userEmail)->set('forgot_password_key', $key)->update();

            $subject = 'Forgot Password';
            $message = '<!doctype html>
                     <html lang="en-US">
                     <head>
                         <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                         <meta name="description" content="Reset Password Email Template.">
                         <style type="text/css">
                             a:hover {text-decoration: underline !important;}
                         </style>
                     </head>
                     <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
                         <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
                             style="font-family: \'Open Sans\', sans-serif;">
                             <tr>
                                 <td>
                                     <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                         <tr>
                                             <td style="height:80px;">&nbsp;</td>
                                         </tr>
                                         <tr>
                                             <td style="text-align:center;"></td>
                                         </tr>
                                         <tr>
                                             <td style="height:20px;">&nbsp;</td>
                                         </tr>
                                         <tr>
                                             <td>
                                                 <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                                     style="max-width:670px;background:#fff; border-radius:3px; text-align:center;box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                                     <tr>
                                                         <td style="height:40px;">&nbsp;</td>
                                                     </tr>
                                                     <tr>
                                                         <td style="padding:0 35px">
                                                             <h1>Forgot Password</h1>
                                                             <span style="display:inline-block;vertical-align:middle;margin:29px 0 26px;border-bottom:1px solid #cecece;width: 260px;"></span>
                                                             <br>
                                                             <i>Follow the below link to reset password:</i>
                                                             <br>
                                                             <a href="' . base_url() . 'api/confirmforgotPassword/' . $checkUser['id'] . '/' . $key . '" style="background: #357f8347;text-decoration:none!important;font-weight:500;margin-top: 18px;color: #2a2727;text-transform:uppercase;font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px" target="_blank">Confirm Reset</a>
                                                         </td>
                                                     </tr>
                                                     <tr>
                                                         <td style="height:40px;">&nbsp;</td>
                                                     </tr>
                                                 </table>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td style="height:20px;">&nbsp;</td>
                                         </tr>
                                         <tr>
                                             <td style="height:80px;">&nbsp;</td>
                                         </tr>
                                     </table>
                                 </td>
                             </tr>
                         </table>
                     </body>
                     </html>';

            $email_dt = Services::email();

            $email_dt->setTo($userEmail);
            $email_dt->setfrom('mailsmtp@londontechequity.co.uk', 'fableadtechnolabs-com');



            $email_dt->setSubject($subject);
            $email_dt->setMessage($message);

            if ($email_dt->send()) {
               return $this->respond(['status' => "200", 'message' => 'Check your mail.'],200);
            } else {
               
             return $this->respond(['status' => "500", 'message' => 'Error to sent mail.'],500);
            }


        } else {
          return $this->respond(['status' => "404", 'message' => 'User not found.'],404);
        }

        
    }

    public function confirmforgotPassword($userID, $key)
    {
        $baseUrl = base_url();
        $url = 'http://' . $_SERVER['HTTP_HOST'];
        $redirectUrl = base_url() . 'forget_pass.php?url=' . $baseUrl . '&userID=' . $userID . '&key=' . $key;
        return redirect()->to($redirectUrl);

    }


    public function resetPassword()
    {
        $userId = $this->request->getPost('user_id');
        $key = $this->request->getPost('key');
        $password = $this->request->getPost('new_password');
        $confirm_password = $this->request->getPost('confirm_password');

        $updatedeData = [
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        $usermodel = new UserModel();
        $updatePassword = $usermodel->update($userId, $updatedeData);
        if ($updatePassword) {
            echo 1;
        } else {
            echo 2;
        }

    }
    // end forgot Password - 



   //dr wise appointment
   public function dr_wise_appointment()
   {
       try {
           $appointmentModel = new Appointments();
           $dr_id = $this->request->getPost('id');
           $patientName = $this->request->getPost('patient_name');
           $appointmentDate = $this->request->getPost('appointment_date');
           $status = $this->request->getPost('status');
             $today = new \DateTime(); 
           
           if (!empty($dr_id)) {
               // Prepare base query to fetch appointments for the given doctor
              $query = $appointmentModel->select('enquiries.*, appointments.*')
                ->where('appointments.assigne_to', $dr_id)
                ->join('enquiries', 'enquiries.id = appointments.inquiry_id')
                ->orderBy('appointments.created_at', 'ASC');
                // ->where('STR_TO_DATE(appointments.schedule, "%d/%m/%Y %h:%i %p") >=', $today->format('Y-m-d H:i:s'));
                
               // If patient name is provided, add search condition
                 if (!empty($patientName)) {
                    $query->like('enquiries.patient_name', $patientName);
                   }
           
                    $scheduleDateTime = !empty($appointmentDate) ? date('d/m/Y', strtotime(str_replace('/', '-', $appointmentDate))) : null;
                   if ($scheduleDateTime) {
                       $query->like('appointments.schedule', $scheduleDateTime);
                   }

                    if (!empty($status)) {
                       $query->where('appointments.appointment_status', $status);
                     }
   
               // Retrieve the appointments
               $appointments = $query->findAll();
   
               if (!empty($appointments)) {
                   // Fetch inquiry details for each appointment
                   foreach ($appointments as &$appointment) {
                       $inquiryId = $appointment['inquiry_id'];
                       $inquiryModel = new EnquiryModel();
                       $inquiry = $inquiryModel->find($inquiryId);
   
                       if (!empty($inquiry)) {
                           // Process images
                           $images = !empty($inquiry['image']) ? json_decode($inquiry['image'], true) : [];
   
                           if (is_array($images)) {
                               foreach ($images as &$image) {
                                   $image = $this->imagePath . $image;
                               }
                               $inquiry['image'] = $images;
                           } else {
                               $inquiry['image'] = [];
                           }
   
                           // Process profile image
                           if (!empty($inquiry['profile'])) {
                               $inquiry['profile'] = $this->imagePath . $inquiry['profile'];
                           }
   
                           // Attach inquiry details to the appointment
                           $appointment['enquiry_details'] = $inquiry;
   
                           // Fetch user details for this inquiry
                           $userId = $inquiry['user_id'];
                           $userModel = new UserModel();
                           $user = $userModel->find($userId);
   
                           if (!empty($user)) {
                               $user['profile'] = $this->imagePath . $user['profile'];
                               $appointment['user_details'] = $user;
                           }
                   
                           // Remove enquiry details from main appointment array
                           unset($appointment['user_id'], $appointment['date_of_birth'], $appointment['phone'], $appointment['email'], $appointment['patient_name'], $appointment['gender'], $appointment['age'], $appointment['profile'], $appointment['required_specialist'], $appointment['address'], $appointment['lead_instruction'], $appointment['lead_comment'], $appointment['image'], $appointment['status'], $appointment['assign_to(user_id)'], $appointment['referral_doctor'], $appointment['appointment_date']);
                       }
                   }
   
                   // Prepare response
                   $response = [
                       'status' => 200,
                       'messages' => 'Appointments',
                       'appointments' => $appointments
                   ];
                   return $this->respond($response, 200);
               } else {
                   // No appointments found
                   $response = [
                       'status' => 404,
                       'messages' => 'Appointments not found',
                       'appointments' => []
                   ];
                   return $this->respond($response, 404);
               }
           } else {
               // Doctor ID is empty
               $response = [
                   'status' => 409,
                   'messages' => 'Doctor ID is empty',
                   'appointments' => []
               ];
               return $this->respond($response, 409);
           }
       } catch (\Exception $e) {
           // Handle any exceptions
           return json_encode(['status' => 409, 'message' => 'An error occurred: ' . $e->getMessage()]);
       }
   }



    //dr_wise_patients
    public function dr_wise_patients()
    {
        try {
            $appointmentModel = new Appointments();
            $dr_id = $this->request->getPost('id');
            $perPage = 7; // Number of data per page
    
            if (!empty($dr_id)) {
                $baseQuery = $appointmentModel->select('appointments.*')
                ->where('appointments.assigne_to', $dr_id)
                ->join('enquiries', 'enquiries.id = appointments.inquiry_id')
                ->groupBy('appointments.inquiry_id') 
                ->orderBy('appointments.created_at', 'ASC');
            
            // Clone the base query for counting total items
            $totalItems = clone $baseQuery;

            $totalItems = $totalItems->countAllResults(false);
            $totalPages = ceil($totalItems / $perPage);
            
            $currentPage = $this->request->getPost('page') ? (int)$this->request->getPost('page') : 1;
            $currentPage = max(min($currentPage, $totalPages), 1);
            
            $appointments = $baseQuery->paginate($perPage, '', $currentPage);
            
                if (!empty($appointments)) {
                    foreach ($appointments as &$appointment) {
                        $inquiryId = $appointment['inquiry_id'];
                        $inquiryModel = new EnquiryModel();
                        $inquiry = $inquiryModel->find($inquiryId);
    
                        if (!empty($inquiry)) {
                            // Process images
                            $images = !empty($inquiry['image']) ? json_decode($inquiry['image'], true) : [];
    
                            if (is_array($images)) {
                                foreach ($images as &$image) {
                                    $image = $this->imagePath . $image;
                                }
                                $inquiry['image'] = $images;
                            } else {
                                $inquiry['image'] = [];
                            }
    
                            // Process profile image
                            if (!empty($inquiry['profile'])) {
                                $inquiry['profile'] = $this->imagePath . $inquiry['profile'];
                            }
    
                            // Attach inquiry details to the appointment
                            $appointment['enquiry_details'] = $inquiry;
    
                            // Fetch user details for this inquiry
                            $userId = $inquiry['user_id'];
                            $userModel = new UserModel();
                            $user = $userModel->find($userId);
    
                            if (!empty($user)) {
                                $user['profile'] = $this->imagePath . $user['profile'];
                                $appointment['user_details'] = $user;
                            }
    
                            // Remove enquiry details from main appointment array
                            unset($appointment['user_id'], $appointment['date_of_birth'], $appointment['phone'], $appointment['email'], $appointment['patient_name'], $appointment['gender'], $appointment['age'], $appointment['profile'], $appointment['required_specialist'], $appointment['address'], $appointment['lead_instruction'], $appointment['lead_comment'], $appointment['image'], $appointment['status'], $appointment['assign_to(user_id)'], $appointment['referral_doctor'], $appointment['appointment_date']);
                        }
                    }
    
                    // Prepare response
                    $response = [
                        'status' => 200,
                        'messages' => 'Appointments',
                        'current_page'=>$currentPage,
                        'total_page'=> $totalPages,
                        'appointments' => $appointments
                        
                    ];
                    return $this->respond($response, 200);
                } else {
                    // No appointments found
                    $response = [
                        'status' => 404,
                        'messages' => 'Appointments not found',
                        'current_page'=>$currentPage,
                        'total_page'=> 1, 
                        'appointments' => []
                    ];
                    return $this->respond($response, 404);
                }
            } else {
                // Doctor ID is empty
                $response = [
                    'status' => 409,
                    'messages' => 'Doctor ID is empty',
                    'current_page'=>1,
                    'total_page'=> 1,
                    'appointments' => []
                    
                ];
                return $this->respond($response, 409);
            }
        } catch (\Exception $e) {
            // Handle any exceptions
            return json_encode(['status' => 409, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    

    //get enquiry by id
    public function get_enquiryById()
    {
        try {
            $enquiryId = $this->request->getPost('id');

            // Load the EnquiryModel
            $enquiryModel = new EnquiryModel();

            // Retrieve the inquiry by its ID
            $enquiry = $enquiryModel->find($enquiryId);

            if (!empty($enquiry)) {

                $enquiry['profile'] = $this->imagePath . $enquiry['profile'];
                $images = !empty($enquiry['image']) ? json_decode($enquiry['image'], true) : [];

                foreach ($images as &$image) {
                    $image = $this->imagePath . $image;
                }

                $enquiry['image'] = $images;
                // Inquiry found, return it
                $response = [
                    'status' => 200,
                    'enquiry' => $enquiry
                ];
                // return json_encode($response)
                return $this->respond($response, 200);
            } else {
                // Inquiry not found
                $response = [
                    'status' => 404,
                    'enquiry' => null
                ];
                return $this->respond($response, 404);
            }
        } catch (\Exception $e) {
            // Handle any exceptions
            return json_encode(['status' => 500, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }


    //get today appointment
    public function get_today_appointment()
    {
        try {
            // Get doctor ID from the request
            $dr_id = $this->request->getPost('id');

            if (!empty($dr_id)) {
                
                $today = date('Y-m-d');

                $appointmentModel = new Appointments();
                $appointments = $appointmentModel
                    ->where('assigne_to', $dr_id)
                    ->where('appointment_status','Confirmed')
                    ->where('DATE(created_at)', $today)
                    ->findAll();
                    
                if (!empty($appointments)) {
                    // Fetch user and inquiry details for each appointment
                    foreach ($appointments as &$appointment) {
                        $inquiryId = $appointment['inquiry_id'];
                        $inquiryModel = new EnquiryModel();
                        $inquiry = $inquiryModel->find($inquiryId);

                        if (!empty($inquiry)) {
                            $inquiry['profile'] = $this->imagePath . $inquiry['profile'];
                            $images = !empty($inquiry['image']) ? json_decode($inquiry['image'], true) : [];

                            foreach ($images as &$image) {
                                $image = $this->imagePath . $image;
                            }

                            $inquiry['image'] = $images;
                            $appointment['enquiry_details'] = $inquiry;

                            // Fetch user details for this inquiry
                            $userId = $inquiry['user_id'];
                            $userModel = new UserModel();
                            $user = $userModel->find($userId);

                            if (!empty($user)) {
                                $appointment['user_details'] = $user;
                            }
                        }
                    }

                    // Prepare response
                    $response = [
                        'status' => 200,
                        'messages' => 'Today\'s Appointments',
                        'appointments' => $appointments
                    ];
                    return $this->respond($response, 200);
                } else {
                    // No appointments found for today
                    $response = [
                        'status' => 404,
                        'messages' => 'No Appointments found for today',
                        'appointments' => []
                    ];
                    return $this->respond($response, 404);
                }
            } else {
                // Doctor ID is empty
                $response = [
                    'status' => 409,
                    'messages' => 'Doctor ID is empty',
                    'appointments' => []
                ];
                return $this->respond($response, 409);
            }
        } catch (\Exception $e) {
            // Handle any exceptions
            return json_encode(['status' => 500, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    //appointment_with enquiry details
    public function view_appointment()
    {
        try {
            $app_Id = $this->request->getPost('appointment_id');

            if ($app_Id) {
                // Load Appointments model
                $appointmentModel = new Appointments();

                // Find appointments where inquiry ID matches appointment's inquiry ID
                $appointments = $appointmentModel->where('id', $app_Id)->first();

                // Check if appointments are found
                if (!empty($appointments)) {
                    // Prepare response
                    $enquiryModel = new EnquiryModel();
                    $enquiry = $enquiryModel->where('id', $appointments['inquiry_id'])->first();

                    if (!empty($enquiry['profile'])) {
                        $enquiry['profile'] = $this->imagePath . $enquiry['profile'];
                    }
                    $images = json_decode($enquiry['image'], true);
                    if (is_array($images)) {
                        foreach ($images as &$image) {
                            $image = $this->imagePath . $image;
                        }
                        $enquiry['image'] = $images;
                    } else {
                        $enquiry['image'] = [];
                    }

                    $appointments['other_details'] = $enquiry;
                    $response = [
                        'status' => 200,
                        'messages' => 'Appointments found',
                        'appointments' => $appointments
                    ];
                    return $this->respond($response, 200);
                } else {

                    $response = [
                        'status' => 404,
                        'messages' => 'No appointments found',
                        'appointments' => []
                    ];
                    return $this->respond($response, 404);
                }
            } else {

                $response = [
                    'status' => 404,
                    'messages' => 'Appointment ID is required',
                    'appointments' => []
                ];
                return $this->respond($response, 400);
            }
        } catch (\Exception $e) {
            $response = [
                'status' => 500,
                'messages' => 'An error occurred: ' . $e->getMessage(),
                'appointments' => []
            ];
            return $this->respond($response, 500);
        }
    }


    //appointment_cancel_confirm
    public function appointment_status()
    {
        try {
            $appointment_id = $this->request->getPost('appointment_id');
            $status = $this->request->getPost('status');  //Completed //Cancelled

            if (!$appointment_id || !$status) {
                $response = [
                    'status' => 404,
                    'message' => 'Invalid input data. Please provide appointment ID and status.'
                ];
                return $this->respond($response, 404);
            }

            $appointmentModel = new Appointments();
            $notificationModel = new NotificationModel();

            $appointment = $appointmentModel->find($appointment_id);
            $sender_id=$appointment['assigne_to'];
            $receiver_id=$appointment['hospital_id'];
            if (!$appointment) {

                $response = [
                    'status' => 404,
                    'message' => 'Appointment not found.'
                ];
                return $this->respond($response, 404);
            }

            $updateData = [
                'appointment_status' => $status
            ];

            $noti=[
                'sender_id'=> $sender_id,
                'receiver_id'=>$receiver_id,
                'status'=> '0',
                'notification'=> json_encode(['appointment_id' => $appointment_id, 'status' => $status])
            ];
            $notify=$notificationModel->insert($noti);
            $updated = $appointmentModel->update($appointment_id, $updateData);

            if ($updated && $notify) {
               
                $response = [
                    'status' => 200,
                    'message' => 'Appointment status updated successfully.'
                ];
                return $this->respond($response, 200);
            } else {
                $response = [
                    'status' => 400,
                    'message' => 'Failed to update appointment status.'
                ];
                return $this->respond($response, 400);
            }
        } catch (\Exception $e) {
            $response = [
                'status' => 500,
                'message' => 'An error occurred: ' . $e->getMessage()
            ];
            return $this->respond($response, 500);
        }
    }
    
    
    
    //get appointment all by enquiry id 
    public function get_allAppointmentBy_EnquiryId()
    {
    $appointmentModel = new Appointments();
    $perPage = 4;
    try {
        $enquiryId = $this->request->getPost('enquiry_id');

        if (!$enquiryId) {
            return $this->respond(['status'=> 404,'message'=>'Enquiry ID is required',],404);
        }

                                     
        $baseQuery = $appointmentModel->where('inquiry_id', $enquiryId)
                                      ->whereIn('appointment_status', ['Completed', 'Cancelled', 'Confirmed']);
                                     
        
        $totalItems = clone $baseQuery;

        $totalItems = $totalItems->countAllResults(false);
        $totalPages = ceil($totalItems / $perPage);
        
        $currentPage = $this->request->getPost('page') ? (int)$this->request->getPost('page') : 1;

        $currentPage = max(min($currentPage, $totalPages), 1);
        $appointments = $baseQuery->paginate($perPage, '', $currentPage);
                                     
        if (empty($appointments)) {
            return $this->respond(['status'=> 404,'message'=>'Invalid enquiry id','current_page' => $currentPage,'total_page'=>$totalPages,'appointments'=>[]],404);
        }

        return $this->respond(['status'=>200,'message'=>'appointments','current_page' => $currentPage,'total_page'=>$totalPages,'appointments'=>$appointments],200);
    } catch (\Exception $e) {
        return $this->failServerError('An error occurred while fetching appointments: ' . $e->getMessage());
    }
}


    // upcoming appointment
    public function upcoming_appointment()
   {
       try {
           $appointmentModel = new Appointments();
           $dr_id = $this->request->getPost('id');
           $today = new \DateTime(); 
           
           if (!empty($dr_id)) {
               // Prepare base query to fetch appointments for the given doctor
            $query = $appointmentModel->select('enquiries.*, appointments.*')
                                        ->where('appointments.assigne_to', $dr_id)
                                        ->where('appointments.appointment_status', 'confirmed')
                                        ->join('enquiries', 'enquiries.id = appointments.inquiry_id')
                                        ->where('STR_TO_DATE(appointments.schedule, "%d/%m/%Y %h:%i %p") >=', $today->format('Y-m-d H:i:s'));
                
   
               // Retrieve the appointments
               $appointments = $query->findAll();
   
               if (!empty($appointments)) {
                   // Fetch inquiry details for each appointment
                   foreach ($appointments as &$appointment) {
                       $inquiryId = $appointment['inquiry_id'];
                       $inquiryModel = new EnquiryModel();
                       $inquiry = $inquiryModel->find($inquiryId);
   
                       if (!empty($inquiry)) {
                           // Process images
                           $images = !empty($inquiry['image']) ? json_decode($inquiry['image'], true) : [];
   
                           if (is_array($images)) {
                               foreach ($images as &$image) {
                                   $image = $this->imagePath . $image;
                               }
                               $inquiry['image'] = $images;
                           } else {
                               $inquiry['image'] = [];
                           }
   
                           // Process profile image
                           if (!empty($inquiry['profile'])) {
                               $inquiry['profile'] = $this->imagePath . $inquiry['profile'];
                           }
   
                           // Attach inquiry details to the appointment
                           $appointment['enquiry_details'] = $inquiry;
   
                           // Fetch user details for this inquiry
                           $userId = $inquiry['user_id'];
                           $userModel = new UserModel();
                           $user = $userModel->find($userId);
   
                           if (!empty($user)) {
                               $user['profile'] = $this->imagePath . $user['profile'];
                               $appointment['user_details'] = $user;
                           }
                   
                           // Remove enquiry details from main appointment array
                           unset($appointment['user_id'], $appointment['date_of_birth'], $appointment['phone'], $appointment['email'], $appointment['patient_name'], $appointment['gender'], $appointment['age'], $appointment['profile'], $appointment['required_specialist'], $appointment['address'], $appointment['lead_instruction'], $appointment['lead_comment'], $appointment['image'], $appointment['status'], $appointment['assign_to(user_id)'], $appointment['referral_doctor'], $appointment['appointment_date']);
                       }
                   }
   
                   // Prepare response
                   $response = [
                       'status' => 200,
                       'messages' => 'Appointments',
                       'appointments' => $appointments
                   ];
                   return $this->respond($response, 200);
               } else {
                   // No appointments found
                   $response = [
                       'status' => 404,
                       'messages' => 'Appointments not found',
                       'appointments' => []
                   ];
                   return $this->respond($response, 404);
               }
           } else {
               // Doctor ID is empty
               $response = [
                   'status' => 409,
                   'messages' => 'Doctor ID is empty',
                   'appointments' => []
               ];
               return $this->respond($response, 409);
           }
       } catch (\Exception $e) {
           // Handle any exceptions
           return json_encode(['status' => 409, 'message' => 'An error occurred: ' . $e->getMessage()]);
       }
   }


    //edit doctor schedule
    public function edit_schedule()
    {
    try {
        $id = $this->request->getPost('user_id');

        if (!$id) {
            return $this->respond(['status' => 400, 'message' => 'User ID is required'], 400);
        }
        // Load or instantiate DoctorScheduleModel
        $scheduleModel = new DoctorScheduleModel();

        // Get the existing schedule data
        $existingSchedule = $scheduleModel->where('user_id', $id)->first();

        if (!$existingSchedule) {
            return $this->respond(['status' => 404, 'message' => 'Schedule not found'], 404);
        }

        // Check if there are any changes in schedule data
        $data = [
            'monday' => $this->request->getPost('monday') ?? $existingSchedule['monday'],
            'tuesday' => $this->request->getPost('tuesday') ?? $existingSchedule['tuesday'],
            'wednesday' => $this->request->getPost('wednesday') ?? $existingSchedule['wednesday'],
            'thursday' => $this->request->getPost('thursday') ?? $existingSchedule['thursday'],
            'friday' => $this->request->getPost('friday') ?? $existingSchedule['friday'],
            'saturday' => $this->request->getPost('saturday') ?? $existingSchedule['saturday'],
            'sunday' => $this->request->getPost('sunday') ?? $existingSchedule['sunday'],
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        // print_r($data);
        
        $data = array_filter($data, function ($value) {
            return !empty($value);
        });
        
        if (empty($data)) {
            return $this->respond(['status' => 400, 'message' => 'No changes to update'], 400);
        }

        $updateResult = $scheduleModel->where('user_id', $id)->set($data)->update();

        if ($updateResult) {
            $response = [
                'status' => 200,
                'message' => 'Schedule updated successfully',
            ];
            return $this->respond($response, 200);
        } else {
            $response = [
                'status' => 500,
                'message' => 'Failed to update schedule',
            ];
            return $this->respond($response, 500);
        }
    } catch (\Exception $e) {
        // Log or debug $e->getMessage() here to get specific error details
        $response = [
            'status' => 500,
            'message' => 'An error occurred: ' . $e->getMessage(),
        ];
        return $this->respond($response, 500);
    }
}



// ================================chat apis ===============================

    //chat functions
public function send_message()
{
    try {
        $message = $this->request->getPost('message');
        $receiver_id = $this->request->getPost('receiver_id');
        $sender_id = $this->request->getPost('sender_id');
        $files = $this->request->getFiles();

        $chatModel = new ChatModel();

        $fileData = [];
        $fileType = null;

        if ($files) {
            foreach ($files['files'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = time() . '_' . uniqid() . '.' . $file->getExtension();
                    $destinationPath = ROOTPATH . '../admin/public/chat_files';

                    // Move file to appropriate directory based on file type
                    if (in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'gif'])) {
                        $file->move($destinationPath, $newName);
                        $fileType = 'image';
                    } elseif (in_array($file->getExtension(), ['mp4', 'avi', 'mov'])) {
                        $file->move($destinationPath, $newName);
                        $fileType = 'video';
                    } elseif ($file->getExtension() == 'pdf') {
                        $file->move($destinationPath , $newName);
                        $fileType = 'pdf';
                    } else {
                        continue; // Skip unsupported file types
                    }

                    $fileData[] = $newName;
                }
            }
        }

        // Determine the type of message being sent
        if (!empty($message) && !empty($fileData)) {
            if ($fileType == 'image') {
                $type = 3; // Both message and image
            } elseif ($fileType == 'video') {
                $type = 6; // Both message and video
            } elseif ($fileType == 'pdf') {
                $type = 7; // Both message and PDF
            }
        } elseif (!empty($message)) {
            $type = 1; // Message only
        } elseif (!empty($fileData)) {
            if ($fileType == 'image') {
                $type = 2; // Image only
            } elseif ($fileType == 'video') {
                $type = 4; // Video only
            } elseif ($fileType == 'pdf') {
                $type = 5; // PDF only
            }
        } else {
            return $this->respond(['status' => 400, 'message' => 'No message or files provided.'], 400);
        }

        // Prepare data for insertion
        $data = [
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'messages' => $message,
            'type' => $type,
            'files' => !empty($fileData) ? json_encode($fileData) : json_encode([]),
        ];

        // Insert message data into the database
        $result = $chatModel->insert($data);

        if ($result) {
            return $this->respond(['status' => 200, 'message' => 'Message sent successfully.'], 200);
        } else {
            return $this->respond(['status' => 500, 'message' => 'Failed to send message.'], 500);
        }
    } catch (\Exception $e) {
        return $this->respond(['status' => 500, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
    }
}


    // get chat msg
    public function get_message() {
        try {
            $receiverID = $this->request->getPost('receiver_id');
            $senderID = $this->request->getPost('sender_id');
    
            if (!$receiverID || !$senderID) {
                return $this->respond(['status' => 404, 'message' => 'Missing required parameters'],404);
            }
    
            $chatModel = new ChatModel();
             $messages = $chatModel
                    ->where('sender_id', $senderID)
                    ->where('receiver_id', $receiverID)
                    ->orWhere('sender_id', $receiverID)
                    ->where('receiver_id', $senderID)
                    ->orderBy('created_at', 'desc')
                    ->findAll();
                
                
            foreach ($messages as &$message) {
                $images = json_decode($message['files'], true);
                if (is_array($images)) {
                    foreach ($images as &$image) {
                        $image = $this->chat_imagePath . $image;
                    }
                    $message['files'] = $images;
                } else {
                    $message['files'] = [];
                }
            }
    
            $updated = $chatModel->where(['sender_id' => $senderID, 'receiver_id' => $receiverID ,'app_status'=> 0])
            ->orWhere(['sender_id' => $receiverID, 'receiver_id' => $senderID])
            ->set(['app_status' => 1])
            ->update();
    
            return $this->respond(['status' => 200, 'messages' => $messages],200);
        } catch (\Exception $e) {
            return $this->respond(['status' => 500, 'message' => 'An error occurred while fetching messages', 'error' => $e->getMessage()],500);
        }
    }
    
    public function get_live_message(){
        try {
            $receiver_id = $this->request->getPost('receiver_id');
            $sender_id = $this->request->getPost('sender_id');
    
            if (!$receiver_id || !$sender_id) {
                return $this->respond(['status' => 404, 'message' => 'Missing required parameters'],404);
            }
    
            $chatModel = new ChatModel();
            $messages = $chatModel->where(['sender_id' => $sender_id, 'receiver_id' => $receiver_id, 'app_status' => 0])->findAll();
         
            foreach ($messages as &$message) {
                $images = json_decode($message['files'], true);
                if (is_array($images)) {
                    foreach ($images as &$image) {
                        $image = $this->chat_imagePath . $image;
                    }
                    $message['files'] = $images;
                } else {
                    $message['files'] = [];
                }
            }
            
          $chatModel->where(['sender_id' => $sender_id, 'receiver_id' => $receiver_id, 'app_status' => 0])
                    ->set(['app_status' => 1])
                    ->update();
              
            if (empty($messages)) {
                return $this->respond(['status' => 404, 'message' => 'No messages found.'],404);
            }
           
            return $this->respond(['status' => 200, 'messages' => $messages],200);
          
        } catch (\Exception $e) {
            return $this->respond(['status' => 500, 'message' => 'An error occurred while fetching messages', 'error' => $e->getMessage()],500);
        }
    }


 // ================================chat apis end ===============================






    
























}
