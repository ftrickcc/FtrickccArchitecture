<!-- Navegación -->
<nav class="w-full z-50 bg-white shadow-md">
  <!-- Barra superior con dirección y fondo degradado -->
  <div class="w-full bg-gradient-to-r bg-blue-600 text-white">
    <div class="w-full px-4 py-2 flex items-center space-x-2 sm:space-x-4">
      <i class="fas fa-map-marker-alt animate-bounce"></i>
      <span class="animate-fade-in text-xs sm:text-sm">
        Jr. Tacna 920, Esquina con Jr. Huánuco, Huancayo - Junín
      </span>
    </div>
  </div>

  <!-- Contenedor principal del menú -->
  <div class="w-full bg-white shadow-md">
    <div class="w-full flex items-center justify-between px-4 py-3">
      <!-- Logo y título -->
      <a href="#inicio" class="flex items-center group mx-4 sm:mx-6 lg:mx-10">
        <img 
          class="h-10 sm:h-12 lg:h-14 transition-transform duration-300 group-hover:scale-105 border-none outline-none" 
          src="{{ asset('img/logo.png') }}" 
          alt="Logo" 
        />
        <div class="flex flex-col ml-3">
          <span class="text-black font-bold text-lg sm:text-xl lg:text-2xl transition-all duration-300 group-hover:text-blue-600">
            F'TRICK
          </span>
          <span class="text-blue-600 font-semibold text-[8px] sm:text-[10px] lg:text-xs tracking-wide uppercase">
            Consultora y Constructora
          </span>
        </div>
      </a>

      <!-- Botón hamburguesa para móviles/tablets -->
      <button 
        id="menu-toggle" 
        class="flex items-center text-blue-600 cursor-pointer focus:outline-none lg:hidden"
      >
        <svg 
          class="w-6 h-6 transition-transform duration-300 hover:scale-110" 
          fill="none" 
          stroke="currentColor" 
          viewBox="0 0 24 24"
        >
          <path 
            stroke-linecap="round" 
            stroke-linejoin="round" 
            stroke-width="2" 
            d="M4 6h16M4 12h16M4 18h16"
          ></path>
        </svg>
      </button>

      <!-- Menú de navegación para laptops/desktops (lg+) -->
      <div class="hidden lg:flex items-center space-x-6 xl:space-x-8 mr-6 xl:mr-10">
        <a href="{{ url('/#nosotros') }}" class="group flex items-center text-black hover:text-blue-600 transition duration-300">
          <p class="ml-2 transition-transform duration-300 group-hover:scale-105 text-sm xl:text-base">Nosotros</p>
        </a>
        <a href="{{ url('/#servicios') }}" class="group flex items-center text-black hover:text-blue-600 transition duration-300">
          <p class="ml-2 transition-transform duration-300 group-hover:scale-105 text-sm xl:text-base">Servicios</p>
        </a>
        <a href="{{ url('/#eleccion') }}" class="group flex items-center text-black hover:text-blue-600 transition duration-300">
          <p class="ml-2 transition-transform duration-300 group-hover:scale-105 text-sm xl:text-base">¿Por qué elegirnos?</p>
        </a>
        <a href="{{ url('/#contacto') }}" class="group flex items-center text-black hover:text-blue-600 transition duration-300">
          <p class="ml-2 transition-transform duration-300 group-hover:scale-105 text-sm xl:text-base">Contáctenos</p>
        </a>
        <a href="{{ url('/admin') }}" class="ml-4">
          <button class="bg-gradient-to-r from-blue-600 to-blue-500 text-white flex items-center px-4 py-2.5 rounded-lg 
                      transition-all duration-300 hover:from-blue-700 hover:to-blue-600 hover:shadow-md 
                      active:scale-95">
            <img src="{{ asset('icons/intranet.svg') }}" alt="Intranet" class="w-5 h-5 filter brightness-0 invert">
            <span class="ml-2 text-sm font-semibold">Dashboard</span>
          </button>
        </a>
      </div>
    </div>
  </div>

  <!-- Menú móvil/tablet -->
  <div id="mobile-menu" class="hidden lg:hidden bg-white shadow-lg border-t border-gray-100">
    <div class="w-full px-4 py-4 space-y-3">
      <a href="#inicio" class="flex items-center text-black hover:text-blue-600 transition duration-300">
        <p class="ml-2 text-sm font-medium">Nosotros</p>
      </a>
      <a href="#nosotros" class="flex items-center text-black hover:text-blue-600 transition duration-300">
        <p class="ml-2 text-sm font-medium">Servicios</p>
      </a>
      <a href="#eleccion" class="flex items-center text-black hover:text-blue-600 transition duration-300">
        <p class="ml-2 text-sm font-medium">Contáctenos</p>
      </a>
      <a href="#contacto" class="flex items-center text-black hover:text-blue-600 transition duration-300">
        <p class="ml-2 text-sm font-medium">Contáctenos</p>
      </a>
      <div class="pt-2 border-t border-gray-100">
        <a href="{{ url('/admin') }}" class="block w-full">
          <button class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white flex items-center justify-center px-4 py-3 rounded-lg 
                      transition-all duration-300 hover:from-blue-700 hover:to-blue-600 hover:shadow-md 
                      active:scale-95">
            <img src="{{ asset('icons/intranet.svg') }}" alt="Intranet" class="w-5 h-5 filter brightness-0 invert">
            <span class="ml-2 text-sm font-semibold">Dashboard</span>
          </button>
        </a>
      </div>
    </div>
  </div>
</nav>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });

    document.querySelectorAll('#mobile-menu a').forEach(link => {
      link.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
      });
    });

    window.addEventListener('scroll', () => {
      mobileMenu.classList.add('hidden');
    });
  });
</script>