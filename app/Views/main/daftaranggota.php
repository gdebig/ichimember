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
                    ?>
                    <table id="tabledata" class="table table1 table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Anggota</th>
                                <th>Nama Lengkap</th>
                                <th>Regional</th>
                                <th>Keahlian</th>
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
                                        href="<?= base_url();?>/home/lihatprofile/<?= $member['user_id'];?>"><?= $member['namalengkap'];?></a>
                                </td>
                                <td><?= $member['dpr_nama'];?></td>
                                <td><?= $member['keahlian'];?></td>
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