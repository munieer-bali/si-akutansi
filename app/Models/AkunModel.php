<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table            = 'akun';
    protected $primaryKey       = 'id_akun';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_akun', 'kode', 'nama'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'kode' => 'required|max_length[10]',
        'nama' => 'required|is_unique[akun.nama]',
    ];
    protected $validationMessages = [
        'kode' => [
            'is_unique' => 'Kode Akun sudah ada. Masukkan kode yang berbeda.',
        ],
        'nama' => [
            'is_unique' => 'Nama Akun sudah ada. Masukkan nama yang berbeda.',
        ],
    ];
    protected $skipValidation = false;


    public function generateKodeUnik()
    {
        // Ambil kode terakhir di database
        $lastKode = $this->select('kode')->orderBy('kode', 'DESC')->first();

        // Jika ada kode terakhir, ambil angka di dalamnya
        $lastNumber = isset($lastKode['kode']) ? intval($lastKode['kode']) : 0;

        // Tambahkan 1 dan format dengan leading zero (maksimal 10 karakter)
        $newKode = str_pad($lastNumber + 1, 10, '0', STR_PAD_LEFT);

        // Kembalikan kode baru
        return substr($newKode, -10); // Pastikan tetap dalam panjang maksimal 10
    }
}
