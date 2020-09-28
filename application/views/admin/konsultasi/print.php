<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>

<body>
    <div>
        <center>
            <h2>DATA KONSULTASI</h2>
        </center>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 1%;">
                    <center>No.</center>
                </th>
                <th style="width: 4%;">Nama Pengguna</th>
                <th width="5%">Tanggal</th>
                <th style="width: 10%;">Hasil Konsultasi</th>
                <th style="width: 4%;">Nilai CF</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($konsultasi as $u) {
            ?>
                <tr>
                    <td align="center"><?php echo $no++ ?>.</td>
                    <td><?php echo $u->Nm_user ?></td>
                    <td><?php echo date('d F Y', strtotime($u->tgl_user)); ?></td>
                    <td><?php echo $u->Nm_penyakit ?></td>
                    <td><?php echo $u->Nilai ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
    <script>
        window.print();
    </script>

</body>

</html>