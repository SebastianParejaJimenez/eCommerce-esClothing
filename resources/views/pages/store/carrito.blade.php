@extends('layouts.appstore')

@section('title', 'Carrito de Compras')

@section('content')

    <div x-data="{ open: true, userInfo: false }" class="bg-gray-100 dark:bg-slate-700">
        <div class="mx-auto max-w-4xl px-3 py-0.5 sm:px-6 sm:py-0.5 lg:max-w-7xl lg:px-5">
            <!-- component -->
            @if (session('noProductos'))
                <div x-show="open" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-cloak
                    class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                    aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                        <div @click="open = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                            aria-hidden="true"></div>

                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span @click="open = false" class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            aria-hidden="true">&#8203;</span>

                        <div
                            class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                            <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                                <a @click="open = false" type="button"
                                    class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span class="sr-only">Close</span>
                                    <!-- Heroicon name: outline/x -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </a>
                            </div>
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <!-- Heroicon name: outline/exclamation -->
                                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Ha ocurrido un
                                        Error</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Actualmente, el carrito todos sus productos están inactivos o esta excediendo una cantidad mayor de la disponible. Le recomendamos que vuelva a intentarlo más tarde, cuando los productos deseados vuelvan a estar activos en nuestro inventario. Lamentamos las molestias y agradecemos su comprensión.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('canceled'))
                <div x-show="open" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-cloak
                    class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                    aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                        <div @click="open = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                            aria-hidden="true"></div>

                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span @click="open = false" class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            aria-hidden="true">&#8203;</span>

                        <div
                            class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                            <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                                <a @click="open = false" type="button"
                                    class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span class="sr-only">Close</span>
                                    <!-- Heroicon name: outline/x -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </a>
                            </div>
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <!-- Heroicon name: outline/exclamation -->
                                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Ha ocurrido un
                                        Error</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">El pago no se ha procesado correctamente, En dado
                                            caso que de su cuenta se haya hecho el pago por favor contacte con nosotros.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('success'))
                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak
                    class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                    aria-modal="true">
                    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                        <div @click="open = false" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                            aria-hidden="true"></div>

                        <span @click="open = false" class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            aria-hidden="true">&#8203;</span>

                        <div
                            class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                            <div>
                                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                                    <!-- Heroicon name: outline/check -->
                                    <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-5">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Pago Exitoso
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">A continuacion recibiras un correo con la
                                            información de tu pedido.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-6">
                                <a @click="open = false" href="{{ route('pedidos_hechos') }}" type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">Ir
                                    a ver tus Pedidos</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <x-tienda.carrito-detalles />



            <!-- This example requires Tailwind CSS v2.0+ -->
            <div x-show="userInfo" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak
                class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">

                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">


                    <div @click="userInfo = false" class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"
                        aria-hidden="true"></div>
                    <span @click="userInfo = false" class="hidden sm:inline-block sm:align-middle sm:h-screen"
                        aria-hidden="true">&#8203;</span>
                        @auth
                        <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full sm:p-6">
                            <form action="{{ route('usuarios.update', Auth::user()) }}" method="POST"
                                class="formulario-validacion">
                                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-5 mb-4">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Editar
                                        Información</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">A continuación, podrás realizar cambios a la direccion
                                            de envio de tu pedido en caso que sea necesario.</p>
                                    </div>
                                </div>
                                <div class="mt-3  sm:mt-5">
                                    <div class="mt-2 ">
                                            <div>
                                                @csrf
                                                @method('PUT')
                                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                                    <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                                                        <div class="grid grid-cols-6 gap-6">
                                                            <div class="col-span-6 sm:col-span-3">
                                                                <label for="first-name"
                                                                    class="block text-sm font-medium text-gray-700">Nombre de
                                                                    Usuario</label>
                                                                <input type="text" name="name" id="first-name"
                                                                    value="{{ Auth::user()->name }}" autocomplete="given-name"
                                                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-3">
                                                                <label for="numero_telefono"
                                                                    class="block text-sm font-medium text-gray-700">Numero de
                                                                    Contacto</label>
                                                                <input type="text" name="numero_telefono"
                                                                    value="{{ Auth::user()->numero_telefono }}"
                                                                    id="numero_telefono" autocomplete="family-name"
                                                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            </div>

                                                            <div class="col-span-6">
                                                                <label for="direccion"
                                                                    class="block text-sm font-medium text-gray-700">Dirección</label>
                                                                <input type="text" name="direccion" id="direccion"
                                                                    autocomplete="address"
                                                                    value="{{ Auth::user()->direccion }}"
                                                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                                                <label for="pais"
                                                                    class="block text-sm font-medium text-gray-700">País</label>
                                                                <input type="text" name="pais" id="pais"
                                                                    value="{{ Auth::user()->pais }}"
                                                                    autocomplete="address-level2"
                                                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                                <label for="ciudad"
                                                                    class="block text-sm font-medium text-gray-700">Ciudad</label>
                                                                <input type="text" name="ciudad" id="ciudad"
                                                                    value="{{ Auth::user()->ciudad }}"
                                                                    autocomplete="address-level1"
                                                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            </div>

                                                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                                                <label for="codigo_postal"
                                                                    class="block text-sm font-medium text-gray-700">Codigo
                                                                    Postal</label>
                                                                <input type="text" name="codigo_postal" id="codigo_postal"
                                                                    value="{{ Auth::user()->codigo_postal }}"
                                                                    autocomplete="postal_code"
                                                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                                    <button type="submit" onClick="validateFm()"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">Actualizar</button>
                                    <button type="button" @click="userInfo = false"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">Cancelar</button>
                                </div>
                            </form>
                        </div>
                        @endauth

                </div>
            </div>

            <script>
                function validateFm() {
                    $(".formulario-validacion").validate({
                        rules: {
                            name: {
                                required: true,
                            },
                            ciudad: {
                                required: true,
                            },
                            pais: {
                                required: true,
                            },
                            direccion: {
                                required: true,
                            },
                            codigo_postal: {
                                required: true,
                            },
                            numero_telefono: {
                                required: true,
                            },

                        },
                        messages: {
                            name: {
                                required: "El campo es Requerido y no puede estar Vacio.",
                            },
                            ciudad: {
                                required: "El campo es Requerido y no puede estar Vacio.",
                            },
                            pais: {
                                required: "El campo es Requerido y no puede estar Vacio.",
                            },
                            direccion: {
                                required: "El campo es Requerido y no puede estar Vacio.",
                            },
                            codigo_postal: {
                                required: "El campo es Requerido y no puede estar Vacio.",
                            },
                            numero_telefono: {
                                required: "El campo es Requerido y no puede estar Vacio.",
                            },
                        },
                        errorClass: "error text-red-500 text-sm italic mt-2",
                    });
                }
            </script>

            @if (session('editado'))
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


        </div>
    </div>

@endsection
