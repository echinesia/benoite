<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('cake_catalog', 'Home::cake_catalog');
$routes->get('contact_us', 'Home::contact_us');
$routes->get('register', 'Auth::register');
$routes->post('store', 'Auth::store');
$routes->get('login', 'Auth::login');
$routes->post('authenticate', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');
$routes->get('user', 'User::index');
$routes->get('admin', 'Admin::index', ['filter' => 'adminFilter']);
$routes->get('/cart', 'CartController::index');
$routes->get('/cart/add/(:num)', 'CartController::add/$1');
$routes->get('/cart/remove/(:num)', 'CartController::remove/$1');
$routes->post('/cart/update', 'CartController::update');
$routes->get('/checkout', 'CheckoutController::index');
$routes->post('/checkout/complete', 'CheckoutController::complete');
$route['user/orderHistory'] = 'user/orderHistory';


$routes->get('profile_view/view', 'ProfileController::view');
$routes->post('profile_view/updateProfile', 'ProfileController::updateProfile');
$routes->post('profile_view/changePassword', 'ProfileController::changePassword');
