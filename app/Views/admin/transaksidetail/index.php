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
                        <li class="breadcrumb-item active">transaksi detail</li>
                    </ol>
                </div>

            </div>
        </div><!-- /.container-fluid -->
        <div class="card">
            <div class="card-header">
                <a href="<?= base_url('admin/transaksidetail/add') ?>" class="btn btn-primary">tambah</a>
            </div>
            <!-- ini untuk menangkap session with success-->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alser-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <?= session()->getFlashdata('success'); ?>
                    </div>

                </div>
            <?php endif; ?>
            <!-- ini untuk menangkap session with gagal-->
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alser-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <?= session()->getFlashdata('error'); ?>
                    </div>

                </div>
            <?php endif; ?>

            <div class="card-body">
                <?php if (!empty($data)) : ?>
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Item</th>
                                <th>Deskripsi Item</th>
                                <th>Kode Pelanggan</th>
                                <th>tanggal Transaksi</th>
                                <th>Harga Item</th>
                                <th>quantity</th>
                                <th>Harga Satuan</th>
                                <th>subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            $no = 1;

                            foreach ($data as $row) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->item_name ?></td>
                                    <td><?= $row->item_description ?></td>
                                    <td><?= $row->kode_pelanggan ?></td>
                                    <td><?= $row->transaksi_date ?></td>
                                    <td><?=format_rupiah($row->item_price) ?></td>
                                    <td><?= $row->quantity ?></td>
                                    <td><?= format_rupiah($row->price_per_item) ?></td>
                                    <td><?= format_rupiah($row->subtotal) ?></td>


                                    <td class="text-center" style="width: 15%;">
                                        <a href="<?= base_url('admin/transaksidetail/edit/' . $row->transaksi_detail_id) ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-pencil-alt btn-small"></i>
                                        </a>
                                        <a href="<?= base_url('admin/transaksidetail/delete/' . $row->transaksi_detail_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus id_barang <?= $row->transaksi_detail_id ?>')">
                                            <i class="fas fa-trash btn-small"></i>
                                        </a>


                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <h4>Total keseluruhan : Rp. <?= $total_subtotal ?> rb</h4>
                <?php else : ?>
                    <p>No transaction details found.</p>
                <?php endif; ?>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
</div>
<!-- /.col -->

</section>


</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>