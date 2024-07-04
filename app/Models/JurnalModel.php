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

    // function getAll()
    // {
    //     $builder = $this->db->table('transaksi');

    //     // Melakukan JOIN dengan tabel 'akun' berdasarkan kolom 'id_akun'
    //     $builder->join('akun', 'akun.id_akun = transaksi.id_akun');

    //     // Menentukan kolom-kolom yang ingin Anda ambil
    //     $builder->select('akun.id_akun, akun.nama');

    //     // Eksekusi query dan ambil hasilnya
    //     $query = $builder->get();
    //     return $query->getResult();
    // }

    // function validateJurnalUmum($id_transaksi, $tipe_transaksi, $jumlah)
    // {
    //     if (!in_array($tipe_transaksi, ['debit', 'kredit'])) {
    //         return false; // Validasi gagal jika tipe transaksi tidak valid
    //     }

    //     // Validasi debit dan kredit sesuai aturan bisnis
    //     if (($tipe_transaksi == 'debit' && $jumlah <= 0) || ($tipe_transaksi == 'kredit' && $jumlah >= 0)) {
    //         return false; // Validasi gagal jika jumlah tidak sesuai dengan tipe transaksi
    //     }

    //     // Cek apakah total debit dan kredit seimbang
    //     $totalDebit = $this->where('id_transaksi', $id_transaksi)->where('tipe_transaksi', 'debit')->selectSum('jumlah')->get()->getRow()->jumlah;
    //     $totalKredit = $this->where('id_transaksi', $id_transaksi)->where('tipe_transaksi', 'kredit')->selectSum('jumlah')->get()->getRow()->jumlah;

    //     if ($totalDebit != $totalKredit) {
    //         return false; // Validasi gagal jika total debit dan kredit tidak seimbang
    //     }

    //     return true; // Jika validasi sukses
    // }
}
