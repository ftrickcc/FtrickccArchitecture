<div id="servicios" class="min-h-screen container mx-auto px-4 py-12 flex flex-col items-center">
  <div class="max-w-7xl w-full">
    <!-- Título -->
    <div class="text-center mb-16">
      <p class="text-blue-600 uppercase tracking-widest font-semibold text-sm mb-4 animate-fade-in">
        Servicios Expertos
      </p>
      <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6 relative inline-block">
        <span class="bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent">
          Soluciones Integrales
        </span>
        <div class="absolute bottom-0 left-0 w-full h-1 bg-blue-100 animate-underline"></div>
      </h2>
      <p class="text-gray-600 text-lg max-w-2xl mx-auto mt-4">
        Innovación y experiencia combinadas para cada fase de tu proyecto constructivo
      </p>
    </div>

    <!-- Grid de Servicios -->
    <!-- Aquí se usan grid-cols-1 para móviles y tablets (md) y grid-cols-4 a partir de pantallas grandes (lg) -->
    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-4 gap-8">
      <!-- Tarjeta Servicio -->
      <div class="relative group transform transition-all duration-300 hover:-translate-y-2">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-100 to-white opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity duration-300"></div>
        <div class="relative text-center p-8 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-blue-50">
          <div class="mb-6 inline-block transform transition-all duration-300 group-hover:scale-110">
            <div class="text-blue-600 text-5xl mb-4 animate-icon-hover">📜</div>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-4">Gerencia de Proyectos</h3>
          <p class="text-gray-600 text-sm leading-relaxed mb-6">
            Liderazgo experto desde el concepto hasta la entrega final, optimizando recursos y tiempos.
          </p>
          <a href="#" class="inline-flex items-center text-blue-600 font-medium group-hover:text-blue-700 transition-colors">
            Descubre más
            <span class="ml-2 opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 transition-all">→</span>
          </a>
        </div>
      </div>

      <!-- Supervisión de Obras -->
      <div class="relative group transform transition-all duration-300 hover:-translate-y-2">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-100 to-white opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity duration-300"></div>
        <div class="relative text-center p-8 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-blue-50">
          <div class="mb-6 inline-block transform transition-all duration-300 group-hover:animate-bounce">
            <div class="text-blue-600 text-5xl mb-4">👷‍♂️</div>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-4">Supervisión de Obras</h3>
          <p class="text-gray-600 text-sm leading-relaxed mb-6">
            Control técnico permanente garantizando estándares de calidad y seguridad óptimos.
          </p>
          <a href="#" class="inline-flex items-center text-blue-600 font-medium group-hover:text-blue-700 transition-colors">
            Conoce más
            <span class="ml-2 opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 transition-all">→</span>
          </a>
        </div>
      </div>

      <!-- Consultoría Inmobiliaria -->
      <div class="relative group transform transition-all duration-300 hover:-translate-y-2">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-100 to-white opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity duration-300"></div>
        <div class="relative text-center p-8 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-blue-50">
          <div class="mb-6 inline-block transform transition-all duration-300 group-hover:rotate-12">
            <div class="text-blue-600 text-5xl mb-4">🔄</div>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-4">Consultoría Inmobiliaria</h3>
          <p class="text-gray-600 text-sm leading-relaxed mb-6">
            Estrategias inteligentes para maximizar el retorno de tu inversión inmobiliaria.
          </p>
          <a href="#" class="inline-flex items-center text-blue-600 font-medium group-hover:text-blue-700 transition-colors">
            Explora opciones
            <span class="ml-2 opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 transition-all">→</span>
          </a>
        </div>
      </div>

      <!-- Expedientes Técnicos -->
      <div class="relative group transform transition-all duration-300 hover:-translate-y-2">
        <div class="absolute inset-0 bg-gradient-to-b from-blue-100 to-white opacity-0 group-hover:opacity-100 rounded-2xl transition-opacity duration-300"></div>
        <div class="relative text-center p-8 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-blue-50">
          <div class="mb-6 inline-block transform transition-all duration-300 group-hover:skew-y-3">
            <div class="text-blue-600 text-5xl mb-4">📑</div>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-4">Expedientes Técnicos</h3>
          <p class="text-gray-600 text-sm leading-relaxed mb-6">
            Documentación técnica precisa y detallada para una ejecución impecable.
          </p>
          <a href="#" class="inline-flex items-center text-blue-600 font-medium group-hover:text-blue-700 transition-colors">
            Más detalles
            <span class="ml-2 opacity-0 group-hover:opacity-100 transform -translate-x-1 group-hover:translate-x-0 transition-all">→</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  @keyframes icon-hover {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-5px); }
  }
  .animate-icon-hover {
      animation: icon-hover 3s ease-in-out infinite;
  }
  .animate-underline {
      animation: underline-grow 1s ease-out forwards;
  }
  @keyframes underline-grow {
      from { width: 0; }
      to { width: 100%; }
  }
</style>
