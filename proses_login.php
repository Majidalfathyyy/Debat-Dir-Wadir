<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
    $_SESSION['user_id'] = $data['id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];
    $_SESSION['has_voted'] = $data['has_voted'];

    if ($data['role'] == 'admin') {
        header("Location: admin.php");
    } else {
        header("Location: voting.php"); // <--- Arahkan ke bilik suara
    }
} else {
    echo "<script>alert('Username atau Password salah!'); window.location='login.php';</script>";
}
?>