<h1>Tambah Pendaftaran</h1>
<?php
$noreg = query("select noreg from pendaftaran");
$noreg = getLastId($noreg, 'noreg');
if(isset($_GET['norm'])){
    $norm = $_GET['norm'];
}
?>
<form action="" method="post">
    <div class="form-group">
        <label for="noreg">No Registrasi</label>
        <input type="text" class="form-control" name="noreg" value="REG<?= $noreg ?>" readonly required>
    </div>
    <div class="form-group">
        <label for="tgl_reg">Tanggal Registrasi</label>
        <input type="date" class="form-control" name="tgl_reg" required>
    </div>
    <div class="form-group">
        <label for="norm">No Rekam Medis</label>
        <select name="norm" class="form-control">
            <?php
            $query = "select * from pasien";
            $data = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($data)) {
                if(isset($norm)){
                    if($row['norm'] == $norm){
                        echo "<option value='$row[norm]' selected>$row[norm]--$row[nama]</option>";
                    } else{
                        echo "<option value='$row[norm]'>$row[norm]--$row[nama]</option>";
                    }
                }
                echo "<option value='$row[norm]'>$row[norm]--$row[nama]</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="kode_dokter">Kode Dokter</label>
        <select name="kode_dokter" class="form-control">
            <?php
            $query = "select * from dokter";
            $data = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($data)) {
                echo "<option value='$row[kode_dokter]'>$row[kode_dokter]--$row[nama_dokter]</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="kode_bayar">Kode Bayar</label>
        <select name="kode_bayar" class="form-control">
            <?php
            $query = "select * from pembayaran";
            $data = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($data)) {
                echo "<option value='$row[kd_bayar]'>$row[kd_bayar] -- $row[nm_bayar]</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="nominal">Nominal</label>
        <input type="number" class="form-control" name="nominal" placeholder="ketik '0' Jika BPJS" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width: 100px">Submit</button>
</form>

<?php
if (isset($_POST['submit'])) {
    if (tambahPendaftaran($_POST) > 0) {
        echo "
            <script>
                alert('Pendaftaran berhasil ditambahkan');
                document.location.href = 'dashboard.php?tab=pendaftaran';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Pendaftaran gagal ditambahkan');
            </script>
        ";
    }
}
?>