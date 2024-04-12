<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Mobile\HomeController::index');
$routes->get('/master-aset', 'Mobile\HomeController::master');

$routes->get('/master-surat', 'Mobile\MasterSuratController::mastersurat');

$routes->get('/barang-masuk', 'Mobile\BarangMasukController::barangmasuk');

$routes->get('/barang-keluar', 'Mobile\BarangKeluarController::barangkeluar');

$routes->get('/surat-masuk', 'Mobile\SuratMasukController::suratmasuk');

$routes->get('/surat-keluar', 'Mobile\SuratKeluarController::suratkeluar');

$routes->get('/admin', 'Mobile\AdminController::admin');

$routes->get('/teknisi', 'Mobile\AdminController::teknisi');

$routes->get('/login', 'Mobile\LoginController::index');

$routes->get('/register', 'Mobile\LoginController::register');
