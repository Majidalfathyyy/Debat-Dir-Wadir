<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){ header("Location: index.php"); exit; }

// Ambil data kandidat
$q = mysqli_query($conn, "SELECT * FROM candidates");
$kandidat = [];
$total_suara = 0;
while($row = mysqli_fetch_assoc($q)) {
    $kandidat[] = $row;
    $total_suara += $row['votes'];
}

// Ambil total data pemilih untuk ditampilkan di dashboard
$q_users = mysqli_query($conn, "SELECT COUNT(*) as total_users FROM users WHERE role='user'");
$total_pemilih = mysqli_fetch_assoc($q_users)['total_users'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Pemilihan</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        navy: '#1A2B4C',
                        accentRed: '#C62828',
                        lightGray: '#F8F9FA'
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8F9FA; }
        .fade-in { animation: fadeIn 0.4s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="text-gray-800 antialiased">

    <!-- Navbar Admin -->
    <header class="bg-white sticky top-0 z-50 border-b border-gray-200 shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-navy text-white flex items-center justify-center rounded-lg shadow-sm">
                        <i class="fa-solid fa-user-shield text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-sm font-bold text-navy leading-tight">Admin Control Panel</h1>
                        <p class="text-[10px] text-gray-500 font-medium">Pemilihan 2026-2028</p>
                    </div>
                </div>
                <a href="logout.php" class="bg-red-50 text-accentRed hover:bg-red-100 border border-red-100 hover:border-red-200 px-4 py-2 rounded-xl text-sm font-semibold transition flex items-center gap-2">
                    <i class="fa-solid fa-power-off"></i> <span class="hidden sm:inline">Keluar</span>
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8 fade-in pb-20">
        
        <div class="mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-navy">Monitoring Hasil Voting</h2>
            <p class="text-gray-500 text-sm mt-1">Pantau perolehan suara secara real-time atau manipulasi data jika diperlukan.</p>
        </div>

        <!-- TAMPILAN KANAN KIRI FOTO & PERSENTASE -->
        <div class="bg-white p-6 md:p-10 rounded-3xl shadow-sm border border-gray-100 mb-10 text-center relative overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute top-0 left-0 w-full h-32 bg-gradient-to-b from-blue-50 to-white -z-10"></div>

            <button id="btnMulai" onclick="tampilkanPersentase()" class="relative z-10 bg-navy hover:bg-blue-900 text-white px-8 py-4 rounded-xl font-bold mb-8 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center gap-3 mx-auto text-sm md:text-base">
                <i class="fa-solid fa-chart-pie text-xl animate-pulse"></i> Tampilkan Kalkulasi Persentase
            </button>

            <!-- Menggunakan Grid agar di HP atas-bawah, di PC kanan-kiri -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 mt-4">
                <?php foreach($kandidat as $index => $k): 
                    $persen = ($total_suara > 0) ? round(($k['votes'] / $total_suara) * 100, 1) : 0;
                    // Warna dinamis: Paslon 1 Navy, Paslon 2 Merah
                    $colorClass = ($index == 0) ? 'text-navy' : 'text-accentRed';
                    $bgClass = ($index == 0) ? 'bg-navy' : 'bg-accentRed';
                ?>
                <div class="flex flex-col items-center">
                    <div class="w-full relative rounded-2xl overflow-hidden shadow-md mb-5 group h-64 md:h-80">
                        <img src="<?= $k['image'] ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute top-3 left-3 <?= $bgClass ?> text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm">
                            Paslon <?= $index + 1 ?>
                        </div>
                    </div>
                    
                    <h3 class="text-lg md:text-xl font-bold text-gray-800 leading-snug px-2"><?= $k['name'] ?></h3>
                    
                    <!-- Hasil Tersembunyi Awalnya -->
                    <div class="hasil-persen hidden mt-5 w-full">
                        <div class="flex justify-between items-end mb-1 px-1">
                            <p class="text-sm text-gray-500 font-medium"><i class="fa-solid fa-check-to-slot mr-1"></i> <?= number_format($k['votes'], 0, ',', '.') ?> Suara</p>
                            <p class="text-4xl md:text-5xl font-black <?= $colorClass ?>"><?= $persen ?>%</p>
                        </div>
                        
                        <div class="w-full bg-gray-100 rounded-full h-4 overflow-hidden shadow-inner">
                            <div id="bar-<?= $index ?>" class="<?= $bgClass ?> h-4 rounded-full transition-all duration-1000 ease-out" style="width: 0%" data-width="<?= $persen ?>%"></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- ================= PANEL TAMBAH USER ================= -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden mb-10">
            <div class="bg-blue-50 border-b border-blue-100 px-6 md:px-10 py-5 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm text-navy">
                        <i class="fa-solid fa-user-plus text-lg"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-navy">Manajemen Data Pemilih</h2>
                        <p class="text-xs text-blue-600 font-medium">Tambahkan Akun untuk Peserta Pemilu</p>
                    </div>
                </div>
                <div class="hidden sm:block text-right">
                    <span class="bg-white px-4 py-2 rounded-lg text-sm font-bold text-navy border border-blue-100 shadow-sm">
                        Total: <?= $total_pemilih ?> Pemilih
                    </span>
                </div>
            </div>
            
            <div class="p-6 md:p-10">
                <form action="proses_tambah_user.php" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6 items-end">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2 text-sm">Username (NIM/NIP)</label>
                        <div class="relative">
                            <i class="fa-solid fa-id-card absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" name="username" placeholder="Masukkan NIM/NIP..." class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-navy focus:border-transparent transition-all" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2 text-sm">Password</label>
                        <div class="relative">
                            <i class="fa-solid fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="password" name="password" placeholder="Masukkan password..." class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-navy focus:border-transparent transition-all" required>
                        </div>
                    </div>
                    <div class="md:col-span-2 flex justify-end mt-2">
                        <button type="submit" class="w-full md:w-auto bg-navy hover:bg-blue-900 text-white px-8 py-3.5 rounded-xl font-bold transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-plus"></i> Tambahkan Akun Pemilih
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- ================= /PANEL TAMBAH USER ================= -->

        <!-- MENU UBAH SUARA -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="bg-red-50 border-b border-red-100 px-6 md:px-10 py-5 flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm text-accentRed">
                    <i class="fa-solid fa-sliders text-lg"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-accentRed">Panel Manipulasi Suara</h2>
                    <p class="text-xs text-red-500 font-medium">Hanya dapat diakses oleh Administrator</p>
                </div>
            </div>
            
            <div class="p-6 md:p-10">
                <form action="proses_ubah_suara.php" method="POST" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                        <?php foreach($kandidat as $index => $k): ?>
                        <div class="bg-gray-50 p-5 rounded-2xl border border-gray-200">
                            <label class="block text-gray-700 font-bold mb-3 text-sm">
                                Suara Paslon <?= $index + 1 ?>: <span class="text-navy"><?= $k['name'] ?></span>
                            </label>
                            <input type="hidden" name="id[]" value="<?= $k['id'] ?>">
                            <div class="relative">
                                <i class="fa-solid fa-hashtag absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="number" name="suara[]" value="<?= $k['votes'] ?>" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-accentRed focus:border-transparent transition-all font-semibold text-lg text-gray-800" required>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="pt-4 flex justify-end border-t border-gray-100 mt-6">
                        <button type="submit" class="w-full md:w-auto bg-accentRed hover:bg-red-700 text-white px-8 py-3.5 rounded-xl font-bold transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <script>
        function tampilkanPersentase() {
            // Animasi Sembunyikan tombol
            const btnMulai = document.getElementById('btnMulai');
            btnMulai.style.transform = 'scale(0.9)';
            btnMulai.style.opacity = '0';
            setTimeout(() => { btnMulai.style.display = 'none'; }, 300);
            
            // Tampilkan elemen hasil dengan efek fade in
            let hasilElements = document.querySelectorAll('.hasil-persen');
            hasilElements.forEach(el => {
                el.classList.remove('hidden');
                el.classList.add('fade-in');
            });

            // Animasi bar persentase meluncur perlahan
            setTimeout(() => {
                let bars = document.querySelectorAll('[id^="bar-"]');
                bars.forEach(bar => {
                    bar.style.width = bar.getAttribute('data-width');
                });
            }, 100);
        }
    </script>
</body>
</html>