<!-- resources/views/sales/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar Venta') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-8">
        <!-- Formulario para registrar una venta -->
        <form action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="product_id" class="block text-gray-700">Producto</label>
                <select id="product_id" name="product_id" class="form-select mt-1 block w-full">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} - ${{ number_format($product->price, 2) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-gray-700">Cantidad</label>
                <input type="number" id="quantity" name="quantity" class="form-input mt-1 block w-full" min="1" required>
            </div>
            <div class="mb-4">
                <label for="money_given" class="block text-gray-700">Dinero Dado</label>
                <input type="number" id="money_given" name="money_given" class="form-input mt-1 block w-full" step="0.01" min="0" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white font-bold rounded-lg px-6 py-3 shadow-lg hover:bg-blue-700 transition duration-300">Registrar Venta</button>
        </form>

        <!-- Modal -->
        <div id="receiptModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-lg w-full">
                <h3 class="text-xl font-semibold mb-4">Recibo</h3>
                <div id="receiptDetails">
                    <!-- Los detalles del recibo se insertarán aquí -->
                </div>
                <button onclick="closeModal()" class="bg-red-500 text-white font-bold rounded-lg px-6 py-3 mt-4 hover:bg-red-600 transition duration-300">Cerrar</button>
            </div>
        </div>
    </div>

    <script>
        function openModal(total, change) {
            const receiptDetails = document.getElementById('receiptDetails');
            receiptDetails.innerHTML = `
                <p><strong>Producto:</strong> ${document.querySelector('#product_id option:checked').textContent}</p>
                <p><strong>Cantidad:</strong> ${document.getElementById('quantity').value}</p>
                <p><strong>Total:</strong> $${total.toFixed(2)}</p>
                <p><strong>Cambio:</strong> $${change.toFixed(2)}</p>
            `;
            document.getElementById('receiptModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('receiptModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
