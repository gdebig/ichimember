<?= $this->extend('main/template');?>

<?= $this->section('content');?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Anggota</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Anggota</li>
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
                    if ((isset($info_member))&&($info_member=="kosong")){
                        echo "Belum ada data anggota";
                    }else{
                        foreach($info_member as $member):
                    ?>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                <?= $member['dpr_nama'];?>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b><?= $member['namalengkap'];?></b></h2>
                                        <p class="text-muted text-sm"><b>Keahlian: </b> <?= $member['keahlian'];?>
                                        </p>
                                        <?php
                                        if (isset($member['bagidata'])&&($member['bagidata']=="Ya")){
                                        ?>
                                        <p class="text-muted text-sm"><b>Kontak Pribadi: </b></p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-building"></i></span> Alamat Rumah:
                                                <?= $member['alamat'];?></li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-phone"></i></span> Telp Pribadi:
                                                <?= $member['notelp'];?></li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-envelope"></i></span> Email Pribadi:
                                                <?= $member['email'];?></li>
                                        </ul>
                                        <p class="text-muted text-sm"><b>Kontak Kantor: </b></p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-info"></i></span><?= $member['tempatkerja'];?>
                                            </li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-building"></i></span> Alamat Kantor:
                                                <?= $member['alamatkerja'];?></li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-phone"></i></span> Telp Kantor:
                                                <?= $member['telpkerja'];?></li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-envelope"></i></span> Email Kantor:
                                                <?= $member['emailkerja'];?></li>
                                        </ul>
                                        <?php
                                        }else{
                                        ?>
                                        <p><b>Kontak Kantor: </b></p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-info"></i></span><?= $member['tempatkerja'];?>
                                            </li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-building"></i></span> Alamat Kantor:
                                                <?= $member['alamatkerja'];?></li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-phone"></i></span> Telp Kantor:
                                                <?= $member['telpkerja'];?></li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-envelope"></i></span> Email Kantor:
                                                <?= $member['emailkerja'];?></li>
                                        </ul>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-5 text-center">
                                        <?php
                                        if (!empty($member['foto'])){
                                        ?>
                                        <img src="<?= base_url();?>/uploads/pics/<?= $member['foto'];?>" height="128px"
                                            width="128px" alt="<?= $member['namalengkap'];?>"
                                            class="img-circle img-fluid">
                                        <?php
                                        }else{
                                        ?>
                                        <img src="<?= base_url();?>/uploads/pics/no_pic.jpg" height="128px"
                                            width="128px" alt="<?= $member['namalengkap'];?>"
                                            class="img-circle img-fluid">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="<?= base_url();?>/home/lihatprofile/<?= $member['user_id'];?>"
                                        class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> Lihat Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    endforeach;
                    }
                    ?>
                </div>
            </div>

            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        <li class="page-item active"><a class="page-link" href="<?= base_url();?>/home/anggota">Lihat
                                Semua Anggota</a></li>
                    </ul>
                </nav>
            </div>

        </div>

    </section>

</div>

<?= $this->endSection();?>