@php
  $routeName = request()->route()?->getName() ?? '';
  $headerMeta = config('admin_header.' . $routeName, [
    'title' => 'Admin Panel',
    'subtitle' => 'LaundryHub — panel administrasi platform.',
  ]);
@endphp
<!-- ====== HEADER ====== -->
<header class="header">
    <button class="header-menu-btn" type="button" aria-label="Menu">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
    <div class="header-title-block">
      <h2>@yield('page_title', $headerMeta['title'])</h2>
      <p>@yield('page_subtitle', $headerMeta['subtitle'])</p>
    </div>
    <div class="header-spacer"></div>

    <!-- User -->
    <div class="header-user">
      <div class="header-avatar">
        <svg viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:100%;">
          <rect width="36" height="36" fill="#4B5563"/>
          <circle cx="18" cy="14" r="7" fill="#9CA3AF"/>
          <path d="M4 34c0-7.732 6.268-14 14-14s14 6.268 14 14" fill="#6B7280"/>
        </svg>
      </div>
      <div class="header-user-info">
        <div class="user-name">Super Admin</div>
        <div class="user-role">Administrator</div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
      </svg>
    </div>
</header>
