<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\JurnalModel;
use App\Models\AkunModel;

class JurnalController extends BaseController
{
    public function jurnal()
    {
        // Mengatur halaman yang aktif di sidebar
        $data['activePage'] = 'transaksi';
        
        // Membuat instance dari JurnalModel
        $model = new JurnalModel();

        // Mendapatkan data dari form filter tanggal, jika ada
        $tanggal_awal = $this->request->getVar('tanggal_awal');
        $tanggal_akhir = $this->request->getVar('tanggal_akhir');

        // Jika tanggal filter ada, tambahkan filter pada query
        if ($tanggal_awal && $tanggal_akhir) {
            // Memanggil fungsi getJurnalDataByTanggal dengan filter tanggal
            $data['jurnal'] = $model->getJurnalDataByTanggal($tanggal_awal, $tanggal_akhir);
        } else {
            // Jika tidak ada filter, ambil semua data jurnal
            $data['jurnal'] = $model->getJurnalData();
        }

        // Mendapatkan saldo akun dan total saldo
        $saldoData = $model->getSaldoAkun();
        
        // Menambahkan saldo akun dan total saldo ke data yang dikirimkan ke view
        $data['saldo_akun'] = $saldoData['saldo_akun']; 
        $data['total_saldo'] = $saldoData['total_saldo']; 

        // Menampilkan view dengan data transaksi dan saldo
        return view('admin/jurnal/jurnal', $data);
    }


    public function addJurnal()
    {
        $builder = new AkunModel();

        // Mengambil data akun dari tabel akun
        $query = $builder->get();
        $data['data'] = $query->getResult();
        
        // Menampilkan form untuk menambah jurnal
        return view('admin/jurnal/addjurnal', $data);
    }

    public function saveJurnal()
    {
        // Mendapatkan data dari formulir
        $akunId = $this->request->getPost('id_akun');
        $tipeTransaksi = $this->request->getPost('tipe_transaksi');
        $jumlah = $this->request->getPost('jumlah');
        $tanggal = $this->request->getPost('tanggal');

        // Validasi tipe transaksi dan jumlah
        $validation = \Config\Services::validation();
        $validation->setRules([
            'tipe_transaksi' => 'required|in_list[debet,credit]',
            'jumlah' => 'required|numeric',
        ]);

        if (!$validation->run(['tipe_transaksi' => $tipeTransaksi, 'jumlah' => $jumlah])) {
            return redirect()->to(base_url('admin/jurnal/addjurnal'))->withInput()->with('validation', $validation);
        }

        // Proses penyimpanan data ke dalam database
        $transaksiModel = new JurnalModel();
        $transaksiModel->insert([
            'id_akun' => $akunId,
            'tipe_transaksi' => $tipeTransaksi,
            'jumlah' => $jumlah,
            'tanggal' => $tanggal,
        ]);

        // Redirect ke halaman jurnal dengan pesan sukses
        return redirect()->to(base_url('admin/jurnal/jurnal'))->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $data['activePage'] = 'transaksi';
        $builder = new JurnalModel();
        
        // Mengambil data jurnal untuk diedit
        $data['data'] = $builder->getjurnalData();
        $query = $builder->table('transaksi');
        $hasil = $query->getWhere(['id_transaksi' => $id])->getRow();
        $data['edit'] = $hasil;

        // Menampilkan form edit jurnal
        return view('admin/jurnal/edit', $data);
    }

    public function update()
    {
        // Mendapatkan data dari formulir
        $akunId = $this->request->getPost('id_akun');
        $tipeTransaksi = $this->request->getPost('tipe_transaksi');
        $jumlah = $this->request->getPost('jumlah');
        $tanggal = $this->request->getPost('tanggal');

        // Validasi tipe transaksi dan jumlah
        $validation = \Config\Services::validation();
        $validation->setRules([
            'tipe_transaksi' => 'required|in_list[debet,credit]',
            'jumlah' => 'required|numeric',
        ]);

        if (!$validation->run(['tipe_transaksi' => $tipeTransaksi, 'jumlah' => $jumlah])) {
            return redirect()->to(base_url('admin/jurnal/jurnal'))->withInput()->with('validation', $validation);
        }

        // Memperbarui data jurnal di database
        $model = new JurnalModel();
        $id = $this->request->getVar('id_transaksi');
        $data = [
            'id_akun' => $akunId,
            'tipe_transaksi' => $tipeTransaksi,
            'jumlah' => $jumlah,
            'tanggal' => $tanggal,
        ];
        $model->where('id_transaksi', $id)->set($data)->update();
        
        // Redirect ke halaman jurnal dengan pesan sukses
        return redirect()->to(base_url('admin/jurnal/jurnal'))->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $model = new JurnalModel();

        // Menghapus transaksi berdasarkan id
        $query = $model->table('transaksi');
        $hasil = $query->where('id_transaksi', $id);
        $hasil->delete();

        // Redirect ke halaman jurnal
        return redirect()->to('admin/jurnal/jurnal');
    }
}
