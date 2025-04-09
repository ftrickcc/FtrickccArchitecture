<div id="headerid" class="header flex items-center justify-center px-4 min-h-[300px] md:min-h-[550px] lg:min-h-[610px] relative"   
     style="background: url('{{ asset('img/peakpx.jpg') }}') no-repeat center center/cover;">
  <!-- Overlay modificado -->
  <div class="absolute inset-0 bg-black/30"></div>
  
  <div class="fade-in-slogan flex flex-col items-center text-center relative w-full sm:px-6 md:w-2/3 lg:w-1/2">
    
    <!-- Título original -->
    <h1 class="mb-6 md:mt-20 font-bold text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-white relative">
      <span class="bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent animate-pulse">
        "La opción inteligente para tus proyectos"
      </span>
    </h1>

    <!-- Descripción original -->
    <p class="text-white text-lg sm:text-xl md:text-2xl font-light mb-4 sm:mb-6 md:mt-20 animate-fade-in delay-200">
      Brindamos soluciones integrales en consultoría y construcción con los más 
      altos estándares de calidad, seguridad e innovación. Nuestro compromiso es 
      hacer realidad tu visión con excelencia y profesionalismo.
    </p>
    
    <!-- Botón original -->
    <button 
      onclick="window.location.href='#servicios'" 
      class="mt-6 sm:mt-8 md:mt-10 bg-gradient-to-r from-blue-600 to-blue-400 hover:from-blue-700 hover:to-blue-500 text-white border-2 border-white rounded-lg shadow-lg px-6 py-3 text-lg sm:text-xl md:text-2xl transition-all duration-300 ease-in-out hover:scale-110 focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-80 active:scale-105"
      aria-label="Ir a la sección de servicios"
    >
      Servicios
    </button>
  </div>
</div>

<style>
  .header {
    position: relative;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }

  /* Animación original */
  @keyframes fadeInSlogan {
    0% { margin-top: -500px; opacity: 0; }
    100% { margin-top: 0; opacity: 1; }
  }

  .fade-in-slogan {
    animation: fadeInSlogan 1.5s ease-out forwards;
  }

  /* Mejoras móvil */
  @media (max-width: 640px) {
    .header { 
      min-height: 100vh !important;
      padding-top: 4rem;
    }
    
    .fade-in-slogan { 
      width: 90%;
      padding: 0 1rem;
    }
    
    h1 {
      font-size: 2.5rem !important;
      margin-bottom: 2rem !important;
    }
    
    p {
      font-size: 1.1rem !important;
      margin-bottom: 2rem !important;
    }
    
    button {
      padding: 1rem 2rem;
      font-size: 1.2rem !important;
    }
  }

  /* Tablet */
  @media (min-width: 768px) and (max-width: 1024px) {
    .header { min-height: 550px; }
    .fade-in-slogan { width: 66%; }
    h1 { font-size: 3.5rem !important; }
    p { font-size: 1.4rem !important; }
  }

  /* Animación fadeIn para texto */
  @keyframes fadeIn {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in {
    animation: fadeIn 1.5s ease-out forwards;
  }
</style>