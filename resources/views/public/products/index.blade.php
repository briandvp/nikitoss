<x-public-layout>
    <div x-data="{ activeCategory: 'all' }" class="bg-gray-50 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Nuestros Productos</h1>
                <p class="text-lg text-gray-600">Explora nuestra variedad de snacks para cada momento.</p>
            </div>

            <!-- Category Filter -->
            <div class="flex flex-wrap justify-center mb-12 gap-4">
                <button
                    @click="activeCategory = 'all'"
                    :class="{ 'bg-nikitos-orange text-white': activeCategory === 'all', 'bg-white text-gray-700 hover:bg-gray-100': activeCategory !== 'all' }"
                    class="px-6 py-2 rounded-full font-semibold shadow-sm transition-all duration-200 border border-gray-100">
                    Todos
                </button>
                @foreach($categories as $category)
                <button
                    @click="activeCategory = '{{ $category->id }}'"
                    :class="{ 'bg-nikitos-orange text-white': activeCategory == '{{ $category->id }}', 'bg-white text-gray-700 hover:bg-gray-100': activeCategory != '{{ $category->id }}' }"
                    class="px-6 py-2 rounded-full font-semibold shadow-sm transition-all duration-200 border border-gray-100">
                    {{ $category->name }}
                </button>
                @endforeach
            </div>

            <!-- Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($products as $product)
                <div
                    x-show="activeCategory === 'all' || activeCategory == '{{ $product->category_id }}'"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 group">
                    <!-- Product Image -->
                    <div class="h-64 bg-white p-6 relative flex items-center justify-center">
                        <img src="{{ asset('storage/' . $product->image_url) }}"
                            alt="{{ $product->name }}"
                            class="max-h-full max-w-full object-contain transform group-hover:scale-110 transition-transform duration-500">

                        <!-- Category Badge -->
                        <div class="absolute top-4 right-4 bg-gray-100 text-gray-600 text-xs font-bold px-2 py-1 rounded">
                            {{ $product->category->name ?? 'Sin categoría' }}
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="p-6 border-t border-gray-50">
                        <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-nikitos-orange transition-colors">
                            {{ $product->name }}
                        </h3>
                        <p class="text-sm text-gray-500 line-clamp-2 mb-4">
                            {{ $product->description }}
                        </p>
                        <!-- Price or action? -->
                        <!-- If e-commerce features are expected, add cart button. For now, catalog only. -->
                        {{-- <div class="flex items-center justify-between mt-4">
                            <span class="text-lg font-bold text-gray-900">$1.500</span>
                            <button class="bg-nikitos-orange text-white p-2 rounded-full hover:bg-orange-600 transition-colors">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div> --}}
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Empty State -->
            <div x-show="false" class="text-center py-20 hidden">
                <!-- Logic for empty state in Alpine is tricky without a count, relying on visual only for now -->
                <p class="text-gray-500">No se encontraron productos en esta categoría.</p>
            </div>
        </div>
    </div>
</x-public-layout>