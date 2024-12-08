<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederBarangGudang extends Seeder
{
    public function run()
    {
        $currentDate = date('Y-m-d');
        $data = [
            [
                'nama_barang' => 'Beras medium',
                'harga_beli'  => 13500,
                'harga_jual'  => 15000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 100,
            ],
            [
                'nama_barang' => 'Beras premium',
                'harga_beli'  => 15500,
                'harga_jual'  => 18000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 150,
            ],
            [
                'nama_barang' => 'Beras 5kg',
                'harga_beli'  => 68000,
                'harga_jual'  => 74000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 50,
            ],
            [
                'nama_barang' => 'Telur ayam',
                'harga_beli'  => 20000,
                'harga_jual'  => 23500,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 200,
            ],
            [
                'nama_barang' => 'Minyak goreng Minyakita',
                'harga_beli'  => 12000,
                'harga_jual'  => 14000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 300,
            ],
            [
                'nama_barang' => 'Minyak goreng Hemart',
                'harga_beli'  => 15500,
                'harga_jual'  => 18000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 250,
            ],
            [
                'nama_barang' => 'Minyak goreng curah',
                'harga_beli'  => 10500,
                'harga_jual'  => 12000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 500,
            ],
            [
                'nama_barang' => 'Gula pasir',
                'harga_beli'  => 14500,
                'harga_jual'  => 17000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 400,
            ],
            [
                'nama_barang' => 'Tepung Terigu segitiga biru',
                'harga_beli'  => 11500,
                'harga_jual'  => 13500,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 350,
            ],
            [
                'nama_barang' => 'Tepung terigu',
                'harga_beli'  => 10500,
                'harga_jual'  => 12000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 380,
            ],
            [
                'nama_barang' => 'Gula jawa',
                'harga_beli'  => 13000,
                'harga_jual'  => 15000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 420,
            ],
            [
                'nama_barang' => 'Gula jawa asli',
                'harga_beli'  => 20500,
                'harga_jual'  => 25000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 270,
            ],
            [
                'nama_barang' => 'Gula batu',
                'harga_beli'  => 16500,
                'harga_jual'  => 19000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 290,
            ],
            [
                'nama_barang' => 'Garam batang',
                'harga_beli'  => 8000,
                'harga_jual'  => 10000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 600,
            ],
            [
                'nama_barang' => 'Garam krasak',
                'harga_beli'  => 4000,
                'harga_jual'  => 5000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 700,
            ],
            [
                'nama_barang' => 'Garam halus daun',
                'harga_beli'  => 2700,
                'harga_jual'  => 3500,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 800,
            ],
            [
                'nama_barang' => 'Tepung tapioka rose brand',
                'harga_beli'  => 7750,
                'harga_jual'  => 8500,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 320,
            ],
            [
                'nama_barang' => 'Tepung beras',
                'harga_beli'  => 5500,
                'harga_jual'  => 6500,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 430,
            ],
            [
                'nama_barang' => 'Kecap sedap sachet',
                'harga_beli'  => 1600,
                'harga_jual'  => 2000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 900,
            ],
            [
                'nama_barang' => 'Kecap Bango sachet',
                'harga_beli'  => 800,
                'harga_jual'  => 1000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 950,
            ],
            [
                'nama_barang' => 'Kecap manis abc botol',
                'harga_beli'  => 5700,
                'harga_jual'  => 6500,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 310,
            ],
            [
                'nama_barang' => 'Saus indofood sachet',
                'harga_beli'  => 850,
                'harga_jual'  => 1000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 920,
            ],
            [
                'nama_barang' => 'Saos sambal sasa botol',
                'harga_beli'  => 6600,
                'harga_jual'  => 7000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 300,
            ],
            [
                'nama_barang' => 'Saos extra pedas sasa botol',
                'harga_beli'  => 6600,
                'harga_jual'  => 7000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 320,
            ],
            [
                'nama_barang' => 'Sambal terasi uleg sachet',
                'harga_beli'  => 1100,
                'harga_jual'  => 1500,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 850,
            ],
            [
                'nama_barang' => 'Aqua galon',
                'harga_beli'  => 15500,
                'harga_jual'  => 18000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 200,
            ],
            [
                'nama_barang' => 'Le minerale galon',
                'harga_beli'  => 16000,
                'harga_jual'  => 19000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 220,
            ],
            [
                'nama_barang' => 'Vit galon',
                'harga_beli'  => 14000,
                'harga_jual'  => 17000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 210,
            ],
            [
                'nama_barang' => 'Air isi ulang galon',
                'harga_beli'  => 3500,
                'harga_jual'  => 5000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 900,
            ],
            [
                'nama_barang' => 'Gas LPG 3 kg',
                'harga_beli'  => 17000,
                'harga_jual'  => 21000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 100,
            ],
            [
                'nama_barang' => 'Gas LPG 5,5 kg',
                'harga_beli'  => 89000,
                'harga_jual'  => 90000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 50,
            ],
            [
                'nama_barang' => 'Gas LPG 12 kg',
                'harga_beli'  => 190000,
                'harga_jual'  => 210000,
                'tanggal'     => $currentDate,
                'jumlah_barang' => 30,
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('barang_gudang')->insertBatch($data);
    }
}
