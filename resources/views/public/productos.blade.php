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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* ✅ Capas Superiores */
        .fav-btn { z-index: 70; -webkit-tap-highlight-color: transparent; }
        .fav-btn .fav-icon { color: #9ca3af; fill: none; transition: all .25s ease; }
        .fav-btn.is-fav .fav-icon { color: #ef4444; fill: #ef4444; }

        /* ✅ Cápsula "Ver Detalles" (ver.svg) */
        .details-overlay { 
            z-index: 50; 
            opacity: 0; 
            transform: scale(0.9);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
            pointer-events: none;
        }
        
        /* Aparece al pasar el mouse (PC) o al tocar la tarjeta (Móvil) */
        .group:hover .details-overlay,
        .group:active .details-overlay { 
            opacity: 1; 
            transform: scale(1);
            pointer-events: auto;
        }

        /* ✅ Responsividad del Ver Más */
        .is-hidden-mobile { display: none; }
        @media (min-width: 640px) {
            .is-hidden-mobile { display: flex !important; }
        }

        .line-clamp-1 { display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; }
    </style>
</head>
<body class="bg-white">

<section id="productos-galeria" class="py-12">
    <div class="container mx-auto px-4">
        
        <div class="mb-10">
            <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Productos destacados</h2>
            <p class="text-gray-500 mt-2">Selección de lo mejor en artesanías y productos regionales.</p>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-8">
            <?php foreach ($productos as $index => $p): 
                $mobileHidden = ($index >= 4) ? 'is-hidden-mobile' : '';
            ?>
            <div class="group bg-white rounded-[2.5rem] p-3 sm:p-4 shadow-sm border border-gray-100 flex flex-col relative <?= $mobileHidden ?> transition-all duration-300">

                <div class="relative overflow-hidden rounded-[2rem] h-44 sm:h-64 bg-gray-50">
                    <img src="<?= $p['imagen_url'] ?>" class="w-full h-full object-cover transition duration-700 group-hover:scale-105">

                    <button type="button" class="fav-btn absolute top-3 right-3 w-9 h-9 rounded-full bg-white/90 flex items-center justify-center shadow-md active:scale-90" data-id="<?= $p['id'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fav-icon w-5 h-5 pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </button>

                    <div class="details-overlay absolute inset-0 flex items-center justify-center bg-black/5 sm:bg-black/10">
                        <a href="#" class="bg-white px-4 py-2 sm:px-5 sm:py-2.5 rounded-2xl font-bold shadow-lg flex items-center gap-2 text-[11px] sm:text-sm text-gray-800 hover:bg-gray-50 transition-all">
                            <img src="icons/ver.svg" alt="Ojo" class="w-4 h-4 sm:w-5 h-5" draggable="false">
                            Ver detalles
                        </a>
                    </div>
                </div>

                <div class="pt-4 flex flex-col flex-grow">
                    <span class="text-[10px] font-bold text-amber-600 tracking-widest uppercase"><?= $p['categoria'] ?></span>
                    <h3 class="font-bold text-sm sm:text-lg leading-tight mt-1 text-gray-900 line-clamp-1"><?= $p['nombre'] ?></h3>
                    
                    <div class="mt-auto flex justify-between items-center pt-4">
                        <span class="text-xl sm:text-2xl font-black text-gray-900">$<?= number_format($p['precio'], 2) ?></span>
                        
                        <button type="button" class="cart-btn w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-slate-900 flex items-center justify-center text-white active:scale-90 transition shadow-lg">
                            <i class="fas fa-shopping-cart text-xs sm:text-sm"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-10 sm:hidden flex justify-center">
            <button id="btnVerMas" class="px-8 py-3 rounded-2xl font-black bg-slate-900 text-white shadow-xl active:scale-95 transition">
                Ver más productos
                <i class="fas fa-chevron-down ml-2 text-xs"></i>
            </button>
        </div>

    </div>
</section>

<script>
(function() {
    "use strict";

    // Inicializar Favoritos
    const key = (id) => `fav_${id}`;
    document.querySelectorAll(".fav-btn").forEach(b => {
        if(localStorage.getItem(key(b.dataset.id)) === "1") b.classList.add("is-fav");
    });

    // Eventos Globales
    document.addEventListener("click", (e) => {
        const fb = e.target.closest(".fav-btn");
        if(fb) {
            const active = fb.classList.toggle("is-fav");
            localStorage.setItem(key(fb.dataset.id), active ? "1" : "0");
            fb.animate([{transform:"scale(1)"},{transform:"scale(1.2)"},{transform:"scale(1)"}], 200);
            return;
        }

        const more = e.target.closest("#btnVerMas");
        if(more) {
            document.querySelectorAll(".is-hidden-mobile").forEach(el => el.classList.remove("is-hidden-mobile"));
            more.remove();
        }
    });
})();
</script>

</body>
</html>