<x-app-layout>

    <section class="px-4 sm:px-6 lg:px-8 py-4 w-full max-w-9xl mx-auto">
        <div class=" bg-white dark:bg-slate-800 p-7 rounded-lg">

            <x-dashboard.banners.products-banner />

            <x-dashboard.spinner-loading />

            @if (!$productos->count())
                <div class="text-center mt-12  py-20 rounded-md dark:bg-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-200" style="fill: rgb(34, 34, 34);transform: ;msFilter:;">
                        <path d="M22 8a.76.76 0 0 0 0-.21v-.08a.77.77 0 0 0-.07-.16.35.35 0 0 0-.05-.08l-.1-.13-.08-.06-.12-.09-9-5a1 1 0 0 0-1 0l-9 5-.09.07-.11.08a.41.41 0 0 0-.07.11.39.39 0 0 0-.08.1.59.59 0 0 0-.06.14.3.3 0 0 0 0 .1A.76.76 0 0 0 2 8v8a1 1 0 0 0 .52.87l9 5a.75.75 0 0 0 .13.06h.1a1.06 1.06 0 0 0 .5 0h.1l.14-.06 9-5A1 1 0 0 0 22 16V8zm-10 3.87L5.06 8l2.76-1.52 6.83 3.9zm0-7.72L18.94 8 16.7 9.25 9.87 5.34zM4 9.7l7 3.92v5.68l-7-3.89zm9 9.6v-5.68l3-1.68V15l2-1v-3.18l2-1.11v5.7z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No existen productos</h3>
                    <p class="mt-1 text-sm text-gray-500  dark:text-white">Inicia creando tus productos.</p>
                </div>
            @else
                <div id="content-table" class="overflow-x-auto sm:rounded-lg">

                    <table id="listado" class="mt-3 w-full bg-gray-50 text-sm text-left text-gray-500 dark:text-gray-400 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3">
                                    <span class="sr-only">Imagen</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Producto
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Disponibles
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
                                        {{ $producto->cantidad }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white producto_categoria">
                                        {{ $producto->categoria }}

                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white producto_precio">
                                        ${{ number_format($producto->precio, 2, '.', ',') }}
                                    </td>

                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white producto_precio">
                                        @if ($producto->categoria != "Accesorios")
                                            @foreach ($producto->tallas as $talla)
                                                <span class="bg-green-100 text-gray-900 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">{{ $talla->talla }}</span>
                                            @endforeach

                                        @else
                                        <span class="bg-green-100 text-gray-900 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">Única</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                        <div
                                            class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 dark:bg-gray-800
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
                                                    <a href="{{ route('productos.restore', $producto->id) }}" type="submit"
                                                        onclick="habilitarProducto(event)"
                                                        class="text-green-500 transition-colors duration-200 dark:hover:text-green-500 dark:text-gray-300 hover:text-green-500 focus:outline-none">
                                                        ACTIVAR
                                                    </a>
                                                </div>
                                            @else
                                                <form method="POST" id="deshabilitar"
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
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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
    </section>


    <div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
        style="background: rgba(0,0,0,.7);">
        <div class=" modal-container bg-white w-2/4 mx-auto rounded z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-xl font-bold">Crear Producto</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <!--Body-->
                <div class="my-5">
                    <x-productos.crear-producto :tallas="$tallas" />
                </div>
            </div>
        </div>
    </div>


    <x-slot:js>
        <script>
            for (let i = 0; i < closeButton.length; i++) {

                const elements = closeButton[i];

                elements.onclick = (e) => modalClose();

                modal.style.display = 'none';

                window.onclick = function(event) {
                    if (event.target == modal) modalClose();
                }
            }

            $('#deshabilitar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Estas Seguro de Inhabilitar el Producto?',
                    text: 'Podras activarlo nuevamente en dado caso que sea necesario".',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#15803d',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })

            });

            function habilitarProducto(event) {
                event.preventDefault();


                Swal.fire({
                    title: 'Estas Seguro de Habilitar el Producto?',
                    text: 'Podras inhabilitarlo nuevamente en dado caso que sea necesario".',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#15803d',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = event.target.href;
                    }
                })
            }
        </script>

        @if(session('update')== "ok")
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "Editado con Éxito"
            });
        </script>
        @endif

        @if(session('succes')== "ok")
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "¡Producto Creado con Éxito!"
            });
        </script>
        @endif

    </x-slot:js>

</x-app-layout>
