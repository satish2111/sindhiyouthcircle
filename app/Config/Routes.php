<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

$routes->get('register', 'AuthController::register_view');
$routes->get('register/create', 'AuthController::create');
$routes->post('register/store', 'AuthController::store');
$routes->get('register/edit/(:num)', 'AuthController::edit/$1');
$routes->post('register/update/(:num)', 'AuthController::update/$1');
$routes->get('register/delete/(:num)', 'AuthController::delete/$1');


$routes->get('settings', 'SettingController::index');

$routes->get('roles', 'RoleController::index');
$routes->get('roles/create', 'RoleController::create');
$routes->post('roles/store', 'RoleController::store');
$routes->get('roles/edit/(:num)', 'RoleController::edit/$1');
$routes->post('roles/update/(:num)', 'RoleController::update/$1');
$routes->get('roles/delete/(:num)', 'RoleController::delete/$1');


$routes->get('permissions', 'PermissionController::index');
$routes->get('permissions/create', 'PermissionController::create');
$routes->post('permissions/store', 'PermissionController::store');
$routes->get('permissions/edit/(:num)', 'PermissionController::edit/$1');
$routes->post('permissions/update/(:num)', 'PermissionController::update/$1');
$routes->get('permissions/delete/(:num)', 'PermissionController::delete/$1');

$routes->get('financial-year', 'FinancialYearController::index');
$routes->get('financial-year/create', 'FinancialYearController::create');
$routes->post('financial-year/store', 'FinancialYearController::store');
$routes->get('financial-year/edit/(:num)', 'FinancialYearController::edit/$1');
$routes->post('financial-year/update/(:num)', 'FinancialYearController::update/$1');
$routes->get('financial-year/delete/(:num)', 'FinancialYearController::delete/$1');



$routes->get('dashboard', 'DashboardController::index');


$routes->group('admin', ['filter' => 'auth:admin'], function($routes) {
    // Only admin can access this
    $routes->get('products', 'AdminController::products');
    $routes->get('users', 'AdminController::users');
});


