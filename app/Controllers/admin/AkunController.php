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
        $model = new AkunModel();
        if ($this->request->getMethod() === 'post') {
            $data = [
                'kode' => $this->request->getPost('kode'),
                'nama' => $this->request->getPost('nama'),

            ];
            $model->insert($data);

            return redirect()->to(base_url('admin/KodeAkun/akun'))->with('success', 'data berhasil disimpan');
        }
        // return redirect()->to(base_url('admin/KodeAkun/akun1'))->with('success', 'data berhasil disimpan');
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
            'kode' => $this->request->getPost('kode'),
            'nama' => $this->request->getPost('nama'),
        ];
        $model->where('id_akun', $id)->set($data)->update();
        return redirect()->to('admin/KodeAkun/akun');
    }
    public function deleteAkun($id)
    {
        $model = new AkunModel();

        $query = $model->table('tabel_akun');
        $hasil = $query->where('id_akun', $id);
        $hasil->delete();

        return redirect()->to('admin/KodeAkun/akun');
    }
}
