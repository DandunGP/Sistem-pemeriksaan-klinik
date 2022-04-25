<?php
     if(isset($_GET["kd_bayar"])){
        $kd_bayar = $_GET["kd_bayar"];
        $bayar = query("select * from pembayaran where kd_bayar='$kd_bayar'");
    } else {
        echo "<script> location.href = 'dashboard.php' </script>";
    }
?>
<h1>Tambah Pasien</h1>
<form action="" method="post">
    <div class="form-group">
      <label for="noBayar">No Pembayaran</label>
      <input type="text" class="form-control" name="noBayar" value="<?= $bayar[0]['kd_bayar'] ?>" required readonly>
    </div>
    <div class="form-group">
      <label for="nama_bayar">Nama Bayar</label>
      <input type="text" class="form-control" name="nama_bayar" value="<?= $bayar[0]['nm_bayar'] ?>" required>
    </div>
    <button type="submit" name="edit" class="btn btn-primary" style="width: 100px">Submit</button>
</form>
<?php
    if(isset($_POST['edit'])){
        $kd_bayar = $_POST['noBayar'];
        $nm_bayar = $_POST['nama_bayar'];

        $query_edit = "update pembayaran set nm_bayar='$nm_bayar' where kd_bayar='$kd_bayar'";
        var_dump($query_edit);
        if(mysqli_query($conn, $query_edit)){
            echo "<script>alert('Berhasil Megedit')</script>";
            echo "<script>location.href='dashboard.php?tab=bayar'</script>";
        } else {
            echo "<script>alert('Gagal Mengedit')</script>";
            echo mysqli_error($conn);
        }
    }
?>