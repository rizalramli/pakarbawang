<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>

<body>
    <div>
        <center>
            <h2>HASIL DIAGNOSA</h2>
        </center>
    </div>
    <br>
    <h2>KESIMPULAN</h2>
    <p style="color: black">Tanaman bawang merah anda terkena :</p>
    <p style="color: black"><?php
                            // echo '<br> <b>' . $Nm_penyakit . '</b> (<b>' . $kategori . '</b>)<br> <b>Deskripsi :</b> ' . $definisi . '<br> <b>Saran :</b> ' . $saran . '<br><br><b>Nama :</b> ' . $this->session->userdata("nama") . '<br><b>Tanggal : ' . date('d-m-Y') . '</b>';
                            ?></p>
    <table class="table table-hover table-bordered" id="example4">
        <thead style="background-color: #cccccc;">
            <tr>
                <th style="color: black; width: 15%;"><b>Nama </b></th>
                <th style="color: black"><b>Tanggal</b></th>
                <th style="color: black"><b>Nama Penyakit</b></th>
                <th style="color: black"><b>Persentase</b></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($konsultasi as $data) {
            ?>
                <tr>
                    <td><?php echo $data->Nm_user ?></td>
                    <td><?php echo $data->tgl_user ?></td>
                    <td><?php echo $data->Nm_penyakit ?></td>
                    <td><?php echo $data->Nilai ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>
    <div style="text-align: center;"><a href="<?php echo site_url('Userbaruu/index')?>" class="btn btn-success">Selesai</a></div>
</body>

</html>