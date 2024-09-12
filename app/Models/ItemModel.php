<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'item_id';
    protected $allowedFields = ['item_name', 'item_description', 'transaksi_date', 'customer_id', 'item_price', 'item_stock'];

    protected $returnType = 'array';

    
    public function reduceStock($item_id, $quantity)
    {
        // Ambil data item berdasarkan item_id
        $item = $this->find($item_id);

        if ($item) {
            // Kurangi stok dengan quantity
            $new_stock = $item['item_stock'] - $quantity;

            // Pastikan stok tidak negatif
            if ($new_stock < 0) {
                return false; // Stok tidak cukup
            }

            // Update stok di database
            return $this->update($item_id, ['item_stock' => $new_stock]);
        }

        return false; // Barang tidak ditemukan
    }
}
