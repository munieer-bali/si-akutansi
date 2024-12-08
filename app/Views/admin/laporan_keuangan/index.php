<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Keuangan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Keuangan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
             <!-- Filter Periode -->
            <form action="<?= base_url('admin/laporan_keuangan/index') ?>" method="get" class="form-inline mb-4">
                <label for="periode" class="mr-2">Pilih Periode:</label>
                <input type="month" id="periode" name="periode" class="form-control mr-2" value="<?= $selected_periode ?>">
                <button type="submit" class="btn btn-primary">Tampilkan</button>
            </form>
            <!-- Jurnal Umum -->
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Jurnal Umum</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
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
                                        <td><?= ucfirst($item['tipe_transaksi']) ?></td>
                                        <td><?= number_format($item['jumlah'], 0, ',', '.') ?></td>
                                        <td><?= date('d-m-Y', strtotime($item['tanggal'])) ?></td>
                                        <td>
                                            <?php if ($item['bukti_pembayaran']): ?>
                                                <a href="<?= base_url('uploads/bukti/' . $item['bukti_pembayaran']) ?>" target="_blank" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i> Lihat
                                                </a>
                                            <?php else: ?>
                                                <span class="text-muted">Tidak Ada</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Neraca -->
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h3 class="card-title">Neraca</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
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
                </div>
            </div>

            <!-- Laba Rugi -->
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-warning text-white">
                    <h3 class="card-title">Laba Rugi</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
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
                            <?php if (!empty($labarugi)): ?>
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
                            <?php else: ?>
                                <tr>
                                    <td colspan="9" class="text-center">Data laba rugi tidak tersedia</td>
                                </tr>
                            <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


          <!-- Transaksi Detail Barang -->
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title">Transaksi Detail Barang</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID Transaksi Detail</th>
                                    <th>Item ID</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Kode Pelanggan</th>
                                    <th>Kuantitas</th>
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
                                        <td colspan="8" class="text-center">Data transaksi detail barang tidak tersedia</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Tombol Cetak -->
            <div class="d-flex justify-content-end mt-4">
                <a href="<?= base_url('admin/laporan_keuangan/cetak') ?>" class="btn btn-primary shadow-sm" target="_blank">
                    <i class="fas fa-print"></i> Cetak PDF
                </a>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
