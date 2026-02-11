{{-- resources/views/vendor/pages/tienda.blade.php --}}
@php
  $tienda = [
    'nombre' => 'Dulces Parralenses',
    'slug' => 'dulces-parralenses',
    'telefono' => '627-000-0000',
    'whatsapp' => '52 1 627 000 0000',
    'direccion' => 'Centro, Hidalgo del Parral, Chihuahua',
    'envios' => 'Sí',
    'horario' => 'Lun-Sáb 9:00 a 18:00',
    'descripcion' => 'Productos regionales y dulces típicos hechos en Parral.',
  ];
@endphp

<div class="w-full">
  <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
    <div>
      <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Mi tienda</h1>
      <p class="text-sm text-gray-600 mt-1">Configura datos públicos de tu tienda.</p>
    </div>
    <div class="flex gap-2">
      <button class="h-11 px-4 bg-gray-900 text-white font-bold active:scale-[0.99] transition">Guardar (demo)</button>
      <a href="/demo/vendor" class="h-11 px-4 border border-gray-200 bg-white font-bold inline-flex items-center justify-center active:scale-[0.99] transition">
        Volver
      </a>
    </div>
  </div>

  <div class="mt-4 grid grid-cols-1 xl:grid-cols-3 gap-3">
    <section class="xl:col-span-2 border border-gray-200 bg-white p-4">
      <div class="font-extrabold">Información</div>

      <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-3">
        <div>
          <label class="block text-xs font-bold text-gray-600 mb-1">Nombre de tienda</label>
          <input class="w-full h-11 border border-gray-200 px-3 outline-none" value="{{ $tienda['nombre'] }}">
        </div>
        <div>
          <label class="block text-xs font-bold text-gray-600 mb-1">Slug / URL</label>
          <input class="w-full h-11 border border-gray-200 px-3 outline-none" value="{{ $tienda['slug'] }}">
        </div>

        <div>
          <label class="block text-xs font-bold text-gray-600 mb-1">Teléfono</label>
          <input class="w-full h-11 border border-gray-200 px-3 outline-none" value="{{ $tienda['telefono'] }}">
        </div>
        <div>
          <label class="block text-xs font-bold text-gray-600 mb-1">WhatsApp</label>
          <input class="w-full h-11 border border-gray-200 px-3 outline-none" value="{{ $tienda['whatsapp'] }}">
        </div>

        <div class="md:col-span-2">
          <label class="block text-xs font-bold text-gray-600 mb-1">Dirección</label>
          <input class="w-full h-11 border border-gray-200 px-3 outline-none" value="{{ $tienda['direccion'] }}">
        </div>

        <div>
          <label class="block text-xs font-bold text-gray-600 mb-1">¿Haces envíos?</label>
          <select class="w-full h-11 border border-gray-200 px-3 bg-white outline-none">
            <option {{ $tienda['envios']==='Sí' ? 'selected' : '' }}>Sí</option>
            <option {{ $tienda['envios']==='No' ? 'selected' : '' }}>No</option>
          </select>
        </div>
        <div>
          <label class="block text-xs font-bold text-gray-600 mb-1">Horario</label>
          <input class="w-full h-11 border border-gray-200 px-3 outline-none" value="{{ $tienda['horario'] }}">
        </div>

        <div class="md:col-span-2">
          <label class="block text-xs font-bold text-gray-600 mb-1">Descripción</label>
          <textarea rows="4" class="w-full border border-gray-200 px-3 py-2 outline-none">{{ $tienda['descripcion'] }}</textarea>
        </div>
      </div>
    </section>

    <section class="border border-gray-200 bg-white p-4">
      <div class="font-extrabold">Vista previa (demo)</div>

      <div class="mt-3 border border-gray-200 p-3 bg-white">
        <div class="h-14 bg-gray-900 text-white flex items-center px-3 font-extrabold">
          {{ $tienda['nombre'] }}
        </div>
        <div class="p-3">
          <div class="text-sm text-gray-700">{{ $tienda['descripcion'] }}</div>
          <div class="mt-3 text-xs text-gray-600 space-y-1">
            <div><span class="font-bold text-gray-900">Dirección:</span> {{ $tienda['direccion'] }}</div>
            <div><span class="font-bold text-gray-900">Horario:</span> {{ $tienda['horario'] }}</div>
            <div><span class="font-bold text-gray-900">Envíos:</span> {{ $tienda['envios'] }}</div>
          </div>
          <button class="mt-3 w-full h-11 bg-gray-900 text-white font-bold">Ver tienda (demo)</button>
        </div>
      </div>

      <div class="mt-4 text-sm text-gray-700">
        <div class="font-extrabold">Consejo</div>
        <p class="mt-1">Una descripción clara y fotos buenas aumentan conversiones.</p>
      </div>
    </section>
  </div>
</div>
