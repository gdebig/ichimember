<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Ubah Password</h3>
        </div>
        <!-- /.card-header -->

        <?php if(isset($validation)):?>
        <div class="alert alert-danger"><?= $validation->listErrors()?></div>
        <?php endif;?>
        <?php if(session()->getFlashdata('passerror')):?>
        <div class="alert alert-danger"><?= session()->getFlashdata('passerror') ?></div>
        <?php endif;?>

        <div class="card-body" style="width: auto; margin: 30px;">
            <form action="<?php echo base_url();?>/anggota/ubahpassproses" method="post" enctype="multipart/form-data">
                <input type="hidden" id="user_id" name="user_id" value="<?= $user_id;?>">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Form Ubah Password</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="oldpass" class="element">Password Lama <span class="required"> *</span>&nbsp;
                            </label>
                            <div class="element">
                                <input id="oldpass" name="oldpass" type="password" class="form-control"
                                    placeholder="Password Lama..." />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="newpass" class="element">Password Baru <span class="required"> *</span>&nbsp;
                            </label>
                            <div class="element">
                                <input id="newpass" name="newpass" type="password" class="form-control"
                                    placeholder="Password Baru..." />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confpass" class="element">Konfirmasi Password Baru <span class="required">
                                    *</span>&nbsp;
                            </label>
                            <div class="element">
                                <input id="confpass" name="confpass" type="password" class="form-control"
                                    placeholder="Konfirmasi Password Baru..." />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Field bertanda * harus diisi.</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary col">Ubah
                            Password</button>
                    </div>
                    <div class="col">
                        <button type="submit" name="submit" value="batal"
                            class="btn btn-block btn-danger col">Batal</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.content-wrapper -->
    </div>
</div>

<?= $this->endSection();?>