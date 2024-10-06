<?php
    require 'koneksi.php'; // connect to the database

    // Collecting form data
    $nama_pasien = $_POST['nama_pasien'];
    $id_pasien = $_POST['id_pasien']; // assuming this is provided
    $id_pendaftar = $_POST['id_pendaftar']; // assuming this is provided
    $nik = $_POST['nik'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $agama = $_POST['agama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur_pasien = $_POST['umur_pasien'];
    $kebutuhan_ambulans = $_POST['kebutuhan_ambulans'];
    $diagnosa = $_POST['diagnosa'];
    $tambahan = $_POST['tambahan'];
    $kondisi = $_POST['kondisi'];

    // Creating the SQL query with all necessary fields
    $query_sql = "INSERT INTO data_pasien (id_pasien, id_pendaftar, nama_pasien, nik, tempat_lahir, tanggal_lahir, agama, jenis_kelamin, umur_pasien, kebutuhan_ambulans, diagnosa, tambahan, kondisi)
    VALUES ('$id_pasien', '$id_pendaftar', '$nama_pasien', '$nik', '$tempat_lahir', '$tanggal_lahir', '$agama', '$jenis_kelamin', '$umur_pasien', '$kebutuhan_ambulans', '$diagnosa', '$tambahan', '$kondisi')";

    // Executing the query
    if (mysqli_query($conn, $query_sql)) {
        header("Location: index.php"); // Redirect to index on success
    } else {
        echo "gagal menyimpan data: " . mysqli_error($conn); // Error handling
    }
?>
