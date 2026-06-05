<style>
/* ===== CSS VARIABLES GLOBAL ===== */
:root {
    --blue-primary:   #1a56e8;
    --blue-dark:      #0d1e5c;
    --blue-light:     #e8eeff;
    --white:          #ffffff;
    --grey-96:        #f5f5f7;
    --text-secondary: #4a5a8a;
    --radius-sm:      10px;
    --radius-md:      14px;
    --nav-h:          72px;
}

/* ===== NAVBAR ===== */
.nav {
    position: sticky;
    top: 0; left: 0; right: 0;
    height: var(--nav-h);
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(26,86,232,0.08);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 40px;
    z-index: 1000;
    box-shadow: 0 2px 20px rgba(0,0,0,0.05);
    width: 100%;
    box-sizing: border-box;
}

.nav-brand {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    flex-shrink: 0;
}

.nav-logo-icon {
    width: 130px;
    height: 44px;
    object-fit: contain;
    display: block;
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
.nav-menu a.active,
.nav-menu a:hover { color: var(--blue-primary); }
.nav-menu a.active {
    border-bottom: 2px solid var(--blue-primary);
    padding-bottom: 2px;
}

.nav-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}
.btn-ghost {
    padding: 8px 18px;
    border: 1px solid #e5e9f5;
    background: transparent;
    border-radius: var(--radius-sm);
    font-size: 14px;
    font-weight: 500;
    color: var(--text-secondary);
    cursor: pointer;
    transition: background 0.2s;
}
.btn-ghost a { color: var(--text-secondary); text-decoration: none; }
.btn-ghost:hover { background: var(--grey-96); }

.btn-primary {
    padding: 8px 20px;
    border: none;
    background: var(--blue-primary);
    border-radius: var(--radius-sm);
    font-size: 14px;
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
    color: #fff;
    cursor: pointer;
    transition: background 0.2s;
}
.btn-primary a { color: #fff; text-decoration: none; }
.btn-primary:hover { background: #1246c8; }

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
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 14px;
    color: #fff;
    cursor: pointer;
    transition: border-color 0.2s;
    flex-shrink: 0;
}
.nav-user-avatar:hover { border-color: var(--blue-primary); }
.nav-user-info { display: flex; flex-direction: column; }
.nav-user-name {
    font-size: 14px; font-weight: 600;
    color: var(--blue-dark); line-height: 1.2;
}
.nav-user-role { font-size: 11px; color: var(--text-secondary); }

.nav-user-dropdown {
    position: absolute;
    top: calc(100% + 10px);
    right: 0;
    background: #fff;
    border: 1px solid #e5e9f5;
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
    display: flex; align-items: center; gap: 10px;
    padding: 12px 16px;
    font-size: 14px; color: var(--blue-dark);
    cursor: pointer;
    transition: background 0.15s;
    border: none; background: none;
    width: 100%; text-align: left;
}
.dropdown-item a { color: var(--blue-dark); text-decoration: none; width: 100%; }
.dropdown-item:hover { background: var(--grey-96); }
.dropdown-item.danger { color: #e03232; }
.dropdown-item.danger:hover { background: #fff5f5; }
.dropdown-divider { height: 1px; background: #e5e9f5; margin: 4px 0; }

.hamburger {
    display: none;
    flex-direction: column;
    gap: 5px;
    background: none;
    border: none;
    padding: 6px;
    cursor: pointer;
    flex-shrink: 0;
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

.nav-mobile-menu {
    display: none;
    position: absolute;
    top: var(--nav-h);
    left: 0; right: 0;
    background: #fff;
    border-bottom: 1px solid #e5e9f5;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    flex-direction: column;
    z-index: 999;
    padding: 8px 0;
    width: 100%;
}
.nav-mobile-menu.open { display: flex; }

.nav-mobile-link {
    padding: 14px 24px;
    font-size: 15px;
    font-weight: 500;
    color: var(--blue-dark);
    text-decoration: none;
    border-bottom: 1px solid #f0f4ff;
    transition: background .15s;
}
.nav-mobile-link:last-child { border-bottom: none; }
.nav-mobile-link:hover { background: var(--grey-96); }
.nav-mobile-link.active { color: var(--blue-primary); font-weight: 600; }

.nav-mobile-divider { height: 1px; background: #e5e9f5; margin: 4px 0; }

.nav-mobile-user {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 24px;
    border-bottom: 1px solid #f0f4ff;
}
.nav-mobile-avatar {
    width: 36px; height: 36px;
    border-radius: 50%;
    background: var(--blue-primary);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Bricolage Grotesque', sans-serif;
    font-weight: 700; font-size: 13px; color: #fff;
    flex-shrink: 0;
}
.nav-mobile-name { font-size: 14px; font-weight: 600; color: var(--blue-dark); }
.nav-mobile-role { font-size: 11px; color: var(--text-secondary); }

.nav-mobile-logout {
    padding: 14px 24px;
    font-size: 15px; font-weight: 500;
    color: #e03232;
    background: none; border: none;
    width: 100%; text-align: left;
    cursor: pointer;
}

@media (max-width: 768px) {
    .nav { padding: 0 16px; }
    .nav-menu { display: none; }
    .nav-actions { display: none; }
    .nav-user-info { display: none; }
    .hamburger { display: flex; }
}
</style>

<!-- ===== NAVBAR ===== -->
<nav class="nav">
    <a href="{{ route('home') }}" class="nav-brand">
        <img class="nav-logo-icon" src="{{ asset('assets/images/CW.png') }}" alt="Clean Wash Logo" />
    </a>

    <ul class="nav-menu">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
        <li><a href="{{ route('cari-laundry') }}" class="{{ request()->routeIs('cari-laundry') ? 'active' : '' }}">Cari Laundry</a></li>
        <li><a href="{{ route('layanan') }}" class="{{ request()->routeIs('layanan') ? 'active' : '' }}">Layanan</a></li>
    </ul>

    @guest
    <div class="nav-actions">
        <button class="btn-ghost"><a href="/register">Daftar</a></button>
        <button class="btn-primary"><a href="/login">Masuk</a></button>
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

    <div class="nav-user" id="navUserDesktop">
        <div class="nav-user-avatar" id="desktopAvatar">{{ $initial }}</div>
        <div class="nav-user-info">
            <span class="nav-user-name">{{ Auth::user()->name }}</span>
            <span class="nav-user-role">Pengguna Aktif</span>
        </div>
        <div class="nav-user-dropdown" id="desktopDropdown">
            <button class="dropdown-item"><a href="{{ route('user.profile') }}">Profil Saya</a></button>
            <button class="dropdown-item"><a href="{{ route('user.chat') }}">Obrolan</a></button>
            @if(Auth::user()->role == 'admin')
            <button class="dropdown-item"><a href="{{ route('admin.dashboard') }}">Dashboard Admin</a></button>
            @endif
            <div class="dropdown-divider"></div>
            <form action="{{ route('logout') }}" method="POST">
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

        @guest
        <div class="nav-mobile-divider"></div>
        <a href="/register" class="nav-mobile-link">Daftar</a>
        <a href="/login" class="nav-mobile-link">Masuk</a>
        @endguest
    </div>
</nav>
