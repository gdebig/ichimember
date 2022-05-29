<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/dist/css/adminlte.min.css">
    <!-- Date Range Picker CSS -->

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/daterangepicker/daterangepicker.css">

    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo base_url();?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url();?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url();?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url();?>/anggota" class="nav-link">Beranda</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url();?>/anggota/petunjuk" class="nav-link">Petunjuk Penggunaan</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <img src="<?= base_url();?>/assets/img/logo_ichi.png" alt="Logo ICHI"
                class="brand-image img-circle elevation-3" style="opacity: .8" width="30%" height="30%">
            <a href="<?php echo base_url();?>/anggota" class="brand-link">
                <span class="brand-text font-weight-light">Dashboard Anggota <br />ICHI</span>
            </a>
            <?php
                if ($logged_in){
            ?>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="<?php echo base_url();?>/anggota/profile" class="nav-link">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url();?>/anggota/pendidikan" class="nav-link">
                                        <i class="fas fa-graduation-cap nav-icon"></i>
                                        <p>Pendidikan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url();?>/anggota/pengkerja" class="nav-link">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Pengalaman Kerja</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url();?>/anggota/organisasi" class="nav-link">
                                        <i class="fas  fa-trophy nav-icon"></i>
                                        <p>Organisasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url();?>/anggota/pelatihan" class="nav-link">
                                        <i class="fas fa-building nav-icon"></i>
                                        <p>Pendidikan/Pelatihan Teknik/Manajemen</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url();?>/anggota/sertifikat" class="nav-link">
                                        <i class="fas fa-building nav-icon"></i>
                                        <p>Sertifikat Kompetensi dan Bidang Lainnya (yang Relevan) yang Diikuti</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url();?>/anggota/kartul" class="nav-link">
                                        <i class="fas fa-microphone nav-icon"></i>
                                        <p>Karya Tulis di Bidang Keinsinyuran yang Dipublikasikan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url();?>/anggota/seminar" class="nav-link">
                                        <i class="fas fa-microphone nav-icon"></i>
                                        <p>Makalah/Tulisan Yang Disajikan Dalam Seminar/Lokakarya Keinsinyuran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url();?>/anggota/konfirmasi" class="nav-link">
                                        <i class="fas fa-check-double nav-icon"></i>
                                        <p>Konfirmasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url();?>/home/logout" class="nav-link">
                                        <i class="fas fa-sign-out-alt nav-icon"></i>
                                        <p>Keluar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
            <?php
                }
            ?>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $page_title?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url();?>/anggota">Beranda</a></li>
                                <li class="breadcrumb-item active"><?= $data_bread?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <?= $this->renderSection('content');?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; <?= date('Y');?> <a href="https://ichi.or.id" target="_blank">Ikatan Cendekiawan
                    Hindu Indonesia</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="<?php echo base_url();?>/assets/dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="<?php echo base_url();?>/assets/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!--<script src="dist/js/demo.js"></script>-->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="dist/js/pages/dashboard3.js"></script>-->
    <!--Date picker-->

    <script src="<?php echo base_url();?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script>
    $(function() {
        $('.data-datepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            changeMonth: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10),
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    });
    </script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url();?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="<?php echo base_url();?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
    </script>
    <script src="<?php echo base_url();?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
    $(function() {
        $('#tabledata').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "buttons": ["csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#tabledata_wrapper .col-md-6:eq(0)');
    });
    </script>
</body>

</html>