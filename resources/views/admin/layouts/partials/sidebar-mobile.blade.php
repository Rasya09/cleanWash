<script>
document.addEventListener('DOMContentLoaded', function () {
  const sidebar = document.querySelector('.sidebar');
  const header  = document.querySelector('.header');
  if (!sidebar || !header || header.querySelector('#hamburgerBtn')) return;

  let overlay = document.getElementById('sidebarOverlay');
  if (!overlay) {
    overlay = document.createElement('div');
    overlay.className = 'sidebar-overlay';
    overlay.id = 'sidebarOverlay';
    document.body.appendChild(overlay);
  }

  const closeBtn = document.createElement('button');
  closeBtn.className = 'sidebar-close-btn';
  closeBtn.setAttribute('aria-label', 'Tutup menu');
  closeBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>';
  sidebar.appendChild(closeBtn);

  const hamBtn = document.createElement('button');
  hamBtn.className = 'hamburger-btn';
  hamBtn.id = 'hamburgerBtn';
  hamBtn.setAttribute('aria-label', 'Buka menu');
  hamBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>';
  header.insertBefore(hamBtn, header.firstChild);

  function closeSidebar() {
    sidebar.classList.remove('open');
    const panel = document.querySelector('.detail.panel-open');
    if (!panel) {
      overlay.classList.remove('active');
      overlay._closeCallback = null;
      document.body.style.overflow = '';
    }
  }

  function openSidebar() {
    sidebar.classList.add('open');
    overlay.classList.add('active');
    overlay._closeCallback = closeSidebar;
    document.body.style.overflow = 'hidden';
  }

  hamBtn.addEventListener('click', function () {
    if (window.innerWidth > 768) return;
    if (sidebar.classList.contains('open')) closeSidebar();
    else openSidebar();
  });

  closeBtn.addEventListener('click', closeSidebar);

  if (!overlay.dataset.sidebarBound) {
    overlay.dataset.sidebarBound = '1';
    overlay.addEventListener('click', function () {
      if (typeof overlay._closeCallback === 'function') overlay._closeCallback();
    });
  }

  window.addEventListener('resize', function () {
    if (window.innerWidth > 768) closeSidebar();
  });
});
</script>
