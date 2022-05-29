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
                                konfirmasi dokumen pada link konfirmasi. Anda akan resmi menjadi anggota ICHI bila
                                dokumen anda telah <strong><u>DIVERIFIKASI</u></strong> oleh admin. </p>
                        </div>
                        <?php
                        }else{
                        ?>
                        <div class="card-body">
                            <p>Selamat datang anggota Ikatan Cendekiawan Hindu Indonesia. Mari terus berkarya untuk umat
                                Hindu dan bangsa Indonesia.</p>
                        </div>
                        <?php
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