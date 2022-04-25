<?php
require('functions.php');

$id = $_GET["id"];

if (hapusPendaftaran($id) > 0) {
    echo "
        <script>
            alert('Pendaftaran berhasil dihapus');
            document.location.href = 'dashboard.php?tab=pendaftaran';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Pendaftaran gagal dihapus');
            document.location.href = 'dashboard.php?tab=pendaftaran';
        </script>
   ";
}
