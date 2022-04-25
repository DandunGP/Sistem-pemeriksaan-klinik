<?php
    if(isset($_GET["norm"])){
        $norm = $_GET["norm"];
        $pasien = query("select * from pasien where norm='$norm'");
    } else {
        echo "<script> location.href = 'dashboard.php' </script>";
    }
?>

<h1>Edit Pasien</h1>
<form action="" method="post">
    <div class="form-group">
        <label for="noRM">No Rekam Medis</label>
        <input type="text" class="form-control" name="noRM" value="<?= $pasien[0]['norm'] ?>" required readonly>
    </div>
    <div class="form-group">
        <label for="nama_pasien">Nama Pasien</label>
        <input type="text" class="form-control" name="nama_pasien" value="<?= $pasien[0]['nama'] ?>" required>
    </div>
    <div class="form-group">
        <label for="nama_pasien">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="Laki-Laki"
            <?php
                if(strtolower($pasien[0]['jenis_kelamin']) == "laki-laki"){
                    echo 'selected';
                }
            ?>
            >Laki-Laki</option>
            <option value="Perempuan"
            <?php
                if(strtolower($pasien[0]['jenis_kelamin']) == "perempuan"){
                    echo 'selected';
                }
            ?>
            >Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $pasien[0]['tgl_lahir'] ?>"required>
    </div>
    <div class="form-group">
        <label for="agama">Agama</label>
        <select name="agama" class="form-control">
            <option value="Islam"
            <?php
                if(strtolower($pasien[0]['agama']) == "islam"){
                    echo 'selected';
                }
            ?>
            >Islam</option>
            <option value="Kristen"
            <?php
                if(strtolower($pasien[0]['agama']) == "kristen"){
                    echo 'selected';
                }
            ?>
            >Kristen</option>
            <option value="Katolik"
            <?php
                if(strtolower($pasien[0]['agama']) == "katolik"){
                    echo 'selected';
                }
            ?>
            >Katolik</option>
            <option value="Hindu"
            <?php
                if(strtolower($pasien[0]['agama']) == "hindu"){
                    echo 'selected';
                }
            ?>
            >Hindu</option>
            <option value="Budha"
            <?php
                if(strtolower($pasien[0]['agama']) == "budha"){
                    echo 'selected';
                }
            ?>
            >Budha</option>
            <option value="Khonghucu"
            <?php
                if(strtolower($pasien[0]['agama']) == "khonghucu"){
                    echo 'selected';
                }
            ?>
            >Khonghucu</option>
        </select>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" name="alamat" value="<?= $pasien[0]['alamat'] ?>" required>
    </div>
    <div class="form-group">
        <label for="telepon">Telepon</label>
        <div class="row">
            <div class="col-1">
                <input type="text" class="form-control" value="+62" readonly>
            </div>
            <div class="col">
                <input type="number" class="form-control" name="telepon" value="<?= substr($pasien[0]['telepon'], 3) ?>" placeholder="8123456789"
                    required>
            </div>
        </div>
    </div>
    <button type="submit" name="edit" class="btn btn-primary" style="width: 100px">Edit</button>
</form>
<?php
    if(isset($_POST['edit'])){
        $norm = $_POST['noRM'];
        $nama = $_POST['nama_pasien'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tgl_lahir = $_POST['tanggal_lahir'];
        $agama = $_POST['agama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        $query_edit = "update pasien set nama='$nama', jenis_kelamin='$jenis_kelamin', tgl_lahir='$tgl_lahir', agama='$agama', alamat='$alamat', telepon='+62$telepon' where norm='$norm'";
        var_dump($query_edit);
        if(mysqli_query($conn, $query_edit)){
            echo "<script>alert('Berhasil Megedit')</script>";
            echo "<script>location.href='dashboard.php?tab=pasien'</script>";
        } else {
            echo "<script>alert('Gagal Mengedit')</script>";
            echo mysqli_error($conn);
        }
    }
?>