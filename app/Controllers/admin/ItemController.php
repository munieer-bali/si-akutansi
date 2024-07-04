<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use CodeIgniter\HTTP\ResponseInterface;

class ItemController extends BaseController
{
    public function item()
    {
        $data['activePage'] = 'item';
        $model = new ItemModel;
        $data['item'] = $model->findAll();
        return view('admin/item/item', $data);
    }
    public function additem()
    {
        $data['activePage'] = 'item';
        return view('admin/item/additem');
    }

    public function saveitem()
    {
        $model = new ItemModel();
        if ($this->request->getMethod() === 'post') {
            $data = [
                'item_name' => $this->request->getPost('item_name'),
                'item_description' => $this->request->getPost('item_description'),
                'transaksi_date' => $this->request->getPost('transaksi_date'),
                'customer_id' => $this->request->getPost('customer_id'),
                'item_price' => $this->request->getPost('item_price'),
                'item_stock' => $this->request->getPost('item_stock'),


            ];
            $model->insert($data);

            return redirect()->to(base_url('admin/item/item'))->with('success', 'data berhasil disimpan');
        }
    }
    public function edit($id)
    {
        $data['activePage'] = 'item';
        $model = new ItemModel();
        $query = $model->table('tabel_item');
        $hasil = $query->getWhere(['item_id' => $id])->getRow();
        $data['edit'] = $hasil;

        return view('admin/item/edit', $data);
    }
    public function update()
    {
        $model = new ItemModel();
        $id = $this->request->getVar('item_id');
        $data = [
            'item_name' => $this->request->getPost('item_name'),
            'item_description' => $this->request->getPost('item_description'),
            'transaksi_date' => $this->request->getPost('transaksi_date'),
            'customer_id' => $this->request->getPost('customer_id'),
            'item_price' => $this->request->getPost('item_price'),
            'item_stock' => $this->request->getPost('item_stock'),
        ];
        $model->where('item_id', $id)->set($data)->update();
        return redirect()->to('admin/item/item');
    }
    public function delete($id)
    {
        $model = new ItemModel();

        $query = $model->table('tabel_item');
        $hasil = $query->where('item_id', $id);
        $hasil->delete();

        return redirect()->to('admin/item/item');
    }
}
