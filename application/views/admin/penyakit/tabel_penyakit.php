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
                            <a href="<?php echo site_url('Penyakit/formTambahPenyakit'); ?>" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 1%;">No.</th>
                                    <th style="width: 3%;">Kode</th>
                                    <th style="width: 6%;">Hama Penyakit</th>
                                    <th style="width: 6%;">Gejala</th>
                                    <th style="width: 3%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($penyakit as $u) {
                                ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $no++; ?>.</td>
                                        <td><?php echo $u->Kd_penyakit; ?></td>
                                        <td>
                                            <?php echo $u->Nm_penyakit; ?>
                                        </td>
                                        <td><?php echo $u->Nm_gejala; ?></td>
                                        <td style="text-align: center;">
                                            <a href="<?php echo site_url('Penyakit/ubah/' . $u->id_penyakit); ?>"><button class="btn-sm btn-primary">Ubah</button></a>
                                            <a onclick="return confirm('Hapus data <?php echo $u->Nm_penyakit; ?>?')" href="<?php echo base_url('Tabelpenyakit/hapusContoh/' . $u->Kd_penyakit) ?>" title="Hapus">
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
            <form class="form-horizontal" method="post" action="<?php echo site_url('penyakit/file_data') ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Kode</label>
                        <div class="col-sm-8">
                            <input class="form-control <?php echo form_error('kode') ? 'is-invalid' : '' ?>" type="text" name="kode" min="0" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Hama Penyakit</label>
                        <div class="col-sm-8">
                            <input class="form-control <?php echo form_error('namapenyakit') ? 'is-invalid' : '' ?>" type="text" name="namapenyakit" min="0" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Definisi</label>
                        <div class="col-sm-8">
                            <input type="type" class="form-control <?php echo form_error('Definisi') ? 'is-invalid' : '' ?>" name="Definisi" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Gejala</label>
                        <div class="col-sm-8">
                            <input type="type" class="form-control <?php echo form_error('Gejala') ? 'is-invalid' : '' ?>" name="Gejala" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Solusi</label>
                        <div class="col-sm-8">
                            <input type="type" class="form-control <?php echo form_error('Saran') ? 'is-invalid' : '' ?>" name="Saran" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Foto</label>
                        <div class="col-sm-8">
                            <input type="file" class="control <?php echo form_error('Upload Image') ? 'is-invalid' : '' ?>" name="pic_file" id="pic_file">
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
foreach ($penyakit as $editData) {
?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_ubah<?php echo $editData->Kd_penyakit; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah data <?php echo $editData->Kd_penyakit ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo site_url('penyakit/edit') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input class="form-control <?php echo form_error('kode') ? 'is-invalid' : '' ?>" type="hidden" name="kode" min="0" value="<?php echo $editData->Kd_penyakit; ?>" />
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Hama Penyakit</label>
                            <div class="col-sm-12">
                                <input class="form-control <?php echo form_error('kode') ? 'is-invalid' : '' ?>" type="text" name="namapenyakit" min="0" value="<?php echo $editData->Nm_penyakit; ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Definisi</label>
                            <div class="col-sm-12">
                                <textarea name="Definisi" class="form-control" rows="3"><?php echo $editData->Definisi; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Gejala</label>
                            <div class="col-sm-12">
                                <textarea name="Gejala" class="form-control" rows="3"><?php echo $editData->Gejala; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Solusi</label>
                            <div class="col-sm-12">
                                <textarea name="Saran" class="form-control" rows="3"><?php echo $editData->Saran; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Foto</label>
                            <div class="col-sm-12">
                                <input type="hidden" name="foto" value="<?php echo $editData->foto; ?>">
                                <input type="file" class="control <?php echo form_error('Upload Image') ? 'is-invalid' : '' ?>" name="pic_file" id="pic_file">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Ubah Data">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>