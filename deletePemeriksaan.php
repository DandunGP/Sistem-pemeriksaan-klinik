<?php
require('functions.php');

$id = $_GET["id"];

if (hapusPemeriksaan($id) > 0) {
    echo "
        <script>
            alert('Pemeriksaan berhasil dihapus');
            document.location.href = 'dashboard.php?tab=pemeriksaan';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Pemeriksaan gagal dihapus');
            document.location.href = 'dashboard.php?tab=pemeriksaan';
        </script>
   ";
}
