<!doctype html>
<html lang="es" class="h-full">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'ConectaParral')</title>

  {{-- CSS exclusivo para login / registro --}}
  @vite(['resources/css/auth.css'])

  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16.png') }}">
</head>

<body class="min-h-screen antialiased text-gray-900 bg-gray-50">

  <div class="min-h-screen flex flex-col">

    {{-- HEADER CON LOGO Y DIVISIÓN --}}
    <header class="bg-white border-b border-gray-200">
      <div class="mx-auto w-full max-w-[1600px] px-6 h-[96px]
                  flex items-center justify-center">
        <a href="{{ url('/') }}">
          <img
            src="{{ asset('img/cppp.png') }}"
            alt="ConectaParral"
            class="h-12 md:h-14 2xl:h-16 w-auto object-contain select-none"
            draggable="false"
          >
        </a>
      </div>
    </header>

    {{-- CONTENIDO --}}
    <main class="flex-1 px-6 pt-8 md:pt-10 lg:pt-12 pb-12">

      <div class="mx-auto w-full max-w-[1600px]">

        {{-- CARD CENTRADA (escala bien en pantallas grandes) --}}
        <div class="mx-auto w-full max-w-[520px] 2xl:max-w-[640px]">

          <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden
                      shadow-[0_30px_90px_rgba(0,0,0,0.15)]">

            {{-- FRANJA DE MARCA (DEGRADADO SUAVE) --}}
            <div class="h-[6px] bg-gradient-to-r
                        from-[#1E3A8A]/90
                        via-blue-600/70
                        to-amber-400/85">
            </div>

            {{-- CONTENIDO DEL FORM --}}
            <div class="p-8 2xl:p-12">
              @yield('content')
            </div>

          </div>

          {{-- FOOTER LEGAL --}}
          <footer class="mt-8 text-center text-xs 2xl:text-sm text-gray-500">
            <div class="flex flex-wrap justify-center gap-x-6 gap-y-2">
              <a href="{{ url('/terminos') }}" class="hover:underline">Condiciones de uso</a>
              <a href="{{ url('/privacidad') }}" class="hover:underline">Privacidad</a>
              <a href="{{ url('/ayuda') }}" class="hover:underline">Ayuda</a>
            </div>
            <div class="mt-2">
              © {{ date('Y') }} ConectaParral
            </div>
          </footer>

        </div>
      </div>
    </main>

  </div>
</body>
</html>
