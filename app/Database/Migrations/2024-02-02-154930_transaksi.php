<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_transaksi' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
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


        ]);
        $this->forge->addForeignKey('id_akun', 'akun', 'id_akun', 'CASCADE', 'CASCADE');
        $this->forge->addKey('id_transaksi', true);
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        $this->forge->dropTable('transaksi');
    }
}
