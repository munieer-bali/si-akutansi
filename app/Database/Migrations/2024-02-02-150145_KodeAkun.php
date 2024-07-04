<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KodeAkun extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_akun' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'       => true
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_akun', true);
        $this->forge->createTable('akun');
    }

    public function down()
    {
        $this->forge->dropTable('akun');
    }
}
