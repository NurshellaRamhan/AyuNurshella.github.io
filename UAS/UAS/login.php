<?php

// Memulai output buffering untuk menghindari masalah header
ob_start();

require 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);
    $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    $pass = mysqli_real_escape_string($conn, md5($filter_pass));

    // Melakukan query untuk memeriksa pengguna
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select_users) > 0) {
        $row = mysqli_fetch_assoc($select_users);

        // Periksa tipe pengguna
        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_email'] = $row['email'];
            $_SESSION['admin_id'] = $row['id'];

            // Mengarahkan ke halaman admin
            header('Location: /UAS/UAS/admin_page.php');
            exit();
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_id'] = $row['id'];

            // Mengarahkan ke halaman pengguna
            header('Location: /UAS/UAS/index.html');
            exit();
        } else {
            // Jika tidak ada tipe pengguna yang cocok
            $message[] = 'No user found!';
        }
    } else {
        // Jika email atau password salah
        $message[] = 'Incorrect email or password!';
    }
}

// Mengakhiri output buffering
ob_end_flush();
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
        gap: 2rem;
        margin: 0 auto;
        }

        .logo {
            width: 150px;
            height: 150px;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            padding-right: 150px;
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
            background-color: #1a237e;
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
        }

        .create-account {
            text-align: center;
            margin-top: 1rem;
        }

        .create-account a {
            color: #007bff;
            text-decoration: none;
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

        .footer-content.logo {
        margin-left: 1rem;
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
        foreach ($message as $msg) {
            echo '<div class="message" style="color: red; text-align: center;"><span>' . htmlspecialchars($msg) . '</span></div>';
        }
    }
    ?>


<form action="" method="post">
        <div class="login-container">
            <h1 class="login-header">LOGIN</h1>
            <div class="login-content">
                <div class="logo-container">
                    <img src="WEB US ASET/Logo 2.png" alt="Kaltim Fun Logo Large">
                </div>
                <div class="form-container" style="border: 1px solid #F5F5F5; padding: 1rem; border-radius: 8px;">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Type Here..." required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="pass" placeholder="Type Here..." required>
                    </div>
                    <button type="submit" class="login-button" name="submit">Login</button>
                    <div class="create-account">
                        <a href="register.php">Don't have an account? Create now</a>
                    </div>
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
                <a href="Things To Do.css">Things To Do</a>
                <a href="">Tickets</a>
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
    <script>
        
    </script>
</body>
</html>