<x-app-layout>
    <style>
        /*Overrides for Tailwind CSS */

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input:hover {
            border-color: #6366F1;
            margin-bottom: 5%;
        }


        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }
    </style>
    <div class="px-4 sm:px-6 lg:px-8 py-4 w-full max-w-9xl mx-auto">
        <x-dashboard.banners.products-banner />

        <x-dashboard.spinner-loading />

        @if (!$productos->count())
            <div class="w-full grid place-items-center">
                <div
                    class="w-9/12 overflow-hidden rounded-lg bg-white shadow-md duration-300 hover:scale-105 hover:shadow-xl">
                    <h1 class="mt-3 text-center text-2xl font-bold text-gray-500">¡No existen Productos!</h1>
                    <p class="my-4 text-center text-sm text-gray-500">Actualmente no hay algun Producto Creado o
                        Activado.</p>
                </div>
            </div>
        @endif

        @if ($productos->count())
            <div id="content-table" class="overflow-x-auto  sm:rounded-lg">

                <table id="productos_lista"
                    class="mt-3 w-full bg-gray-50 text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3">
                                <span class="sr-only">Imagen</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Producto
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cantidad
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Categoria
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Precio
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tallas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acción
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($productos as $producto)
                            <tr
                                class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-32 p-4">
                                    <img src="{{ url('productos_subidos') }}/{{ $producto->imagen }}" alt="Image">
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white producto_nombre">
                                    {{ $producto->nombre }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <form action="{{ route('productos.restar', ['id' => $producto->id]) }}"
                                            method="POST" style="display: inline-block;">
                                            @method('PUT')
                                            @csrf
                                            <button
                                                class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                                type="submit">
                                                <span class="sr-only">Cantidad Boton</span>
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                        </form>

                                        <div>
                                            {{ $producto->cantidad }}
                                        </div>
                                        <form action="{{ route('productos.sumar', ['id' => $producto->id]) }}"
                                            method="POST" style="display: inline-block;">
                                            @method('PUT')
                                            @csrf
                                            <button
                                                class="inline-flex items-center justify-center h-6 w-6 p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                                type="submit">
                                                <span class="sr-only">Cantidad Boton</span>
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white producto_categoria">
                                    {{ $producto->categoria }}

                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white producto_precio">
                                    {{ number_format($producto->precio, 2, '.', ',') }}
                                </td>

                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white producto_precio">
                                    @foreach ($producto->tallas as $talla)
                                        <span class="bg-green-100 text-gray-900 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">{{$talla->talla}}</span>
                                    @endforeach
                                </td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                    <div
                                        class="inline-flex items-center px-3 py-1 rounded-full gap-x-2
                                dark:bg-gray-800
                                @switch(true)
                                    @case($producto->estado == 'Activo')
                                        text-green-500 bg-green-100/60
                                        @break

                                    @case($producto->estado == 'Inactivo')
                                        text-red-500 bg-red-200
                                        @break
                                    @endswitch
                                    ">

                                        @switch(true)
                                            @case($producto->estado == 'Activo')
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            @break

                                            @case($producto->estado == 'Inactivo')
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            @break
                                        @endswitch

                                        <h2 class="text-sm font-normal">{{ $producto->estado }}</h2>
                                    </div>
                                </td>
                                <td class="px-6 py-4">

                                    <div class="flex items-center space-x-4 p-3">

                                        @if ($producto->estado == 'Inactivo')
                                            <div class="flex items-center gap-x-6">
                                                <input type="hidden" value="">
                                                <a href="{{ route('productos.restore', $producto->id) }}"
                                                    type="submit"
                                                    class="text-green-500 transition-colors duration-200 dark:hover:text-green-500 dark:text-gray-300 hover:text-green-500 focus:outline-none">
                                                    ACTIVAR
                                                </a>
                                            </div>
                                        @else
                                            <form method="POST"
                                                action="{{ route('productos.destroy', ['id' => $producto->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class="text-red-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none dark:hover:text-red-500 dark:text-red-300">
                                                    Desactivar
                                                </button>
                                            </form>
                                        @endif

                                        <a href="{{ route('productos.edit', ['id' => $producto->id]) }}"
                                            class="px-2 text-blue-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-nones">
                                            Editar
                                        </a>
                                        <a href="{{ route('productos.show', ['id' => $producto->id, 'slug' => $producto->slug]) }}"
                                            class=" items-center px-2 py-2 rounded-md drop-shadow-md hover:text-indigo-600 text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>

                                        </a>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <x-slot:js>
        <script>
            $(document).ready(function() {
                // Create a DataTable object
                var dataTable = $('#productos_lista').DataTable({
                    // Set the language to Spanish
                    language: {
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando _START_ a _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "Mostrando 0 a 0 de 0 en total registros",
                        "infoFiltered": "(filtrado de _MAX_ registros)",
                        "search": "Buscar:",
                        "paginate": {
                            "first": "Primera",
                            "previous": "Anterior",
                            "next": "Siguiente",
                            "last": "Última"
                        }
                    },
                    lengthMenu: [
                        [3, 5, 10, -1],
                        [3, 5, 10, "Mostrar todos"]
                    ],
                });
            });
        </script>
    </x-slot:js>

</x-app-layout>
