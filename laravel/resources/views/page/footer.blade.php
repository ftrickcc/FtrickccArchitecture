<footer class="bg-gradient-to-r from-blue-600 to-blue-400 text-white py-8">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
      <!-- Logo y Nombre -->
      <div class="flex flex-col items-center md:items-start">
        <a href="#inicio" class="flex items-center group mx-4 sm:mx-6 lg:mx-10">
        <img 
          class="h-10 sm:h-12 lg:h-14 transition-transform duration-300 group-hover:scale-105 border-none outline-none" 
          src="{{ asset('img/logo.png') }}" 
          alt="Logo" 
        />
        <div class="flex flex-col ml-3">
          <span class="text-black font-bold text-lg sm:text-xl lg:text-2xl transition-all duration-300 group-hover:text-white">
            F'TRICK
          </span>
          <span class="text-white font-semibold text-[8px] sm:text-[10px] lg:text-xs tracking-wide uppercase">
            Consultora y Constructora
          </span>
        </div>
      </a>

      </div>

      <!-- Menú de Navegación -->
      <div class="animate-fade-in delay-200">
    <h3 class="text-lg font-semibold mb-3">Menú</h3>
    <div class="grid grid-cols-2 gap-4">
        <ul class="space-y-2">
            <li>
                <a href="{{ url('/') }}" class="hover:underline hover:text-blue-200 transition duration-300">
                    Inicio
                </a>
            </li>
            <li>
                <a href="{{ url('/#nosotros') }}" class="hover:underline hover:text-blue-200 transition duration-300">
                    Nosotros
                </a>
            </li>
            <li>
                <a href="{{ url('/#servicios') }}" class="hover:underline hover:text-blue-200 transition duration-300">
                    Servicios
                </a>
            </li>
        </ul>
        
        <ul class="space-y-2">
            <li>
                <a href="{{ url('/#eleccion') }}" class="hover:underline hover:text-blue-200 transition duration-300">
                  ¿Por qué elegirnos?
                </a>
            </li>
            <li>
                <a href="{{ url('/#clientes') }}" class="hover:underline hover:text-blue-200 transition duration-300">
                    Clientes
                </a>
            </li>
            <li>
                <a href="{{ url('/#equipo') }}" class="hover:underline hover:text-blue-200 transition duration-300">
                    Equipo
                </a>
            </li>
        </ul>
    </div>
</div>

      <!-- Información de Contacto -->
      <div class="animate-fade-in delay-400">
        <h3 class="text-lg font-semibold mb-3">Contáctanos</h3>
        <p class="transition hover:text-blue-200 duration-300">
          📞 064 399724 - 942888822
        </p>
        <p class="transition hover:text-blue-200 duration-300">
          📍 Jr. Tacna 920, Esquina con Jr. Huánuco, Huancayo - Junín
        </p>
        <p class="transition hover:text-blue-200 duration-300">
          📧 
          <a href="mailto:masingenierosgc@gmail.com" class="underline">
            masingenierosgc@gmail.com
          </a>
        </p>
      </div>
    </div>

    <!-- Línea divisoria -->
    <hr class="border-white my-6" />

    <!-- Derechos reservados -->
    <div class="text-center text-sm">
      <p>Todos los derechos reservados © F’TRICK 2024</p>
    </div>
  </div>
</footer>

<style>
  /* Animación de fade in para elementos del footer */
  @keyframes fadeIn {
    0% {
      opacity: 0;
      transform: translateY(10px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }
  .animate-fade-in {
    animation: fadeIn 1.5s ease-out forwards;
  }
  .delay-200 {
    animation-delay: 0.2s;
  }
  .delay-400 {
    animation-delay: 0.4s;
  }
</style>
