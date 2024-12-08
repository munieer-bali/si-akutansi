<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Barang</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Card for Table -->
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('admin/databarang/addbarang') ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>

        <!-- Flash Message Success -->
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Flash Message Error -->
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <!-- Card Body with Table -->
        <div class="card-body">
            <table id="myTable" class="table table-bordered table-striped ">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Tanggal Masuk</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($barang as $nilai) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $nilai->customer_id; ?></td> 
                            <td><?= $nilai->item_name; ?></td> 
                            <td><?= $nilai->jumlah_barang; ?></td>
                            <td><?= $nilai->tanggal; ?></td>
                            <td><?= format_rupiah($nilai->harga_beli) ?></td>
                            <td><?= format_rupiah($nilai->harga_jual) ?></td>
                            <td class="text-center" style="width: 15%;">
                                <a href="<?= base_url('admin/databarang/edit/' . $nilai->id_barang) ?>" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <a href="<?= base_url('admin/databarang/delete/' . $nilai->id_barang) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus id_barang <?= $nilai->id_barang ?>')">
                                    <i class="fas fa-trash"></i> Del
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- /.content-wrapper -->
<?= $this->endSection() ?>
