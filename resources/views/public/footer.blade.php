<footer class="bg-gray-50 text-gray-700 py-14 border-t border-gray-200">
  <div class="container mx-auto px-6 lg:px-12">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">

      {{-- LOGO + DESCRIPCIÓN --}}
      <div class="lg:col-span-1">
        <img src="{{ asset('img/cppp.png') }}"
             alt="ConectaParral"
             class="h-12 w-auto object-contain mb-6">

        <p class="text-gray-500 text-sm leading-relaxed">
          La plataforma oficial para impulsar el comercio de nuestra ciudad.
          Encuentra lo mejor de Parral en un solo lugar.
        </p>

        <div class="flex space-x-4 mt-6">
          <a href="#"
             class="text-gray-400 hover:text-[#1877F2] transition-colors">
            <i class="fab fa-facebook-f text-lg"></i>
          </a>
          <a href="#"
             class="text-gray-400 hover:text-[#E4405F] transition-colors">
            <i class="fab fa-instagram text-lg"></i>
          </a>
        </div>
      </div>

      {{-- MI CUENTA --}}
      <div>
        <h3 class="font-bold text-gray-900 text-sm uppercase mb-6 tracking-wider">
          Mi Cuenta
        </h3>
        <ul class="space-y-3 text-sm">
          <li><a href="#" class="text-gray-500 hover:text-orange-600 transition-colors">Ingresar</a></li>
          <li><a href="#" class="text-gray-500 hover:text-orange-600 transition-colors">Crear Cuenta</a></li>
          <li><a href="#" class="text-gray-500 hover:text-orange-600 transition-colors">Mis Pedidos</a></li>
          <li><a href="#" class="text-gray-500 hover:text-orange-600 transition-colors">Favoritos</a></li>
        </ul>
      </div>

      {{-- OPORTUNIDADES --}}
      <div>
        <h3 class="font-bold text-gray-900 text-sm uppercase mb-6 tracking-wider">
          Oportunidades
        </h3>
        <ul class="space-y-3 text-sm">
          <li><a href="#" class="text-orange-600 font-bold hover:underline">¡Quiero Vender!</a></li>
          <li><a href="#" class="text-gray-500 hover:text-orange-500 transition-colors">Centro de Ayuda</a></li>
          <li><a href="#" class="text-gray-500 hover:text-orange-500 transition-colors">Preguntas Frecuentes</a></li>
        </ul>
      </div>

      {{-- LEGAL --}}
      <div>
        <h3 class="font-bold text-gray-900 text-sm uppercase mb-6 tracking-wider">
          Legal
        </h3>
        <ul class="space-y-3 text-sm text-gray-500">
          <li><a href="#" class="hover:text-orange-500 transition-colors">Términos y Condiciones</a></li>
          <li><a href="#" class="hover:text-orange-500 transition-colors">Aviso de Privacidad</a></li>
          <li><a href="#" class="hover:text-orange-500 transition-colors">Políticas de Envío</a></li>
          <li><a href="#" class="hover:text-orange-500 transition-colors">Políticas de Devolución</a></li>
        </ul>
      </div>

      {{-- CONTACTO + MÉTODOS DE PAGO --}}
      <div>
        <h3 class="font-bold text-gray-900 text-sm uppercase mb-6 tracking-wider">
          Contacto
        </h3>

        <div class="space-y-4 text-sm text-gray-500">

          <p class="flex items-start">
            <i class="fas fa-map-marker-alt mt-1 mr-3 text-orange-500"></i>
            Parral, Chihuahua, México.
          </p>

          {{-- CORREO FUNCIONAL --}}
          <a href="mailto:soporte@conectaparral.com?subject=Soporte%20ConectaParral"
             class="flex items-center text-gray-500 hover:text-orange-500 transition-colors">

            <i class="far fa-envelope mr-3 text-orange-500"></i>
            soporte@conectaparral.com
          </a>

          {{-- MÉTODOS DE PAGO --}}
          <div class="pt-6 border-t border-gray-200">
            <h4 class="text-[10px] font-semibold tracking-widest uppercase text-gray-900 mb-3">
              Aceptamos
            </h4>

            <div class="flex flex-wrap items-center gap-3 mb-4">
              <img src="{{ asset('img/pagos/visa.svg') }}" class="h-6 opacity-80 hover:opacity-100 transition" alt="Visa">
              <img src="{{ asset('img/pagos/mastercard.svg') }}" class="h-6 opacity-80 hover:opacity-100 transition" alt="Mastercard">
              <img src="{{ asset('img/pagos/amex.svg') }}" class="h-6 opacity-80 hover:opacity-100 transition" alt="American Express">
              <img src="{{ asset('img/pagos/oxxo.svg') }}" class="h-6 opacity-80 hover:opacity-100 transition" alt="OXXO">
              <img src="{{ asset('img/pagos/spei.svg') }}" class="h-6 opacity-80 hover:opacity-100 transition" alt="SPEI">
            </div>

            <div class="flex items-center gap-2 border-t border-gray-100 pt-3">
              <span class="text-[9px] font-semibold uppercase tracking-widest text-gray-400">
                Procesado por
              </span>
              <img src="{{ asset('img/pagos/stripe.svg') }}" class="h-6 opacity-90" alt="Stripe">
            </div>

            <p class="mt-2 text-[9px] font-medium italic leading-tight text-gray-400">
              Pagos protegidos con cifrado SSL y estándares PCI-DSS.
            </p>
          </div>
        </div>
      </div>

    </div>

    <div class="border-t border-gray-200 pt-8 mt-12 text-center">
      <p class="text-gray-400 text-xs font-medium italic">
        © 2026 ConectaParral — Todos los derechos reservados.
      </p>
    </div>

  </div>
</footer>
