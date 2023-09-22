@foreach ($pedido as $pedido)
@endforeach
<x-app-layout>
    <x-dashboard.spinner-loading />

    <div class="min-h-full my-4 flex items-center justify-center px-4">
        <div class="max-w-4xl bg-white dark:bg-gray-800 w-full rounded-lg shadow-xl">
            <div class="p-4 border-b">
                <h2 class="text-2xl ">
                    Detalles de Pedido
                </h2>
                <p class="text-sm text-gray-500">
                    Detalles sobre el Cliente y Pedido realizado.
                </p>
            </div>
            <div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b dark:text-white">
                    <p class="text-gray-600 dark:text-white">
                        Nombre
                    </p>
                    <p>
                        {{ $pedido->user->name }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b dark:text-white">
                    <p class="text-gray-600 dark:text-white">
                        Correo Electronico
                    </p>
                    <p>
                        {{ $pedido->user->email }}
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b dark:text-white">
                    <p class="text-gray-600 dark:text-white">
                        Pais
                    </p>
                    <p>
                        {{ $pedido->user->pais }}

                    </p>
                </div>
                <div
                    class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b dark:text-white">
                    <p class="text-gray-600 dark:text-white">
                        Ciudad
                    </p>
                    <p>
                        {{ $pedido->user->ciudad }}

                    </p>
                </div>
                <div
                class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b dark:text-white">
                <p class="text-gray-600 dark:text-white">
                    Codigo Postal
                </p>
                <p>
                    {{ $pedido->user->codigo_postal }}

                </p>
            </div>
                <div
                    class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b dark:text-white">
                    <p class="text-gray-600 dark:text-white">
                        Direccion
                    </p>
                    <p>
                        {{ $pedido->user->direccion }}

                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                    <p class="text-gray-600 dark:text-white">
                        Productos Adquiridos
                    </p>
                    <div class="space-y-2 ">
                        @foreach ($pedido->productos as $producto)
                        <div class="border-2 flex items-center p-2 rounded justify-between space-x-2 ">
                            <a href="{{ route('productos.show', ['id' => $producto->id, 'slug' => $producto->slug]) }}" class="text-purple-700 hover:underline dark:text-white">
                                    {{ $producto->nombre }}
                            </a>
                            <p>Talla:</p>
                            <div class="border-1 flex items-center p-2 rounded justify-between font-semibold">
                                {{$producto->pivot->talla}}
                            </div>
                            <p>Precio:</p>
                            <div class="border-1 flex items-center p-2 rounded justify-between font-semibold">
                                ${{ number_format($producto->pivot->precio, 0, ',', '.') }}
                            </div>
                            <p>Cantidad:</p>
                            <div class="border-1 flex items-center p-2 rounded justify-between font-semibold">
                                {{$producto->pivot->cantidad}}
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
                <div
                    class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b dark:text-white">
                    <p class="text-gray-600 dark:text-white">
                        Total Facturado
                    </p>
                    <b>
                        ${{ number_format($pedido->total, 0, ',', '.') }}
                    </b>
                </div>

            </div>
        </div>
    </div>
    <x-slot:js>
    </x-slot:js>
</x-app-layout>
