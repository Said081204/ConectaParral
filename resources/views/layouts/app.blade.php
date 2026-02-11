<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Conecta Parral')</title>

  {{-- VITE (Tailwind + JS compilados) --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Favicons --}}
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32.png') }}?v=1">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16.png') }}?v=1">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">

  {{-- Fuentes --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;600;800&family=Nunito:wght@300;400;700&display=swap" rel="stylesheet">

  {{-- FontAwesome --}}
  <script src="https://kit.fontawesome.com/8e98006f77.js" crossorigin="anonymous"></script>
</head>

<body class="bg-white m-0 antialiased">
@php
  /**
   * Detecta si es página de autenticación
   * (login / register / password)
   */
  $isAuthPage =
      request()->is('login') ||
      request()->is('register') ||
      request()->is('password/*');
@endphp

{{-- ================= HEADER (solo público) ================= --}}
@unless($isAuthPage)
  @includeIf('public.header')
@endunless

{{-- ================= CONTENIDO ================= --}}
<main class="{{ $isAuthPage ? '' : 'pt-[76px] md:pt-[90px]' }}">
  @yield('content')
</main>

{{-- ================= FOOTER (solo público) ================= --}}
@unless($isAuthPage)
  @includeIf('public.footer')
@endunless

</body>
</html>
