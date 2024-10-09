<?php

namespace App\Models;

use CodeIgniter\Model;

class JurnalModel extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_akun', 'tipe_transaksi', 'jumlah', 'tanggal'];


    public function getJurnalData()
    {
        $builder = $this->db->table('transaksi');
        $builder->join('akun', 'akun.id_akun = transaksi.id_akun'); 
        $query = $builder->get();
        return $query->getResult();
    }

    public function getTransaksi()
    {
        // Menggunakan join untuk menggabungkan tabel 'akun' dan 'transaksi'
        return $this->select('transaksi.*, akun.nama')
            ->join('akun', 'akun.id_akun = transaksi.id_akun')
            ->findAll();
    }

    // Menghitung saldo akun berdasarkan debit dan kredit
    public function getSaldoAkun()
    {
        // Mengambil semua data transaksi
        $transaksi = $this->getTransaksi();
        $saldo_akun = []; // Untuk menyimpan saldo tiap akun
        $total_saldo = 0; // Untuk menghitung total saldo seluruh akun

        // Looping setiap transaksi
        foreach ($transaksi as $row) {
            $id_akun = $row['id_akun']; // Mengambil id akun dari transaksi
            $jumlah = $row['jumlah']; // Mengambil jumlah transaksi
            $tipe_transaksi = $row['tipe_transaksi']; // Mengambil tipe transaksi (debit/kredit)

            // Jika tipe transaksi adalah debit, maka jumlahnya dianggap pengeluaran (-)
            if ($tipe_transaksi == 'debet') {
                $jumlah = -$jumlah;
            }

            // Memasukkan jumlah transaksi ke saldo akun yang bersangkutan
            if (!isset($saldo_akun[$id_akun])) {
                $saldo_akun[$id_akun] = $jumlah;
            } else {
                $saldo_akun[$id_akun] += $jumlah;
            }

            // Menambahkan ke total saldo semua akun
            $total_saldo += $jumlah;
        }

        // Mengembalikan saldo per akun dan total saldo
        return ['saldo_akun' => $saldo_akun, 'total_saldo' => $total_saldo];
    }

    public function getJurnalDataByTanggal($tanggal_awal, $tanggal_akhir)
    {
        $builder = $this->db->table('transaksi');
        $builder->join('akun', 'akun.id_akun = transaksi.id_akun');
        
        // Menggunakan filter tanggal dalam query
        $builder->where('transaksi.tanggal >=', $tanggal_awal);
        $builder->where('transaksi.tanggal <=', $tanggal_akhir);
        
        $query = $builder->get();
        return $query->getResult();
    }

}
