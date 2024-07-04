<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'item_id';
    protected $allowedFields = ['item_name', 'item_description', 'transaksi_date', 'customer_id', 'item_price', 'item_stock'];

    protected $returnType = 'array';
}
