<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiDetailModel extends Model
{
    protected $table = 'transaksi_detail_barang';
    protected $primaryKey = 'transaksi_detail_id';
    protected $allowedFields = ['item_id', 'transaksi_date', 'kode_pelanggan', 'quantity', 'price_per_item', 'subtotal', 'total_subtotal'];
    protected $returnType = 'array';

    public function getAll()
    {
        $builder = $this->db->table($this->table);
        $builder->select('transaksi_detail_barang.*, item.item_name, item.item_description, item.item_price, item.customer_id, (transaksi_detail_barang.quantity * transaksi_detail_barang.price_per_item) as subtotal');
        $builder->join('item', 'item.item_id = transaksi_detail_barang.item_id');
        $query = $builder->get();
        $result = $query->getResult();

        // Inisialisasi total
        $total = 0;

        // Periksa apakah hasil tidak kosong
        if (!empty($result)) {
            foreach ($result as $row) {
                $total += $row->subtotal;
            }

            // Tidak perlu update ke database, cukup kirimkan total subtotal dalam hasil
        }

        // Mengembalikan hasil dengan total keseluruhan
        return [
            'data' => $result,
            'total_subtotal' => $total
        ];
    }

    public function getAllByDate($tanggal)
    {
        $builder = $this->db->table($this->table);
        $builder->select('transaksi_detail_barang.*, item.item_name, item.item_description, item.item_price, item.customer_id, (transaksi_detail_barang.quantity * transaksi_detail_barang.price_per_item) as subtotal');
        $builder->join('item', 'item.item_id = transaksi_detail_barang.item_id');
        $builder->where('transaksi_detail_barang.transaksi_date', $tanggal); // Filter berdasarkan tanggal
        $query = $builder->get();
        $result = $query->getResult();

        // Inisialisasi total
        $total = 0;

        // Periksa apakah hasil tidak kosong
        if (!empty($result)) {
            foreach ($result as $row) {
                $total += $row->subtotal;
            }
        }

        // Mengembalikan hasil dengan total keseluruhan
        return [
            'data' => $result,
            'total_subtotal' => $total
        ];
    }

    // Fungsi untuk menghitung Harga Pokok Penjualan (HPP)
    public function calculateHPP()
    {
        $builder = $this->db->table('item');
        $builder->selectSum('item_price'); // Misal, kolom cost_price adalah harga modal
        $query = $builder->get();
        $result = $query->getRow();
    
        // Mengembalikan total HPP
        return $result->item_price;
    }

    // Method untuk menghitung total harga transaksi per pelanggan
    public function calculateSubtotalByCustomer()
    {
        $query = $this->select('customer_id, SUM(subtotal) as total')
            ->groupBy('customer_id')
            ->findAll();

        return $query;
    }

    public function getDailySalesReport($date)
    {
        $builder = $this->db->table($this->table);
        $builder->select('transaksi_date, SUM((quantity * price_per_item)) AS total_pendapatan, 
            SUM((quantity * price_per_item) - (quantity * item.item_price)) AS total_laba_kotor');
        $builder->join('item', 'item.item_id = transaksi_detail_barang.item_id');
        $builder->where('transaksi_date', $date);
        $builder->groupBy('transaksi_date');
        return $builder->get()->getRow();
    }

    public function getJurnalDataByTanggal($tanggal_awal, $tanggal_akhir)
    {
        $builder = $this->db->table('transaksi_detail_barang');
        $builder->join('item', 'item.item_id = transaksi_detail_barang.item_id');
        
        // Menggunakan filter tanggal dalam query
        $builder->where('transaksi_detail_barang.transaksi_date >=', $tanggal_awal);
        $builder->where('transaksi_detail_barang.transaksi_date <=', $tanggal_akhir);
        
        $query = $builder->get();
        return $query->getResult();
    }
}
