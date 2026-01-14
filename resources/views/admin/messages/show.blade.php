<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Message Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('admin.messages.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">Back</a>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <p class="text-gray-900">{{ $message->name }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <p class="text-gray-900">{{ $message->email }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                        <p class="text-gray-900">{{ $message->phone ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                        <p class="text-gray-900">{{ $message->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Message:</label>
                        <p class="text-gray-900 bg-gray-50 p-4 rounded">{{ $message->message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
