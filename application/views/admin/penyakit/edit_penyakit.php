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
            <div class="card mb-3">
                <div class="card-header">
                    <a href="<?php echo site_url('Penyakit/') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('Penyakit/baruEdit'); ?>" method="post" enctype="multipart/form-data">
                        <?php
                        foreach ($penyakit as $data) {
                        ?>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">Kode</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" value="<?php echo $data->id_penyakit; ?>" name="id_penyakit">
                                            <input type="hidden" value="<?php echo $data->Kd_penyakit; ?>" name="kode_penyakit">
                                            <input type="hidden" value="<?php echo $data->kategori; ?>" name="kategori_tidak_diubah">
                                            <input type="hidden" value="<?php echo $data->Kd_gejala; ?>" name="kode_gejala_tidak_diubah">
                                            <input class="form-control <?php echo form_error('kode') ? 'is-invalid' : '' ?>" readonly type="text" name="kode" min="0" placeholder="" value="<?php echo $data->Kd_penyakit; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Hama Penyakit</label>
                                        <div class="col-sm-8">
                                            <input class="form-control <?php echo form_error('namapenyakit') ? 'is-invalid' : '' ?>" readonly type="text" name="namapenyakit" value="<?php echo $data->Nm_penyakit; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-sm-2 control-label">Definisi</label>
                                        <div class="col-sm-8">
                                            <input type="type" class="form-control <?php echo form_error('Definisi') ? 'is-invalid' : '' ?>" readonly name="Definisi" value="<?php echo $data->Definisi; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Kategori</label>
                                        <div class="col-sm-8">
                                            <select name="kategori" id="" class="form-control col-sm-5">
                                                <option value="">--Pilih--</option>
                                                <option value="Hama" <?php
                                                                        if ($data->kategori == 'Hama') {
                                                                            echo 'Selected';
                                                                        }
                                                                        ?>>Hama</option>
                                                <option value="Penyakit" <?php
                                                                            if ($data->kategori == 'Penyakit') {
                                                                                echo 'Selected';
                                                                            }
                                                                            ?>>Penyakit</option>
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
                                            <input type="type" class="form-control <?php echo form_error('Saran') ? 'is-invalid' : '' ?>" readonly name="Saran" value="<?php echo $data->Saran; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Ubah Foto</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" value="<?php echo $data->foto; ?>" name="foto_tidak_diubah">
                                            <input type="file" class="control <?php echo form_error('Upload Image') ? 'is-invalid' : '' ?>" name="pic_file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="col-sm-1 control-label">Gejala </label>
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
                                                    <input type="hidden" name="kdgejala_tetap" value="<?php echo $data->Kd_gejala; ?>">
                                                    <?php
                                                    foreach ($gejalaberdasarkanpenyakit as $u) {
                                                    ?>
                                                        <tr>
                                                            <td style="text-align: center;"><input type="radio" id="" name="kdgejala" value="<?php echo $u->Kd_gejala; ?>" <?php if ($data->Kd_gejala == $u->Kd_gejala) {
                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                } ?>></td>
                                                            <td><?php echo $u->Kd_gejala; ?></td>
                                                            <td><?php echo $u->Nm_gejala; ?></td>
                                                        </tr>
                                                    <?php
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <?php echo $this->session->flashdata('gejalaKosong') ?> -->
                            <div class="col justify-content-center">
                                <div class="col-12 col-sm-12 col-lg">
                                    <div class="single-benefits-area wow fadeInDown mb-10" data-wow-delay="80ms">
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-primary col-md-2" value="Simpan Data">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
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