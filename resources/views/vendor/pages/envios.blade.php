{{-- resources/views/vendor/pages/envios.blade.php --}}
@php
  $envios = [
    ['folio'=>'CP-1042','paqueteria'=>'Estafeta','guia'=>'EF123456789MX','estado'=>'Listo','destino'=>'Chihuahua, Chih.','fecha'=>'2026-02-10'],
    ['folio'=>'CP-1040','paqueteria'=>'DHL','guia'=>'DHL987654321','estado'=>'En tránsito','destino'=>'CDMX','fecha'=>'2026-02-09'],
    ['folio'=>'CP-1039','paqueteria'=>'FedEx','guia'=>'FDX000112233','estado'=>'Entregado','destino'=>'GDL, Jal.','fecha'=>'2026-02-09'],
  ];
@endphp

<div class="w-full">
  <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
    <div>
      <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Envíos</h1>
      <p class="text-sm text-gray-600 mt-1">Control de guías, paqueterías y estados.</p>
    </div>
    <div class="flex gap-2">
      <button class="h-11 px-4 bg-gray-900 text-white font-bold active:scale-[0.99] transition">Crear guía (demo)</button>
      <a href="/demo/vendor" class="h-11 px-4 border border-gray-200 bg-white font-bold inline-flex items-center justify-center active:scale-[0.99] transition">Volver</a>
    </div>
  </div>

  <div class="mt-4 border border-gray-200 bg-white p-3">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
      <div class="md:col-span-2">
        <label class="block text-xs font-bold text-gray-600 mb-1">Buscar</label>
        <input class="w-full h-11 border border-gray-200 px-3 outline-none" placeholder="Folio o guía">
      </div>
      <div>
        <label class="block text-xs font-bold text-gray-600 mb-1">Estado</label>
        <select class="w-full h-11 border border-gray-200 px-3 bg-white outline-none">
          <option value="">Todos</option>
          <option>Por preparar</option>
          <option>Listo</option>
          <option>En tránsito</option>
          <option>Entregado</option>
        </select>
      </div>
      <div>
        <label class="block text-xs font-bold text-gray-600 mb-1">Paquetería</label>
        <select class="w-full h-11 border border-gray-200 px-3 bg-white outline-none">
          <option value="">Todas</option>
          <option>Estafeta</option>
          <option>DHL</option>
          <option>FedEx</option>
        </select>
      </div>
    </div>
  </div>

  <div class="mt-3 border border-gray-200 bg-white overflow-x-auto">
    <table class="min-w-[980px] w-full text-sm">
      <thead class="bg-gray-50 text-gray-600">
        <tr>
          <th class="text-left font-bold px-4 py-3">Folio</th>
          <th class="text-left font-bold px-4 py-3">Paquetería</th>
          <th class="text-left font-bold px-4 py-3">Guía</th>
          <th class="text-left font-bold px-4 py-3">Destino</th>
          <th class="text-left font-bold px-4 py-3">Fecha</th>
          <th class="text-left font-bold px-4 py-3">Estado</th>
          <th class="text-right font-bold px-4 py-3">Acciones</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @foreach($envios as $e)
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-3 font-extrabold">{{ $e['folio'] }}</td>
            <td class="px-4 py-3">{{ $e['paqueteria'] }}</td>
            <td class="px-4 py-3 font-bold">{{ $e['guia'] }}</td>
            <td class="px-4 py-3">{{ $e['destino'] }}</td>
            <td class="px-4 py-3">{{ $e['fecha'] }}</td>
            <td class="px-4 py-3">
              <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold border border-gray-200 bg-white">
                {{ $e['estado'] }}
              </span>
            </td>
            <td class="px-4 py-3 text-right">
              <div class="inline-flex gap-2">
                <button class="h-9 px-3 border border-gray-200 bg-white font-bold active:scale-[0.99] transition">Ver</button>
                <button class="h-9 px-3 bg-gray-900 text-white font-bold active:scale-[0.99] transition">Cambiar estado</button>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-4 border border-gray-200 bg-white p-4">
    <div class="font-extrabold">Notas</div>
    <ul class="mt-2 text-sm text-gray-700 space-y-1">
      <li>• En producción podrás guardar guías, paquetería, costos y tracking.</li>
      <li>• Aquí solo es maqueta para ver el flujo del panel.</li>
    </ul>
  </div>
</div>
