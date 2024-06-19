<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

//---------Route For Website Home-------------------//


$routes->get('/', 'WebsiteHome::index');


$routes->get('dentist_login', 'LoginController::index');
$routes->post('login_data', 'LoginController::login_fun');
// $routes->get('dashboard', 'LoginController::dashboard_fun');

$routes->get('logout', 'LoginController::logout');




$routes->get('register', 'LoginController::register_view');
$routes->post('/registerdata', 'LoginController::register_data');



$routes->get('dentist_portal', 'LoginController::dentist_portal_view');





$routes->get('referral', 'ReferralController::index');
$routes->get('search_enquiry', 'ReferralController::searchEnquiry_fun');
$routes->get('user_view_details/(:num)', 'ReferralController::user_view_fun/$1');






$routes->get('refer', 'ReferController::index');
$routes->post('add_enquiry', 'ReferController::add_enquiry_fun');






$routes->get('profile', 'ProfileController::index');
$routes->get('edit_profile/(:num)', 'ProfileController::editProfile/$1');
$routes->post('profile_update', 'ProfileController::profile_update_fun');
$routes->post('update_password', 'ProfileController::change_password');


$routes->get('contact', 'ContactController::index');
$routes->post('contact', 'ContactController::contact_fun');











