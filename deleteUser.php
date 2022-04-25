<?php
require('functions.php');

$id = $_GET["id"];

if (hapusUser($id) > 0) {
    echo "
        <script>
            alert('User berhasil dihapus');
            document.location.href = 'dashboard.php?tab=user';
        </script>
    ";
} else {
    echo "
        <script>
            alert('User gagal dihapus');
            document.location.href = 'dashboard.php?tab=user';
        </script>
   ";
}
