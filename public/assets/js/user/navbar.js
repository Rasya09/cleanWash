document.addEventListener('DOMContentLoaded', () => {
    const hamburger       = document.getElementById('hamburger');
    const mobileMenu      = document.getElementById('mobileMenu');
    const desktopAvatar   = document.getElementById('desktopAvatar');
    const desktopDropdown = document.getElementById('desktopDropdown');
    const navUserDesktop  = document.getElementById('navUserDesktop');

    console.log('hamburger:', hamburger);
    console.log('mobileMenu:', mobileMenu);

    if (hamburger && mobileMenu) {
        hamburger.addEventListener('click', (e) => {
            e.stopPropagation();
            hamburger.classList.toggle('open');
            mobileMenu.classList.toggle('open');
            console.log('burger diklik, menu:', mobileMenu.classList.contains('open'));
        });
    }

    if (desktopAvatar && desktopDropdown) {
        desktopAvatar.addEventListener('click', (e) => {
            e.stopPropagation();
            desktopDropdown.classList.toggle('open');
        });
    }

    document.addEventListener('click', (e) => {
        if (navUserDesktop && !navUserDesktop.contains(e.target)) {
            desktopDropdown?.classList.remove('open');
        }
        if (hamburger && mobileMenu &&
            !hamburger.contains(e.target) &&
            !mobileMenu.contains(e.target)) {
            hamburger.classList.remove('open');
            mobileMenu.classList.remove('open');
        }
    });
});