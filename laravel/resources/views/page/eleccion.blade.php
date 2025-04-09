<div id="eleccion" class="h-screen container mx-auto px-4 py-12 relative overflow-hidden">
    <!-- Efecto de fondo decorativo -->
    <div class="absolute -top-32 -right-20 w-96 h-96 bg-blue-100 rounded-full opacity-20 blur-3xl"></div>
    
    <!-- Contenido principal -->
    <div class="relative z-10">
        <!-- Título y Descripción -->
        <div class="text-center mb-16 space-y-4">
            <h2 class="text-5xl font-bold text-gray-900 animate-slide-up">
                ¿Por qué <span class="bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent">elegirnos</span>?
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto animate-fade-in delay-100">
                Innovación y experiencia unidas para superar tus expectativas
            </p>
            <div class="animate-pop-in delay-300">
                <a href="#" class="mt-6 inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-500 text-white px-8 py-3 rounded-full text-lg font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                    <span>Contáctanos</span>
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Grid de Beneficios -->
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Tarjeta 1 -->
            <div class="group relative bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                <div class="relative flex items-start space-x-6">
                    <div class="flex-shrink-0">
                        <div class="bg-blue-100 p-4 rounded-xl animate-bounce-slow">
                            <span class="text-3xl">🏗️</span>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">+10 Años de Experiencia</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Soluciones de ingeniería probadas en más de 150 proyectos exitosos
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="group relative bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                <div class="relative flex items-start space-x-6">
                    <div class="flex-shrink-0">
                        <div class="bg-blue-100 p-4 rounded-xl animate-spin-slow">
                            <span class="text-3xl">👷‍♂️</span>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Equipo Especializado</h3>
                        <p class="text-gray-600 leading-relaxed">
                            +30 profesionales multidisciplinarios trabajando en sinergia
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3 -->
            <div class="group relative bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                <div class="relative flex items-start space-x-6">
                    <div class="flex-shrink-0">
                        <div class="bg-blue-100 p-4 rounded-xl animate-pulse">
                            <span class="text-3xl">💡</span>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Innovación Constante</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Tecnología BIM y metodologías ágiles para máxima eficiencia
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 4 -->
            <div class="group relative bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                <div class="relative flex items-start space-x-6">
                    <div class="flex-shrink-0">
                        <div class="bg-blue-100 p-4 rounded-xl animate-check-scale">
                            <span class="text-3xl">✅</span>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Calidad Certificada</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Sistemas de gestión ISO 9001:2015 en todos nuestros procesos
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes slide-up {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes bounce-slow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    @keyframes spin-slow {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    @keyframes check-scale {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }
    
    .animate-slide-up { animation: slide-up 0.8s ease-out; }
    .animate-fade-in { animation: fade-in 1s ease-out; }
    .animate-pop-in { animation: pop-in 0.5s ease-out; }
    .animate-bounce-slow { animation: bounce-slow 3s infinite; }
    .animate-spin-slow { animation: spin-slow 20s linear infinite; }
    .animate-check-scale { animation: check-scale 2s ease-in-out infinite; }
    .delay-100 { animation-delay: 100ms; }
    .delay-300 { animation-delay: 300ms; }
</style>