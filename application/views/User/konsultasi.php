<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <title>Sistem Pakar Bawang Merah</title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('assets/alazea-gh-pages/') ?>img/core-img/icon.ico">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('assets/alazea-gh-pages/') ?>style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="<?php echo base_url('assets/alazea-gh-pages/') ?>img/core-img/icon.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->
                            <!-- Top Header Content -->
                            <div class="top-header-meta">
                            </div>
                            <div class="top-header-meta d-flex">
                                <!-- Login -->
                                <div class="login">
                                    <?php
                                    if ($this->session->userdata("status") == '') {
                                    ?>
                                        <a href="<?php echo base_url('Login/') ?>"><i class="fa fa-user" aria-hidden="true"></i> <span>Login</span></a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('Login/logout/') ?>"><i class="fa fa-user" aria-hidden="true"></i> <span>(<?php echo $this->session->userdata("nama"); ?>) Logout</span></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="index.html" class="nav-brand"><img src="<?php echo base_url('assets/alazea-gh-pages/') ?>img/core-img" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="<?php echo base_url('userbaruu/index') ?>">Beranda</a></li>
                                    <li><a href="<?php echo base_url('userbaruu/tentang') ?>">Tentang</a></li>
                                    <li><a href="<?php echo base_url('userbaruu/info') ?>">Info Hama Penyakit</a></li>
                                    <li><a href="<?php echo base_url('userbaruu/konsultasi') ?>">Konsultasi</a></li>
                                    <li><a href="<?php echo base_url('userbaruu/contact') ?>">Contact Us</a></li>
                                    <li><a href="<?php echo base_url('userbaruu/tabel_bantuan') ?>">Petunjuk</a></li>
                                </ul>

                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(../assets/alazea-gh-pages/img/bg-img/bg1.jpg);">
            <h2>KONSULTASI</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('userbaruu/index') ?>"><i class="fa fa-home"></i><b>Beranda</b></a></li>
                            <li style="color: black" class="breadcrumb-item active" aria-current="page">Konsultasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### About Area Start ##### -->
    <section class="about-us-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="row">
                        <div class="col-12">
                            <div class="benefits-thumbnail mb-30">
                                <div class="card-body table-responsive p-0">
                                    <!-- <form action="<?php echo site_url('userbaruu/tambahGejalaKonsultasi'); ?>" method="post">
                                        Nama: <input type="text" class="form-control col-sm-4" placeholder="" name="username"> -->
                                    <form action="<?php echo site_url('userbaruu/tambahGejalaKonsultasi'); ?>" method="post">
                                        <input type="hidden" value="<?php echo $this->session->userdata("nama"); ?>" name="username">
                                        <br>
                                        <table class="table table-hover table-bordered" id="example4">
                                            <thead style="background-color: #cccccc;">
                                                <?php echo $this->session->flashdata('gejalaKosong') ?>
                                                <tr>
                                                    <th style="color: black" class="text-center" style="width: 6%;">#</th>
                                                    <th style="color: black"><b>Kode Gejala</b></th>
                                                    <th style="color: black"><b>Nama Gejala</b></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($gejala as $u) {
                                                ?>
                                                    <tr>
                                                        <form action="<?php echo site_url('userbaruu/tambahGejalaKonsultasi'); ?>" method="post">
                                                            <th class="text-center"><input class="" id="checkItem" name="gejala[]" type="checkbox" value="<?php echo $u->Kd_gejala; ?>"></th>
                                                            <!-- <input type="hidden" name="kode[]" value="<?php echo $u->Kd_gejala ?>" name=""> -->
                                                            <td style="color: black"><?php echo $u->Kd_gejala; ?></td>
                                                            <td style="color: black"><?php echo $u->Nm_gejala; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col justify-content-center">
            <div class="col-12 col-sm-12 col-lg">
                <div class="single-benefits-area wow fadeInDown mb-10" data-wow-delay="80ms">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success float-center col-sm-2" name="save">Submit</button>
                        <!-- <input type="submit" class="btn btn-success float-center col-sm-2" value="Next"> -->
                        </form>
                        <!-- tutup form pada tabel -->
                        <!-- <a href="<?php echo site_url('User/identifikasi') ?>" class="btn btn-success">next</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img" style="background-image: url(../assets/alazea-gh-pages/img/bg-img/2.jpg);">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>KONTAK</h5>
                            </div>
                            <div class="contact-information">
                                <p><span>Alamat:</span> Jl. Raya Dringu No. 81, Pabean, Kec. Dringu, Probolinggo, Jawa Timur 67271</p>
                                <p><span>Telp:</span> +62335 421834</p>
                                <p><span>Email:</span> distanhut@lamongan.go.id</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>Sosial Media</h5>
                            </div>
                            <div class="social-info">
                                <a href="https://m.facebook.com/pages/category/Local-Business/Dinas-Ketahanan-Pangan-dan-Pertanian-Kabupaten-Probolinggo-1319513671491055/">
                                    <i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="border-line"></div>
                    </div>
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite-text">
                            
                        <p>&copy;
                                Copyright <a href="">Ninis Septia Masulah</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?php echo base_url('assets/alazea-gh-pages/') ?>js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url('assets/alazea-gh-pages/') ?>js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url('assets/alazea-gh-pages/') ?>js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?php echo base_url('assets/alazea-gh-pages/') ?>js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?php echo base_url('assets/alazea-gh-pages/') ?>js/active.js"></script>
</body>

</html>