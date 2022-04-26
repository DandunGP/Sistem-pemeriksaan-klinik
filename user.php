<h1>Tabel User</h1>
<?php if($_SESSION['status_user'] == 'admin'): ?>
<a href="dashboard.php?tab=formUser" class="btn btn-primary pl-3 py-1"><i class="fa-solid fa-user-plus pr-2"></i>Tambah
    User</a>
<?php endif; ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Type User</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_SESSION['id'])){
            if($_SESSION['id'] != 'admin'){
                $idDokter = $_SESSION['id'];
                $query = "select * from user where username='$idDokter'";
            } else {
                $query = "select * from user where not type_user='admin'";
            }
        } else {
            $query = "select * from user where not type_user='admin'";
        }
        $data = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?= $row['username'] ?></td>
                <td><?= $row['password'] ?></td>
                <td><?= $row['type_user'] ?></td>
                <td>
                    <a href="dashboard.php?tab=editUser&id=<?= $row['username'] ?>" class="btn btn-success pl-3 py-0"><i class="fa-solid fa-pen pr-2"></i>Edit</a>
                    <?php if($_SESSION['status_user'] == 'admin'): ?>
                    <a href="deleteUser.php?id=<?= $row['username'] ?>" class="btn btn-danger pl-3 py-0" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash pr-2"></i>Delete</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>