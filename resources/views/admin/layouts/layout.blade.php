
<!DOCTYPE html>
<html lang="ru" class="h-100">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>ТОО СИЛМАСТЕР | @yield('title', 'Производство манжет и уплотнений в Караганде')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('favicon.png') }}" rel="icon">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('site.webmanifest') }}">
  <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#358AEF">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/admin/css/admin.css') }}" rel="stylesheet">
  @stack('styles')
</head>

<body class="d-flex flex-column justify-content-between h-100">

  <!-- ======= Header ======= -->
  @include('admin.layouts.chunks.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('admin.layouts.chunks.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
        <h1>@yield('title')</h1>
        <nav>
            @yield('breadcrumb')
        </nav>
    </div><!-- End Page Title -->

  @include('admin.layouts.chunks.alerts')
   @yield('main-content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; {{ date('Y') }} ТОО <strong><span>СИЛМАСТЕР</span></strong>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/admin/js/admin.js') }}"></script>
  @stack('scripts')
</body>
</html>
