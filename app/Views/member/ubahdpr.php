<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Data DPR / DPP ICHI</h3>
        </div>

        <?php if(isset($validation)):?>
        <div class="alert alert-danger"><?= $validation->listErrors()?></div>
        <?php endif;?>

        <!-- /.card-header -->
        <div class="card-body" style="width: auto; margin: 30px;">
            <form action="<?php echo base_url();?>/mandpr/ubahdprproses" method="post" enctype="multipart/form-data">
                <input type="hidden" name="dpr_id" id="dpr_id" value="<?= $dpr_id;?>" />
                <input type="hidden" name="filename" id="filename" value="<?= $file_sk;?>" />
                <div class="form-group">
                    <label for="kodedpr" class="element">Kode DPR / DPP <span class="required">
                            *</span>&nbsp;
                    </label>
                    <div class="element">
                        <input id="kodedpr" name="kodedpr" class="form-control" type="text"
                            placeholder="Kode DPR / DPP..." value="<?= $kodedpr;?>" />
                    </div>
                    <br />
                    <label for="dpr_nama" class="element">Nama DPR / DPP <span class="required">
                            *</span>&nbsp;</label>
                    <div class="element">
                        <input id="dpr_nama" name="dpr_nama" class="form-control" type="text"
                            placeholder="Nama DPR / DPP..." value="<?= $dpr_nama;?>" />
                    </div>
                    <br />
                    <label for="dpr_tingkat" class="element">Tingkat DPR / DPP</label>
                    <div class="element">
                        <select name="dpr_tingkat" id="dpr_tingkat">
                            <option value="Pusat" <?= $dpr_tingkat=='Pusat' ? "selected" : "";?>>Pusat
                            </option>
                            <option value="Reg" value="Pusat" <?= $dpr_tingkat=='Reg' ? "selected" : "";?>>
                                Regional</option>
                            <option value="Prov" value="Pusat" <?= $dpr_tingkat=='Prov' ? "selected" : "";?>>Provinsi
                            </option>
                            <option value="Kab" value="Pusat" <?= $dpr_tingkat=='Kab' ? "selected" : "";?>>
                                Kabupaten</option>
                            <option value="Kec" value="Pusat" <?= $dpr_tingkat=='Kec' ? "selected" : "";?>>
                                Kecamatan</option>
                        </select>
                    </div>
                    <br />
                    <label for="nosk" class="element">Nomor SK <span class="required">
                            *</span>&nbsp;</label>
                    <div class="element">
                        <input id="nosk" name="nosk" class="form-control" type="text" placeholder="nosk..."
                            value="<?= $nosk;?>" />
                    </div>
                    <br />
                    <label for="file_sk" class="element">Upload SCAN SK (image atau PDF)</label>
                    <div class="element">
                        <input id="file_sk" name="file_sk" class="form-control" type="file"
                            placeholder="File Scan SK..." />
                    </div>
                    <br />
                    <label for="expired" class="element">Tanggal Akhir SK <span class="required">
                            *</span>&nbsp;
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control float-right data-datepicker" id="expired" name="expired"
                            placeholder="Tanggal Akhir SK..." value="<?= $expired;?>" />
                    </div>
                    <br />
                    <label for="alamat" class="element">Alamat Kantor</label>
                    <div class="element">
                        <textarea name="alamat" id="alamat" class="form-control"
                            placeholder="Alamat Kantor..."><?= $alamat;?></textarea>
                    </div>
                    <br />
                    <label for="email" class="element">Email Resmi</label>
                    <div class="element">
                        <input id="email" name="email" class="form-control" type="text" placeholder="Email..."
                            value="<?= $email;?>" />
                    </div>
                    <br />
                    <label for="notelp" class="element">Nomor Telepon</label>
                    <div class="element">
                        <input id="notelp" name="notelp" class="form-control" type="text" placeholder="Nomor Telepon..."
                            value="<?= $notelp;?>" />
                    </div>
                    <br />
                    <div class="form-group">
                        <label>Field bertanda * harus diisi.</label>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary col">Ubah
                                DPR/DPP</button>
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