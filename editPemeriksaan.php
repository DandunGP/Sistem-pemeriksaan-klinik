<?php

$id = $_GET['id'];

$pem = query("select * from pemeriksaan where no_per= '$id' ")[0];

?>

<h1>Tambah Pasien</h1>
<form action="" method="post">
    <div class="form-group">
        <label for="no_pemeriksaan">No Pemeriksaan</label>
        <input type="text" class="form-control" name="no_pemeriksaan" value="<?= $pem['no_per'] ?>" readonly required>
    </div>
    <div class="form-group">
        <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
        <input type="date" class="form-control" name="tanggal_pemeriksaan" value="<?= $pem['tgl_per'] ?>" required>
    </div>
    <div class="form-group">
        <label for="no_registrasi">No Registrasi</label>
        <select name="no_registrasi" class="form-control">
            <?php
            $query = "select * from pendaftaran";
            $data = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($data)) {
                if ($row['noreg'] == $pem['noreg']) {
                    echo "<option value='$row[noreg]' selected>$row[noreg]</option>";
                } else {
                    echo "<option value='$row[noreg]'>$row[noreg]</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="noRM">No Rekam Medis</label>
        <select name="noRM" class="form-control">
            <?php
            $query = "select * from pasien";
            $data = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($data)) {
                if ($row['norm'] == $pem['norm']) {
                    echo "<option value='$row[norm]' selected>$row[norm] - $row[nama]</option>";
                } else {
                    echo "<option value='$row[norm]'>$row[norm] - $row[nama]</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="no_dokter">Dokter</label>
        <select name="no_dokter" class="form-control">
            <?php
            $query = "select * from dokter";
            $data = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($data)) {
                if ($row['kode_dokter'] == $pem['kode_dokter']) {
                    echo "<option value='$row[kode_dokter]' selected>$row[kode_dokter] - $row[nama_dokter]</option>";
                } else {
                    echo "<option value='$row[kode_dokter]'>$row[kode_dokter] - $row[nama_dokter]</option>";
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="anamnesa">Anamnesa</label>
        <input type="text" class="form-control" name="anamnesa" value="<?= $pem['anamnesa'] ?>" required>
    </div>
    <div class="form-group">
        <label for="tb">Tinggi Badan</label>
        <input type="number" class="form-control" name="tb" maxlength="2" value="<?= $pem['tb'] ?>" required>
    </div>
    <div class="form-group">
        <label for="bb">Berat Badan</label>
        <input type="number" class="form-control" name="bb" maxlength="2" value="<?= $pem['bb'] ?>" required>
    </div>
    <div class="form-group">
        <label for="td">TD</label>
        <input type="number" class="form-control" name="td" maxlength="2" value="<?= $pem['td'] ?>" required>
    </div>
    <div class="form-group">
        <label for="sh">SH</label>
        <input type="number" class="form-control" name="sh" maxlength="2" value="<?= $pem['sh'] ?>" required>
    </div>
    <div class="form-group">
        <label for="nd">ND</label>
        <input type="number" class="form-control" name="nd" maxlength="2" value="<?= $pem['nd'] ?>" required>
    </div>
    <div class="form-group">
        <label for="diagnosa">Diagnosa</label>
        <input type="text" class="form-control" name="diagnosa" maxlength="2" value="<?= $pem['diagnosa'] ?>" required>
    </div>
    <div class="form-group">
        <label for="tindakan">Tindakan</label>
        <input type="text" class="form-control" name="tindakan" maxlength="2" value="<?= $pem['tindakan'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary" name="submit" style="width: 100px">Submit</button>
</form>

<?php
if (isset($_POST['submit'])) {
    if (editPemeriksaan($_POST) > 0) {
        echo "
            <script>
                alert('Pemeriksaan berhasil diedit');
                document.location.href = 'dashboard.php?tab=pemeriksaan';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Pemeriksaan gagal diedit');
                document.location.href = 'dashboard.php?tab=pemeriksaan';
            </script>
        ";
    }
}
?>