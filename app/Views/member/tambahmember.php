<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Data Anggota ICHI</h3>
        </div>

        <?php if(isset($validation)):?>
        <div class="alert alert-danger"><?= $validation->listErrors()?></div>
        <?php endif;?>

        <!-- /.card-header -->
        <div class="card-body" style="width: auto; margin: 30px;">
            <form action="<?php echo base_url();?>/mananggota/tambahmemberproses" method="post"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="kodeanggota" class="element">Kode Anggota <span class="required">
                            *</span>&nbsp;
                    </label>
                    <div class="element">
                        <input id="kodeanggota" name="kodeanggota" class="form-control" type="text"
                            placeholder="Kode Anggota..." />
                    </div>
                    <br />
                    <label for="username" class="element">Username (Email) <span class="required">
                            *</span>&nbsp;</label>
                    <div class="element">
                        <input id="username" name="username" class="form-control" type="text"
                            placeholder="Username (Email)..." />
                    </div>
                    <br />
                    <label for="namalengkap" class="element">Nama Lengkap <span class="required">
                            *</span>&nbsp;</label>
                    <div class="element">
                        <input id="namalengkap" name="namalengkap" class="form-control" type="text"
                            placeholder="Nama Lengkap..." />
                    </div>
                    <br />
                    <label for="newpass" class="element">Password <span class="required">
                            *</span>&nbsp;</label>
                    <div class="element">
                        <input id="newpass" name="newpass" class="form-control" type="password"
                            placeholder="Password..." />
                    </div>
                    <br />
                    <label for="confirmpass" class="element">Konfirmasi Password <span class="required">
                            *</span>&nbsp;</label>
                    <div class="element">
                        <input id="confirmpass" name="confirmpass" class="form-control" type="password"
                            placeholder="Konfirmasi Password..." />
                    </div>
                    <br />
                    <label for="status" class="element">Keaktifan</label>
                    <div class="element">
                        <select name="status" id="status">
                            <option value="aktif">Anggota Aktif</option>
                            <option value="tidak">Anggota Tidak Aktif</option>
                        </select>
                    </div>
                    <br />
                    <label for="type" class="element">Tipe User</label>
                    <div class="element">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="superadmin" name="superadmin"
                                value="yes">
                            <label for="superadmin" class="custom-control-label">Super Admin</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="admin" name="admin" value="yes">
                            <label for="admin" class="custom-control-label">Admin</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="anggota" name="anggota" value="yes">
                            <label for="anggota" class="custom-control-label">Anggota</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="calon" name="calon" value="yes">
                            <label for="calon" class="custom-control-label">Calon Anggota</label>
                        </div>
                    </div>
                    <br />
                    <label for="kehormatan" class="element">Anggota Kehormatan</label>
                    <div class="element">
                        <select name="kehormatan" id="kehormatan">
                            <option value="tidak">Tidak</option>
                            <option value="ya">Ya</option>
                        </select>
                    </div>
                    <br />
                    <label for="confirm" class="element">Konfirmasi</label>
                    <div class="element">
                        <select name="confirm" id="confirm">
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                    </div>
                    <br />
                    <div class="form-group">
                        <label>Field bertanda * harus diisi.</label>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary col">Tambah
                                Anggota</button>
                        </div>
                        <div class="col">
                            <button type="submit" name="submit" value="batal"
                                class="btn btn-block btn-danger col">Batal</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->

<?= $this->endSection();?>