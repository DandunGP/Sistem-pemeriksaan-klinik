<?php

$id = $_GET['id'];

$pend = query("select * from pendaftaran where noreg= '$id' ")[0];

?>
<h1>Edit Pendaftaran</h1>
<form action="" method="post">
    <div class="form-group">
        <label for="noreg">No Registrasi</label>
        <input type="text" class="form-control" value="<?= $pend['noreg'] ?>" name="noreg" readonly required>
    </div>
    <div class="form-group">
        <label for="tgl_reg">Tanggal Registrasi</label>
        <input type="date" class="form-control" name="tgl_reg" value="<?= $pend['tgl_reg'] ?>" required>
    </div>
    <div class="form-group">
        <label for="norm">No Rekam Medis</label>
        <select name="norm" class="form-control">
            <?php
            $query = "select * from pasien";
            $data = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($data)) {
                if ($row['norm'] == $pend['norm']) {
                    echo "<option value='$row[norm]' selected>$row[norm]</option>";
                } else {
                    echo "<option value='$row[norm]'>$row[norm]</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="kode_dokter">Dokter</label>
        <select name="kode_dokter" class="form-control">
            <?php
            $query = "select dokter.*, poliklinik.* from dokter join poliklinik on poliklinik.kode_dokter=dokter.kode_dokter";
            $data = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($data)) {
                if ($row['kode_dokter'] == $pend['kode_dokter']) {
                    echo "<option value='$row[kode_dokter]' selected>$row[nama_dokter] -- $row[nm_poli]</option>";
                } else {
                    echo "<option value='$row[kode_dokter]'>$row[nama_dokter] -- $row[nm_poli]</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="kode_bayar">Cara Bayar</label>
        <select name="kode_bayar" class="form-control">
            <?php
            $query = "select * from pembayaran";
            $data = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($data)) {
                if ($row['kd_bayar'] == $pend['kd_bayar']) {
                    echo "<option value='$row[kd_bayar]' selected>$row[nm_bayar]</option>";
                } else {
                    echo "<option value='$row[kd_bayar]'>$row[nm_bayar]</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="nominal">Nominal</label>
        <input type="number" class="form-control" name="nominal" placeholder="ketik '0' Jika BPJS"
        value="<?= $pend['nominal'] ?>"
        required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width: 100px">Submit</button>
</form>

<?php
if (isset($_POST['submit'])) {
    if (editPendaftaran($_POST) > 0) {
        echo "
            <script>
                alert('Pendaftaran berhasil diedit');
                document.location.href = 'dashboard.php?tab=pendaftaran';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Pendaftaran gagal diedit');
                document.location.href = 'dashboard.php?tab=pendaftaran';
            </script>
        ";
    }
}
?>