{{-- resources/views/vendor/partials/header.blade.php --}}
<header class="fixed top-0 left-0 w-full z-50">
  {{-- Topbar --}}
  <div class="bg-white border-b border-[var(--light-border-color)]">
    <div class="h-[72px] lg:h-[76px] px-3 sm:px-4 lg:px-6 flex items-center gap-3">

      {{-- Mobile: botón menú --}}
      <button id="vendorSidebarOpen"
        class="lg:hidden inline-flex items-center justify-center h-10 w-10
               border border-[var(--light-border-color)] bg-white
               active:scale-95 transition"
        aria-label="Abrir menú">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[var(--dark-text-color)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>

      {{-- Brand --}}
      <a href="/vendor" class="flex items-center gap-3 min-w-0">
        <div class="h-10 w-10 flex items-center justify-center font-black tracking-tight text-white"
             style="background: var(--primary-color);">
          CP
        </div>
        <div class="min-w-0 leading-tight">
          <div class="font-extrabold text-[15px] lg:text-[16px] truncate text-[var(--dark-text-color)]">
            Panel de Vendedor
          </div>
          <div class="text-[12px] truncate text-[var(--gray-text-color)]">
            ConectaParral
          </div>
        </div>
      </a>

      {{-- Search (desktop) --}}
      <div class="hidden md:flex flex-1 min-w-0 px-2">
        <div class="w-full max-w-[720px]">
          <div class="h-11 border border-[var(--light-border-color)] bg-white px-3 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[var(--gray-text-color)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"/>
            </svg>

            <input
              type="text"
              placeholder="Buscar pedidos, productos..."
              class="w-full outline-none bg-transparent text-sm text-[var(--dark-text-color)] placeholder:text-[var(--gray-text-color)]"
            />

            <div class="hidden lg:flex items-center gap-1">
              <span class="text-[11px] px-2 py-1 border border-[var(--light-border-color)] text-[var(--gray-text-color)] bg-white">
                Ctrl
              </span>
              <span class="text-[11px] px-2 py-1 border border-[var(--light-border-color)] text-[var(--gray-text-color)] bg-white">
                K
              </span>
            </div>
          </div>
        </div>
      </div>

      {{-- Right actions --}}
      <div class="ml-auto flex items-center gap-2">

        {{-- Botón tienda --}}
        <a href="/" class="hidden sm:inline-flex items-center gap-2 h-10 px-3
                          border border-[var(--light-border-color)] bg-white
                          hover:bg-gray-50 active:scale-[0.99] transition">
          <span class="text-sm font-extrabold text-[var(--dark-text-color)]">Volver a tienda</span>
          <span class="text-xs font-bold px-2 py-1 text-white"
                style="background: var(--accent-color);">
            Cliente
          </span>
        </a>

        {{-- Notificaciones --}}
        <button class="relative inline-flex items-center justify-center h-10 w-10
                       border border-[var(--light-border-color)] bg-white
                       hover:bg-gray-50 active:scale-95 transition"
          aria-label="Notificaciones">

          {{-- punto --}}
          <span class="absolute top-[10px] right-[10px] h-2 w-2 rounded-full"
                style="background: var(--accent-color);"></span>

          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[var(--dark-text-color)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5m6 0a3 3 0 01-6 0m6 0H9"/>
          </svg>
        </button>

        {{-- Perfil --}}
        <a href="/vendor/perfil" class="flex items-center gap-2 h-10 px-2
                                      border border-[var(--light-border-color)] bg-white
                                      hover:bg-gray-50 transition">
          <div class="h-8 w-8 flex items-center justify-center font-extrabold text-white"
               style="background: var(--primary-color);">
            V
          </div>

          <div class="hidden sm:block leading-tight pr-1">
            <div class="text-sm font-extrabold text-[var(--dark-text-color)]">Vendedor</div>
            <div class="text-[11px] text-[var(--gray-text-color)]">Panel</div>
          </div>

          <svg xmlns="http://www.w3.org/2000/svg" class="hidden sm:block h-4 w-4 text-[var(--gray-text-color)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </a>

      </div>
    </div>
  </div>

  {{-- Subbar (móvil): búsqueda --}}
  <div class="md:hidden bg-white border-b border-[var(--light-border-color)] px-3 pb-3">
    <div class="h-11 border border-[var(--light-border-color)] bg-white px-3 flex items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[var(--gray-text-color)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z"/>
      </svg>
      <input
        type="text"
        placeholder="Buscar..."
        class="w-full outline-none bg-transparent text-sm text-[var(--dark-text-color)] placeholder:text-[var(--gray-text-color)]"
      />
    </div>
  </div>
</header>
