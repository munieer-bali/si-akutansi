<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukubesarModel;
use App\Models\akunDashboard;
use App\Models\barangDashboard;
use App\Models\detailDashboard;
use App\Models\itemDashboard;
use App\Models\labaDashboard;
use App\Models\neracaDashboard;
use App\Models\transaksiDasboard;
use App\Models\transaksiDashboard;

class Dashboard extends BaseController
{

    public function index()
    {
        // $bukuBesarModel = new  BukubesarModel();

        // $data['saldo_akun'] = $bukuBesarModel->getSaldoAkun();
        // // Mengambil total saldo keseluruhan dari hasil penghitungan di model
        // $data['total_saldo'] = $data['saldo_akun']['total_saldo'];

        //untuk menampilkan jumlah keseluruhan
        $modelTabel1 = new akunDashboard();
        $modelTabel2 = new barangDashboard();
        $modelTabel3 = new labaDashboard();
        $modelTabel4 = new neracaDashboard();
        $modelTabel5 = new transaksiDashboard();
        $modelTabel6 = new itemDashboard();
        $modelTabel7 = new detailDashboard();


        $data['jumlah_data_akun'] = $modelTabel1->countAll(); // Sesuaikan dengan model dan tabel Anda
        $data['jumlah_data_barang'] = $modelTabel2->countAll();
        $data['jumlah_data_labarugi'] = $modelTabel3->countAll();
        $data['jumlah_data_neraca'] = $modelTabel4->countAll();
        $data['jumlah_data_transaksi'] = $modelTabel5->countAll();
        $data['jumlah_data_item'] = $modelTabel6->countAll();
        $data['jumlah_data_item_keluar'] = $modelTabel7->countAll();

        return view('/dashboard', $data);
    }
}
