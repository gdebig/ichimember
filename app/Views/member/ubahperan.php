<?= $this->extend('member/template');?>

<?= $this->section('content');?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div>
                    <ul>
                        <?php
                        if ($tipe_user[0]=='y'){
                        ?>
                        <li><a href="<?= base_url();?>/anggota/peranproses/superadmin">Super Admin</a></li>
                        <?php
                        }
                        ?>
                        <?php
                        if ($tipe_user[1]=='y'){
                        ?>
                        <li><a href="<?= base_url();?>/anggota/peranproses/admin">Admin</a></li>
                        <?php
                        }
                        ?>
                        <?php
                        if ($tipe_user[2]=='y'){
                        ?>
                        <li><a href="<?= base_url();?>/anggota/peranproses/anggota">Anggota</a></li>
                        <?php
                        }
                        ?>
                        <?php
                        if ($tipe_user[3]=='y'){
                        ?>
                        <li><a href="<?= base_url();?>anggota/peranproses/calon">Calon Anggota</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<?= $this->endSection();?>