<script>
document.addEventListener('DOMContentLoaded', function () {
  const sidebar = document.getElementById('mitraSidebar');
  const header  = document.querySelector('.header');
  if (!sidebar || !header || sidebar.dataset.mobileReady === '1') return;
  sidebar.dataset.mobileReady = '1';

  let overlay = document.getElementById('sidebarOverlay');

  const closeBtn = document.createElement('button');
  closeBtn.type = 'button';
  closeBtn.className = 'sidebar-close-btn';
  closeBtn.setAttribute('aria-label', 'Tutup menu');
  closeBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>';
  sidebar.appendChild(closeBtn);

  function closeSidebar() {
    sidebar.classList.remove('open');
    overlay.classList.remove('active');
    document.body.style.overflow = '';
  }

  function openSidebar() {
    sidebar.classList.add('open');
    overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  const ham = header.querySelector('.hamburger');
  if (ham) {
    ham.addEventListener('click', function () {
      if (window.innerWidth > 768) return;
      if (sidebar.classList.contains('open')) closeSidebar();
      else openSidebar();
    });
  }

  closeBtn.addEventListener('click', closeSidebar);
  overlay.addEventListener('click', closeSidebar);

  window.addEventListener('resize', function () {
    if (window.innerWidth > 768) closeSidebar();
  });
});
</script>
