<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-4 w-full max-w-9xl mx-auto">

    <x-dashboard.banners.productos-inactivo-banner />


    @if(!$productos->count())
    <div class="w-full grid place-items-center">
    <div class="w-9/12 overflow-hidden rounded-lg bg-white shadow-md duration-300 hover:scale-105 hover:shadow-xl">
        <h1 class="mt-3 text-center text-2xl font-bold text-gray-500">No existen Productos Inactivos</h1>
        <p class="my-4 text-center text-sm text-gray-500">Actualmente no hay algun producto que este desactivado.</p>
    </div>
    </div>

    @endif
    @if($productos->count())
    <table id="productos_lista" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Imagen</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    Producto
                </th>
                <th scope="col" class="px-6 py-3">
                    Categoria
                </th>
                <th scope="col" class="px-6 py-3">
                    Acción
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-32 p-4">
                        <img src="{{ url('productos_subidos') }}/{{ $producto->imagen }}" alt="Imagen">
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white producto_nombre">
                        {{$producto->nombre}}
                    </td>
                    <td class="px-6 py-4">
                        {{$producto->categoria}}
                    </td>
                    <td class="px-6 py-4">

                        <div class="flex items-center space-x-4 p-3">
                            <div class="flex items-center gap-x-6">
                                <input type="hidden" value="">
                                <a href="{{ route('productos.restore', $producto->id) }}" type="submit" class="text-green-500 transition-colors duration-200 dark:hover:text-green-500 dark:text-gray-300 hover:text-green-500 focus:outline-none">
                                    ACTIVAR
                                </a>
                            </div>

                </tr>
            @endforeach
        </tbody>

    </table>
    @endif
    </div>
    <x-slot:js>
    </x-slot:js>

</x-app-layout>
