<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Item Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Item Satuan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Card -->
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('admin/item/additem') ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Item
            </a>
        </div>

        <!-- Flashdata Success Message -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Flashdata Error Message -->
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Table -->
        <div class="card-body">
            <table id="myTable" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Deskripsi Barang</th>
                        <th>Tanggal</th>
                        <th>Kode Barang</th>
                        <th>Harga Barang</th>
                        <th>Stock Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($item as $key => $nilai) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $nilai['item_name'] ?></td>
                            <td><?= $nilai['item_description'] ?></td>
                            <td><?= $nilai['transaksi_date'] ?></td>
                            <td><?= $nilai['customer_id'] ?></td>
                            <td><?= format_rupiah($nilai['item_price']) ?></td>
                            <td><?= $nilai['item_stock'] ?></td>
                            <td class="text-center" style="width: 15%;">
                                <a href="<?= base_url('admin/item/edit/' . $nilai['item_id']) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <a href="<?= base_url('admin/item/delete/' . $nilai['item_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus item <?= $nilai['item_id'] ?>?')">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
