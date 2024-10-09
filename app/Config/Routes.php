<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Register::index');


$routes->setDefaultController('/');
$routes->get('/', 'Login::index', ['filter' => 'guestFilter']);
$routes->post('/login', 'Login::authentikasi', ['filter' => 'guestFilter']);

$routes->get('/register', 'Register::index', ['filter' => 'guestFilter']);
$routes->get('/register', 'Register::index', ['filter' => 'guestFilter']);
$routes->post('/register', 'Register::register', ['filter' => 'guestFilter']);

$routes->get('/logout', 'Login::logout', ['filter' => 'authFilter']);
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authFilter']);


//kode akun
$routes->get('admin/KodeAkun/akun', 'admin\AkunController::viewakun');
$routes->get('admin/KodeAkun/tambah-akun', 'admin\AkunController::tambahAkun');
$routes->get('admin/KodeAkun/edit-akun/(:num)', 'admin\AkunController::editAkun/$1');
$routes->get('admin/KodeAkun/delete-akun/(:num)', 'admin\AkunController::deleteAkun/$1');

$routes->post('admin/KodeAkun/update-akun', 'admin\AkunController::updateAkun');
$routes->post('admin/KodeAkun/akun', 'admin\AkunController::saveAkun');

//jurnal
$routes->get('admin/jurnal/jurnal', 'admin\JurnalController::jurnal');
$routes->get('admin/jurnal/addjurnal', 'admin\JurnalController::addjurnal');
$routes->get('admin/jurnal/edit/(:num)', 'admin\JurnalController::edit/$1');
$routes->get('admin/jurnal/delete/(:num)', 'admin\JurnalController::delete/$1');

$routes->post('admin/jurnal/jurnal', 'admin\JurnalController::saveJurnal');
$routes->post('admin/jurnal/update', 'admin\JurnalController::update');


//buku besar
// $routes->get('admin/bukubesar/bukubesar', 'admin\bukuController::BukuBesar');

//neraca
$routes->get('admin/Neraca/neraca', 'admin\NeracaController::viewNeraca');
$routes->get('admin/Neraca/addneraca', 'admin\NeracaController::addneraca');
$routes->get('admin/Neraca/edit/(:num)', 'admin\NeracaController::edit/$1');
$routes->get('admin/Neraca/delete/(:num)', 'admin\NeracaController::delete/$1');

$routes->post('admin/Neraca/neraca', 'admin\NeracaController::saveNeraca');
$routes->post('admin/Neraca/update', 'admin\NeracaController::update');

//labarugi

$routes->get('admin/labarugi/laba', 'admin\LabaController::laba');
$routes->get('admin/labarugi/addlaba', 'admin\LabaController::addlaba');
$routes->get('admin/labarugi/edit/(:num)', 'admin\LabaController::edit/$1');
$routes->get('admin/labarugi/delete/(:num)', 'admin\LabaController::delete/$1');

$routes->post('admin/labarugi/laba', 'admin\LabaController::savelaba');
$routes->post('admin/labarugi/update', 'admin\LabaController::update');

//data barang
$routes->get('admin/databarang/barang', 'admin\BarangController::barang');
$routes->get('admin/databarang/addbarang', 'admin\BarangController::addbarang');
$routes->get('admin/databarang/edit/(:num)', 'admin\BarangController::edit/$1');
$routes->get('admin/databarang/delete/(:num)', 'admin\BarangController::delete/$1');

$routes->post('admin/databarang/barang', 'admin\BarangController::savebarang');
$routes->post('admin/databarang/update', 'admin\BarangController::update');

//data barang item

$routes->get('admin/item/item', 'admin\ItemController::item');
$routes->get('admin/item/additem', 'admin\ItemController::additem');
$routes->get('admin/item/edit/(:num)', 'admin\ItemController::edit/$1');
$routes->get('admin/item/delete/(:num)', 'admin\ItemController::delete/$1');

$routes->post('admin/item/item', 'admin\ItemController::saveitem');
$routes->post('admin/item/update', 'admin\ItemController::update');



//transaksi detail barang
$routes->get('admin/transaksidetail/index', 'admin\Transaksidetail::index');
$routes->get('admin/transaksidetail/add', 'admin\Transaksidetail::add');
$routes->get('admin/transaksidetail/edit/(:num)', 'admin\Transaksidetail::edit/$1');
$routes->get('admin/transaksidetail/delete/(:num)', 'admin\Transaksidetail::delete/$1');

$routes->post('admin/transaksidetail/index', 'admin\Transaksidetail::save');
$routes->post('admin/transaksidetail/update', 'admin\Transaksidetail::update');
