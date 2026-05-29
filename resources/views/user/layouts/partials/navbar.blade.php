<style>
/* ===== NAVBAR ===== */
    .nav {
      /* position: fixed; */
      position: relative;
      top: 0; left: 0; right: 0;
      height: var(--nav-h);
      background: rgba(255,255,255,0.90);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(26,86,232,0.08);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 40px;
      z-index: 1000;
      box-shadow: 0 2px 20px rgba(0,0,0,0.05);
    }
    .nav-brand {
      display: flex;
      align-items: center;
      gap: 10px;
      text-decoration: none;
    }
    .nav-logo-icon {
      width: 150px; 
      height: 50px;
    }
    .nav-logo-text {
      font-family: 'Bricolage Grotesque', sans-serif;
      font-weight: 700;
      font-size: 18px;
      color: var(--blue-dark);
    }
    .nav-menu {
      display: flex;
      align-items: center;
      gap: 32px;
      list-style: none;
    }
    .nav-menu a {
      text-decoration: none;
      font-size: 15px;
      font-weight: 500;
      color: var(--text-secondary);
      transition: color 0.2s;
    }
    .nav-menu a.active, .nav-menu a:hover { color: var(--blue-primary); }
    .nav-menu a.active { border-bottom: 2px solid var(--blue-primary); padding-bottom: 2px; }
    .nav-actions {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .btn-ghost {
      padding: 8px 18px;
      border: var(--border);
      background: transparent;
      border-radius: var(--radius-sm);
      font-size: 14px;
      font-weight: 500;
      color: var(--text-secondary);
      transition: background 0.2s;
    }
    .btn-ghost a {
      color: var(--text-secondary);
      text-decoration: none;
    }
    .btn-ghost:hover { background: var(--grey-96); }
    .btn-primary {
      padding: 8px 20px;
      border: none;
      background: var(--blue-primary);
      border-radius: var(--radius-sm);
      font-size: 14px;
      font-weight: 600;
      font-family: 'Bricolage Grotesque', sans-serif;
      color: #fff;
      letter-spacing: 0.14px;
      transition: background 0.2s;
    }
    .btn-primary a {
      color: #fff;
      text-decoration: none;
    }
    .btn-primary:hover { background: #1246c8; }

    /* ===== DESKTOP: User Profile in Navbar ===== */
    .nav-user {
      display: flex;
      align-items: center;
      gap: 10px;
      position: relative;
    }
    .nav-user-avatar {
      width: 36px; height: 36px;
      border-radius: 50%;
      background: var(--blue-primary);
      border: 2px solid rgba(26,86,232,0.3);
      display: flex; align-items: center; justify-content: center;
      font-family: 'Bricolage Grotesque', sans-serif;
      font-weight: 700;
      font-size: 14px;
      color: #fff;
      cursor: pointer;
      transition: border-color 0.2s;
    }
    .nav-user-avatar:hover { border-color: var(--blue-primary); }
    .nav-user-info {
      display: flex;
      flex-direction: column;
    }
    .nav-user-name {
      font-size: 14px;
      font-weight: 600;
      color: var(--blue-dark);
      line-height: 1.2;
    }
    .nav-user-role {
      font-size: 11px;
      color: var(--text-secondary);
    }
    .nav-user-dropdown {
      position: absolute;
      top: calc(100% + 10px);
      right: 0;
      background: #fff;
      border: var(--border);
      border-radius: var(--radius-md);
      box-shadow: 0 8px 32px rgba(0,0,0,0.12);
      min-width: 180px;
      overflow: hidden;
      opacity: 0;
      pointer-events: none;
      transform: translateY(-8px);
      transition: all 0.2s;
      z-index: 100;
    }
    .nav-user-dropdown.open {
      opacity: 1;
      pointer-events: all;
      transform: translateY(0);
    }
    .dropdown-item {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 12px 16px;
      font-size: 14px;
      color: var(--blue-dark);
      cursor: pointer;
      transition: background 0.15s;
      border: none;
      background: none;
      width: 100%;
      text-align: left;
    }
    .dropdown-item a {
      color: var(--blue-dark);
      text-decoration: none;
      width: 100%;
    }
    .dropdown-item:hover { background: var(--grey-96); }
    .dropdown-item.danger { color: #e03232; }
    .dropdown-item.danger:hover { background: #fff5f5; }
    .dropdown-divider {
      height: 1px;
      background: #e5e9f5;
      margin: 4px 0;
    }

    /* Hamburger */
    .hamburger {
      display: none;
      flex-direction: column;
      gap: 5px;
      background: none;
      border: none;
      padding: 4px;
      cursor: pointer;
    }
    .hamburger span {
      display: block;
      width: 24px; height: 2px;
      background: var(--blue-dark);
      border-radius: 2px;
      transition: all 0.3s;
    }
    .hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(5px,5px); }
    .hamburger.open span:nth-child(2) { opacity: 0; }
    .hamburger.open span:nth-child(3) { transform: rotate(-45deg) translate(5px,-5px); }
</style>
<!-- ===== NAVBAR ===== -->
<nav class="nav">
  <a href="{{ route('home') }}" class="nav-brand">
    <img class="nav-logo-icon" src="{{ asset('assets/images/CW.png') }}" alt="Clean Wash Logo" class="nav-logo-icon" />
  </a>

  <!-- Desktop menu -->
  <ul class="nav-menu">
    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
    <li><a href="{{ route('cari-laundry') }}" class="{{ request()->routeIs('cari-laundry') ? 'active' : '' }}" >Cari Laundry</a></li>
    <li><a href="{{ route('layanan') }}" class="{{ request()->routeIs('layanan') ? 'active' : '' }}">Layanan</a></li>
  </ul>

  @guest
  <!-- Desktop: Auth buttons (logged out) -->
  <div class="nav-actions" id="navActionsDesktop">
    <button class="btn-ghost"><a href="/register">Daftar</a></button>
    <button class="btn-primary"><a href="/login">Masuk</a></button>
  </div>
  @endguest

  @auth
    @php
        $name = Auth::user()->name;
        $words = explode(' ', $name);
        if(count($words) >= 2){
            $initial = strtoupper(substr($words[0],0,1) . substr($words[1],0,1));
        } else {
            $initial = strtoupper(substr($name,0,2));
        }
    @endphp
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
        <button class="dropdown-item">Obrolan</button>
        @if(Auth::user()->role == 'admin')
        <button class="dropdown-item"><a href="{{ route('admin.dashboard') }}">Dashboard admin</a></button>
        @endif
        <div class="dropdown-divider"></div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item danger">Keluar</button>
        </form>
        
        </div>
    </div>
    <!-- Hamburger (mobile/tablet) -->
    <button class="hamburger" id="hamburger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  @endauth

</nav>