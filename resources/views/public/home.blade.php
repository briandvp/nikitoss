<x-public-layout>
    <!-- Hero Section -->
    <section class="relative h-screen min-h-[600px] flex items-center overflow-hidden bg-black">
        <!-- Background Video (Extended) -->
        <div class="absolute inset-0">
            <video autoplay muted loop playsinline class="w-full h-full object-cover">
                <source src="{{ asset('img/67f95d48803ddb.mp4') }}" type="video/mp4">
            </video>
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/40"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="text-white max-w-xl">
                <h1 class="text-5xl md:text-7xl font-bold mb-4 italic">Nikitos Snacks</h1>
                <p class="text-lg md:text-xl mb-8 opacity-90">Nikitos se encuentra presente en el mercado local desde hace 40 años.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="#products" class="bg-white text-gray-900 px-8 py-3 rounded-full font-bold flex items-center hover:bg-gray-100 transition-colors">
                        Descargar catálogo
                        <i class="fas fa-chevron-right ml-2"></i>
                    </a>
                    <a href="#products" class="border-2 border-white/50 text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-gray-900 transition-colors">
                        Ver productos
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white animate-bounce z-10">
            <i class="fas fa-chevron-down text-2xl"></i>
        </div>
    </section>

    <!-- Nosotros Section (Overlays video above and products below) -->
    <section id="about" class="relative -mt-60 z-30 mb-[-80px]" style="background: url('{{ asset('img/680fa21234807.png') }}') center / 100% 100% no-repeat;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="max-w-xl">
                <div class="text-white">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 italic">Nosotros</h2>
                    <p class="text-lg mb-4">
                        Nikitos se encuentra presente en el mercado local desde hace 40 años.
                        Ofreciendo un variado portafolio de snacks, tales como Pizzitos, Palitos
                        salados, Malikitos de Queso, Papas Fritas, Cereales, Pochochos
                        acaramelados, Bolitas/Aritos dulces, y Jugos para Congelar.
                    </p>
                    <p class="text-lg mb-8">
                        El objetivo es llegar a los consumidores con ingredientes de calidad, contando con
                        presencia de venta en todo el país y atención de excelencia.
                    </p>
                    <a href="#" class="inline-flex items-center bg-white text-nikitos-orange font-semibold px-6 py-3 rounded-full hover:bg-gray-100 transition-colors">
                        Más info
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Lines/Categories Section -->
    <section id="categories" class="relative pt-32 pb-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-900 mb-12">Líneas de productos</h2>

            @php
            $productLines = [
            [
            'name' => 'Tradicional Escolar',
            'image' => 'img/product-line/6852bfb8b4587.png',
            'color' => '#E91E8C'
            ],
            [
            'name' => 'Juvenil Metalizada',
            'image' => 'img/product-line/6852bfc053969.png',
            'color' => '#F8A0B0'
            ],
            [
            'name' => 'Linea Max',
            'image' => 'img/product-line/6852bfcb2d9cf.png',
            'color' => '#C86DD7'
            ],
            [
            'name' => 'Premium Max 120g',
            'image' => 'img/product-line/6852bfdcc16da.png',
            'color' => '#2ECC71'
            ]
            ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($productLines as $line)
                <div class="rounded-3xl overflow-hidden transform hover:scale-105 transition-transform duration-300 cursor-pointer"
                    style="background-color: {{ $line['color'] }}">
                    <div class="p-6 flex flex-col items-center text-center">
                        <!-- Product Image -->
                        <div class="h-40 flex items-center justify-center mb-4">
                            <img src="{{ asset($line['image']) }}"
                                alt="{{ $line['name'] }}"
                                class="max-h-full object-contain">
                        </div>
                        <!-- Title -->
                        <h3 class="text-white text-lg font-bold mb-4 leading-tight">{{ $line['name'] }}</h3>
                        <!-- Link -->
                        <a href="#products" class="text-white hover:underline font-medium text-sm">
                            Ver todos
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Ver todas button -->
            <div class="text-center mt-10">
                <a href="#products" class="inline-flex items-center bg-white border border-gray-300 text-gray-700 font-medium px-8 py-3 rounded-full hover:bg-gray-50 transition-colors">
                    Ver todas
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section id="products" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-900 mb-12">Productos destacados</h2>

            @php
            $featuredProducts = [
            [
            'category' => 'TRADICIONAL ESCOLAR',
            'categoryColor' => '#E91E8C',
            'name' => 'Pizzitos de Jamón y Queso',
            'image' => 'img/featured products/68485089c5110.png'
            ],
            [
            'category' => 'JUVENIL METALIZADA',
            'categoryColor' => '#F8A0B0',
            'name' => 'Jugos para Congelar',
            'image' => 'img/featured products/68485241216a3.png'
            ],
            [
            'category' => 'LÍNEA MAX',
            'categoryColor' => '#C86DD7',
            'name' => 'Tapitas Sabor Barbacoa',
            'image' => 'img/featured products/685d8e0c3c9a4.png'
            ],
            [
            'category' => 'FAMILIAR',
            'categoryColor' => '#2ECC71',
            'name' => 'Pochoclo Acaramelado',
            'image' => 'img/featured products/691c9a7631b85.png'
            ]
            ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredProducts as $product)
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <!-- Product Image -->
                    <div class="p-6 flex items-center justify-center h-48 bg-white">
                        <img src="{{ asset($product['image']) }}"
                            alt="{{ $product['name'] }}"
                            class="max-h-full object-contain">
                    </div>
                    <!-- Product Info -->
                    <div class="p-4 text-center border-t border-gray-100">
                        <span class="text-xs font-bold uppercase tracking-wider" style="color: {{ $product['categoryColor'] }}">
                            {{ $product['category'] }}
                        </span>
                        <h3 class="text-lg font-bold text-gray-900 mt-1 mb-2">{{ $product['name'] }}</h3>
                        <a href="#" class="text-gray-500 text-sm hover:text-nikitos-orange transition-colors">
                            Ver producto
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Recipes Section -->
    <section id="recipes" class="pt-20 pb-8" style="background-color: #f3f4f6;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-900 mb-12">Recetas</h2>

            @php
            $recipes = [
            [
            'name' => 'Nachos de tacos en sartén',
            'image' => 'img/recipes/6814fae8a7194.png'
            ],
            [
            'name' => 'Barritas mágicas con papas fritas corte clásico',
            'image' => 'img/recipes/6814fbf71298e.png'
            ],
            [
            'name' => 'Sándwich de pollo empanizado con papas fritas',
            'image' => 'img/recipes/6852b20b863c3.png'
            ]
            ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($recipes as $recipe)
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300">
                    <!-- Recipe Image -->
                    <div class="aspect-[4/3] overflow-hidden">
                        <img src="{{ asset($recipe['image']) }}"
                            alt="{{ $recipe['name'] }}"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <!-- Recipe Info -->
                    <div class="p-6 text-center">
                        <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $recipe['name'] }}</h3>
                        <a href="#" class="text-gray-500 text-sm hover:text-nikitos-orange transition-colors underline">
                            Ver receta
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</x-public-layout>