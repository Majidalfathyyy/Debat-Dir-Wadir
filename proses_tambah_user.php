<?php
session_start();
include 'koneksi.php';

// Pastikan hanya admin yang bisa mengakses
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    die("Akses ditolak.");
}

$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah username (NIM/NIP) sudah ada di database
$cek = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
if(mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Gagal! Username (NIM/NIP) sudah terdaftar.'); window.location='admin.php';</script>";
} else {
    // Simpan ke database dengan role default 'user'
    $insert = mysqli_query($conn, "INSERT INTO users (username, password, role, has_voted) VALUES ('$username', '$password', 'user', 0)");
    
    if($insert) {
        echo "<script>alert('Akun pemilih berhasil ditambahkan!'); window.location='admin.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan akun.'); window.location='admin.php';</script>";
    }
}
?>