<header id="mainHeader" class="fixed top-0 left-0 w-full z-50 bg-white border-b border-gray-100 shadow-sm antialiased">
  {{-- ================= NAV PRINCIPAL ================= --}}
  <nav id="headerContainer"
       class="w-full flex items-center justify-between h-[76px] md:h-[90px] gap-4 px-[3%] md:px-[5%]">

    {{-- LOGO --}}
    <a href="{{ url('/') }}" id="logoBtn"
       class="flex-shrink-0 cursor-pointer active:scale-95 transition-transform">
      <img src="{{ asset('img/cppp.png') }}"
           alt="ConectaParral"
           class="h-[45px] md:h-[60px] lg:h-[70px] w-auto object-contain">
    </a>

    {{-- ================= BUSCADOR (md+) ================= --}}
    <div class="hidden md:flex w-full justify-center px-4 mx-auto">
      <div class="relative w-full max-w-[1000px]">

        <input type="text" placeholder="Buscar productos..."
          class="w-full bg-[#f0f2f2] border-none rounded-full py-3 pl-12 pr-14 text-[16px]
                 focus:bg-white focus:ring-2 focus:ring-[#1E3A8A] outline-none transition-all">

        {{-- LUPA IZQUIERDA (SVG inline, no pixelea) --}}
        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round"
               class="w-5 h-5">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/>
            <path d="M21 21l-6 -6"/>
          </svg>
        </span>

        {{-- BOTÓN BUSCAR --}}
        <button type="button"
          class="absolute right-1 top-1/2 -translate-y-1/2 bg-[#1E3A8A] text-white
                 w-12 h-[42px] flex items-center justify-center rounded-full
                 hover:bg-blue-800 transition shadow-md"
          aria-label="Buscar">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
               fill="none" stroke="currentColor" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round"
               class="w-5 h-5">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/>
            <path d="M21 21l-6 -6"/>
          </svg>
        </button>
      </div>
    </div>

    {{-- ================= ACCIONES DERECHA ================= --}}
    <div class="flex items-center gap-2 md:gap-4 lg:gap-8 flex-shrink-0">

      {{-- LUPA MÓVIL --}}
      <button id="openSearchMobile" type="button"
        class="md:hidden p-2 text-gray-700 active:scale-125 transition"
        aria-label="Abrir buscador">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round"
             class="w-7 h-7">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/>
          <path d="M21 21l-6 -6"/>
        </svg>
      </button>

      {{-- ================= USUARIO (adaptado con @guest / @auth) ================= --}}

      {{-- INVITADO --}}
      @guest
      <a href="{{ route('login') }}"
         class="hidden md:flex items-center gap-2 px-3 py-2 rounded-xl
                hover:bg-gray-50 active:scale-95 transition">

        <img src="{{ asset('icons/usuario.svg') }}"
             alt="Iniciar sesión"
             class="w-6 h-6 md:w-7 md:h-7 select-none"
             draggable="false">

        <div class="hidden lg:flex flex-col -space-y-1">
          <span class="text-[12px] text-gray-500">Hola</span>
          <span class="text-[15px] font-bold text-gray-900">Inicia sesión</span>
        </div>
      </a>
      @endguest

      {{-- LOGUEADO --}}
      @auth
      <a href="{{ url('/mi-cuenta') }}"
         class="hidden md:flex items-center gap-2 px-3 py-2 rounded-xl
                hover:bg-gray-50 active:scale-95 transition">

        <img src="{{ asset('icons/usuario.svg') }}"
             alt="Mi cuenta"
             class="w-6 h-6 md:w-7 md:h-7 select-none"
             draggable="false">

        <div class="hidden lg:flex flex-col -space-y-1">
          <span class="text-[12px] text-gray-500">Hola, {{ auth()->user()->name }}</span>
          <span class="text-[15px] font-bold text-gray-900">Mi Cuenta</span>
        </div>
      </a>
      @endauth

      {{-- ================= PEDIDOS ================= --}}
      <a href="{{ url('/orders') }}"
         class="hidden md:flex items-center gap-2 px-4 py-2 border-l border-gray-100
                hover:bg-gray-50 active:scale-95 transition">

        <img src="{{ asset('icons/pedidos.svg') }}"
             alt="Pedidos"
             class="w-6 h-6 md:w-7 md:h-7 select-none"
             draggable="false">

        <div class="hidden lg:flex flex-col leading-tight">
          <span class="text-[12px] text-gray-500">Devoluciones</span>
          <span class="text-[15px] font-bold text-gray-900">y Pedidos</span>
        </div>
      </a>

      {{-- ================= CARRITO ================= --}}
      <a href="{{ url('/cart') }}"
         class="relative p-2 hover:bg-gray-50 rounded-full active:scale-90 transition"
         aria-label="Carrito">

        <img src="{{ asset('icons/carrito.svg') }}"
             alt="Carrito"
             class="w-7 h-7 md:w-8 md:h-8 select-none"
             draggable="false">

        <span class="absolute -top-1 -right-1 bg-[#1E3A8A] text-white text-[11px] font-bold
                     w-5 h-5 flex items-center justify-center rounded-full
                     border-2 border-white shadow-sm">
          2
        </span>
      </a>

      {{-- ================= MENÚ HAMBURGUESA ================= --}}
      <button id="mobileMenuBtn" type="button"
        class="flex md:hidden p-2 rounded-lg hover:bg-gray-100 active:scale-90 transition"
        aria-label="Abrir menú">

        <img src="{{ asset('icons/menu.svg') }}"
             alt="Menú"
             class="w-7 h-7 select-none"
             draggable="false">
      </button>

    </div>
  </nav>

  {{-- ================= OVERLAY BUSCADOR MÓVIL ================= --}}
  <div id="searchMobileOverlay"
       class="fixed inset-0 bg-white z-[100] hidden items-center px-4 gap-3 h-[76px]">

    <div class="relative flex-1">
      <input type="text" id="mobileInput" placeholder="¿Qué buscas?"
        class="w-full bg-gray-100 py-3 pl-12 pr-4 rounded-xl border-none outline-none
               text-lg focus:ring-2 focus:ring-[#1E3A8A]">

      <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#1E3A8A]">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round"
             class="w-5 h-5">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
          <path d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/>
          <path d="M21 21l-6 -6"/>
        </svg>
      </span>
    </div>

    <button id="closeSearchMobile" type="button"
      class="text-gray-400 text-4xl font-light active:scale-75 transition">
      &times;
    </button>
  </div>

  {{-- ================= SIDEBAR MÓVIL ================= --}}
  <div id="mobileSidebar"
       class="fixed inset-y-0 right-0 w-[280px] bg-white z-[110] shadow-2xl
              transform translate-x-full transition-transform duration-300
              ease-in-out md:hidden flex flex-col">

    <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
      <span class="font-bold text-xl text-[#1E3A8A] flex items-center gap-2">
        <img src="{{ asset('icons/menu.svg') }}" class="w-5 h-5 select-none">
        Menú
      </span>
      <button id="closeSidebar" type="button"
        class="text-3xl text-gray-400 hover:text-gray-600 transition">
        &times;
      </button>
    </div>

    <div class="p-4 flex flex-col">
      <a href="{{ url('/') }}" class="py-3 px-2 hover:bg-blue-50 rounded-lg">Inicio</a>
      <a href="{{ url('/categorias') }}" class="py-3 px-2 hover:bg-blue-50 rounded-lg">Categorías</a>
      <a href="{{ url('/ofertas') }}" class="py-3 px-2 hover:bg-blue-50 rounded-lg">Ofertas</a>

      {{-- Cuenta (móvil) --}}
      @guest
        <a href="{{ route('login') }}" class="py-3 px-2 hover:bg-blue-50 rounded-lg">Iniciar sesión</a>
        <a href="{{ route('register') }}" class="py-3 px-2 hover:bg-blue-50 rounded-lg">Registrarme</a>
      @endguest

      @auth
        <span class="py-3 px-2 text-gray-500">Hola, {{ auth()->user()->name }}</span>
        <a href="{{ url('/mi-cuenta') }}" class="py-3 px-2 hover:bg-blue-50 rounded-lg">Mi Cuenta</a>

        {{-- Logout (POST) --}}
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit"
            class="w-full text-left py-3 px-2 text-red-600 hover:bg-red-50 rounded-lg">
            Cerrar sesión
          </button>
        </form>
      @endauth

      <a href="{{ url('/orders') }}" class="py-3 px-2 hover:bg-blue-50 rounded-lg">Pedidos</a>
      <a href="{{ url('/cart') }}" class="py-3 px-2 hover:bg-blue-50 rounded-lg">Carrito</a>
    </div>
  </div>

  <div id="sidebarOverlay"
       class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[105]
              hidden md:hidden transition-opacity duration-300"></div>
</header>
