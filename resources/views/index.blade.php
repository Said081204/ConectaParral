<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conecta Parral</title>

  {{-- ✅ VITE (Tailwind + tus CSS/JS compilados) --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Favicons --}}
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32.png') }}?v=1">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16.png') }}?v=1">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">

  {{-- Fuentes (OK dejarlas así) --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;600&family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">

  {{-- FontAwesome (OK) --}}
  <script src="https://kit.fontawesome.com/8e98006f77.js" crossorigin="anonymous"></script>
</head>

<body class="bg-white">

  {{-- COMPONENTES PÚBLICOS --}}
  @includeIf('public.header')
  @includeIf('public.portada')
  @includeIf('public.categorias')
  @includeIf('public.productos')
  @includeIf('public.footer')

  {{-- ❌ Ya NO cargues JS manual desde /public si lo vas a meter a Vite --}}
  {{-- <script src="{{ asset('js/public/header.js') }}"></script> --}}

</body>
</html>
