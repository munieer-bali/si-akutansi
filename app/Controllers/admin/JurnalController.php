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
        // Validasi input termasuk bukti pembayaran
        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_akun'          => 'required',
            'tipe_transaksi'   => 'required|in_list[debet,credit]',
            'jumlah'           => 'required|numeric',
            'tanggal'          => 'required|valid_date',
            'bukti_pembayaran' => 'if_exist|mime_in[bukti_pembayaran,image/png,image/jpg,image/jpeg,application/pdf]|max_size[bukti_pembayaran,2048]',
        ]);

        // Jika validasi gagal
        // if (!$validation->run()) {
        //     log_message('error', 'Validasi gagal: ' . json_encode($validation->getErrors()));
        //     return redirect()->back()->withInput()->with('validation', $validation);
        // }

        // Proses unggah bukti pembayaran
        $bukti = $this->request->getFile('bukti_pembayaran');
        $buktiName = null;

        if ($bukti && $bukti->isValid()) {
            $buktiName = $bukti->getRandomName(); // Membuat nama file acak
            $bukti->move('uploads/bukti', $buktiName); // Memindahkan file ke folder 'uploads/bukti'
        }

        // Simpan data ke database
        $data = [
            'id_akun'          => $this->request->getPost('id_akun'),
            'tipe_transaksi'   => $this->request->getPost('tipe_transaksi'),
            'jumlah'           => $this->request->getPost('jumlah'),
            'tanggal'          => $this->request->getPost('tanggal'),
            'bukti_pembayaran' => $buktiName, // Menyimpan nama file
            'periode'          => date('Y-m', strtotime($this->request->getPost('tanggal')))
        ];

        log_message('info', 'Data sebelum disimpan: ' . json_encode($data));

        $transaksiModel = new JurnalModel();
        if ($transaksiModel->insert($data)) {
            log_message('info', 'Data berhasil disimpan.');
            return redirect()->to(base_url('admin/jurnal/jurnal'))->with('success', 'Data berhasil disimpan');
        } else {
            log_message('error', 'Data gagal disimpan.');
            return redirect()->to(base_url('admin/jurnal/jurnal'))->with('error', 'Data gagal disimpan');
        }
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
    
        // Proses unggah bukti pembayaran jika ada
        $bukti = $this->request->getFile('bukti_pembayaran');
        $buktiName = null;
    
        if ($bukti && $bukti->isValid()) {
            $buktiName = $bukti->getRandomName(); // Membuat nama file acak
            $bukti->move('uploads/bukti', $buktiName); // Memindahkan file ke folder 'uploads/bukti'
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
    
        // Jika bukti pembayaran baru diunggah, tambahkan ke data yang akan diperbarui
        if ($buktiName) {
            $data['bukti_pembayaran'] = $buktiName;
        }
    
        // Perbarui data jurnal di database
        $model->where('id_transaksi', $id)->set($data)->update();
        
        // Redirect ke halaman jurnal dengan pesan sukses
        return redirect()->to(base_url('admin/jurnal/jurnal'))->with('success', 'Data berhasil diupdate');
    }
    
    public function delete($id)
    {
        $model = new JurnalModel();

        // Menghapus transaksi berdasarkan id
        $transaksi = $model->find($id);

        // Hapus file bukti pembayaran jika ada
        if ($transaksi && isset($transaksi['bukti_pembayaran'])) {
            $filePath = 'uploads/bukti/' . $transaksi['bukti_pembayaran'];
            if (file_exists($filePath)) {
                unlink($filePath); // Menghapus file
            }
        }

        // Menghapus transaksi dari database
        $model->delete($id);

        // Redirect ke halaman jurnal
        return redirect()->to('admin/jurnal/jurnal');
    }

    public function detail($id)
    {
        $model = new JurnalModel();
        $data['activePage'] = 'transaksi';

        // Ambil data transaksi berdasarkan ID
        $data['transaksi'] = $model->getDetailTransaksi($id);

        if (!$data['transaksi']) {
            // Jika transaksi tidak ditemukan, redirect ke jurnal dengan pesan error
            return redirect()->to('admin/jurnal/jurnal')->with('error', 'Transaksi tidak ditemukan');
        }

        // Tampilkan view detail transaksi
        return view('admin/jurnal/detail', $data);
    }
}
