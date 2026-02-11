{{-- resources/views/vendor/pages/pedidos.blade.php --}}
@php
  $pedidos = [
    ['folio'=>'CP-1042','fecha'=>'2026-02-10','cliente'=>'María G.','total'=>520,'pago'=>'Pagado','envio'=>'Listo','items'=>3],
    ['folio'=>'CP-1041','fecha'=>'2026-02-10','cliente'=>'Juan R.','total'=>1250,'pago'=>'Pendiente','envio'=>'Por preparar','items'=>5],
    ['folio'=>'CP-1040','fecha'=>'2026-02-09','cliente'=>'Diana M.','total'=>860,'pago'=>'Pagado','envio'=>'En tránsito','items'=>2],
    ['folio'=>'CP-1039','fecha'=>'2026-02-09','cliente'=>'Carlos A.','total'=>310,'pago'=>'Pagado','envio'=>'Entregado','items'=>1],
  ];
@endphp

<div class="w-full">
  <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
    <div>
      <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Pedidos</h1>
      <p class="text-sm text-gray-600 mt-1">Consulta pedidos y actualiza su estado de envío.</p>
    </div>
    <div class="flex gap-2">
      <button class="h-11 px-4 bg-gray-900 text-white font-bold active:scale-[0.99] transition">
        Exportar (demo)
      </button>
      <a href="/demo/vendor" class="h-11 px-4 border border-gray-200 bg-white font-bold inline-flex items-center justify-center active:scale-[0.99] transition">
        Volver
      </a>
    </div>
  </div>

  <div class="mt-4 border border-gray-200 bg-white p-3">
    <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
      <div class="md:col-span-2">
        <label class="block text-xs font-bold text-gray-600 mb-1">Buscar</label>
        <input class="w-full h-11 border border-gray-200 px-3 outline-none" placeholder="Folio o cliente">
      </div>
      <div>
        <label class="block text-xs font-bold text-gray-600 mb-1">Pago</label>
        <select class="w-full h-11 border border-gray-200 px-3 bg-white outline-none">
          <option value="">Todos</option>
          <option>Pagado</option>
          <option>Pendiente</option>
          <option>Rechazado</option>
        </select>
      </div>
      <div>
        <label class="block text-xs font-bold text-gray-600 mb-1">Envío</label>
        <select class="w-full h-11 border border-gray-200 px-3 bg-white outline-none">
          <option value="">Todos</option>
          <option>Por preparar</option>
          <option>Listo</option>
          <option>En tránsito</option>
          <option>Entregado</option>
        </select>
      </div>
      <div>
        <label class="block text-xs font-bold text-gray-600 mb-1">Fecha</label>
        <input type="date" class="w-full h-11 border border-gray-200 px-3 outline-none bg-white">
      </div>
    </div>
  </div>

  <div class="mt-3 border border-gray-200 bg-white overflow-x-auto">
    <table class="min-w-[1020px] w-full text-sm">
      <thead class="bg-gray-50 text-gray-600">
        <tr>
          <th class="text-left font-bold px-4 py-3">Folio</th>
          <th class="text-left font-bold px-4 py-3">Fecha</th>
          <th class="text-left font-bold px-4 py-3">Cliente</th>
          <th class="text-left font-bold px-4 py-3">Items</th>
          <th class="text-left font-bold px-4 py-3">Total</th>
          <th class="text-left font-bold px-4 py-3">Pago</th>
          <th class="text-left font-bold px-4 py-3">Envío</th>
          <th class="text-right font-bold px-4 py-3">Acciones</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @foreach($pedidos as $p)
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-3 font-extrabold">{{ $p['folio'] }}</td>
            <td class="px-4 py-3">{{ $p['fecha'] }}</td>
            <td class="px-4 py-3">{{ $p['cliente'] }}</td>
            <td class="px-4 py-3"><span class="font-bold">{{ $p['items'] }}</span></td>
            <td class="px-4 py-3 font-bold">${{ number_format($p['total'], 2) }}</td>
            <td class="px-4 py-3">
              <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold border border-gray-200 bg-white">
                {{ $p['pago'] }}
              </span>
            </td>
            <td class="px-4 py-3">
              <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold border border-gray-200 bg-white">
                {{ $p['envio'] }}
              </span>
            </td>
            <td class="px-4 py-3 text-right">
              <div class="inline-flex gap-2">
                <button class="h-9 px-3 border border-gray-200 bg-white font-bold active:scale-[0.99] transition">Detalle</button>
                <button class="h-9 px-3 bg-gray-900 text-white font-bold active:scale-[0.99] transition">Actualizar envío</button>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-4 border border-gray-200 bg-white p-4">
    <div class="font-extrabold">Acciones comunes</div>
    <div class="mt-2 grid grid-cols-1 md:grid-cols-3 gap-2">
      <button class="h-11 border border-gray-200 bg-white font-bold active:scale-[0.99] transition">Marcar como “Listo”</button>
      <button class="h-11 border border-gray-200 bg-white font-bold active:scale-[0.99] transition">Generar guía (demo)</button>
      <button class="h-11 bg-gray-900 text-white font-bold active:scale-[0.99] transition">Notificar cliente (demo)</button>
    </div>
  </div>
</div>
