<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
  <title>ТОО СИЛМАСТЕР | @yield('title', 'Производство манжет и уплотнений в Караганде')</title>
  <meta name="description" content="@yield('description')">
  <meta name="keywords" content="@yield('keywords')">

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicons -->
  <link href="{{ asset('favicon.ico') }}" rel="icon">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('site.webmanifest') }}">
  <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#358AEF">
  <meta name="robots" content="index, follow"/>

  <!-- styles -->
  <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
  @stack('styles')
</head>

<body class="d-flex flex-column h-100">
  @include('front.layouts.chunks.header')
  <main>
    @yield('content')
  </main>
  <aside class="container mb-5">
    @yield('aside')
  </aside>

  @include('front.layouts.chunks.footer')

  <script src="{{ asset('assets/front/js/main.js') }}"></script>
  @stack('scripts')
</body>
</html>
