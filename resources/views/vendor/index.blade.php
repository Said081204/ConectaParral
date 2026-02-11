{{-- resources/views/vendor/index.blade.php --}}
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vendedor | ConectaParral</title>

  @vite(['resources/css/app.css','resources/css/vendor.css','resources/js/app.js'])
</head>

<body class="vp-page">

  @php
    $path = request()->path(); // vendor/productos
    $page = 'dashboard';

    if ($path === 'vendor' || $path === 'vendor/') $page = 'dashboard';
    if (str_ends_with($path, 'productos')) $page = 'productos';
    elseif (str_ends_with($path, 'pedidos')) $page = 'pedidos';
    elseif (str_ends_with($path, 'envios')) $page = 'envios';
    elseif (str_ends_with($path, 'tienda')) $page = 'tienda';
    elseif (str_ends_with($path, 'perfil')) $page = 'perfil';
  @endphp

  @include('vendor.partials.header')

  <div class="flex w-full">
    @include('vendor.partials.sidebar', ['active' => $page])

    <main class="flex-1 min-w-0">
      <div class="pt-[72px] lg:pt-[76px]">
        <div class="px-3 sm:px-4 lg:px-6 py-5">
          @includeIf("vendor.pages.$page")
        </div>
      </div>
    </main>
  </div>

  <script>
    (function () {
      const openBtn = document.getElementById('vendorSidebarOpen');
      const closeBtn = document.getElementById('vendorSidebarClose');
      const overlay = document.getElementById('vendorSidebarOverlay');
      const drawer = document.getElementById('vendorSidebarDrawer');

      function open() {
        overlay.classList.remove('hidden');
        drawer.classList.remove('-translate-x-full');
        document.body.classList.add('overflow-hidden');
      }
      function close() {
        drawer.classList.add('-translate-x-full');
        setTimeout(() => overlay.classList.add('hidden'), 120);
        document.body.classList.remove('overflow-hidden');
      }

      if (openBtn) openBtn.addEventListener('click', open);
      if (closeBtn) closeBtn.addEventListener('click', close);
      if (overlay) overlay.addEventListener('click', (e) => {
        if (e.target === overlay) close();
      });
    })();
  </script>
</body>
</html>
