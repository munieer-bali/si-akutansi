    <?= $this->extend('layout/sidebar') ?>
    <?= $this->section('content') ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>edit Barang</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('/dahboard') ?>">Home</a></li>
                            <li class="breadcrumb-item active">Edit Barang</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            <div class="card">


                <div class="card-body">
                    <form method="post" action="<?= base_url('admin/databarang/update') ?>">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_akun" value="<?= $edit->id_barang ?>">
                            <label for="exampleInputEmail1">Nama barang</label>
                            <input type="Text" class="form-control" name="nama_barang" value="<?= $edit->nama_barang ?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Barang</label>
                            <input type="text" class="form-control" name="jumlah_barang" value="<?= $edit->jumlah_barang ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal</label>
                            <input type="Date" class="form-control" name="tanggal" value="<?= $edit->tanggal ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Beli</label>
                            <input type="text" class="form-control" name="harga_beli" value="<?= $edit->harga_beli ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Jual</label>
                            <input type="text" class="form-control" name="harga_jual" value="<?= $edit->harga_jual ?>">
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