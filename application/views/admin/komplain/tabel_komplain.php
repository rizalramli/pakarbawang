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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 1%;">No.</th>
                                    <th style="width: 8%;">Nama Pengguna</th>
                                    <th style="width: 8%;">Saran / Masukan</th>
                                    <th style="width: 2%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($komplain as $u) {
                                ?>
                                    <tr>
                                        <td align="center"><?php echo $no++; ?>.</td>
                                        <td><?php echo $u->nama_user ?></td>
                                        <td><?php echo $u->komplain_user ?></td>
                                        <td style="text-align: center;">
                                            <a href="#" title="Ubah" data-toggle="modal" data-target="#modal_ubah<?php echo $u->id_komplain; ?>">
                                                <button class="btn-sm btn-primary">
                                                    Lihat
                                                </button>
                                            </a>
                                            <a onclick="return confirm('Hapus data <?php echo $u->nama_user; ?>?')" href="<?php echo base_url('komplain/hapusData/' . $u->id_komplain) ?>" title="Hapus">
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
foreach ($komplain as $editData) {
?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modal_ubah<?php echo $editData->id_komplain; ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url('Komplain/edit') ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group ">
                            <label class="col-sm-4 control-label">Nama Pengguna</label>
                            <div class="col-sm-12">
                                <input type="hidden" disabled="" value="<?php echo $editData->id_komplain; ?>" name="id">
                                <input type="text" disabled="" name="nama_user" id="" class="form-control col-md-12" value="<?php echo $editData->nama_user; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="col-sm-4 control-label">Saran / Masukan Pengguna</label>
                            <div class="col-sm-12">
                                <textarea name="komplain" disabled="" class="form-control" rows="10"><?php echo $editData->komplain_user; ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" data-dismiss="modal" aria-hidden="true" class="btn btn-primary" value="Oke">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>