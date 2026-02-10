document.addEventListener('DOMContentLoaded', () => {
  const openSearchBtn  = document.getElementById('openSearchMobile');
  const closeSearchBtn = document.getElementById('closeSearchMobile');
  const searchOverlay  = document.getElementById('searchMobileOverlay');
  const searchInput    = document.getElementById('mobileInput');

  const btnOpenMenu    = document.getElementById('mobileMenuBtn');
  const btnCloseMenu   = document.getElementById('closeSidebar');
  const mobileSidebar  = document.getElementById('mobileSidebar');
  const sidebarOverlay = document.getElementById('sidebarOverlay');

  const cartFloating = document.getElementById('cartFloating'); // por si lo usas después

  /* ==========================================================
     MENÚ LATERAL (SIDEBAR)
     ========================================================== */
  const toggleMenu = (forceClose = false) => {
    if (!mobileSidebar || !sidebarOverlay) return;

    const isOpen = !mobileSidebar.classList.contains('translate-x-full');

    if (forceClose || isOpen) {
      // CERRAR
      mobileSidebar.classList.add('translate-x-full');
      sidebarOverlay.classList.add('hidden', 'pointer-events-none');
      document.body.classList.remove('overflow-hidden');
    } else {
      // ABRIR
      mobileSidebar.classList.remove('translate-x-full');
      sidebarOverlay.classList.remove('hidden', 'pointer-events-none');
      document.body.classList.add('overflow-hidden');
    }
  };

  /* ==========================================================
     BUSCADOR MÓVIL (OVERLAY SUPERIOR)
     ========================================================== */
  const openSearch = (e) => {
    console.log('✅ CLICK lupa móvil detectado');
    if (e) e.preventDefault();
    if (!searchOverlay) return;

    // cierra menú si está abierto
    if (mobileSidebar && !mobileSidebar.classList.contains('translate-x-full')) {
      toggleMenu(true);
    }

    searchOverlay.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');

    // Ocultar carrito flotante si existe
    if (cartFloating) {
      cartFloating.style.opacity = '0';
      cartFloating.style.pointerEvents = 'none';
    }

    // --- FIX teclado móvil (iOS/Android): focus fuerte ---
    if (searchInput) {
      // 1) inmediato (más probabilidad de abrir teclado)
      searchInput.focus({ preventScroll: true });
      searchInput.click();

      // 2) siguiente frame
      requestAnimationFrame(() => {
        searchInput.focus({ preventScroll: true });
        searchInput.click();
      });

      // 3) respaldo por si tarda en renderizar
      setTimeout(() => {
        searchInput.focus({ preventScroll: true });
        searchInput.click();
      }, 120);
    }
  };

  const closeSearch = (e) => {
    console.log('✅ CERRAR buscador móvil');
    if (e) e.preventDefault();
    if (!searchOverlay) return;

    searchOverlay.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');

    if (searchInput) searchInput.value = '';

    // Regresar visibilidad al carrito flotante
    if (cartFloating) {
      cartFloating.style.opacity = '1';
      cartFloating.style.pointerEvents = 'auto';
    }
  };

  /* ==========================================================
     EVENTOS
     ========================================================== */
  if (openSearchBtn)  openSearchBtn.addEventListener('click', openSearch);
  if (closeSearchBtn) closeSearchBtn.addEventListener('click', closeSearch);

  if (btnOpenMenu)  btnOpenMenu.addEventListener('click', () => toggleMenu(false));
  if (btnCloseMenu) btnCloseMenu.addEventListener('click', () => toggleMenu(true));
  if (sidebarOverlay) sidebarOverlay.addEventListener('click', () => toggleMenu(true));

  /* ==========================================================
     TECLA ESC PARA CERRAR
     ========================================================== */
  document.addEventListener('keydown', (e) => {
    if (e.key === "Escape") {
      closeSearch();
      toggleMenu(true);
    }
  });
});