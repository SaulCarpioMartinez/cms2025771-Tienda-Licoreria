<!-- resources/views/sales/receipt.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recibo de Venta') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-8">
        <!-- Modal -->
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-lg w-full">
                <h3 class="text-xl font-semibold mb-4">Recibo</h3>
                <p><strong>Producto:</strong> {{ $product->name }}</p>
                <p><strong>Cantidad:</strong> {{ $quantity }}</p>
                <p><strong>Total:</strong> ${{ number_format($total, 2) }}</p>
                <p><strong>Cambio:</strong> ${{ number_format($change, 2) }}</p>
                <a href="{{ route('dashboard') }}" class="bg-blue-600 text-dark font-bold rounded-lg px-6 py-3 mt-4 hover:bg-blue-700 transition duration-300">Regresar al Dashboard</a>
            </div>
        </div>
    </div>
</x-app-layout>
