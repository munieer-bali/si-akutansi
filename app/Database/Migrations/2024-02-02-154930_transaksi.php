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
                'constraint' => 5,
                'unsigned'   => true,
            ],
            'tipe_transaksi' => [
                'type'       => 'ENUM',
                'constraint' => ['credit', 'debet'],
                'default'    => 'credit',
            ],
            'jumlah' => [
                'type'       => 'DECIMAL',
                'constraint' => '20,2', // Menambahkan presisi decimal
            ],
            'tanggal' => [
                'type' => 'DATE',
            ],
            'bukti_pembayaran' => [ // Kolom baru untuk menyimpan nama file bukti pembayaran
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'default'    => null,
            ],
            'periode' => [
                'type'       => 'VARCHAR',
                'constraint' => 7, // Format: YYYY-MM
                'null'       => false,
            ],
        ]);

        // Menambahkan kunci utama dan relasi foreign key
        $this->forge->addKey('id_transaksi', true);
        $this->forge->addForeignKey('id_akun', 'akun', 'id_akun', 'CASCADE', 'CASCADE');

        // Membuat tabel
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        // Menghapus tabel transaksi
        $this->forge->dropTable('transaksi');
    }
}
