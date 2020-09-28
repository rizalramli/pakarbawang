<!-- <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
<script src="<?php echo base_url('assets/plugins/ckeditor') ?>/ckeditor.js"></script>
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
            <div class="col-md-12">
                <div class="card card-outline">
                    <div class="card-header">
                        <!--<h3 class="card-title">
                            Data Tentang
                        </h3> -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pad">
                        <form class="form-horizontal" method="post" action="<?php echo site_url('Tentang/edit') ?>">
                            <div class="mb-3">
                                <?php
                                foreach ($tentang as $editData) {
                                ?><input type="hidden" class="form-control <?php echo form_error('Kode Tentang') ? 'is-invalid' : '' ?>" name="id_tentang" value="<?php echo $editData->id_tentang; ?>">
                                    <textarea name="nama_tentang" class="form-control" rows="10"><?php echo $editData->Nm_tentang; ?></textarea>
                                <?php } ?>
                            </div>
                            <p class="text-sm mb-0">
                                <input type="submit" class="btn btn-primary" value="Simpan">
                            </p>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
</div>
<?php
foreach ($tentang as $editData) {
?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_ubah<?php echo $editData->id_tentang; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo site_url('Tentang/edit') ?>">
                    <div class="modal-body">
                        <input type="hidden" class="form-control <?php echo form_error('Kode Tentang') ? 'is-invalid' : '' ?>" name="id_tentang" value="<?php echo $editData->id_tentang; ?>">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Isi tentang</label>
                            <div class="col-sm-12">
                                <!-- <textarea name="nama_tentang" class="form-control" rows="10"><?php echo $editData->Nm_tentang; ?></textarea> -->
                                <textarea name="nama_tentang" class="form-control" rows="10"><?php echo $editData->Nm_tentang; ?></textarea>
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
<script>
    CKEDITOR.replace('nama_tentang');
</script>