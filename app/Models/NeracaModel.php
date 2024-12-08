<?php

namespace App\Models;

use CodeIgniter\Model;

class NeracaModel extends Model
{
    protected $table            = 'neraca';
    protected $primaryKey       = 'id_neraca';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_neraca', 'id_akun', 'tanggal', 'total_aset', 'total_kewajiban', 'ekuitas_bersih','periode'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    function ambilRelasi()
    {
        $builder = $this->db->table('neraca');
        $builder->join('akun', 'akun.id_akun = neraca.id_akun');
        $query = $builder->get();
        return $query->getResult();
    }
}
