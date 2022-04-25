<h1>Tambah Pasien</h1>
<?php
$noper = query("select no_per from pemeriksaan");
$noper = getLastId($noper, 'no_per');
?>
<form action="" method="post">
    <div class="form-group">
        <label for="no_pemeriksaan">No Pemeriksaan</label>
        <input type="text" class="form-control" name="no_pemeriksaan" value="PEM<?= $noper ?>" readonly required>
    </div>
    <div class="form-group">
        <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
        <input type="date" class="form-control" name="tanggal_pemeriksaan" required>
    </div>
    <div class="form-group">
        <label for="no_registrasi">No Registrasi</label>
        <select name="no_registrasi" class="form-control">
            <?php
            $query = "select * from pendaftaran";
            $data = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($data)) {
                echo "<option value='$row[noreg]'>$row[noreg]</option>";
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
                echo "<option value='$row[norm]'>$row[norm] -- $row[nama]</option>";
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
                echo "<option value='$row[kode_dokter]'>$row[kode_dokter] -- $row[nama_dokter]</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="anamnesa">Anamnesa</label>
        <input type="text" class="form-control" name="anamnesa" required>
    </div>
    <div class="form-group">
        <label for="tb">Tinggi Badan</label>
        <input type="number" class="form-control" name="tb" maxlength="2" required>
    </div>
    <div class="form-group">
        <label for="bb">Berat Badan</label>
        <input type="number" class="form-control" name="bb" maxlength="2" required>
    </div>
    <div class="form-group">
        <label for="td">TD</label>
        <input type="number" class="form-control" name="td" maxlength="2" required>
    </div>
    <div class="form-group">
        <label for="sh">SH</label>
        <input type="number" class="form-control" name="sh" maxlength="2" required>
    </div>
    <div class="form-group">
        <label for="nd">ND</label>
        <input type="number" class="form-control" name="nd" maxlength="2" required>
    </div>
    <div class="form-group">
        <label for="diagnosa">Diagnosa</label>
        <input type="text" class="form-control" name="diagnosa" required>
    </div>
    <div class="form-group">
        <label for="tindakan">Tindakan</label>
        <input type="text" class="form-control" name="tindakan" required>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width: 100px">Submit</button>
</form>

<?php
if (isset($_POST['submit'])) {
    if (tambahPemeriksaan($_POST) > 0) {
        echo "
                <script>
                    alert('Pemeriksaan berhasil ditambahkan');
                    document.location.href = 'dashboard.php?tab=pemeriksaan';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Pemeriksaan gagal ditambahkan');
                </script>
            ";
    }
}
?>