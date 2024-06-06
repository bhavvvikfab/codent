<?php

use App\Controllers\LoginController;
use App\Controllers\Patient\UserController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$authFilter = ['filter' => 'auth'];
$authRedirectFilter = ['filter' => 'authRedirect'];

$routes->get('/', 'LoginController::index',$authRedirectFilter);
$routes->post('login', 'LoginController::login');
$routes->get('logout', 'LoginController::logout');
$routes->get('register', 'LoginController::register',$authRedirectFilter);
$routes->post('registerdata', 'LoginController::register_data');
$routes->post('subscription_payment', 'LoginController::subscription_payment');


//forgot password end
$routes->get('forgot_password', 'LoginController::forgot_password');
 $routes->post('forgotPassword', 'LoginController::forgotPassword');
 $routes->get('confirmforgotPassword/(:num)/(:any)', 'LoginController::confirmforgotPassword/$1/$2');
 $routes->post('resetPassword', 'LoginController::resetPassword');
 //forgot password end

$routes->group('hospital', ['filter' => $authFilter], function ($routes) {
    $routes->get('dashboard', 'UserController::dashboard');

    
    $routes->get('users_profile', 'UserController::index');
    $routes->get('profile', 'UserController::showProfile');
    $routes->post('profile_update', 'UserController::update_profile');
    $routes->post('update_password', 'UserController::change_password');
    
    $routes->get('doctor', 'doctor\DoctorController::index');
    $routes->get('add_doctor', 'doctor\DoctorController::addDoctor');
    $routes->post('doctor_register', 'doctor\DoctorController::doctor_register');
    $routes->get('doctor_edit/(:num)', 'doctor\DoctorController::doctor_edit_view/$1');
    $routes->post('doctor_edit', 'doctor\DoctorController::doctor_edit');
    $routes->get('doctor_details/(:num)', 'doctor\DoctorController::doctor_details/$1');
    $routes->get('doctor_delete/(:num)', 'doctor\DoctorController::doctor_delete/$1');
    $routes->get('doctor_status', 'doctor\DoctorController::doctor_status');
    
    $routes->get('reception', 'receptinist\ReceptionController::index');
    $routes->get('add_receptionist', 'receptinist\ReceptionController::addReceptionist');
    $routes->post('reception_register', 'receptinist\ReceptionController::reception_register');
    $routes->get('reception_details/(:num)', 'receptinist\ReceptionController::reception_details/$1');
    $routes->get('reception_edit_view/(:num)', 'receptinist\ReceptionController::reception_edit_view/$1');
    $routes->post('receptionist_edit', 'receptinist\ReceptionController::receptionist_edit');
    $routes->get('reception_delete/(:num)', 'receptinist\ReceptionController::receptionist_delete/$1');
    $routes->get('receptionist_status', 'receptinist\ReceptionController::receptionist_status');
      
    $routes->get('patient', 'patient\PatientController::index');
    $routes->get('add_patient_form', 'patient\PatientController::add_patient_form');
    
    $routes->get('enquiry', 'enquiry\EnquiryController::all_enquiry');    
    $routes->get('add_enquiry', 'enquiry\EnquiryController::add_enquiry');    
    $routes->post('store_enquiry', 'enquiry\EnquiryController::store_enquiry');    
    $routes->get('delete_enquiry/(:num)', 'enquiry\EnquiryController::delete_enquiry/$1');    
    $routes->get('view_enquiry/(:num)', 'enquiry\EnquiryController::view_enquiry/$1');    
    $routes->get('edit_enquiry/(:num)', 'enquiry\EnquiryController::edit_enquiry/$1');    
    $routes->post('update_enquiry', 'enquiry\EnquiryController::update_enquiry');    
    $routes->post('convert_into_lead', 'enquiry\EnquiryController::convert_into_lead'); 
    
    

    $routes->get('leads', 'leads\LeadsController::leads');   
    $routes->get('view_lead/(:num)', 'leads\LeadsController::view_lead/$1');   



    $routes->get('appointment', 'appointment\AppointmentController::all_appointment');
    $routes->get('add_appointment', 'appointment\AppointmentController::add_appointment');
    $routes->post('store_appointment', 'appointment\AppointmentController::store_appointment');
    $routes->get('get_dr_from_enquiry', 'appointment\AppointmentController::get_dr_from_enquiry');
    $routes->get('delete_appointment/(:num)', 'appointment\AppointmentController::deleteAppointment/$1');
    $routes->get('view_appointment/(:num)', 'appointment\AppointmentController::view_Appointment/$1');
    $routes->get('edit_appointment/(:num)', 'appointment\AppointmentController::edit_appointment/$1');
    $routes->post('update_appointment', 'appointment\AppointmentController::update_appointment');

   

    $routes->get('get_doctor_dropdown','patient\PatientController::get_doctor_dropdown');
    
});






$routes->group('patient',['filter' => $authFilter], function ($routes) {
    
    $routes->get('profile', 'UserController::index');
    $routes->get('dashboard', function () {
        return view('dashboard.php');
    });
    $routes->get('users_profile', 'UserController::index');
    $routes->post('profile_update', 'UserController::update_profile');
    $routes->post('update_password', 'UserController::update_password');


    $routes->get('enquiry', 'enquiry\EnquiryController::all_enquiry');    
    $routes->get('add_enquiry', 'enquiry\EnquiryController::add_enquiry');  
    $routes->post('store_enquiry', 'enquiry\EnquiryController::store_enquiry');
    $routes->get('delete_enquiry/(:num)', 'enquiry\EnquiryController::delete_enquiry/$1');     
    $routes->get('view_enquiry/(:num)', 'enquiry\EnquiryController::view_enquiry/$1');    
    // $routes->get('edit_enquiry/(:num)', 'enquiry\EnquiryController::edit_enquiry/$1');   


    $routes->get('get_doctor_dropdown','patient\PatientController::get_doctor_dropdown');
});

// Routes.php





// $routes->group('user', $authFilter, function ($routes) {
//     $routes->get('dashboard', 'user\DashboardController::index');
// });

// $routes->group('receptinist', $authFilter, function ($routes) {
//     $routes->get('dashboard', 'receptinist\DashboardController::index');
// });

// $routes->group('specialist', $authFilter, function ($routes) {
//     $routes->get('dashboard', 'specialist\DashboardController::index');
// });

// $routes->group('practices', $authFilter, function ($routes) {
//     $routes->get('dashboard', 'practices\DashboardController::index');
// });

// $routes->group('user', $authFilter, function ($routes) {
//     $routes->get('dashboard', 'user\DashboardController::index');
// });
