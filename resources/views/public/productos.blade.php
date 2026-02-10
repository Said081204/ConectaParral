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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://unpkg.com/lucide@latest"></script>

  <style>
    .fav-btn { z-index: 10; -webkit-tap-highlight-color: transparent; }
    .fav-btn .fav-icon { color:#9ca3af; fill:none; transition: all .25s ease; }
    .fav-btn.is-fav .fav-icon { color:#ef4444; fill:#ef4444; }

    .details-overlay {
      z-index: 5;
      opacity: 0;
      transform: scale(0.92);
      transition: all 0.28s cubic-bezier(0.4, 0, 0.2, 1);
      pointer-events: none;
    }
    .group:hover .details-overlay,
    .group:active .details-overlay {
      opacity: 1;
      transform: scale(1);
      pointer-events: auto;
    }

    body.is-mobile-menu-open .fav-btn,
    body.is-mobile-menu-open .details-overlay {
      opacity: 0 !important;
      pointer-events: none !important;
      visibility: hidden !important;
    }

    .line-clamp-1{display:-webkit-box;-webkit-line-clamp:1;-webkit-box-orient:vertical;overflow:hidden;}
    .currency-icon { margin-right: -1px; stroke-width: 2.5px; }

    /* ============================
       ✅ SOLO MÓVIL (visible < 640px)
       ============================ */
    .cp-mobile-tools { display:none; }
    .cp-overlay, .cp-drawer, .cp-sheet { display:none; }

    @media (max-width: 639px){
      .cp-mobile-tools{
        display:flex;
        align-items:center;
        gap:10px;
        padding:10px 2px 12px;
        margin-bottom: 6px;
        position: sticky;
        top: 0;
        z-index: 30;
        background: rgba(255,255,255,.96);
        backdrop-filter: blur(10px);
      }
      .cp-tool-btn{
        display:inline-flex;
        align-items:center;
        gap:8px;
        height:42px;
        padding:0 12px;
        border:1px solid rgba(229,231,235,1);
        background:#fff;
        font-weight:800;
        font-size:13px;
        color:#111827;
        -webkit-tap-highlight-color:transparent;
      }
      .cp-tool-btn:active{ transform: scale(.99); }

      .cp-view-toggle{
        margin-left:auto;
        display:flex;
        border:1px solid rgba(229,231,235,1);
        overflow:hidden;
        background:#fff;
        height:42px;
      }
      .cp-view-toggle button{
        width:44px;
        border:0;
        background:transparent;
        display:grid;
        place-items:center;
        -webkit-tap-highlight-color:transparent;
      }
      .cp-view-toggle button.is-active{
        background:#0f172a;
        color:#fff;
      }

      /* Vista lista SOLO móvil */
      .cp-products.view-list{ grid-template-columns: 1fr !important; }
      .cp-products.view-list .cp-card{
        display:grid;
        grid-template-columns: 120px 1fr;
        gap:12px;
        padding:12px !important;
      }
      .cp-products.view-list .cp-img{ height:110px !important; }
      .cp-products.view-list .cp-card h3{ -webkit-line-clamp:2; }

      /* overlays móvil */
      .cp-overlay{
        display:block;
        position:fixed; inset:0;
        background:rgba(0,0,0,.35);
        opacity:0; pointer-events:none;
        transition: opacity .2s ease;
        z-index: 60;
      }
      .cp-overlay.is-open{ opacity:1; pointer-events:auto; }

      .cp-drawer{
        display:flex;
        position:fixed; top:0; bottom:0; right:0;
        width:min(420px, 92vw);
        background:#fff;
        transform: translateX(105%);
        transition: transform .25s ease;
        z-index: 70;
        flex-direction:column;
      }
      .cp-drawer.is-open{ transform: translateX(0); }

      .cp-sheet{
        display:flex;
        position:fixed; left:0; right:0; bottom:0;
        background:#fff;
        transform: translateY(105%);
        transition: transform .25s ease;
        z-index: 70;
        max-height: 75vh;
        flex-direction:column;
      }
      .cp-sheet.is-open{ transform: translateY(0); }

      .cp-head{
        padding:14px 14px;
        border-bottom:1px solid rgba(229,231,235,1);
        display:flex;
        align-items:center;
        justify-content:space-between;
        font-weight:900;
        color:#111827;
      }
      .cp-close{
        width:42px; height:42px;
        border:1px solid rgba(229,231,235,1);
        background:#fff;
        font-weight:900;
        -webkit-tap-highlight-color:transparent;
      }
      .cp-close:active{ transform: scale(.99); }
      .cp-body{ padding: 12px 14px; overflow:auto; }

      .cp-opt{
        display:flex; align-items:center; justify-content:space-between;
        padding:14px 4px;
        border-top:1px solid rgba(243,244,246,1);
        font-weight:800;
        -webkit-tap-highlight-color:transparent;
      }
      .cp-opt:first-child{ border-top:0; }
      .cp-opt.is-active{ color: rgb(217,119,6); }
      .cp-check{
        width:18px;height:18px;border-radius:5px;
        border:2px solid rgb(217,119,6);
        position:relative;
      }
      .cp-opt.is-active .cp-check::after{
        content:"";
        position:absolute; left:3px; top:0px;
        width:6px; height:10px;
        border-right:2px solid rgb(217,119,6);
        border-bottom:2px solid rgb(217,119,6);
        transform: rotate(40deg);
      }

      details > summary{
        list-style:none; cursor:pointer;
        display:flex; justify-content:space-between; align-items:center;
        font-weight:900;
      }
      details > summary::-webkit-details-marker{display:none}
      .cp-field{
        width:100%; height:42px;
        border:1px solid rgba(229,231,235,1);
        padding:0 12px;
        outline:none;
        font-weight:800;
      }
      .cp-actions{
        border-top:1px solid rgba(229,231,235,1);
        padding:12px 14px;
        display:flex; gap:10px;
      }
      .cp-btn-outline{
        flex:1; height:46px;
        border:1px solid rgba(229,231,235,1);
        background:#fff; font-weight:900;
      }
      .cp-btn-solid{
        flex:1; height:46px;
        border:0; background: rgb(217,119,6);
        color:#fff; font-weight:900;
      }

      /* ✅ MÓVIL CUADRADO: quitar bordes redondeados */
      .cp-tool-btn{ border-radius:0 !important; }
      .cp-view-toggle{ border-radius:0 !important; }
      .cp-view-toggle button{ border-radius:0 !important; }

      .cp-products .cp-card{ border-radius:0 !important; }
      .cp-products .cp-img{ border-radius:0 !important; }

      .cp-drawer, .cp-sheet{ border-radius:0 !important; }
      .cp-close{ border-radius:0 !important; }
      .cp-field{ border-radius:0 !important; }
      .cp-btn-outline, .cp-btn-solid{ border-radius:0 !important; }
    }

    /* ✅ Desktop: NO mostrar herramientas móvil + cards cuadradas */
    @media (min-width: 640px){
      .cp-mobile-tools,
      .cp-overlay,
      .cp-drawer,
      .cp-sheet{
        display:none !important;
        visibility:hidden !important;
        pointer-events:none !important;
      }

      .cp-card{ border-radius: 0 !important; }
      .cp-img{ border-radius: 0 !important; }
    }
  </style>
</head>

<body class="bg-white">

<section id="productos-galeria" class="py-12">
  <div class="container mx-auto px-4">

    <div class="mb-10">
      <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Productos destacados</h2>
      <p class="text-gray-500 mt-2">Selección de lo mejor en artesanías y productos regionales.</p>
    </div>

    <!-- ✅ SOLO MÓVIL: Filtro / Ordenar por / Vista -->
    <div class="cp-mobile-tools" aria-label="Herramientas móviles">
      <button class="cp-tool-btn" id="cpBtnFilter" type="button">
        <i data-lucide="sliders-horizontal" style="width:18px;height:18px;"></i>
        <span>Filtro</span>
      </button>

      <!-- ✅ "Ordenar por" SIN mostrar criterio -->
      <button class="cp-tool-btn" id="cpBtnSort" type="button">
        <span>Ordenar por</span>
        <i data-lucide="chevron-down" style="width:18px;height:18px;"></i>
      </button>

      <div class="cp-view-toggle" role="tablist" aria-label="Cambiar vista">
        <button type="button" id="cpBtnGrid" class="is-active" aria-label="Vista cuadrícula">
          <i data-lucide="layout-grid" style="width:18px;height:18px;"></i>
        </button>
        <button type="button" id="cpBtnList" aria-label="Vista lista">
          <i data-lucide="list" style="width:18px;height:18px;"></i>
        </button>
      </div>
    </div>

    <!-- Productos -->
    <div id="cpProducts" class="cp-products grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-8">
      <?php foreach ($productos as $index => $p):
        $mobileHidden = ($index >= 4) ? 'is-hidden-mobile' : '';
      ?>
      <div class="cp-card group bg-white rounded-[2.5rem] p-3 sm:p-4 shadow-sm border border-gray-100 flex flex-col relative <?= $mobileHidden ?> transition-all duration-300">

        <div class="cp-img relative overflow-hidden rounded-[2rem] h-44 sm:h-64 bg-gray-50">
          <img src="<?= $p['imagen_url'] ?>"
               class="w-full h-full object-cover transition duration-700 group-hover:scale-105"
               alt="<?= htmlspecialchars($p['nombre']) ?>">

          <button type="button"
                  class="fav-btn absolute top-3 right-3 w-9 h-9 rounded-full bg-white/90 flex items-center justify-center shadow-md active:scale-90"
                  data-id="<?= $p['id'] ?>"
                  aria-label="Agregar a favoritos">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="fav-icon w-5 h-5 pointer-events-none"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
          </button>

          <div class="details-overlay absolute inset-0 flex items-center justify-center bg-black/10">
            <a href="#"
               class="bg-white px-4 py-2 sm:px-5 sm:py-2.5 rounded-2xl font-bold shadow-lg
                      flex items-center gap-2 text-[11px] sm:text-sm text-gray-800 hover:bg-gray-50 transition-all"
               data-product-id="<?= $p['id'] ?>">
              Ver detalles
            </a>
          </div>
        </div>

        <div class="pt-4 flex flex-col flex-grow">
          <span class="text-[10px] font-bold text-amber-600 tracking-widest uppercase">
            <?= htmlspecialchars($p['categoria']) ?>
          </span>

          <h3 class="font-bold text-sm sm:text-lg leading-tight mt-1 text-gray-900 line-clamp-1">
            <?= htmlspecialchars($p['nombre']) ?>
          </h3>

          <div class="mt-auto flex justify-between items-center pt-4">
            <span class="inline-flex items-baseline text-gray-900">
              <i data-lucide="dollar-sign" class="currency-icon w-4 h-4 sm:w-5 sm:h-5 self-center"></i>
              <span class="text-xl sm:text-2xl font-black tracking-tight"><?= number_format($p['precio'], 2) ?></span>
              <span class="text-[9px] sm:text-[10px] font-bold text-gray-400 ml-1 uppercase">MXN</span>
            </span>

            <button type="button"
                    class="cart-btn w-10 h-10 sm:w-12 sm:h-12 rounded-2xl bg-slate-900 flex items-center justify-center text-white active:scale-90 transition shadow-lg"
                    data-id="<?= $p['id'] ?>">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0  014 0z" />
              </svg>
            </button>
          </div>
        </div>

      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ✅ SOLO MÓVIL: overlay + drawer + sheet -->
<div id="cpOverlay" class="cp-overlay" aria-hidden="true"></div>

<aside id="cpDrawer" class="cp-drawer" aria-label="Filtros (móvil)">
  <div class="cp-head">
    <span>Filtros</span>
    <button class="cp-close" id="cpCloseDrawer" type="button">✕</button>
  </div>

  <div class="cp-body">
    <details open>
      <summary>Seleccionar una categoría <span style="color:#9ca3af;">▾</span></summary>
      <div style="padding:10px 2px;">
        <label style="display:flex;gap:10px;align-items:center;margin:10px 0;font-weight:800;">
          <input type="radio" name="cpCat" value="" checked> Todas
        </label>
        <?php
          $cats = array_values(array_unique(array_map(fn($x)=>$x["categoria"], $productos)));
          sort($cats);
          foreach($cats as $c):
        ?>
          <label style="display:flex;gap:10px;align-items:center;margin:10px 0;font-weight:800;">
            <input type="radio" name="cpCat" value="<?= htmlspecialchars($c) ?>"> <?= htmlspecialchars($c) ?>
          </label>
        <?php endforeach; ?>
      </div>
    </details>

    <details>
      <summary>Precio <span style="color:#9ca3af;">▾</span></summary>
      <div style="padding:10px 2px; display:grid; grid-template-columns:1fr 1fr; gap:10px;">
        <input id="cpMin" class="cp-field" type="number" placeholder="Mín">
        <input id="cpMax" class="cp-field" type="number" placeholder="Máx">
      </div>
    </details>
  </div>

  <div class="cp-actions">
    <button class="cp-btn-outline" id="cpClear" type="button">Limpiar</button>
    <button class="cp-btn-solid" id="cpApply" type="button">Ver resultados</button>
  </div>
</aside>

<section id="cpSheet" class="cp-sheet" aria-label="Ordenar por (móvil)">
  <div class="cp-head">
    <span>Ordenar por</span>
    <button class="cp-close" id="cpCloseSheet" type="button">✕</button>
  </div>

  <div class="cp-body" id="cpSortOpts">
    <div class="cp-opt is-active" data-sort="best"><span>Más vendidos</span><span class="cp-check"></span></div>
    <div class="cp-opt" data-sort="az"><span>Alfabéticamente, A-Z</span><span class="cp-check"></span></div>
    <div class="cp-opt" data-sort="za"><span>Alfabéticamente, Z-A</span><span class="cp-check"></span></div>
    <div class="cp-opt" data-sort="price_asc"><span>Precio, menor a mayor</span><span class="cp-check"></span></div>
    <div class="cp-opt" data-sort="price_desc"><span>Precio, mayor a menor</span><span class="cp-check"></span></div>
  </div>
</section>

<script>
(function() {
  "use strict";
  lucide.createIcons();

  // favoritos
  const key = (id) => `fav_${id}`;
  document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".fav-btn").forEach((b) => {
      if (localStorage.getItem(key(b.dataset.id)) === "1") b.classList.add("is-fav");
    });
  });
  document.addEventListener("click", (e) => {
    const fb = e.target.closest(".fav-btn");
    if (fb) {
      const isActive = fb.classList.toggle("is-fav");
      localStorage.setItem(key(fb.dataset.id), isActive ? "1" : "0");
      return;
    }
  });

  // móvil tools
  const products = document.getElementById("cpProducts");
  const overlay  = document.getElementById("cpOverlay");
  const drawer   = document.getElementById("cpDrawer");
  const sheet    = document.getElementById("cpSheet");

  const btnFilter = document.getElementById("cpBtnFilter");
  const btnSort   = document.getElementById("cpBtnSort");
  const closeDrawer = document.getElementById("cpCloseDrawer");
  const closeSheet  = document.getElementById("cpCloseSheet");

  const btnGrid = document.getElementById("cpBtnGrid");
  const btnList = document.getElementById("cpBtnList");

  const isMobile = () => window.matchMedia("(max-width: 639px)").matches;

  function closeAll(){
    drawer.classList.remove("is-open");
    sheet.classList.remove("is-open");
    overlay.classList.remove("is-open");
    overlay.setAttribute("aria-hidden", "true");
    document.body.style.overflow = "";
  }

  function openOverlay(){
    if (!isMobile()) return;
    overlay.classList.add("is-open");
    overlay.setAttribute("aria-hidden", "false");
    document.body.style.overflow = "hidden";
  }

  // abrir/cerrar (solo móvil)
  btnFilter?.addEventListener("click", () => {
    if(!isMobile()) return;
    openOverlay();
    drawer.classList.add("is-open");
  });
  btnSort?.addEventListener("click", () => {
    if(!isMobile()) return;
    openOverlay();
    sheet.classList.add("is-open");
  });

  closeDrawer?.addEventListener("click", closeAll);
  closeSheet?.addEventListener("click", closeAll);
  overlay?.addEventListener("click", closeAll);

  // ✅ Vista SOLO cambia layout (NO toca texto de ordenar)
  btnGrid?.addEventListener("click", () => {
    if(!isMobile()) return;
    products.classList.remove("view-list");
    btnGrid.classList.add("is-active");
    btnList.classList.remove("is-active");
  });
  btnList?.addEventListener("click", () => {
    if(!isMobile()) return;
    products.classList.add("view-list");
    btnList.classList.add("is-active");
    btnGrid.classList.remove("is-active");
  });

  // Ordenar (solo reordena cards, NO muestra criterio en botón)
  const sortOpts = document.getElementById("cpSortOpts");

  function setActiveSort(mode){
    [...sortOpts.querySelectorAll(".cp-opt")].forEach(o => o.classList.remove("is-active"));
    const el = sortOpts.querySelector(`.cp-opt[data-sort="${mode}"]`);
    if(el) el.classList.add("is-active");
  }

  function sortCards(mode){
    const cards = [...products.querySelectorAll(".cp-card")];
    const getName = (c) => c.querySelector("h3")?.textContent?.trim().toLowerCase() || "";
    const getPrice = (c) => {
      const n = c.querySelector(".tracking-tight")?.textContent || "0";
      return parseFloat(n.replace(/,/g,"")) || 0;
    };

    cards.sort((a,b)=>{
      if(mode==="az") return getName(a).localeCompare(getName(b));
      if(mode==="za") return getName(b).localeCompare(getName(a));
      if(mode==="price_asc") return getPrice(a)-getPrice(b);
      if(mode==="price_desc") return getPrice(b)-getPrice(a);
      return 0; // best: se deja para backend real
    });

    cards.forEach(c => products.appendChild(c));
  }

  sortOpts?.addEventListener("click",(e)=>{
    if(!isMobile()) return;
    const opt = e.target.closest(".cp-opt");
    if(!opt) return;
    const mode = opt.getAttribute("data-sort");
    setActiveSort(mode);
    sortCards(mode);
    closeAll();
  });

  // filtros demo
  const btnApply = document.getElementById("cpApply");
  const btnClear = document.getElementById("cpClear");
  const minEl = document.getElementById("cpMin");
  const maxEl = document.getElementById("cpMax");

  function applyFilters(){
    const cat = document.querySelector('input[name="cpCat"]:checked')?.value || "";
    const min = minEl.value ? parseFloat(minEl.value) : null;
    const max = maxEl.value ? parseFloat(maxEl.value) : null;

    [...products.querySelectorAll(".cp-card")].forEach(card=>{
      const catTxt = card.querySelector("span.uppercase")?.textContent?.trim() || "";
      const price = (() => {
        const n = card.querySelector(".tracking-tight")?.textContent || "0";
        return parseFloat(n.replace(/,/g,"")) || 0;
      })();

      const okCat = cat ? (catTxt === cat) : true;
      const okMin = (min!==null) ? price >= min : true;
      const okMax = (max!==null) ? price <= max : true;

      card.style.display = (okCat && okMin && okMax) ? "" : "none";
    });
  }

  btnApply?.addEventListener("click", ()=>{ if(!isMobile()) return; applyFilters(); closeAll(); });
  btnClear?.addEventListener("click", ()=>{
    if(!isMobile()) return;
    document.querySelector('input[name="cpCat"][value=""]')?.click();
    minEl.value = ""; maxEl.value = "";
    [...products.querySelectorAll(".cp-card")].forEach(card=> card.style.display = "");
  });

  // al pasar a desktop, cerrar y limpiar estado móvil
  window.addEventListener("resize", ()=>{
    if(!isMobile()){
      closeAll();
      products.classList.remove("view-list");
      btnGrid?.classList.add("is-active");
      btnList?.classList.remove("is-active");
    }
  });

})();
</script>

</body>
</html>
