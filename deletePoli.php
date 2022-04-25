<?php
require('functions.php');

$id = $_GET["id"];

if (hapusPoli($id) > 0) {
    echo "
        <script>
            alert('Poliklinik berhasil dihapus');
            document.location.href = 'dashboard.php?tab=poliklinik';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Poliklinik gagal dihapus');
            document.location.href = 'dashboard.php?tab=poliklinik';
        </script>
   ";
}
