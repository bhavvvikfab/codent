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

$routes->group('hospital', ['filter' => $authFilter], function ($routes) {
    $routes->get('dashboard', function () {
        return view('dashboard');
    });
    $routes->get('users_profile', 'UserController::index');
    $routes->get('profile', 'UserController::showProfile');
    $routes->post('profile_update', 'UserController::update_profile');
    $routes->post('update_password', 'UserController::change_password');
    
   
    $routes->get('doctor', 'doctor\DoctorController::index');
    $routes->get('add_doctor', 'doctor\DoctorController::addDoctor');
    $routes->post('doctor_register', 'doctor\DoctorController::doctor_register');
    $routes->get('doctor_edit/(:num)', 'doctor\DoctorController::doctor_edit_view/$1');
    $routes->post('doctor_edit', 'doctor\DoctorController::doctor_edit');
    
    
    $routes->get('reception', 'receptinist\ReceptionController::index');
    $routes->get('add_receptionist', 'receptinist\ReceptionController::addReceptionist');
      
    $routes->get('patient', 'patient\PatientController::index');
    $routes->get('add_patient', 'patient\PatientController::addPatient');
    
       
    
});



$routes->group('patient',['filter' => $authFilter], function ($routes) {
    
    $routes->get('profile', 'UserController::index');
    $routes->get('dashboard', function () {
        return view('dashboard.php');
    });
    $routes->get('users_profile', 'UserController::index');
    $routes->post('profile_update', 'UserController::update_profile');
    $routes->post('update_password', 'UserController::update_password');
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
