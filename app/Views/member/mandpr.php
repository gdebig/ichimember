<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Manajemen Dewan Pengurus Regional / Dewan Pengurus Pusat ICHI</h3>
        </div>
        <!-- /.card-header -->
        <div class="card">
            <div class="card-body">

                <div class="col">
                    <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif;?>
                </div>

                <div class="col">
                    <div class="row">
                        <a href="<?php echo base_url();?>/mandpr/tambahdpr" class="btn btn-primary">Tambah
                            Data DPR/DPP</a>
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        &nbsp;
                    </div>
                </div>

                <?php if(isset($info_dpr)&&($info_dpr=="kosong")){
                    ?>

                <div class="alert alert-danger">Data DPR/DPP belum ada. <a
                        href="<?= base_url();?>/mandpr/tambahdpr">Klik
                        di sini untuk menambah data DPR/DPP</a></div>
                <?php }else{ ?>

                <table id="tabledata" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode DPR/DPP</th>
                            <th>Nama DPR/DPP</th>
                            <th>Tingkat</th>
                            <th>Nomor SK</th>
                            <th>File SK</th>
                            <th>Batas Waktu SK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                    $i=1; 
                                    foreach ($info_dpr as $dpr) : 
                                    ?>
                        <tr>
                            <td><?php echo $i;$i++;?></td>
                            <td><?= $dpr['kodedpr'];?></td>
                            <td><?= $dpr['dpr_nama'];?></td>
                            <td><?= $dpr['dpr_tingkat'];?></td>
                            <td><?= $dpr['nosk'];?></td>
                            <td><?= $dpr['file_sk'];?></td>
                            <td><?= $dpr['expired'];?></td>
                            <td style="text-align: center"><a
                                    href="<?php echo base_url();?>/mandpr/ubahdpr/<?=$dpr['dpr_id'];?>"
                                    class="btn btn-warning"> <i class="fas fa-file-signature"></i> Ubah</a>
                                <a href="<?php echo base_url();?>/mandpr/hapusdpr/<?=$dpr['dpr_id'];?>"
                                    onclick="return confirm('Apakah anda yakin akan menghapus data DPR / DPP?')"
                                    class="btn btn-danger"> <i class="fas fa-trash"></i>
                                    Hapus</a>
                            </td>
                        </tr>
                        <?php 
                                    endforeach 
                                    ?>
                    </tbody>
                </table>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->

<?= $this->endSection();?>