<?php
$conn = mysqli_connect('localhost', 'root', '', 'klinik');

$query1 = mysqli_query($conn, "select count(*) from pasien");
$pasien = mysqli_fetch_array($query1);

$query2 = mysqli_query($conn, "select count(*) from dokter");
$dokter = mysqli_fetch_array($query2);

$query3 = mysqli_query($conn, "select count(*) from poliklinik");
$poliklinik = mysqli_fetch_array($query3);

$query4 = mysqli_query($conn, "select count(*) from pemeriksaan");
$pemeriksaan = mysqli_fetch_array($query4);

$query5 = mysqli_query($conn, "select count(*) from pembayaran");
$pembayaran = mysqli_fetch_array($query5);

$query6 = mysqli_query($conn, "select count(*) FROM pendaftaran");
$pendaftaran = mysqli_fetch_array($query6);

$dataPasien = $pasien[0];
$dataDokter = $dokter[0];
$dataPoli = $poliklinik[0];
$dataPemeriksaan = $pemeriksaan[0];
$dataPembayaran = $pembayaran[0];
$dataPendaftaran = $pendaftaran[0];

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function getLastId($data, $key)
{
    $akhir = $data[count($data) - 1][$key];
    $akhir = substr($akhir, -3, 3) + 1;
    $panjang = strlen($akhir);
    if ($panjang == 1) {
        $akhir = '00' . $akhir;
    } elseif ($panjang == 2) {
        $akhir = '0' . $akhir;
    }
    return $akhir;
}

function tambahPoli($data)
{
    global $conn;

    $kdpoli = htmlspecialchars($data['kode_poli']);
    $nmpoli = htmlspecialchars($data['nama_poli']);

    $query_insert = "insert into poliklinik values ('$kdpoli', '$nmpoli')";
    mysqli_query($conn, $query_insert);

    return mysqli_affected_rows($conn);
}

function tambahPendaftaran($data)
{
    global $conn;

    $noreg = htmlspecialchars($data['noreg']);
    $tgl = htmlspecialchars($data['tgl_reg']);
    $norm = htmlspecialchars($data['norm']);
    $kodeDok = htmlspecialchars($data['kode_dokter']);
    $kdbayar = htmlspecialchars($data['kode_bayar']);
    $kdpoli = htmlspecialchars($data['kode_poli']);

    $query_insert = "insert into pendaftaran values ('$noreg', '$tgl', '$norm', '$kodeDok', '$kdbayar', '$kdpoli')";
    mysqli_query($conn, $query_insert);

    return mysqli_affected_rows($conn);
}

function tambahPemeriksaan($data)
{
    global $conn;

    $noper = htmlspecialchars($data['no_pemeriksaan']);
    $tgl = htmlspecialchars($data['tanggal_pemeriksaan']);
    $noreg = htmlspecialchars($data['no_registrasi']);
    $norm = htmlspecialchars($data['noRM']);
    $nodok = htmlspecialchars($data['no_dokter']);
    $anam = htmlspecialchars($data['anamnesa']);
    $tb = htmlspecialchars($data['tb']);
    $bb = htmlspecialchars($data['bb']);
    $td = htmlspecialchars($data['td']);
    $sh = htmlspecialchars($data['sh']);
    $nd = htmlspecialchars($data['nd']);
    $diagnosa = htmlspecialchars($data['diagnosa']);
    $tindakan = htmlspecialchars($data['tindakan']);

    $query_insert = "insert into pemeriksaan values ('$noper', '$tgl' ,'$noreg' ,'$norm' ,'$nodok' ,'$anam' ,'$tb' ,'$bb' ,'$td' ,'$sh', '$nd','$diagnosa' ,'$tindakan')";
    mysqli_query($conn, $query_insert);

    return mysqli_affected_rows($conn);
}

function hapusPoli($id)
{
    global $conn;

    $query_delete = "delete from poliklinik where kd_poli = '$id' ";
    mysqli_query($conn, $query_delete);

    return mysqli_affected_rows($conn);
}

function hapusPemeriksaan($id)
{
    global $conn;

    $query_delete = "delete from pemeriksaan where no_per = '$id' ";
    mysqli_query($conn, $query_delete);

    return mysqli_affected_rows($conn);
}

function hapusPendaftaran($id)
{
    global $conn;

    $query_delete = "delete from pendaftaran where noreg = '$id' ";
    mysqli_query($conn, $query_delete);

    return mysqli_affected_rows($conn);
}

function editPoli($data)
{
    global $conn;

    $kdpoli = htmlspecialchars($data['kode_poli']);
    $nmpoli = htmlspecialchars($data['nama_poli']);

    $query_edit = "update poliklinik set kd_poli = '$kdpoli', nm_poli = '$nmpoli' where kd_poli = '$kdpoli' ";
    mysqli_query($conn, $query_edit);

    return mysqli_affected_rows($conn);
}

function editPendaftaran($data)
{
    global $conn;

    $noreg = htmlspecialchars($data['noreg']);
    $tgl = htmlspecialchars($data['tgl_reg']);
    $norm = htmlspecialchars($data['norm']);
    $kodeDok = htmlspecialchars($data['kode_dokter']);
    $kdbayar = htmlspecialchars($data['kode_bayar']);
    $kdpoli = htmlspecialchars($data['kode_poli']);

    $query_edit = "update pendaftaran set noreg = '$noreg', tgl_reg = '$tgl', norm = '$norm', kode_dokter = '$kodeDok', kd_bayar = '$kdbayar', kd_poli = '$kdpoli' where noreg = '$noreg' ";
    mysqli_query($conn, $query_edit);

    return mysqli_affected_rows($conn);
}

function editPemeriksaan($data)
{
    global $conn;

    $noper = htmlspecialchars($data['no_pemeriksaan']);
    $tgl = htmlspecialchars($data['tanggal_pemeriksaan']);
    $noreg = htmlspecialchars($data['no_registrasi']);
    $norm = htmlspecialchars($data['noRM']);
    $nodok = htmlspecialchars($data['no_dokter']);
    $anam = htmlspecialchars($data['anamnesa']);
    $tb = htmlspecialchars($data['tb']);
    $bb = htmlspecialchars($data['bb']);
    $td = htmlspecialchars($data['td']);
    $sh = htmlspecialchars($data['sh']);
    $nd = htmlspecialchars($data['nd']);
    $diagnosa = htmlspecialchars($data['diagnosa']);
    $tindakan = htmlspecialchars($data['tindakan']);

    $query_edit = "update pemeriksaan set no_per = '$noper', tgl_per = '$tgl', noreg = '$noreg', norm = '$norm', kode_dokter = '$nodok', anamnesa = '$anam', tb = '$tb', bb = '$bb', td = '$td', sh = '$sh', nd = '$nd', diagnosa = '$diagnosa', tindakan = '$tindakan' where no_per = '$noper' ";
    mysqli_query($conn, $query_edit);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "select * from mahasiswa where 
            nama like '%$keyword%' or
            nim like '%$keyword%' or
            jurusan like '%$keyword%' or
            email like '%$keyword%'
            ";
    return query($query);
}
