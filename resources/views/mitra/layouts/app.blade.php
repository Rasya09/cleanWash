<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $routeName = request()->route()?->getName() ?? '';
        $pageTitle = config('mitra_header.' . $routeName, 'Mitra Laundry');
    @endphp
    <title>@yield('title', $pageTitle . ' — Mitra Laundry')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/mitra/layout.css') }}">
    @yield('css')
</head>
<body>

    @include('mitra.layouts.partials.sidebar')

    <div class="main-wrapper">

        @include('mitra.layouts.partials.navbar')

        <div class="mitra-page-content">
            @yield('content')
        </div>

    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    @include('mitra.layouts.partials.sidebar-mobile')

    @stack('scripts')

</body>
</html>
