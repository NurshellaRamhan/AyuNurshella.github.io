<?php

@include 'config.php';

if (isset($_POST['submit'])) {

    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);
    $filter_pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $pass = mysqli_real_escape_string($conn, md5($filter_pass)); // Hash password

    // Cek apakah email sudah terdaftar
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('Query failed');

    if (mysqli_num_rows($select_users) > 0) {
        $message[] = 'User already exists!';
    } else {
        // Insert data user baru
        mysqli_query($conn, "INSERT INTO `users` (email, password) VALUES ('$email', '$pass')") or die('Query failed');
        $message[] = 'Registered successfully!';
        header('location:login.php'); // Redirect ke halaman login
        exit; // Tambahkan exit setelah header redirect
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaltim Fun - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Poppins, sans-serif;
        }

        body {
            background-color: #f0f0f0;
        }

        .top-nav {
        background-color: #007bff;
        padding: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        }

        .top-nav .logo {
        margin-left: 1rem;
        }

        .top-nav .nav-links {
        display: flex;
        gap: 3rem;
        margin: 0 auto;
        padding-right: 150px;
        }

        .logo {
            width: 150px;
            height: 150px;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .login-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .login-header {
            text-align: center;
            color: #1a237e;
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        .login-content {
            display: flex;
            gap: 2rem;
            align-items: center;
            justify-content: center;
        }

        .logo-container {
            flex: 1;
            text-align: center;
        }

        .logo-container img {
            max-width: 300px;
            background-color: #f5f5f5;
            padding: 2rem;
            border-radius: 8px;
        }

        .form-container {
            flex: 1;
            padding: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }

        .login-button {
            background-color: #1E3A8A;
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
        }
        .footer {
            background-color: #007bff;
            color: white;
            padding: 2rem;
            margin-top: 2rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            padding-right: 550px;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-links img {
            width: 24px;
            height: 24px;
            filter: brightness(0) invert(1);
        }

       .logo-footer{
        width: 200px;
        height: 200px;
        }

        
        @media (max-width: 768px) {
            .login-content {
                flex-direction: column;
            }
            
            .logo-container img {
                max-width: 200px;
            }
        }
    </style>
</head>
<body>
    <nav class="top-nav">
        <img src="WEB US ASET/Logo 1.png" alt="Kaltim Fun Logo" class="logo">
        <div class="nav-links">
            <a href="index.html">Home</a>
            <a href="Introduction.html">Introduction</a>
            <a href="Things To Do.html">Things To Do</a>
            <a href="#">Tickets</a>
        </div>
    </nav>

    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '
            <div class="message">
                <span>' . $message . '</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
    }
    ?>
    <form action = "" method="post">
        <div class="login-container">
            <h1 class="login-header">REGISTER</h1>
            <div class="login-content">
                <div class="logo-container">
                    <img src="WEB US ASET/Logo 2.png" alt="Kaltim Fun Logo Large">
                </div>
            <div class="form-container" style="border: 1px solid #F5F5F5; padding: 1rem; border-radius: 8px;">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Type Here...">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Type Here...">
        </div>
        <button type="submit" class="login-button" name="submit">Register</button>
        </div>
            </div>
        </div>
    </form>

    <footer class="footer">

        <div class="footer-content">
            <img src="WEB US ASET/Logo 1.png" alt="Kaltim Fun Logo" class="logo-footer">
            <div class="footer-links">
                <a href="index.html">Home</a>
                <a href="Introduction.html">Introduction</a>
                <a href="Things To Do.html">Things To Do</a>
                <a href="#">Tickets</a>
            </div>
            <div class="social-links">
                <a href="#"><img src="/api/placeholder/24/24" alt="Facebook"></a>
                <a href="#"><img src="/api/placeholder/24/24" alt="Instagram"></a>
                <a href="#"><img src="/api/placeholder/24/24" alt="LinkedIn"></a>
            </div>
        </div>
        <div style="text-align: center; margin-top: 1rem;">
            ©copyright 2024 NUXT. All Right Reserved
        </div>
    </footer>
</body>
</html>