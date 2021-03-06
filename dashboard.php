<?php
require 'functions.php';
session_start();

if (!$_SESSION['status_login']) {
    echo "
        <script>
            window.location='logout.php'
        </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>

<body class="d-flex">
    <section id="navbar" class="bg-info bg-opacity-25 p-3">
        <a href="dashboard.php">
            <div class="nav-menu d-flex align-items-center justify-content-center pb-3">
                <div class="logo-image d-flex align-items-center justify-content-center" style="width:40px; height:40px;">
                    <!-- <i class="fa-solid fa-hospital" style="font-size:30px; color: white"></i> -->
                    <img src="asset/logo-crop.png" width="50" class="logo-header position-relative" style="left: 0px;">
                </div>
                <div>
                <p class="text-white fw-bold m-0 pl-3" style="font-size:20px">Klinik Pratama</p>
                <p class="text-white fw-bold m-0 pl-3" style="font-size:12px">dr. Arief Wahyu Soekarno</p>
                </div>
            </div>
        </a>
        <div class="nav-menu">
            <div class="nav-list py-2">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-shield-halved" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3"><?= $_SESSION['status_user'] ?></p>
                    <i class="fa-solid fa-angle-down ml-auto mr-1" style="color: white"></i>
                </div>
                <div class="nav-item-dropdown bg-white px-3 py-2 mt-2 hide">
                    <?php if($_SESSION['status_user'] == 'admin'): ?>
                    <a href="dashboard.php?tab=formUser" class="menu-dropdown d-block">Daftar User</a>
                    <?php endif; ?>
                    <a href="dashboard.php?tab=user" class="menu-dropdown d-block">Cek User</a>
                    <a href="logout.php" class="menu-dropdown d-block">Log Out</a>
                </div>
            </div>
        </div>
        <?php if($_SESSION['status_user'] == 'admin'): ?>
        <div class="nav-menu">
            <div class="nav-list py-2">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-user" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Pasien</p>
                    <i class="fa-solid fa-angle-down ml-auto mr-1" style="color: white"></i>
                </div>
                <div class="nav-item-dropdown bg-white px-3 py-2 mt-2 hide">
                    <a href="dashboard.php?tab=formPasien" class="menu-dropdown d-block">Daftar</a>
                    <a href="dashboard.php?tab=pasien" class="menu-dropdown d-block">Cek</a>
                </div>
            </div>
            <div class="nav-list py-2">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-address-card" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Pendaftaran</p>
                    <i class="fa-solid fa-angle-down ml-auto mr-1" style="color: white"></i>
                </div>
                <div class="nav-item-dropdown bg-white px-3 py-2 mt-2 hide">
                    <a href="dashboard.php?tab=formPendaftaran" class="menu-dropdown d-block">Daftar</a>
                    <a href="dashboard.php?tab=pendaftaran" class="menu-dropdown d-block">Cek</a>
                </div>
            </div>
            <div class="nav-list py-2">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-book-medical" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Pemeriksaan</p>
                    <i class="fa-solid fa-angle-down ml-auto mr-1" style="color: white"></i>
                </div>
                <div class="nav-item-dropdown bg-white px-3 py-2 mt-2 hide">
                    <a href="dashboard.php?tab=formPemeriksaan" class="menu-dropdown d-block">Daftar</a>
                    <a href="dashboard.php?tab=pemeriksaan" class="menu-dropdown d-block">Cek</a>
                </div>
            </div>
            <div class="nav-list py-2">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-user-doctor" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Dokter</p>
                    <i class="fa-solid fa-angle-down ml-auto mr-1" style="color: white"></i>
                </div>
                <div class="nav-item-dropdown bg-white px-3 py-2 mt-2 hide">
                    <a href="dashboard.php?tab=formDokter" class="menu-dropdown d-block">Daftar</a>
                    <a href="dashboard.php?tab=dokter" class="menu-dropdown d-block">Cek</a>
                </div>
            </div>
            <div class="nav-list py-2">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-hospital-user" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Poliklinik</p>
                    <i class="fa-solid fa-angle-down ml-auto mr-1" style="color: white"></i>
                </div>
                <div class="nav-item-dropdown bg-white px-3 py-2 mt-2 hide">
                    <a href="dashboard.php?tab=formPoli" class="menu-dropdown d-block">Daftar</a>
                    <a href="dashboard.php?tab=poliklinik" class="menu-dropdown d-block">Cek</a>
                </div>
            </div>
            <div class="nav-list py-2">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-comment-dollar" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Bayar</p>
                    <i class="fa-solid fa-angle-down ml-auto mr-1" style="color: white"></i>
                </div>
                <div class="nav-item-dropdown bg-white px-3 py-2 mt-2 hide">
                    <a href="dashboard.php?tab=formBayar" class="menu-dropdown d-block">Daftar</a>
                    <a href="dashboard.php?tab=bayar" class="menu-dropdown d-block">Cek</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="nav-menu">
            <div class="nav-list py-2">
                <a href="dashboard.php?tab=lapPasien" class="text-decoration-none">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-book" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Lap. Data Pasien</p>
                </div>
                </a>
            </div>
            <div class="nav-list py-2">
                <a href="dashboard.php?tab=lapJadwal" class="text-decoration-none">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-book" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Lap. Data Jadwal Pelayanan</p>
                </div>
                </a>
            </div>
            <div class="nav-list py-2">
                <a href="dashboard.php?tab=lapDokter" class="text-decoration-none">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-book" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Lap. Data Dokter</p>
                </div>
                </a>
            </div>
            <div class="nav-list py-2">
                <a href="dashboard.php?tab=lapBayar" class="text-decoration-none">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-book" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Lap. Cara Bayar</p>
                </div>
                </a>
            </div>
            <div class="nav-list py-2">
                <a href="dashboard.php?tab=lapPoliklinik" class="text-decoration-none">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-book" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Lap. Data Poliklinik</p>
                </div>
                </a>
            </div>
            <div class="nav-list py-2">
                <a href="dashboard.php?tab=lapKunjunganBaru" class="text-decoration-none">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-book" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Lap. Kunjungan Pasien Baru</p>
                </div>
                </a>
            </div>
            <div class="nav-list py-2">
                <a href="dashboard.php?tab=lapKunjunganLama" class="text-decoration-none">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-book" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Lap. Kunjungan Pasien Lama</p>
                </div>
                </a>
            </div>
            <div class="nav-list py-2">
                <a href="dashboard.php?tab=lapKunjunganBulan" class="text-decoration-none">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-book" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Lap. Kunjungan Per-Bulan</p>
                </div>
                </a>
            </div>
            <div class="nav-list py-2">
                <a href="dashboard.php?tab=lapKunjunganUmur" class="text-decoration-none">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-book" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Lap. Kujungan Per-Umur</p>
                </div>
                </a>
            </div>
            <div class="nav-list py-2">
                <a href="dashboard.php?tab=lapKunjunganGender" class="text-decoration-none">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-book" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Lap. Kunjungan Per-Jenis Kelamin</p>
                </div>
            </a>
            </div>
            <div class="nav-list py-2">
                <a href="dashboard.php?tab=lapKunjunganWilayah" class="text-decoration-none">
                <div class="nav-item position-relative d-flex align-items-center pl-1">
                    <i class="fa-solid fa-book" style="font-size:15px; color: white"></i>
                    <p class="text-white fw-bold m-0 pl-3">Lap. Kunjungan Per-Wilayah</p>
                </div>
                </a>
            </div>
        </div>
    </section>
    <section id="content" class="py-5 px-5 position-relative">
        <div class="content-logo mb-3 text-center border border-dark border-top-0 border-left-0 border-right-0 position-relative">
            <img src="asset/logo-crop.png" width="150" class="logo-header position-absolute" style="left: 50px;">
            <h1>Klinik Pratama</h1>
            <h1>dr. ARIEF WAHYU SOEKARNO</h1>
            <p>Jl. Ciu No 2, Telukan, Grogol, Sukoharjo, Telp. 082225155873</p>
        </div>
        <?php
        if (isset($_GET["tab"])) {
            $file = $_GET["tab"];
            require "$file.php";
        } else {
            require "menu.php";
        }
        ?>
    </section>
    <script src="https://kit.fontawesome.com/1f83e5d847.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(".nav-list").on("click", function() {
            $(this).find(".nav-item-dropdown").toggleClass("hide");
        })
    </script>
</body>

</html>