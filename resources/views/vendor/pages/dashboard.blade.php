{{-- resources/views/vendor/pages/dashboard.blade.php --}}
@php
  $kpis = [
    ['label'=>'Ventas (mes)', 'value'=>'$12,480', 'sub'=>'Últimos 30 días', 'trend'=>'+12%', 'hint'=>'vs mes pasado'],
    ['label'=>'Pedidos', 'value'=>'34', 'sub'=>'En proceso y enviados', 'trend'=>'+6', 'hint'=>'esta semana'],
    ['label'=>'Productos', 'value'=>'18', 'sub'=>'Activos en catálogo', 'trend'=>'+2', 'hint'=>'nuevos'],
    ['label'=>'Calificación', 'value'=>'4.8', 'sub'=>'Promedio clientes', 'trend'=>'★', 'hint'=>'reputación'],
  ];

  $pedidos = [
    ['folio'=>'CP-1042','cliente'=>'María G.','total'=>'$520','estado'=>'Pagado','envio'=>'Listo'],
    ['folio'=>'CP-1041','cliente'=>'Juan R.','total'=>'$1,250','estado'=>'Pendiente','envio'=>'Por preparar'],
    ['folio'=>'CP-1040','cliente'=>'Diana M.','total'=>'$860','estado'=>'Pagado','envio'=>'En tránsito'],
    ['folio'=>'CP-1039','cliente'=>'Carlos A.','total'=>'$310','estado'=>'Pagado','envio'=>'Entregado'],
  ];

  $productos = [
    ['nombre'=>'Miel artesanal 1kg','stock'=>12,'precio'=>'$180','estado'=>'Activo'],
    ['nombre'=>'Dulces típicos surtidos','stock'=>6,'precio'=>'$140','estado'=>'Activo'],
    ['nombre'=>'Café molido regional 500g','stock'=>0,'precio'=>'$210','estado'=>'Sin stock'],
  ];

  $badge = function($txt) {
    $t = mb_strtolower($txt);
    if (str_contains($t,'pagado')) return 'bg-emerald-50 text-emerald-700 border-emerald-200';
    if (str_contains($t,'pend')) return 'bg-amber-50 text-amber-700 border-amber-200';
    if (str_contains($t,'entreg')) return 'bg-sky-50 text-sky-700 border-sky-200';
    if (str_contains($t,'trán') || str_contains($t,'trans')) return 'bg-violet-50 text-violet-700 border-violet-200';
    if (str_contains($t,'list')) return 'bg-emerald-50 text-emerald-700 border-emerald-200';
    if (str_contains($t,'prepar')) return 'bg-amber-50 text-amber-700 border-amber-200';
    if (str_contains($t,'sin stock')) return 'bg-rose-50 text-rose-700 border-rose-200';
    return 'bg-gray-50 text-gray-700 border-gray-200';
  };
@endphp

<div class="w-full space-y-5">

  {{-- Top header --}}
  <div class="flex flex-col gap-3 lg:flex-row lg:items-end lg:justify-between">
    <div>
      <div class="flex items-center gap-2">
        <span class="inline-flex items-center px-2 py-1 text-[11px] font-black border border-[var(--light-border-color)] bg-white"
              style="color: var(--primary-color);">
          PANEL
        </span>
        <span class="text-[11px] font-bold text-[var(--gray-text-color)]">Resumen general</span>
      </div>

      <h1 class="mt-2 text-2xl sm:text-3xl font-extrabold tracking-tight text-[var(--dark-text-color)]">
        Dashboard
      </h1>
      <p class="text-sm mt-1 text-[var(--gray-text-color)]">
        Control rápido de ventas, pedidos y stock de tu tienda.
      </p>
    </div>

    <div class="flex flex-col sm:flex-row gap-2">
      <a href="/vendor/productos"
         class="inline-flex items-center justify-center gap-2 h-11 px-4 font-extrabold text-white transition active:scale-[0.99]"
         style="background: var(--primary-color);">
        <span>Administrar productos</span>
        <span class="text-[11px] font-black px-2 py-1"
              style="background: var(--accent-color); color:#111;">
          + Nuevo
        </span>
      </a>

      <a href="/vendor/pedidos"
         class="inline-flex items-center justify-center gap-2 h-11 px-4 font-extrabold border border-[var(--light-border-color)] bg-white
                hover:bg-gray-50 transition active:scale-[0.99] text-[var(--dark-text-color)]">
        Ver pedidos
        <span class="text-xs font-bold" style="color: var(--accent-color);">→</span>
      </a>
    </div>
  </div>

  {{-- KPI cards --}}
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
    @foreach($kpis as $k)
      <div class="bg-white border border-[var(--light-border-color)] p-4">
        <div class="flex items-start justify-between gap-3">
          <div class="min-w-0">
            <div class="text-[12px] font-bold text-[var(--gray-text-color)]">{{ $k['label'] }}</div>
            <div class="mt-1 text-2xl sm:text-3xl font-extrabold text-[var(--dark-text-color)]">
              {{ $k['value'] }}
            </div>
            <div class="mt-1 text-[12px] text-[var(--gray-text-color)]">{{ $k['sub'] }}</div>
          </div>

          <div class="text-right">
            <div class="inline-flex items-center justify-center px-2.5 py-1 text-xs font-black border"
                 style="border-color: var(--light-border-color); background: #fff;">
              <span style="color: var(--primary-color);">{{ $k['trend'] }}</span>
            </div>
            <div class="mt-1 text-[11px] text-[var(--gray-text-color)]">{{ $k['hint'] }}</div>
          </div>
        </div>

        {{-- barra decorativa --}}
        <div class="mt-3 h-1 w-full bg-gray-100">
          <div class="h-1" style="width:60%; background: var(--accent-color);"></div>
        </div>
      </div>
    @endforeach
  </div>

  {{-- Main grid --}}
  <div class="grid grid-cols-1 xl:grid-cols-3 gap-3">

    {{-- Pedidos --}}
    <section class="xl:col-span-2 bg-white border border-[var(--light-border-color)]">
      <div class="px-4 py-3 border-b border-[var(--light-border-color)] flex items-center justify-between">
        <div class="min-w-0">
          <h2 class="font-extrabold text-[var(--dark-text-color)]">Pedidos recientes</h2>
          <p class="text-[12px] text-[var(--gray-text-color)] mt-0.5">Últimos movimientos de tu tienda</p>
        </div>

        <div class="flex items-center gap-2">
          <a href="/vendor/pedidos"
             class="inline-flex items-center justify-center h-10 px-3 font-extrabold border border-[var(--light-border-color)] bg-white hover:bg-gray-50 transition">
            Ver todos
          </a>
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="min-w-[760px] w-full text-sm">
          <thead class="bg-gray-50 text-[var(--gray-text-color)]">
            <tr>
              <th class="text-left font-black px-4 py-3">Folio</th>
              <th class="text-left font-black px-4 py-3">Cliente</th>
              <th class="text-left font-black px-4 py-3">Total</th>
              <th class="text-left font-black px-4 py-3">Pago</th>
              <th class="text-left font-black px-4 py-3">Envío</th>
              <th class="text-right font-black px-4 py-3">Acción</th>
            </tr>
          </thead>

          <tbody class="divide-y divide-[var(--light-border-color)]">
            @foreach($pedidos as $p)
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 font-extrabold text-[var(--dark-text-color)]">{{ $p['folio'] }}</td>
                <td class="px-4 py-3 text-[var(--dark-text-color)]">{{ $p['cliente'] }}</td>
                <td class="px-4 py-3 font-extrabold text-[var(--dark-text-color)]">{{ $p['total'] }}</td>
                <td class="px-4 py-3">
                  <span class="inline-flex items-center px-2.5 py-1 text-xs font-black border {{ $badge($p['estado']) }}">
                    {{ $p['estado'] }}
                  </span>
                </td>
                <td class="px-4 py-3">
                  <span class="inline-flex items-center px-2.5 py-1 text-xs font-black border {{ $badge($p['envio']) }}">
                    {{ $p['envio'] }}
                  </span>
                </td>
                <td class="px-4 py-3 text-right">
                  <a href="/vendor/pedidos"
                     class="inline-flex items-center justify-center h-9 px-3 font-extrabold border border-[var(--light-border-color)] bg-white hover:bg-gray-50 transition">
                    Ver
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- Footer tabla --}}
      <div class="px-4 py-3 border-t border-[var(--light-border-color)] flex items-center justify-between">
        <span class="text-[12px] text-[var(--gray-text-color)]">
          Mostrando <span class="font-extrabold text-[var(--dark-text-color)]">{{ count($pedidos) }}</span> pedidos
        </span>
        <a href="/vendor/pedidos" class="text-sm font-extrabold underline underline-offset-4"
           style="color: var(--primary-color);">
          Ir a pedidos →
        </a>
      </div>
    </section>

    {{-- Stock / acciones rápidas --}}
    <section class="bg-white border border-[var(--light-border-color)]">
      <div class="px-4 py-3 border-b border-[var(--light-border-color)]">
        <div class="flex items-center justify-between">
          <div>
            <h2 class="font-extrabold text-[var(--dark-text-color)]">Stock rápido</h2>
            <p class="text-[12px] text-[var(--gray-text-color)] mt-0.5">Control de inventario</p>
          </div>

          <a href="/vendor/productos"
             class="inline-flex items-center justify-center h-10 px-3 font-extrabold border border-[var(--light-border-color)] bg-white hover:bg-gray-50 transition">
            Gestionar
          </a>
        </div>
      </div>

      <div class="p-4 space-y-3">
        @foreach($productos as $pr)
          @php
            $stockLow = ($pr['stock'] ?? 0) <= 2;
            $stockZero = ($pr['stock'] ?? 0) <= 0;
          @endphp

          <div class="border border-[var(--light-border-color)] bg-white p-3">
            <div class="flex items-start justify-between gap-3">
              <div class="min-w-0">
                <div class="font-extrabold text-[var(--dark-text-color)] truncate">{{ $pr['nombre'] }}</div>

                <div class="mt-1 text-[12px] text-[var(--gray-text-color)]">
                  Stock:
                  <span class="font-extrabold {{ $stockZero ? 'text-rose-700' : ($stockLow ? 'text-amber-700' : 'text-[var(--dark-text-color)]') }}">
                    {{ $pr['stock'] }}
                  </span>
                  · Precio:
                  <span class="font-extrabold text-[var(--dark-text-color)]">{{ $pr['precio'] }}</span>
                </div>
              </div>

              <span class="inline-flex items-center px-2.5 py-1 text-xs font-black border {{ $badge($pr['estado']) }}">
                {{ $pr['estado'] }}
              </span>
            </div>

            <div class="mt-3 grid grid-cols-2 gap-2">
              <a href="/vendor/productos"
                 class="inline-flex items-center justify-center h-10 font-extrabold border border-[var(--light-border-color)] bg-white hover:bg-gray-50 transition active:scale-[0.99]">
                Editar
              </a>

              <button class="inline-flex items-center justify-center h-10 font-extrabold text-white transition active:scale-[0.99]"
                      style="background: var(--primary-color);">
                Reponer
              </button>
            </div>
          </div>
        @endforeach
      </div>

      <div class="px-4 pb-4">
        <div class="border border-[var(--light-border-color)] bg-amber-50 p-3">
          <div class="text-sm font-extrabold text-[var(--dark-text-color)]">Tip de inventario</div>
          <div class="text-[12px] text-[var(--gray-text-color)] mt-1">
            Mantén stock actualizado para evitar cancelaciones y mejorar tu calificación.
          </div>
        </div>
      </div>
    </section>

  </div>

  {{-- Tips (más elegante) --}}
  <section class="bg-white border border-[var(--light-border-color)] p-4">
    <div class="flex items-start justify-between gap-3">
      <div>
        <h3 class="font-extrabold text-[var(--dark-text-color)]">Tips rápidos</h3>
        <p class="text-[12px] text-[var(--gray-text-color)] mt-0.5">
          Pequeños ajustes que aumentan tus ventas.
        </p>
      </div>
      <span class="inline-flex items-center px-2.5 py-1 text-xs font-black text-white"
            style="background: var(--accent-color); color:#111;">
        PRO
      </span>
    </div>

    <ul class="mt-3 text-sm text-[var(--dark-text-color)] space-y-2">
      <li class="flex gap-2">
        <span class="font-black" style="color: var(--accent-color);">✓</span>
        Mantén stock actualizado para evitar cancelaciones.
      </li>
      <li class="flex gap-2">
        <span class="font-black" style="color: var(--accent-color);">✓</span>
        Usa fotos claras y títulos cortos para vender más.
      </li>
      <li class="flex gap-2">
        <span class="font-black" style="color: var(--accent-color);">✓</span>
        Responde rápido para mejorar tu calificación.
      </li>
    </ul>
  </section>

</div>
