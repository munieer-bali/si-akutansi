<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Labarugi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_laba' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_akun' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => '200',
            ],
            'pendapatan_usaha' => [
                'type' => 'DECIMAL',
                'constraint' => '20,2',
                'null' => true,
            ],
            'beban_operasional' => [
                'type' => 'DECIMAL',
                'constraint' => '20,2',
                'null' => true,
            ],
            'laba_kotor' => [
                'type' => 'DECIMAL',
                'constraint' => '20,2',
                'null' => true,
            ],
            'pendapatan_lain' => [
                'type' => 'DECIMAL',
                'constraint' => '20,2',
                'null' => true,
            ],
            'beban_lain' => [
                'type' => 'DECIMAL',
                'constraint' => '20,2',
                'null' => true,
            ],
            'laba_bersih' => [
                'type' => 'DECIMAL',
                'constraint' => '20,2',
                'null' => true,
            ],
        ]);
        $this->forge->addForeignKey('id_akun', 'transaksi', 'id_akun', 'CASCADE', 'CASCADE');
        $this->forge->addKey('id_laba', true);
        $this->forge->createTable('labarugi');
    }

    public function down()
    {
        $this->forge->dropTable('labarugi');
    }
}
