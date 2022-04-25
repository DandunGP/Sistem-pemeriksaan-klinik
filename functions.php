<?php
$conn = mysqli_connect('localhost', 'root', '', 'klinik');

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

function tambah($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);

    $query_insert = "insert into mahasiswa values ('', '$nim', '$nama', '$email', '$jurusan')";
    mysqli_query($conn, $query_insert);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    $query_delete = "delete from mahasiswa where id=$id";
    mysqli_query($conn, $query_delete);

    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $nim = htmlspecialchars($data['nim']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $id = $data['id'];

    $query_insert = "update mahasiswa set nim='$nim', nama='$nama', email='$email', jurusan='$jurusan' where id=$id";
    mysqli_query($conn, $query_insert);

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
