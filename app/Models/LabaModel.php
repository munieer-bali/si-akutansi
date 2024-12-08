<?php

namespace App\Models;

use CodeIgniter\Model;

class LabaModel extends Model
{
    protected $table            = 'labarugi';
    protected $primaryKey       = 'id_laba';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_laba', 'id_akun', 'keterangan', 'pendapatan_usaha', 'beban_operasional', 'laba_kotor', 'pendapatan_lain', 'beban_lain', 'laba_bersih','periode'];

    function getRelasi()
    {
        $builder = $this->db->table('labarugi');
        $builder->join('akun', 'akun.id_akun = labarugi.id_akun');
        $query = $builder->get();
        return $query->getResult();
    }

    // function insertData($data)
    // {
    //     // Hitung laba kotor
    //     $data['laba_kotor'] = $data['pendapatan_usaha'] - $data['beban_operasional'];

    //     // Hitung laba bersih
    //     $data['laba_bersih'] = ($data['pendapatan_usaha'] + $data['pendapatan_lain']) - ($data['beban_operasional'] + $data['beban_lain']);

    //     // Simpan data ke dalam database
    //     return $this->insert($data);
    // }
}
