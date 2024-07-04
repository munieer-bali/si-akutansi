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
                <form method="post" action="<?= base_url('admin/item/update') ?>">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="item_id" value="<?= $edit->item_id ?>">
                        <label for="exampleInputEmail1">Nama Item</label>
                        <input type="Text" class="form-control" name="item_name" value="<?= $edit->item_name ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Item Deskripsi</label>
                        <input type="text" class="form-control" name="item_description" value="<?= $edit->item_description ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Item</label>
                        <input type="text" class="form-control" name="item_price" value="<?= $edit->item_price ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stock Barang</label>
                        <input type="text" class="form-control" name="item_stock" value="<?= $edit->item_stock ?>">
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