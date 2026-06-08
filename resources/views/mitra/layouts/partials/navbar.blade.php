<link rel='stylesheet' href='{{ asset("assets/css/mitra/navbar.css") }}'>

{{-- Overlay untuk menutup sidebar saat diklik di luar --}}
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<header class="header">

  <!-- LEFT -->
  <div class="header-title">

    <div class="hamburger" id="hamburgerToggle">
      <span></span>
      <span></span>
      <span></span>
    </div>

    {{ request()->routeIs('mitra.dashboard') ? 'Dashboard' : '' }}
    {{ request()->routeIs('mitra.pesanan') ? 'Pesanan Saya' : '' }}
    {{ request()->routeIs('mitra.gagal-pickup') ? 'Gagal Pickup / Pembatalan' : '' }}
    {{ request()->routeIs('mitra.pengiriman') ? 'Pengaturan Pengiriman' : '' }}
    {{ request()->routeIs('mitra.layanan') ? 'Layanan Saya' : '' }}
    {{ request()->routeIs('mitra.tambah-layanan') ? 'Tambah Layanan' : '' }}
    {{ request()->routeIs('mitra.gambar') ? 'Gambar Toko' : '' }}
    {{ request()->routeIs('mitra.diskon') ? 'Diskon Toko' : '' }}
    {{ request()->routeIs('mitra.penilaian') ? 'Penilaian Toko' : '' }}
    {{ request()->routeIs('mitra.chat') ? 'Manajemen Chat' : '' }}
    {{ request()->routeIs('mitra.penghasilan') ? 'Penghasilan Saya' : '' }}
    {{ request()->routeIs('mitra.saldo') ? 'Saldo Saya' : '' }}
    {{ request()->routeIs('mitra.rekening') ? 'Rekening Bank' : '' }}
    {{ request()->routeIs('mitra.performa') ? 'Performa Toko' : '' }}
    {{ request()->routeIs('mitra.kesehatan') ? 'Kesehatan Toko' : '' }}

  </div>

  <!-- RIGHT -->
  <div class="header-right">
    <!-- STORE DROPDOWN -->
    <div class="store-dropdown">
      <div class="store-info" id="dropdownToggle">
        <div class="store-avatar">
          🏪
        </div>
        <div class="store-text-info">
          <div class="store-name">
            {{ Auth::user()->mitraLaundry->store_name ?? Auth::user()->name }}
          </div>
          <div class="store-role">
            Mitra
          </div>
        </div>
        <span class="chevron" id="chevron">
          ▾
        </span>
      </div>
      <!-- DROPDOWN MENU -->
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
            <button type="submit" class="dropdown-item logout-item logout-btn">
                Logout
            </button>
        </form>
      </div>
    </div>
  </div>
</header>

<script>
  // Dropdown profil
  const dropdownToggle = document.getElementById('dropdownToggle');
  const dropdownMenu = document.getElementById('dropdownMenu');
  const chevron = document.getElementById('chevron');

  dropdownToggle.addEventListener('click', () => {
    dropdownMenu.classList.toggle('active');
    chevron.classList.toggle('rotate');
  });

  document.addEventListener('click', function (e) {
    if (
      !dropdownToggle.contains(e.target) &&
      !dropdownMenu.contains(e.target)
    ) {
      dropdownMenu.classList.remove('active');
      chevron.classList.remove('rotate');
    }
  });

  // Sidebar toggle (mobile)
  const hamburgerToggle = document.getElementById('hamburgerToggle');
  const sidebar = document.querySelector('.sidebar');
  const sidebarOverlay = document.getElementById('sidebarOverlay');

  function openSidebar() {
    sidebar.classList.add('open');
    sidebarOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeSidebar() {
    sidebar.classList.remove('open');
    sidebarOverlay.classList.remove('active');
    document.body.style.overflow = '';
  }

  hamburgerToggle.addEventListener('click', () => {
    if (sidebar.classList.contains('open')) {
      closeSidebar();
    } else {
      openSidebar();
    }
  });

  sidebarOverlay.addEventListener('click', closeSidebar);

  // Menutup sidebar saat item navigasi diklik (mobile)
  document.querySelectorAll('.sidebar .nav-item').forEach(item => {
    item.addEventListener('click', () => {
      if (window.innerWidth <= 768) {
        closeSidebar();
      }
    });
  });
</script>
