<?php
    if(isset($_GET['kd_bayar'])){
        $kd_bayar = $_GET['kd_bayar'];
        if(hapusBayar($kd_bayar)){
            echo "<script>alert('Delete Berhasil')</script>";
            echo "<script>location.href='dashboard.php?tab=bayar'</script>";
        }
    } else {
        echo "<script>location.href='dashboard.php'</script>";
    }
?>