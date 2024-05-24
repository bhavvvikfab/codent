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
  

   
   


   // ==============Doctors routes end===========




});



