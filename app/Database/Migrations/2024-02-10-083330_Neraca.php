<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Neraca extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_neraca' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_akun' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'total_aset' => [
                'type' => 'DECIMAL',
                'constraint' => '20,2', // 20 digit total, 2 di belakang koma
            ],
            'total_kewajiban' => [
                'type' => 'DECIMAL',
                'constraint' => '20,2',
            ],
            'ekuitas_bersih' => [
                'type' => 'DECIMAL',
                'constraint' => '20,2',
            ],
            'periode' => [
                'type'       => 'VARCHAR',
                'constraint' => 7, // Format: YYYY-MM
                'null'       => false,
            ],
        ]);
        $this->forge->addForeignKey('id_akun', 'akun', 'id_akun', 'CASCADE', 'CASCADE');
        $this->forge->addKey('id_neraca', true);
        $this->forge->createTable('neraca');
    }

    public function down()
    {
        $this->forge->dropTable('neraca');
    }
}
