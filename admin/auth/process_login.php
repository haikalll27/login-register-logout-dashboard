<?php
session_start();
include '../auth/config.php'; // Sesuaikan path untuk include file config.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Login berhasil
        $_SESSION['email'] = $email;
        header("Location: ../../dashboard.php"); // Sesuaikan lokasi halaman dashboard.php
        exit; // Penting: pastikan untuk mengakhiri skrip setelah header diubah
    } else {
        // Login gagal
        echo "Login gagal. Silakan coba lagi.";
    }
}

$koneksi->close();
?>
