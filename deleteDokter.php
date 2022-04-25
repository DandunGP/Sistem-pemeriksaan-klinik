<?php
    if(isset($_GET['kode_dokter'])){
        $kode_dokter = $_GET['kode_dokter'];
        $query_delete = "delete from dokter where kode_dokter='$kode_dokter'";
        if(mysqli_query($conn, $query_delete)){
            echo "<script>alert('Delete Berhasil')</script>";
            echo "<script>location.href='dashboard.php?tab=dokter'</script>";
        }
    } else {
        echo "<script>location.href='dashboard.php'</script>";
    }
?>