<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitra Laundry - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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