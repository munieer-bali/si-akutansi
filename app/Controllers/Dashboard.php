<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukubesarModel;
use App\Models\Model1;
use App\Models\Model2;
use App\Models\Model3;
use App\Models\Model4;
use App\Models\Model5;
use App\Models\Model6;
use App\Models\Model7;



class Dashboard extends BaseController
{

    public function index()
    {
        $bukuBesarModel = new  BukubesarModel();

        $data['saldo_akun'] = $bukuBesarModel->getSaldoAkun();
        // Mengambil total saldo keseluruhan dari hasil penghitungan di model
        $data['total_saldo'] = $data['saldo_akun']['total_saldo'];

        //untuk menampilkan jumlah keseluruhan
        $modelTabel1 = new Model1();
        $modelTabel2 = new Model2();
        $modelTabel3 = new Model3();
        $modelTabel4 = new Model4();
        $modelTabel5 = new Model5();
        $modelTabel6 = new Model6();
        $modelTabel7 = new Model7();


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
