<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Publikasi</h3>
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
                        <a href="<?php echo base_url();?>/publikasi/tambahpub" class="btn btn-primary">Tambah
                            Data Publikasi</a>
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        &nbsp;
                    </div>
                </div>

                <?php if(isset($data_pub)&&($data_pub=="kosong")){
                    ?>

                <div class="alert alert-danger">Data publikasi belum ada. <a
                        href="<?= base_url();?>/publikasi/tambahpub">Klik
                        di sini untuk menambah data publikasi</a></div>
                <?php }else{ ?>

                <table id="tabledata" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tipe Publikasi</th>
                            <th>Judul</th>
                            <th>Nama Journal/Proceeding/Media Publikasi</th>
                            <th>Tahun</th>
                            <th>Link Publikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                    $i=1; 
                                    foreach ($data_pub as $pub) : 
                                    ?>
                        <tr>
                            <td><?php echo $i;$i++;?></td>
                            <td><?= $pub['tipepublikasi'];?></td>
                            <td><?= $pub['judul'];?></td>
                            <td><?= $pub['mediapublikasi'];?></td>
                            <td><?= $pub['tahun'];?></td>
                            <td><?php
                                if (!empty($pub['linkpub'])){
                                    echo "<a href='".$pub['linkpub']."' target='_blank'>Akses Publikasi</a>";
                                }else{
                                    echo " - ";
                                }
                            ?></td>
                            <td style="text-align: center"><a
                                    href="<?php echo base_url();?>/publikasi/ubahpub/<?=$pub['pub_id'];?>"
                                    class="btn btn-warning"> <i class="fas fa-file-signature"></i> Ubah</a>
                                <a href="<?php echo base_url();?>/publikasi/hapuspub/<?=$pub['pub_id'];?>"
                                    onclick="return confirm('Apakah anda yakin akan menghapus data publikasi?')"
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