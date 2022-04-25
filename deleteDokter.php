<?php
    if(isset($_GET['kode_dokter'])){
        $kode_dokter = $_GET['kode_dokter'];
        if(hapusDokter($kode_dokter)){
            echo "<script>alert('Delete Berhasil')</script>";
            echo "<script>location.href='dashboard.php?tab=dokter'</script>";
        }
    } else {
        echo "<script>location.href='dashboard.php'</script>";
    }
?>