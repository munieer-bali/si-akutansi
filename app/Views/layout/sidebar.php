<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<<<<<<< HEAD
    <title>SI-Akuntansi</title>
=======
    <title>SI-Akutansi</title>
>>>>>>> e312064bfe78feb0a0daea7288b32bb9a2bc801d
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- Summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-auto">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="<?= base_url('/logout') ?>" class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('/dashboard') ?>" class="brand-link">
                <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Si-Akuntansi</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Dashboard -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="<?= base_url('/dashboard') ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> Dashboard</p>
                            </a>
                        </li>
                        <!-- Data Akuntansi -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/KodeAkun/akun') ?>" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>Data Akuntansi</p>
                            </a>
                        </li>
                        <!-- Jurnal Umum -->
                        <li class="nav-header">Activity</li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/jurnal/jurnal') ?>" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>Jurnal Umum</p>
                            </a>
                        </li>
                        <!-- Neraca -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/laporan_keuangan/index') ?>" class="nav-link">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                                <p>Laporan Keuangan</p>
                            </a>
                        </li>
                        <!-- Neraca -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/Neraca/neraca') ?>" class="nav-link">
                                <i class="nav-icon fas fa-balance-scale"></i>
                                <p>Neraca</p>
                            </a>
                        </li>
                        <!-- Laba Rugi -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/labarugi/laba') ?>" class="nav-link">
                                <i class="nav-icon fas fa-money-bill-wave"></i>
                                <p>Laba Rugi</p>
                            </a>
                        </li>
                        <!-- Data Barang Gudang -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/databarang/barang') ?>" class="nav-link">
                                <i class="nav-icon fas fa-box"></i>
                                <p>Data Barang Gudang</p>
                            </a>
                        </li>
                        <li class="nav-header">Transaksi</li>
                        <!-- Data Item Satuan -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/item/item') ?>" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>Data Item Satuan</p>
                            </a>
                        </li>
                        <!-- Transaksi Detail Barang -->
                        <li class="nav-item">
                            <a href="<?= base_url('admin/transaksidetail/index') ?>" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>Transaksi Detail Barang</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <?= $this->renderSection('content') ?>
        <?= $this->include('layout/footer') ?>
    </div>
    <!-- ./wrapper -->
</body>

</html>
