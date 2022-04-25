<h1>Tabel Pendaftaran</h1>
<a href="dashboard.php?tab=formPendaftaran" class="btn btn-primary pl-3 py-1"><i class="fa-solid fa-user-plus pr-2"></i>Tambah
    Pendaftaran</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No Registrasi</th>
            <th scope="col">Tanggal Registrasi</th>
            <th scope="col">No Rekam Medis</th>
            <th scope="col">Kode Dokter</th>
            <th scope="col">Kode Bayar</th>
            <th scope="col">Kode Poli</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "select * from pendaftaran";
        $data = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td class="center"><?= $row['noreg'] ?></td>
                <td><?= $row['tgl_reg'] ?></td>
                <td><?= $row['norm'] ?></td>
                <td><?= $row['kode_dokter'] ?></td>
                <td><?= $row['kd_bayar'] ?></td>
                <td><?= $row['kd_poli'] ?></td>
                <td>
                    <a href="dashboard.php?tab=editPendaftaran&id=<?= $row['noreg'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
                    <a href="deletePendaftaran.php?id=<?= $row['noreg'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>