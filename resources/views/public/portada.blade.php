<?php
$productos_portada = [
    ["imagen_url" => "https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?q=80&w=1200"],
    ["imagen_url" => "https://images.unsplash.com/photo-1533827432537-70133748f5c8?q=80&w=1200"],
    ["imagen_url" => "https://images.unsplash.com/photo-1584917865442-de89df76afd3?q=80&w=1200"],
    ["imagen_url" => "https://images.unsplash.com/photo-1520903920243-00d872a2d1c9?q=80&w=1200"],
    ["imagen_url" => "https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?q=80&w=1200"],
    ["imagen_url" => "https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?q=80&w=1200"],
    ["imagen_url" => "https://images.unsplash.com/photo-1610701596007-11502861dcfa?q=80&w=1200"],
    ["imagen_url" => "https://images.unsplash.com/photo-1534073828943-f801091bb18c?q=80&w=1200"],
];
?>

<section id="portada" class="relative overflow-hidden min-h-[75vh] lg:min-h-[85vh] bg-black">

  <div id="carouselBg" class="absolute inset-0 z-0">
    <?php foreach ($productos_portada as $index => $prod): ?>
      <div class="carousel-item absolute inset-0 transition-opacity duration-1000 ease-in-out <?= $index === 0 ? 'opacity-100' : 'opacity-0' ?>">
        <img src="<?= $prod['imagen_url'] ?>" alt="Artesanías" class="w-full h-full object-cover animate-slow-zoom" />
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>
        <div class="absolute inset-0 bg-black/20"></div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="relative z-10 flex items-center min-h-[75vh] lg:min-h-[85vh]">
    <div class="container mx-auto px-6 lg:px-12">

      <div class="w-full max-w-3xl bg-white/5 backdrop-blur-md border border-white/10 rounded-[2rem] p-8 md:p-14 shadow-2xl">
        
        <div class="flex flex-wrap items-center gap-3 mb-8">
          <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#3b82f6]/10 border border-[#3b82f6]/30 text-[#3b82f6] text-xs font-bold uppercase tracking-widest">
            <span class="w-2 h-2 rounded-full bg-[#3b82f6] animate-ping"></span>
            Marketplace Regional
          </span>
          <span class="text-white/40 text-sm hidden sm:block">|</span>
          <span class="text-white/80 text-sm font-medium">
            <i class="fas fa-check-circle text-[#3b82f6] mr-1"></i> Calidad Garantizada
          </span>
        </div>

        <h1 class="text-white font-black tracking-tight leading-[1.1] text-4xl sm:text-6xl lg:text-7xl mb-6">
          Descubre el talento <br>
          <span class="text-[#3b82f6]">local y artesanal</span>
        </h1>

        <p class="text-white/70 font-light text-lg sm:text-xl max-w-xl mb-10 leading-relaxed">
          Conectamos a los mejores emprendedores de la región contigo. Productos únicos, envíos seguros y compras con impacto local.
        </p>

        <div class="flex flex-col sm:flex-row gap-5">
          <a href="#productos"
             class="inline-flex items-center justify-center gap-3 bg-[#3b82f6] text-white px-10 py-4 rounded-xl font-bold shadow-xl shadow-[#3b82f6]/20 hover:bg-[#2563eb] hover:-translate-y-1 transition-all duration-300 w-full sm:w-auto">
            Explorar Tienda
            <i class="fas fa-chevron-right text-xs"></i>
          </a>

          <a href="#vende"
             class="inline-flex items-center justify-center gap-3 bg-white/10 text-white border border-white/20 px-10 py-4 rounded-xl font-bold hover:bg-white/20 transition-all duration-300 w-full sm:w-auto">
            Empezar a Vender
          </a>
        </div>

        <div class="grid grid-cols-3 gap-6 mt-12 pt-8 border-t border-white/10">
          <div>
            <p class="text-2xl font-bold text-white">+120</p>
            <p class="text-xs text-white/50 uppercase tracking-tighter">Vendedores</p>
          </div>
          <div>
            <p class="text-2xl font-bold text-white">24h</p>
            <p class="text-xs text-white/50 uppercase tracking-tighter">Soporte</p>
          </div>
          <div>
            <p class="text-2xl font-bold text-white">100%</p>
            <p class="text-xs text-white/50 uppercase tracking-tighter">Seguro</p>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<style>
  @keyframes slowZoom {
    from { transform: scale(1); }
    to { transform: scale(1.15); }
  }
  .animate-slow-zoom {
    animation: slowZoom 15s ease-in-out infinite alternate;
  }
</style>