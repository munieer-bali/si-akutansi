<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\TransaksiDetailModel;
use App\Models\ItemModel;
use PhpParser\Node\Expr\FuncCall;

class Transaksidetail extends BaseController
{


    public function index()
    {
        // Membuat instance dari model TransactionDetailModel
        $transaksiDetailModel = new TransaksiDetailModel();

        // Mengambil data menggunakan fungsi getAll dari model
        $data = $transaksiDetailModel->getAll();

        return view('admin/transaksidetail/index', $data);
    }

    public function add()

    {
        $builder = new ItemModel();

        // Mengambil data akun dari tabel akun
        $query = $builder->get();
        $data['data'] = $query->getResult();
        return view('admin/transaksidetail/add', $data);
    }

    public function save()
    {
        $detail = new TransaksiDetailModel();
        $itemModel = new ItemModel();

        if ($this->request->getMethod() === 'post') {
            $item_id = $this->request->getPost('item_id');
            $quantity = $this->request->getPost('quantity');
            $data = [
                'item_id' => $item_id,
                'transaksi_date' => $this->request->getPost('transaksi_date'),
                'kode_pelanggan' => $this->request->getPost('kode_pelanggan'),
                'quantity' => $quantity,
                'price_per_item' => $this->request->getPost('price_per_item'),
            ];

            // Simpan transaksi detail
            $detail->insert($data);

            // Kurangi stok barang
            $isStockReduced = $itemModel->reduceStock($item_id, $quantity);

            if (!$isStockReduced) {
                return redirect()->back()->with('error', 'Stok barang tidak mencukupi');
            }

            return redirect()->to(base_url('admin/transaksidetail/index'))->with('success', 'Data berhasil disimpan dan stok barang berkurang');
        }
    }

    public function edit($id)
    {
        $builder = new TransaksiDetailModel();
        $data = $builder->getAll();
        $query = $builder->table('tabel_transaksi_detail_barang');
        $hasil = $query->getWhere(['transaksi_detail_id' => $id])->getRow();
        $data['edit'] = $hasil;

        return view('admin/transaksidetail/edit', $data);
    }

    public function update()
    {
        $model = new TransaksiDetailModel();
        $id = $this->request->getVar('transaksi_detail_id');
        $data = [
            'item_id' => $this->request->getPost('item_id'),
            'transaksi_date' => $this->request->getPost('transaksi_date'),
            'kode_pelanggan' => $this->request->getPost('kode_pelanggan'),
            'quantity' => $this->request->getPost('quantity'),
            'price_per_item' => $this->request->getPost('price_per_item'),

        ];
        $model->where('transaksi_detail_id', $id)->set($data)->update();
        return redirect()->to(base_url('admin/transaksidetail/index'))->with('success', 'Data berhasil diupdate');
    }
    public function delete($id)
    {
        $model = new TransaksiDetailModel();

        $query = $model->table('tabel_transaksi_detail_barang');
        $hasil = $query->where('transaksi_detail_id', $id);
        $hasil->delete();

        return redirect()->to('admin/transaksidetail/index');
    }
}
