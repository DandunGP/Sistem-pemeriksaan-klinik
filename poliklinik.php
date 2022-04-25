<h1>Tabel Poliklinik</h1>
<a href="dashboard.php?tab=formPoli" class="btn btn-primary pl-3 py-1"><i class="fa-solid fa-user-plus pr-2"></i>Tambah
    Poliklinik</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Kode Poliklinik</th>
            <th scope="col">Nama Poliklinik</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "select * from poliklinik";
        $data = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td class="center"><?= $row['kd_poli'] ?></td>
                <td><?= $row['nm_poli'] ?></td>
                <td>
                    <a href="dashboard.php?tab=editPoli&id=<?= $row['kd_poli'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
                    <a href="deletePoli.php?id=<?= $row['kd_poli'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>