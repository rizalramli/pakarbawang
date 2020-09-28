<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Tabel Hama</b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Contoh</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <a href="<?php echo base_url('Contoh/formContoh') ?>">
                                <button type="button" class="btn btn-block btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center; width: 1%;">No.</th>
                                    <th style="width: 15%;">ID</th>
                                    <th>Nama</th>
                                    <th style="width: 15%;">Jenis Kelamin</th>
                                    <th style="text-align: center; width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($contoh as $u) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $no++; ?>.</td>
                                        <td><?php echo $u->contoh_id; ?></td>
                                        <td><?php echo $u->contoh_nama; ?></td>
                                        <td><?php echo $u->contoh_jenis_kelamin; ?></td>
                                        <td style="text-align: center;">
                                            <a href="<?php echo base_url('Contoh/editContoh/'.$u->contoh_id)?>" title="Ubah">
                                                <button class="btn-sm btn-default">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a onclick="return confirm('Hapus data <?php echo $u->contoh_nama; ?>?')" href="<?php echo base_url('Contoh/hapusContoh/'.$u->contoh_id)?>" title="Hapus">
                                                <button class="btn-sm btn-default">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->