<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-6 text-gray-800 font-bold border-b border-gray-200 w-24"></th> <!-- Icon column -->
                            <th class="p-6 text-gray-800 font-bold border-b border-gray-200">Nombre</th>
                            <th class="p-6 text-gray-800 font-bold border-b border-gray-200">Formato</th>
                            <th class="p-6 text-gray-800 font-bold border-b border-gray-200 text-right">Peso</th>
                            <th class="p-6 border-b border-gray-200"></th> <!-- Action column -->
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <!-- Row 1 -->
                        <tr class="hover:bg-gray-50 transition-colors cursor-pointer">
                            <td class="p-6 text-center">
                                <div class="w-10 h-10 mx-auto flex items-center justify-center">
                                    <!-- Orange File Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-nikitos-orange" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </td>
                            <td class="p-6 text-gray-500 font-medium">Lista de precios - Septiembre 2024</td>
                            <td class="p-6 text-gray-500 uppercase">PDF</td>
                            <td class="p-6 text-gray-500 text-right">340kb</td>
                            <td class="p-6"></td>
                        </tr>
                    </tbody>
                </table>
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