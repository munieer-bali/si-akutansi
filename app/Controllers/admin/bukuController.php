<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\BukubesarModel;
use App\Models\JurnalModel;


class bukuController extends BaseController
{
    public function BukuBesar()
    {
        $bukuBesarModel = new BukuBesarModel();

        // Mengambil data transaksi dari model
        $data['transaksi'] = $bukuBesarModel->getTransaksi();

        // Mengambil saldo akun dari model
        $data['saldo_akun'] = $bukuBesarModel->getSaldoAkun();
        // Mengambil total saldo keseluruhan dari hasil penghitungan di model
        $data['total_saldo'] = $data['saldo_akun']['total_saldo'];
        // Kirim data ke view
        return view('admin/bukubesar/bukubesar', $data);
    }
}
