<style>
  *, *::before, *::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  :root {
    --primary: #2563eb;
    --primary-light: #eff6ff;
    --primary-mid: #bfdbfe;
    --secondary: #14b8a6;
    --secondary-light: #f0fdfa;
    --neutral: #111827;
    --neutral-500: #6b7280;
    --neutral-300: #d1d5db;
    --neutral-100: #f3f4f6;
    --neutral-50: #f9fafb;
    --success: #22c55e;
    --success-light: #f0fdf4;
    --warning: #ffd400;
    --warning-light: #fefce8;
    --error: #ef4444;
    --error-light: #fef2f2;
    --white: #ffffff;
    --sidebar-width: 224px;
    --header-height: 64px;
    --shadow-sm: 0 1px 3px rgba(0,0,0,0.08);
    --shadow-md: 0 4px 12px rgba(0,0,0,0.08);
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
  }

  body {
    font-family: 'Poppins', sans-serif;
    background: #f1f5f9;
    color: var(--neutral);
    font-size: 14px;
    display: flex;
    min-height: 100vh;
  }

  /* ── MAIN LAYOUT ── */
  .main-wrapper {
    margin-left: var(--sidebar-width);
    flex: 1;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  /* ── HEADER ── */
  .header {
    height: var(--header-height);
    background: var(--white);
    border-bottom: 1px solid var(--neutral-100);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 24px;
    position: sticky;
    top: 0;
    z-index: 50;
  }

  .header-title {
    font-size: 20px;
    font-weight: 700;
    color: var(--neutral);
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .hamburger {
    width: 32px;
    height: 32px;
    display: none;
    flex-direction: column;
    justify-content: center;
    gap: 5px;
    cursor: pointer;
  }

  @media (max-width: 576px) {
    .hamburger {
      display: flex;
    }
  }

  .hamburger span {
    display: block;
    height: 2px;
    background: var(--neutral-500);
    border-radius: 2px;
    width: 100%;
  }

  .header-right {
    display: flex;
    align-items: center;
    gap: 16px;
  }

  /* ── NOTIFICATION ── */
  .notif-btn {
    position: relative;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    border: 1px solid var(--neutral-100);
    background: var(--white);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 18px;
    transition: .2s;
  }

  .notif-btn:hover {
    background: var(--neutral-50);
  }

  .notif-badge {
    position: absolute;
    top: 2px;
    right: 2px;
    width: 16px;
    height: 16px;
    background: var(--error);
    border-radius: 50%;
    font-size: 9px;
    font-weight: 700;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  /* ── STORE DROPDOWN ── */
  .store-dropdown {
    position: relative;
  }

  .store-info {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 6px 12px;
    border: 1px solid var(--neutral-100);
    border-radius: 10px;
    cursor: pointer;
    transition: .2s;
    background: var(--white);
  }

  .store-info:hover {
    background: var(--neutral-50);
  }

  .store-avatar {
    width: 36px;
    height: 36px;
    background: linear-gradient(135deg, #e0f2fe, #eff6ff);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
  }

  .store-name {
    font-size: 13px;
    font-weight: 600;
  }

  .store-role {
    font-size: 11px;
    color: var(--neutral-500);
  }

  .chevron {
    color: var(--neutral-500);
    font-size: 12px;
    transition: .3s;
  }

  .chevron.rotate {
    transform: rotate(180deg);
  }

  /* ── DROPDOWN MENU ── */
  .dropdown-menu {
    position: absolute;
    top: 58px;
    right: 0;
    width: 240px;
    background: var(--white);
    border-radius: 16px;
    border: 1px solid var(--neutral-100);
    box-shadow: var(--shadow-md);
    overflow: hidden;

    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);

    transition: all .25s ease;
    z-index: 999;
  }

  .dropdown-menu.active {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }

  .dropdown-header {
    padding: 16px;
    border-bottom: 1px solid var(--neutral-100);
    background: var(--neutral-50);
  }

  .dropdown-header h4 {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 3px;
  }

  .dropdown-header p {
    font-size: 12px;
    color: var(--neutral-500);
  }

  .dropdown-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 16px;
    text-decoration: none;
    color: var(--neutral);
    font-size: 13px;
    transition: .2s;
  }

  .dropdown-item:hover {
    background: var(--primary-light);
    color: var(--primary);
  }

  .dropdown-divider {
    height: 1px;
    background: var(--neutral-100);
  }

  .logout-item:hover {
    background: var(--error-light);
    color: var(--error);
  }

  .logout-btn {
    width: 100%;
    border: none;
    background: none;
    cursor: pointer;
    text-align: left;
    font-family: inherit;
}
</style>

<header class="header">

  <div class="header-title">
    <div class="hamburger" role="button" tabindex="0" aria-label="Buka menu">
      <span></span>
      <span></span>
      <span></span>
    </div>
    @yield('page_title', $headerTitle)
  </div>

  <div class="header-right">

    <div class="notif-btn" aria-label="Notifikasi">
      🔔
      <div class="notif-badge">3</div>
    </div>

    <div class="store-dropdown">
      <div class="store-info" id="dropdownToggle">
        <div class="store-avatar">🏪</div>
        <div>
          <div class="store-name">
            {{ Auth::user()->mitraLaundry->store_name ?? Auth::user()->name }}
          </div>
          <div class="store-role">
            Mitra
          </div>
        </div>
        <span class="chevron" id="chevron">▾</span>
      </div>

      <div class="dropdown-menu" id="dropdownMenu">
        <div class="dropdown-header">
          <p>Mitra Laundry</p>
        </div>
        <a href="{{ route('mitra.profil') }}" class="dropdown-item">
          Toko Saya
        </a>
        <a href="{{ route('home') }}" class="dropdown-item">
          Beranda
        </a>
        <div class="dropdown-divider"></div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item logout-item logout-btn">Logout</button>
        </form>
      </div>
    </div>
  </div>
</header>

<script>
  const dropdownToggle = document.getElementById('dropdownToggle');
  const dropdownMenu = document.getElementById('dropdownMenu');
  const chevron = document.getElementById('chevron');

  if (dropdownToggle && dropdownMenu) {
    dropdownToggle.addEventListener('click', () => {
      dropdownMenu.classList.toggle('active');
      chevron.classList.toggle('rotate');
    });

    document.addEventListener('click', function (e) {
      if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.classList.remove('active');
        chevron.classList.remove('rotate');
      }
    });
  }
</script>
