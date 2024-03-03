window.addEventListener('scroll', function() {
    // Deteksi jika posisi scroll mencapai bagian bawah halaman
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        // Lakukan refresh halaman
        location.reload(); // Me-refresh halaman
        // Atau lakukan pembaruan konten dengan menggunakan AJAX
        // Contoh:
        // loadData(); // Fungsi untuk memuat konten baru
    }
});