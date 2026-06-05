/**
 * Clean Wash — Sidebar Profile Toggle
 * Untuk hamburger di halaman profil (mobile/tablet)
 */
function toggleNav() {
    const nav = document.getElementById('sidebar-nav');
    const btn = document.getElementById('sidebarHamburger');
    if (!nav) return;
    nav.classList.toggle('open');
    if (btn) btn.classList.toggle('open');
}

// Tutup sidebar kalau klik di luar
document.addEventListener('click', function (e) {
    const sidebar = document.querySelector('.sidebar');
    const nav     = document.getElementById('sidebar-nav');
    const btn     = document.getElementById('sidebarHamburger');
    if (!sidebar || !nav) return;
    if (!sidebar.contains(e.target) && nav.classList.contains('open')) {
        nav.classList.remove('open');
        if (btn) btn.classList.remove('open');
    }
});