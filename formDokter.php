<h1>Tambah Dokter</h1>
<?php
    $kode_dokter = query("select kode_dokter from dokter");
    $kode_dokter = getLastId($kode_dokter, 'kode_dokter');

    $username = query("select username from user where not username='admin' ");
?>
<form action="" method="post">
    <div class="form-group">
        <label for="kode_dokter">Kode Dokter</label>
        <input type="text" class="form-control" name="kode_dokter" value="DR<?= $kode_dokter ?>" required readonly>
    </div>
    <div class="form-group">
        <label for="nama_dokter">Nama Dokter</label>
        <input type="text" class="form-control" name="nama_dokter" required>
    </div>
    <div class="form-group">
        <label for="alamat_dokter">Alamat</label>
        <input type="text" class="form-control" name="alamat_dokter" required>
    </div>
    <div class="form-group">
        <label for="spesialis">Spesialis</label>
        <input type="text" class="form-control" name="spesialis" required>
    </div>
    <div class="form-group">
        <label for="username">username</label>
        <select name="username" class="form-control">
            <?php foreach($username as $user): ?>
                <option value="<?= $user['username'] ?>"><?= $user['username'] ?></option>
            <?php endforeach; ?>         
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width: 100px">Submit</button>
</form>
<?php
    if(isset($_POST['submit'])){
        if(tambahDokter()){
            echo "<script>alert('Berhasil Menambahkan')</script>";
            echo "<script>location.href='dashboard.php?tab=dokter'</script>";
        } else {
            echo "<script>alert('Gagal Menambahkan')</script>";
        }
    }
?>