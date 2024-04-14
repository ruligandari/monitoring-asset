<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  auth

$routes->get('/login', 'Mobile\LoginController::index');
$routes->post('/auth', 'Mobile\LoginController::auth');
$routes->post('/logout', 'Mobile\LoginController::logout');

$routes->get('/register', 'Mobile\LoginController::register');

// route group /
$routes->get('/', 'Mobile\HomeController::index', ['filter' => 'auth']);
$routes->get('/master-aset', 'Mobile\HomeController::master');
$routes->get('/master-surat', 'Mobile\MasterSuratController::mastersurat');
$routes->get('/barang-masuk', 'Mobile\BarangMasukController::barangmasuk');

$routes->get('/barang-keluar', 'Mobile\BarangKeluarController::barangkeluar');

$routes->get('/surat-masuk', 'Mobile\SuratMasukController::suratmasuk');

$routes->get('/surat-keluar', 'Mobile\SuratKeluarController::suratkeluar');

$routes->get('/admin', 'Mobile\AdminController::admin');

$routes->get('/teknisi', 'Mobile\AdminController::teknisi');
