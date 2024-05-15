<?php

use App\Controllers\LoginController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$authFilter = ['filter' => 'auth'];
$authRedirectFilter = ['filter' => 'authRedirect'];

$routes->get('/', 'LoginController::index',$authRedirectFilter);
$routes->post('/login', 'LoginController::login');
$routes->get('/logout', 'LoginController::logout');


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
  // ==============hospitals routes end===========

   // ==============packages routes==============
  //  $routes->get('get_packages', 'PackagesController::get_packages');
   // ==============packages routes end===========

});




