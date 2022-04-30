<?php
    require('functions.php');
    if(isset($_GET['norm'])){
        $norm = $_GET['norm'];
        $data_pasien = query("select * from pasien where norm ='$norm'")[0];
    } else {
        echo "<script>location.href='dashboard.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<script>
    window.print();
</script>
<body class="py-5 px-5 position-relative">
    <div class="content-logo mb-3 text-center border border-dark border-top-0 border-left-0 border-right-0 position-relative">
        <img src="asset/logo-crop.png" width="150" class="logo-header position-absolute" style="left: 50px;">
        <h1>Klinik Pratama</h1>
        <h1>dr. ARIEF WAHYU SOEKARNO</h1>
        <p>Jl. Ciu No 2, Telukan, Grogol, Sukoharjo, Telp. 082225155873</p>
    </div>
    <div>
    <table class="table table-striped">
    <tbody>
        <tr>
            <td>No Rekam Medis</td>
            <td><?= $data_pasien['norm'] ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><?= $data_pasien['nama'] ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?= $data_pasien['jenis_kelamin'] ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?= date("l, j F Y", strtotime($data_pasien['tgl_lahir'])) ?></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td><?= $data_pasien['agama'] ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?= $data_pasien['alamat'] ?></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td><?= $data_pasien['telepon'] ?></td>
        </tr>
    </tbody>
    </table>
    </div>
</body>
</html>