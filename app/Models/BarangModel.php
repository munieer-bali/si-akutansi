<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang_gudang';
    protected $primaryKey       = 'id_barang';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['id_barang','item_id', 'nama_barang', 'jumlah_barang', 'tanggal', 'harga_beli', 'harga_jual'];

    public function getBarang(){
        $builder = $this->db->table($this->table);
        $builder->select('barang_gudang.*, item.item_name, item.customer_id');
        $builder->join('item', 'item.item_id = barang_gudang.item_id');
        $query = $builder->get();
        return $query->getResult(); 
    }
    

}
