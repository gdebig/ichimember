<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Pendidikan</h3>
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
                        <a href="<?php echo base_url();?>/pendidikan/tambahpendidikan" class="btn btn-primary">Tambah
                            Data Pendidikan</a>
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        &nbsp;
                    </div>
                </div>

                <?php if(isset($data_pend)&&($data_pend=="kosong")){
                    ?>

                <div class="alert alert-danger">Data pendidikan belum ada. <a
                        href="<?= base_url();?>/pendidikan/tambahpendidikan">Klik
                        di sini untuk menambah data pendidikan</a></div>
                <?php }else{ ?>

                <table id="tabledata" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenjang</th>
                            <th>Nama Sekolah/Universitas</th>
                            <th>Fakultas</th>
                            <th>Program Studi</th>
                            <th>Periode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                    $i=1; 
                                    foreach ($data_pend as $pend) : 
                                    ?>
                        <tr>
                            <td><?php echo $i;$i++;?></td>
                            <td><?= $pend['jenjang'];?></td>
                            <td><?= $pend['namauniv'];?></td>
                            <td><?= $pend['fakultas'];?></td>
                            <td><?= $pend['jurusan'];?></td>
                            <td><?= $pend['thnmasuk']." - ".$pend['thnlulus'] ?></td>
                            <td style="text-align: center"><a
                                    href="<?php echo base_url();?>/pendidikan/ubahpendidikan/<?=$pend['pend_id'];?>"
                                    class="btn btn-warning"> <i class="fas fa-file-signature"></i> Ubah</a>
                                <a href="<?php echo base_url();?>/pendidikan/hapuspendidikan/<?=$pend['pend_id'];?>"
                                    onclick="return confirm('Apakah anda yakin akan menghapus data pendidikan?')"
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