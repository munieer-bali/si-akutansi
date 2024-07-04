<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>edit Transaksi Detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/dahboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Transaksi Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <div class="card">
            <div class="card-body">
                <form method="post" action="<?= base_url('admin/transaksidetail/update') ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="transaksi_detail_id" value="<?= $edit->transaksi_detail_id ?>">
                        <label for="exampleInputEmail1">Akun</label>
                        <select class="form-control" aria-label="Default select example" name="item_id" value="<?= $edit->item_id ?>">
                            <?php foreach ($data as $key) : ?>

                                <option value="<?= $key->item_id ?>"><?= $key->item_name ?> - <?= $key->item_description ?> - <?= $key->customer_id ?></option>

                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Transaksi Date</label>
                        <input type="date" class="form-control" name="transaksi_date" placeholder="input" value="<?= $edit->transaksi_date ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Pelanggan</label>
                        <input type="text" class="form-control" name="kode_pelanggan" placeholder="input" value="<?= $edit->kode_pelanggan ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kualitas</label>
                        <input type="number" min="1" class="form-control" name="quantity" placeholder="input" value="<?= $edit->quantity ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Per-item</label>
                        <input type="text" class="form-control" name="price_per_item" placeholder="input" value="<?= $edit->price_per_item ?>">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>save</button>
                        <button type="reset" class="btn btn-secondary"><i class="fas fa-trash"></i>reset</button>
                    </div>
                </form>
            </div>

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