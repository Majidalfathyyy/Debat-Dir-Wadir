<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    die("Akses ditolak.");
}

$ids = $_POST['id'];
$suaras = $_POST['suara'];

for($i = 0; $i < count($ids); $i++) {
    $id = $ids[$i];
    $suara_baru = $suaras[$i];
    
    mysqli_query($conn, "UPDATE candidates SET votes = '$suara_baru' WHERE id = '$id'");
}

echo "<script>alert('Hasil suara berhasil diubah!'); window.location='admin.php';</script>";
?>