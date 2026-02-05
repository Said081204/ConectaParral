<?php
$productos = [
    ["id" => 1, "nombre" => "Collar de Plata Artesanal", "categoria" => "Joyería", "precio" => 850.00, "imagen_url" => "https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?q=80&w=800"],
    ["id" => 2, "nombre" => "Sombrero de Paja Tradicional", "categoria" => "Ropa", "precio" => 420.00, "imagen_url" => "https://images.unsplash.com/photo-1533827432537-70133748f5c8?q=80&w=800"],
    ["id" => 3, "nombre" => "Bolso de Cuero Curtido", "categoria" => "Accesorios", "precio" => 1250.00, "imagen_url" => "https://images.unsplash.com/photo-1584917865442-de89df76afd3?q=80&w=800"],
    ["id" => 4, "nombre" => "Bufanda de Lana Orgánica", "categoria" => "Ropa", "precio" => 350.00, "imagen_url" => "https://images.unsplash.com/photo-1520903920243-00d872a2d1c9?q=80&w=800"],
    ["id" => 7, "nombre" => "Aceite de Oliva Extra Virgen", "categoria" => "Orgánicos", "precio" => 240.00, "imagen_url" => "https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?q=80&w=800"],
    ["id" => 8, "nombre" => "Miel de Abeja Multiflora", "categoria" => "Orgánicos", "precio" => 120.00, "imagen_url" => "https://images.unsplash.com/photo-1587049352846-4a222e784d38?q=80&w=800"],
    ["id" => 9, "nombre" => "Café de Altura Tostado", "categoria" => "Alimentos", "precio" => 210.00, "imagen_url" => "https://images.unsplash.com/photo-1559056199-641a0ac8b55e?q=80&w=800"],
    ["id" => 10, "nombre" => "Vino Tinto Artesanal", "categoria" => "Alimentos", "precio" => 580.00, "imagen_url" => "https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?q=80&w=800"],
    ["id" => 11, "nombre" => "Vaso de Barro Bruñido", "categoria" => "Artesanías", "precio" => 320.00, "imagen_url" => "https://images.unsplash.com/photo-1610701596007-11502861dcfa?q=80&w=800"],
    ["id" => 13, "nombre" => "Vela Aromática de Soja", "categoria" => "Hogar", "precio" => 150.00, "imagen_url" => "https://images.unsplash.com/photo-1603006905003-be475563bc59?q=80&w=800"],
    ["id" => 14, "nombre" => "Maceta de Cerámica Minimal", "categoria" => "Hogar", "precio" => 280.00, "imagen_url" => "https://images.unsplash.com/photo-1485955900006-10f4d324d411?q=80&w=800"],
    ["id" => 15, "nombre" => "Lámpara de Bambú", "categoria" => "Hogar", "precio" => 920.00, "imagen_url" => "https://images.unsplash.com/photo-1534073828943-f801091bb18c?q=80&w=800"],
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    /* ✅ Favorito arriba de todo */
    .fav-btn { z-index: 60; -webkit-tap-highlight-color: transparent; }
    .fav-btn .fav-icon { color:#9ca3af; fill:none; transition: all .25s ease; }
    .fav-btn.is-fav .fav-icon { color:#ef4444; fill:#ef4444; }

    /* ✅ Overlay detalles encima de imagen pero debajo del favorito */
    .details-overlay { z-index: 30; }

    /* ✅ Botón ver detalles */
    .view-btn { z-index: 40; }

    /* ✅ Carrito */
    .cart-btn { z-index: 60; -webkit-tap-highlight-color: transparent; transition: transform .15s ease; }
    .cart-btn:active { transform: scale(.92); }
    .cart-btn.is-bounce { transform: scale(1.08); }
  </style>
</head>

<body class="bg-gray-100">

<section id="productos-galeria" class="py-20">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">

      <?php foreach ($productos as $producto): ?>
      <div class="group bg-white rounded-[2rem] p-4 hover:shadow-2xl transition flex flex-col relative">

        <div class="relative overflow-hidden rounded-[1.75rem] h-44 sm:h-64">

          <img src="<?= $producto['imagen_url'] ?>"
               class="w-full h-full object-cover group-hover:scale-110 transition duration-700"
               alt="<?= htmlspecialchars($producto['nombre']) ?>">

          <!-- ✅ FAVORITO (ya arreglado) -->
          <button
            type="button"
            class="fav-btn absolute top-3 right-3 w-10 h-10 rounded-full bg-white/90 flex items-center justify-center shadow-md"
            data-id="<?= $producto['id'] ?>"
            aria-label="Agregar a favoritos">

            <!-- icono inline para sí aceptar color -->
            <svg xmlns="http://www.w3.org/2000/svg" class="fav-icon w-6 h-6 pointer-events-none"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
          </button>

          <!-- ✅ OVERLAY VER DETALLES -->
          <div class="details-overlay absolute inset-0 flex items-center justify-center bg-black/20 opacity-0 group-hover:opacity-100 transition">
            <a href="#"
               class="view-btn bg-white px-5 py-3 rounded-2xl font-bold text-sm shadow-lg
                      flex items-center gap-2 hover:bg-gray-50 transition"
               aria-label="Ver detalles">

              <!-- 👁 ver.svg -->
              <img src="icons/ver.svg" alt="Ver" class="w-5 h-5" draggable="false">
              Ver detalles
            </a>
          </div>
        </div>

        <!-- INFO -->
        <div class="pt-4 flex flex-col flex-grow">
          <span class="text-xs font-bold text-amber-600 uppercase"><?= htmlspecialchars($producto['categoria']) ?></span>
          <h3 class="font-bold text-md leading-tight mt-1"><?= htmlspecialchars($producto['nombre']) ?></h3>

          <div class="mt-auto flex justify-between items-center pt-4">
            <span class="text-xl font-black">$<?= number_format($producto['precio'], 2) ?></span>

            <!-- ✅ CARRITO con tu carrito.svg -->
            <button type="button"
                    class="cart-btn w-10 h-10 rounded-xl bg-gray-900 flex items-center justify-center"
                    data-id="<?= $producto['id'] ?>"
                    aria-label="Agregar al carrito">

              <img src="icons/carrito.svg" alt="Carrito" class="w-5 h-5 invert" draggable="false">
            </button>
          </div>
        </div>

      </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<script>
(function () {
  "use strict";

  const favKey = (id) => `fav_${id}`;

  function initFavs() {
    document.querySelectorAll(".fav-btn").forEach((btn) => {
      const id = btn.dataset.id;
      if (localStorage.getItem(favKey(id)) === "1") {
        btn.classList.add("is-fav");
      }
    });
  }

  function handleClick(e) {
    // ✅ FAVORITO
    const favBtn = e.target.closest(".fav-btn");
    if (favBtn) {
      e.preventDefault();
      e.stopPropagation();

      const id = favBtn.dataset.id;
      const willBeActive = !favBtn.classList.contains("is-fav");

      favBtn.classList.toggle("is-fav", willBeActive);
      localStorage.setItem(favKey(id), willBeActive ? "1" : "0");

      favBtn.animate(
        [{ transform: "scale(1)" }, { transform: "scale(1.25)" }, { transform: "scale(1)" }],
        { duration: 220, easing: "ease-out" }
      );
      return;
    }

    // ✅ CARRITO
    const cartBtn = e.target.closest(".cart-btn");
    if (cartBtn) {
      e.preventDefault();
      e.stopPropagation();

      cartBtn.classList.add("is-bounce");
      setTimeout(() => cartBtn.classList.remove("is-bounce"), 160);
      return;
    }
  }

  document.addEventListener("DOMContentLoaded", () => {
    initFavs();
    document.addEventListener("click", handleClick);
  });
})();
</script>

</body>
</html>
