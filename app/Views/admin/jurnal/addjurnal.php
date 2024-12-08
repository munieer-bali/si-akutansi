<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Jurnal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dahboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Kode Akun 1</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <div class="card">
            <div class="card-body">
            <form method="post" action="<?= base_url('admin/jurnal/jurnal') ?>" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="id_akun">Akun</label>
                        <select class="form-control" name="id_akun" required>
                            <?php foreach ($data as $key): ?>
                                <option value="<?= $key->id_akun ?>"><?= $key->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipe_transaksi">Tipe Transaksi</label>
                        <select class="form-control" name="tipe_transaksi" required>
                            <option value="debet">Debet</option>
                            <option value="credit">Kredit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" placeholder="Input jumlah" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" placeholder="Enter tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="bukti_pembayaran">Bukti Pembayaran (Opsional)</label>
                        <input type="file" class="form-control" name="bukti_pembayaran" accept="image/*,application/pdf">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                        <button type="reset" class="btn btn-secondary"><i class="fas fa-trash"></i> Reset</button>
                    </div>
                </form>
                <!-- Pesan kesalahan validasi -->
                <?php if (isset($validation)) : ?>
                    <?= $validation->listErrors() ?>
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