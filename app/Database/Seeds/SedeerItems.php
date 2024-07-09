<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SedeerItems extends Seeder
{
    public function run()
    {
        $data = [
            [
                'item_name' => 'Beras medium',
                'item_description' => 'Beras kualitas medium dengan harga terjangkau.',
                'item_price' => 13500,
                'item_stock' => 100
            ],
            [
                'item_name' => 'Beras premium',
                'item_description' => 'Beras kualitas premium dengan kualitas terbaik.',
                'item_price' => 15500,
                'item_stock' => 80
            ],
            [
                'item_name' => 'Beras 5kg',
                'item_description' => 'Beras dalam kemasan 5 kg.',
                'item_price' => 68000,
                'item_stock' => 50
            ],
            [
                'item_name' => 'Telur ayam',
                'item_description' => 'Telur ayam segar.',
                'item_price' => 20000,
                'item_stock' => 200
            ],
            [
                'item_name' => 'Minyak goreng Minyakita',
                'item_description' => 'Minyak goreng merk Minyakita.',
                'item_price' => 12000,
                'item_stock' => 150
            ],
            [
                'item_name' => 'Minyak goreng Hemart',
                'item_description' => 'Minyak goreng merk Hemart.',
                'item_price' => 15500,
                'item_stock' => 120
            ],
            [
                'item_name' => 'Minyak goreng curah',
                'item_description' => 'Minyak goreng curah berkualitas.',
                'item_price' => 10500,
                'item_stock' => 180
            ],
            [
                'item_name' => 'Gula pasir',
                'item_description' => 'Gula pasir berkualitas tinggi.',
                'item_price' => 14500,
                'item_stock' => 160
            ],
            [
                'item_name' => 'Tepung Terigu segitiga biru',
                'item_description' => 'Tepung terigu merk Segitiga Biru.',
                'item_price' => 11500,
                'item_stock' => 140
            ],
            [
                'item_name' => 'Tepung terigu',
                'item_description' => 'Tepung terigu kualitas baik.',
                'item_price' => 10500,
                'item_stock' => 130
            ],
            [
                'item_name' => 'Gula jawa',
                'item_description' => 'Gula jawa dengan rasa khas.',
                'item_price' => 13000,
                'item_stock' => 90
            ],
            [
                'item_name' => 'Gula jawa asli',
                'item_description' => 'Gula jawa asli dengan kualitas tinggi.',
                'item_price' => 20500,
                'item_stock' => 70
            ],
            [
                'item_name' => 'Gula batu',
                'item_description' => 'Gula batu dengan rasa manis yang pas.',
                'item_price' => 16500,
                'item_stock' => 110
            ],
            [
                'item_name' => 'Garam batang',
                'item_description' => 'Garam batang berkualitas.',
                'item_price' => 8000,
                'item_stock' => 100
            ],
            [
                'item_name' => 'Garam krasak',
                'item_description' => 'Garam krasak untuk keperluan masak sehari-hari.',
                'item_price' => 4000,
                'item_stock' => 150
            ],
            [
                'item_name' => 'Garam halus daun',
                'item_description' => 'Garam halus merk Daun.',
                'item_price' => 2700,
                'item_stock' => 130
            ],
            [
                'item_name' => 'Tepung tapioka rose brand',
                'item_description' => 'Tepung tapioka merk Rose Brand.',
                'item_price' => 7750,
                'item_stock' => 120
            ],
            [
                'item_name' => 'Tepung beras',
                'item_description' => 'Tepung beras untuk berbagai keperluan masak.',
                'item_price' => 5500,
                'item_stock' => 140
            ],
            [
                'item_name' => 'Kecap sedap sachet',
                'item_description' => 'Kecap sedap dalam kemasan sachet.',
                'item_price' => 1600,
                'item_stock' => 200
            ],
            [
                'item_name' => 'Kecap Bango sachet',
                'item_description' => 'Kecap Bango dalam kemasan sachet.',
                'item_price' => 800,
                'item_stock' => 300
            ],
            [
                'item_name' => 'Kecap manis abc botol',
                'item_description' => 'Kecap manis ABC dalam kemasan botol.',
                'item_price' => 5700,
                'item_stock' => 100
            ],
            [
                'item_name' => 'Saus indofood sachet',
                'item_description' => 'Saus Indofood dalam kemasan sachet.',
                'item_price' => 850,
                'item_stock' => 200
            ],
            [
                'item_name' => 'Saos sambal sasa botol',
                'item_description' => 'Saos sambal Sasa dalam kemasan botol.',
                'item_price' => 6600,
                'item_stock' => 100
            ],
            [
                'item_name' => 'Saos extra pedas sasa botol',
                'item_description' => 'Saos extra pedas Sasa dalam kemasan botol.',
                'item_price' => 6600,
                'item_stock' => 100
            ],
            [
                'item_name' => 'Sambal terasi uleg sachet',
                'item_description' => 'Sambal terasi uleg dalam kemasan sachet.',
                'item_price' => 1100,
                'item_stock' => 200
            ],
            [
                'item_name' => 'Aqua galon',
                'item_description' => 'Air mineral Aqua dalam kemasan galon.',
                'item_price' => 15500,
                'item_stock' => 80
            ],
            [
                'item_name' => 'Le minerele galon',
                'item_description' => 'Air mineral Le Minerale dalam kemasan galon.',
                'item_price' => 16000,
                'item_stock' => 80
            ],
            [
                'item_name' => 'Vit galon',
                'item_description' => 'Air mineral Vit dalam kemasan galon.',
                'item_price' => 14000,
                'item_stock' => 80
            ],
            [
                'item_name' => 'Air isi ulang galon',
                'item_description' => 'Air isi ulang dalam kemasan galon.',
                'item_price' => 3500,
                'item_stock' => 150
            ],
            [
                'item_name' => 'Gas LPG 3 kg',
                'item_description' => 'Gas LPG dengan berat 3 kg.',
                'item_price' => 17000,
                'item_stock' => 50
            ],
            [
                'item_name' => 'Gas LPG 5,5 kg',
                'item_description' => 'Gas LPG dengan berat 5,5 kg.',
                'item_price' => 89000,
                'item_stock' => 30
            ],
            [
                'item_name' => 'Gas LPG 12 kg',
                'item_description' => 'Gas LPG dengan berat 12 kg.',
                'item_price' => 190000,
                'item_stock' => 20
            ],
        ];

        // Using Query Builder
        $this->db->table('item')->insertBatch($data);
    }
}
