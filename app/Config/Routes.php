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
$routes->get('/barang-keluar/edit/(:any)', 'Mobile\BarangKeluarController::edit/$1');

$routes->get('/surat-masuk', 'Mobile\SuratMasukController::suratmasuk');
$routes->get('/surat-masuk/edit/(:any)', 'Mobile\SuratMasukController::edit/$1');
$routes->post('/surat-masuk/approve', 'Mobile\SuratMasukController::update');

$routes->get('/surat-keluar', 'Mobile\SuratKeluarController::suratkeluar');
$routes->get('/surat-keluar/edit/(:any)', 'Mobile\SuratKeluarController::edit/$1');

$routes->get('/admin', 'Mobile\AdminController::admin');

$routes->get('/teknisi', 'Mobile\AdminController::teknisi');

$routes->get('/profile', 'Mobile\ProfileController::index');
$routes->post('/profile/update', 'Mobile\ProfileController::update');

// Teknisi
$routes->get('/pengajuan-perangkat', 'Mobile\PengajuanPerangkatController::index');
$routes->get('/pengajuan-perangkat/tambah', 'Mobile\PengajuanPerangkatController::tambah');
$routes->post('/pengajuan-perangkat/add', 'Mobile\PengajuanPerangkatController::add');
$routes->get('/pengajuan-perangkat/edit/(:any)', 'Mobile\PengajuanPerangkatController::edit/$1');
$routes->post('/pengajuan-perangkat/update', 'Mobile\PengajuanPerangkatController::update');
$routes->post('/pengajuan-perangkat/delete', 'Mobile\PengajuanPerangkatController::delete');
$routes->get('/asset/perangkat-disimpan', 'Mobile\PengajuanPerangkatController::perangkatDisimpan');
// download surat
$routes->get('/download/(:any)', 'Mobile\PengajuanPerangkatController::download/$1');
// Project Manager
$routes->get('/pengajuan-teknisi', 'Mobile\ProjectManagerController::index');
$routes->get('/pengajuan-teknisi/edit/(:any)', 'Mobile\ProjectManagerController::edit/$1');
$routes->post('/pengajuan-teknisi/approve', 'Mobile\ProjectManagerController::update');

// surat
