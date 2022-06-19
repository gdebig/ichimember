<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-sm">

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= $user_count;?></h3>
                                <p>Total Anggota</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="<?= base_url();?>/mananggota" class="small-box-footer">Lebih detail <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-sm">

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?= $dpr_count;?></h3>
                                <p>Jumlah DPR</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?= base_url();?>/mandpr" class="small-box-footer">Lebih detail <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-sm">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= $last3months;?></h3>
                                <p>Total Anggota Baru (dalam 3 bulan terakhir)</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="<?= base_url();?>/mananggota" class="small-box-footer">Lebih detail <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if(isset($info_dpr)&&($info_dpr=="kosong")){
                    ?>

                    <div>&nbsp;<br /><br /></div>
                    <div class="alert alert-danger">Data DPR/DPP belum ada yang akan expired dalam 6 bulan.</div>
                    <?php }else{ ?>
                    <p>Daftar DPR/DPP yang akan expired:</p>

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
                                <th>Alamat dan Nomor Kontak</th>
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
                                <td><?php
                            echo $dpr['alamat']."<br />Email Resmi: ".$dpr['email']."<br />No Telepon: ".$dpr['notelp'];
                            ?></td>
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
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
</div>

<?= $this->endSection();?>