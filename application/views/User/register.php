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
    <link rel="icon" href="<?php echo base_url('assets/alazea-gh-pages/'); ?>img/core-img/icon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('assets/alazea-gh-pages/'); ?>style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="<?php echo base_url('assets/alazea-gh-pages/'); ?>img/core-img/icon.png" alt="">
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
                            <div class="top-header-meta">
                            </div>

                            <!-- Top Header Content -->
                            <div class="top-header-meta d-flex">
                                <!-- Login -->
                                <div class="login">
                                    <a href="<?php echo base_url('Login/') ?>"><i class="fa fa-user" aria-hidden="true"></i> <span>Login</span></a>
                                </div>
                                <!-- Cart -->
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
                        <a href="index.html" class="nav-brand"><img src="<?php echo base_url('assets/alazea-gh-pages/'); ?>img/core-img" alt=""></a>

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

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">

        <div class="hero-post-slides owl-carousel">

            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(../assets/alazea-gh-pages/img/bg-img/bg1.jpg);"></div>
                <div class="container h-0">
                    <div class="row h-0 align-items-center">
                        <div class="col-12">
                            <!-- Post Content -->
                            <div class="hero-slides-content text-center">
                                <br>
                                <br>
                                <br>
                                <form action="<?php echo base_url('login/tambahRegister') ?>" method="post">
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <center>
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control col-sm-5" required placeholder="Username" name="username" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </center>
                                            </div>
                                            <div class="col-12">
                                                <center>
                                                    <div class="col-5">
                                                        <div class="form-group">
                                                            <input type="password" name="password" required class="form-control col-sm-5" placeholder="Password" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </center>
                                            </div>
                                            <div class="col-12">
                                                <center>
                                                    <div class="form-group">
                                                        <input type="submit" name="" value="Tambah" class="btn btn-success">
                                                        <a href="<?php echo base_url('Login/') ?>" class="btn btn-danger">Kembali</a>
                                                    </div>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                    <i class="fa fa-facebook" aria-hidden="true"></i></a>
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

    <!-- show hide password -->
    <!-- <script src="<?php echo base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script> -->
    <script>
        $(".toggle-password").click(function() {

            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?php echo base_url('assets/alazea-gh-pages/'); ?>js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url('assets/alazea-gh-pages/'); ?>js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url('assets/alazea-gh-pages/'); ?>js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?php echo base_url('assets/alazea-gh-pages/'); ?>js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?php echo base_url('assets/alazea-gh-pages/'); ?>js/active.js"></script>
</body>

</html>