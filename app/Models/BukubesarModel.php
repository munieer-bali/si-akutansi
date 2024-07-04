<?php

namespace App\Models;

use CodeIgniter\Model;

class BukubesarModel extends Model
{

    protected $table = 'transaksi';

    public function getTransaksi()
    {
        // Menggunakan join builder untuk menggabungkan tabel jurnal_umum dan akun
        return $this->select('transaksi.*, akun.nama')
            ->join('akun', 'akun.id_akun = transaksi.id_akun')
            ->findAll();
    }

    public function getSaldoAkun()
    {
        // Menghitung saldo akun
        $transaksi = $this->getTransaksi();
        $saldo_akun = [];
        $total_saldo = 0;

        foreach ($transaksi as $row) {
            $id_akun = $row['id_akun'];
            $jumlah = $row['jumlah'];
            $tipe_transaksi = $row['tipe_transaksi']; // Menambahkan tipe transaksi

            // Mengubah nilai jumlah berdasarkan tipe transaksi (debit atau kredit)
            if ($tipe_transaksi == 'debet') {
                $jumlah = -$jumlah; // Jika tipe transaksi debit, jumlahnya dikurangi
            }

            if (!isset($saldo_akun[$id_akun])) {
                $saldo_akun[$id_akun] = $jumlah;
            } else {
                $saldo_akun[$id_akun] += $jumlah;
            }
            $total_saldo += $jumlah;
        }

        return ['saldo_akun' => $saldo_akun, 'total_saldo' => $total_saldo];
    }
}
