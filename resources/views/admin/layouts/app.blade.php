<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  @php
    $routeName = request()->route()?->getName() ?? '';
    $pageTitle = config('admin_header.' . $routeName . '.title', 'Admin Panel');
  @endphp
  <title>@yield('title', $pageTitle . ' — LaundryHub Admin')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('assets/css/admin/dashboard.css') }}">
  
  <!-- Google Font: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0"></script>

  @yield('css')

</head>
<body>

<div class="app-wrapper">

  @include('admin.layouts.partials.sidebar')

  @include('admin.layouts.partials.navbar')

  
</div>
<div class="sidebar-overlay mob-overlay" id="sidebarOverlay"></div>

@yield('content')

@include('admin.layouts.partials.sidebar-mobile')

@stack('scripts')

</body>
</html>
