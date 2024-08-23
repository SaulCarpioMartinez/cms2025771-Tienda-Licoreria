<x-app-layout>
    <x-slot name="header">
        <div class="bg-gray-900 p-4 rounded-lg">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Panel de Cliente') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto p-8">
        <div class="bg-dark shadow-lg rounded-lg p-6 mb-6">
            <p class="text-white">Bienvenido a tu panel de cliente. Aquí puedes ver tus compras y acceder a productos.</p>
        </div>

        <!-- Carrusel de Imágenes -->
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/800x400?text=Producto+1" class="d-block w-100" alt="Producto 1">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/800x400?text=Producto+2" class="d-block w-100" alt="Producto 2">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/800x400?text=Producto+3" class="d-block w-100" alt="Producto 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#productCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#productCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
        
        <!-- Aquí puedes agregar más contenido específico para clientes -->
    </div>

    <!-- Bootstrap JS (Opcional, si no se carga automáticamente) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
