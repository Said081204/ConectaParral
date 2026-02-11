{{-- resources/views/vendor/partials/sidebar.blade.php --}}

@php
  // Recibe el activo desde index.blade.php: ['active' => $page]
  $active = $active ?? 'dashboard';

  // Menú (rutas reales)
  $items = [
    ['key'=>'dashboard','label'=>'Dashboard','href'=>'/vendor','icon'=>'home'],
    ['key'=>'productos','label'=>'Productos','href'=>'/vendor/productos','icon'=>'box'],
    ['key'=>'pedidos','label'=>'Pedidos','href'=>'/vendor/pedidos','icon'=>'cart'],
    ['key'=>'envios','label'=>'Envíos','href'=>'/vendor/envios','icon'=>'truck'],
    ['key'=>'tienda','label'=>'Mi tienda','href'=>'/vendor/tienda','icon'=>'store'],
    ['key'=>'perfil','label'=>'Perfil','href'=>'/vendor/perfil','icon'=>'user'],
  ];

  $isActive = fn($key) => $key === $active;

  $linkClass = function($key) use ($isActive) {
    // Activo: azul marca + texto blanco
    if ($isActive($key)) {
      return "bg-[var(--primary-color)] text-white border border-transparent";
    }
    // Inactivo
    return "bg-white text-[var(--dark-text-color)] border border-transparent hover:border-[var(--light-border-color)] hover:bg-gray-50";
  };

  $iconWrap = function($key) use ($isActive) {
    if ($isActive($key)) {
      return "bg-white/15 text-white";
    }
    return "bg-gray-100 text-[var(--dark-text-color)]";
  };
@endphp


{{-- Desktop sidebar --}}
<aside class="hidden lg:flex w-[280px] shrink-0 min-h-screen bg-white border-r border-[var(--light-border-color)] pt-[76px]">
  <div class="w-full px-3 py-4">

    {{-- Sección --}}
    <div class="px-3 mb-3">
      <div class="text-[11px] font-black tracking-widest text-[var(--gray-text-color)]">
        MENÚ
      </div>
    </div>

    <nav class="space-y-1">
      @foreach($items as $it)
        <a href="{{ $it['href'] }}"
           class="flex items-center gap-3 h-11 px-3 transition {{ $linkClass($it['key']) }}">

          <span class="w-9 h-9 flex items-center justify-center {{ $iconWrap($it['key']) }}">
            @if($it['icon']==='home')
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10l9-7 9 7v10a2 2 0 01-2 2h-4a2 2 0 01-2-2v-4H9v4a2 2 0 01-2 2H5a2 2 0 01-2-2V10z"/>
              </svg>
            @elseif($it['icon']==='box')
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12l-8 4-8-4m16 0l-8-4-8 4m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6"/>
              </svg>
            @elseif($it['icon']==='cart')
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 7h13M7 13L5.4 5M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"/>
              </svg>
            @elseif($it['icon']==='truck')
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 104 0m-4 0H7a2 2 0 01-2-2V5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 01-2 2h-2m-4 0h4m6 0a2 2 0 11-4 0 2 2 0 014 0zM17 9h4l-1.5-3H17v3z"/>
              </svg>
            @elseif($it['icon']==='store')
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l1-5h16l1 5M5 9v11h14V9M9 20v-6h6v6"/>
              </svg>
            @else
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
              </svg>
            @endif
          </span>

          <span class="font-semibold text-sm">{{ $it['label'] }}</span>

          {{-- Indicador activo --}}
          @if($isActive($it['key']))
            <span class="ml-auto text-[10px] font-black px-2 py-1 bg-white/15">
              ACTIVO
            </span>
          @endif
        </a>
      @endforeach
    </nav>

    {{-- Acciones --}}
    <div class="mt-6 border-t border-[var(--light-border-color)] pt-4 space-y-2">
      <a href="/vendor/productos"
         class="vp-btn-primary w-full">
        + Agregar producto
      </a>

      <a href="/"
         class="flex items-center justify-between h-11 px-3 text-white font-extrabold transition active:scale-[0.99]"
         style="background: var(--primary-color);">
        <span>Volver a la tienda</span>
        <span class="text-xs font-bold px-2 py-1"
              style="background: var(--accent-color);">
          Cliente
        </span>
      </a>
    </div>

  </div>
</aside>


{{-- Mobile Drawer --}}
<div id="vendorSidebarOverlay" class="lg:hidden fixed inset-0 z-50 hidden bg-black/40">
  <div id="vendorSidebarDrawer"
    class="absolute left-0 top-0 h-full w-[88%] max-w-[340px] bg-white border-r border-[var(--light-border-color)]
           transform -translate-x-full transition-transform duration-150">

    {{-- Header drawer --}}
    <div class="h-[72px] px-3 flex items-center justify-between border-b border-[var(--light-border-color)]">
      <a href="/vendor" class="flex items-center gap-2 min-w-0">
        <div class="h-9 w-9 text-white flex items-center justify-center font-black"
             style="background: var(--primary-color);">CP</div>
        <div class="leading-tight min-w-0">
          <div class="font-extrabold text-[14px] text-[var(--dark-text-color)] truncate">Vendedor</div>
          <div class="text-[11px] text-[var(--gray-text-color)] truncate">ConectaParral</div>
        </div>
      </a>

      <button id="vendorSidebarClose"
        class="inline-flex items-center justify-center h-10 w-10 border border-[var(--light-border-color)] bg-white active:scale-95 transition"
        aria-label="Cerrar menú">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[var(--dark-text-color)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>

    {{-- Menu drawer --}}
    <div class="p-3">
      <div class="text-[11px] font-black tracking-widest text-[var(--gray-text-color)] px-1 mb-2">
        MENÚ
      </div>

      <nav class="space-y-1">
        @foreach($items as $it)
          <a href="{{ $it['href'] }}"
             class="flex items-center justify-between h-11 px-3 border border-[var(--light-border-color)] bg-white active:scale-[0.99] transition">
            <span class="font-semibold text-sm text-[var(--dark-text-color)]">{{ $it['label'] }}</span>
            <span class="text-xs font-bold"
                  style="color: var(--accent-color);">→</span>
          </a>
        @endforeach
      </nav>

      <div class="mt-4 border-t border-[var(--light-border-color)] pt-4 space-y-2">
        <a href="/vendor/productos" class="vp-btn-primary w-full">+ Agregar producto</a>

        <a href="/" class="vp-btn-secondary w-full">Volver a la tienda</a>
      </div>
    </div>
  </div>
</div>
