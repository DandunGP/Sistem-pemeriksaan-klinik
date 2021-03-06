<h1>Dashboard Admin</h1>
<div class="menu-content d-flex flex-wrap justify-content-left py-5">
    <a href="dashboard.php?tab=pasien" class="text-decoration-none py-3 mr-4">
        <div class="item-content bg-white pl-3 d-flex flex-column justify-content-center position-relative">
            <h3 class="m-0 p-0 text-primary">Pasien</h3>
            <p class="m-0 p-0 text-black"><?= $dataPasien ?></p>
            <i class="fa-solid fa-user position-absolute logo-content"></i>
        </div>
    </a>
    <a href="dashboard.php?tab=dokter" class="text-decoration-none py-3 mr-4">
        <div class="item-content bg-white text-success pl-3 d-flex flex-column justify-content-center position-relative">
            <h3 class="m-0 p-0 text-success">Dokter</h3>
            <p class="m-0 p-0 text-black"><?= $dataDokter ?></p>
            <i class="fa-solid fa-user-doctor position-absolute logo-content"></i>
        </div>
    </a>
    <a href="dashboard.php?tab=poliklinik" class="text-decoration-none py-3 mr-4">
        <div class="item-content bg-white text-warning pl-3 d-flex flex-column justify-content-center position-relative">
            <h3 class="m-0 p-0 text-warning">Poliklinik</h3>
            <p class="m-0 p-0 text-black"><?= $dataPoli ?></p>
            <i class="fa-solid fa-hospital-user position-absolute logo-content"></i>
        </div>
    </a>
    <a href="dashboard.php?tab=pemeriksaan" class="text-decoration-none py-3 mr-4">
        <div class="item-content bg-white text-info pl-3 d-flex flex-column justify-content-center position-relative">
            <h3 class="m-0 p-0 text-info">Pemeriksaan</h3>
            <p class="m-0 p-0 text-black"><?= $dataPemeriksaan ?></p>
            <i class="fa-solid fa-book-medical position-absolute logo-content"></i>
        </div>
    </a>
    <a href="dashboard.php?tab=bayar" class="text-decoration-none py-3 mr-4">
        <div class="item-content bg-white text-danger pl-3 d-flex flex-column justify-content-center position-relative">
            <h3 class="m-0 p-0 text-danger">Bayar</h3>
            <p class="m-0 p-0 text-black"><?= $dataPembayaran ?></p>
            <i class="fa-solid fa-comment-dollar position-absolute logo-content"></i>
        </div>
    </a>
    <a href="dashboard.php?tab=pendaftaran" class="text-decoration-none py-3 mr-4">
        <div class="item-content bg-white text-danger pl-3 d-flex flex-column justify-content-center position-relative">
            <h3 class="m-0 p-0 text-danger">Pendaftaran</h3>
            <p class="m-0 p-0 text-black"><?= $dataPendaftaran ?></p>
            <i class="fa-solid fa-address-card position-absolute logo-content"></i>
        </div>
    </a>
</div>
<div class="nav-login">

</div>