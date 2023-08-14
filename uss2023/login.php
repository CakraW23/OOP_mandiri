<?php
include_once 'models/auth.php';

if(isset($_POST['login'])){
    $data = [
        "username" => $_POST["username"],
        "password" => $_POST["password"]
    ];

    $result = Auth::login($data);    
    // die(var_dump($result));
}


?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>       
        body {
            background-image: url('background.webp');
            background-size: cover;
            background-repeat: no-repeat:
        }
        .login-container {
            max-width: 400px;
            margin: 10 auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>


<body>
    <div class="container mt-5">
        <div class="login-container">
            <h1 class="text-center">Login</h1>
            <form>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Masukkan username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan password">
                </div>
                <button name="login" type="submit" class="btn btn-primary btn-block">Login</button>

                <p></p>

                <p class= "text-center" for="register">Do Not Have Account? 
                <a href="register.php">Register Now</a> </p> 

                <div class="form-group">
                    <a href="https://www.instagram.com/urbansneakersociety/?hl=id">
                        <img src="instagram.png" alt="Instagram" width:"30px" height="30px" class="mx-auto d-block">
                    </a>
                </div>

                <p>USS (Urban Society Sneakers) adalah acara untuk para pecinta Sneakers & Streetwear lokal atau Internasional terbesar di Indonesia yang diadakan rutin tiap tahunnya</p>
                    
                </div>
                
                
                
            </form>
        </div>
    </div>

</body>
</html>
