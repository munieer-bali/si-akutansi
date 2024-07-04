<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Neraca</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dahboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Neraca</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <div class="card">


            <div class="card-body">
                <form method="post" action="<?= base_url('admin/Neraca/update') ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id_neraca" value="<?= $edit->id_neraca ?>">
                        <label for="exampleInputEmail1">neraca</label>
                        <select class="form-control" aria-label="Default select example" value="<?= $edit->id_akun ?>" name="id_akun">
                            <?php foreach ($data as $key) : ?>

                                <option value="<?= $key->id_akun ?>"><?= $key->nama ?></option>


                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">tanggal</label>
                        <input type="Date" class="form-control" name="tanggal" value="<?= $edit->tanggal ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Aset</label>
                        <input type="text" class="form-control" name="total_aset" value="<?= $edit->total_aset ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Kewajiban</label>
                        <input type="text" class="form-control" name="total_kewajiban" value="<?= $edit->total_kewajiban ?>">
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Ekuitas Bersih</label>
                        <input type="text" class="form-control" name="ekuitas" placeholder="input">
                    </div> -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>Update</button>
                        <button type="reset" class="btn btn-secondary"><i class="fas fa-trash"></i>reset</button>
                    </div>


                </form>
                <!-- Pesan kesalahan validasi -->
                <?php if (isset($validation)) : ?>
                    <?= $validation->listErrors() ?>
                <?php endif; ?>

            </div>
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