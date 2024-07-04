<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\AkunModel;
use App\Models\LabaModel;


class LabaController extends BaseController
{
    public function laba()
    {
        $data['activePage'] = 'labarugi';
        $model = new labaModel();
        $data['laba'] = $model->getRelasi();

        return view('admin/labarugi/laba', $data);
    }

    public function addlaba()
    {
        $builder = new AkunModel();

        // Mengambil data akun dari tabel akun
        $query = $builder->get();
        $data['laba'] = $query->getResult();
        return view('admin/labarugi/addlaba', $data);
    }

    public function savelaba()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_akun' => 'required|numeric',
            'keterangan' => 'required',
            'pendapatan_usaha' => 'required|numeric',
            'beban_operasional' => 'required|numeric',
            'pendapatan_lain' => 'required|numeric',
            'beban_lain' => 'required|numeric',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to(base_url('admin/labarugi/addlaba'))->withInput()->with('errors', $validation->getErrors());
        }

        // Mengambil data dari formulir
        $id_akun = $this->request->getPost('id_akun');
        $keterangan = $this->request->getPost('keterangan');
        $pendapatan_usaha = $this->request->getPost('pendapatan_usaha');
        $beban_operasional = $this->request->getPost('beban_operasional');
        $pendapatan_lain = $this->request->getPost('pendapatan_lain');
        $beban_lain = $this->request->getPost('beban_lain');

        // Hitung total pendapatan
        $total_pendapatan = $pendapatan_usaha + $pendapatan_lain;

        // Hitung total beban
        $total_beban = $beban_operasional + $beban_lain;

        // Hitung laba kotor
        $laba_kotor = $total_pendapatan - $total_beban;

        // Hitung laba bersih
        $laba_bersih = $pendapatan_usaha + $pendapatan_lain - $beban_operasional + $beban_lain;

        // Menyimpan data ke database
        $labaModel = new LabaModel();
        $labaModel->insert([
            'id_akun' => $id_akun, // Menyimpan ID akun
            'keterangan' => $keterangan,
            'pendapatan_usaha' => $pendapatan_usaha,
            'beban_operasional' => $beban_operasional,
            'pendapatan_lain' => $pendapatan_lain,
            'beban_lain' => $beban_lain,
            'laba_kotor' => $laba_kotor,
            'laba_bersih' => $laba_bersih,


        ]);
        return redirect()->to(base_url('admin/labarugi/laba'))->with('success', 'Data Labarugi berhasil disimpan');
    }
    public function edit($id)
    {

        $data['activePage'] = 'labarugi';
        $model = new LabaModel();
        $data['data'] = $model->getRelasi();
        $query = $model->table('tabel_labarugi');
        $hasil = $query->getWhere(['id_laba' => $id])->getRow();
        $data['edit'] = $hasil;

        return view('admin/labarugi/edit', $data);
    }
    public function update()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_akun' => 'required|numeric',
            'keterangan' => 'required',
            'pendapatan_usaha' => 'required|numeric',
            'beban_operasional' => 'required|numeric',
            'pendapatan_lain' => 'required|numeric',
            'beban_lain' => 'required|numeric',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to(base_url('admin/labarugi/addlaba'))->withInput()->with('errors', $validation->getErrors());
        }

        // Mengambil data dari formulir
        $id_akun = $this->request->getPost('id_akun');
        $keterangan = $this->request->getPost('keterangan');
        $pendapatan_usaha = $this->request->getPost('pendapatan_usaha');
        $beban_operasional = $this->request->getPost('beban_operasional');
        $pendapatan_lain = $this->request->getPost('pendapatan_lain');
        $beban_lain = $this->request->getPost('beban_lain');

        // Hitung total pendapatan
        $total_pendapatan = $pendapatan_usaha + $pendapatan_lain;

        // Hitung total beban
        $total_beban = $beban_operasional + $beban_lain;

        // Hitung laba kotor
        $laba_kotor = $total_pendapatan - $total_beban;

        // Hitung laba bersih
        $laba_bersih = $pendapatan_usaha + $pendapatan_lain - $beban_operasional + $beban_lain;

        // Menyimpan data ke database

        $model = new LabaModel();
        $id = $this->request->getVar('id_laba');
        $data['data'] = $model->getRelasi();
        $data = [
            'id_akun' => $id_akun,
            'keterangan' => $keterangan,
            'pendapatan_usaha' => $pendapatan_usaha,
            'beban_operasional' => $beban_operasional,
            'pendapatan_lain' => $pendapatan_lain,
            'beban_lain' => $beban_lain,
            'laba_kotor' => $laba_kotor,
            'laba_bersih' => $laba_bersih,
        ];
        $model->where('id_laba', $id)->set($data)->update();
        return redirect()->to(base_url('admin/labarugi/laba'))->with('success', 'Data berhasil diupdate');
    }
    public function delete($id)
    {
        $model = new LabaModel();

        $query = $model->table('tabel_labarugi');
        $hasil = $query->where('id_laba', $id);
        $hasil->delete();

        return redirect()->to('admin/labarugi/laba');
    }
}
