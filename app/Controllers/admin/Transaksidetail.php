<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\TransaksiDetailModel;
use App\Models\ItemModel;

class Transaksidetail extends BaseController
{
    public function index()
    {
        $transaksiDetailModel = new TransaksiDetailModel();

        // Ambil tanggal awal dan tanggal akhir dari query string
        $tanggal_awal = $this->request->getVar('tanggal_awal');
        $tanggal_akhir = $this->request->getVar('tanggal_akhir');

        // Cek apakah ada filter tanggal
        if ($tanggal_awal && $tanggal_akhir) {
            // Jika ada, gunakan filter berdasarkan tanggal
            $dataTransaksi['data'] = $transaksiDetailModel->getJurnalDataByTanggal($tanggal_awal, $tanggal_akhir);
        } else {
            // Jika tidak ada filter, ambil semua data
            $dataTransaksi = $transaksiDetailModel->getAll();
        }

        // Inisialisasi variabel untuk total pendapatan, laba kotor, dan laba bersih
        $totalPendapatan = 0;
        $totalLabaKotor = 0;
        $totalLabaBersih = 0;

      // Lakukan iterasi untuk menghitung total pendapatan, laba kotor, dan laba bersih
        foreach ($dataTransaksi['data'] as $transaksi) {
            $totalPendapatan += $transaksi->subtotal;  // Mengakses data sebagai array
            $totalLabaKotor += $transaksi->subtotal - ($transaksi->quantity * $transaksi->item_price);
        }

        // Asumsikan biaya operasional sebagai persentase dari laba kotor, misalnya 20%
        $biayaOperasional = 0.2 * $totalLabaKotor;
        $totalLabaBersih = $totalLabaKotor - $biayaOperasional; // Laba Bersih

        // Data yang akan dikirim ke view
        $data = [
            'data' => $dataTransaksi['data'],
            'total_subtotal' => $totalPendapatan,
            'labaKotor' => $totalLabaKotor,
            'labaBersih' => $totalLabaBersih
        ];
        // var_dump($dataTransaksi);

        return view('admin/transaksidetail/index', $data);
    }

    public function add()
    {
        $itemModel = new ItemModel();

        // Mengambil data item dari tabel item
        $query = $itemModel->findAll();
        $data['data'] = $query;

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
            if ($detail->insert($data)) {
                // Kurangi stok barang
                $isStockReduced = $itemModel->reduceStock($item_id, $quantity);

                if (!$isStockReduced) {
                    return redirect()->back()->with('error', 'Stok barang tidak mencukupi');
                }

                return redirect()->to(base_url('admin/transaksidetail/index'))->with('success', 'Data berhasil disimpan dan stok barang berkurang');
            } else {
                return redirect()->back()->with('error', 'Gagal menyimpan data transaksi.');
            }
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

        // Update data transaksi detail
        if ($model->update($id, $data)) {
            return redirect()->to(base_url('admin/transaksidetail/index'))->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate data transaksi.');
        }
    }

    public function delete($id)
    {
        $model = new TransaksiDetailModel();

        // Hapus data transaksi berdasarkan id
        if ($model->delete($id)) {
            return redirect()->to('admin/transaksidetail/index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data transaksi.');
        }
    }
}
