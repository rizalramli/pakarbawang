<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
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
                        <a href="<?php echo site_url('Konsultasi/print')?>" class="btn btn-default" target="_BLANK"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 1%;">No.</th>
                                    <th style="width: 4%;">Nama Pengguna</th>
                                    <th width="5%">Tanggal</th>
                                    <th style="width: 4%;">Hasil Konsultasi</th>
                                    <th style="width: 3%;">Nilai CF</th>
                                    <th style="width: 3%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($konsultasi as $u) {
                                ?>
                                    <tr>
                                        <td align="center"><?php echo $no++ ?>.</td>
                                        <td><?php echo $u->Nm_user ?></td>
                                        <td><?php echo date('d F Y', strtotime($u->tgl_user)); ?></td>
                                        <td><?php echo $u->Nm_penyakit ?></td>
                                        <td><?php echo $u->Nilai ?></td>
                                        <td style="text-align: center;">
                                            <a href="#" title="Ubah" data-toggle="modal" data-target="#modal_ubah<?php echo $u->id_konsultasi; ?>">
                                                <button class="btn-sm btn-primary">
                                                    Lihat
                                                </button>
                                            </a>
                                            <!-- <a href="<?php echo base_url('Konsultasi/lihat/' . $u->id_konsultasi) ?>" title="Detail">
                                                <button class="btn-sm btn-default">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a> -->
                                            <a onclick="return confirm('Hapus data <?php echo $u->Nm_user; ?>?')" href="<?php echo base_url('Konsultasi/hapusData/' . $u->id_konsultasi) ?>" title="Hapus">
                                                <button class="btn-sm btn-danger"> 
                                                    Hapus
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
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
<?php
foreach ($konsultasi as $editData) {
?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_ubah<?php echo $editData->id_konsultasi; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <?php echo $editData->Nm_user; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control <?php echo form_error('Kode Gejala') ? 'is-invalid' : '' ?>" name="idkonsultasi" value="<?php echo $editData->id_konsultasi; ?>">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Pengguna</label>
                        <div class="col-sm-12">
                            <textarea name="namauser" disabled="" class="form-control" rows="3"><?php echo $editData->Nm_user; ?></textarea>
                            <!-- <input type="type" class="form-control <?php echo form_error('Nama Gejala') ? 'is-invalid' : '' ?>" name="namagejala" placeholder="Cth. Nama..."> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Hasil Konsultasi</label>
                        <div class="col-sm-12">
                            <input type="type" disabled="" class="form-control <?php echo form_error('nama penyakit') ? 'is-invalid' : '' ?>" name="nama_penyakit" value="<?php echo $editData->Nm_penyakit; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Nilai Konsultasi</label>
                        <div class="col-sm-12">
                            <input type="type" disabled="" class="form-control <?php echo form_error('nilai') ? 'is-invalid' : '' ?>" name="nilai" value="<?php echo $editData->Nilai; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" data-dismiss="modal" aria-hidden="true" class="btn btn-primary" value="OK">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>