<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <?php echo $this->session->flashdata('kodeSama') ?>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <a href="#" data-toggle="modal" data-target="#modal_Add" class="btn btn-block btn-primary">
                                <i class="fa fa-plus"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center; width: 1%;">No.</th>
                                    <th style="width: 1%;">Kode Gejala</th>
                                    <th style="width: 8%;">Nama Gejala</th>
                                    <th style="width: 1%;">Nilai CF</th>
                                    <th style="text-align: center; width: 2%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($gejala as $u) {
                                ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $no++; ?>.</td>
                                        <td><?php echo $u->Kd_gejala; ?></td>
                                        <td><?php echo $u->Nm_gejala; ?></td>
                                        <td><?php echo $u->Nilai_CF; ?></td>
                                        <td style="text-align: center;">
                                            <a href="#" title="Ubah" data-toggle="modal" data-target="#modal_ubah<?php echo $u->Kd_gejala; ?>">
                                                <button class="btn-sm btn-primary">
                                                    Ubah
                                                </button>
                                            </a>
                                            <a onclick="return confirm('Hapus data <?php echo $u->Nm_gejala; ?>?')" href="<?php echo base_url('Tabelgejala/hapusContoh/' . $u->Kd_gejala) ?>" title="Hapus">
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

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_Add" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo site_url('gejala/add_gejala') ?>">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Kode Gejala</label>
                        <div class="col-sm-8">
                            <input type="type" required autocomplete="off" class="form-control <?php echo form_error('Kode Gejala') ? 'is-invalid' : '' ?>" name="kodegejala" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Nama Gejala</label>
                        <div class="col-sm-8">
                            <input type="type" required autocomplete="off" class="form-control <?php echo form_error('Nama Gejala') ? 'is-invalid' : '' ?>" name="namagejala" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Nilai CF</label>
                        <div class="col-sm-8">
                            <input type="type" required autocomplete="off" class="form-control <?php echo form_error('nilaicf') ? 'is-invalid' : '' ?>" name="nilaicf" placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Tambah Data">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
foreach ($gejala as $editData) {
?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_ubah<?php echo $editData->Kd_gejala; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah data <?php echo $editData->Kd_gejala; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo site_url('gejala/edit') ?>">
                    <div class="modal-body">
                        <input type="hidden" class="form-control <?php echo form_error('Kode Gejala') ? 'is-invalid' : '' ?>" name="kodegejala" value="<?php echo $editData->Kd_gejala; ?>">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Gejala</label>
                            <div class="col-sm-12">
                                <textarea name="namagejala" required class="form-control" rows="3"><?php echo $editData->Nm_gejala; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nilai CF</label>
                            <div class="col-sm-12">
                                <textarea name="nilai" required autocomplete="off" class="form-control" rows="3"><?php echo $editData->Nilai_CF; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Ubah Data">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>