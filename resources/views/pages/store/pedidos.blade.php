@extends('layouts.appstore')

@section('title', 'Página de inicio')
<div x-data="{ cartOpen: false, isOpen: false }" class="bg-white">
    @section('content')
        <x-productos.carrito-header />
        <!-- component -->
        <section class="text-gray-600 body-font bg-gray-100">
            <div class="container px-5 py-24 mx-auto">
                <div class="p-5 bg-white flex items-center mx-auto border-b  mb-10 border-gray-200 rounded-lg sm:flex-row flex-col">
                    <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                        <h1 class="text-black text-xl title-font font-bold mb-2">ID COMPRA</h1>
                        <div class="py-2">
                            <div class=" inline-block mr-2">
                                <div class="flex  pr-2 h-full items-center">
                                    <svg class="text-gray-500 w-6 h-6 mr-1" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                    </svg>
                                    <p class="title-font font-medium">Estado:</p>
                                </div>
                            </div>
                            <div class="inline-block mr-2">
                                <div class="flex  pr-2 h-full items-center">
                                    <svg class="text-green-500 w-6 h-6 mr-1" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <path d="M9 12l2 2l4 -4" />
                                    </svg>
                                    <p class="title-font font-medium">ACTIVO</p>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex font-bold text-gray-800">
                            <div class="w-full md:w-1/2 flex space-x-3">
                                <div class="w-1/2">
                                    <h2 class="text-gray-500">ID de Compra</h2>
                                    <p>description</p>
                                </div>
                                <div class="w-1/2">
                                    <h2 class="text-gray-500">Fecha de Compra</h2>
                                    <p>description</p>
                                </div>
                            </div>
                        </div>

                        <div x-data="{ reportsOpen: false }" class="mt-4">
                            <div @click="reportsOpen = !reportsOpen"
                                class='flex items-center text-indigo-600 w-full overflow-hidden mt-32 md:mt-0 mb-2 mx-auto'>

                                <div class='flex items-center py-3'>
                                    <div class='mx-3'>
                                        <button class="hover:underline">Ver Detalles</button>
                                    </div>
                                    <div class='w-10 border-r px-2 transform transition duration-300 ease-in-out'
                                        :class="{ 'rotate-90': reportsOpen, ' -translate-y-0.0': !reportsOpen }">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                            viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="flex p-5 md:p-0 w-full transform transition duration-300 ease-in-out border-b pb-10"
                                x-cloak x-show="reportsOpen" x-collapse x-collapse.duration.500ms>
                                This is a very simple dropdown/accordion/collapse (whatever you call it) using Tailwind,
                                Alpine.js, and the Alpine.js plugin "Collapse" to enable smoother open/collapse transitions
                                than what comes out of the box with Alpine.js
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection
