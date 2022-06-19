<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title;?></title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url();?>/assets/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url();?>/assets/dist/css/adminlte.min.css?v=3.2.0">

    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo base_url();?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url();?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url();?>/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <style>
    .dataTables_wrapper {
        width: 100%;
    }
    </style>
    <link rel="shortcut icon" href="<?= base_url();?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= base_url();?>/favicon.ico" type="image/x-icon">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?= base_url();?>" class="navbar-brand">
                    <img src="<?= base_url();?>/assets/img/logo_ichi.png" alt="Logo ICHI"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Anggota ICHI</span>
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url()?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url()?>/home/daftardpr" class="nav-link">Daftar DPR</a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a href="<?= base_url()?>/home/contact" class="nav-link">Contact</a>
                        </li>-->
                    </ul>

                    <!--<form class="form-inline ml-0 ml-md-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>-->
                </div>

                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <?php
                    if ($logged_in){
                    ?>
                    <li class="nav-item">
                        <?php
                        if ($role=='superadmin'){
                        ?>
                        <a class="nav-link" href="<?= base_url();?>/superadmin" role="button">
                            <i class="fas fa-house-user"></i> &nbsp; Data Saya
                        </a>
                        <?php
                        }
                        ?>
                        <?php
                        if ($role=='admin'){
                        ?>
                        <a class="nav-link" href="<?= base_url();?>/admin" role="button">
                            <i class="fas fa-house-user"></i> &nbsp; Data Saya
                        </a>
                        <?php
                        }
                        ?>
                        <?php
                        if (($role=='anggota')||($role=='calon')){
                        ?>
                        <a class="nav-link" href="<?= base_url();?>/anggota" role="button">
                            <i class="fas fa-house-user"></i> &nbsp; Data Saya
                        </a>
                        <?php
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url();?>/home/logout" role="button">
                            <i class="fas fa-sign-out-alt"></i> &nbsp; Keluar
                        </a>
                    </li>
                    <?php
                    }else{
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url();?>/home/daftar" role="button">
                            <i class="fas fa-user-plus"></i> &nbsp; Daftar Anggota
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url();?>/home/login" role="button">
                            <i class="fas fa-sign-in-alt"></i> &nbsp; Login Anggota
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <!-- Main Content-->
        <?= $this->renderSection('content');?>

        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                <a href="https://www.facebook.com/ichiorid" target="_blank"><i class="fab fa-facebook"></i><strong>
                        @ichiorid</strong></a> &nbsp;&nbsp;&nbsp; <a href="https://twitter.com/ichiorid"
                    target="_blank"><i class="fab fa-twitter"></i><strong> @ichiorid</strong></a> &nbsp;&nbsp;&nbsp; <a
                    href="https://www.youtube.com/c/ICHIIndonesia" target="_blank"><i
                        class="fab fa-youtube"></i><strong> @ICHIIndonesia</strong></a> &nbsp;&nbsp;&nbsp; <a
                    href="https://www.linkedin.com/in/ikatan-cendekiawan-hindu-indonesia-59086b175/" target="_blank"><i
                        class="fab fa-linkedin"></i><strong> ICHI</strong></a> &nbsp;&nbsp;&nbsp; <a
                    href="https://www.instagram.com/ikatancendekiwanhinduindonesia/" target="_blank"><i
                        class="fab fa-instagram"></i><strong> ICHI</strong></a>
            </div>

            <strong>Copyright &copy; <?php echo date('Y');?> <a href="https://ichi.or.id" target="_blank">Ikatan
                    Cendekiawan Hindu
                    Indonesia</a>.</strong> All rights
            reserved.
        </footer>
    </div>



    <script src="<?= base_url();?>/assets/plugins/jquery/jquery.min.js"></script>

    <script src="<?= base_url();?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url();?>/assets/dist/js/adminlte.min.js?v=3.2.0"></script>

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
        $('table.table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "bAutoWidth": false,
            "buttons": ["csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#tabledata_wrapper .col-md-6:eq(0)');
    });
    </script>
</body>

</html>