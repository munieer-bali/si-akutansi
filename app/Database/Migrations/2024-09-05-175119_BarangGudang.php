<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangGudang extends Migration
{
    public function up()
    {
        
        $this->forge->addField([
            'id_barang' => [
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
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'jumlah_barang' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'harga_beli' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'harga_jual' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);

        $this->forge->addForeignKey('item_id', 'item', 'item_id', 'CASCADE', 'CASCADE');
        $this->forge->addKey('id_barang', true);
        $this->forge->createTable('barang_gudang');
    }

    public function down()
    {
        $this->forge->dropTable('barang_gudang');
    }
}
