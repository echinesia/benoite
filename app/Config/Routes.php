<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('cake_catalog', 'Home::cake_catalog');
$routes->get('contact_us', 'Home::contact_us');
