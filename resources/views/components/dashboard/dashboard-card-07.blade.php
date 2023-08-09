<div
    class="col-span-full xl:col-span-12 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Top Productos Vendidos en el Mes</h2>
    </header>
    <div class="p-3">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full dark:text-slate-300">
                <!-- Table header -->
                <thead
                    class="text-xs uppercase text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50 rounded-sm">

                    <tr>
                        <th scope="col" class="p-2">
                            <span class="sr-only">Imagen</span>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-left">Producto</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">Ventas</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">Precio</div>
                        </th>
                        <th class="p-2">
                            <div class="font-semibold text-center">Ver</div>
                        </th>
                    </tr>
                </thead>


                <!-- Table body -->
                <tbody class="text-sm font-medium divide-y divide-slate-100 dark:divide-slate-700">
                    <!-- Row -->
                    @foreach ($productoTopMes as $productoTopMes)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="w-32 p-4">
                                <img src="{{ url('productos_subidos') }}/{{ $productoTopMes->imagen }}" alt="Image">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{ $productoTopMes->nombre }}

                            </td>
                            <td class="p-2">
                                <div class="text-center text-emerald-500">$ ventas ej
                                </div>
                            </td>
                            <td class="p-2">
                                <div class="text-center text-emerald-500">$ {{ $productoTopMes->precio }}
                                </div>
                            </td>
                            <td class="container py-4 px-3 mx-0 min-w-full flex flex-col items-center">
                                <a href="{{ route('productos.show', ['id' => $productoTopMes->id, 'slug' => $productoTopMes->slug]) }}"
                                    class=" btn bg-indigo-500 hover:bg-indigo-600 text-white">
                                    <span class="hidden xs:block">Ver Producto</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    <!-- Row -->
                </tbody>
            </table>

        </div>
    </div>
</div>
