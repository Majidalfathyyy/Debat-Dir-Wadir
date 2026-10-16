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
        .fade-in { animation: fadeIn 0.4s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .hero-illustration {
            background-image: url('https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&q=80&w=800');
            background-size: cover; background-position: center; border-radius: 1rem; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        /* Custom scrollbar for better UX */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="text-gray-800 antialiased pb-20 md:pb-0 overflow-x-hidden">

    <!-- ================= HEADER ================= -->
    <header class="bg-white sticky top-0 z-40 border-b border-gray-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo & Branding -->
                <div class="flex items-center gap-3 cursor-pointer" onclick="showPage('home-page')">
                    <div class="w-10 h-10 bg-navy text-white flex items-center justify-center rounded-lg">
                        <i class="fa-solid fa-check-to-slot text-xl"></i>
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="text-xs font-bold text-navy leading-tight uppercase">Pemilihan Direktur & Wadir</h1>
                        <p class="text-[10px] text-gray-500 font-medium">Periode 2026-2028</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex space-x-6 text-sm font-medium text-gray-600">
                    <button onclick="showPage('home-page')" class="nav-link text-navy font-semibold hover:text-navy transition">Beranda</button>
                    <button onclick="showPage('candidate-page')" class="nav-link hover:text-navy transition">Calon Pasangan</button>
                    <button onclick="showPage('candidate-page')" class="nav-link hover:text-navy transition">Visi & Misi</button>
                    <button onclick="showPage('procedures-page')" class="nav-link hover:text-navy transition">Tata Cara</button>
                    <button onclick="showPage('results-page')" class="nav-link hover:text-navy transition">Hasil Suara</button>
                    <button onclick="showPage('faq-page')" class="nav-link hover:text-navy transition">FAQ</button>
                </nav>

                <!-- Desktop Right Actions -->
                <div class="hidden md:flex items-center gap-4">
                    <div class="relative">
                        <i class="fa-solid fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input type="text" placeholder="Cari Calon" class="pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-navy focus:border-transparent w-48">
                    </div>
                    <button onclick="showPage('voting-page')" class="bg-accentRed hover:bg-red-700 text-white text-sm font-medium px-5 py-2.5 rounded-lg transition shadow-sm">
                        Voting Sekarang
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button onclick="showPage('voting-page')" class="text-accentRed font-semibold text-sm mr-4">Voting</button>
                    <button class="text-gray-600 hover:text-navy focus:outline-none">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Konten -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12 min-h-[calc(100vh-160px)]">
        
        <section id="home-page" class="page-section fade-in block">
            <div class="flex flex-col-reverse lg:flex-row items-center gap-10 lg:gap-16 mb-16">
                <div class="w-full lg:w-1/2 space-y-6 text-center lg:text-left">
                    <h1 class="text-4xl md:text-5xl lg:text-5xl font-bold text-navy leading-tight">
                        Tentukan Arah Masa Depan Organisasi Kita
                    </h1>
                    <p class="text-gray-600 text-base md:text-lg leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Gunakan hak suara Anda dalam Pemilihan Direktur dan Wakil Direktur Periode 2026-2028. Jujur, adil, dan transparan.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                        <button onclick="showPage('voting-page')" class="w-full sm:w-auto bg-navy hover:bg-blue-900 text-white font-medium px-8 py-3.5 rounded-lg transition shadow-md flex items-center justify-center gap-2">
                            <i class="fa-solid fa-gavel"></i> Mulai Voting
                        </button>
                        <button onclick="showPage('candidate-page')" class="w-full sm:w-auto bg-white border border-gray-300 hover:border-navy text-navy font-medium px-8 py-3.5 rounded-lg transition shadow-sm">
                            Lihat Kandidat
                        </button>
                    </div>
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="hero-illustration h-64 md:h-80 lg:h-96 w-full relative">
                        <div class="absolute inset-0 bg-navy/10 rounded-2xl"></div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div onclick="showPage('candidate-page')" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition cursor-pointer">
                    <div class="w-12 h-12 bg-blue-50 text-navy rounded-xl flex items-center justify-center mb-4"><i class="fa-solid fa-users text-xl"></i></div>
                    <h3 class="text-lg font-bold text-navy mb-2">Pasangan Calon</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Kenali visi, misi, dan program kerja para kandidat direktur & wadir.</p>
                </div>
                <div onclick="showPage('procedures-page')" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition cursor-pointer">
                    <div class="w-12 h-12 bg-blue-50 text-navy rounded-xl flex items-center justify-center mb-4"><i class="fa-solid fa-clipboard-check text-xl"></i></div>
                    <h3 class="text-lg font-bold text-navy mb-2">Tata Cara Voting</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Panduan lengkap demi lancarnya cara memberikan suara secara digital.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="w-12 h-12 bg-blue-50 text-navy rounded-xl flex items-center justify-center mb-4"><i class="fa-regular fa-calendar text-xl"></i></div>
                    <h3 class="text-lg font-bold text-navy mb-2">Jadwal & Tahapan</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Pantau linimasa dari kampanye hingga pengumuman hasil.</p>
                </div>
                <div onclick="showPage('results-page')" class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition cursor-pointer relative">
                    <div class="absolute top-4 right-4 bg-gray-50 text-xs font-medium text-gray-600 px-2 py-1 rounded-md border border-gray-200">Live</div>
                    <div class="w-12 h-12 bg-blue-50 text-navy rounded-xl flex items-center justify-center mb-4"><i class="fa-solid fa-chart-simple text-xl"></i></div>
                    <h3 class="text-lg font-bold text-navy mb-2">Hasil Sementara</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Lihat presentase partisipasi dan perolehan suara real-time.</p>
                </div>
            </div>
        </section>

        <section id="candidate-page" class="page-section fade-in hidden">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4">Pasangan Calon Direktur & Wakil Direktur</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Kenali visi, misi, dan program kerja unggulan dari setiap pasangan calon sebelum menentukan pilihan Anda.</p>
            </div>

            <div class="space-y-10">
                <!-- Candidate 1 -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 flex flex-col md:flex-row">
                    <div class="md:w-2/5 h-80 md:h-auto bg-gray-200 relative">
                        <!-- Placeholder Image for Candidate 1 -->
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=600" alt="Pasangan Calon 1" class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4 bg-navy text-white font-bold px-4 py-2 rounded-lg shadow-md">Nomor Urut 1</div>
                    </div>
                    <div class="md:w-3/5 p-8 md:p-10 flex flex-col justify-center">
                        <h3 class="text-2xl md:text-3xl font-bold text-navy mb-2">Budi Santoso & Rina Wijaya</h3>
                        <p class="text-accentRed font-semibold mb-6 flex items-center gap-2"><i class="fa-solid fa-bullseye"></i> "Sinergi Kreatif untuk Organisasi yang Adaptif dan Inklusif"</p>
                        
                        <div class="space-y-4 mb-8">
                            <div>
                                <h4 class="font-bold text-gray-800 mb-2 flex items-center gap-2"><i class="fa-solid fa-eye text-navy"></i> Visi</h4>
                                <p class="text-gray-600 text-sm leading-relaxed">Menjadikan organisasi sebagai wadah kolaborasi yang mengedepankan inovasi digital, pengembangan sumber daya manusia, serta keterbukaan informasi bagi seluruh anggota.</p>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-2 flex items-center gap-2"><i class="fa-solid fa-list-check text-navy"></i> Misi</h4>
                                <ul class="text-gray-600 text-sm space-y-2 list-disc list-inside">
                                    <li>Digitalisasi sistem kerja dan administrasi organisasi secara menyeluruh.</li>
                                    <li>Mengadakan pelatihan dan peningkatan kapasitas anggota secara berkala.</li>
                                    <li>Mewujudkan transparansi laporan keuangan dan program kerja.</li>
                                </ul>
                            </div>
                        </div>
                        <button onclick="showPage('voting-page')" class="self-start bg-navy hover:bg-blue-900 text-white font-medium px-6 py-3 rounded-lg transition shadow-md">
                            Pilih Pasangan Ini
                        </button>
                    </div>
                </div>

                <!-- Candidate 2 -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 flex flex-col md:flex-row">
                    <div class="md:w-2/5 h-80 md:h-auto bg-gray-200 relative">
                        <!-- Placeholder Image for Candidate 2 -->
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=600" alt="Pasangan Calon 2" class="w-full h-full object-cover">
                        <div class="absolute top-4 left-4 bg-navy text-white font-bold px-4 py-2 rounded-lg shadow-md">Nomor Urut 2</div>
                    </div>
                    <div class="md:w-3/5 p-8 md:p-10 flex flex-col justify-center">
                        <h3 class="text-2xl md:text-3xl font-bold text-navy mb-2">Andi Pratama & Siti Aminah</h3>
                        <p class="text-accentRed font-semibold mb-6 flex items-center gap-2"><i class="fa-solid fa-bullseye"></i> "Membangun Fondasi Solid, Berprestasi, dan Berkelanjutan"</p>
                        
                        <div class="space-y-4 mb-8">
                            <div>
                                <h4 class="font-bold text-gray-800 mb-2 flex items-center gap-2"><i class="fa-solid fa-eye text-navy"></i> Visi</h4>
                                <p class="text-gray-600 text-sm leading-relaxed">Menciptakan organisasi yang solid, berdaya saing tinggi, serta mampu memberikan kontribusi nyata bagi kesejahteraan seluruh anggotanya melalui program yang berkelanjutan.</p>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-2 flex items-center gap-2"><i class="fa-solid fa-list-check text-navy"></i> Misi</h4>
                                <ul class="text-gray-600 text-sm space-y-2 list-disc list-inside">
                                    <li>Memperkuat jaringan alumni dan kerjasama dengan pihak eksternal.</li>
                                    <li>Optimalisasi program kerja yang berdampak langsung pada anggota.</li>
                                    <li>Meningkatkan kesejahteraan dan fasilitas pendukung anggota.</li>
                                </ul>
                            </div>
                        </div>
                        <button onclick="showPage('voting-page')" class="self-start bg-navy hover:bg-blue-900 text-white font-medium px-6 py-3 rounded-lg transition shadow-md">
                            Pilih Pasangan Ini
                        </button>
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
                <!-- Step 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center relative">
                    <div class="w-16 h-16 bg-navy text-white text-2xl font-bold rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-blue-50">1</div>
                    <h3 class="text-lg font-bold text-navy mb-2">Login Akun</h3>
                    <p class="text-sm text-gray-500">Masuk menggunakan NIM/NIP dan password yang telah terdaftar di sistem.</p>
                </div>
                <!-- Step 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center relative">
                    <div class="w-16 h-16 bg-navy text-white text-2xl font-bold rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-blue-50">2</div>
                    <h3 class="text-lg font-bold text-navy mb-2">Verifikasi Data</h3>
                    <p class="text-sm text-gray-500">Pastikan data diri Anda sudah sesuai sebelum masuk ke bilik suara digital.</p>
                </div>
                <!-- Step 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center relative">
                    <div class="w-16 h-16 bg-navy text-white text-2xl font-bold rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-blue-50">3</div>
                    <h3 class="text-lg font-bold text-navy mb-2">Pilih Kandidat</h3>
                    <p class="text-sm text-gray-500">Klik pada kartu pasangan calon yang Anda pilih. Pastikan pilihan Anda benar.</p>
                </div>
                <!-- Step 4 -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center relative">
                    <div class="w-16 h-16 bg-navy text-white text-2xl font-bold rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-blue-50">4</div>
                    <h3 class="text-lg font-bold text-navy mb-2">Konfirmasi</h3>
                    <p class="text-sm text-gray-500">Klik tombol "Ya, Yakin" pada jendela konfirmasi untuk merekam suara Anda.</p>
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <button onclick="showPage('voting-page')" class="bg-accentRed hover:bg-red-700 text-white font-medium px-8 py-4 rounded-xl transition shadow-md text-lg">
                    Saya Mengerti, Mulai Voting
                </button>
            </div>
        </section>

        <!-- ====== VOTING PAGE ====== -->
        <section id="voting-page" class="page-section fade-in hidden">
            <div class="text-center mb-10">
                <div class="inline-block bg-blue-50 text-navy text-sm font-semibold px-4 py-1.5 rounded-full mb-4 border border-blue-100">
                    <i class="fa-solid fa-shield-halved mr-1"></i> Suara Anda Dijamin Rahasia
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4">Bilik Suara Digital</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Silakan pilih salah satu pasangan calon dengan mengklik kartu di bawah ini. Anda hanya dapat memilih satu kali.</p>
            </div>

            <!-- Voting Interface: Both candidates visible side-by-side -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                
                <!-- Candidate 1 Vote Card -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-md border-2 border-transparent hover:border-navy transition duration-300 cursor-pointer group" onclick="selectCandidate(1, 'Budi Santoso & Rina Wijaya')">
                    <div class="h-64 md:h-80 bg-gray-200 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=600" alt="Pasangan Calon 1" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute top-4 left-4 bg-navy text-white font-bold px-4 py-2 rounded-lg shadow-md text-xl">1</div>
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-bold text-navy mb-2">Budi Santoso & Rina Wijaya</h3>
                        <p class="text-gray-500 text-sm mb-6">"Sinergi Kreatif untuk Organisasi yang Adaptif dan Inklusif"</p>
                        <div class="w-full bg-blue-50 text-navy font-bold py-3 rounded-xl group-hover:bg-navy group-hover:text-white transition">
                            Pilih Pasangan Ini
                        </div>
                    </div>
                </div>

                <!-- Candidate 2 Vote Card -->
                <div class="bg-white rounded-3xl overflow-hidden shadow-md border-2 border-transparent hover:border-navy transition duration-300 cursor-pointer group" onclick="selectCandidate(2, 'Andi Pratama & Siti Aminah')">
                    <div class="h-64 md:h-80 bg-gray-200 relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=600" alt="Pasangan Calon 2" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute top-4 left-4 bg-navy text-white font-bold px-4 py-2 rounded-lg shadow-md text-xl">2</div>
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-bold text-navy mb-2">Andi Pratama & Siti Aminah</h3>
                        <p class="text-gray-500 text-sm mb-6">"Membangun Fondasi Solid, Berprestasi, dan Berkelanjutan"</p>
                        <div class="w-full bg-blue-50 text-navy font-bold py-3 rounded-xl group-hover:bg-navy group-hover:text-white transition">
                            Pilih Pasangan Ini
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ====== SUCCESS PAGE ====== -->
        <section id="success-page" class="page-section fade-in hidden">
            <div class="max-w-2xl mx-auto text-center bg-white p-10 md:p-16 rounded-3xl shadow-sm border border-gray-100 mt-10">
                <div class="w-24 h-24 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fa-solid fa-check text-5xl"></i>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4">Terima Kasih!</h2>
                <p class="text-gray-600 text-lg mb-8">Suara Anda telah berhasil direkam dan dienkripsi. Partisipasi Anda sangat berarti untuk masa depan organisasi kita.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <button onclick="showPage('results-page')" class="bg-navy hover:bg-blue-900 text-white font-medium px-8 py-3.5 rounded-lg transition shadow-md">
                        Lihat Hasil Sementara
                    </button>
                    <button onclick="showPage('home-page')" class="bg-white border border-gray-300 hover:border-navy text-navy font-medium px-8 py-3.5 rounded-lg transition">
                        Kembali ke Beranda
                    </button>
                </div>
            </div>
        </section>

        <!-- ====== RESULTS PAGE ====== -->
        <section id="results-page" class="page-section fade-in hidden">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4">Hasil Sementara / Quick Count</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Data diperbarui secara real-time berdasarkan suara yang masuk. Partisipasi saat ini: <span class="font-bold text-navy" id="participation-rate">87%</span></p>
            </div>

            <div class="max-w-4xl mx-auto bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-gray-100">
                <div class="space-y-10">
                    <!-- Candidate 1 Result -->
                    <div>
                        <div class="flex justify-between items-end mb-2">
                            <div>
                                <h3 class="text-xl font-bold text-navy">Budi Santoso & Rina Wijaya</h3>
                                <p class="text-sm text-gray-500">Nomor Urut 1</p>
                            </div>
                            <div class="text-right">
                                <span class="text-3xl font-bold text-navy" id="result-1-percent">0%</span>
                                <p class="text-sm text-gray-500"><span id="result-1-votes">0</span> Suara</p>
                            </div>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-6 overflow-hidden">
                            <div id="result-1-bar" class="bg-navy h-6 rounded-full transition-all duration-1000 ease-out" style="width: 0%"></div>
                        </div>
                    </div>

                    <!-- Candidate 2 Result -->
                    <div>
                        <div class="flex justify-between items-end mb-2">
                            <div>
                                <h3 class="text-xl font-bold text-navy">Andi Pratama & Siti Aminah</h3>
                                <p class="text-sm text-gray-500">Nomor Urut 2</p>
                            </div>
                            <div class="text-right">
                                <span class="text-3xl font-bold text-navy" id="result-2-percent">0%</span>
                                <p class="text-sm text-gray-500"><span id="result-2-votes">0</span> Suara</p>
                            </div>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-6 overflow-hidden">
                            <div id="result-2-bar" class="bg-accentRed h-6 rounded-full transition-all duration-1000 ease-out" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-12 pt-8 border-t border-gray-100 text-center">
                    <p class="text-gray-500 text-sm"><i class="fa-solid fa-circle-info mr-1"></i> Data ini bersifat sementara dan akan diperbarui hingga batas waktu voting berakhir.</p>
                </div>
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
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                    <button onclick="toggleFaq(1)" class="w-full text-left px-6 py-5 font-semibold text-navy flex justify-between items-center focus:outline-none hover:bg-gray-50 transition">
                        Apakah suara saya dijamin kerahasiaannya?
                        <i id="faq-icon-1" class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div id="faq-content-1" class="hidden px-6 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                        Ya, sistem kami menggunakan enkripsi end-to-end. Identitas pemilih dipisahkan dari data pilihan, sehingga tidak ada pihak yang dapat mengetahui siapa memilih kandidat mana.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                    <button onclick="toggleFaq(2)" class="w-full text-left px-6 py-5 font-semibold text-navy flex justify-between items-center focus:outline-none hover:bg-gray-50 transition">
                        Apakah saya bisa mengubah pilihan saya?
                        <i id="faq-icon-2" class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div id="faq-content-2" class="hidden px-6 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                        Tidak. Setelah Anda menekan tombol konfirmasi "Ya, Yakin", suara Anda akan langsung direkam secara permanen dan tidak dapat diubah atau ditarik kembali.
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                    <button onclick="toggleFaq(3)" class="w-full text-left px-6 py-5 font-semibold text-navy flex justify-between items-center focus:outline-none hover:bg-gray-50 transition">
                        Kapan batas akhir waktu voting?
                        <i id="faq-icon-3" class="fa-solid fa-chevron-down text-gray-400 transition-transform duration-300"></i>
                    </button>
                    <div id="faq-content-3" class="hidden px-6 pb-5 text-gray-600 text-sm leading-relaxed border-t border-gray-100 pt-4">
                        Voting dibuka mulai tanggal 1 hingga 3 November 2026. Sistem akan otomatis menutup akses voting pada pukul 23:59 WIB di hari terakhir.
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
                    <button onclick="toggleFaq(4)" class="w-full text-left px-6 py-5 font-semibold text-navy flex justify-between items-center focus:outline-none hover:bg-gray-50 transition">
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

    <!-- ================= MODAL KONFIRMASI VOTING ================= -->
    <div id="confirmation-modal" class="fixed inset-0 bg-gray-900 bg-opacity-60 z-50 hidden flex items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-3xl max-w-md w-full p-8 text-center shadow-2xl transform transition-all scale-100">
            <div class="w-20 h-20 bg-blue-50 text-navy rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fa-solid fa-check-to-slot text-3xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-navy mb-2">Konfirmasi Pilihan</h3>
            <p class="text-gray-600 mb-6">Apakah Anda yakin ingin memilih pasangan calon ini?</p>
            
            <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 mb-8">
                <p class="text-sm text-gray-500 mb-1">Anda memilih:</p>
                <p id="modal-candidate-name" class="text-lg font-bold text-navy">Nama Kandidat</p>
            </div>

            <p class="text-xs text-accentRed font-medium mb-6"><i class="fa-solid fa-triangle-exclamation mr-1"></i> Pilihan tidak dapat diubah setelah dikonfirmasi.</p>

            <div class="flex flex-col sm:flex-row gap-3">
                <button onclick="closeModal()" class="w-full bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium py-3 rounded-xl transition">
                    Batal
                </button>
                <button onclick="castVote()" class="w-full bg-accentRed hover:bg-red-700 text-white font-bold py-3 rounded-xl transition shadow-md">
                    Ya, Yakin
                </button>
            </div>
        </div>
    </div>

    <!-- ================= MOBILE BOTTOM NAVIGATION ================= -->
    <nav class="md:hidden fixed bottom-0 w-full bg-white border-t border-gray-200 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-40">
        <div class="flex justify-around items-center h-16">
            <button onclick="showPage('home-page')" class="mobile-nav-link flex flex-col items-center text-gray-400 hover:text-navy transition w-full py-2">
                <i class="fa-solid fa-house text-lg mb-1"></i>
                <span class="text-[10px] font-medium">Beranda</span>
            </button>
            <button onclick="showPage('candidate-page')" class="mobile-nav-link flex flex-col items-center text-gray-400 hover:text-navy transition w-full py-2">
                <i class="fa-solid fa-user-group text-lg mb-1"></i>
                <span class="text-[10px] font-medium">Kandidat</span>
            </button>
            <button onclick="showPage('voting-page')" class="mobile-nav-link flex flex-col items-center text-gray-400 hover:text-navy transition w-full py-2">
                <i class="fa-solid fa-check-to-slot text-lg mb-1"></i>
                <span class="text-[10px] font-medium">Voting</span>
            </button>
            <button onclick="showPage('results-page')" class="mobile-nav-link flex flex-col items-center text-gray-400 hover:text-navy transition w-full py-2">
                <i class="fa-solid fa-chart-simple text-lg mb-1"></i>
                <span class="text-[10px] font-medium">Hasil</span>
            </button>
        </div>
    </nav>

    <!-- ================= JAVASCRIPT LOGIC ================= -->
    <script>
        // --- 1. Navigation Logic ---
        function showPage(pageId) {
            // Hide all pages
            document.querySelectorAll('.page-section').forEach(page => {
                page.classList.add('hidden');
                page.classList.remove('block');
            });
            
            // Show target page
            const targetPage = document.getElementById(pageId);
            if (targetPage) {
                targetPage.classList.remove('hidden');
                targetPage.classList.add('block');
            }

            // Update active state on Desktop Nav
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('text-navy', 'font-semibold');
                link.classList.add('text-gray-600');
            });
            // Simple highlight logic for desktop nav based on pageId (optional but nice)
            
            // Update active state on Mobile Nav
            document.querySelectorAll('.mobile-nav-link').forEach(link => {
                link.classList.remove('text-navy');
                link.classList.add('text-gray-400');
            });

            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // --- 2. FAQ Logic ---
        function toggleFaq(id) {
            const content = document.getElementById(`faq-content-${id}`);
            const icon = document.getElementById(`faq-icon-${id}`);
            
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                content.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }

        // --- 3. Voting Logic ---
        let selectedCandidateId = null;
        let selectedCandidateName = '';

        function selectCandidate(id, name) {
            selectedCandidateId = id;
            selectedCandidateName = name;
            
            // Update modal text
            document.getElementById('modal-candidate-name').innerText = name;
            
            // Show modal
            document.getElementById('confirmation-modal').classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // Prevent scrolling behind modal
        }

        function closeModal() {
            document.getElementById('confirmation-modal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            selectedCandidateId = null;
            selectedCandidateName = '';
        }

        function castVote() {
            if (!selectedCandidateId) return;
            
            // Simulate saving vote
            closeModal();
            
            // Show success page
            showPage('success-page');
            
            // Update mock results data (Simulating a vote being added)
            updateResults(selectedCandidateId);
        }

        // --- 4. Results Simulation Logic ---
        // Initial mock data
        let results = {
            1: { votes: 1240, base: 1240 },
            2: { votes: 1180, base: 1180 }
        };

        function updateResults(votedId) {
            // Add a vote to the selected candidate
            if (votedId && results[votedId]) {
                results[votedId].votes += 1;
            }

            const totalVotes = results[1].votes + results[2].votes;
            
            // Calculate percentages
            const percent1 = ((results[1].votes / totalVotes) * 100).toFixed(1);
            const percent2 = ((results[2].votes / totalVotes) * 100).toFixed(1);

            // Update DOM
            document.getElementById('result-1-votes').innerText = results[1].votes.toLocaleString('id-ID');
            document.getElementById('result-2-votes').innerText = results[2].votes.toLocaleString('id-ID');
            
            document.getElementById('result-1-percent').innerText = `${percent1}%`;
            document.getElementById('result-2-percent').innerText = `${percent2}%`;

            // Animate bars
            setTimeout(() => {
                document.getElementById('result-1-bar').style.width = `${percent1}%`;
                document.getElementById('result-2-bar').style.width = `${percent2}%`;
            }, 300);
        }

        // Initialize results view on load (in case user goes straight there)
        window.onload = () => {
            updateResults(null);
        };
    </script>
</body>
</html>