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
    </div>
  </section>

  <!-- Card Container -->
  <div class="card">
    <div class="card-header">
      <a href="<?= base_url('admin/Neraca/addneraca') ?>" class="btn btn-primary">
      <i class="fas fa-plus"></i> Tambah Neraca
      </a>
    </div>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <!-- Table Section -->
    <div class="card-body">
      <table id="myTable" class="table table-bordered table-striped">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Akun</th>
            <th>Tanggal</th>
            <th>Total Aset</th>
            <th>Total Kewajiban</th>
            <th>Ekuitas Bersih</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($neraca as $key => $nilai) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $nilai->nama ?></td>
              <td><?= $nilai->tanggal ?></td>
              <td><?= format_rupiah($nilai->total_aset) ?></td>
              <td><?= format_rupiah($nilai->total_kewajiban) ?></td>
              <td><?= format_rupiah($nilai->ekuitas_bersih) ?></td>
              <td class="text-center" style="width: 15%;">
                <a href="<?= base_url('admin/Neraca/edit/' . $nilai->id_neraca) ?>" class="btn btn-warning btn-sm">
                  <i class="fas fa-pencil-alt"></i> Edit
                </a>
                <a href="<?= base_url('admin/Neraca/delete/' . $nilai->id_neraca) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus ID transaksi <?= $nilai->id_neraca ?>?')">
                  <i class="fas fa-trash"></i> Hapus
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
