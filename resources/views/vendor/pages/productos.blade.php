{{-- resources/views/vendor/pages/productos.blade.php --}}
@php
  $productos = [
    ['id'=>1,'nombre'=>'Miel artesanal 1kg','categoria'=>'Alimentos','precio'=>180,'stock'=>12,'estado'=>'Activo','sku'=>'MIEL-1KG'],
    ['id'=>2,'nombre'=>'Dulces típicos surtidos','categoria'=>'Dulces','precio'=>140,'stock'=>6,'estado'=>'Activo','sku'=>'DUL-BOX'],
    ['id'=>3,'nombre'=>'Café molido regional 500g','categoria'=>'Bebidas','precio'=>210,'stock'=>0,'estado'=>'Sin stock','sku'=>'CAF-500'],
    ['id'=>4,'nombre'=>'Cajeta artesanal 450g','categoria'=>'Alimentos','precio'=>120,'stock'=>8,'estado'=>'Activo','sku'=>'CAJ-450'],
  ];

  $categorias = ['Alimentos','Dulces','Bebidas','Artesanías','Ropa','Accesorios'];
@endphp

<div class="w-full">
  <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
    <div>
      <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Productos</h1>
      <p class="text-sm text-gray-600 mt-1">Administra tu catálogo, stock y precios.</p>
    </div>

    <div class="flex gap-2">
      <button id="btnOpenAddProduct"
        class="h-11 px-4 bg-gray-900 text-white inline-flex items-center justify-center font-bold active:scale-[0.99] transition">
        + Agregar producto
      </button>
      <a href="/demo/vendor" class="h-11 px-4 border border-gray-200 bg-white inline-flex items-center justify-center font-bold active:scale-[0.99] transition">
        Volver
      </a>
    </div>
  </div>

  {{-- Filtros --}}
  <div class="mt-4 border border-gray-200 bg-white p-3">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
      <div class="md:col-span-2">
        <label class="block text-xs font-bold text-gray-600 mb-1">Buscar</label>
        <input type="text" placeholder="Ej. miel, café..."
          class="w-full h-11 border border-gray-200 px-3 outline-none bg-white" />
      </div>
      <div>
        <label class="block text-xs font-bold text-gray-600 mb-1">Categoría</label>
        <select class="w-full h-11 border border-gray-200 px-3 bg-white outline-none">
          <option value="">Todas</option>
          @foreach($categorias as $c)
            <option>{{ $c }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="block text-xs font-bold text-gray-600 mb-1">Estado</label>
        <select class="w-full h-11 border border-gray-200 px-3 bg-white outline-none">
          <option value="">Todos</option>
          <option>Activo</option>
          <option>Pausado</option>
          <option>Sin stock</option>
        </select>
      </div>
    </div>
  </div>

  {{-- Tabla --}}
  <div class="mt-3 border border-gray-200 bg-white overflow-x-auto">
    <table class="min-w-[980px] w-full text-sm">
      <thead class="bg-gray-50 text-gray-600">
        <tr>
          <th class="text-left font-bold px-4 py-3">Producto</th>
          <th class="text-left font-bold px-4 py-3">SKU</th>
          <th class="text-left font-bold px-4 py-3">Categoría</th>
          <th class="text-left font-bold px-4 py-3">Precio</th>
          <th class="text-left font-bold px-4 py-3">Stock</th>
          <th class="text-left font-bold px-4 py-3">Estado</th>
          <th class="text-right font-bold px-4 py-3">Acciones</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @foreach($productos as $p)
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-3">
              <div class="font-extrabold">{{ $p['nombre'] }}</div>
              <div class="text-xs text-gray-500">ID: {{ $p['id'] }}</div>
            </td>
            <td class="px-4 py-3 font-bold">{{ $p['sku'] }}</td>
            <td class="px-4 py-3">{{ $p['categoria'] }}</td>
            <td class="px-4 py-3 font-bold">${{ number_format($p['precio'], 2) }}</td>
            <td class="px-4 py-3">
              <span class="font-bold">{{ $p['stock'] }}</span>
            </td>
            <td class="px-4 py-3">
              <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold border border-gray-200 bg-white">
                {{ $p['estado'] }}
              </span>
            </td>
            <td class="px-4 py-3 text-right">
              <div class="inline-flex gap-2">
                <button class="h-9 px-3 border border-gray-200 bg-white font-bold active:scale-[0.99] transition">Editar</button>
                <button class="h-9 px-3 border border-gray-200 bg-white font-bold active:scale-[0.99] transition">Pausar</button>
                <button class="h-9 px-3 bg-gray-900 text-white font-bold active:scale-[0.99] transition">Ver</button>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Modal demo: agregar producto --}}
  <div id="addProductOverlay" class="fixed inset-0 z-[60] hidden bg-black/40">
    <div class="absolute inset-x-0 bottom-0 sm:inset-0 sm:flex sm:items-center sm:justify-center p-3">
      <div id="addProductModal" class="w-full sm:max-w-[720px] bg-white border border-gray-200">
        <div class="px-4 py-3 border-b border-gray-200 flex items-center justify-between">
          <div class="font-extrabold">Agregar producto (demo)</div>
          <button id="btnCloseAddProduct"
            class="h-10 w-10 inline-flex items-center justify-center border border-gray-200 bg-white active:scale-95 transition"
            aria-label="Cerrar">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>

        <div class="p-4">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <div>
              <label class="block text-xs font-bold text-gray-600 mb-1">Nombre</label>
              <input class="w-full h-11 border border-gray-200 px-3 outline-none" placeholder="Ej. Miel artesanal 1kg">
            </div>
            <div>
              <label class="block text-xs font-bold text-gray-600 mb-1">Categoría</label>
              <select class="w-full h-11 border border-gray-200 px-3 bg-white outline-none">
                @foreach($categorias as $c) <option>{{ $c }}</option> @endforeach
              </select>
            </div>
            <div>
              <label class="block text-xs font-bold text-gray-600 mb-1">Precio</label>
              <input type="number" class="w-full h-11 border border-gray-200 px-3 outline-none" placeholder="0.00">
            </div>
            <div>
              <label class="block text-xs font-bold text-gray-600 mb-1">Stock</label>
              <input type="number" class="w-full h-11 border border-gray-200 px-3 outline-none" placeholder="0">
            </div>
            <div class="md:col-span-2">
              <label class="block text-xs font-bold text-gray-600 mb-1">Descripción</label>
              <textarea rows="3" class="w-full border border-gray-200 px-3 py-2 outline-none" placeholder="Descripción corta..."></textarea>
            </div>
          </div>

          <div class="mt-4 flex gap-2">
            <button id="btnCancelAddProduct" class="flex-1 h-11 border border-gray-200 bg-white font-bold active:scale-[0.99] transition">
              Cancelar
            </button>
            <button class="flex-1 h-11 bg-gray-900 text-white font-bold active:scale-[0.99] transition">
              Guardar (demo)
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    (function(){
      const openBtn = document.getElementById('btnOpenAddProduct');
      const overlay = document.getElementById('addProductOverlay');
      const closeBtn = document.getElementById('btnCloseAddProduct');
      const cancelBtn = document.getElementById('btnCancelAddProduct');

      function open(){ overlay.classList.remove('hidden'); document.body.classList.add('overflow-hidden'); }
      function close(){ overlay.classList.add('hidden'); document.body.classList.remove('overflow-hidden'); }

      if(openBtn) openBtn.addEventListener('click', open);
      if(closeBtn) closeBtn.addEventListener('click', close);
      if(cancelBtn) cancelBtn.addEventListener('click', close);
      if(overlay) overlay.addEventListener('click', (e)=>{ if(e.target === overlay) close(); });
    })();
  </script>
</div>
