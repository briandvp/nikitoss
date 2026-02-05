<x-public-layout>
    <div class="bg-gray-50 min-h-screen py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Contacto</h1>
                <p class="text-lg text-gray-600">¿Tenés alguna consulta? Estamos para ayudarte.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Info -->
                <div class="bg-white rounded-3xl shadow-lg p-8 sm:p-12 h-full">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Información de contacto</h2>

                    <div class="space-y-8">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center text-nikitos-orange text-xl">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="ml-6">
                                <h3 class="text-lg font-semibold text-gray-900">Ubicación</h3>
                                <p class="text-gray-600 mt-1">Av. Otero 4550, Pontevedra<br>Provincia de Buenos Aires, Argentina</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center text-nikitos-orange text-xl">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="ml-6">
                                <h3 class="text-lg font-semibold text-gray-900">Teléfono</h3>
                                <p class="text-gray-600 mt-1">+54 220 492-4752</p>
                                <p class="text-sm text-gray-500 mt-1">Lunes a Viernes 9:00 a 17:30hs</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center text-nikitos-orange text-xl">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="ml-6">
                                <h3 class="text-lg font-semibold text-gray-900">Email</h3>
                                <p class="text-gray-600 mt-1">ventas@nikitos.com.ar</p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="mt-12">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Seguinos en redes</h3>
                        <div class="flex gap-4">
                            <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-nikitos-orange hover:text-white transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center text-gray-600 hover:bg-nikitos-orange hover:text-white transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white rounded-3xl shadow-lg p-8 sm:p-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Envianos un mensaje</h2>

                    @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre completo</label>
                            <input type="text" name="name" id="name" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-nikitos-orange focus:border-transparent outline-none transition-all placeholder-gray-400" placeholder="Tu nombre">
                        </div>

                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" id="email" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-nikitos-orange focus:border-transparent outline-none transition-all placeholder-gray-400" placeholder="tu@email.com">
                        </div>

                        <div class="mb-6">
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Mensaje</label>
                            <textarea name="message" id="message" rows="5" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-nikitos-orange focus:border-transparent outline-none transition-all placeholder-gray-400" placeholder="¿En qué podemos ayudarte?"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-nikitos-orange text-white font-bold py-4 rounded-xl hover:bg-orange-600 transition-colors shadow-md hover:shadow-lg transform hover:-translate-y-0.5 duration-200">
                            Enviar Mensaje
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>