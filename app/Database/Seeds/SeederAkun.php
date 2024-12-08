<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederAkun extends Seeder
{
    public function run()
    {
        $data = [
            [
                
                'nama'    => 'Active',
            ],
            [
               
                'nama'    => 'kewajiban',
            ],
            [
               
                'nama'    => 'modal',
            ],
            [
                
                'nama'    => 'Pendapatan',
            ],
            [
               
                'nama'    => 'Beban',
            ],


        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('akun')->insertBatch($data);
    }
}
