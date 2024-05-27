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
  $routes->get('hospital_delete', 'HospitalController::hospital_delete');
  $routes->get('edit_hospital(:num)', 'HospitalController::edit_hospital/$1');
  $routes->post('edit_hospital', 'HospitalController::edit_hospital_data');
  $routes->get('view_hospital(:num)', 'HospitalController::view_hospital/$1');
 
  
  
  
  
  // ==============hospitals routes end===========



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




});

 // ==============API routes end===========

 $routes->group("api", ['namespace' => 'App\Controllers\Api'], function($routes) {

  $routes->post("user_register", "ApiController::userRegister");
  $routes->post("login", "ApiController::login");
  $routes->get("all_users", "ApiController::allUsers", ['filter' => 'apiAuth']);
  $routes->get("patient", "ApiController::patients", ['filter' => 'apiAuth']);
  $routes->get("hospitals", "ApiController::hospitals", ['filter' => 'apiAuth']);
  $routes->get("receptinists", "ApiController::receptinists", ['filter' => 'apiAuth']);
  $routes->post("change_password", "ApiController::change_password", ['filter' => 'apiAuth']);
  $routes->post("edit_profile", "ApiController::edit_profile", ['filter' => 'apiAuth']);

});


 // ==============API routes end===========


 // ==============Patients routes  start===========

 $routes->get('patient', 'PatientController::index');
 $routes->get('add_patient', 'PatientController::add_patient_view');
 $routes->get('patient_status', 'PatientController::patient_status_fun');
 $routes->post('register_patient_form', 'PatientController::register_form_fun');
 $routes->get('editpait', 'PatientController::editpait_fun');
 $routes->get('viewpait', 'PatientController::viewpait_fun');


//  $routes->get('editpait(:num)', 'PatientController::editpait_fun/$1');




 