<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Organisasi</h3>
        </div>

        <?php if(isset($validation)):?>
        <div class="alert alert-danger"><?= $validation->listErrors()?></div>
        <?php endif;?>

        <!-- /.card-header -->
        <div class="card-body" style="width: auto; margin: 30px;">
            <form action="<?php echo base_url();?>/organisasi/ubahorgproses" method="post"
                enctype="multipart/form-data">
                <input type="hidden" id="user_id" name="user_id" value="<?= $user_id;?>" />
                <input type="hidden" id="org_id" name="org_id" value="<?= $org_id;?>" />
                <div class="form-group">
                    <label for="namaorganisasi" class="element">Nama Organisasi <span class="required">
                            *</span>&nbsp;
                    </label>
                    <div class="element">
                        <input id="namaorganisasi" name="namaorganisasi" class="form-control" type="text"
                            placeholder="Nama Organisasi..." value="<?= $namaorganisasi;?>" />
                    </div>
                    <br />
                    <label for="jabatan" class="element">Jabatan</label>
                    <div class="element">
                        <input id="jabatan" name="jabatan" class="form-control" type="text" placeholder="Jabatan..."
                            value="<?= $jabatan;?>" />
                    </div>
                    <br />
                    <label for="thnawal" class="element">Tahun Mulai org <span class="required"> *</span>&nbsp;
                    </label>
                    <div class="element">
                        <select name="thnawal" id="thnawal" class="form-control">
                            <?php
                                    $lastyear = date("Y")+10;
                                    $now = date("Y");
                                    for ($tahun1 = 1901;$tahun1<=$lastyear;$tahun1++){
                                        if ($tahun1 == $thnawal){
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
                    <label for="thnakhir" class="element">Tahun Selesai org <span class="required"> *</span>&nbsp;
                    </label>
                    <div class="element">
                        <select name="thnakhir" id="thnakhir" class="form-control">
                            <?php
                                $lastyear = date("Y")+10;
                                for ($tahun1 = 1901;$tahun1<=$lastyear;$tahun1++){
                                    if ($tahun1 == $thnakhir){
                                        $selected = "selected";
                                    }else{
                                        $selected ="";
                                    }
                                    echo "<option value='".$tahun1."' ".$selected.">".$tahun1."</option>";
                                }
                                if ($thnakhir == ""){
                                    echo "<option value='' selected>Sekarang</option>";
                                }else{
                                    echo "<option value=''>Sekarang</option>";
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
                            <button type="submit" name="submit" value="submit" class="btn btn-primary col">Ubah
                                Organisasi</button>
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