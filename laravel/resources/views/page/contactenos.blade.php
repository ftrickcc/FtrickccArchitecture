<div id="contacto" class="pt-30 pb-20 min-h-screen container mx-auto  sm:px-20 flex flex-col items-center space-y-12 relative">

  <!-- Fondo dinámico con degradado -->
  <div class="absolute inset-0 bg-gradient-to-br from-blue-100 to-white opacity-50"></div>

  <!-- Título en Azul Arriba -->
  <h2 class="text-3xl mb-3 sm:text-4xl font-bold text-blue-600 text-center animate-pulse relative">
    Contáctanos
  </h2>

  <!-- Contenedor Principal -->
  <div class="w-full max-w-4xl bg-white shadow-xl rounded-lg p-8 space-y-6 relative border border-gray-200">

    <!-- Iconos decorativos a los lados -->
    <div class="absolute top-4 left-4 text-blue-300 text-4xl animate-bounce">📩</div>
    <div class="absolute bottom-4 right-4 text-blue-300 text-4xl animate-bounce">💬</div>

    <p class="text-gray-700 text-center text-lg">
      ¿Tienes preguntas o necesitas asesoramiento? <br> Déjanos tu mensaje y te responderemos lo antes posible.
    </p>

    <form action="#" method="POST" class="space-y-4">
      <div class="flex flex-col space-y-4">

        <div class="relative">
          <input type="text" placeholder="Nombre" class="w-full p-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
          <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-blue-400 text-xl">👤</span>
        </div>

        <div class="relative">
          <input type="email" placeholder="Correo Electrónico" class="w-full p-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none">
          <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-blue-400 text-xl">📧</span>
        </div>

        <div class="relative">
          <textarea placeholder="Tu Mensaje" rows="5" class="w-full p-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none"></textarea>
          <span class="absolute left-4 top-4 text-blue-400 text-xl">✍️</span>
        </div>

      </div>
      
      <button class="w-full bg-gradient-to-r from-blue-600 to-blue-400 text-white font-bold py-3 rounded-lg shadow-lg transition transform duration-300 ease-in-out hover:scale-105 hover:from-blue-700 hover:to-blue-500">
        Enviar Mensaje
      </button>
    </form>
  </div>
</div>

<style>
  /* Animación Pulse para el título */
  @keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.85; }
  }
  .animate-pulse {
    animation: pulse 2s infinite;
  }

  /* Bounce para los iconos decorativos */
  @keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
  }
  .animate-bounce {
    animation: bounce 1.5s infinite;
  }

  /* Transiciones suaves para los inputs */
  input, textarea {
    transition: all 0.3s ease-in-out;
  }
</style>
