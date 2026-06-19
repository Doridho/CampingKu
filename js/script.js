// Kita pakai window.onload biar script BARU JALAN setelah 
// semua HTML, CSS, dan PHP selesai dimuat sempurna oleh browser.
window.onload = function() {
    const menuToggle = document.getElementById('menu-toggle');
    const navContainer = document.getElementById('nav-container');

    if (menuToggle && navContainer) {
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah browser melakukan aksi default yang gak perlu
            
            // Lakukan toggle class active
            navContainer.classList.toggle('active');
            
            // Cek status di console apakah kelas active-nya berhasil nempel pas diklik
            console.log("Status Kelas Sekarang:", navContainer.className);
        });
    } else {
        console.log("Waduh, elemennya masih belum ketemu di HTML!");
    }
};