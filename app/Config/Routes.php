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


// Kode akun
$routes->group('admin', ['filter' => 'authFilter'], function($routes) {
    $routes->get('KodeAkun/akun', 'admin\AkunController::viewakun');
    $routes->get('KodeAkun/tambah-akun', 'admin\AkunController::tambahAkun');
    $routes->get('KodeAkun/edit-akun/(:num)', 'admin\AkunController::editAkun/$1');
    $routes->get('KodeAkun/delete-akun/(:num)', 'admin\AkunController::deleteAkun/$1');

    $routes->post('KodeAkun/update-akun', 'admin\AkunController::updateAkun');
    $routes->post('KodeAkun/akun', 'admin\AkunController::saveAkun');
    $routes->get('KodeAkun/search', 'admin\AkunController::searchByKode');


    // Rute jurnal
    $routes->get('jurnal/jurnal', 'admin\JurnalController::jurnal');
    $routes->get('jurnal/addjurnal', 'admin\JurnalController::addjurnal');
    $routes->get('jurnal/edit/(:num)', 'admin\JurnalController::edit/$1');
    $routes->get('jurnal/delete/(:num)', 'admin\JurnalController::delete/$1');

    $routes->post('jurnal/jurnal', 'admin\JurnalController::saveJurnal');
    $routes->post('jurnal/update', 'admin\JurnalController::update');
    $routes->get('jurnal/detail/(:num)', 'admin\JurnalController::detail/$1'); 


    // Rute neraca
    $routes->get('Neraca/neraca', 'admin\NeracaController::viewNeraca');
    $routes->get('Neraca/addneraca', 'admin\NeracaController::addneraca');
    $routes->get('Neraca/edit/(:num)', 'admin\NeracaController::edit/$1');
    $routes->get('Neraca/delete/(:num)', 'admin\NeracaController::delete/$1');

    $routes->post('Neraca/neraca', 'admin\NeracaController::saveNeraca');
    $routes->post('Neraca/update', 'admin\NeracaController::update');

    // Rute labarugi
    $routes->get('labarugi/laba', 'admin\LabaController::laba');
    $routes->get('labarugi/addlaba', 'admin\LabaController::addlaba');
    $routes->get('labarugi/edit/(:num)', 'admin\LabaController::edit/$1');
    $routes->get('labarugi/delete/(:num)', 'admin\LabaController::delete/$1');

    $routes->post('labarugi/laba', 'admin\LabaController::savelaba');
    $routes->post('labarugi/update', 'admin\LabaController::update');

    // Rute data barang
    $routes->get('databarang/barang', 'admin\BarangController::barang');
    $routes->get('databarang/addbarang', 'admin\BarangController::addbarang');
    $routes->get('databarang/edit/(:num)', 'admin\BarangController::edit/$1');
    $routes->get('databarang/delete/(:num)', 'admin\BarangController::delete/$1');

    $routes->post('databarang/barang', 'admin\BarangController::savebarang');
    $routes->post('databarang/update', 'admin\BarangController::update');

    // Rute data barang item
    $routes->get('item/item', 'admin\ItemController::item');
    $routes->get('item/additem', 'admin\ItemController::additem');
    $routes->get('item/edit/(:num)', 'admin\ItemController::edit/$1');
    $routes->get('item/delete/(:num)', 'admin\ItemController::delete/$1');

    $routes->post('item/item', 'admin\ItemController::saveitem');
    $routes->post('item/update', 'admin\ItemController::update');

    // Rute transaksi detail barang
    $routes->get('transaksidetail/index', 'admin\Transaksidetail::index');
    $routes->get('transaksidetail/add', 'admin\Transaksidetail::add');
    $routes->get('transaksidetail/edit/(:num)', 'admin\Transaksidetail::edit/$1');
    $routes->get('transaksidetail/delete/(:num)', 'admin\Transaksidetail::delete/$1');

    $routes->post('transaksidetail/index', 'admin\Transaksidetail::save');
    $routes->post('transaksidetail/update', 'admin\Transaksidetail::update');

    //laporan keuangan 
    $routes->get('laporan_keuangan/index', 'admin\LaporanKeuanganController::index');
    $routes->get('laporan_keuangan/cetak', 'admin\LaporanKeuanganController::cetak');
});
