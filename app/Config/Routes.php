<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Mobile\HomeController::index');
$routes->get('/master-aset', 'Mobile\HomeController::master');
