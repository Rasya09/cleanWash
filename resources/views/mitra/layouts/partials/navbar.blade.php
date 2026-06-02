@php
  $routeName = request()->route()?->getName() ?? '';
  $headerTitle = config('mitra_header.' . $routeName, 'Mitra Laundry');
@endphp

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
          <div class="store-name">Laundry Bersih Jaya</div>
          <div class="store-role">Mitra</div>
        </div>
        <span class="chevron" id="chevron">▾</span>
      </div>

      <div class="dropdown-menu" id="dropdownMenu">
        <div class="dropdown-header">
          <p>Mitra Laundry</p>
        </div>
        <a href="#" class="dropdown-item">Profil Toko</a>
        <a href="#" class="dropdown-item">Pengaturan Akun</a>
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
