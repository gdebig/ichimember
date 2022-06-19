<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="card card-primary" style="width: auto; margin: 30px;">
    <div class="col-sm-13" style="width: auto; margin: 30px;">
        <div class="">
            <h3>Profile Anggota ICHI</h3>
        </div>
        <!-- data profile -->
        <?php
        if(isset($info_profile)&&($info_profile=="Data kosong")){
        ?>
        <div class="alert alert-danger">Data profile belum ada.</div>
        <?php }else{ ?>
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Data Umum</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td width="30%">Nama Lengkap</td>
                            <td width="5%" style="text-align:center">:</td>
                            <td width="65%"><?= $info_member['namalengkap'];?></td>
                        </tr>
                        <tr>
                            <td width="30%">Regional</td>
                            <td width="5%" style="text-align:center">:</td>
                            <td width="65%"><?= $info_member['dpr_nama'];?></td>
                        </tr>
                        <?php
                        if ($info_profile['bagidata']=="Ya"){
                        ?>
                        <tr>
                            <td width="30%">Tempat & Tanggal Lahir</td>
                            <td width="5%" style="text-align:center">:</td>
                            <td width="65%">
                                <?= $info_profile['tempatlahir'].", ".format_indo($info_profile['tanggallahir']);?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td width="30%">Gender</td>
                            <td width="5%" style="text-align:center">:</td>
                            <td width="65%"><?= $info_profile['gender']=="laki" ? "Laki-laki" : "Perempuan";?></td>
                        </tr>
                        <?php
                        if ($info_profile['bagidata']=="Ya"){
                        ?>
                        <tr>
                            <td width="30%">Alamat Rumah</td>
                            <td width="5%" style="text-align:center">:</td>
                            <td width="65%"><?= $info_profile['alamat'];?></td>
                        </tr>
                        <tr>
                            <td width="30%">No Telepon (WA)</td>
                            <td width="5%" style="text-align:center">:</td>
                            <td width="65%"><?= $info_profile['notelp'];?></td>
                        </tr>
                        <tr>
                            <td width="30%">Email Pribadi</td>
                            <td width="5%" style="text-align:center">:</td>
                            <td width="65%"><?= $info_profile['email'];?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td width="30%">Foto</td>
                            <td width="5%" style="text-align:center">:</td>
                            <td width="65%"><?php
                        if (!empty($info_profile['foto'])){
                            echo "<img src='".base_url('uploads/pics/'.$info_profile['foto'])."' width='30%' height='30%' />";
                        }else{
                            echo "";
                        }
                         ?></td>
                        </tr>
                        <tr>
                            <td width="30%">Keahlian</td>
                            <td width="5%" style="text-align:center">:</td>
                            <td width="65%"><?= $info_profile['keahlian'];?></td>
                        </tr>
                        <tr>
                            <td width="30%">Google Scholar</td>
                            <td width="5%" style="text-align:center">:</td>
                            <td width="65%"><?php
                        if (!empty($info_profile['scholar_id'])){
                        ?>
                                <a href="https://scholar.google.com/citations?user=<?= $info_profile['scholar_id'];?>"
                                    target="_blank"><?= $info_profile['scholar_id'];?></a>
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
                        if (!empty($info_profile['scopus_id'])){
                        ?>
                                <a href="https://www.scopus.com/authid/detail.uri?authorId=<?= $info_profile['scopus_id'];?>"
                                    target="_blank"><?= $info_profile['scopus_id'];?></a>
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
                        if (!empty($info_profile['orcid_id'])){
                        ?>
                                <a href="https://orcid.org/<?= $info_profile['orcid_id'];?>"
                                    target="_blank"><?= $info_profile['orcid_id'];?></a>
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
                        if (!empty($info_profile['sinta_id'])){
                        ?>
                                <a href="https://sinta3.kemdikbud.go.id/authors/profile/<?= $info_profile['sinta_id'];?>"
                                    target="_blank"><?= $info_profile['sinta_id'];?></a>
                                <?php
                        }else{
                            echo "Belum ada";
                        }
                        ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
                        <td width="65%"><?= $info_profile['tempatkerja'];?></td>
                    </tr>
                    <tr>
                        <td width="30%">Alamat Kantor</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $info_profile['alamatkerja'];?></td>
                    </tr>
                    <tr>
                        <td width="30%">Nomor Telepon Kantor</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $info_profile['telpkerja'];?></td>
                    </tr>
                    <tr>
                        <td width="30%">Email Kantor</td>
                        <td width="5%" style="text-align:center">:</td>
                        <td width="65%"><?= $info_profile['emailkerja'];?></td>
                    </tr>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <?php
        }
        ?>
        <!-- /.card-header -->
        <div class="card">
            <div class="card-body">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-pendidikan-tab" data-toggle="pill"
                                    href="#custom-tabs-one-pendidikan" role="tab"
                                    aria-controls="custom-tabs-one-pendidikan" aria-selected="true">Pendidikan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-pekerjaan-tab" data-toggle="pill"
                                    href="#custom-tabs-one-pekerjaan" role="tab"
                                    aria-controls="custom-tabs-one-pekerjaan" aria-selected="false">Pekerjaan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-organisasi-tab" data-toggle="pill"
                                    href="#custom-tabs-one-organisasi" role="tab"
                                    aria-controls="custom-tabs-one-organisasi" aria-selected="false">Organisasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-publikasi-tab" data-toggle="pill"
                                    href="#custom-tabs-one-publikasi" role="tab"
                                    aria-controls="custom-tabs-one-publikasi" aria-selected="false">Publikasi</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-pendidikan" role="tabpanel"
                                aria-labelledby="custom-tabs-one-pendidikan-tab">

                                <?php if(isset($info_pend)&&($info_pend=="Data kosong")){
    ?>

                                <div class="alert alert-danger">Data pendidikan belum ada.</div>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                    $i=1; 
                    foreach ($info_pend as $pend) : 
                    ?>
                                        <tr>
                                            <td><?php echo $i;$i++;?></td>
                                            <td><?= $pend['jenjang'];?></td>
                                            <td><?= $pend['namauniv'];?></td>
                                            <td><?= $pend['fakultas'];?></td>
                                            <td><?= $pend['jurusan'];?></td>
                                            <td><?= $pend['thnmasuk']." - ".$pend['thnlulus'] ?></td>
                                        </tr>
                                        <?php 
                    endforeach 
                    ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-pekerjaan" role="tabpanel"
                                aria-labelledby="custom-tabs-one-pekerjaan-tab">

                                <?php if(isset($info_kerja)&&($info_kerja=="Data kosong")){
    ?>

                                <div class="alert alert-danger">Data pengalaman kerja belum ada.</div>
                                <?php }else{ ?>

                                <table id="tabledata" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Instansi/Tempat Kerja</th>
                                            <th>Jabatan</th>
                                            <th>Periode</th>
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
                                        </tr>
                                        <?php 
                    endforeach 
                    ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-organisasi" role="tabpanel"
                                aria-labelledby="custom-tabs-one-organisasi-tab">

                                <?php if(isset($info_org)&&($info_org=="Data kosong")){
    ?>

                                <div class="alert alert-danger">Data Organisasi belum ada.</div>
                                <?php }else{ ?>

                                <table id="tabledata" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Organisasi</th>
                                            <th>Jabatan</th>
                                            <th>Periode</th>
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
                                        </tr>
                                        <?php 
                    endforeach 
                    ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-publikasi" role="tabpanel"
                                aria-labelledby="custom-tabs-one-publikasi-tab">
                                <?php if(isset($info_pub)&&($info_pub=="Data kosong")){
                    ?>

                                <div class="alert alert-danger">Data publikasi belum ada.</div>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $i=1; 
                                    foreach ($info_pub as $pub) : 
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
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->

<?= $this->endSection();?>