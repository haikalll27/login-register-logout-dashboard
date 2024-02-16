<?php
include('../config/app.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Menggunakan password_hash untuk meng-hash password

    // Periksa apakah email sudah terdaftar sebelumnya
    $stmt = $koneksi->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Email sudah terdaftar."; // Menampilkan pesan jika email sudah terdaftar
    } else {
        // Insert data ke database menggunakan prepared statement
        $stmt = $koneksi->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);
        if ($stmt->execute()) {
            // Registrasi berhasil, arahkan pengguna ke halaman login
            header("Location: login.php");
            exit;
        } else {
            echo "Error: " . $koneksi->error;
        }
    }
}

$koneksi->close();
?>
