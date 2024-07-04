<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BukuBesar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_buku' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_transaksi' => [
                'type'       => 'INT',
                'constraint' => '5',
                'unsigned'   => true,
            ],
            'id_akun' => [
                'type'       => 'INT',
                'constraint' => '5',
                'unsigned'   => true,
            ],
            'tipe_transaksi'      => [
                'type'           => 'ENUM',
                'constraint'     => array('credit', 'debet'),
                'default'        => 'credit'
            ],
            'jumlah' => [
                'type' => 'DECIMAL',
                'constraint' => '20'
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'saldo' => [
                'type' => 'DECIMAL',
                'constraint' => '20'
            ],



        ]);
        $this->forge->addForeignKey('id_akun', 'akun', 'id_akun', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_transaksi', 'transaksi', 'id_transaksi', 'CASCADE', 'CASCADE');
        $this->forge->addKey('id_buku', true);
        $this->forge->createTable('bukubesar');
    }

    public function down()
    {
        $this->forge->dropTable('bukubesar');
    }
}
