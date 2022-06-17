<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Info <?= $info_dpr['dpr_nama'];?></h3>
        </div>

        <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
        <?php endif;?>
        <!-- /.card-header -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Informasi Umum</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td width="30%">Nama DPR</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $info_dpr['dpr_nama'];?></td>
                    </tr>
                    <tr>
                        <td width="30%">Tingkat DPR</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $info_dpr['dpr_tingkat'];?></td>
                    </tr>
                    <tr>
                        <td width="30%">Nomor SK</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $info_dpr['nosk'];?></td>
                    </tr>
                    <tr>
                        <td width="30%">Softcopy SK</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%">
                            <?php
                        if (!empty($info_dpr['file_sk'])){
                        ?>
                            <a
                                href="<?= base_url();?>/uploads/docs/<?= $info_dpr['file_sk'];?>"><?= $info_dpr['file_sk'];?></a>
                            <?php
                        }else{
                            echo "Tidak ada";
                        }
                        ?>
                    </tr>
                    <tr>
                        <td width="30%">Tanggal Masa Berakhir SK</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= format_indo($info_dpr['expired']);?></td>
                    </tr>
                    <tr>
                        <td width="30%">Alamat Kantor</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $info_dpr['alamat'];?></td>
                    </tr>
                    <tr>
                        <td width="30%">No Telepon (WA)</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $info_dpr['notelp'];?></td>
                    </tr>
                    <tr>
                        <td width="30%">Email</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $info_dpr['email'];?></td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card">
                <div class="card-body">
                    <a href="<?= base_url();?>/infodpr/ubahdpr/<?= $info_dpr['dpr_id'];?>"
                        class="btn btn-block btn-primary">Ubah
                        Profile</a>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
    </div>
</div>

<?= $this->endSection();?>