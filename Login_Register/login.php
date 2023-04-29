<?php
require 'connect.php';
if (!empty($_SESSION["sira"])) {
    header("Location: login.php");
}
if (isset($_POST["submit1"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $duplicate = mysqli_query($conn, "SELECT * FROM gk WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> alert('Username or Email Has Already Taken'); </script>";
    } else {
        $query = "INSERT INTO gk(email,password,username) VALUES('$email','$password','$username')";
        mysqli_query($conn, $query);
        echo
        "<script> alert('Registration Successful'); </script>";
        header("Location: index.php");
    }
} else if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM gk WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row['password']) {
            $_SESSION["login"] = true;
            $_SESSION["sira"] = $row["sira"];
            header("Location: index.php");
        } else {
            echo
            "<script> alert('Wrong Password'); </script>";
        }
    } else {
        echo
        "<script> alert('User Not Registered'); </script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>
<header>
    <h2 class="logo">Logo</h2>
    <nav class="navigation">
        <a href="#">
            Home
        </a>
        <a href="#">
            About
        </a>
        <a href="#">
            Services
        </a>
        <a href="#">
            Contact
        </a>
        <button class="btnLogin-popup">Login</button>
    </nav>
</header>
<div class="wrapper">
    <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
    <div class="form-box login">
        <h2>Login</h2>
        <form action="#" method="post" autocomplete="off">
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" name="email" required id="email">
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="password" required id="password">
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" name="submit" class="btn">Login</button>
            <div class="login-register">
                <p>Don't have an account?<a href="#" class="register-link"> Register</a></p>
            </div>
        </form>
    </div>
    <div class="form-box register">
        <h2>Registration</h2>
        <form action="" method="post" autocomplete="off">
            <div class="input-box">
                <span class="icon"><ion-icon name="person"></ion-icon></span>
                <input type="text" name="username" required id="username">
                <label>Username</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" name="email" required id="email">
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="password" required id="password">
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> I agree to terms & conditions</label>
            </div>
            <button type="submit" id="submit1" name="submit1" class="btn">Register</button>
            <div class="login-register">
                <p>Already have an account?<a href="#" class="login-link"> Login</a></p>
            </div>
        </form>
    </div>
</div>

<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>