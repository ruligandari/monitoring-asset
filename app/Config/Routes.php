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
$routes->get('/master-aset/tambah', 'Mobile\HomeController::master_tambah');
$routes->post('/master-aset/add', 'Mobile\HomeController::master_add');
$routes->post('/master-aset/update', 'Mobile\HomeController::master_update');
$routes->post('/master-aset/delete', 'Mobile\HomeController::master_delete');
$routes->get('/master-aset/edit/(:num)', 'Mobile\HomeController::master_edit/$1');

$routes->get('/master-surat', 'Mobile\MasterSuratController::mastersurat');
// barang masuk
$routes->get('/barang-masuk', 'Mobile\BarangMasukController::barangmasuk');
// route CRUD seperti master-aset
$routes->get('/barang-masuk/tambah', 'Mobile\BarangMasukController::tambah');
$routes->post('/barang-masuk/add', 'Mobile\BarangMasukController::add');
$routes->get('/barang-masuk/edit/(:num)', 'Mobile\BarangMasukController::edit/$1');
$routes->post('/barang-masuk/update', 'Mobile\BarangMasukController::update');
$routes->post('/barang-masuk/delete', 'Mobile\BarangMasukController::delete');


$routes->get('/barang-keluar', 'Mobile\BarangKeluarController::barangkeluar');

$routes->get('/surat-masuk', 'Mobile\SuratMasukController::suratmasuk');

$routes->get('/surat-keluar', 'Mobile\SuratKeluarController::suratkeluar');

$routes->get('/admin', 'Mobile\AdminController::admin');

$routes->get('/teknisi', 'Mobile\AdminController::teknisi');


// Teknisi
$routes->get('/pengajuan-perangkat', 'Mobile\PengajuanPerangkatController::index');
$routes->get('/pengajuan-perangkat/tambah', 'Mobile\PengajuanPerangkatController::tambah');
$routes->post('/pengajuan-perangkat/add', 'Mobile\PengajuanPerangkatController::add');
$routes->get('/pengajuan-perangkat/edit/(:any)', 'Mobile\PengajuanPerangkatController::edit/$1');
$routes->post('/pengajuan-perangkat/update', 'Mobile\PengajuanPerangkatController::update');
$routes->post('/pengajuan-perangkat/delete', 'Mobile\PengajuanPerangkatController::delete');
