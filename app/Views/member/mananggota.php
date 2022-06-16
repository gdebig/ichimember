<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Manajemen Anggota ICHI</h3>
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
                        <a href="<?php echo base_url();?>/mananggota/tambahmember" class="btn btn-primary">Tambah
                            Anggota</a>
                    </div>
                </div>

                <div class="col">
                    <div class="row">
                        &nbsp;
                    </div>
                </div>

                <?php if(isset($info_member)&&($info_member=="kosong")){
                    ?>

                <div class="alert alert-danger">Data anggota belum ada. <a
                        href="<?= base_url();?>/mananggota/tambahmember">Klik
                        di sini untuk menambah data anggota</a></div>
                <?php }else{ ?>

                <table id="tabledata" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Anggota</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Regional</th>
                            <th>status</th>
                            <th>Tipe Anggota</th>
                            <th>Kehormatan</th>
                            <th>Konfirmasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                    $i=1; 
                                    foreach ($info_member as $member) : 
                                    ?>
                        <tr>
                            <td><?php echo $i;$i++;?></td>
                            <td><?= $member['kodeanggota'];?></td>
                            <td><a
                                    href="<?= base_url();?>/mananggota/profile/<?= $member['user_id'];?>"><?= $member['username'];?></a>
                            </td>
                            <td><?= $member['namalengkap'];?></td>
                            <td><?= $member['dpr_nama'];?></td>
                            <td><?php
                            switch ($member['status']){
                                case "aktif":
                                    echo "Anggota Aktif";
                                    break;
                                case "tidak":
                                    echo "Anggota Tidak Aktif";
                                    break;
                            }
                            ?></td>
                            <td>
                                <ul><?php
                            if ($member['type'][0] == 'y'){
                                echo "<li>Super Admin</li>";
                            }
                            if ($member['type'][1] == 'y'){
                                echo "<li>Admin</li>";
                            }
                            if ($member['type'][2] == 'y'){
                                echo "<li>Anggota</li>";
                            }
                            if ($member['type'][3] == 'y'){
                                echo "<li>Calon Anggota</li>";
                            }
                            ?></ul>
                            </td>
                            <td><?php
                            switch ($member['kehormatan']){
                                case "ya":
                                    echo "Anggota Kehormatan";
                                    break;
                                case "tidak":
                                    echo "Anggota Biasa";
                                    break;
                            }
                            ?></td>
                            <td><?php
                            switch ($member['confirm']){
                                case "ya":
                                    echo "Sudah Konfirm";
                                    break;
                                case "tidak":
                                    echo "Belum Konfirm";
                                    break;
                            }
                            ?></td>
                            <td style="text-align: center"><a
                                    href="<?php echo base_url();?>/mananggota/ubahmember/<?=$member['user_id'];?>"
                                    class="btn btn-warning"> <i class="fas fa-file-signature"></i> Ubah</a>
                                <a href="<?php echo base_url();?>/mananggota/hapusmember/<?=$member['user_id'];?>"
                                    onclick="return confirm('Apakah anda yakin akan menghapus data anggota?')"
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