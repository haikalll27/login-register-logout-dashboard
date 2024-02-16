<?php
$host = "localhost"; // Ganti dengan nama host Anda
$username = "root"; // Ganti dengan nama pengguna database Anda
$password = "root"; // Ganti dengan kata sandi database Anda
$database = "db_login_php"; // Ganti dengan nama database Anda

$koneksi = new mysqli('localhost', 'root', 'root', 'db_login_php');

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $conkoneksi->connect_error);
}
?>