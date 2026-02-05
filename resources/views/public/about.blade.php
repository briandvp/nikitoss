<x-public-layout>
    <!-- Hero Section -->
    <div class="relative h-[400px] flex items-center justify-center overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('img/about/6852da0d59961.png') }}" alt="Nikitos Factory" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <div class="relative z-10 text-center px-4">
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-4 italic">Nosotros</h1>
            <p class="text-white/90 text-xl max-w-2xl mx-auto">40 años llevando sabor y alegría a los hogares argentinos.</p>
        </div>

        <!-- Wavy Bottom Border -->
        <div class="absolute bottom-0 left-0 w-full leading-none z-20">
            <svg class="block w-full h-[50px] sm:h-[80px]" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="#F9FAFB"></path>
            </svg>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-gray-50 pb-20 pt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Quiénes somos Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
                <div class="order-1">
                    <h2 class="text-4xl font-bold text-gray-900 mb-8">¿Quiénes somos?</h2>

                    <h3 class="text-xl font-bold text-gray-800 mb-6">
                        Nikitos se encuentra presente en el mercado local desde hace 40 años.
                    </h3>

                    <div class="prose prose-lg text-gray-600 space-y-6">
                        <p>
                            Actualmente cuenta con un amplio portfolio de snacks, tales como Pizzitos,
                            Palitos salados, Maikitos de Queso, Papas Fritas, Cereales, Pochochos
                            Acaramelados, Bolitas/Aritos dulces, y Jugos para Congelar. El objetivo es llegar
                            a los consumidores con ingredientes naturales y más saludables, contando con
                            presencia de venta en todo el país y calidad de atención de excelencia.
                        </p>
                        <p>
                            Trabajamos junto a nuestros colaboradores enérgicamente en la producción y
                            desarrollo de nuevos productos creados específicamente para satisfacer los
                            gustos y tendencias de los consumidores, para llegar a ser la compañía local de
                            alimentos y bebidas, que sobresale por su calidad y precios bajos.
                        </p>
                    </div>
                </div>
                <div class="order-2 relative group">
                    <div class="rounded-3xl overflow-hidden shadow-2xl transform transition-all duration-500 hover:scale-[1.02]">
                        <img src="{{ asset('img/about/681279bdd5803.png') }}" alt="Planta de producción" class="w-full h-full object-cover">
                    </div>
                    <!-- Decorative element -->
                    <div class="absolute -z-10 top-10 -right-10 w-full h-full bg-nikitos-orange/10 rounded-3xl transform rotate-3 transition-transform group-hover:rotate-6"></div>
                </div>
            </div>

            <!-- Image Gallery -->
            <div class="mb-20">
                <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Nuestras Instalaciones</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Gallery Item 1 -->
                    <div class="rounded-2xl overflow-hidden shadow-lg h-64 group cursor-pointer relative">
                        <img src="{{ asset('img/about/681277b2a73c2.png') }}" alt="Instalaciones 1" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300"></div>
                    </div>
                    <!-- Gallery Item 2 -->
                    <div class="rounded-2xl overflow-hidden shadow-lg h-64 group cursor-pointer relative">
                        <img src="{{ asset('img/about/6812780ce64e5.png') }}" alt="Instalaciones 2" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300"></div>
                    </div>
                    <!-- Gallery Item 3 -->
                    <div class="rounded-2xl overflow-hidden shadow-lg h-64 group cursor-pointer relative">
                        <img src="{{ asset('img/about/681279db1d1d8.png') }}" alt="Instalaciones 3" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300"></div>
                    </div>
                </div>
            </div>

            <!-- Values Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 text-center transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-orange-100 text-nikitos-orange rounded-full flex items-center justify-center mx-auto mb-6 text-2xl">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Nuestra Misión</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Llegar a los consumidores con ingredientes de calidad, contando con presencia de venta en todo el país.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 text-center transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-purple-100 text-nikitos-purple rounded-full flex items-center justify-center mx-auto mb-6 text-2xl">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Calidad</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Seleccionamos cuidadosamente cada ingrediente para asegurar el mejor sabor y frescura en nuestros productos.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 text-center transform hover:-translate-y-1">
                    <div class="w-16 h-16 bg-blue-100 text-blue-500 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Servicio</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Brindamos una atención de excelencia a nuestros clientes y distribuidores, construyendo relaciones duraderas.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>