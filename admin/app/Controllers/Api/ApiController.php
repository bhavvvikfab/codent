<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\AppointmentModel;
use App\Models\Appointments;
use App\Models\DoctorScheduleModel;
use App\Models\EnquiryModel;
use App\Models\HospitalsModel;
use App\Models\UserModel;
use App\Models\DoctorModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ApiController extends BaseController
{
    use ResponseTrait;
    protected $imagePath = 'http://codent.fableadtechnolabs.com/admin/public/images/';
    //user register function
    public function userRegister()
    {
        try {
            $fullname = $this->request->getPost('fullname');
            $email = $this->request->getPost('email');
            $password = $this->request->getVar('password');
            $address = $this->request->getPost('address');
            $dob = $this->request->getPost('dob');
            $image = $this->request->getFile('image');
            $phone = $this->request->getPost('phone');

            // Validation rules
            $rules = [
                'fullname' => ['rules' => 'required|min_length[3]|max_length[255]'],
                'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]'],
                'password' => ['rules' => 'required|min_length[5]|max_length[255]'],
                'address' => ['rules' => 'required|min_length[4]|max_length[255]'],
                'dob' => ['rules' => 'required|valid_date'],
                'phone' => ['rules' => 'required|min_length[10]|max_length[15]'],
                'image' => ['rules' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]']
            ];

            // Validate input
            if ($this->validate($rules)) {
                // Process image upload if available
                $newName = null;
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = time() . '.' . $image->getExtension();
                    $image->move(WRITEPATH . 'Api-images', $newName);
                }

                // Prepare user data
                $model = new UserModel();
                $data = [
                    'fullname' => $fullname,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'address' => $address,
                    'date_of_birth' => $dob,
                    'phone' => $phone,
                    'role' => 6,
                    'profile' => $newName
                ];

                $model->save($data);

                return $this->respond(['status' => 200, 'message' => 'Registered Successfully'], 200);
            } else {
                $messageErr = '';
                foreach ($this->validator->getErrors() as $key => $messages) {
                    $messageErr .= $messages;
                }
                $response = [
                    'status' => 409,
                    'message' => $messageErr,
                ];

                return $this->respond($response, 409);
            }
        } catch (\Exception $e) {
            $error = array($e->getmessage());
            $errormsg = json_encode($error);
            echo $errormsg;
        }
    }

    //user login function
    public function login()
    {
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
                    if($schedule){
                        unset($doctor['schedule']);
                        $doctor['schedule']= $schedule;
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
    
    


    //get all hospital function
    // public function hospitals()
    // {
    //     try {

    //         $users = new UserModel();
    //         $result = $users->where('role', 2)->findAll();

    //         if (empty($result)) {
    //             return $this->respond(['message' => 'No hospital found', 'hospitals' => []], 404);
    //         }

    //         foreach ($result as &$user) {
    //             if (!empty($user['profile'])) {
    //                 $user['profile'] = $this->imagePath . $user['profile'];
    //             }
    //         }

    //         return $this->respond(['hospitals' => $result], 200);
    //     } catch (\Exception $e) {
    //         $error = array($e->getmessage());
    //         $errormsg = json_encode($error);
    //         echo $errormsg;
    //     }


    // }


    //get all receptinist function
    // public function receptinists()
    // {
    //     try {
    //         $users = new UserModel();

    //         $result = $users->where('role', 5)->findAll();

    //         if (empty($result)) {
    //             return $this->respond(['message' => 'No receptinist found', 'receptinists' => []], 404);
    //         }

    //         foreach ($result as &$user) {
    //             if (!empty($user['profile'])) {
    //                 $user['profile'] = $this->imagePath . $user['profile'];
    //             }
    //         }
    //         return $this->respond(['receptinists' => $result], 200);

    //     } catch (\Exception $e) {
    //         $error = array($e->getmessage());
    //         $errormsg = json_encode($error);
    //         echo $errormsg;
    //     }

    // }

    //change password//
    public function change_password()
    {
        $key = 'JWT_SECRET_KEY_SAMPLE_HERE';
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


    //edit profile//
    public function edit_profile()
    {

        try {
            $userid = $this->request->getPost('userId');
            $fullname = $this->request->getPost('fullname');
            $email = $this->request->getPost('email');
            $address = $this->request->getPost('address');
            $dob = $this->request->getPost('dob');
            $image = $this->request->getFile('image');
            $phone = $this->request->getPost('phone');

            // Validation rules
            $rules = [
                'userId' => ['rules' => 'required|max_length[3]'],
                'fullname' => ['rules' => 'required|min_length[3]|max_length[255]'],
                'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]'],
                'address' => ['rules' => 'required|min_length[4]|max_length[255]'],
                'dob' => ['rules' => 'required|valid_date'],
                'phone' => ['rules' => 'required|min_length[10]|max_length[15]'],
                'image' => ['rules' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]']

            ];

            // Validate input
            if ($this->validate($rules)) {
                // Process image upload if available
                $newName = null;
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = time() . '.' . $image->getExtension();
                    $image->move(WRITEPATH . 'Api-images', $newName);
                }

                // Prepare user data
                $model = new UserModel();
                $data = [
                    'fullname' => $fullname,
                    'email' => $email,
                    'address' => $address,
                    'date_of_birth' => $dob,
                    'phone' => $phone,
                    'role'=>6

                ];
                if ($newName) {
                    $data['profile'] = $newName;
                }

                $model->editData($userid, $data);

                return $this->respond(['status' => 200, 'message' => 'Registered Successfully'], 200);
            } else {
                $response = [
                    'status' => 409,
                    'message' => $this->validator->getErrors(),
                ];
                return $this->respond($response);
            }
        } catch (\Exception $e) {
            $error = array($e->getmessage());
            $errormsg = json_encode($error);
            echo $errormsg;
        }



    }



    // public function user_details()
    // {
    //     $key = 'JWT SECRET KEY SAMPLE HERE';
    //     $authHeader = $this->request->getHeader("Authorization");

    //     if ($authHeader) {
    //         $authHeader = $authHeader->getValue();
    //         $token = str_replace('Bearer ', '', $authHeader);
    //         $token = trim($token);

    //         try {
    //             $decoded = JWT::decode($token, new Key($key, "HS256"));
    //             $userModel = new UserModel();
    //             $userId = $decoded->id; // Adjust this based on your token's payload structure

    //             // Fetch user details from UserModel using the decoded user ID
    //             $user = $userModel->find($userId);

    //             if (!empty($user['profile'])) {
    //                 $user['profile'] = $this->imagePath . $user['profile'];
    //             }

    //             if ($user) {
    //                 $response = [
    //                     'status' => 200,
    //                     'messages' => 'User details',
    //                     'user' => $user
    //                 ];
    //                 return $this->respondCreated($response, 200);
    //             } else {
    //                 $response = [
    //                     'status' => 404,
    //                     'messages' => 'User not found',
    //                     'user' => null
    //                 ];
    //                 return $this->respondCreated($response, 404);
    //             }

    //         } catch (\Exception $ex) {
    //             $response = [
    //                 'status' => 404,
    //                 'messages' => 'User details',
    //                 'user' => null
    //             ];
    //             return $this->respondCreated($response, 404);
    //         }
    //     } else {
    //         $response = [
    //             'status' => 404,
    //             'messages' => 'Authorization header missing',
    //             'user' => null
    //         ];
    //         return $this->respondCreated($response, 404);
    //     }
    // }




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
            $email_dt->setfrom('smtp@fableadtechnolabs.com', 'fableadtechnolabs-com');



            $email_dt->setSubject($subject);
            $email_dt->setMessage($message);

            if ($email_dt->send()) {
                $this->response->setJSON(['status' => "1", 'message' => 'Check your mail.']);
            } else {

                $this->response->setJSON(['status' => "0", 'message' => 'Error to sent mail.']);
            }


        } else {
            $this->response->setJSON(['status' => "0", 'message' => 'User not found.']);
        }

        return $this->response;
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
    // END Forgot Password - 



    //dr wise appointment
    public function dr_wise_appointment()
    {
        try {
            $appointmentModel = new Appointments();
            $dr_id = $this->request->getPost('id');
            $patientName = $this->request->getPost('patient_name');
            $appointmentDate = $this->request->getPost('appointment_date');
    
            if (!empty($dr_id)) {
                // Prepare base query to fetch appointments for the given doctor
                $query = $appointmentModel->where('assigne_to', $dr_id);
    
                // If patient name is provided, add search condition
                if (!empty($patientName)) {
                    $query->join('enquiries', 'enquiries.id = appointments.inquiry_id')->like('enquiries.patient_name', $patientName);
                } else {
                    $query->join('enquiries', 'enquiries.id = appointments.inquiry_id');
                }
    
                // If appointment date is provided, add search condition
                 if (!empty($appointmentDate)) {
                    $appointmentDate = str_replace('/', '-', $appointmentDate);
                    $query->where("DATE_FORMAT(STR_TO_DATE(schedule, '%d/%m %h:%i %p'), '%d-%m') =", $appointmentDate);
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

                $images = json_decode($enquiry['image'], true);

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
                // Get today's date
                $today = date('Y-m-d');

                // Load AppointmentModel
                $appointmentModel = new Appointments;

                // Retrieve today's appointments for the specified doctor
                $appointments = $appointmentModel
                    ->where('assigne_to', $dr_id)
                    ->where('DATE(created_at)', $today) // Filter appointments created on today's date
                    ->findAll();

                if (!empty($appointments)) {
                    // Fetch user and inquiry details for each appointment
                    foreach ($appointments as &$appointment) {
                        $inquiryId = $appointment['inquiry_id'];
                        $inquiryModel = new EnquiryModel();
                        $inquiry = $inquiryModel->find($inquiryId);

                        if (!empty($inquiry)) {
                            $images = json_decode($inquiry['image'], true);

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
                                // Attach user details to the appointment
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
























}
