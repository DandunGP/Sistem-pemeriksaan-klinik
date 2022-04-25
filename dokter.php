<h1>Tabel Dokter</h1>
<a href="dashboard.php?tab=formDokter" class="btn btn-primary pl-3 py-1"><i
        class="fa-solid fa-user-plus pr-2"></i>Tambah
    Dokter</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Kode Dokter</th>
            <th scope="col">Nama Dokter</th>
            <th scope="col">Alamat Dokter</th>
            <th scope="col">Spesialis</th>
            <th scope="col">Username</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <?php
        $data_dokter = query("select * from dokter")
    ?>
    <tbody>
    <?php foreach ($data_dokter as $dokter): ?>
        <tr>
            <td><?= $dokter['kode_dokter'] ?></td>
            <td><?= $dokter['nama_dokter'] ?></td>
            <td><?= $dokter['alamat_dokter'] ?></td>
            <td><?= $dokter['spesialis'] ?></td>
            <td><?= $dokter['username'] ?></td>
            <td>
                <a href="dashboard.php?tab=editDokter&kode_dokter=<?= $dokter['kode_dokter'] ?>" class="btn btn-success pl-3 py-0"><i
                        class="fa-solid fa-pen pr-2"></i>Edit</a>
                <a href="dashboard.php?tab=deleteDokter&kode_dokter=<?= $dokter['kode_dokter'] ?>" class="btn btn-danger pl-3 py-0"
                    onclick="return confirm('Are you sure you want to delete this item?');"><i
                        class="fa-solid fa-trash pr-2"></i>Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>