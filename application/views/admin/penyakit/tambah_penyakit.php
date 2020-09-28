<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div><!-- /.col -->
        </div><!-- /.container-fxluid -->
    </div>
    <div id="content-wrapper">
        <div class="container-fluid">
                <?php echo $this->session->flashdata('kodeSama') ?>
                <?php echo $this->session->flashdata('gejalaKosong') ?>
            <div class="card mb-3">
                <div class="card-header">
                    <a href="<?php echo site_url('Penyakit/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('Penyakit/baruTambahPenyakit'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Kode</label>
                                    <div class="col-sm-8">
                                        <input class="form-control <?php echo form_error('kode') ? 'is-invalid' : '' ?>" autocomplete="off" required type="text" name="kode" min="0" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Hama Penyakit</label>
                                    <div class="col-sm-8">
                                        <input class="form-control <?php echo form_error('namapenyakit') ? 'is-invalid' : '' ?>" autocomplete="off" required type="text" name="namapenyakit" min="0" placeholder="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Definisi</label>
                                    <div class="col-sm-8">
                                        <input type="type" class="form-control <?php echo form_error('Definisi') ? 'is-invalid' : '' ?>" autocomplete="off" required name="Definisi" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Kategori</label>
                                    <div class="col-sm-8">
                                        <select name="kategori" id="" class="form-control col-sm-5">
                                            <option value="Hama">Hama</option>
                                            <option value="Penyakit">Penyakit</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Solusi</label>
                                    <div class="col-sm-8">
                                        <input type="type" class="form-control <?php echo form_error('Saran') ? 'is-invalid' : '' ?>" autocomplete="off" required name="Saran" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-3 control-label">Foto</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="control <?php echo form_error('Upload Image') ? 'is-invalid' : '' ?>" autocomplete="off" required name="pic_file" id="pic_file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-sm-4 control-label">Pilih Gejala :</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 7%; text-align: center;">#</th>
                                            <th>Kode Gejala</th>
                                            <th>Nama Gejala</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($gejala as $u) {
                                        ?>
                                            <tr>
                                                <td style="text-align: center;"><input type="checkbox" id="checkItem" name="gejala[]" value="<?php echo $u->Kd_gejala; ?>"></td>
                                                <td><?php echo $u->Kd_gejala; ?></td>
                                                <td>
                                                    <?php echo $u->Nm_gejala; ?>
                                                    <input type="hidden" value="<?php echo $u->Nm_gejala; ?>" name="namagejala">
                                                </td>
                                            </tr>
                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col justify-content-center">
                            <div class="col-12 col-sm-12 col-lg">
                                <div class="single-benefits-area wow fadeInDown mb-10" data-wow-delay="80ms">
                                    <div class="text-center">
                                        <input type="submit" class="btn btn-primary col-md-2" value="Simpan Data">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->