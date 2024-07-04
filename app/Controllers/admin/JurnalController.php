<?php

namespace App\Controllers\admin;


use App\Controllers\BaseController;
use App\Models\JurnalModel;
use App\Models\AkunModel;
use CodeIgniter\HTTP\ResponseInterface;

class JurnalController extends BaseController
{

    public function jurnal()
    {

        $data['activePage'] = 'transaksi';
        $model = new JurnalModel();
        $data['jurnal'] = $model->getJurnalData();

        return view('admin/jurnal/jurnal', $data);
    }

    public function addJurnal()
    {;
        $builder = new AkunModel();

        // Mengambil data akun dari tabel akun
        $query = $builder->get();
        $data['data'] = $query->getResult();
        return view('admin/jurnal/addjurnal', $data);
    }

    public function saveJurnal()
    {
        // Mendapatkan data dari formulir
        $akunId = $this->request->getPost('id_akun');
        $tipeTransaksi = $this->request->getPost('tipe_transaksi');
        $jumlah = $this->request->getPost('jumlah');
        $tanggal = $this->request->getPost('tanggal');
        // Mendapatkan data lainnya ...
        // Validasi tipe transaksi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'tipe_transaksi' => 'required|in_list[debet,credit]', // Menggunakan in_list untuk memastikan hanya 'debit' atau 'kredit'
            'jumlah' => 'required|numeric', // Menambahkan validasi untuk jumlah
        ]);

        if (!$validation->run(['tipe_transaksi' => $tipeTransaksi, 'jumlah' => $jumlah])) {
            return redirect()->to(base_url('admin/jurnal/addjurnal'))->withInput()->with('validation', $validation);
        }
        // Proses penyimpanan data ke dalam database
        $transaksiModel = new JurnalModel();
        $transaksiModel->insert([
            'id_akun' => $akunId,
            'tipe_transaksi' => $this->request->getPost('tipe_transaksi'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tanggal'),
        ]);


        return redirect()->to(base_url('admin/jurnal/jurnal'))->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {

        $data['activePage'] = 'transaksi';
        $builder = new JurnalModel();
        $data['data'] = $builder->getjurnalData();
        $query = $builder->table('tabel_transaksi');
        $hasil = $query->getWhere(['id_transaksi' => $id])->getRow();
        $data['edit'] = $hasil;

        return view('admin/jurnal/edit', $data);
    }

    public function update()
    {
        // Mendapatkan data dari formulir
        $akunId = $this->request->getPost('id_akun');
        $tipeTransaksi = $this->request->getPost('tipe_transaksi');
        $jumlah = $this->request->getPost('jumlah');
        $tanggal = $this->request->getPost('tanggal');
        // Mendapatkan data lainnya ...
        // Validasi tipe transaksi
        $validation = \Config\Services::validation();
        $validation->setRules([
            'tipe_transaksi' => 'required|in_list[debet,credit]', // Menggunakan in_list untuk memastikan hanya 'debit' atau 'kredit'
            'jumlah' => 'required|numeric', // Menambahkan validasi untuk jumlah
        ]);

        if (!$validation->run(['tipe_transaksi' => $tipeTransaksi, 'jumlah' => $jumlah])) {
            return redirect()->to(base_url('admin/jurnal/jurnal'))->withInput()->with('validation', $validation);
        }
        $model = new JurnalModel();
        $id = $this->request->getVar('id_transaksi');
        $data = [
            'id_akun' => $akunId,
            'tipe_transaksi' => $this->request->getPost('tipe_transaksi'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tanggal'),
        ];
        $model->where('id_transaksi', $id)->set($data)->update();
        return redirect()->to(base_url('admin/jurnal/jurnal'))->with('success', 'Data berhasil diupdate');
    }
    public function delete($id)
    {
        $model = new JurnalModel();

        $query = $model->table('tabel_transaksi');
        $hasil = $query->where('id_transaksi', $id);
        $hasil->delete();

        return redirect()->to('admin/jurnal/jurnal');
    }
}
