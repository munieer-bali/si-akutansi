<?= $this->extend('layout/sidebar') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Neraca</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active">Neraca</li>
          </ol>
        </div>

      </div>
    </div><!-- /.container-fluid -->
    <div class="card">
      <div class="card-header">
        <a href="<?= base_url('admin/Neraca/addneraca') ?>" class="btn btn-primary">Tambah Neraca</a>
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

        <table id="myTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Akun</th>
              <th>Tanggal</th>
              <th>Total Aset</th>
              <th>Total Kewajiban</th>
              <th>Ekuitas Bersih</th>
              <th>aksi</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $no = 1;

            foreach ($neraca as $key => $nilai) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $nilai->nama ?></td>
                <td><?= $nilai->tanggal ?></td>
                <td>Rp.<?= $nilai->total_aset ?></td>
                <td>Rp.<?= $nilai->total_kewajiban ?></td>
                <td>Rp.<?= $nilai->ekuitas_bersih ?></td>

                <td class="text-center" style="width: 15%;">
                  <a href="<?= base_url('admin/Neraca/edit/' . $nilai->id_neraca) ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-pencil-alt btn-small"></i> Edit
                  </a>
                  <a href="<?= base_url('admin/Neraca/delete/' . $nilai->id_neraca) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus id_transaksi <?= $nilai->id_neraca ?>')">
                    <i class="fas fa-trash btn-small"></i> Del
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>

          <!-- <tfoot>
                    <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                    </tr>
                    </tfoot> -->

        </table>

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