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
