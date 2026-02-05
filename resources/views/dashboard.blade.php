<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Order Form Section -->
            <div class="bg-white rounded-lg shadow-sm p-8 mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Datos del pedido</h1>
                <p class="text-gray-500 mb-8">Por favor tenga a bien de rellenar los casilleros con la informacion requerida, de lo contrario no se podra enviar el mismo.</p>

                <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Fecha*</label>
                                <input type="text" name="date" placeholder="dd/mm/yyyy" class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Localidad*</label>
                                <input type="text" name="locality" class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Horario*</label>
                                <input type="text" name="schedule" class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Razón social*</label>
                                <input type="text" name="business_name" class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Código de cliente*</label>
                                <input type="text" name="customer_code" class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Condiciones de pago*</label>
                                <input type="text" name="payment_terms" class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                        </div>
                    </div>

                    <!-- Full Width Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">Observaciones*</label>
                            <textarea name="notes" rows="4" class="w-full bg-gray-50 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">¿Querés subir un archivo?</label>
                            <div class="relative flex items-center justify-between w-full bg-gray-50 border border-gray-200 py-3 px-4 rounded">
                                <span class="text-gray-500">Seleccionar archivo</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-nikitos-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                                <input type="file" name="file" class="opacity-0 absolute inset-0 cursor-pointer w-full h-full">
                            </div>
                            <p class="text-xs text-gray-400 mt-1 text-right">Adjuntar comprobante o lista</p>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Products List Section -->
            <div class="bg-white rounded-lg shadow-sm">
                <!-- Filter Header -->
                <div class="p-6 border-b border-gray-100 bg-gray-50 rounded-t-lg flex justify-between items-center">
                    <div class="flex items-center gap-4 w-full max-w-md">
                        <span class="text-gray-600 whitespace-nowrap">Filtar por categoría:</span>
                        <select class="block w-full bg-white border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-nikitos-orange">
                            <option>Linea escolar</option>
                            <option>Pizzas</option>
                            <option>Hamburguesas</option>
                        </select>
                    </div>
                </div>

                <!-- Product Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <tbody>
                            <!-- Product Row 1 -->
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="p-4 w-24">
                                    <div class="bg-blue-50 p-2 rounded w-16 h-16 flex items-center justify-center">
                                        <!-- Placeholder image -->
                                        <img src="{{ asset('img/products/pizzitos.png') }}" class="max-h-full max-w-full" alt="Product">
                                    </div>
                                </td>
                                <td class="p-4 text-gray-500 w-20">242</td>
                                <td class="p-4 font-medium text-gray-700">Pizzitos de Jamón y Queso</td>
                                <td class="p-4 text-gray-500">12p x 20u x 12g</td>
                                <td class="p-4 flex items-center justify-end gap-6">
                                    <input type="number" value="0" class="w-20 bg-gray-50 border border-gray-200 text-center py-2 rounded focus:outline-none focus:border-nikitos-orange">
                                    <div class="w-6 h-6 border-2 border-gray-200 rounded flex items-center justify-center"></div>
                                </td>
                            </tr>

                            <!-- Product Row 2 -->
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="p-4 w-24">
                                    <div class="bg-blue-50 p-2 rounded w-16 h-16 flex items-center justify-center">
                                        <img src="{{ asset('img/products/bolitas.png') }}" class="max-h-full max-w-full" alt="Product">
                                    </div>
                                </td>
                                <td class="p-4 text-gray-500 w-20">1</td>
                                <td class="p-4 font-medium text-gray-700">Bolitas Dulces</td>
                                <td class="p-4 text-gray-500">12p x 20u x 12g</td>
                                <td class="p-4 flex items-center justify-end gap-6">
                                    <input type="number" value="0" class="w-20 bg-gray-50 border border-gray-200 text-center py-2 rounded focus:outline-none focus:border-nikitos-orange">
                                    <div class="w-6 h-6 border-2 border-gray-200 rounded flex items-center justify-center"></div>
                                </td>
                            </tr>
                            <!-- Product Row 3 -->
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="p-4 w-24">
                                    <div class="bg-blue-50 p-2 rounded w-16 h-16 flex items-center justify-center">
                                        <img src="{{ asset('img/products/pochoclo.png') }}" class="max-h-full max-w-full" alt="Product">
                                    </div>
                                </td>
                                <td class="p-4 text-gray-500 w-20">1104</td>
                                <td class="p-4 font-medium text-gray-700">Pochoclo Acaramelado</td>
                                <td class="p-4 text-gray-500">10p x 20u x 20g</td>
                                <td class="p-4 flex items-center justify-end gap-6">
                                    <input type="number" value="0" class="w-20 bg-gray-50 border border-gray-200 text-center py-2 rounded focus:outline-none focus:border-nikitos-orange">
                                    <div class="w-6 h-6 border-2 border-gray-200 rounded flex items-center justify-center"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
</x-app-layout>