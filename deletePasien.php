<?php
    if(isset($_GET['norm'])){
        $norm = $_GET['norm'];
        $query_delete = "delete from pasien where norm='$norm'";
        if(mysqli_query($conn, $query_delete)){
            echo "<script>alert('Delete Berhasil')</script>";
            echo "<script>location.href='dashboard.php?tab=pasien'</script>";
        }
    } else {
        echo "<script>location.href='dashboard.php'</script>";
    }
?>