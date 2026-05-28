@auth
<aside class="sidebar">
    <div class="profile-card">
        <div class="profile-banner"></div>
        <div class="profile-avatar">
            <div class="profile-btn">
                <div class="profile-circle">
                    {{ $initial }}
                </div>
            </div>
        </div>
        <div class="profile-info">
            <h3 class="profile-name">{{ Auth::user()->name }}</h3>
            <span class="profile-badge">Customer Aktif</span>
        </div>
        <button class="hamburger" onclick="toggleNav()" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <nav class="sidebar-nav" id="sidebar-nav">
        <a href="{{ route('user.profile') }}" class="nav-item {{ request()->routeIs('user.profile') ? 'active' : '' }}">Profil Saya</a>
        <a href="{{ route('user.alamat-saya') }}" class="nav-item {{ request()->routeIs('user.alamat-saya') ? 'active' : '' }}">Alamat Saya</a>
        {{-- <a href="{{ route('user.keamanan-akun') }}" class="nav-item {{ request()->routeIs('user.keamanan-akun') ? 'active' : '' }}">Keamanan Akun</a> --}}
    </nav>
</aside>
@endauth