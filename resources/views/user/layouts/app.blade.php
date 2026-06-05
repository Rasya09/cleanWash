<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Clean Wash</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@500;600;700;800&family=Instrument+Sans:wght@400;500;600&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@400,0&display=swap" rel="stylesheet">
    @yield('css')
</head>
<body>

    @include('user.layouts.partials.navbar')
    
    @yield('content')

    @include('user.layouts.partials.footer')

    {{-- navbar.js harus PERTAMA --}}
    <script src="{{ asset('assets/js/user/navbar.js') }}"></script>

    @stack('scripts')
    
    @yield('js')

</body>
</html>