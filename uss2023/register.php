<?php
include_once 'Models/auth.php';

if (isset($_POST['register'])) {
    $data = [
        "username" => $_POST["username"],
        "email" => $_POST["email"],
        "password" => $_POST["password"],
        "password_confirm" => $_POST["password_confirm"],
    ];

    $register = Auth::register($data);

    if ($register["status"] === "success") {
        header("Location: login.php");
    } else {
        header("Location: register.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <!-- Menggunakan Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Tambahkan CSS kustom jika diperlukan -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .register-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <div class="container register-container">
        <h2 class="text-center mb-4">Registrasi Akun</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" autocomplete="off" class="form-control" name="username" id="username" placeholder="Masukkan username">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" autocomplete="off" class="form-control" name="email" id="email" placeholder="Masukkan email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
            </div>
            <div class="form-group">
                <label for="confirm-password">Konfirmasi Password</label>
                <input type="password" class="form-control" name="password_confirm" id="confirm-password" placeholder="Konfirmasi password">
            </div>
            <button name="register" type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login</a></p>
    </div>

</body>

</html>