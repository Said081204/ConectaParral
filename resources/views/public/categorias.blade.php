<section id="categorias-envios" class="bg-[var(--light-background-color)] py-10 lg:py-12">
  <div class="mx-auto w-full max-w-[1280px] px-4 lg:px-8">

  <!-- Header -->
<div class="mb-6 lg:mb-8">

  <!-- Fila superior: título + ver todo -->
  <div class="flex items-center justify-between gap-3">
    <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight text-[var(--dark-text-color)]">
      Categorías destacadas
    </h2>

    <a href="#productos"
       class="inline-flex items-center gap-1.5
              text-sm font-bold
              text-[var(--primary-color)]
              hover:text-[var(--accent-color)]
              transition-colors whitespace-nowrap">
      Ver todo
      <i class="fas fa-arrow-right text-xs"></i>
    </a>
  </div>

  <!-- Subtítulo -->
  <div class="flex items-center gap-2 mt-2">
    <span class="block w-10 h-[2px] bg-[var(--accent-color)] rounded-full"></span>
    <p class="text-sm md:text-base text-[var(--gray-text-color)]">
      Lo más popular entre nuestros vendedores.
    </p>
  </div>

</div>


    <!-- Carrusel -->
    <div class="relative group">

      <!-- Flecha Izq (solo md+) -->
      <button id="amzPrev"
        class="hidden md:flex absolute -left-3 lg:-left-4 top-1/2 -translate-y-1/2
               w-11 h-11 rounded-2xl
               bg-white/95 backdrop-blur-md
               border border-[var(--light-border-color)]
               shadow-lg
               items-center justify-center z-20
               opacity-0 group-hover:opacity-100 transition-all duration-200">
        <i class="fas fa-chevron-left text-[var(--dark-text-color)]"></i>
      </button>

      <!-- Track -->
      <div id="amzTrack"
        class="flex overflow-x-auto scroll-smooth no-scrollbar
               gap-2 sm:gap-4 lg:gap-6
               py-2">

        <?php
          $cats_ecommerce = [
            ['icon' => 'tshirt', 'name' => 'Ropa y Accesorios'],
            ['icon' => 'mitten', 'name' => 'Artesanías'],
            ['icon' => 'gift', 'name' => 'Regalos'],
            ['icon' => 'spa', 'name' => 'Belleza'],
            ['icon' => 'pen-fancy', 'name' => 'Papelería'],
            ['icon' => 'couch', 'name' => 'Hogar'],
            ['icon' => 'mobile-alt', 'name' => 'Tecnología'],
            ['icon' => 'paw', 'name' => 'Mascotas'],
            ['icon' => 'box-open', 'name' => 'Alimentos'],
            ['icon' => 'fingerprint', 'name' => 'Personalizados']
          ];

          foreach ($cats_ecommerce as $c):
        ?>

        <!-- Ítem -->
        <a href="#"
          class="flex-none
                 w-[120px] sm:w-[140px] md:w-[160px]
                 xl:w-[180px] 2xl:w-[200px]
                 py-3 flex flex-col items-center
                 group/item select-none">

          <!-- Círculo -->
          <div
            class="rounded-full flex items-center justify-center
                   bg-[var(--accent-color)]/10
                   border border-[var(--light-border-color)]
                   transition-all duration-300
                   group-hover/item:bg-[var(--accent-color)]/16
                   group-hover/item:-translate-y-1
                   group-hover/item:shadow-lg
                   w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28
                   xl:w-32 xl:h-32 2xl:w-36 2xl:h-36">

            <i class="fas fa-<?= $c['icon'] ?>
                      text-3xl sm:text-4xl md:text-[2.1rem]
                      xl:text-[2.35rem] 2xl:text-[2.6rem]
                      text-[var(--accent-color)]
                      transition-colors duration-300
                      group-hover/item:text-[var(--primary-color)]"></i>
          </div>

          <!-- Texto -->
          <span
            class="mt-3 text-center font-extrabold leading-tight px-2
                   text-[var(--dark-text-color)]
                   text-[13px] sm:text-sm xl:text-[15px] 2xl:text-base
                   group-hover/item:text-[var(--primary-color)]
                   transition-colors
                   line-clamp-2 min-h-[40px]">
            <?= $c['name'] ?>
          </span>

        </a>

        <?php endforeach; ?>
      </div>

      <!-- Flecha Der (solo md+) -->
      <button id="amzNext"
        class="hidden md:flex absolute -right-3 lg:-right-4 top-1/2 -translate-y-1/2
               w-11 h-11 rounded-2xl
               bg-white/95 backdrop-blur-md
               border border-[var(--light-border-color)]
               shadow-lg
               items-center justify-center z-20
               opacity-0 group-hover:opacity-100 transition-all duration-200">
        <i class="fas fa-chevron-right text-[var(--dark-text-color)]"></i>
      </button>

      <!-- Fade laterales -->
      <div class="pointer-events-none hidden md:block absolute inset-y-0 left-0 w-10
                  bg-gradient-to-r from-white to-transparent"></div>
      <div class="pointer-events-none hidden md:block absolute inset-y-0 right-0 w-10
                  bg-gradient-to-l from-white to-transparent"></div>
    </div>

    <!-- ✅ Barra de progreso (solo desktop) -->
    <div class="mt-6 hidden sm:block">
      <div class="relative w-full h-[4px] bg-gray-200 rounded-full overflow-hidden">
        <div id="amzBar"
             class="absolute top-0 left-0 h-full
                    bg-[var(--primary-color)]
                    rounded-full transition-all duration-300"
             style="width:0%">
        </div>
      </div>
    </div>

  </div>
</section>

<script>
  const amzTrack = document.getElementById('amzTrack');
  const amzPrev  = document.getElementById('amzPrev');
  const amzNext  = document.getElementById('amzNext');
  const amzBar   = document.getElementById('amzBar');

  function updateUI() {
    const maxScroll = amzTrack.scrollWidth - amzTrack.clientWidth;
    const current   = amzTrack.scrollLeft;

    // Flechas
    if (amzPrev && amzNext) {
      amzPrev.style.opacity = current <= 10 ? '0.25' : '1';
      amzNext.style.opacity = current >= maxScroll - 10 ? '0.25' : '1';
      amzPrev.style.pointerEvents = current <= 10 ? 'none' : 'auto';
      amzNext.style.pointerEvents = current >= maxScroll - 10 ? 'none' : 'auto';
    }

    // Barra de progreso
    if (amzBar && maxScroll > 0) {
      const percent = Math.min((current / maxScroll) * 100, 100);
      amzBar.style.width = percent + '%';
    } else if (amzBar) {
      amzBar.style.width = '100%';
    }
  }

  if (amzNext) {
    amzNext.addEventListener('click', () => {
      amzTrack.scrollBy({ left: amzTrack.clientWidth * 0.85, behavior: 'smooth' });
    });
  }

  if (amzPrev) {
    amzPrev.addEventListener('click', () => {
      amzTrack.scrollBy({ left: -(amzTrack.clientWidth * 0.85), behavior: 'smooth' });
    });
  }

  amzTrack.addEventListener('scroll', updateUI);
  window.addEventListener('resize', updateUI);
  updateUI();
</script>

<style>
  .no-scrollbar::-webkit-scrollbar { display: none; }
  .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

  /* clamp helper si no lo tienes */
  .line-clamp-2{
    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
  }
</style>
