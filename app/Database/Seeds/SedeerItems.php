<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederItems extends Seeder
{
    public function run()
    {
        $data = [
            [
                'item_name' => 'Beras medium',
                'item_description' => 'Beras kualitas medium dengan harga terjangkau.',
                'item_price' => 13500,
                'item_stock' => 100,
                'customer_id' => 1001
            ],
            [
                'item_name' => 'Beras premium',
                'item_description' => 'Beras kualitas premium dengan kualitas terbaik.',
                'item_price' => 15500,
                'item_stock' => 80,
                'customer_id' => 1002
            ],
            [
                'item_name' => 'Beras 5kg',
                'item_description' => 'Beras dalam kemasan 5 kg.',
                'item_price' => 68000,
                'item_stock' => 50,
                'customer_id' => 1003
            ],
            [
                'item_name' => 'Telur ayam',
                'item_description' => 'Telur ayam segar.',
                'item_price' => 20000,
                'item_stock' => 200,
                'customer_id' => 1004
            ],
            [
                'item_name' => 'Minyak goreng Minyakita',
                'item_description' => 'Minyak goreng merk Minyakita.',
                'item_price' => 12000,
                'item_stock' => 150,
                'customer_id' => 1005
            ],
            [
                'item_name' => 'Minyak goreng Hemart',
                'item_description' => 'Minyak goreng merk Hemart.',
                'item_price' => 15500,
                'item_stock' => 120,
                'customer_id' => 1006
            ],
            [
                'item_name' => 'Minyak goreng curah',
                'item_description' => 'Minyak goreng curah berkualitas.',
                'item_price' => 10500,
                'item_stock' => 180,
                'customer_id' => 1007
            ],
            [
                'item_name' => 'Gula pasir',
                'item_description' => 'Gula pasir berkualitas tinggi.',
                'item_price' => 14500,
                'item_stock' => 160,
                'customer_id' => 1008
            ],
            [
                'item_name' => 'Tepung Terigu segitiga biru',
                'item_description' => 'Tepung terigu merk Segitiga Biru.',
                'item_price' => 11500,
                'item_stock' => 140,
                'customer_id' => 1009
            ],
            [
                'item_name' => 'Tepung terigu',
                'item_description' => 'Tepung terigu kualitas baik.',
                'item_price' => 10500,
                'item_stock' => 130,
                'customer_id' => 1010
            ],
            [
                'item_name' => 'Gula jawa',
                'item_description' => 'Gula jawa dengan rasa khas.',
                'item_price' => 13000,
                'item_stock' => 90,
                'customer_id' => 1011
            ],
            [
                'item_name' => 'Gula jawa asli',
                'item_description' => 'Gula jawa asli dengan kualitas tinggi.',
                'item_price' => 20500,
                'item_stock' => 70,
                'customer_id' => 1012
            ],
            [
                'item_name' => 'Gula batu',
                'item_description' => 'Gula batu dengan rasa manis yang pas.',
                'item_price' => 16500,
                'item_stock' => 110,
                'customer_id' => 1013
            ],
            [
                'item_name' => 'Garam batang',
                'item_description' => 'Garam batang berkualitas.',
                'item_price' => 8000,
                'item_stock' => 100,
                'customer_id' => 1014
            ],
            [
                'item_name' => 'Garam krasak',
                'item_description' => 'Garam krasak untuk keperluan masak sehari-hari.',
                'item_price' => 4000,
                'item_stock' => 150,
                'customer_id' => 1015
            ],
            [
                'item_name' => 'Garam halus daun',
                'item_description' => 'Garam halus merk Daun.',
                'item_price' => 2700,
                'item_stock' => 130,
                'customer_id' => 1016
            ],
            [
                'item_name' => 'Tepung tapioka rose brand',
                'item_description' => 'Tepung tapioka merk Rose Brand.',
                'item_price' => 7750,
                'item_stock' => 120,
                'customer_id' => 1017
            ],
            [
                'item_name' => 'Tepung beras',
                'item_description' => 'Tepung beras untuk berbagai keperluan masak.',
                'item_price' => 5500,
                'item_stock' => 140,
                'customer_id' => 1018
            ],
            [
                'item_name' => 'Kecap sedap sachet',
                'item_description' => 'Kecap sedap dalam kemasan sachet.',
                'item_price' => 1600,
                'item_stock' => 200,
                'customer_id' => 1019
            ],
            [
                'item_name' => 'Kecap Bango sachet',
                'item_description' => 'Kecap Bango dalam kemasan sachet.',
                'item_price' => 800,
                'item_stock' => 300,
                'customer_id' => 1020
            ],
            [
                'item_name' => 'Kecap manis',
                'item_description' => 'Kecap manis dengan rasa manis yang pas.',
                'item_price' => 1800,
                'item_stock' => 220,
                'customer_id' => 1021
            ],
            [
                'item_name' => 'Minyak goreng premium',
                'item_description' => 'Minyak goreng premium untuk keperluan masak.',
                'item_price' => 14000,
                'item_stock' => 140,
                'customer_id' => 1022
            ],
            [
                'item_name' => 'Tepung maizena',
                'item_description' => 'Tepung maizena untuk bahan pengental.',
                'item_price' => 9500,
                'item_stock' => 110,
                'customer_id' => 1023
            ],
            [
                'item_name' => 'Susu kental manis',
                'item_description' => 'Susu kental manis untuk berbagai olahan.',
                'item_price' => 12000,
                'item_stock' => 180,
                'customer_id' => 1024
            ],
            [
                'item_name' => 'Gula pasir putih',
                'item_description' => 'Gula pasir putih dengan kemasan praktis.',
                'item_price' => 14000,
                'item_stock' => 160,
                'customer_id' => 1025
            ],
            [
                'item_name' => 'Tepung ketan',
                'item_description' => 'Tepung ketan untuk membuat kue ketan.',
                'item_price' => 11500,
                'item_stock' => 130,
                'customer_id' => 1026
            ],
            [
                'item_name' => 'Kecap asin',
                'item_description' => 'Kecap asin dengan rasa yang khas.',
                'item_price' => 900,
                'item_stock' => 200,
                'customer_id' => 1027
            ],
            [
                'item_name' => 'Tepung terigu protein tinggi',
                'item_description' => 'Tepung terigu dengan protein tinggi untuk roti.',
                'item_price' => 12500,
                'item_stock' => 140,
                'customer_id' => 1028
            ],
            [
                'item_name' => 'Saus sambal',
                'item_description' => 'Saus sambal pedas untuk makanan.',
                'item_price' => 3500,
                'item_stock' => 220,
                'customer_id' => 1029
            ],
            [
                'item_name' => 'Saus tomat',
                'item_description' => 'Saus tomat untuk berbagai hidangan.',
                'item_price' => 4000,
                'item_stock' => 250,
                'customer_id' => 1030
            ],
        ];

        foreach ($data as $item) {
            $this->db->table('item')->insert($item);
        }
    }
}
