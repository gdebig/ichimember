<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div>

                    <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif;?>
                    <!-- /.card -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Umum</h3>
                        </div>
                        <!-- /.card-header -->
                        <?php
                        if ($confirm=="tidak"){
                        ?>
                        <div class="card-body">
                            <p>Terima kasih telah melakukan pendaftaran anggota Ikatan Cendekiawan Hindu Indonesia.
                                Untuk menyelesaikan proses pendaftaran, anda perlu melengkapi dokumen-dokumen sesuai
                                link yang terdapat di sebelah kiri. Setelah selesai mengisi, kemudian melakukan
                                <strong><u>KONFIRMASI</u></strong> dokumen pada <a
                                    href="<?= base_url();?>/anggota/konfirmasi">link konfirmasi</a>. Anda akan resmi
                                menjadi anggota ICHI bila
                                dokumen anda telah <strong><u>DIVERIFIKASI</u></strong> oleh admin.
                            </p>
                            <p>Status dokumen anda:</p>
                            <ul>
                                <li><?php
                                    echo $adaprofile == "Ada" ? '<span class="bg-success">Data Profile <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Profile <i class="fas fa-times"></i></span';
                                ?></li>
                                <li><?php
                                    echo $adakerja == "Ada" ? '<span class="bg-success">Data Pengalaman Kerja <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Pengalaman Kerja <i class="fas fa-times"></i></span';
                                ?></li>
                                <li><?php
                                    echo $adaorg == "Ada" ? '<span class="bg-success">Data Pengalaman Organisasi <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Pengalmaan Organisasi <i class="fas fa-times"></i></span';
                                ?></li>
                                <li><?php
                                    echo $adapend == "Ada" ? '<span class="bg-success">Data Pendidikan <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Pendidikan <i class="fas fa-times"></i></span';
                                ?></li>
                                <li><?php
                                    echo $adapub == "Ada" ? '<span class="bg-success">Data Publikasi <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Publikasi <i class="fas fa-times"></i></span';
                                ?></li>
                            </ul>
                        </div>
                        <?php
                        }else{
                            if ($tipe_user[3] == 'y'){
                        ?>
                        <div class="card-body">
                            <p>Terima kasih anda telah melakukan konfirmasi pendaftaran anggota Ikatan Cendekiawan Hindu
                                Indonesia. Saat ini data pendaftaran anda sedang <strong><u>DIVERIFIKASI</u></strong>
                                oleh
                                Admin ICHI.</p>
                            <p>Status dokumen anda:</p>
                            <ul>
                                <li><?php
                                    echo $adaprofile == "Ada" ? '<span class="bg-success">Data Profile <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Profile <i class="fas fa-times"></i></span';
                                ?></li>
                                <li><?php
                                    echo $adakerja == "Ada" ? '<span class="bg-success">Data Pengalaman Kerja <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Pengalaman Kerja <i class="fas fa-times"></i></span';
                                ?></li>
                                <li><?php
                                    echo $adaorg == "Ada" ? '<span class="bg-success">Data Pengalaman Organisasi <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Pengalmaan Organisasi <i class="fas fa-times"></i></span';
                                ?></li>
                                <li><?php
                                    echo $adapend == "Ada" ? '<span class="bg-success">Data Pendidikan <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Pendidikan <i class="fas fa-times"></i></span';
                                ?></li>
                                <li><?php
                                    echo $adapub == "Ada" ? '<span class="bg-success">Data Publikasi <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Publikasi <i class="fas fa-times"></i></span';
                                ?></li>
                            </ul>
                        </div>
                        <?php
                            }else{
                        ?>
                        <div class="card-body">
                            <p>Selamat datang anggota Ikatan Cendekiawan Hindu Indonesia. Mari terus berkarya untuk umat
                                Hindu dan bangsa Indonesia.</p>
                            <p>Status dokumen anda:</p>
                            <ul>
                                <li><?php
                                    echo $adaprofile == "Ada" ? '<span class="bg-success">Data Profile <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Profile <i class="fas fa-times"></i></span';
                                ?></li>
                                <li><?php
                                    echo $adakerja == "Ada" ? '<span class="bg-success">Data Pengalaman Kerja <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Pengalaman Kerja <i class="fas fa-times"></i></span';
                                ?></li>
                                <li><?php
                                    echo $adaorg == "Ada" ? '<span class="bg-success">Data Pengalaman Organisasi <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Pengalmaan Organisasi <i class="fas fa-times"></i></span';
                                ?></li>
                                <li><?php
                                    echo $adapend == "Ada" ? '<span class="bg-success">Data Pendidikan <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Pendidikan <i class="fas fa-times"></i></span';
                                ?></li>
                                <li><?php
                                    echo $adapub == "Ada" ? '<span class="bg-success">Data Publikasi <i class="fas fa-check"></i></span>' : '<span class="bg-danger">Data Publikasi <i class="fas fa-times"></i></span';
                                ?></li>
                            </ul>
                        </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<?= $this->endSection();?>