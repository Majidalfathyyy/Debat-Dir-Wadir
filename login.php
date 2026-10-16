<?php session_start(); if(isset($_SESSION['role'])) { header("Location: " . ($_SESSION['role'] == 'admin' ? 'admin.php' : 'voting.php')); exit; } ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Pemilih</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen" style="font-family: 'Inter', sans-serif;">
    <div class="bg-white p-10 rounded-2xl shadow-lg w-full max-w-md">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-[#1A2B4C] text-white rounded-full flex items-center justify-center mx-auto mb-4 text-2xl font-bold">V</div>
            <h2 class="text-2xl font-bold text-[#1A2B4C]">Login Bilik Suara</h2>
            <p class="text-gray-500 text-sm mt-2">Gunakan NIM/NIP Anda untuk masuk</p>
        </div>
        
        <form action="proses_login.php" method="POST">
            <div class="mb-5">
                <label class="block text-gray-700 text-sm font-bold mb-2">Username (NIM/NIP)</label>
                <input type="text" name="username" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#1A2B4C]">
            </div>
            <div class="mb-8">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#1A2B4C]">
            </div>
            <button type="submit" class="w-full bg-[#1A2B4C] hover:bg-blue-900 text-white font-bold py-3 px-4 rounded-xl transition shadow-md">Masuk ke Bilik Suara</button>
            
            <div class="text-center mt-4">
                <a href="index.php" class="text-sm text-gray-500 hover:text-[#1A2B4C]">← Kembali ke Beranda</a>
            </div>
        </form>
    </div>
</body>
</html>