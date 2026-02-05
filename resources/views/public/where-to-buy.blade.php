<x-public-layout>
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Dónde Comprar</h1>
                <p class="text-lg text-gray-600">Encontrá nuestros productos en tu punto de venta más cercano.</p>
            </div>

            <!-- Map Section (Placeholder) -->
            <div class="bg-white rounded-3xl shadow-lg overflow-hidden mb-16">
                <div class="aspect-w-16 aspect-h-9 h-[500px] w-full bg-gray-200 relative">
                    <!-- Replace with actual Google Maps Embed -->
                    <iframe
                        title="Google Maps"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13110.88457375252!2d-58.7188!3d-34.7645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzTCsDQ1JzUyLjIiUyA1OMKwNDMnMDcuNyJX!5e0!3m2!1sen!2sar!4v1620000000000!5m2!1sen!2sar"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                    <div class="absolute inset-0 pointer-events-none flex items-center justify-center bg-black/5" style="display: none;"> <!-- remove display none to show overlay if needed -->
                        <span class="bg-white px-6 py-3 rounded-full font-semibold shadow-lg text-gray-800">Mapa de Distribuidores</span>
                    </div>
                </div>
                <div class="p-8 bg-white border-t border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Planta Industrial y Venta Mayorista</h3>
                    <p class="text-gray-600 mb-4">Av. Otero 4550, Pontevedra, Buenos Aires</p>
                    <a href="https://maps.google.com" target="_blank" class="text-nikitos-orange font-semibold hover:underline">
                        Cómo llegar <i class="fas fa-external-link-alt ml-1"></i>
                    </a>
                </div>
            </div>

            <!-- Distributors List -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Nuestros Distribuidores</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Cards for zones/distributors -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Zona Oeste</h3>
                        <p class="text-gray-600 text-sm">Distribuidora Central</p>
                        <p class="text-gray-500 text-sm mt-2"><i class="fas fa-phone mr-2"></i> 1234-5678</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Zona Norte</h3>
                        <p class="text-gray-600 text-sm">Distribuidora Norte</p>
                        <p class="text-gray-500 text-sm mt-2"><i class="fas fa-phone mr-2"></i> 1234-5678</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Zona Sur</h3>
                        <p class="text-gray-600 text-sm">Distribuidora Sur</p>
                        <p class="text-gray-500 text-sm mt-2"><i class="fas fa-phone mr-2"></i> 1234-5678</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">CABA</h3>
                        <p class="text-gray-600 text-sm">Capital Snacks</p>
                        <p class="text-gray-500 text-sm mt-2"><i class="fas fa-phone mr-2"></i> 1234-5678</p>
                    </div>
                    <!-- Add more placeholders -->
                </div>
            </div>
        </div>
    </div>
</x-public-layout>