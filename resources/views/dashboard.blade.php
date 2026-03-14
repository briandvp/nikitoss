<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Order Form Section -->
            <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Datos del pedido</h1>
                <p class="text-gray-500 mb-8">Por favor tenga a bien de rellenar los casilleros con la informacion requerida, de lo contrario no se podra enviar el mismo.</p>

                <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data" id="order-form">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Fecha*</label>
                                <input type="date" name="date" value="{{ old('date', now()->format('Y-m-d')) }}" min="{{ now()->format('Y-m-d') }}" required
                                    class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('date') border-red-500 @enderror">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Localidad*</label>
                                <input type="text" name="locality" value="{{ old('locality') }}" required
                                    class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('locality') border-red-500 @enderror">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Horario*</label>
                                <input type="text" name="schedule" value="{{ old('schedule') }}" placeholder="Ej: 9:00 - 17:00" required
                                    class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('schedule') border-red-500 @enderror">
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Razón social*</label>
                                <input type="text" name="business_name" value="{{ old('business_name') }}" required
                                    class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('business_name') border-red-500 @enderror">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Código de cliente*</label>
                                <input type="text" name="customer_code" value="{{ old('customer_code') }}" required
                                    class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('customer_code') border-red-500 @enderror">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Condiciones de pago*</label>
                                <input type="text" name="payment_terms" value="{{ old('payment_terms') }}" placeholder="Ej: Contado, 30 días" required
                                    class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('payment_terms') border-red-500 @enderror">
                            </div>
                        </div>
                    </div>

                    <!-- Full Width Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Observaciones</label>
                            <textarea name="notes" rows="4" class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ old('notes') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">¿Querés subir un archivo?</label>
                            <div class="relative flex items-center justify-between w-full bg-gray-50 border border-gray-200 py-3 px-4 rounded">
                                <span class="text-gray-500">Seleccionar archivo</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-nikitos-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                                <input type="file" name="file" accept=".pdf,.jpg,.jpeg,.png" class="opacity-0 absolute inset-0 cursor-pointer w-full h-full">
                            </div>
                            <p class="text-xs text-gray-400 mt-1 text-right">PDF, JPG o PNG. Máx. 5MB</p>
                        </div>
                    </div>

                    <!-- Products List Section -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold text-gray-900">Productos</h2>
                            <span class="text-sm text-gray-500">Indique las cantidades deseadas</span>
                        </div>

                        <!-- Filter by category -->
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-2">Filtrar por categoría:</label>
                            <select id="category-filter" class="block w-full max-w-xs bg-white border border-gray-200 text-gray-700 py-2 px-4 rounded focus:outline-none focus:border-nikitos-orange">
                                <option value="">Todas las categorías</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->slug }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="overflow-x-auto border border-gray-200 rounded-lg bg-white">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="p-4 text-gray-800 font-bold border-b border-gray-200 w-24"></th>
                                        <th class="p-4 text-gray-800 font-bold border-b border-gray-200">Código</th>
                                        <th class="p-4 text-gray-800 font-bold border-b border-gray-200">Producto</th>
                                        <th class="p-4 text-gray-800 font-bold border-b border-gray-200">Precio</th>
                                        <th class="p-4 text-gray-800 font-bold border-b border-gray-200 text-right">Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $idx = 0; @endphp
                                    @foreach ($categories as $category)
                                        @foreach ($category->products as $product)
                                            <tr class="border-b border-gray-100 hover:bg-gray-50 product-row" data-category="{{ $category->slug }}">
                                                <td class="p-4 w-24">
                                                    <div class="bg-gray-100 p-2 rounded w-16 h-16 flex items-center justify-center">
                                                        @if ($product->image_path)
                                                            <img src="{{ Storage::url($product->image_path) }}" class="max-h-full max-w-full object-contain" alt="{{ $product->name }}">
                                                        @else
                                                            <div class="w-10 h-10 bg-gray-200 rounded flex items-center justify-center text-gray-400 text-xs">—</div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="p-4 text-gray-500 w-20">{{ $product->id }}</td>
                                                <td class="p-4 font-medium text-gray-700">{{ $product->name }}</td>
                                                <td class="p-4 text-gray-500">${{ number_format($product->price, 2) }}</td>
                                                <td class="p-4 flex justify-end">
                                                    <input type="hidden" name="products[{{ $idx }}][product_id]" value="{{ $product->id }}">
                                                    <input type="number" name="products[{{ $idx }}][quantity]" value="{{ old("products.{$idx}.quantity", 0) }}" min="0"
                                                        class="w-24 bg-gray-50 border border-gray-200 text-center py-2 rounded focus:outline-none focus:border-nikitos-orange">
                                                </td>
                                            </tr>
                                            @php $idx++; @endphp
                                        @endforeach
                                    @endforeach
                                    @if ($categories->flatMap->products->isEmpty())
                                        <tr>
                                            <td colspan="5" class="p-8 text-center text-gray-500">No hay productos disponibles. Contacte al administrador.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-nikitos-orange hover:bg-orange-600 text-white font-bold py-3 px-8 rounded-full transition-colors">
                            Enviar pedido
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Chat Widget -->
    <div class="fixed bottom-8 right-8 z-50">
        <button class="bg-nikitos-orange text-white p-4 rounded-full shadow-lg hover:bg-orange-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
        </button>
    </div>

    <script>
        document.getElementById('category-filter')?.addEventListener('change', function() {
            const slug = this.value;
            document.querySelectorAll('.product-row').forEach(row => {
                row.style.display = !slug || row.dataset.category === slug ? '' : 'none';
            });
        });
    </script>
</x-app-layout>
