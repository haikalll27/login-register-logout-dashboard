<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($koneksi->query($sql) === TRUE) {
        // Registrasi berhasil, arahkan pengguna ke halaman login
        header("Location: login.php");
        exit; // Penting: pastikan untuk mengakhiri skrip setelah header diubah
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>
