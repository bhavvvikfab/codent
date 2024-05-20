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
    $routes->get('users_profile', 'hospital\UserController::index');
    $routes->get('profile', 'hospital\UserController::showProfile');
    $routes->post('profile_update', 'hospital\UserController::update_profile');
    $routes->post('update_password', 'hospital\UserController::change_password');
    
    // $routes->get('reception', 'hospital\UserController::reception_view');
   
    $routes->get('doctor', 'hospital\DoctorController::index');
    $routes->get('add_doctor', 'hospital\DoctorController::addDoctor');
    $routes->get('back_to', 'hospital\DoctorController::index');
    
    
    $routes->get('reception', 'hospital\ReceptionController::index');
    $routes->get('add_receptionist', 'hospital\ReceptionController::addReceptionist');
    
    
    
    
    $routes->get('patient', 'hospital\PatientController::index');
    $routes->get('add_patient', 'hospital\PatientController::addPatient');
    
    
    

    
    
    
});



$routes->group('patient', $authFilter, function ($routes) {
    
    $routes->get('profile', 'Patient\UserController::index');
    $routes->get('dashboard', function () {
        return view('dashboard.php');
    });
    $routes->get('users_profile', 'Patient\UserController::index');
    $routes->post('profile_update', 'Patient\UserController::update_profile');
    $routes->post('update_password', 'Patient\UserController::update_password');
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
