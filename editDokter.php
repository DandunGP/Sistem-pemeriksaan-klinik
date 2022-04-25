<?php
     if(isset($_GET["kode_dokter"])){
        $kode_dokter = $_GET["kode_dokter"];
        $dokter = query("select * from dokter where kode_dokter='$kode_dokter'");
        $username = query("select username from user where not username='admin' ");
    } else {
        echo "<script> location.href = 'dashboard.php' </script>";
    }
?>
<h1>Edit Dokter</h1>
<form action="" method="post">
    <div class="form-group">
        <label for="kode_dokter">Kode Dokter</label>
        <input type="text" class="form-control" name="kode_dokter" value="<?= $dokter[0]['kode_dokter'] ?>" required>
    </div>
    <div class="form-group">
        <label for="nama_dokter">Nama Dokter</label>
        <input type="text" class="form-control" name="nama_dokter" value="<?= $dokter[0]['nama_dokter'] ?>" required>
    </div>
    <div class="form-group">
        <label for="alamat_dokter">Alamat</label>
        <input type="text" class="form-control" name="alamat_dokter" value="<?= $dokter[0]['alamat_dokter'] ?>" required>
    </div>
    <div class="form-group">
        <label for="spesialis">Spesialis</label>
        <input type="text" class="form-control" name="spesialis" value="<?= $dokter[0]['spesialis'] ?>" required>
    </div>
    <div class="form-group">
    <label for="username">username</label>
        <select name="username" class="form-control">
            <?php foreach($username as $user): ?>
                <option value="<?= $user['username'] ?>"
                <?php
                    if($dokter[0]['username'] == $user['username']){
                        echo 'selected';
                    }
                ?>
                ><?= $user['username'] ?></option>
            <?php endforeach; ?>         
        </select>
    </div>
    <button type="submit" name="edit" class="btn btn-primary" style="width: 100px">Edit</button>
</form>
<?php
    if(isset($_POST['edit'])){
        if(editDokter()){
            echo "<script>alert('Berhasil Megedit')</script>";
            echo "<script>location.href='dashboard.php?tab=dokter'</script>";
        } else {
            echo "<script>alert('Gagal Mengedit')</script>";
            echo mysqli_error($conn);
        }
    }
?>