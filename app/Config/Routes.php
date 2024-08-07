<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('cake_catalog', 'Home::cake_catalog');
$routes->get('contact_us', 'Home::contact_us');

// Authentication Routes
$routes->get('register', 'Auth::register');
$routes->post('store', 'Auth::store');
$routes->get('login', 'Auth::login');
$routes->post('authenticate', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');

// User and Admin Routes
$routes->get('user', 'User::index', ['filter' => 'authFilter']);
$routes->get('admin', 'Admin::index', ['filter' => 'adminFilter']);

// Cart Routes
$routes->get('/cart', 'CartController::index');
$routes->get('/cart/add/(:num)', 'CartController::add/$1');
$routes->get('/cart/remove/(:num)', 'CartController::remove/$1');
$routes->post('/cart/update', 'CartController::update');

// Checkout Routes
$routes->get('/checkout', 'CheckoutController::index', ['filter' => 'authFilter']);
$routes->post('/checkout/complete', 'CheckoutController::complete', ['filter' => 'authFilter']);
$routes->get('/checkout/complete_purchase/(:num)', 'CheckoutController::completePurchase/$1');


// Order History Route
$routes->get('/user/order_history', 'User::orderHistory');


// Profile Routes
$routes->get('profile_view/view', 'ProfileController::view', ['filter' => 'authFilter']);
$routes->post('profile_view/updateProfile', 'ProfileController::updateProfile', ['filter' => 'authFilter']);
$routes->post('profile_view/changePassword', 'ProfileController::changePassword', ['filter' => 'authFilter']);

//Manages Orders
$routes->get('/admin/manage_orders', 'Admin::manageOrders');
$routes->post('/admin/update_order_status/(:num)/(:alpha)', 'Admin::updateOrderStatus/$1/$2');


//Manages Cake
$routes->get('/admin/manage_cake', 'Admin::manageCake');
$routes->post('/admin/add_cake', 'Admin::addCake');
$routes->post('/admin/edit_cake', 'Admin::editCake');
$routes->post('/admin/delete_cake/(:num)', 'Admin::deleteCake/$1');
