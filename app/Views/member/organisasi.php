<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Organisasi</h3>
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
                        <a href="<?php echo base_url();?>/organisasi/tambahorg" class="btn btn-primary">Tambah
                            Data Organisasi</a>
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        &nbsp;
                    </div>
                </div>

                <?php if(isset($info_org)&&($info_org=="kosong")){
                    ?>

                <div class="alert alert-danger">Data Organisasi belum ada. <a
                        href="<?= base_url();?>/organisasi/tambahorg">Klik
                        di sini untuk menambah data Organisasi</a></div>
                <?php }else{ ?>

                <table id="tabledata" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Organisasi</th>
                            <th>Jabatan</th>
                            <th>Periode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                    $i=1; 
                                    foreach ($info_org as $org) : 
                                    ?>
                        <tr>
                            <td><?php echo $i;$i++;?></td>
                            <td><?= $org['namaorganisasi'];?></td>
                            <td><?= $org['jabatan'];?></td>
                            <td><?php
                                if (empty($org['thnakhir'])){
                                    echo $org['thnawal']." - Sekarang";
                                }else{
                                    echo $org['thnawal']." - ".$org['thnakhir'];
                                }
                            ?>
                            </td>
                            <td style="text-align: center"><a
                                    href="<?php echo base_url();?>/organisasi/ubahorg/<?=$org['org_id'];?>"
                                    class="btn btn-warning"> <i class="fas fa-file-signature"></i> Ubah</a>
                                <a href="<?php echo base_url();?>/organisasi/hapusorg/<?=$org['org_id'];?>"
                                    onclick="return confirm('Apakah anda yakin akan menghapus data Organisasi?')"
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