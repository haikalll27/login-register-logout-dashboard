<?php
session_start();
include '../config/app.php'; // Sesuaikan path untuk include file database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) { // Menggunakan password_verify untuk memeriksa password yang di-hash
            // Login berhasil
            $_SESSION['email'] = $email;
            header("Location: ../pages/dashboard.php"); // Sesuaikan lokasi halaman dashboard.php
            exit;
        } else {
            // Password salah
            echo "Password salah. Silakan coba lagi.";
        }
    } else {
        // Email tidak ditemukan
        echo "Email tidak terdaftar.";
    }
}

$stmt->close();
$koneksi->close();
?>
