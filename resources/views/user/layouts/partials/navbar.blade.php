

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
        <button class="dropdown-item">Obrolan</button>
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

    <button class="hamburger" id="hamburger" aria-label="Menu">
        <span></span><span></span><span></span>
    </button>

    <div class="nav-mobile-menu" id="mobileMenu">
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

        @auth
        <div class="nav-mobile-divider"></div>
        <a href="{{ route('user.profile') }}" class="nav-mobile-link">Profil Saya</a>
        <a href="{{ route('user.pesanan') }}" class="nav-mobile-link">Pesanan Saya</a>
        <div class="nav-mobile-divider"></div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-mobile-logout">Keluar</button>
        </form>
        @endauth

  <!-- Menu Hamburger -->
  <button class="hamburger" id="hamburger" aria-label="Menu" onclick="toggleMobileNav()">
    <span></span><span></span><span></span>
  </button>

  <!-- Navbar Mobile -->
  <div class="mobile-nav" id="mobileNav">
      <ul class="mobile-menu">
          <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
          <li><a href="{{ route('cari-laundry') }}" class="{{ request()->routeIs('cari-laundry') ? 'active' : '' }}">Cari Laundry</a></li>
          <li><a href="{{ route('layanan') }}" class="{{ request()->routeIs('layanan') ? 'active' : '' }}">Layanan</a></li>
      </ul>

      @guest
      <!-- Aksi Navbar Mobile (Guest) -->
      <div class="mobile-actions">
          <a href="/register" class="btn-ghost" style="width: 100%; box-sizing: border-box;">Daftar</a>
          <a href="/login" class="btn-primary" style="width: 100%; box-sizing: border-box;">Masuk</a>
      </div>
      @endguest

      @auth
      <!-- Aksi Navbar Mobile (Auth) -->
      <div class="dropdown-divider"></div>
      <ul class="mobile-menu">
          <li><a href="{{ route('user.profile') }}">Profil Saya</a></li>
          <li><a href="#">Obrolan</a></li>
          @if(Auth::user()->role == 'admin')
          <li><a href="{{ route('admin.dashboard') }}">Dashboard admin</a></li>
          @endif
          <li>
              <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                  @csrf
                  <button type="submit" style="background:none; border:none; color:#e03232; font-weight:500; font-size:16px; padding:0; text-align:left; width:100%; cursor:pointer;">Keluar</button>
              </form>
          </li>
      </ul>
      @endauth
  </div>
        @guest
        <div class="nav-mobile-divider"></div>
        <a href="/register" class="nav-mobile-link">Daftar</a>
        <a href="/login" class="nav-mobile-link">Masuk</a>
        @endguest
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
