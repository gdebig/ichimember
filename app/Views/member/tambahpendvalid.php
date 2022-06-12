<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Pendidikan</h3>
        </div>

        <?php if(isset($validation)):?>
        <div class="alert alert-danger"><?= $validation->listErrors()?></div>
        <?php endif;?>

        <!-- /.card-header -->
        <div class="card-body" style="width: auto; margin: 30px;">
            <form action="<?php echo base_url();?>/pendidikan/tambahpendproses" method="post"
                enctype="multipart/form-data">
                <input type="hidden" id="user_id" name="user_id" value="<?= $user_id;?>" />
                <div class="form-group">
                    <label for="jenjang" class="element">
                        <span class="required">Jenjang Pendidikan *</span>&nbsp; </label>
                    <div class="element">
                        <select name="jenjang" id="jenjang" class="form-control">
                            <option value="SD" <?= set_value('jenjang') == "SD" ? "selected" : "";?>>Sekolah Dasar
                            </option>
                            <option value="SMP" <?= set_value('jenjang') == "SMP" ? "selected" : "";?>>Sekolah Menengah
                                Pertama</option>
                            <option value="SMU" <?= set_value('jenjang') == "SMU" ? "selected" : "";?>>Sekolah Menengah
                                Umum</option>
                            <option value="Diploma" <?= set_value('jenjang') == "Diploma" ? "selected" : "";?>>Diploma 4
                            </option>
                            <option value="Sarjana" <?= set_value('jenjang') == "Sarjana" ? "selected" : "";?>>Sarjana
                            </option>
                            <option value="Magister" <?= set_value('jenjang') == "Magister" ? "selected" : "";?>>
                                Magister</option>
                            <option value="Doktor" <?= set_value('jenjang') == "Doktor" ? "selected" : "";?>>Doktor
                            </option>
                            <option value="Profesi" <?= set_value('jenjang') == "Profesi" ? "selected" : "";?>>Profesi
                            </option>
                        </select>
                    </div>
                    <br>
                    <label for="namauniv" class="element">Nama Sekolah / Perguruan Tinggi <span class="required">
                            *</span>&nbsp;
                    </label>
                    <div class="element">
                        <input id="namauniv" name="namauniv" class="form-control" type="text"
                            placeholder="Nama Sekolah / Perguruan Tinggi..." value="<?= set_value('namauniv');?>" />
                    </div>
                    <br />
                    <label for="fakultas" class="element">Fakultas</label>
                    <div class="element">
                        <input id="fakultas" name="fakultas" class="form-control" type="text" placeholder="Fakultas..."
                            value="<?= set_value('fakultas');?>" />
                    </div>
                    <br />
                    <label for="jurusan" class="element">Jurusan</label>
                    <div class="element">
                        <input id="jurusan" name="jurusan" class="form-control" placeholder="Jurusan..." type="text"
                            value="<?= set_value('jurusan');?>" />
                    </div>
                    <br />
                    <label for="thnmasuk" class="element">Tahun Masuk <span class="required"> *</span>&nbsp;
                    </label>
                    <div class="element">
                        <select name="thnmasuk" id="thnmasuk" class="form-control">
                            <?php
                                    $lastyear = date("Y")+10;
                                    for ($tahun1 = 1901;$tahun1<=$lastyear;$tahun1++){
                                        if ($tahun1 == set_value('thnmasuk')){
                                            $selected = "selected";
                                        }else{
                                            $selected ="";
                                        }
                                        echo "<option value='".$tahun1."' ".$selected.">".$tahun1."</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    <br />
                    <label for="thnlulus" class="element">Tahun Lulus <span class="required"> *</span>&nbsp;
                    </label>
                    <div class="element">
                        <select name="thnlulus" id="thnlulus" class="form-control">
                            <?php
                                    $lastyear = date("Y")+10;
                                    for ($tahun1 = 1901;$tahun1<=$lastyear;$tahun1++){
                                        if ($tahun1 == set_value('thnlulus')){
                                            $selected = "selected";
                                        }else{
                                            $selected ="";
                                        }
                                        echo "<option value='".$tahun1."' ".$selected.">".$tahun1."</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    <br />
                    <div class="form-group">
                        <label>Field bertanda * harus diisi.</label>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary col">Tambah
                                Pendidikan</button>
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