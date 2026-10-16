<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemilihan Direktur & Wakil Direktur 2026-2028</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        navy: '#1A2B4C',
                        accentRed: '#C62828',
                        lightGray: '#F8F9FA',
                        cardBorder: '#E5E7EB'
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8F9FA; scroll-behavior: smooth; }
        
        /* Animasi Transisi Halaman */
        .fade-in { animation: fadeIn 0.5s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(15px); } to { opacity: 1; transform: translateY(0); } }
        
        /* Animasi Mengambang untuk Gambar Hero */
        .float-anim { animation: float 6s ease-in-out infinite; }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }

        /* Efek Teks Muncul dari Bawah (Slide Up) */
        .slide-up { animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards; opacity: 0; }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .delay-100 { animation-delay: 100ms; }
        .delay-200 { animation-delay: 200ms; }
        .delay-300 { animation-delay: 300ms; }
        .delay-400 { animation-delay: 400ms; }

        .hero-illustration {
            background-image: url('https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&q=80&w=800');
            background-size: cover; background-position: center; border-radius: 1rem; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="text-gray-800 antialiased pb-20 md:pb-0 overflow-x-hidden">

    <!-- ================= HEADER ================= -->
    <header class="bg-white sticky top-0 z-40 border-b border-gray-100 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo & Branding -->
                <div class="flex items-center gap-3 cursor-pointer group" onclick="showPage('home-page')">
                    <div class="w-10 h-10 flex items-center justify-center rounded-lg overflow-hidden transform transition duration-300 group-hover:scale-110 group-hover:rotate-3">
                        <img src="img/logoCMC.png" alt="Logo Organisasi" class="w-full h-full object-contain">
                    </div>
                    <div class="hidden sm:block transform transition duration-300 group-hover:translate-x-1">
                        <h1 class="text-xs font-bold text-navy leading-tight uppercase">Pemilihan Direktur & Wadir</h1>
                        <p class="text-[10px] text-gray-500 font-medium">Periode 2026-2028</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex space-x-6 text-sm font-medium text-gray-600">
                    <button onclick="showPage('home-page')" class="nav-link text-navy font-semibold hover:text-navy transition transform hover:scale-105">Beranda</button>
                    <button onclick="showPage('candidate-page')" class="nav-link hover:text-navy transition transform hover:scale-105">Calon Pasangan</button>
                    <button onclick="showPage('candidate-page')" class="nav-link hover:text-navy transition transform hover:scale-105">Visi & Misi</button>
                    <button onclick="showPage('procedures-page')" class="nav-link hover:text-navy transition transform hover:scale-105">Tata Cara</button>
                    <button onclick="showPage('faq-page')" class="nav-link hover:text-navy transition transform hover:scale-105">FAQ</button>
                </nav>

                <!-- Desktop Right Actions -->
                <div class="hidden md:flex items-center gap-4">
                    <div class="relative group">
                        <i class="fa-solid fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm transition group-hover:text-navy"></i>
                        <input type="text" placeholder="Cari Calon" class="pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-navy focus:border-transparent w-48 transition-all duration-300 hover:border-navy">
                    </div>
                    <a href="login.php" class="bg-accentRed hover:bg-red-700 text-white text-sm font-medium px-5 py-2.5 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 active:scale-95 inline-block">
                        Voting Sekarang
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <a href="login.php" class="text-accentRed font-semibold text-sm mr-4 transition transform hover:scale-105">Voting</a>
                    <button class="text-gray-600 hover:text-navy focus:outline-none transition transform hover:rotate-90 duration-300">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- ================= MAIN CONTENT ================= -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12 min-h-[calc(100vh-160px)]">
        
        <!-- ====== HOME PAGE ====== -->
        <section id="home-page" class="page-section fade-in block">
            <div class="flex flex-col-reverse lg:flex-row items-center gap-10 lg:gap-16 mb-12">
                <div class="w-full lg:w-1/2 space-y-6 text-center lg:text-left">
                    <h1 class="text-4xl md:text-5xl lg:text-5xl font-bold text-navy leading-tight slide-up delay-100">
                        Tentukan Arah Masa Depan Organisasi Kita
                    </h1>
                    <p class="text-gray-600 text-base md:text-lg leading-relaxed max-w-xl mx-auto lg:mx-0 slide-up delay-200">
                        Gunakan hak suara Anda dalam Pemilihan Direktur dan Wakil Direktur Periode 2026-2028. Jujur, adil, dan transparan.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2 slide-up delay-300">
                        <a href="login.php" class="w-full sm:w-auto bg-navy hover:bg-blue-900 text-white font-medium px-8 py-3.5 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-2 group">
                            <i class="fa-solid fa-gavel transition-transform duration-300 group-hover:rotate-12"></i> Mulai Voting
                        </a>
                        <button onclick="showPage('candidate-page')" class="w-full sm:w-auto bg-white border border-gray-300 hover:border-navy text-navy font-medium px-8 py-3.5 rounded-lg transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-1 active:scale-95">
                            Lihat Kandidat
                        </button>
                    </div>
                </div>
               <div class="w-full lg:w-1/2 -mx-4 sm:-mx-6 md:mx-0">
    <!-- Wadah Gambar diperlebar maksimal dengan aspect ratio lanskap luas -->
    <div class="w-full aspect-[16/7.5] sm:aspect-[16/8] relative float-anim sm:rounded-2xl overflow-hidden shadow-[0_20px_25px_-5px_rgba(0,0,0,0.1)]">
        
        <!-- Gambar Latar / Organisasi -->
        <img src="img/cmcPolines.png" alt="Ilustrasi Organisasi" class="w-full h-full object-cover object-center">
        
        <!-- Efek overlay transparan -->
        <div class="absolute inset-0 bg-navy/10 transition duration-500 hover:bg-navy/0 pointer-events-none"></div>
        
    </div>
</div>
            </div>
            </div>

            <!-- ================= BANNER PARTNER/SPONSOR YANG DIPERBARUI ================= -->
            <div class="w-full mb-16 slide-up delay-400">
                <!-- Header Sponsor -->
                <div class="flex items-center justify-center mb-6">
                    <div class="h-px bg-gray-300 flex-1 max-w-[100px] md:max-w-xs"></div>
                    <p class="text-center text-xs md:text-sm font-bold text-gray-500 uppercase tracking-widest mx-4">Didukung Oleh</p>
                    <div class="h-px bg-gray-300 flex-1 max-w-[100px] md:max-w-xs"></div>
                </div>
                
                <!-- Kotak Putih Tempat Logo -->
                <div class="bg-white rounded-3xl p-6 md:p-8 lg:p-10 shadow-sm border border-gray-100 flex justify-center items-center transition-all duration-300 hover:shadow-md group">
                    <!-- 
                        PASTIKAN FILE ANDA BERFORMAT .PNG JIKA INGIN TRANSPARAN 
                        Efek grayscale akan membuat logo abu-abu, dan menyala saat di-hover 
                    -->
                    <img src="img/Semua Logo New .png" alt="Logo Mitra dan Sponsor" class="w-full h-auto object-contain max-h-12 md:max-h-20 lg:max-h-24  transition-all duration-500 cursor-pointer transform group-hover:scale-[1.02]">
                </div>
            </div>
            <!-- ================= /BANNER PARTNER/SPONSOR ================= -->

            <!-- Feature Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div onclick="showPage('candidate-page')" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 cursor-pointer transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group">
                    <div class="w-12 h-12 bg-blue-50 text-navy rounded-xl flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110 group-hover:bg-navy group-hover:text-white"><i class="fa-solid fa-users text-xl"></i></div>
                    <h3 class="text-lg font-bold text-navy mb-2 group-hover:text-blue-700 transition">Pasangan Calon</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Kenali visi, misi, dan program kerja para kandidat direktur & wadir.</p>
                </div>
                <div onclick="showPage('procedures-page')" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 cursor-pointer transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group">
                    <div class="w-12 h-12 bg-blue-50 text-navy rounded-xl flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110 group-hover:bg-navy group-hover:text-white"><i class="fa-solid fa-clipboard-check text-xl"></i></div>
                    <h3 class="text-lg font-bold text-navy mb-2 group-hover:text-blue-700 transition">Tata Cara Voting</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Panduan lengkap demi lancarnya cara memberikan suara secara digital.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group">
                    <div class="w-12 h-12 bg-blue-50 text-navy rounded-xl flex items-center justify-center mb-4 transition-transform duration-300 group-hover:scale-110 group-hover:bg-navy group-hover:text-white"><i class="fa-regular fa-calendar text-xl"></i></div>
                    <h3 class="text-lg font-bold text-navy mb-2 group-hover:text-blue-700 transition">Jadwal & Tahapan</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Pantau linimasa dari kampanye hingga pengumuman hasil.</p>
                </div>
            </div>
        </section>

        <!-- ====== CANDIDATE PAGE ====== -->
        <section id="candidate-page" class="page-section fade-in hidden">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4">Pasangan Calon Direktur & Wakil Direktur</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Kenali visi, misi, dan program kerja unggulan dari setiap pasangan calon sebelum menentukan pilihan Anda.</p>
            </div>

            <div class="space-y-10">
                <!-- Candidate 1 -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 flex flex-col md:flex-row transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 group">
                    <div class="md:w-2/5 h-80 md:h-auto bg-gray-200 relative overflow-hidden">
                        <img src="img/WhatsApp Image 2026-10-10 at 23.47.15.jpeg" alt="Pasangan Calon 1" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 left-4 bg-navy text-white font-bold px-4 py-2 rounded-lg shadow-md transform transition duration-300 group-hover:-translate-y-1">Nomor Urut 1</div>
                    </div>
                    <div class="md:w-3/5 p-8 md:p-10 flex flex-col justify-center">
                        <h3 class="text-2xl md:text-3xl font-bold text-navy mb-2">Dayat & Taslim</h3>
                        <p class="text-accentRed font-semibold mb-6 flex items-center gap-2"><i class="fa-solid fa-bullseye animate-pulse"></i> "Sinergi Kreatif untuk Organisasi yang Adaptif dan Inklusif"</p>
                        
                        <div class="space-y-4 mb-8">
                            <div class="transform transition duration-300 hover:translate-x-2">
                                <h4 class="font-bold text-gray-800 mb-2 flex items-center gap-2"><i class="fa-solid fa-eye text-navy"></i> Visi</h4>
                                <p class="text-gray-600 text-sm leading-relaxed">Menjadikan organisasi sebagai wadah kolaborasi yang mengedepankan inovasi digital, pengembangan sumber daya manusia, serta keterbukaan informasi bagi seluruh anggota.</p>
                            </div>
                            <div class="transform transition duration-300 hover:translate-x-2">
                                <h4 class="font-bold text-gray-800 mb-2 flex items-center gap-2"><i class="fa-solid fa-list-check text-navy"></i> Misi</h4>
                                <ul class="text-gray-600 text-sm space-y-2 list-disc list-inside hover:text-gray-800 transition">
                                    <li>Digitalisasi sistem kerja dan administrasi organisasi secara menyeluruh.</li>
                                    <li>Mengadakan pelatihan dan peningkatan kapasitas anggota secara berkala.</li>
                                    <li>Mewujudkan transparansi laporan keuangan dan program kerja.</li>
                                </ul>
                            </div>
                        </div>
                        <a href="login.php" class="self-start bg-navy hover:bg-blue-900 text-white font-medium px-6 py-3 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1 active:scale-95 inline-block">
                            Pilih Pasangan Ini
                        </a>
                    </div>
                </div>

                <!-- Candidate 2 -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 flex flex-col md:flex-row transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 group">
                    <div class="md:w-2/5 h-80 md:h-auto bg-gray-200 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=600" alt="Pasangan Calon 2" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute top-4 left-4 bg-navy text-white font-bold px-4 py-2 rounded-lg shadow-md transform transition duration-300 group-hover:-translate-y-1">Nomor Urut 2</div>
                    </div>
                    <div class="md:w-3/5 p-8 md:p-10 flex flex-col justify-center">
                        <h3 class="text-2xl md:text-3xl font-bold text-navy mb-2">Andi Pratama & Siti Aminah</h3>
                        <p class="text-accentRed font-semibold mb-6 flex items-center gap-2"><i class="fa-solid fa-bullseye animate-pulse"></i> "Membangun Fondasi Solid, Berprestasi, dan Berkelanjutan"</p>
                        
                        <div class="space-y-4 mb-8">
                            <div class="transform transition duration-300 hover:translate-x-2">
                                <h4 class="font-bold text-gray-800 mb-2 flex items-center gap-2"><i class="fa-solid fa-eye text-navy"></i> Visi</h4>
                                <p class="text-gray-600 text-sm leading-relaxed">Menciptakan organisasi yang solid, berdaya saing tinggi, serta mampu memberikan kontribusi nyata bagi kesejahteraan seluruh anggotanya melalui program yang berkelanjutan.</p>
                            </div>
                            <div class="transform transition duration-300 hover:translate-x-2">
                                <h4 class="font-bold text-gray-800 mb-2 flex items-center gap-2"><i class="fa-solid fa-list-check text-navy"></i> Misi</h4>
                                <ul class="text-gray-600 text-sm space-y-2 list-disc list-inside hover:text-gray-800 transition">
                                    <li>Memperkuat jaringan alumni dan kerjasama dengan pihak eksternal.</li>
                                    <li>Optimalisasi program kerja yang berdampak langsung pada anggota.</li>
                                    <li>Meningkatkan kesejahteraan dan fasilitas pendukung anggota.</li>
                                </ul>
                            </div>
                        </div>
                        <a href="login.php" class="self-start bg-navy hover:bg-blue-900 text-white font-medium px-6 py-3 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1 active:scale-95 inline-block">
                            Pilih Pasangan Ini
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ====== PROCEDURES PAGE ====== -->
        <section id="procedures-page" class="page-section fade-in hidden">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4">Tata Cara Voting</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Ikuti langkah-langkah mudah berikut untuk memberikan hak suara Anda secara digital.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Step 1 to 4 with Hover Animations -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center relative transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group">
                    <div class="w-16 h-16 bg-navy text-white text-2xl font-bold rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-blue-50 transition-all duration-300 group-hover:scale-110 group-hover:bg-blue-700 group-hover:border-blue-100">1</div>
                    <h3 class="text-lg font-bold text-navy mb-2 group-hover:text-blue-700 transition">Login Akun</h3>
                    <p class="text-sm text-gray-500">Masuk menggunakan NIM/NIP dan password yang telah terdaftar di sistem.</p>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center relative transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group">
                    <div class="w-16 h-16 bg-navy text-white text-2xl font-bold rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-blue-50 transition-all duration-300 group-hover:scale-110 group-hover:bg-blue-700 group-hover:border-blue-100">2</div>
                    <h3 class="text-lg font-bold text-navy mb-2 group-hover:text-blue-700 transition">Verifikasi Data</h3>
                    <p class="text-sm text-gray-500">Pastikan data diri Anda sudah sesuai sebelum masuk ke bilik suara digital.</p>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center relative transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group">
                    <div class="w-16 h-16 bg-navy text-white text-2xl font-bold rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-blue-50 transition-all duration-300 group-hover:scale-110 group-hover:bg-blue-700 group-hover:border-blue-100">3</div>
                    <h3 class="text-lg font-bold text-navy mb-2 group-hover:text-blue-700 transition">Pilih Kandidat</h3>
                    <p class="text-sm text-gray-500">Klik pada kartu pasangan calon yang Anda pilih. Pastikan pilihan Anda benar.</p>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center relative transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl group">
                    <div class="w-16 h-16 bg-navy text-white text-2xl font-bold rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-blue-50 transition-all duration-300 group-hover:scale-110 group-hover:bg-accentRed group-hover:border-red-100">4</div>
                    <h3 class="text-lg font-bold text-navy mb-2 group-hover:text-accentRed transition">Konfirmasi</h3>
                    <p class="text-sm text-gray-500">Klik tombol "Ya, Yakin" pada jendela konfirmasi untuk merekam suara Anda.</p>
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <a href="login.php" class="bg-accentRed hover:bg-red-700 text-white font-medium px-8 py-4 rounded-xl transition-all duration-300 shadow-md hover:shadow-xl transform hover:-translate-y-1 active:scale-95 text-lg inline-block">
                    Saya Mengerti, Mulai Voting
                </a>
            </div>
        </section>

        <!-- ====== FAQ PAGE ====== -->
        <section id="faq-page" class="page-section fade-in hidden">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4">Pertanyaan yang Sering Diajukan (FAQ)</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Temukan jawaban atas pertanyaan umum seputar proses pemilihan ini.</p>
            </div>

            <div class="max-w-3xl mx-auto space-y-4">
                <!-- FAQ Item 1 -->
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm transition-all duration-300 hover:shadow-md">
                    <button onclick="toggleFaq(1)" class="w-full text-left px-6 py-5 font-semibold text-navy flex justify-between items-center focus:outline-none hover:bg-blue-50 transition">
                        Apakah suara saya dijamin kerahasiaannya?
                        <i id="faq-icon-1" class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div id="faq-content-1" class="hidden px-6 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                        Ya, sistem kami menggunakan enkripsi end-to-end. Identitas pemilih dipisahkan dari data pilihan, sehingga tidak ada pihak yang dapat mengetahui siapa memilih kandidat mana.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm transition-all duration-300 hover:shadow-md">
                    <button onclick="toggleFaq(2)" class="w-full text-left px-6 py-5 font-semibold text-navy flex justify-between items-center focus:outline-none hover:bg-blue-50 transition">
                        Apakah saya bisa mengubah pilihan saya?
                        <i id="faq-icon-2" class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div id="faq-content-2" class="hidden px-6 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                        Tidak. Setelah Anda menekan tombol konfirmasi "Ya, Yakin", suara Anda akan langsung direkam secara permanen dan tidak dapat diubah atau ditarik kembali.
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm transition-all duration-300 hover:shadow-md">
                    <button onclick="toggleFaq(3)" class="w-full text-left px-6 py-5 font-semibold text-navy flex justify-between items-center focus:outline-none hover:bg-blue-50 transition">
                        Kapan batas akhir waktu voting?
                        <i id="faq-icon-3" class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div id="faq-content-3" class="hidden px-6 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                        Voting dibuka mulai tanggal 1 hingga 3 November 2026. Sistem akan otomatis menutup akses voting pada pukul 23:59 WIB di hari terakhir.
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm transition-all duration-300 hover:shadow-md">
                    <button onclick="toggleFaq(4)" class="w-full text-left px-6 py-5 font-semibold text-navy flex justify-between items-center focus:outline-none hover:bg-blue-50 transition">
                        Bagaimana jika saya lupa password akun saya?
                        <i id="faq-icon-4" class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div id="faq-content-4" class="hidden px-6 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                        Silakan gunakan fitur "Lupa Password" di halaman login, atau hubungi panitia pemilihan melalui email support@pemilihan2026.org dengan menyertakan NIM/NIP Anda.
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- ================= MOBILE BOTTOM NAVIGATION ================= -->
    <nav class="md:hidden fixed bottom-0 w-full bg-white border-t border-gray-200 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-40 transition-transform duration-300">
        <div class="flex justify-around items-center h-16">
            <button onclick="showPage('home-page')" class="mobile-nav-link flex flex-col items-center text-gray-400 hover:text-navy transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 w-full py-2">
                <i class="fa-solid fa-house text-lg mb-1"></i>
                <span class="text-[10px] font-medium">Beranda</span>
            </button>
            <button onclick="showPage('candidate-page')" class="mobile-nav-link flex flex-col items-center text-gray-400 hover:text-navy transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 w-full py-2">
                <i class="fa-solid fa-user-group text-lg mb-1"></i>
                <span class="text-[10px] font-medium">Kandidat</span>
            </button>
            <a href="login.php" class="mobile-nav-link flex flex-col items-center text-gray-400 hover:text-navy transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 w-full py-2">
                <i class="fa-solid fa-check-to-slot text-lg mb-1"></i>
                <span class="text-[10px] font-medium">Voting</span>
            </a>
        </div>
    </nav>

    <!-- ================= JAVASCRIPT LOGIC ================= -->
    <script>
        function showPage(pageId) {
            document.querySelectorAll('.page-section').forEach(page => {
                page.classList.add('hidden');
                page.classList.remove('block');
            });
            
            const targetPage = document.getElementById(pageId);
            if (targetPage) {
                targetPage.classList.remove('hidden');
                targetPage.classList.add('block');
            }

            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('text-navy', 'font-semibold');
                link.classList.add('text-gray-600');
            });
            
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function toggleFaq(id) {
            const content = document.getElementById(`faq-content-${id}`);
            const icon = document.getElementById(`faq-icon-${id}`);
            
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                content.classList.add('fade-in');
                icon.classList.add('rotate-180');
            } else {
                content.classList.add('hidden');
                content.classList.remove('fade-in');
                icon.classList.remove('rotate-180');
            }
        }
    </script>
</body>
</html>