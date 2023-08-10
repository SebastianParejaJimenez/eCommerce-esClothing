<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        {{-- Loading --}}
        <x-dashboard.spinner-loading />

        <!-- Welcome banner -->
        <x-dashboard.welcome-banner />

        <!-- Cards -->
        <div id="content-main" class="grid grid-cols-12 gap-6">

            <!-- Line chart (Acme Plus) -->
            <!-- Table (Top Channels) -->
            <x-dashboard.dashboard-card-13 :ventasRecientes="$ordenes_recientes" />

            <x-dashboard.dashboard-card-02 :data="$data" :ventasTotales="$total_ventas" />

            <x-dashboard.dashboard-card-07 :productoTopMes="$productosConVentas" />
        </div>

    </div>

</x-app-layout>
