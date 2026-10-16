<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['user_id']) || $_SESSION['has_voted'] == 1) {
    header("Location: user.php");
    exit;
}

$candidate_id = $_POST['candidate_id'];
$user_id = $_SESSION['user_id'];

// Tambah suara kandidat
mysqli_query($conn, "UPDATE candidates SET votes = votes + 1 WHERE id = '$candidate_id'");

// Update status user jadi sudah vote
mysqli_query($conn, "UPDATE users SET has_voted = 1 WHERE id = '$user_id'");
$_SESSION['has_voted'] = 1;

echo "<script>alert('Voting berhasil disimpan!'); window.location='user.php';</script>";
?>