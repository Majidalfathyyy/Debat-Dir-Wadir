<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'user'){ header("Location: index.php"); exit; }

// Ambil data kandidat
$kandidat_query = mysqli_query($conn, "SELECT * FROM candidates");
$kandidat = [];
while($row = mysqli_fetch_assoc($kandidat_query)) {
    $kandidat[] = $row;
}
?>
<!-- (PASTE KODE HTML HEAD ANDA DI SINI) -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">

<!-- Tambahkan tombol logout di Header Anda -->
<div class="fixed top-4 right-4 z-50">
    <a href="logout.php" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-bold shadow-md">Logout (<?php echo $_SESSION['username']; ?>)</a>
</div>

<!-- (PASTE KODE HEADER DAN HERO SECTION ANDA DI SINI) -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
    
    <?php if($_SESSION['has_voted'] == 0): ?>
    <!-- ====== VOTING PAGE (Ditampilkan jika belum vote) ====== -->
    <section id="voting-page" class="page-section block">
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-[#1A2B4C] mb-4">Bilik Suara Digital</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <?php foreach($kandidat as $k): ?>
            <div class="bg-white rounded-3xl overflow-hidden shadow-md cursor-pointer group" onclick="selectCandidate(<?= $k['id']; ?>, '<?= $k['name']; ?>')">
                <div class="h-64 bg-gray-200 relative">
                    <img src="<?= $k['image']; ?>" class="w-full h-full object-cover">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-2xl font-bold text-[#1A2B4C] mb-2"><?= $k['name']; ?></h3>
                    <div class="w-full bg-blue-50 text-blue-900 font-bold py-3 rounded-xl">Pilih Pasangan Ini</div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php else: ?>
    <!-- ====== SUCCESS PAGE (Ditampilkan jika sudah vote) ====== -->
    <section class="page-section block">
        <div class="max-w-2xl mx-auto text-center bg-white p-10 rounded-3xl shadow-sm mt-10">
            <h2 class="text-3xl font-bold text-[#1A2B4C] mb-4">Terima Kasih!</h2>
            <p class="text-gray-600">Anda sudah melakukan voting. Suara Anda telah direkam.</p>
        </div>
    </section>
    <?php endif; ?>

</main>

<!-- MODAL KONFIRMASI (Diubah untuk submit ke PHP) -->
<div id="confirmation-modal" class="fixed inset-0 bg-gray-900 bg-opacity-60 z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl p-8 text-center max-w-md w-full">
        <h3 class="text-2xl font-bold text-[#1A2B4C] mb-2">Konfirmasi Pilihan</h3>
        <p id="modal-candidate-name" class="text-lg font-bold text-[#1A2B4C] mb-6">Nama Kandidat</p>
        
        <!-- Form Tersembunyi untuk mengirim ID ke PHP -->
        <form action="proses_vote.php" method="POST">
            <input type="hidden" name="candidate_id" id="form_candidate_id">
            <div class="flex gap-3">
                <button type="button" onclick="closeModal()" class="w-full bg-gray-200 text-gray-700 py-3 rounded-xl">Batal</button>
                <button type="submit" class="w-full bg-red-600 text-white font-bold py-3 rounded-xl">Ya, Yakin</button>
            </div>
        </form>
    </div>
</div>

<script>
    function selectCandidate(id, name) {
        document.getElementById('modal-candidate-name').innerText = name;
        document.getElementById('form_candidate_id').value = id;
        document.getElementById('confirmation-modal').classList.remove('hidden');
    }
    function closeModal() {
        document.getElementById('confirmation-modal').classList.add('hidden');
    }
</script>
</body>
</html>