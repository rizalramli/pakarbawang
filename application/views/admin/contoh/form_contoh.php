<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <marquee direction="left" scrollamount="5" align="center">Selamat Datang, di Sistem Pakar Diagnosa Hama dan Penyakit Bawang Merah Metode Fuzzy Tsukamoto Berbasis WEB </marquee>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div id="content-wrapper">

        <div class="container-fluid">



            <div class="card mb-3">
                <div class="card-header">
                    <a href="<?php echo site_url('Contoh/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('Contoh/tambahData') ?>" method="post">
                        <div class="form-group">
                            <label for="name">ID</label>
                            <!-- MENAMPILKAN UNIQID -->
                            <div class="row">
                                <input class="form-control col-md-4" readonly type="text" name="id" placeholder="Hama kodehama" value="<?php echo uniqid(); ?>" />
                                FORM ID OTOMATIS TERISI UNIQ ID
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price">NAMA</label>
                            <input class="form-control col-md-4" type="text" name="nama" min="0" placeholder="masukan nama" />
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control select2 col-md-4" name="jenisKelamin">
                                <option selected="selected">Pilih</option>
                                <option value="Laki-laki">Laki - laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <!-- <input class="btn btn-success" type="submit" name="btn" value="Save" /> -->
                        <input type="submit" class="btn btn-success" value="Tambah">
                    </form>

                </div>

                <div class="card-footer small text-muted">
                    * required fields
                </div>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>