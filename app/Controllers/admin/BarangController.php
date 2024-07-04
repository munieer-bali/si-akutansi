<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BarangModel;

class BarangController extends BaseController
{
    public function barang()
    {

        $data['activePage'] = 'barang';
        $model = new BarangModel();
        $data['barang'] = $model->findAll();
        return view('admin/databarang/barang', $data);
    }
    public function addbarang()
    {
        $data['activePage'] = 'barang';
        return view('admin/databarang/addbarang');
    }
    public function savebarang()
    {
        $model = new BarangModel();
        if ($this->request->getMethod() === 'post') {
            $data = [
                'nama_barang' => $this->request->getPost('nama_barang'),
                'jumlah_barang' => $this->request->getPost('jumlah_barang'),
                'tanggal' => $this->request->getPost('tanggal'),
                'harga_beli' => $this->request->getPost('harga_beli'),
                'harga_jual' => $this->request->getPost('harga_jual'),

            ];
            $model->insert($data);

            return redirect()->to(base_url('admin/databarang/barang'))->with('success', 'data berhasil disimpan');
        }
    }
    public function edit($id)
    {
        $data['activePage'] = 'akun';
        $model = new BarangModel();
        $query = $model->table('tabel_barang');
        $hasil = $query->getWhere(['id_barang' => $id])->getRow();
        $data['edit'] = $hasil;

        return view('admin/databarang/edit', $data);
    }
    public function update()
    {
        $model = new BarangModel();
        $id = $this->request->getVar('id_akun');
        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'jumlah_barang' => $this->request->getPost('jumlah_barang'),
            'tanggal' => $this->request->getPost('tanggal'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
        ];
        $model->where('id_barang', $id)->set($data)->update();
        return redirect()->to('admin/databarang/barang');
    }
    public function delete($id)
    {
        $model = new BarangModel();

        $query = $model->table('tabel_barang');
        $hasil = $query->where('id_barang', $id);
        $hasil->delete();

        return redirect()->to('admin/databarang/barang');
    }
}
