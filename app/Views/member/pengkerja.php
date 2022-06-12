<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Pekerjaan</h3>
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
                        <a href="<?php echo base_url();?>/pengkerja/tambahkerja" class="btn btn-primary">Tambah
                            Data Pengalaman Kerja</a>
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        &nbsp;
                    </div>
                </div>

                <?php if(isset($info_kerja)&&($info_kerja=="kosong")){
                    ?>

                <div class="alert alert-danger">Data pengalaman kerja belum ada. <a
                        href="<?= base_url();?>/pengkerja/tambahkerja">Klik
                        di sini untuk menambah data pengalaman kerja</a></div>
                <?php }else{ ?>

                <table id="tabledata" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Instansi/Tempat Kerja</th>
                            <th>Jabatan</th>
                            <th>Periode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                    $i=1; 
                                    foreach ($info_kerja as $kerja) : 
                                    ?>
                        <tr>
                            <td><?php echo $i;$i++;?></td>
                            <td><?= $kerja['namainstansi'];?></td>
                            <td><?= $kerja['jabatan'];?></td>
                            <td><?php
                                if (empty($kerja['thnakhir'])){
                                    echo $kerja['thnawal']." - Sekarang";
                                }else{
                                    echo $kerja['thnawal']." - ".$kerja['thnakhir'];
                                }
                            ?>
                            </td>
                            <td style="text-align: center"><a
                                    href="<?php echo base_url();?>/pengkerja/ubahkerja/<?=$kerja['kerja_id'];?>"
                                    class="btn btn-warning"> <i class="fas fa-file-signature"></i> Ubah</a>
                                <a href="<?php echo base_url();?>/pengkerja/hapuskerja/<?=$kerja['kerja_id'];?>"
                                    onclick="return confirm('Apakah anda yakin akan menghapus data pengalaman kerja?')"
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