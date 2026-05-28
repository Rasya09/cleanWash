<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean Wash</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600&family=Bricolage+Grotesque:wght@500;600;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="[fonts.googleapis.com](https://fonts.googleapis.com)" />
    <link rel="preconnect" href="[fonts.gstatic.com](https://fonts.gstatic.com)" crossorigin />
    <link href="[fonts.googleapis.com](https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@500;600;700;800&family=Instrument+Sans:wght@400;500;600&family=Poppins:wght@300;400;500;600;700;800&display=swap)" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@400,0&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" />
    @yield('css')

</head>
<body>

    @include('user.layouts.partials.navbar')
    
    @yield('content')

    @include('user.layouts.partials.footer')

    @stack('scripts')

    <script src="{{ asset('assets/js/user/navbar.js') }}"></script>

</body>
</html>