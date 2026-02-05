document.addEventListener('DOMContentLoaded', () => {

  // ===== Favoritos: toggle + persistencia por ID =====
  const favKey = (id) => `fav_${id}`;

  // Al cargar: aplicar estado guardado
  document.querySelectorAll('.fav-btn').forEach(btn => {
    const id = btn.dataset.id;
    if (!id) return;

    if (localStorage.getItem(favKey(id)) === '1') {
      btn.classList.add('is-active');
    }
  });

  // Clicks delegados (no falla aunque cambien cards)
  document.addEventListener('click', (e) => {

    // ---- Favorito ----
    const favBtn = e.target.closest('.fav-btn');
    if (favBtn) {
      e.preventDefault();

      const id = favBtn.dataset.id;
      if (!id) return;

      favBtn.classList.toggle('is-active');
      localStorage.setItem(favKey(id), favBtn.classList.contains('is-active') ? '1' : '0');

      // animación pop
      favBtn.animate(
        [{ transform: 'scale(1)' }, { transform: 'scale(1.12)' }, { transform: 'scale(1)' }],
        { duration: 220, easing: 'ease-out' }
      );
      return;
    }

    // ---- Carrito ----
    const cartBtn = e.target.closest('.cart-btn');
    if (cartBtn) {
      e.preventDefault();

      cartBtn.classList.add('is-bounce');
      setTimeout(() => cartBtn.classList.remove('is-bounce'), 160);

      const icon = cartBtn.querySelector('img');
      if (icon) {
        icon.animate(
          [{ transform: 'scale(1)' }, { transform: 'scale(1.18)' }, { transform: 'scale(1)' }],
          { duration: 200, easing: 'ease-out' }
        );
      }
    }

  });

});
