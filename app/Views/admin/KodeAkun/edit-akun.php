<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>edit Akun</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dahboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Akun 1</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <div class="card">


            <div class="card-body">
                <form method="post" action="<?= base_url('admin/KodeAkun/update-akun') ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id_akun" value="<?= $edit->id_akun ?>">
                        <label for="exampleInputEmail1">Kode Akun</label>
                        <input type="text" class="form-control" name="kode" placeholder="Enter Kode" value="<?= $edit->kode ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Akun</label>
                        <input type="text" class="form-control" name="nama" placeholder="Enter nama" value="<?= $edit->nama ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>upadate</button>
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