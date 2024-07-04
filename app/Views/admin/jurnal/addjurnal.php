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
                <form method="post" action="<?= base_url('admin/jurnal/jurnal') ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Akun</label>
                        <select class="form-control" aria-label="Default select example" name="id_akun">
                            <?php foreach ($data as $key) : ?>

                                <option value="<?= $key->id_akun ?>"><?= $key->nama ?></option>


                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">tipe transaksi</label>
                        <select class="form-control" aria-label="Default select example" name="tipe_transaksi">
                            <option value="debet">debit</option>
                            <option value="credit">kredit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">jumlah</label>
                        <input type="text" class="form-control" name="jumlah" placeholder="input">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">tanggal</label>
                        <input type="Date" class="form-control" name="tanggal" placeholder="Enter nama">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>save</button>
                        <button type="reset" class="btn btn-secondary"><i class="fas fa-trash"></i>reset</button>
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