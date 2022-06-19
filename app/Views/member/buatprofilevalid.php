<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Buat Profile</h3>
        </div>
        <!-- /.card-header -->

        <?php if(isset($validation)):?>
        <div class="alert alert-danger"><?= $validation->listErrors()?></div>
        <?php endif;?>

        <div class="card-body" style="width: auto; margin: 30px;">
            <form action="<?php echo base_url();?>/anggota/buatprofileproses" method="post"
                enctype="multipart/form-data">
                <input type="hidden" id="user_id" name="user_id" value="<?= $user_id;?>">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Data Diri</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namalengkap" class="element">Nama Lengkap <span class="required"> *</span>&nbsp;
                            </label>
                            <div class="element">
                                <input id="namalengkap" name="namalengkap" type="text" class="form-control"
                                    placeholder="Nama Lengkap..." value="<?= $namalengkap;?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tempatlahir" class="element">Tempat Lahir <span class="required"> *</span>&nbsp;
                            </label>
                            <div class="element">
                                <input id="tempatlahir" name="tempatlahir" type="text" class="form-control"
                                    placeholder="Tempat Lahir..." value="<?= set_value('tempatlahir');?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggallahir" class="element">Tanggal Lahir <span class="required">
                                    *</span>&nbsp;
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right data-datepicker" id="tanggallahir"
                                    name="tanggallahir" placeholder="Tanggal Lahir..."
                                    value="<?= set_value('tanggallahir');?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="element">Gender
                            </label>
                            <div class="element">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="laki" <?= set_value('gender') == 'laki' ? "selected" : "";?>>
                                        Laki-laki</option>
                                    <option value="perempuan"
                                        <?= set_value('gender') == 'perempuan' ? "selected" : "";?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="element">Alamat Rumah <span class="required">
                                    *</span>&nbsp;</label>
                            <div class="element">
                                <textarea id="alamat" name="alamat" class="form-control"
                                    placeholder="Alamat Rumah..."><?= set_value('alamat');?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="noktp" class="element">Nomor KTP <span class="required">*</span>&nbsp;</label>
                            <div class="element">
                                <input id="noktp" name="noktp" type="text" class="form-control" placeholder="No KTP..."
                                    value="<?= set_value('noktp');?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uploadktp" class="element">Upload Scan KTP (Image atau PDF) <span
                                    class="required">*</span>&nbsp;</label>
                            <div class="element">
                                <input id="uploadktp" name="uploadktp" type="file" class="form-control"
                                    placeholder="Kode Pos..." />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notelp" class="element">Telepon (Nomor WhastApp)</label>
                            <div class="element">
                                <input id="notelp" name="notelp" type="text" class="form-control"
                                    placeholder="Telepon (Nomor WhatsApp)..." value="<?= set_value('notelp');?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="element">Email <span class="required"> *</span>&nbsp;</label>
                            <div class="element">
                                <input id="email" name="email" type="text" class="form-control" placeholder="Email..."
                                    value="<?= set_value('email');?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="photo" class="element">Foto (Format: .jpg, .jpeg, .png)<span
                                    class="required">*</span>&nbsp;</label>
                            <div class="element">
                                <input id="photo" name="photo" type="file" class="form-control" placeholder="Foto..." />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keahlian" class="element">Keahlian <span class="required">
                                    *</span>&nbsp;</label>
                            <div class="element">
                                <input id="keahlian" name="keahlian" type="text" class="form-control"
                                    placeholder="keahlian..." value="<?= set_value('keahlian');?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="scholar_id" class="element">Google Scholar ID</label>
                            <div class="element">
                                <input id="scholar_id" name="scholar_id" type="text" class="form-control"
                                    placeholder="Google Scholar ID..." value="<?= set_value('scholar_id');?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="scopus_id" class="element">Scopus ID</label>
                            <div class="element">
                                <input id="scopus_id" name="scopus_id" type="text" class="form-control"
                                    placeholder="Scopus ID..." value="<?= set_value('scopus_id');?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="orcid_id" class="element">Orcid ID</label>
                            <div class="element">
                                <input id="orcid_id" name="orcid_id" type="text" class="form-control"
                                    placeholder="Orcid ID..." value="<?= set_value('orcid_id');?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sinta_id" class="element">Sinta ID</label>
                            <div class="element">
                                <input id="sinta_id" name="sinta_id" type="text" class="form-control"
                                    placeholder="Sinta ID..." value="<?= set_value('sinta_id');?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Pekerjaan</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tempatkerja" class="element">Tempat Kerja <span
                                    class="required">*</span>&nbsp;</label>
                            <div class="element">
                                <input id="tempatkerja" name="tempatkerja" type="text" class="form-control"
                                    placeholder="Tempat Kerja..." />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamatkerja" class="element">Alamat Kantor <span class="required">*</span>&nbsp;
                            </label>
                            <div class="element">
                                <textarea id="alamatkerja" name="alamatkerja" class="form-control"
                                    placeholder="Alamat Kantor..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telpkerja" class="element">Telepon Kantor <span
                                    class="required">*</span>&nbsp;</label>
                            <div class="element">
                                <input id="telpkerja" name="telpkerja" type="text" class="form-control"
                                    placeholder="Telepon Kantor..." />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailkerja" class="element">Email Kantor <span
                                    class="required">*</span>&nbsp;</label>
                            <div class="element">
                                <input id="emailkerja" name="emailkerja" type="text" class="form-control"
                                    placeholder="Email Kantor..." />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Info Lain</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="bagidata" class="element">Apakah bersedia data diri (selain nomor KTP)
                                ditampilkan saat pengguna melihat profile Anda?</label>
                            <div class="element">
                                <select name="bagidata" id="bagidata" class="form-control">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
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
                        <button type="submit" name="submit" value="submit" class="btn btn-primary col">Buat
                            Profile</button>
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