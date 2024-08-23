<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Licoreria') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-8">
        <div class="bg-dark shadow-lg rounded-lg p-6">
            <p class="text-white">Aquí puedes administrar tus configuraciones y ver estadísticas.</p>
            <br><br>
            <a href="{{ route('sales.create') }}" class="bg-blue-600 text-white font-bold rounded-lg px-6 py-3 shadow-lg hover:bg-blue-700 transition duration-300">Vender</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            <!-- Ventas Totales -->
            <div class="bg-blue-500 text-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-semibold">Ventas Totales</h2>
                <p class="mt-4 text-4xl">${{ number_format($totalSales, 2) }}</p>
            </div>
            <!-- Clientes Nuevos -->
            <div class="bg-green-500 text-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-semibold">Clientes Nuevos</h2>
                <p class="mt-4 text-4xl">{{ $newCustomers }}</p>
            </div>
            <!-- Productos Vendidos -->
            <div class="bg-yellow-500 text-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-semibold">Productos Vendidos</h2>
                <p class="mt-4 text-4xl">{{ $totalProductsSold }}</p>
            </div>
            <!-- Productos Más Vendidos -->
            <div class="bg-cyan-500 text-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-semibold">Top Productos</h2>
                <ul class="mt-4">
                    @foreach ($topProducts as $product)
                        <li class="text-lg">{{ $product->name }}: {{ $product->orders_count }} ventas</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
