<?php

session_start();

include_once "Models/DB.php";

    class Auth extends DB
    {
        public static function register($data)
        {
            $username = $data['username'];
            $email = $data['email'];
            $password = $data['password'];
            $password_confirm = $data['password_confirm'];
    
    
            if ($password === $password_confirm) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users(username,email,password) VALUES ('$username','$email','$password')";
                $result = DB::connect()->query($sql);
    
                return [
                    "status" => "success",
                    "data" => $result,
                    "message" => "Berhasil register",
                ];
            } 
            else{
                return [
                    "status" => "error",
                    "data" => [],
                    "message" => "Password Tidak sama",
                ];
            }
        }

public static function login($data)
{
    $username = $data["username"];
    $password = $data["password"];

    $user = Auth::checkUsername($username);
    if ($user === null) {
        return [
            "status" => "error",
            "data" => [],
            "message" => "Username tidak ditemukan",
        ];
    } else {
        $decrpty = Auth::checkPassword($password, $user["password"]);

        if(!$decrpty){
            return [
                "status" => "error",
                "data" => [],
                "message" => "Password Salah",
            ];
        }
        else{
            $_SESSION["username"] = $username;
            setcookie("username", $username, time() + 86400);

            header("Location: home.php");
        }
    }
}

public static function checkUsername($username)
{
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = DB::connect()->query($sql)->fetch_assoc();

    return $result;
}

public static function checkPassword($password, $password_hash)
{
   $decrypt = password_verify($password, $password_hash);

    return $decrypt;
}


}
