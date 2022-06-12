<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Publikasi</h3>
        </div>

        <?php if(isset($validation)):?>
        <div class="alert alert-danger"><?= $validation->listErrors()?></div>
        <?php endif;?>

        <!-- /.card-header -->
        <div class="card-body" style="width: auto; margin: 30px;">
            <form action="<?php echo base_url();?>/publikasi/tambahpubproses" method="post"
                enctype="multipart/form-data">
                <input type="hidden" id="user_id" name="user_id" value="<?= $user_id;?>" />
                <div class="form-group">
                    <label for="tipepublikasi" class="element">Tipe Publikasi <span class="required">
                            *</span>&nbsp;
                    </label>
                    <div class="element">
                        <select name="tipepublikasi" id="tipepublikasi" class="form-control">
                            <option value="Artikel" <?= set_value('tipepublikasi')=='Artikel' ? "selected" : "";?>>
                                Artikel</option>
                            <option value="Makalah" <?= set_value('tipepublikasi')=='Makalah' ? "selected" : "";?>>
                                Makalah</option>
                            <option value="Buku" <?= set_value('tipepublikasi')=='Buku' ? "selected" : "";?>>Buku
                            </option>
                        </select>
                    </div>
                    <br />
                    <label for="judul" class="element">Judul publikasi <span class="required">
                            *</span>&nbsp;
                    </label>
                    <div class="element">
                        <input id="judul" name="judul" class="form-control" type="text" placeholder="Judul publikasi..."
                            value="<?= set_value('judul');?>" />
                    </div>
                    <br />
                    <label for="mediapublikasi" class="element">Nama Journal/Proceeding/Media Publikasi <span
                            class="required"> *</span>&nbsp;</label>
                    <div class="element">
                        <input id="mediapublikasi" name="mediapublikasi" class="form-control" type="text"
                            placeholder="Nama Journal/Proceeding/Media Publikasi..."
                            value="<?= set_value('mediapublikasi');?>" />
                    </div>
                    <br />
                    <label for="tahun" class="element">Tahun Publikasi <span class="required"> *</span>&nbsp;
                    </label>
                    <div class="element">
                        <select name="tahun" id="tahun" class="form-control">
                            <?php
                                    $lastyear = date("Y")+10;
                                    for ($tahun1 = 1901;$tahun1<=$lastyear;$tahun1++){
                                        if ($tahun1 == set_value('tahun')){
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
                    <label for="linkpub" class="element">Link Publikasi (url link kalau publikasi dapat diakses
                        online)</label>
                    <div class="element">
                        <input id="linkpub" name="linkpub" class="form-control" type="text"
                            placeholder="Link Publikasi..." value="<?= set_value('linkpub');?>" />
                    </div>
                    <br />
                    <div class="form-group">
                        <label>Field bertanda * harus diisi.</label>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary col">Tambah
                                Publikasi</button>
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