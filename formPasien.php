<h1>Tambah Pasien</h1>
<?php
$norm = query("select norm from pasien");
?>
<form action="" method="post">
    <div class="form-group">
        <label for="noRM">No Rekam Medis</label>
        <input type="number" class="form-control" name="noRM" value="" maxlength="12" minlength="12" required>
    </div>
    <div class="form-group">
        <label for="nama_pasien">Nama Pasien</label>
        <input type="text" class="form-control" name="nama_pasien" required>
    </div>
    <div class="form-group">
        <label for="nama_pasien">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" required>
    </div>
    <div class="form-group">
        <label for="agama">Agama</label>
        <select name="agama" class="form-control">
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katolik">Katolik</option>
            <option value="Hindu">Hindu</option>
            <option value="Budha">Budha</option>
            <option value="Khonghucu">Khonghucu</option>
        </select>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" name="alamat" required>
    </div>
    <div class="form-group">
        <label for="telepon">Telepon</label>
        <div class="row">
            <div class="col-1">
                <input type="text" class="form-control" value="+62" readonly>
            </div>
            <div class="col">
                <input type="number" class="form-control" name="telepon" placeholder="8123456789" required>
            </div>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width: 100px">Submit</button>
</form>
<?php
if (isset($_POST['submit'])) {
    if (tambahPasien()) {
        echo "<script>alert('Berhasil Menambahkan')</script>";
        echo "<script>location.href='dashboard.php?tab=pasien'</script>";
    } else {
        echo "<script>alert('Gagal Menambahkan')</script>";
    }
}
?>