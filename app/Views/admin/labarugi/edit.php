<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Laba</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dahboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">tambah Neraca</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="<?= base_url('admin/labarugi/update') ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id_laba" value="<?= $edit->id_laba ?>">
                        <label for="exampleInputEmail1">Akun</label>
                        <select class="form-control" aria-label="Default select example" value="<?= $edit->id_akun ?>" name="id_akun">
                            <?php foreach ($data as $key) : ?>

                                <option value="<?= $key->id_akun ?>"><?= $key->nama ?></option>


                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">keterangan</label>
                        <input type="Text" class="form-control" name="keterangan" value="<?= $edit->keterangan ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Pendapatan Usaha</label>
                        <input type="text" class="form-control" name="pendapatan_usaha" value="<?= $edit->pendapatan_usaha ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">beban operasional</label>
                        <input type="text" class="form-control" name="beban_operasional" value="<?= $edit->beban_operasional ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">pendapatan lain</label>
                        <input type="text" class="form-control" name="pendapatan_lain" value="<?= $edit->pendapatan_lain ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">beban lain</label>
                        <input type="text" class="form-control" name="beban_lain" value="<?= $edit->beban_lain ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>update</button>
                        <button type="reset" class="btn btn-secondary"><i class="fas fa-trash"></i>reset</button>
                    </div>


                </form>

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