<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Auth::check() ? Auth::id() : '' }}">
    <title>Mitra Laundry - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('css')
</head>
<body>

    @include('mitra.layouts.partials.sidebar')

<!-- ═══ MAIN ═══ -->
<div class="main-wrapper">

  <!-- HEADER -->
  @include('mitra.layouts.partials.navbar')

  <!-- CONTENT -->
  @yield('content')

</div><!-- /main-wrapper -->

    @stack('scripts')


</body>
</html>
