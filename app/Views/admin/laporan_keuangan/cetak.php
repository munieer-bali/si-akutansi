<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h1, h2, h3 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
        }
        .kop-surat h1 {
            margin: 0;
            font-size: 18px;
        }
        .kop-surat p {
            margin: 0;
            font-size: 14px;
        }
        .signature {
            margin-top: 50px;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .signature div {
            text-align: center;
            width: 40%;
        }
        .page-break {
            page-break-after: always;
        }
        .footer {
            text-align: center;
            font-size: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Kop Surat -->
    <div class="kop-surat">
        <h1>PT Nama Perusahaan</h1>
        <p>Jl. Contoh Alamat No.123, Kota, Provinsi</p>
        <p>Email: contoh@email.com | Telp: (021) 12345678</p>
        <hr>
    </div>

    <!-- Judul Laporan -->
    <h1>Laporan Keuangan</h1>

    <!-- Jurnal Umum -->
    <div>
        <h2>Jurnal Umum</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>ID Akun</th>
                    <th>Tipe Transaksi</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Bukti Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jurnal as $item): ?>
                    <tr>
                        <td><?= $item['id_transaksi'] ?></td>
                        <td><?= $item['id_akun'] ?></td>
                        <td><?= $item['tipe_transaksi'] ?></td>
                        <td><?= number_format($item['jumlah'], 0, ',', '.') ?></td>
                        <td><?= date('d-m-Y', strtotime($item['tanggal'])) ?></td>
                        <td><?= $item['bukti_pembayaran'] ?: '-' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="page-break"></div>

    <!-- Neraca -->
    <div>
        <h2>Neraca</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Neraca</th>
                    <th>ID Akun</th>
                    <th>Tanggal</th>
                    <th>Total Aset</th>
                    <th>Total Kewajiban</th>
                    <th>Ekuitas Bersih</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($neraca as $item): ?>
                    <tr>
                        <td><?= $item['id_neraca'] ?></td>
                        <td><?= $item['id_akun'] ?></td>
                        <td><?= date('d-m-Y', strtotime($item['tanggal'])) ?></td>
                        <td><?= number_format($item['total_aset'], 0, ',', '.') ?></td>
                        <td><?= number_format($item['total_kewajiban'], 0, ',', '.') ?></td>
                        <td><?= number_format($item['ekuitas_bersih'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="page-break"></div>

    <!-- Laba Rugi -->
    <div>
        <h2>Laba Rugi</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Laba</th>
                    <th>ID Akun</th>
                    <th>Keterangan</th>
                    <th>Pendapatan Usaha</th>
                    <th>Beban Operasional</th>
                    <th>Laba Kotor</th>
                    <th>Pendapatan Lain</th>
                    <th>Beban Lain</th>
                    <th>Laba Bersih</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($labarugi as $item): ?>
                    <tr>
                        <td><?= $item['id_laba'] ?></td>
                        <td><?= $item['id_akun'] ?></td>
                        <td><?= $item['keterangan'] ?></td>
                        <td><?= number_format($item['pendapatan_usaha'], 0, ',', '.') ?></td>
                        <td><?= number_format($item['beban_operasional'], 0, ',', '.') ?></td>
                        <td><?= number_format($item['laba_kotor'], 0, ',', '.') ?></td>
                        <td><?= number_format($item['pendapatan_lain'], 0, ',', '.') ?></td>
                        <td><?= number_format($item['beban_lain'], 0, ',', '.') ?></td>
                        <td><?= number_format($item['laba_bersih'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="page-break"></div>

    <div>
    <h2>Transaksi Detail Barang</h2>
    <table>
        <thead>
            <tr>
                <th>ID Transaksi Detail</th>
                <th>ID Item</th>
                <th>Tanggal Transaksi</th>
                <th>Kode Pelanggan</th>
                <th>Jumlah</th>
                <th>Harga per Item</th>
                <th>Subtotal</th>
                <th>Total Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($transaksi_detail)): ?>
                <?php foreach ($transaksi_detail as $item): ?>
                    <tr>
                        <td><?= $item['transaksi_detail_id'] ?></td>
                        <td><?= $item['item_id'] ?></td>
                        <td><?= date('d-m-Y', strtotime($item['transaksi_date'])) ?></td>
                        <td><?= $item['kode_pelanggan'] ?></td>
                        <td><?= number_format($item['quantity'], 0, ',', '.') ?></td>
                        <td><?= number_format($item['price_per_item'], 0, ',', '.') ?></td>
                        <td><?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                        <td><?= number_format($item['total_subtotal'], 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Data transaksi detail tidak tersedia</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    </div>

    <div class="page-break"></div>

    <!-- Tanda Tangan -->
    <div class="signature">
        <div>
            <p>Petugas</p>
            <br><br>
            <p>______________________</p>
        </div>
        <div>
            <p>Direktur</p>
            <br><br>
            <p>______________________</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; <?= date('Y') ?> PT Nama Perusahaan. Semua Hak Dilindungi.</p>
    </div>

</body>
</html>
