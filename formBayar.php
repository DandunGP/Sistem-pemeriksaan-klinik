<h1>Tambah Pasien</h1>
<?php
    $kd_bayar = query("select kd_bayar from pembayaran");
    $kd_bayar = getLastId($kd_bayar, 'kd_bayar');
?>
<form action="" method="post">
    <div class="form-group">
      <label for="noBayar">No Pembayaran</label>
      <input type="text" class="form-control" name="noBayar" value="B<?= $kd_bayar ?>" required readonly>
    </div>
    <div class="form-group">
      <label for="nama_bayar">Nama Bayar</label>
      <input type="text" class="form-control" name="nama_bayar" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width: 100px">Submit</button>
</form>
<?php
    if(isset($_POST['submit'])){
        if(tambahBayar()){
            echo "<script>alert('Berhasil Menambahkan')</script>";
            echo "<script>location.href='dashboard.php?tab=bayar'</script>";
        } else {
            echo "<script>alert('Gagal Menambahkan')</script>";
        }
    }
?>