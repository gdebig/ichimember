<?= $this->extend('main/template');?>

<?= $this->section('content');?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Anggota ICHI</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active">Daftar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <section class="content">
            <div class="container-fluid">
                <div class="row mx-auto">
                    <div class="col-10 mx-auto">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Form Pendaftaran</h3>
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
                                <form action="<?php echo base_url();?>/home/daftarproses" method="post">
                                    <div class="form-group">
                                        <label for="email" class="element">Email <span class="required">
                                                *</span>&nbsp; </label>
                                        <div class="element">
                                            <input id="email" name="email" type="text" class="form-control"
                                                placeholder="Email..." />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="newpass" class="element">Password <span class="required">
                                                *</span>&nbsp; </label>
                                        <div class="element">
                                            <input id="newpass" name="newpass" type="password" class="form-control"
                                                placeholder="Password..." />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmpass" class="element">Konfirmasi Password <span
                                                class="required"> *</span>&nbsp;
                                        </label>
                                        <div class="element">
                                            <input id="confirmpass" name="confirmpass" type="password"
                                                class="form-control" placeholder="Ketik ulang password..." />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="namalengkap" class="element">Nama Lengkap <span class="required">
                                                *</span>&nbsp; </label>
                                        <div class="element">
                                            <input id="namalengkap" name="namalengkap" type="text" class="form-control"
                                                placeholder="Nama Lengkap..." />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" name="submit" value="submit"
                                                class="btn btn-primary btn-default col">Daftar Anggota</button>
                                        </div>
                                        <div class="col">
                                            <button type="submit" name="submit" value="batal"
                                                class="btn btn-block btn-danger col">Batal</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="card-footer">
                                Field bertanda *) harus diisi.
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?= $this->endSection();?>