<x-public-layout>
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Nuestras Recetas</h1>
                <p class="text-lg text-gray-600">Descubre deliciosas formas de disfrutar tus snacks favoritos Nikitos.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($recipes as $recipe)
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-300 group">
                    <!-- Recipe Image -->
                    <div class="aspect-[4/3] overflow-hidden relative">
                        <img src="{{ asset($recipe['image']) }}"
                            alt="{{ $recipe['name'] }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>
                    </div>

                    <!-- Recipe Info -->
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $recipe['name'] }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $recipe['description'] }}</p>

                        <div class="mb-6">
                            <h4 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-2">Ingredientes principales:</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($recipe['ingredients'] as $ingredient)
                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-medium">
                                    {{ $ingredient }}
                                </span>
                                @endforeach
                            </div>
                        </div>

                        <a href="{{ $recipe['url'] }}" class="inline-flex items-center text-nikitos-orange font-semibold hover:text-orange-600 transition-colors group-hover:underline">
                            Ver receta completa
                            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-public-layout>