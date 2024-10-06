<?php
    $server = "localhost"; // nama server mysql
    $user = "root"; // nama user mysql
    $password = ""; // password user mysql
    $db_name = "ambulance_db"; // nama database yang digunakan

    // Melakukan koneksi ke dalam database
    $conn = mysqli_connect($server, $user, $password, $db_name);

    // Cek apakah koneksi berhasil?
    if (!$conn) {
        die("Gagal terhubung ke database: " . mysqli_connect_error());
    } else {
        echo "adawdawda";
    }
?>