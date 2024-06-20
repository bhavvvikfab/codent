<?php

use App\Controllers\LoginController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$authFilter = ['filter' => 'auth'];
$authRedirectFilter = ['filter' => 'authRedirect'];


$routes->get('/', 'LoginController::index',$authRedirectFilter);
$routes->post('login', 'LoginController::login');
$routes->get('logout', 'LoginController::logout');


$routes->group('',$authFilter, function ($routes) {
  $routes->get('dashboard', 'DashboardController::index');

  // ==============profile routes===========
  $routes->get('profile', 'ProfileController::index');
  $routes->post('edit_profile', 'ProfileController::editProfile');
  $routes->post('change_password', 'ProfileController::change_password');
  // =============profile routes end=========

  // ==============hospitals routes==============
  $routes->get('hospitals', 'HospitalController::index');
  $routes->get('add_hospital', 'HospitalController::add_hospital_view');
  $routes->post('add_hospital', 'HospitalController::add_hospital');
  $routes->get('hospital_status', 'HospitalController::hospital_status');
  $routes->get('delete_hospital/(:num)', 'HospitalController::hospital_delete/$1');
  $routes->get('edit_hospital(:num)', 'HospitalController::edit_hospital/$1');
  $routes->post('edit_hospital', 'HospitalController::edit_hospital_data');
  $routes->get('view_hospital(:num)', 'HospitalController::view_hospital/$1');
  // $routes->get('view_hospital(:num)', 'HospitalController::view_hospital/$1');
 
  
  
  
  
  // ==============hospitals routes end===========


  // ==============DashBoard routes Start===========


  $routes->get('appointment/fetchAppointmentCount/(:segment)', 'DashboardController::fetchAppointmentCount/$1');
  // $routes->get('fetchChartData', 'DashboardController::fetchChartData');
  $routes->get('fetch-data', 'ReportsController::fetchData');






  // ==============DashBoard routes end===========


  



   // ==============packages routes==============
   
 
   $routes->get('subscription', 'PackagesController::index');
   $routes->get('add_subscription', 'PackagesController::add_subscription');
   $routes->post('add_subcription_form', 'PackagesController::add_subscription_form');
   $routes->get('fetch_subscription', 'PackagesController::fetch_subscription');
   $routes->post('update_subscription', 'PackagesController::update');
   $routes->get('package_status', 'PackagesController::package_status');
   $routes->get('delete_Subscription', 'PackagesController::delete_Subscription');
   
   
   // ==============packages routes end===========



   // ==============Doctors routes==============
   
   $routes->get('doctors', 'DoctorController::index');
   $routes->get('add_doctor', 'DoctorController::add_doctor_fun');
   $routes->post('doctor_register', 'DoctorController::doctor_register_form');
   $routes->get('editDoctor', 'DoctorController::editDoctor');
   $routes->post('doctor/updateDoctor', 'DoctorController::updateDoctor');
   $routes->get('viewDoctor', 'DoctorController::viewDoctor_fun');
   $routes->post('deleteDoctor', 'DoctorController::deleteDoctor_fun');
   $routes->get('doctor_status', 'DoctorController::doctor_status_fun');
  

   
   
   

   // ==============Doctors routes end===========




   
 // ==============Patients routes  start===========

 $routes->get('patient', 'PatientController::index');
 $routes->get('add_patient', 'PatientController::add_patient_view');
 $routes->get('patient_status', 'PatientController::patient_status_fun');
 $routes->post('register_patient_data', 'PatientController::register_form_fun');
 $routes->get('editpait', 'PatientController::editpait_fun');
 $routes->get('viewpait', 'PatientController::viewpait_fun');
 $routes->post('update_patient_form', 'PatientController::update_patient_fun');
 $routes->get('deletepait', 'PatientController::delete_fun');


 // ==============Patients routes  end===========



 // ==============Enquiry routes  start===========


 $routes->get('enquiries', 'EnquiryController::index');
 $routes->get('add_enquiries', 'EnquiryController::add_enquiries_view');
//  $routes->get('get_doctors', 'EnquiryController::get_doctors_fun');
 $routes->get('get_doctors/(:num)', 'EnquiryController::get_doctors/$1');
 $routes->post('add_Enquery', 'EnquiryController::add_Enquery_fun');
 $routes->get('edit_enquiry', 'EnquiryController::editEnquiry_fun');
 $routes->post('update_form', 'EnquiryController::update_enquiry_fun');

 $routes->get('viewEnquiry', 'EnquiryController::viewEnquiry_fun');

//  $routes->get('get-doctors/(:num)', 'YourController::getDoctorsByHospital/$1');
 $routes->get('deleteEnquiry', 'EnquiryController::deleteEnquiry_fun');
 

 // ==============Enquiry routes  end===========



 // ==============Appointment routes  start===========



 $routes->get('appointment', 'AppointmentController::index');
 $routes->get('add_appointment', 'AppointmentController::add_appointment_view');
 $routes->post('register_form', 'AppointmentController::register_fun');
 $routes->get('editappoint', 'AppointmentController::editappoint_fun');
 $routes->get('viewappoint/(:num)', 'AppointmentController::viewappoint_fun/$1');
 $routes->get('editappoint/(:num)', 'AppointmentController::editappoint/$1');
 $routes->post('update_appointment', 'AppointmentController::update_appointment_fun');
 $routes->get('deleteappoint/(:num)', 'AppointmentController::deleteappoint_fun/$1');




 $routes->get('/get_doctors_by_hospital/(:num)', 'AppointmentController::get_doctors_by_hospital/$1');

 
 
 // ==============Enquiry routes  end===========


 // ==============contactUs routes  start===========




 $routes->get('contactUs', 'ContactController::index');
 $routes->get('viewContactus/(:num)', 'ContactController::viewContactus/$1');


 
 
 


 // ==============contactUs routes  end===========


 

// ============== Chat routes  end===========
 $routes->get('chats','ChatController::chats');
 $routes->get('view_chat/(:num)','ChatController::view_chat/$1');
 $routes->Post('send_message','ChatController::sent_message');
 $routes->post('get_live_message', 'ChatController::get_live_message');
// ============== Chat routes  end===========

});


























// ==============API routes end===========

$routes->group("api", ['namespace' => 'App\Controllers\Api'], function($routes) {


  $routes->get("user_details", "ApiController::user_details", ['filter' => 'apiAuth']); //useing token
  
  $routes->post("login", "ApiController::login");
  
  $routes->post("change_password", "ApiController::change_password", ['filter' => 'apiAuth']);
  
  $routes->post("get_doctor_details", "ApiController::get_doctor_details", ['filter' => 'apiAuth']);
  $routes->post("edit_profile", "ApiController::edit_profile", ['filter' => 'apiAuth']);
  
  $routes->post("dr_wise_patients", "ApiController::dr_wise_patients", ['filter' => 'apiAuth']);
  $routes->post("dr_wise_appointment", "ApiController::dr_wise_appointment", ['filter' => 'apiAuth']);
  $routes->post("get_enquiryById", "ApiController::get_enquiryById",['filter' => 'apiAuth']);
  $routes->post("view_appointment", "ApiController::view_appointment" ,['filter' => 'apiAuth']);
  
  $routes->post("get_today_appointment", "ApiController::get_today_appointment" ,['filter' => 'apiAuth']);
  $routes->post("appointment_status", "ApiController::appointment_status",['filter' => 'apiAuth']);
  $routes->post("get_allAppointmentBy_EnquiryId", "ApiController::get_allAppointmentBy_EnquiryId",['filter' => 'apiAuth']);
  $routes->post("upcoming_appointment", "ApiController::upcoming_appointment",['filter' => 'apiAuth']);
  
  $routes->post("edit_schedule", "ApiController::edit_schedule",['filter' => 'apiAuth']);
  

  //chat routes
  $routes->post("send_message", "ApiController::send_message",['filter' => 'apiAuth']);
  $routes->post("get_message", "ApiController::get_message",['filter' => 'apiAuth']);
  $routes->post("get_live_message", "ApiController::get_live_message",['filter' => 'apiAuth']);
  
  //forgot password end
  $routes->post('forgotPassword', 'ApiController::forgotPassword');
  $routes->get('confirmforgotPassword/(:num)/(:any)', 'ApiController::confirmforgotPassword/$1/$2');
  //forgot password end

});
  $routes->post("resetPassword", "Api\ApiController::resetPassword");

 // ==============API routes end===========





 


 

 
 


 