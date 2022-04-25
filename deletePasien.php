<?php
    if(isset($_GET['norm'])){
        $norm = $_GET['norm'];
        if(hapusPasien($norm)){
            echo "<script>alert('Delete Berhasil')</script>";
            echo "<script>location.href='dashboard.php?tab=pasien'</script>";
        }
    } else {
        echo "<script>location.href='dashboard.php'</script>";
    }
?>