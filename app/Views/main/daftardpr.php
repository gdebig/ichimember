<?= $this->extend('main/template');?>

<?= $this->section('content');?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar DPP/DPR ICHI</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active">Daftar DPP/DPR</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    <?php
                    if ((isset($info_dpr))&&($info_dpr=="kosong")){
                        echo "Belum ada data anggota";
                    }else{
                    ?>
                    <table id="tabledata" class="table table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode DPP/DPR</th>
                                <th>Nama DPP/DPR</th>
                                <th>Alamat dan Nomor Kontak</th>
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
                                <td><?php
                                echo $dpr['alamat']."<br />Email Resmi: ".$dpr['email']."<br />No Telepon: ".$dpr['notelp'];
                                ?></td>
                            </tr>
                            <?php 
                                    endforeach 
                                    ?>
                        </tbody>
                    </table>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </section>

</div>

<?= $this->endSection();?>