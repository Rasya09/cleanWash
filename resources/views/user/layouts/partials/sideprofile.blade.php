@auth
@php
    if (!isset($initial)) {
        $name = Auth::user()->name;
        $words = explode(' ', $name);
        if (count($words) >= 2) {
            $initial = strtoupper(substr($words[0],0,1) . substr($words[1],0,1));
        } else {
            $initial = strtoupper(substr($name,0,2));
        }
    }
@endphp

<aside class="sidebar">
    <div class="profile-card">
        <div class="profile-banner"></div>
        <div class="profile-avatar">
            <div class="profile-btn">
                <div class="profile-circle">{{ $initial }}</div>
            </div>
        </div>
        <div class="profile-info">
            <h3 class="profile-name">{{ Auth::user()->name }}</h3>
            @if(Auth::user()->role == 'user')
                <span class="profile-badge">Customer Aktif</span>
            @endif
            @if(Auth::user()->role == 'mitra')
                <span class="profile-badge">Mitra Aktif</span>
            @endif
        </div>
        <button class="sidebar-toggle" id="sidebarHamburger" onclick="toggleNav()" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <nav class="sidebar-nav" id="sidebar-nav">
        @if(Auth::user()->role == 'user')
            <a href="{{ route('user.profile') }}"
                class="nav-item {{ request()->routeIs('user.profile') ? 'active' : '' }}">
                Profil Saya
            </a>
        @else
            <a href="{{ route('mitra.profile') }}"
                class="nav-item {{ request()->routeIs('mitra.profile') ? 'active' : '' }}">
                    Profil Saya
            </a>
        @endif
        @if(Auth::user()->role == 'user')
            <a href="{{ route('user.alamat-saya') }}"
                class="nav-item {{ request()->routeIs('user.alamat-saya') ? 'active' : '' }}">
                    Alamat Saya
            </a>
        @else
            <a href="{{ route('mitra.alamat-saya') }}"
                class="nav-item {{ request()->routeIs('mitra.alamat-saya') ? 'active' : '' }}">
                    Alamat Saya
            </a>
        @endif
        
    </nav>
</aside>
@endauth