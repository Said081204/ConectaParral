<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Conecta Parral</title>

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

  <!-- FAVICONS -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">

  <!-- Fuentes -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;600&family=Nunito:wght@300;400;600&display=swap" rel="stylesheet">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- FontAwesome -->
  <script src="https://kit.fontawesome.com/8e98006f77.js" crossorigin="anonymous"></script>
</head>


<body class="bg-white">

  {{-- COMPONENTES PÚBLICOS --}}
  @includeIf('public.header')
  @includeIf('public.portada')
  @includeIf('public.categorias')
  @includeIf('public.productos')
  {{-- @includeIf('public.visitarnos') --}}
  {{-- @includeIf('public.ubicaciones') --}}
  @includeIf('public.footer')

  <!-- JS -->
  <script src="{{ asset('js/public/header.js') }}"></script>
 <!-- <script src="{{ asset('js/public/productos.js') }}"></script>-->
 

</body>
</html>
