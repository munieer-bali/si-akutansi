<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\AkunModel;
use App\Models\NeracaModel;

class NeracaController extends BaseController
{

    public function viewNeraca()
    {
        $data['activePage'] = 'neraca';
        $model = new NeracaModel();
        $data['neraca'] = $model->ambilRelasi();
        return view('admin/Neraca/neraca', $data);
    }

    public function addneraca()
    {
        $builder = new AkunModel();

        // Mengambil data akun dari tabel akun
        $query = $builder->get();
        $data['neraca'] = $query->getResult();
        return view('admin/Neraca/addneraca', $data);
    }
    public function saveNeraca()
    {
        // Memvalidasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_akun' => 'required|numeric', // Validasi untuk ID akun
            'tanggal' => 'required',
            'total_aset' => 'required|numeric',
            'total_kewajiban' => 'required|numeric',

        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to(base_url('admin/Neraca/addneraca'))->withInput()->with('errors', $validation->getErrors());
        }

        // Mengambil data dari formulir
        $id_akun = $this->request->getPost('id_akun');
        $tanggal = $this->request->getPost('tanggal');
        $total_aset = $this->request->getPost('total_aset');
        $total_kewajiban = $this->request->getPost('total_kewajiban');


        // Menghitung ekuitas bersih
        $ekuitas_bersih = $total_aset - $total_kewajiban;

        // Menyimpan data ke database
        $neracaModel = new NeracaModel();
        $neracaModel->insert([
            'id_akun' => $id_akun, // Menyimpan ID akun
            'tanggal' => $tanggal,
            'total_aset' => $total_aset,
            'total_kewajiban' => $total_kewajiban,
            'ekuitas_bersih' => $ekuitas_bersih,

        ]);

        return redirect()->to(base_url('admin/Neraca/neraca'))->with('success', 'Data Neraca berhasil disimpan');
    }
    public function edit($id)
    {

        $data['activePage'] = 'neraca';
        $model = new NeracaModel();
        $data['data'] = $model->ambilRelasi();
        $query = $model->table('tabel_neraca');
        $hasil = $query->getWhere(['id_neraca' => $id])->getRow();
        $data['edit'] = $hasil;

        return view('admin/Neraca/edit', $data);
    }
    public function update()
    {


        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_akun' => 'required|numeric', // Validasi untuk ID akun
            'tanggal' => 'required',
            'total_aset' => 'required|numeric',
            'total_kewajiban' => 'required|numeric',

        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to(base_url('admin/Neraca/addneraca'))->withInput()->with('errors', $validation->getErrors());
        }

        // Mengambil data dari formulir
        $id_akun = $this->request->getPost('id_akun');
        $tanggal = $this->request->getPost('tanggal');
        $total_aset = $this->request->getPost('total_aset');
        $total_kewajiban = $this->request->getPost('total_kewajiban');

        // Menghitung ekuitas bersih
        $ekuitas_bersih = $total_aset - $total_kewajiban;

        $model = new NeracaModel();
        $id = $this->request->getVar('id_neraca');
        $data['data'] = $model->ambilRelasi();
        $data = [
            'id_akun' => $id_akun,
            'tanggal' => $tanggal,
            'total_aset' => $total_aset,
            'total_kewajiban' => $total_kewajiban,
            'ekuitas_bersih' => $ekuitas_bersih,
        ];
        $model->where('id_neraca', $id)->set($data)->update();
        return redirect()->to(base_url('admin/Neraca/neraca'))->with('success', 'Data berhasil diupdate');
    }
    public function delete($id)
    {
        $model = new NeracaModel();

        $query = $model->table('tabel_neraca');
        $hasil = $query->where('id_neraca', $id);
        $hasil->delete();

        return redirect()->to('admin/Neraca/neraca');
    }
}
