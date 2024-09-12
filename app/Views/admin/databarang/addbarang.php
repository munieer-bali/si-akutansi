<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dahboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">tambah Barang</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="<?= base_url('admin/databarang/barang') ?>">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="exampleInputEmail1">kode Barang</label>
                        <select class="form-control" aria-label="Default select example" name="item_id">
                            <?php foreach ($data as $key) : ?>

                                <option value="<?= $key->item_id ?>"><?= $key->item_name ?> - <?= $key->customer_id ?></option>

                            <?php endforeach ?>
                        </select> 
                    </div>  
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Barang</label>
                        <select class="form-control" aria-label="Default select example" name="nama_barang">
                            <?php foreach ($data as $key) : ?>

                                <option value="<?= $key->item_id ?>"><?= $key->item_name ?></option>

                            <?php endforeach ?>
                        </select> 
                    </div>  
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Barang</label>
                        <input type="number" min="1" class="form-control" name="jumlah_barang" placeholder="input">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Masuk</label>
                        <input type="Date" class="form-control" name="tanggal" placeholder="input">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Beli</label>
                        <input type="text" class="form-control" name="harga_beli" placeholder="input">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Jual</label>
                        <input type="text" class="form-control" name="harga_jual" placeholder="input">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>save</button>
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