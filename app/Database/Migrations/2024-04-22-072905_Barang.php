<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'item_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'item_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'item_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'transaksi_date' => [
                'type' => 'DATE',
            ],
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
            ],
            'item_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => '0.00',
            ],
            'item_stock' => [
                'type' => 'INT',
                'constraint' => 5,
                'default' => 0,
            ],
        ]);
        $this->forge->addPrimaryKey('item_id');
        $this->forge->createTable('item');
    }

    public function down()
    {
        $this->forge->dropTable('item');
    }
}
