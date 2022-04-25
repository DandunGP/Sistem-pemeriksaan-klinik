<h1>Tabel Pendaftaran</h1>
<a href="dashboard.php?tab=formPendaftaran" class="btn btn-primary pl-3 py-1"><i class="fa-solid fa-user-plus pr-2"></i>Tambah
    Pendaftaran</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No Registrasi</th>
            <th scope="col">Tanggal Registrasi</th>
            <th scope="col">Pasien</th>
            <th scope="col">Dokter</th>
            <th scope="col">Bayar</th>
            <th scope="col">Poli</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "select pendaftaran.*, pasien.*, dokter.*, poliklinik.*, pembayaran.* from pendaftaran join pasien on pasien.norm = pendaftaran.norm join dokter on dokter.kode_dokter = pendaftaran.kode_dokter join poliklinik on poliklinik.kd_poli = pendaftaran.kd_poli join pembayaran on pembayaran.kd_bayar = pendaftaran.kd_bayar";
        $data = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td class="center"><?= $row['noreg'] ?></td>
                <td><?= $row['tgl_reg'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['nama_dokter'] ?></td>
                <td><?= $row['nm_bayar'] ?></td>
                <td><?= $row['nm_poli'] ?></td>
                <td>
                    <a href="dashboard.php?tab=editPendaftaran&id=<?= $row['noreg'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
                    <a href="deletePendaftaran.php?id=<?= $row['noreg'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>