<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!--WARNA PADA MENU-->
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">

    <span class="brand-text font-weight-light" style="color: #0099cc
    ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>SISTEM PAKAR</b></span>
  </a>

  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
        <li class="nav-item">
          <a href="<?php echo site_url('Auth'); ?>" class="nav-link">
            <i class="fa fa-home nav-icon"></i>
            <p>Beranda</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('Penyakit'); ?>" class="nav-link">
            <i class="fa fa-bug nav-icon"></i>
            <p>Data Hama Penyakit</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('Gejala'); ?>" class="nav-link">
            <i class="fa fa-eye-dropper nav-icon"></i>
            <p>Data Gejala</p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="<?php echo site_url('Basis'); ?>" class="nav-link">
            <i class="fa fa-recycle nav-icon"></i>
            <p>Data Aturan</p>
          </a>
        </li> -->
        <li class="nav-item">
          <a href="<?php echo site_url('Konsultasi'); ?>" class="nav-link">
            <i class="fa fa-history nav-icon"></i>
            <?php if ($jml_riwayat == '0') {
            } else { ?>
              <span class="badge badge-info right"><?php echo $jml_riwayat; ?></span>
            <?php
            } ?>
            <p>Data Riwayat</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('Tentang'); ?>" class="nav-link">
            <i class="fa fa-info nav-icon"></i>
            <p>Tentang</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('Bantuan'); ?>" class="nav-link">
            <i class="fa fa-question nav-icon"></i>
            <p>Petunjuk</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo site_url('Komplain'); ?>" class="nav-link">
            <i class="fa fa-file nav-icon"></i>
            <?php if ($jml_komplain == '0') {
            } else { ?>
              <span class="badge badge-info right"><?php echo $jml_komplain; ?></span>
            <?php
            } ?>
            <p>Saran Pengguna</p>
          </a>
        </li>
        <li class="nav-item">
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
</aside>