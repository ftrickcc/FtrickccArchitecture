<div id="nosotros" class="container mx-auto px-4 py-12 lg:py-16 xl:py-20">
    <!-- Sección Principal -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 items-center">
        <!-- Imagen -->
        <div class="relative group order-2 md:order-1">
            <div class="overflow-hidden rounded-xl shadow-2xl transform transition duration-500 hover:scale-105 hover:shadow-3xl">
                <img src="{{ asset('img/img_nosotros.png') }}" alt="Nosotros" 
                     class="w-full h-auto object-cover transition duration-500 group-hover:scale-110">
            </div>
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        </div>

        <!-- Texto -->
        <div class="order-1 md:order-2 space-y-6 lg:space-y-8">
            <div class="space-y-4">
                <p class="text-blue-600 uppercase tracking-wider font-semibold text-sm lg:text-base animate-fade-in">
                    Sobre nosotros
                </p>
                <h2 class="text-3xl md:text-4xl xl:text-5xl font-bold text-gray-900 relative">
                    <span class="bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent">
                        Innovación en construcción
                    </span>
                    <div class="w-24 h-1 bg-blue-100 mt-4 animate-underline-expand"></div>
                </h2>
                <p class="text-gray-600 text-base lg:text-lg leading-relaxed">
                    Más de una década transformando proyectos en realidades sostenibles
                </p>
            </div>

            <!-- Misión y Visión -->
            <div class="space-y-6 lg:space-y-8">
                <div class="flex items-start space-x-4 transform transition hover:scale-[1.02]">
                    <div class="bg-blue-100 p-3 rounded-xl animate-icon-bounce">
                        <span class="text-2xl">🚀</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Nuestra Misión</h3>
                        <p class="text-gray-600 text-sm lg:text-base">
                            Impulsar el desarrollo urbano con soluciones inteligentes y sustentables
                        </p>
                    </div>
                </div>

                <div class="flex items-start space-x-4 transform transition hover:scale-[1.02]">
                    <div class="bg-blue-100 p-3 rounded-xl animate-icon-bounce delay-200">
                        <span class="text-2xl">👁️</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Nuestra Visión</h3>
                        <p class="text-gray-600 text-sm lg:text-base">
                            Ser referentes en ingeniería innovadora para Latinoamérica 2030
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 lg:gap-8 mt-12 lg:mt-16">
        @foreach([
            ['count' => 150, 'label' => 'Proyectos'],
            ['count' => 10, 'label' => 'Años'],
            ['count' => 25, 'label' => 'Clientes'],
            ['count' => 15, 'label' => 'Especialistas']
        ] as $item)
        <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
            <p class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">
                +<span class="counter" data-count="{{ $item['count'] }}">0</span>
            </p>
            <p class="text-gray-600 text-sm lg:text-base font-medium">
                {{ $item['label'] }}
            </p>
        </div>
        @endforeach
    </div>
</div>

<style>
    @keyframes underline-expand {
        0% { width: 0; }
        100% { width: 100px; }
    }
    
    @keyframes icon-bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    .animate-underline-expand {
        animation: underline-expand 1s ease-out forwards;
    }

    .animate-icon-bounce {
        animation: icon-bounce 2s ease-in-out infinite;
    }

    .delay-200 {
        animation-delay: 200ms;
    }

    @media (max-width: 768px) {
        #nosotros {
            padding-top: 4rem;
            padding-bottom: 4rem;
        }
        
        .counter {
            font-size: 2rem;
        }
        
        .text-3xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }
    }
</style>