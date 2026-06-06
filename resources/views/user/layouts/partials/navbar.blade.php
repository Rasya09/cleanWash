

<!-- ===== NAVBAR ===== -->
<nav class="nav">
  <a href="{{ route('home') }}" class="nav-brand">
    <img class="nav-logo-icon" src="{{ asset('assets/images/CW.png') }}" alt="Clean Wash Logo" />
  </a>

  <!-- Menu Desktop -->
  <ul class="nav-menu">
    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
    <li><a href="{{ route('cari-laundry') }}" class="{{ request()->routeIs('cari-laundry') ? 'active' : '' }}" >Cari Laundry</a></li>
    <li><a href="{{ route('layanan') }}" class="{{ request()->routeIs('layanan') ? 'active' : '' }}">Layanan</a></li>
  </ul>

  @guest
  <!-- Aksi Navbar Desktop (Guest) -->
  <div class="nav-actions" id="navActionsDesktop">
    <a href="/register" class="btn-ghost">Daftar</a>
    <a href="/login" class="btn-primary">Masuk</a>
  </div>
  @endguest

    @auth
    @php
        $name    = Auth::user()->name;
        $words   = explode(' ', $name);
        $initial = count($words) >= 2
            ? strtoupper(substr($words[0],0,1) . substr($words[1],0,1))
            : strtoupper(substr($name,0,2));
    @endphp
    <!-- Aksi Navbar Desktop (Auth) -->
    <div class="nav-user" id="navUserDesktop">
        <div class="nav-user-avatar" id="desktopAvatar">{{ $initial }}</div>
        <div class="nav-user-info">
            <span class="nav-user-name">{{ Auth::user()->name }}</span>
            <span class="nav-user-role">Pengguna Aktif</span>
        </div>
        <div class="nav-user-dropdown" id="desktopDropdown">
        <button class="dropdown-item">
            <a href="{{ route('user.profile') }}">Profil Saya</a>
        </button>
        @if(Auth::user()->role == 'user')
        <button class="dropdown-item">
            <a href="{{ route('user.register.step1') }}">Registrasi Mitra</a>
        </button>
        @endif
        <button class="dropdown-item">
            <a href="{{ route('user.chat') }}">Obrolan</a>
        </button>
        @if(Auth::user()->role == 'admin')
        <button class="dropdown-item"><a href="{{ route('admin.dashboard') }}">Dashboard admin</a></button>
        @endif
        @if(Auth::user()->role == 'mitra')
        <button class="dropdown-item"><a href="{{ route('mitra.dashboard') }}">Dashboard mitra</a></button>
        @endif
        <div class="dropdown-divider"></div>
        <form action="{{ route('logout') }}" method="POST" style="margin:0; width:100%;">
            @csrf
            <button type="submit" class="dropdown-item danger">Keluar</button>
        </form>
        </div>
    </div>
    @endauth

  <!-- Menu Hamburger -->
  <button class="hamburger" id="hamburger" aria-label="Menu" onclick="toggleMobileNav()">
    <span></span><span></span><span></span>
  </button>

  <!-- Navbar Mobile -->
  <div class="nav-mobile-menu" id="mobileNav">
      @auth
      <div class="nav-mobile-user">
          <div class="nav-mobile-avatar">{{ $initial ?? '?' }}</div>
          <div>
              <div class="nav-mobile-name">{{ Auth::user()->name }}</div>
              <div class="nav-mobile-role">Pengguna Aktif</div>
          </div>
      </div>
      @endauth

      <a href="{{ route('home') }}" class="nav-mobile-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
      <a href="{{ route('cari-laundry') }}" class="nav-mobile-link {{ request()->routeIs('cari-laundry') ? 'active' : '' }}">Cari Laundry</a>
      <a href="{{ route('layanan') }}" class="nav-mobile-link {{ request()->routeIs('layanan') ? 'active' : '' }}">Layanan</a>

      @guest
      <div class="nav-mobile-divider"></div>
      <a href="/register" class="nav-mobile-link" style="text-align: center;">Daftar</a>
      <a href="/login" class="nav-mobile-link" style="text-align: center; color: var(--blue-primary); font-weight: 600;">Masuk</a>
      @endguest

      @auth
      <div class="nav-mobile-divider"></div>
      <a href="{{ route('user.profile') }}" class="nav-mobile-link">Profil Saya</a>
      <a href="{{ route('user.pesanan') }}" class="nav-mobile-link">Pesanan Saya</a>
      <a href="{{ route('user.chat') }}" class="nav-mobile-link">Obrolan</a>
      
      @if(Auth::user()->role == 'user')
      <a href="{{ route('user.register.step1') }}" class="nav-mobile-link">Registrasi Mitra</a>
      @endif
      
      @if(Auth::user()->role == 'admin')
      <a href="{{ route('admin.dashboard') }}" class="nav-mobile-link">Dashboard admin</a>
      @endif
      
      @if(Auth::user()->role == 'mitra')
      <a href="{{ route('mitra.dashboard') }}" class="nav-mobile-link">Dashboard mitra</a>
      @endif
      
      <div class="nav-mobile-divider"></div>
      <form action="{{ route('logout') }}" method="POST" style="margin:0;">
          @csrf
          <button type="submit" class="nav-mobile-logout">Keluar</button>
      </form>
      @endauth
  </div>
</nav>

<script>
    function toggleMobileNav() {
        const hamburger = document.getElementById('hamburger');
        const mobileNav = document.getElementById('mobileNav');
        if (hamburger && mobileNav) {
            const isOpen = hamburger.classList.toggle('open');
            if (isOpen) {
                mobileNav.style.display = 'flex';
                void mobileNav.offsetWidth;
                mobileNav.classList.add('open');
            } else {
                mobileNav.classList.remove('open');
                setTimeout(() => { mobileNav.style.display = 'none'; }, 300);
            }
        }
    }

    document.addEventListener('click', (e) => {
        const mobileNav = document.getElementById('mobileNav');
        const hamburger = document.getElementById('hamburger');
        if (mobileNav && hamburger && !mobileNav.contains(e.target) && !hamburger.contains(e.target)) {
            if (mobileNav.classList.contains('open')) {
                toggleMobileNav();
            }
        }
    });
</script>
