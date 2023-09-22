<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        {{-- Loading --}}
        <x-dashboard.spinner-loading />

        <!-- Welcome banner -->
        <x-dashboard.welcome-banner />

        <!-- Cards -->
        <div id="content-main" class="grid grid-cols-12 gap-6">
            <x-dashboard.ventas-recientes :ventasRecientes="$ordenes_recientes" />

            <x-dashboard.ventas-totales-grafico :data="$data" :ventasTotales="$total_ventas" />

            <x-dashboard.producto-top-mes :productoTopMes="$productosConVentas" />
        </div>

    </div>
    <x-slot:js>
    </x-slot:js>
</x-app-layout>
