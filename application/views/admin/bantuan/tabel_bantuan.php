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
                            <a href="#" data-toggle="modal" data-target="#modal_Add" class="btn btn-block btn-primary">
                                <i class="fa fa-plus"></i> Tambah Data
                                <!-- <button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Tambah Data</button> -->
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-header">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 1%">No</th>
                                    <th style="width: 8%;">Gambar</th>
                                    <th style="width: 15%;">Keterangan</th>
                                    <th style="width: 3%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($bantuan as $u) { // menampilkan data bantuan
                                ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $no++; ?>.</td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#modal_foto<?php echo $u->id_bantuan; ?>"><img width="100%" src="upload/<?php echo $u->foto; ?>" /></a>
                                        </td>
                                        <td>
                                            <?php echo $u->deskripsi; ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="#" title="Ubah" data-toggle="modal" data-target="#modal_ubah<?php echo $u->id_bantuan; ?>">
                                                <button class="btn-sm btn-primary">
                                                    Ubah
                                                </button>
                                            </a>
                                            <a onclick="return confirm('Hapus data <?php echo $u->deskripsi; ?>?')" href="<?php echo base_url('Bantuan/hapusContoh/' . $u->id_bantuan) ?>" title="Hapus">
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
            <form class="form-horizontal" method="post" action="<?php echo base_url('Bantuan/file_data') ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group ">
                        <label class="col-sm-4 control-label">Kategori</label>
                        <div class="col-sm-12">
                            <input type="text" name="kategori" id="" class="form-control col-md-12" value="" required autocomplete="off" placeholder="">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-4 control-label">Deskripsi</label>
                        <div class="col-sm-12">
                            <textarea name="deskripsi" rows="8" class="form-control" required placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="col-sm-4 control-label">Foto</label>
                        <div class="col-sm-12">
                            <input class="col-md-12" type="file" required name="pic_file" id="pic_file" />
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
foreach ($bantuan as $data) {
    $id_bantuan = $data->id_bantuan;
    $foto = $data->foto;
    $nama = $data->deskripsi;
?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_foto<?php echo $id_bantuan; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $nama; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" action="<?php echo base_url('Poliklinik/editPoliklinik') ?>" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <img src="upload/<?php echo $foto; ?>" width="100%" alt="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php }
foreach ($bantuan as $editData) {
?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_ubah<?php echo $editData->id_bantuan; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url('Bantuan/edit') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group ">
                            <label class="col-sm-4 control-label">Kategori</label>
                            <div class="col-sm-12">
                                <input type="hidden" value="<?php echo $editData->id_bantuan; ?>" name="id">
                                <input type="text" name="kategori" id="" required class="form-control col-md-12" value="<?php echo $editData->kategori; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-4 control-label">Deskripsi</label>
                            <div class="col-sm-12">
                                <textarea name="deskripsi" rows="8" required class="form-control"><?php echo $editData->deskripsi; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-4 control-label">Foto</label>
                            <div class="col-sm-12">
                                <input type="hidden" value="<?php echo $editData->foto; ?>" name="foto">
                                <input type="file" class="control" name="pic_file">
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