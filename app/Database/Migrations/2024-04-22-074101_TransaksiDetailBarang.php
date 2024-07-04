<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiDetailBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'transaksi_detail_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'item_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'transaksi_date' => [
                'type' => 'DATE',
            ],
            'kode_pelanggan' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 5,
                'default' => 1,
            ],
            'price_per_item' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => '0.00',
            ],
            'subtotal' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => '0.00',
            ],
            'total_subtotal' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => '0.00',
            ],
        ]);
        $this->forge->addPrimaryKey('transaksi_detail_id');
        $this->forge->addForeignKey('item_id', 'item', 'item_id');
        $this->forge->createTable('transaksi_detail_barang');
    }


    public function down()
    {
        $this->forge->dropTable('transaksi_detail_barang');
    }
}
