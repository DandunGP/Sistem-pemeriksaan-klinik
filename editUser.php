<?php

$id = $_GET['id'];

$user = query("select * from user where username= '$id' ")[0];

?>
<h1>Edit Password User</h1>
<form action="" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" readonly required>
    </div>
    <div class="form-group">
        <label for="password">Password Baru</label>
        <input type="password" class="form-control" name="password" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width: 100px">Submit</button>
</form>

<?php
if (isset($_POST['submit'])) {
    if (editUser($_POST)) {
        echo "
            <script>
                alert('Password berhasil diubah');
                document.location.href = 'dashboard.php?tab=user';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Password gagal diubah');
                document.location.href = 'dashboard.php?tab=user';
            </script>
        ";
    }
}
?>