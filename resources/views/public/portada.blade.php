@php
  $slides = [
    [
      "tag" => "OFERTA DE LA SEMANA",
      "titulo" => "PRODUCTOS REGIONALES <br><span class='text-amber-400 font-serif italic'>DIRECTO DE PARRAL</span>",
      "desc" => "Descubre artesanías, dulces típicos y regalos con identidad local. Envíos seguros a todo México con garantía de satisfacción.",
      "img" => "https://images.unsplash.com/photo-1590534247854-e97d5e3feef6?q=80&w=2400&auto=format&fit=crop",
      "btn" => ["text"=>"VER OFERTAS", "href"=>"#ofertas"]
    ],
    [
      "tag" => "VENDE CON NOSOTROS",
      "titulo" => "TU NEGOCIO, <br><span class='text-amber-400 font-serif italic'>NUESTRA VITRINA</span>",
      "desc" => "Expande tus ventas. Sube tus productos y gestiona tus pedidos desde un panel profesional diseñado para crecer.",
      "img" => "https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=2400&auto=format&fit=crop",
      "btn" => ["text"=>"QUIERO SER VENDEDOR", "href"=>"#registro-vendedor"],
      "show_vendor_cta" => true
    ],
    [
      "tag" => "NUEVAS LLEGADAS",
      "titulo" => "DETALLES QUE <br><span class='text-amber-400 font-serif italic'>ENAMORAN</span>",
      "desc" => "Nuevos productos cada semana. Compra local, apoya a los artesanos de la región y recibe en la comodidad de tu casa.",
      "img" => "https://images.unsplash.com/photo-1513519247388-193ad51c50be?q=80&w=2400&auto=format&fit=crop",
      "btn" => ["text"=>"EXPLORAR CATÁLOGO", "href"=>"#catalogo"]
    ]
  ];

  $bestSellers = [
    ["name"=>"Cajeta Artesanal Parral", "price"=>"$120", "img"=>"https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?q=80&w=900"],
    ["name"=>"Pulsera Plata Ley .925", "price"=>"$290", "img"=>"https://images.unsplash.com/photo-1610701596007-11502861dcfa?q=80&w=900"],
    ["name"=>"Dulces Típicos Surtidos", "price"=>"$160", "img"=>"https://images.unsplash.com/photo-1582208993220-2cde1cb44746?q=80&w=900"],
  ];
@endphp

<section class="w-full bg-white py-4 sm:py-8 antialiased font-sans">
  <div class="mx-auto w-full max-w-[1920px] px-4 sm:px-6 lg:px-10">
    
    <div class="flex flex-col lg:grid lg:grid-cols-12 gap-5">

      {{-- CARRUSEL PRINCIPAL --}}
      <div class="lg:col-span-8 xl:col-span-9 relative group">
        <div class="relative bg-black h-[450px] sm:h-[600px] lg:h-[700px] xl:h-[780px] overflow-hidden">
          
          <div id="cp-track" class="flex h-full w-full transition-transform duration-1000 ease-[cubic-bezier(0.19,1,0.22,1)]">
            @foreach($slides as $s)
              <article class="relative w-full h-full flex-shrink-0 flex items-center">
                <img src="{{ $s['img'] }}" class="absolute inset-0 w-full h-full object-cover opacity-60">
                <div class="absolute inset-0 bg-gradient-to-r from-black via-black/50 to-transparent"></div>

                <div class="relative w-full p-8 sm:p-16 lg:p-24 z-10">
                  <div class="max-w-[800px]">
                    <div class="inline-block border-l-4 border-amber-400 pl-4 mb-6">
                      <span class="text-[10px] sm:text-xs font-black tracking-[0.3em] text-white uppercase">{{ $s['tag'] }}</span>
                    </div>

                    <h1 class="text-white font-bold leading-[1.1] tracking-tighter text-4xl sm:text-6xl lg:text-7xl xl:text-8xl mb-8">
                      {!! $s['titulo'] !!}
                    </h1>

                    <p class="text-gray-300 font-light leading-relaxed mb-10 text-base sm:text-xl lg:text-2xl max-w-2xl">
                      {{ $s['desc'] }}
                    </p>

                    <a href="{{ $s['btn']['href'] }}" class="inline-block px-12 py-5 bg-amber-400 text-black font-black text-xs sm:text-sm tracking-[0.3em] uppercase hover:bg-white transition-all">
                      {{ $s['btn']['text'] }}
                    </a>
                  </div>
                </div>
              </article>
            @endforeach

            {{-- CLON PARA INFINITO --}}
            @php $first = $slides[0]; @endphp
            <article class="relative w-full h-full flex-shrink-0 flex items-center">
              <img src="{{ $first['img'] }}" class="absolute inset-0 w-full h-full object-cover opacity-60">
              <div class="absolute inset-0 bg-gradient-to-r from-black via-black/50 to-transparent"></div>
              <div class="relative w-full p-8 sm:p-16 lg:p-24 z-10">
                <div class="max-w-[800px]">
                    <div class="inline-block border-l-4 border-amber-400 pl-4 mb-6">
                        <span class="text-[10px] sm:text-xs font-black tracking-[0.3em] text-white uppercase">{{ $first['tag'] }}</span>
                    </div>
                    <h1 class="text-white font-bold leading-[1.1] tracking-tighter text-4xl sm:text-6xl lg:text-7xl xl:text-8xl mb-8">{!! $first['titulo'] !!}</h1>
                    <p class="text-gray-300 font-light leading-relaxed mb-10 text-base sm:text-xl lg:text-2xl max-w-2xl">{{ $first['desc'] }}</p>
                    <a href="{{ $first['btn']['href'] }}" class="inline-block px-12 py-5 bg-amber-400 text-black font-black text-xs sm:text-sm tracking-[0.3em] uppercase hover:bg-white transition-all">{{ $first['btn']['text'] }}</a>
                </div>
              </div>
            </article>
          </div>

          {{-- CONTROLES --}}
          <button onclick="movePrev()" class="absolute left-0 top-1/2 -translate-y-1/2 h-20 w-12 bg-black/40 text-white hover:bg-amber-400 hover:text-black transition-all z-30 flex items-center justify-center">
            <span class="text-2xl">‹</span>
          </button>
          <button onclick="moveNext()" class="absolute right-0 top-1/2 -translate-y-1/2 h-20 w-12 bg-black/40 text-white hover:bg-amber-400 hover:text-black transition-all z-30 flex items-center justify-center">
            <span class="text-2xl">›</span>
          </button>

          {{-- RECUADROS DE NAVEGACIÓN (DOTS) A LA DERECHA --}}
          <div class="absolute bottom-10 right-10 flex items-center z-30">
            <div id="cp-dots" class="flex gap-2">
                @foreach($slides as $index => $s)
                    <button onclick="goToSlide({{ $index }})" class="cp-dot w-3 h-3 border border-white/50 bg-transparent transition-all duration-500"></button>
                @endforeach
            </div>
          </div>

          <div class="absolute bottom-0 left-0 w-full h-1 bg-white/10">
            <div id="cp-bar" class="h-full bg-amber-400 w-0"></div>
          </div>
        </div>
      </div>

      {{-- BARRA LATERAL --}}
      <div class="lg:col-span-4 xl:col-span-3 flex flex-col gap-5">
        <aside class="flex-[1.3] bg-white border border-gray-200 flex flex-col h-full shadow-sm">
          <div class="p-6 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="text-black font-black text-[11px] tracking-[0.2em] uppercase italic">MÁS VENDIDOS</h3>
            <span class="text-[9px] font-bold text-amber-600 tracking-widest">TOP RANKING</span>
          </div>

          <div class="p-5 flex flex-col gap-5 flex-grow">
            @foreach($bestSellers as $p)
              <a href="#" class="group flex items-center gap-4 transition-all border-b border-gray-50 pb-4 last:border-0">
                <div class="h-20 w-20 flex-shrink-0 bg-gray-50 border border-gray-100 overflow-hidden">
                  <img src="{{ $p['img'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="flex-1 min-w-0">
                  <p class="font-bold text-black text-xs uppercase tracking-tight truncate group-hover:text-amber-600 transition-colors">{{ $p['name'] }}</p>
                  <p class="text-black font-black text-lg mt-1">{{ $p['price'] }} <span class="text-[9px] text-gray-400 font-normal uppercase">MXN</span></p>
                </div>
              </a>
            @endforeach
          </div>

          <a href="/mas-vendidos" class="w-full py-6 bg-black text-white text-center text-[10px] font-black tracking-[0.4em] uppercase hover:bg-amber-400 hover:text-black transition-all mt-auto border-t border-black">
            VER TODO EL CATÁLOGO
          </a>
        </aside>

        <aside class="flex-1 bg-gray-900 relative overflow-hidden group">
          <img src="https://images.unsplash.com/photo-1580674271209-40b49a5a05b1?q=80&w=2000" class="absolute inset-0 w-full h-full object-cover opacity-50 grayscale hover:grayscale-0 transition-all duration-700">
          <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition-all"></div>
          <div class="relative h-full p-8 flex flex-col justify-end items-start">
            <h4 class="text-white font-bold text-2xl leading-none tracking-tighter uppercase mb-2">ENVÍOS <br>GARANTIZADOS</h4>
            <p class="text-gray-400 text-[10px] font-bold tracking-[0.2em] uppercase mb-8">SEGURIDAD EN CADA ENTREGA</p>
            <a href="/rastreo" class="w-full py-4 border border-white/40 text-white text-center text-[10px] font-black tracking-[0.2em] uppercase hover:bg-white hover:text-black transition-all">
              RASTREAR MI PEDIDO
            </a>
          </div>
        </aside>
      </div>

    </div>
  </div>
</section>

<script>
  (function() {
    const track = document.getElementById('cp-track');
    const bar = document.getElementById('cp-bar');
    const dots = document.querySelectorAll('.cp-dot');
    const totalRealSlides = {{ count($slides) }};
    let index = 0;
    let isTransitioning = false;
    const interval = 8000;

    function update(withAnimation = true) {
      if (withAnimation) {
        track.style.transition = "transform 1000ms cubic-bezier(0.19, 1, 0.22, 1)";
      } else {
        track.style.transition = "none";
      }
      
      track.style.transform = `translateX(-${index * 100}%)`;

      let visualIdx = index;
      if (index === totalRealSlides) visualIdx = 0;
      if (index < 0) visualIdx = totalRealSlides - 1;

      dots.forEach((dot, i) => {
          if(i === visualIdx) {
              dot.classList.add('bg-amber-400', 'border-amber-400', 'w-8');
              dot.classList.remove('bg-transparent', 'w-3');
          } else {
              dot.classList.remove('bg-amber-400', 'border-amber-400', 'w-8');
              dot.classList.add('bg-transparent', 'w-3');
          }
      });

      if (withAnimation) resetBar();
    }

    function resetBar() {
      bar.style.transition = 'none';
      bar.style.width = '0%';
      setTimeout(() => {
        bar.style.transition = `width ${interval}ms linear`;
        bar.style.width = '100%';
      }, 50);
    }

    function handleNext() {
      if (isTransitioning) return;
      isTransitioning = true;
      index++;
      update(true);

      if (index === totalRealSlides) {
        setTimeout(() => {
          index = 0;
          update(false);
          isTransitioning = false;
        }, 1000);
      } else {
        setTimeout(() => { isTransitioning = false; }, 1000);
      }
    }

    window.moveNext = () => handleNext();
    
    window.movePrev = () => {
      if (isTransitioning) return;
      isTransitioning = true;
      if (index === 0) {
        index = totalRealSlides;
        update(false);
        setTimeout(() => {
          index--;
          update(true);
          setTimeout(() => { isTransitioning = false; }, 1000);
        }, 50);
      } else {
        index--;
        update(true);
        setTimeout(() => { isTransitioning = false; }, 1000);
      }
    }

    window.goToSlide = (n) => { 
      if (isTransitioning) return;
      index = n; 
      update(true); 
    }

    setInterval(handleNext, interval);
    update(true);
  })();
</script>