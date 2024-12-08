<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi Detail Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Transaksi Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Daftar Transaksi</h3>
            <a href="<?= base_url('admin/transaksidetail/add') ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>

        <!-- Menampilkan session success atau error -->
        <div class="card-body">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            
            <!-- Form Filter by Date -->
            <form method="get" action="<?= base_url('admin/transaksidetail/index') ?>" class="row mb-4">
                <div class="col-md-5">
                    <label for="tanggal_awal">Tanggal Awal</label>
                    <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" required>
                </div>
                <div class="col-md-5">
                    <label for="tanggal_akhir">Tanggal Akhir</label>
                    <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter"></i> Filter</button>
                </div>
            </form>

            <!-- Tabel Transaksi Detail -->
            <?php if (!empty($data)) : ?>
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Item</th>
                                <th>Deskripsi Item</th>
                                <th>Kode Pelanggan</th>
                                <th>Tanggal Transaksi</th>
                                <th>Harga Item</th>
                                <th>Quantity</th>
                                <th>Harga Satuan</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->item_name ?></td>
                                    <td><?= $row->item_description ?></td>
                                    <td><?= $row->kode_pelanggan ?></td>
                                    <td><?= $row->transaksi_date ?></td>
                                    <td><?= format_rupiah($row->item_price) ?></td>
                                    <td><?= $row->quantity ?></td>
                                    <td><?= format_rupiah($row->price_per_item) ?></td>
                                    <td><?= format_rupiah($row->subtotal) ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/transaksidetail/edit/' . $row->transaksi_detail_id) ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="<?= base_url('admin/transaksidetail/delete/' . $row->transaksi_detail_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus transaksi <?= $row->transaksi_detail_id ?>?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Total Pendapatan, Laba Kotor, dan Laba Bersih -->
                <div class="mt-4">
                    <h4>Total Pendapatan: <?= isset($total_subtotal) ? format_rupiah($total_subtotal) : format_rupiah(0) ?></h4>
                    <h4>Laba Kotor: <?= isset($labaKotor) ? format_rupiah($labaKotor) : format_rupiah(0) ?></h4>
                    <h4>Laba Bersih: <?= isset($labaBersih) ? format_rupiah($labaBersih) : format_rupiah(0) ?></h4>
                </div>
            <?php else : ?>
                <p class="text-center">Tidak ada detail transaksi ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
