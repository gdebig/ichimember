<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Pernyataan Konfirmasi Pendaftaran</h3>
        </div>

        <?php if(isset($validation)):?>
        <div class="alert alert-danger"><?= $validation->listErrors()?></div>
        <?php endif;?>

        <!-- /.card-header -->
        <div class="card-body" style="width: auto; margin: 30px;">
            <form action="<?php echo base_url();?>/anggota/konfirmproses" method="post" enctype="multipart/form-data">
                <input type="hidden" name="user_id" id="user_id" value="<?= $user_id;?>" />
                <div class="form-group">
                    <div class="form-group mb-0">
                        <p>Saya memberi konfirmasi menjadi Anggota Ikatan Cendekiawan Hindu Indonesia (ICHI) dan
                            menerima AD/ART ICHI dengan mencentang opsi di bawah ini.</p>

                        <p>Dengan menjadi anggota ICHI, saya menyadari bahwa saya terikat dengan Janji Anggota ICHI
                            yaitu:</p>
                        <ol>
                            <li>Berjanji akan menjaga dan mempromosikan nilai-nilai Hindu dalam masyarakat berdasarkan
                                kaidah intelektual.</li>
                            <li>Bertekad mendorong lahirnya pemikir-pemikir Hindu Indonesia di tingkat Nasional dan
                                Internasional</li>
                            <li>Berkomitmen meningkatkan kualitas umat Hindu dalam usaha mewujudkan <i>Mokshartam
                                    Jagadhita</i></li>
                            <li>Bersedia menjalankan tugas dengan penuh tanggung jawab dan berlandaskan ajaran Dharma
                            </li>
                        </ol>
                        <br /><br />
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="terms2" class="custom-control-input" id="terms2" value="ya"
                                <?= $confirm=='ya' ? 'checked="checked"':""?>>
                            <label class="custom-control-label" for="terms2">Saya mengkonfirmasi data pendaftaran
                                Anggota ICHI.</label>
                        </div><br /><br />
                    </div>
                    <div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary col"
                                    onclick="return confirm('Apakah anda sudah yakin semua data sudah benar?')">Konfirmasi
                                    Data</button>
                            </div>
                            <div class="col">
                                <button type="submit" name="submit" value="batal"
                                    class="btn btn-block btn-danger col">Batal</button>
                            </div>
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