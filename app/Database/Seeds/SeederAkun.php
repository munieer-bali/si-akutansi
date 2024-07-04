<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkun extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode' => '1',
                'nama'    => 'Active',
            ],
            [
                'kode' => '2',
                'nama'    => 'kewajiban',
            ],
            [
                'kode' => '3',
                'nama'    => 'modal',
            ],
            [
                'kode' => '4',
                'nama'    => 'Pendapatan',
            ],
            [
                'kode' => '5',
                'nama'    => 'Beban',
            ],


        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('akun')->insertBatch($data);
    }
}
