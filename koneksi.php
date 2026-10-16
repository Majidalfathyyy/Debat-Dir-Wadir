<?php
$host = "localhost";
$user = "root";
$pass = ""; // sesuaikan jika ada password mysql
$db   = "db_pemilu";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>