{{-- resources/views/vendor/pages/perfil.blade.php --}}
@php
  $user = [
    'nombre' => 'Said',
    'email' => 'demo@conectaparral.com',
    'telefono' => '627-000-0000',
    'ciudad' => 'Hidalgo del Parral, Chih.',
  ];
@endphp

<div class="w-full">
  <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
    <div>
      <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Perfil</h1>
      <p class="text-sm text-gray-600 mt-1">Configura tu información y seguridad.</p>
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
      <div class="font-extrabold">Datos personales</div>

      <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-3">
        <div>
          <label class="block text-xs font-bold text-gray-600 mb-1">Nombre</label>
          <input class="w-full h-11 border border-gray-200 px-3 outline-none" value="{{ $user['nombre'] }}">
        </div>
        <div>
          <label class="block text-xs font-bold text-gray-600 mb-1">Correo</label>
          <input class="w-full h-11 border border-gray-200 px-3 outline-none" value="{{ $user['email'] }}">
        </div>
        <div>
          <label class="block text-xs font-bold text-gray-600 mb-1">Teléfono</label>
          <input class="w-full h-11 border border-gray-200 px-3 outline-none" value="{{ $user['telefono'] }}">
        </div>
        <div>
          <label class="block text-xs font-bold text-gray-600 mb-1">Ciudad</label>
          <input class="w-full h-11 border border-gray-200 px-3 outline-none" value="{{ $user['ciudad'] }}">
        </div>
      </div>
    </section>

    <section class="border border-gray-200 bg-white p-4">
      <div class="font-extrabold">Seguridad (demo)</div>

      <div class="mt-3 space-y-3">
        <div>
          <label class="block text-xs font-bold text-gray-600 mb-1">Contraseña actual</label>
          <input type="password" class="w-full h-11 border border-gray-200 px-3 outline-none" placeholder="••••••••">
        </div>
        <div>
          <label class="block text-xs font-bold text-gray-600 mb-1">Nueva contraseña</label>
          <input type="password" class="w-full h-11 border border-gray-200 px-3 outline-none" placeholder="••••••••">
        </div>
        <div>
          <label class="block text-xs font-bold text-gray-600 mb-1">Confirmar nueva contraseña</label>
          <input type="password" class="w-full h-11 border border-gray-200 px-3 outline-none" placeholder="••••••••">
        </div>

        <button class="w-full h-11 bg-gray-900 text-white font-bold active:scale-[0.99] transition">
          Cambiar contraseña (demo)
        </button>

        <div class="border-t border-gray-200 pt-3">
          <button class="w-full h-11 border border-gray-200 bg-white font-bold active:scale-[0.99] transition">
            Cerrar sesión (demo)
          </button>
        </div>
      </div>
    </section>
  </div>

  <div class="mt-4 border border-gray-200 bg-white p-4">
    <div class="font-extrabold">Preferencias</div>
    <div class="mt-2 grid grid-cols-1 md:grid-cols-3 gap-2">
      <button class="h-11 border border-gray-200 bg-white font-bold active:scale-[0.99] transition">Notificaciones</button>
      <button class="h-11 border border-gray-200 bg-white font-bold active:scale-[0.99] transition">Privacidad</button>
      <button class="h-11 bg-gray-900 text-white font-bold active:scale-[0.99] transition">Guardar cambios</button>
    </div>
  </div>
</div>
