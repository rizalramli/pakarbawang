<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
      </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><b>Tentang Admin</b></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <?php
            foreach ($profil as $data) {
            ?>
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Pendidikan</strong>
                <p class="text-muted">
                  <?php echo $data->pendidikan; ?>
                </p>
                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Lokasi</strong>
                <p class="text-muted">
                  <?php echo $data->lokasi; ?></p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i> Pekerjaan</strong>
                <p class="text-muted">
                  <?php echo $data->pekerjaan; ?></p>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <b>Profil</b>
              </h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form class="form-horizontal" method="POST" action="<?php echo site_url('Profil/updateData') ?>">
                <?php
                foreach ($profil as $data) {
                ?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="" class="col control-label">NIP</label>
                        <div class="col-sm-12">
                          <input type="hidden" value="<?php echo $data->id_profil; ?>" name="id">
                          <input type="text" class="form-control" placeholder="" value="<?php echo $data->nip; ?>" name="nip">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="" class="col control-label">Nama</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" placeholder="" value="<?php echo $data->nama; ?>" name="nama">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="" class="col control-label">Tanggal Lahir</label>
                        <div class="row">
                          <div class="col-sm-6">
                            <input type="date" class="form-control" placeholder="" value="<?php echo $data->tgl_lahir; ?>" name="tanggal_lahir" style="text-align: center">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="" class="col control-label">Usia</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" value="<?php echo substr(date('Y-m-d'), 0, 4) - substr($data->tgl_lahir, 0, 4); ?>" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="" class="col control-label">Jenis Kelamin</label>
                        <div class="col-sm-12">
                          <select name="jenis_kelamin" id="" class="form-control">
                            <option value="">--Pilih--</option>
                            <option <?php
                                    if ($data->jenis_kelamin == 'l') {
                                      echo 'Selected';
                                    }
                                    ?> value="l">Laki-laki</option>
                            <option <?php
                                    if ($data->jenis_kelamin == 'p') {
                                      echo 'Selected';
                                    }
                                    ?> value="p">Perempuan</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="" class="col control-label">No. Telp/Hp</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" value="<?php echo $data->nmr_telp; ?>" name="no_telp">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col control-label">Alamat</label>
                    <div class="col-sm-12">
                      <textarea name="alamat" id="" rows="2" class="form-control"><?php echo $data->alamat; ?></textarea>
                    </div>
                  </div>
                <?php } ?>
                <div class="form-group">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>