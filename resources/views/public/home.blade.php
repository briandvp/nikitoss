<x-public-layout>
    <!-- Hero Slider -->
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div x-data="{ activeSlide: 0, slides: {{ $banners->count() }} }" class="relative rounded-lg overflow-hidden shadow-xl h-64 md:h-96">
                @if($banners->isEmpty())
                    <div class="h-full flex items-center justify-center bg-gray-300">
                        <span class="text-gray-500">No Banners Available</span>
                    </div>
                @else
                    @foreach($banners as $index => $banner)
                        <div x-show="activeSlide === {{ $index }}" class="absolute inset-0 transition-opacity duration-500 ease-in-out">
                            <img src="{{ asset('storage/' . $banner->image_path) }}" alt="{{ $banner->title }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                                <div class="text-center text-white px-4">
                                    <h2 class="text-3xl md:text-5xl font-bold mb-4">{{ $banner->title }}</h2>
                                    @if($banner->description)
                                        <p class="text-lg md:text-xl mb-6">{{ $banner->description }}</p>
                                    @endif
                                    @if($banner->button_text && $banner->button_link)
                                        <a href="{{ $banner->button_link }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full transition duration-300">
                                            {{ $banner->button_text }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Slider Controls -->
                    <button @click="activeSlide = activeSlide === 0 ? slides - 1 : activeSlide - 1" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-r focus:outline-none hover:bg-opacity-75">
                        &#10094;
                    </button>
                    <button @click="activeSlide = activeSlide === slides - 1 ? 0 : activeSlide + 1" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-l focus:outline-none hover:bg-opacity-75">
                        &#10095;
                    </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Product Showcase -->
    <div id="products" class="py-12 bg-white" x-data="{ activeCategory: 'all' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Our Products</h2>
                <p class="mt-4 text-gray-600">Explore our delicious selection.</p>
            </div>

            <!-- Category Filter Buttons -->
            <div class="flex justify-center flex-wrap mb-8 gap-2">
                <button 
                    @click="activeCategory = 'all'" 
                    :class="{ 'bg-blue-600 text-white': activeCategory === 'all', 'bg-gray-200 text-gray-800 hover:bg-gray-300': activeCategory !== 'all' }"
                    class="px-4 py-2 rounded-full font-semibold transition duration-300 focus:outline-none">
                    All
                </button>
                @foreach($categories as $category)
                    <button 
                        @click="activeCategory = {{ $category->id }}" 
                        :class="{ 'bg-blue-600 text-white': activeCategory === {{ $category->id }}, 'bg-gray-200 text-gray-800 hover:bg-gray-300': activeCategory !== {{ $category->id }} }"
                        class="px-4 py-2 rounded-full font-semibold transition duration-300 focus:outline-none">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <div x-show="activeCategory === 'all' || activeCategory === {{ $product->category_id }}" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-90"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 60) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-xl font-bold text-blue-600">${{ number_format($product->price, 2) }}</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2 py-1 rounded">{{ $product->category->name }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div x-show="!$el.querySelectorAll('.grid > div[style*=\'display: none\']').length === {{ $products->count() }}" class="text-center mt-8 text-gray-500 hidden">
                 <!-- Logic to show 'No products found' is complex with pure Alpine x-show, simplified for now -->
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div id="contact" class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Contact Us</h2>
                <p class="mt-4 text-gray-600">Have questions? Get in touch!</p>
            </div>

            <div class="max-w-xl mx-auto bg-white rounded-lg shadow p-8">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                        <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                        <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 font-bold mb-2">Phone (Optional)</label>
                        <input type="text" name="phone" id="phone" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
                        <textarea name="message" id="message" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded transition duration-300">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-public-layout>
