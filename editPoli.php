<?php

$id = $_GET['id'];

$pol = query("select * from poliklinik where kd_poli= '$id' ")[0];

?>
<h1>Edit Poliklinik</h1>
<form action="" method="post">
    <div class="form-group">
        <label for="kode_poli">Kode Poliklinik</label>
        <input type="text" class="form-control" name="kode_poli" value="<?= $pol['kd_poli'] ?>" readonly required>
    </div>
    <div class="form-group">
        <label for="nama_poli">Nama Poliklinik</label>
        <input type="text" class="form-control" name="nama_poli" value="<?= $pol['nm_poli'] ?>" required>
    </div>
    <div class="form-group">
        <label for="kode_dokter">Nama Dokter</label>
        <select name="kode_dokter" class="form-control">
            <?php
                $data_dokter = query("select * from dokter");
                foreach ($data_dokter as $dokter){
                    $cek = query("select * from poliklinik where kode_dokter ='{$dokter['kode_dokter']}'");
                    if($cek == NULL || $dokter['kode_dokter']==$pol['kode_dokter']){
                        $selected = "";
                        if($dokter['kode_dokter']==$pol['kode_dokter']){
                            $selected = "selected";
                        }
                        echo "<option value='$dokter[kode_dokter]' $selected>$dokter[kode_dokter] -- $dokter[nama_dokter]</option>";
                    }
                }
            ?>  
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary" style="width: 100px">Submit</button>
</form>

<?php
if (isset($_POST['submit'])) {
    if (editPoli($_POST)) {
        echo "
            <script>
                alert('Poliklinik berhasil diedit');
                document.location.href = 'dashboard.php?tab=poliklinik';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Poliklinik gagal diedit');
                document.location.href = 'dashboard.php?tab=poliklinik';
            </script>
        ";
    }
}
?>