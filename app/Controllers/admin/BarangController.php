<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use App\Models\BarangModel;

class BarangController extends BaseController
{
    public function barang()
    {
        $barangModel = new BarangModel();
        $data['barang'] = $barangModel->getBarang(); 
        return view('admin/databarang/barang', $data);
    }
    public function addbarang()
    {
        $builder = new ItemModel();

        // Mengambil data akun dari tabel akun
        $query = $builder->get();
        $data['data'] = $query->getResult();
        return view('admin/databarang/addbarang',$data);
    }
    public function savebarang()
    {
        $model = new BarangModel();
            // Memeriksa apakah request method adalah POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'item_id' => $this->request->getPost('item_id'),
                // 'nama_barang' => $this->request->getPost('nama_barang'), 
                'jumlah_barang' => $this->request->getPost('jumlah_barang'),
                'tanggal' => $this->request->getPost('tanggal'),
                'harga_beli' => $this->request->getPost('harga_beli'),
                'harga_jual' => $this->request->getPost('harga_jual'),
            ];
        $model->insert($data);

        return redirect()->to(base_url('admin/databarang/barang'))->with('success', 'Data berhasil disimpan');
    }

    }
    public function edit($id)
    {
        $builder = new BarangModel();
        $data = $builder->getBarang();
        $query = $builder->table('tabel_barang_gudang');
        $hasil = $query->getWhere(['id_barang' => $id])->getRow();
        $data['edit'] = $hasil;

        return view('admin/databarang/edit', $data);
    }
    public function update()
    {
        $model = new BarangModel();
        $id = $this->request->getVar('id_barang');
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
