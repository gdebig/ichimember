<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Profile</h3>
        </div>

        <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
        <?php endif;?>
        <!-- /.card-header -->

        <?php 
        if(isset($kosong))
        {
        ?>
        <div class="alert alert-danger">Data profile belum ada. <a href="<?= base_url();?>/anggota/buatprofile">Klik
                di sini untuk membuat profile</a></div>
        <?php
        }else{
        ?>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Data Umum</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td width="30%">Nama Lengkap</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $namalengkap;?></td>
                    </tr>
                    <tr>
                        <td width="30%">Regional</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $dpr_nama;?></td>
                    </tr>
                    <tr>
                        <td width="30%">Tempat & Tanggal Lahir</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $tempatlahir.", ".format_indo($tanggallahir);?></td>
                    </tr>
                    <tr>
                        <td width="30%">Gender</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $gender=="laki" ? "Laki-laki" : "Perempuan";?></td>
                    </tr>
                    <tr>
                        <td width="30%">Alamat Rumah</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $alamat;?></td>
                    </tr>
                    <tr>
                        <td width="30%">No Telepon (WA)</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $notelp;?></td>
                    </tr>
                    <tr>
                        <td width="30%">Email Pribadi</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $email;?></td>
                    </tr>
                    <tr>
                        <td width="30%">Foto</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?php
                        if (!empty($foto)){
                            echo "<img src='".base_url('uploads/pics/'.$foto)."' width='30%' height='30%' />";
                        }else{
                            echo "";
                        }
                         ?></td>
                    </tr>
                    <tr>
                        <td width="30%">Keahlian</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $keahlian;?></td>
                    </tr>
                    <tr>
                        <td width="30%">Google Scholar</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?php
                        if (!empty($scholar_id)){
                        ?>
                            <a href="https://scholar.google.com/citations?user=<?= $scholar_id;?>"
                                target="_blank"><?= $scholar_id;?></a>
                            <?php
                        }else{
                            echo "Belum ada";
                        }
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Scopus</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?php
                        if (!empty($scopus_id)){
                        ?>
                            <a href="https://www.scopus.com/authid/detail.uri?authorId=<?= $scopus_id;?>"
                                target="_blank"><?= $scopus_id;?></a>
                            <?php
                        }else{
                            echo "Belum ada";
                        }
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Orcid ID</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?php
                        if (!empty($orcid_id)){
                        ?>
                            <a href="https://orcid.org/<?= $orcid_id;?>" target="_blank"><?= $orcid_id;?></a>
                            <?php
                        }else{
                            echo "Belum ada";
                        }
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Sinta ID</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?php
                        if (!empty($sinta_id)){
                        ?>
                            <a href="https://sinta3.kemdikbud.go.id/authors/profile/<?= $sinta_id;?>"
                                target="_blank"><?= $sinta_id;?></a>
                            <?php
                        }else{
                            echo "Belum ada";
                        }
                        ?>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Informasi Pekerjaan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <td width="30%">Tempat Kerja</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $tempatkerja;?></td>
                    </tr>
                    <tr>
                        <td width="30%">Alamat Kantor</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $alamatkerja;?></td>
                    </tr>
                    <tr>
                        <td width="30%">Nomor Telepon Kantor</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $telpkerja;?></td>
                    </tr>
                    <tr>
                        <td width="30%">Email Kantor</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $emailkerja;?></td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card">
            <div class="card-body">
                <a href="<?= base_url();?>/anggota/ubahprofile/<?= $user_id;?>" class="btn btn-block btn-primary">Ubah
                    Profile</a>
                <a href="<?= base_url();?>/anggota/ubahpass/<?= $user_id;?>" class="btn btn-block btn-primary">Ubah
                    Password</a>
            </div>
        </div>
        <?php
        }
        ?>
        <!-- /.content-wrapper -->
    </div>
</div>

<?= $this->endSection();?>