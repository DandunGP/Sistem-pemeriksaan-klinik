<h1>Tambah Poliklinik</h1>
<?php
$kdpoli = query("select kd_poli from poliklinik");
$kdpoli = getLastId($kdpoli, 'kd_poli');
?>
<form action="" method="post">
    <div class="form-group">
        <label for="kode_poli">Kode Poliklinik</label>
        <input type="text" class="form-control" name="kode_poli" value="PL<?= $kdpoli ?>" readonly required>
    </div>
    <div class="form-group">
        <label for="nama_poli">Nama Poliklinik</label>
        <input type="text" class="form-control" name="nama_poli" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width: 100px">Submit</button>
</form>

<?php
if (isset($_POST['submit'])) {
    if (tambahPoli($_POST) > 0) {
        echo "
            <script>
                alert('Poliklinik berhasil ditambahkan');
                document.location.href = 'dashboard.php?tab=poliklinik';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Poliklinik gagal ditambahkan');
            </script>
        ";
    }
}
?>