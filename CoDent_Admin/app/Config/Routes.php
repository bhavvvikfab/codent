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


$routes->group('admin', $authFilter, function ($routes) {
    $routes->get('dashboard', function () {
      return view('dashboard.php');
    });
});





// $routes->group('admin', $authFilter, function ($routes) {
//     $routes->get('dashboard', 'admin\DashboardController::index');
// });

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
