<h1>Tambah User</h1>
<form action="" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Masukkan Username...." required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Masukkan Password...." required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width: 100px">Submit</button>
</form>
<?php
if (isset($_POST['submit'])) {
    if (tambahUser($_POST) > 0) {
        echo "
            <script>
                alert('User berhasil ditambahkan');
                document.location.href = 'dashboard.php?tab=user';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('User gagal ditambahkan');
            </script>
        ";
    }
}
?>