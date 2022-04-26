<?php
require 'functions.php';
error_reporting(0);
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "select * from user where username = '" . $username . "' and password = '" . $password . "'");
    $row = mysqli_fetch_array($query);

    if (mysqli_num_rows($query) > 0) {
        if ($row['type_user'] == "admin") {
            $_SESSION['status_login'] = true;
            $_SESSION['admin_global'] = $row;
            $_SESSION['status_user'] = $row['type_user'];
            $_SESSION['id'] = $row['username'];
            echo "
                        <script>
                            window.location='dashboard.php';
                        </script>
                        ";
        } else {
            $_SESSION['status_login'] = true;
            $_SESSION['nama'] = $row['username'];
            $_SESSION['status_user'] = $row['type_user'];
            $_SESSION['id'] = $row['username'];
            echo "
                        <script>
                            window.location='dashboard.php';
                        </script>
                        ";
        }
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/login.css">
</head>

<body class="bg-primary d-flex justify-content-center align-items-center">
    <div class="menu-login d-flex">
        <div class="login-logo bg-white p-3 d-flex flex-column justify-content-center align-items-center">
            <i class="fa-solid fa-hospital" style="font-size:100px"></i>
            <p class="mt-3 mb-0" style="font-size:25px">Klinik Pertama Kedua</p>
        </div>
        <div class="login-form bg-white text-center p-3 d-flex align-items-center">
            <form action="" method="post">
                <h2 class="login-title">Welcome Back!</h2>
                <?php if (isset($error)) : ?>
                    <p style="color:red; font-style:italic;">username atau password salah!</p>
                <?php endif; ?>
                <input type="text" name="username" width="100%" class="pill-input px-4 py-2 rounded rounded-pill" placeholder="Masukkan Username...">
                <input type="password" name="password" class="pill-input px-4 py-2 rounded rounded-pill" placeholder="Masukkan Password...">
                <input type="submit" name="login" class="pill-input bg-success py-2 text-bold text-white border-0 rounded rounded-pill" value="Login">
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/1f83e5d847.js" crossorigin="anonymous"></script>
</body>

</html>