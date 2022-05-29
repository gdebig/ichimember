<?= $this->extend('main/template');?>

<?= $this->section('content');?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Login Anggota ICHI</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active">Login</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php if(isset($validation)):?>
                <div class="alert alert-danger"><?= $validation->listErrors()?></div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <div class="content">
        <section class="content">
            <div class="container-fluid">
                <div class="row mx-auto">
                    <div class="col-6 mx-auto">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Form Login</h3>
                                <!--<div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>-->
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url();?>/home/auth" method="post">
                                    <div class="input-group mb-3">
                                        <input type="text" id="email" name="email" class="form-control"
                                            placeholder="Email...">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Password...">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="icheck-primary">&nbsp;
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                        </div>
                                </form>
                            </div>

                            <div class="card-footer">
                                <a href="#">Anda lupa password? Klik di sini.</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?= $this->endSection();?>