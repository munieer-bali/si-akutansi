<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use Dompdf\Dompdf;
use App\Models\AkunModel;
use App\Models\JurnalModel;
use App\Models\LabaModel;
use App\Models\NeracaModel;
use App\Models\TransaksiDetailModel;

class LaporanKeuanganController extends BaseController
{
    protected $akunModel;
    protected $jurnalModel;
    protected $labaModel;
    protected $neracaModel;
    protected $transaksiDetailModel;

    public function __construct()
    {
        $this->akunModel = new AkunModel();
        $this->jurnalModel = new JurnalModel();
        $this->labaModel = new LabaModel();
        $this->neracaModel = new NeracaModel();
        $this->transaksiDetailModel = new TransaksiDetailModel();
    }

    public function index()
    {
        $periode = $this->request->getGet('periode') ?? date('Y-m'); // Default ke bulan ini jika tidak ada filter

        // Ambil data berdasarkan periode
        $data = [
            'jurnal' => $this->jurnalModel->where('DATE_FORMAT(tanggal, "%Y-%m")', $periode)->findAll(),
            'neraca' => $this->neracaModel->where('periode', $periode)->findAll(),
            'labarugi' => $this->labaModel->findAll(),
            'transaksi_detail' => $this->transaksiDetailModel->findAll(),
            'selected_periode' => $periode
        ];

        return view('admin/laporan_keuangan/index', $data);
    }

    public function cetak()
    {
        $periode = $this->request->getGet('periode') ?? date('Y-m');

        $data = [
            'jurnal' => $this->jurnalModel->where('DATE_FORMAT(tanggal, "%Y-%m")', $periode)->findAll(),
            'neraca' => $this->neracaModel->where('periode', $periode)->findAll(),
            'labarugi' => $this->labaModel->findAll(),
            'transaksi_detail' => $this->transaksiDetailModel->findAll(),
            'selected_periode' => $periode
        ];

        // Render ke dalam PDF menggunakan Dompdf
        $dompdf = new Dompdf();
        $html = view('admin/laporan_keuangan/cetak', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Stream PDF ke browser
        $dompdf->stream("laporan_keuangan_$periode.pdf", ['Attachment' => false]);
    }
}
