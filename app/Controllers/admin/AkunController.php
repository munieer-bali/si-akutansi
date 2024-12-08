<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\AkunModel;

class AkunController extends BaseController
{

    public function viewAkun()
    {
        $data['activePage'] = 'akun';
        $model = new AkunModel();
        $data['kodeAkun'] = $model->findAll();
        return view('admin/KodeAkun/akun', $data);
    }
    public function tambahAkun()
    {
        $data['activePage'] = 'akun';
        return view('admin/KodeAkun/tambah-akun');
    }

    public function saveAkun()
    {
        $model = new \App\Models\AkunModel();

        if ($this->request->getMethod() === 'post') {
            // Jika 'kode' tidak ada atau kosong, generate otomatis
            $kode = $this->request->getPost('kode') ?: $model->generateKodeUnik();
    
            // Pastikan kode tetap dalam constraint database (10 karakter maksimal)
            $data = [
                'kode' => substr($kode, 0, 10),
                'nama' => $this->request->getPost('nama'),
            ];
    
            if (!$model->save($data)) {
                // Jika validasi gagal, tampilkan pesan error
                return redirect()->back()->withInput()->with('errors', $model->errors());
            }
    
            return redirect()->to(base_url('admin/KodeAkun/akun'))->with('success', 'Data berhasil disimpan.');
        }    
    }

    public function editAkun($id)
    {
        $data['activePage'] = 'akun';
        $model = new AkunModel();
        $query = $model->table('tabel_akun');
        $hasil = $query->getWhere(['id_akun' => $id])->getRow();
        $data['edit'] = $hasil;

        return view('admin/KodeAkun/edit-akun', $data);
    }

    public function updateAkun()
    {
        $model = new AkunModel();
        $id = $this->request->getVar('id_akun');

        $data = [
            // 'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
        ];

        $model->setValidationRule('nama', "required|is_unique[akun.nama,id_akun,{$id}]");

        if (!$model->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to(base_url('admin/KodeAkun/akun'))->with('success', 'Data berhasil diupdate.');
    }
    public function deleteAkun($id)
    {
        $model = new AkunModel();

        $query = $model->table('tabel_akun');
        $hasil = $query->where('id_akun', $id);
        $hasil->delete();

        return redirect()->to('admin/KodeAkun/akun');
    }

    public function searchByKode()
    {
        $kode = $this->request->getGet('kode');
        $model = new AkunModel();

        $akun = $model->where('kode', $kode)->first();

        if (!$akun) {
            return redirect()->back()->with('error', 'Kode Akun tidak ditemukan.');
        }

        return view('admin/KodeAkun/detail-akun', ['akun' => $akun]);
    }
}
