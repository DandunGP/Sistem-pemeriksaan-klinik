<?php
    if(isset($_GET['kd_bayar'])){
        $kd_bayar = $_GET['kd_bayar'];
        $query_delete = "delete from pembayaran where kd_bayar='$kd_bayar'";
        if(mysqli_query($conn, $query_delete)){
            echo "<script>alert('Delete Berhasil')</script>";
            echo "<script>location.href='dashboard.php?tab=bayar'</script>";
        }
    } else {
        echo "<script>location.href='dashboard.php'</script>";
    }
?>