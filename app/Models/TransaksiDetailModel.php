<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiDetailModel extends Model
{
    protected $table = 'transaksi_detail_barang';
    protected $primaryKey = 'transaksi_detail_id';
    protected $allowedFields = ['item_id', 'transaksi_date', 'kode_pelanggan', 'quantity', 'price_per_item', 'subtotal', 'total_subtotal'];

    protected $returnType = 'array';

    // Method untuk mengambil data dengan relasi
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

            // Menyimpan total keseluruhan subtotal ke tabel transaksi_detail_barang
            foreach ($result as $row) {
                $builder->where('transaksi_detail_id', $row->transaksi_detail_id);
                $builder->update(['total_subtotal' => $total]);
            }
        }

        // Mengembalikan hasil dengan total keseluruhan
        return [
            'data' => $result,
            'total_subtotal' => $total
        ];
    }


    // Method untuk menghitung total harga transaksi per pelanggan
    public function calculateSubtotalByCustomer()
    {
        $query = $this->select('customer_id, SUM(subtotal) as total')
            ->groupBy('customer_id')
            ->findAll();

        return $query;
    }

   
}
