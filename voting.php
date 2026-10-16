<?php
session_start();
include 'koneksi.php';
// Cek sesi login
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'user'){ header("Location: login.php"); exit; }

// Ambil data kandidat
$kandidat_query = mysqli_query($conn, "SELECT * FROM candidates");
$kandidat = [];
while($row = mysqli_fetch_assoc($kandidat_query)) {
    $kandidat[] = $row;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilik Suara Digital - Pemilu</title>
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
                    colors: { navy: '#1A2B4C', accentRed: '#C62828' }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .fade-in { animation: fadeIn 0.4s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-gray-50 pb-10 antialiased">

<!-- Header Bilik Suara -->
<header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-40">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-navy text-white flex items-center justify-center rounded-lg shadow-sm">
                    <i class="fa-solid fa-person-booth text-lg"></i>
                </div>
                <div>
                    <h1 class="text-sm font-bold text-navy leading-tight">Bilik Suara Aktif</h1>
                    <p class="text-[10px] text-gray-500 font-medium">Sesi Terenkripsi</p>
                </div>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="hidden md:flex items-center gap-2 bg-blue-50 px-3 py-1.5 rounded-full border border-blue-100">
                    <i class="fa-regular fa-user text-navy text-xs"></i>
                    <span class="text-xs font-semibold text-navy">Pemilih: <?= $_SESSION['username'] ?></span>
                </div>
                <a href="logout.php" class="text-red-600 hover:text-red-800 text-sm font-bold transition flex items-center gap-2">
                    <i class="fa-solid fa-right-from-bracket"></i> Keluar
                </a>
            </div>
        </div>
    </div>
</header>

<main class="max-w-5xl mx-auto px-4 py-8 fade-in">
    <?php if($_SESSION['has_voted'] == 0): ?>
        
        <!-- Banner Peringatan -->
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8 rounded-r-lg shadow-sm">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="fa-solid fa-triangle-exclamation text-yellow-500"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-bold text-yellow-800">Perhatian Sebelum Memilih</h3>
                    <p class="text-sm text-yellow-700 mt-1">Gunakan hak pilih Anda dengan bijak. Pilihan bersifat permanen dan tidak dapat diubah atau dibatalkan setelah dikonfirmasi.</p>
                </div>
            </div>
        </div>

        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-black text-navy mb-3">Tentukan Pilihan Anda</h2>
            <p class="text-gray-600 text-sm md:text-base">Klik salah satu kartu pasangan calon di bawah ini untuk memulai proses verifikasi pilihan.</p>
        </div>

        <!-- Kartu Pemilihan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-10">
            <?php foreach($kandidat as $k): ?>
            <!-- Modifikasi onclick untuk mengirim image ke Javascript -->
            <div class="bg-white rounded-3xl overflow-hidden shadow-md border-2 border-transparent hover:border-navy hover:shadow-2xl transition-all duration-300 cursor-pointer transform hover:-translate-y-1 group" 
                 onclick="selectCandidate(<?= $k['id'] ?>, '<?= htmlspecialchars($k['name'], ENT_QUOTES) ?>', '<?= $k['image'] ?>')">
                
                <div class="h-80 md:h-96 bg-gray-200 relative overflow-hidden">
                    <img src="<?= $k['image'] ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                
                <div class="p-6 md:p-8 text-center relative">
                    <h3 class="text-2xl font-bold text-navy mb-6 group-hover:text-blue-700 transition-colors"><?= $k['name'] ?></h3>
                    <div class="w-full bg-blue-50 text-blue-900 border border-blue-100 font-bold py-3.5 rounded-xl group-hover:bg-navy group-hover:text-white transition-all duration-300 shadow-sm flex justify-center items-center gap-2">
                        <i class="fa-solid fa-check-to-slot"></i> Pilih Pasangan Ini
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>
        <!-- Halaman Sukses Voting -->
        <div class="max-w-2xl mx-auto text-center bg-white p-10 md:p-16 rounded-3xl shadow-sm border border-gray-100 mt-10">
            <div class="w-24 h-24 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
                <i class="fa-solid fa-check-double text-5xl"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-black text-navy mb-4">Terima Kasih!</h2>
            <p class="text-gray-600 text-lg mb-8 leading-relaxed">Suara Anda telah berhasil direkam secara aman ke dalam sistem database. Partisipasi Anda sangat berarti bagi kemajuan kita bersama.</p>
            <a href="index.php" class="inline-block bg-navy hover:bg-blue-900 text-white font-semibold px-8 py-4 rounded-xl transition shadow-md hover:shadow-lg transform hover:-translate-y-1">
                <i class="fa-solid fa-house mr-2"></i> Kembali ke Beranda Publik
            </a>
        </div>
    <?php endif; ?>
</main>

<!-- ================= MODAL KONFIRMASI & VERIFIKASI ================= -->
<div id="confirmation-modal" class="fixed inset-0 bg-gray-900 bg-opacity-70 z-50 hidden flex items-center justify-center p-4 backdrop-blur-sm transition-opacity">
    <div class="bg-white rounded-3xl max-w-lg w-full p-6 md:p-8 text-center shadow-2xl transform transition-all scale-100">
        
        <h3 class="text-2xl font-black text-navy mb-2">Verifikasi Pilihan</h3>
        <p class="text-gray-500 text-sm mb-5">Silakan periksa kembali dan konfirmasi pilihan Anda.</p>
        
        <!-- Preview Foto & Nama Pilihan -->
        <div class="bg-gray-50 border border-gray-200 rounded-2xl p-5 mb-6 flex flex-col items-center shadow-inner">
            <p class="text-xs text-gray-500 uppercase tracking-widest font-bold mb-3">Anda Akan Memilih:</p>
            <!-- Tempat Foto Kandidat -->
            <div class="w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden shadow-md mb-4 border-4 border-white ring-2 ring-navy">
                <img id="modal-candidate-img" src="" alt="Foto Kandidat" class="w-full h-full object-cover">
            </div>
            <p id="modal-candidate-name" class="text-xl md:text-2xl font-bold text-navy text-center">Nama Kandidat</p>
        </div>

        <!-- Checkbox Verifikasi Bertahap -->
        <div class="text-left bg-blue-50/50 p-4 rounded-xl border border-blue-100 mb-6 space-y-3">
            <p class="text-xs font-bold text-navy mb-2 border-b border-blue-200 pb-2">Mohon centang pernyataan berikut:</p>
            
            <label class="flex items-start gap-3 cursor-pointer group">
                <input type="checkbox" id="check1" onchange="validateCheckboxes()" class="mt-1 w-4 h-4 text-navy rounded border-gray-300 focus:ring-navy cursor-pointer">
                <span class="text-sm text-gray-700 font-medium group-hover:text-navy transition">Apakah foto dan nama kandidat di atas <b>sudah benar</b> sesuai dengan pilihan Anda?</span>
            </label>
            
            <label class="flex items-start gap-3 cursor-pointer group">
                <input type="checkbox" id="check2" onchange="validateCheckboxes()" class="mt-1 w-4 h-4 text-navy rounded border-gray-300 focus:ring-navy cursor-pointer">
                <span class="text-sm text-gray-700 font-medium group-hover:text-navy transition">Apakah keputusan ini Anda buat secara <b>sadar, rahasia, dan tanpa paksaan</b>?</span>
            </label>
            
            <label class="flex items-start gap-3 cursor-pointer group">
                <input type="checkbox" id="check3" onchange="validateCheckboxes()" class="mt-1 w-4 h-4 text-navy rounded border-gray-300 focus:ring-navy cursor-pointer">
                <span class="text-sm text-red-600 font-semibold group-hover:text-red-700 transition">Saya mengerti bahwa suara yang disubmit <b>permanen dan tidak dapat diubah</b>.</span>
            </label>
        </div>

        <!-- Form Submit -->
        <form action="proses_vote.php" method="POST">
            <input type="hidden" name="candidate_id" id="form_candidate_id">
            <div class="flex gap-3 mt-4">
                <button type="button" onclick="closeModal()" class="w-full bg-white border-2 border-gray-200 text-gray-700 font-bold py-3.5 rounded-xl hover:bg-gray-50 hover:border-gray-300 transition-all">
                    Batal
                </button>
                
                <!-- Tombol ini disabled secara default (Abu-abu), diaktifkan via JS jika 3 ceklis aktif -->
                <button type="submit" id="btn-submit" disabled class="w-full bg-gray-300 text-gray-500 font-bold py-3.5 rounded-xl cursor-not-allowed transition-all duration-300 flex justify-center items-center gap-2">
                    <i class="fa-solid fa-lock" id="btn-icon"></i> Ya, Yakin
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Fungsi dipanggil saat kartu diclik
    function selectCandidate(id, name, image_url) {
        // Set nama dan ID
        document.getElementById('modal-candidate-name').innerText = name;
        document.getElementById('form_candidate_id').value = id;
        
        // Set gambar ke dalam tag img di modal
        document.getElementById('modal-candidate-img').src = image_url;
        
        // Reset checkbox & tombol setiap modal dibuka
        document.getElementById('check1').checked = false;
        document.getElementById('check2').checked = false;
        document.getElementById('check3').checked = false;
        validateCheckboxes();
        
        // Tampilkan Modal
        document.getElementById('confirmation-modal').classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Kunci scroll background
    }

    // Fungsi untuk menutup modal
    function closeModal() {
        document.getElementById('confirmation-modal').classList.add('hidden');
        document.body.style.overflow = 'auto'; // Buka kunci scroll
    }

    // Fungsi Validasi Checkbox (Mengunci / Membuka Tombol Submit)
    function validateCheckboxes() {
        const check1 = document.getElementById('check1').checked;
        const check2 = document.getElementById('check2').checked;
        const check3 = document.getElementById('check3').checked;
        const btnSubmit = document.getElementById('btn-submit');
        const btnIcon = document.getElementById('btn-icon');

        if (check1 && check2 && check3) {
            // Jika ketiga nya di ceklis -> BUKA TOMBOL
            btnSubmit.disabled = false;
            btnSubmit.className = "w-full bg-accentRed hover:bg-red-700 text-white font-bold py-3.5 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex justify-center items-center gap-2";
            btnIcon.className = "fa-solid fa-lock-open";
        } else {
            // Jika belum -> KUNCI TOMBOL
            btnSubmit.disabled = true;
            btnSubmit.className = "w-full bg-gray-300 text-gray-500 font-bold py-3.5 rounded-xl cursor-not-allowed transition-all duration-300 flex justify-center items-center gap-2";
            btnIcon.className = "fa-solid fa-lock";
        }
    }
</script>
</body>
</html>