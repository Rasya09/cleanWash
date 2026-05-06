<!-- ── NAVBAR ── -->
<header class="navbar">
    <div class="container nav-wrapper">
        <div class="logo">
            <img src="{{ asset('assets/images/CW.png') }}" alt="Clean Wash Logo" />
        </div>
        <nav class="nav-menu">
            <a href="{{ route('home') }}" class="{{request()->routeIs('home') ? 'active' : ''}}">Beranda</a>
            <a href="{{ route('cari-laundry') }}" class="{{request()->routeIs('cari-laundry') ? 'active' : ''}}">Cari Laundry</a>
            <a href="{{ route('layanan') }}" class="{{request()->routeIs('layanan') ? 'active' : ''}}">Layanan</a>
        </nav>
        <div class="nav-actions">
            <a href="{{ route('login') }}" class="btn-login">Login</a>
        </div>
    </div>
</header>