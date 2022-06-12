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
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                        <!--
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item">Some action </a></li>
                                <li><a href="#" class="dropdown-item">Some other action</a></li>
                                <li class="dropdown-divider"></li>

                                <li class="dropdown-submenu dropdown-hover">
                                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"
                                        class="dropdown-item dropdown-toggle">Hover for action</a>
                                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                        <li>
                                            <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                                        </li>

                                        <li class="dropdown-submenu">
                                            <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"
                                                class="dropdown-item dropdown-toggle">level 2</a>
                                            <ul aria-labelledby="dropdownSubMenu3"
                                                class="dropdown-menu border-0 shadow">
                                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                            </ul>
                                        </li>

                                        <li><a href="#" class="dropdown-item">level 2</a></li>
                                        <li><a href="#" class="dropdown-item">level 2</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>-->
                    </ul>

                    <form class="form-inline ml-0 ml-md-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
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

                    <!--<li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-comments"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">

                                <div class="media">
                                    <img src="<?= base_url();?>/assets/dist/img/user1-128x128.jpg" alt="User Avatar"
                                        class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-right text-sm text-danger"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">Call me whenever you can...</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>

                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">

                                <div class="media">
                                    <img src="<?= base_url();?>/assets/dist/img/user8-128x128.jpg" alt="User Avatar"
                                        class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            John Pierce
                                            <span class="float-right text-sm text-muted"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">I got your message bro</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>

                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">

                                <div class="media">
                                    <img src="<?= base_url();?>/assets/dist/img/user3-128x128.jpg" alt="User Avatar"
                                        class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Nora Silvester
                                            <span class="float-right text-sm text-warning"><i
                                                    class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">The subject goes here</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>

                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>-->
                </ul>
            </div>
        </nav>

        <!-- Main Content-->
        <?= $this->renderSection('content');?>

        <!--
        <aside class="control-sidebar control-sidebar-dark">
            <p>Ini isi menu kanan</p>
        </aside>
        -->

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

    <!--<script src="<?= base_url();?>/assets/dist/js/demo.js"></script>-->
</body>

</html>