@extends('layouts.appstore')

@section('title', 'Página de inicio')
<div x-data="{ cartOpen: false, isOpen: false }" class="bg-white">
    @section('content')
        <x-productos.carrito-header />
        <!-- component -->
        <section class="flex items-center  bg-gray-100  font-poppins dark:bg-gray-800 ">
            <div class=" flex-1 max-w-full px-4 py-4 mx-auto text-left lg:py-10 ">
                <div class="mb-10 text-center">
                    <span
                        class="block mb-4 text-xs font-semibold leading-4 tracking-widest text-center text-blue-500 uppercase dark:text-gray-400">
                        Tus pedidos
                    </span>
                    <h1 class="text-3xl font-bold capitalize dark:text-white"> Lista de Pedidos</h1>
                </div>

                @if (!$pedidos->count())
                    <div class="w-full grid place-items-center">
                        <div
                            class="w-9/12 overflow-hidden rounded-lg bg-white shadow-md duration-300 hover:scale-105 hover:shadow-xl">
                            <h1 class="mt-3 text-center text-2xl font-bold text-gray-500">¡No existen Pedidos!</h1>
                            <p class="my-4 text-center text-sm text-gray-500">Actualmente no haz realizado algun pedido.</p>
                        </div>
                    </div>
                @endif
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  w-full gap-4">
                    @foreach ($pedidos as $pedido)
                        <div class="p-4 mb-6 rounded-md bg-gray-50 dark:bg-gray-900">
                            <div class="flex items-center justify-between">
                                <a href="{{ route('pedido.informacion', $pedido->id) }}"
                                    class="inline-block mb-2 text-xs font-semibold text-blue-500 uppercase hover:text-blue-600 dark:text-gray-400">
                                    Pedido #{{ $pedido->id }}
                                </a>
                                <span
                                    class="mb-2 text-xs text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($pedido->created_at)->diffForHumans() }}</span>
                            </div>
                            <div class="flex flex-wrap items-center mb-4 ">
                                <a href="#"
                                    class="flex items-center mb-2 mr-4 text-sm md:mb-0
                                @switch($pedido->estado)
                                    @case('PAGADO')
                                        text-blue-500 hover:text-blue-600
                                        @break
                                    @case('COMPLETADO')
                                       text-green-500  hover:text-green-600
                                        @break
                                    @case('PENDIENTE')
                                        text-gray-500  dark:bg-gray-800
                                        @break
                                    @case('CANCELADO')
                                        text-red-500  dark:bg-gray-800
                                        @break
                                @endswitch
                                dark:text-gray-400 dark:hover:text-gray-100">

                                    @switch($pedido->estado)
                                        @case('CANCELADO')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        @break

                                        @case('PAGADO')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        @break

                                        @case('COMPLETADO')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        @break

                                        @default
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                            </svg>
                                        @break
                                    @endswitch
                                    {{ $pedido->estado }}
                                </a>
                                <a href="#"
                                    class="flex items-center mb-2 mr-4 text-sm text-green-500 md:mb-0 hover:text-green-700 dark:text-gray-400 dark:hover:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="w-4 h-4 mr-1 bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path
                                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>{{$pedido->ciudad_envio}}
                                </a>
                            </div>
                            <div class="max-w-lg mx-auto ">
                                <h2 class="mb-2 text-lg font-medium dark:text-gray-400 ">Orden:</h2>
                                <div class="grid grid-cols-2 gap-3 mb-10 lg:grid-cols-2">
                                    <div
                                        class="flex items-center justify-between px-10 py-3 font-normal leading-8 bg-gray-50 rounded-md shadow-md dark:text-gray-400 dark:bg-gray-800 font-heading">
                                        <span>Productos:</span>
                                        <span class="flex items-center rounded-full shadow-lg p-1">
                                            <span class="text-base text-blue-500 ">{{ $pedido->productos->count() }}</span>
                                        </span>
                                    </div>
                                    <div
                                        class="flex items-center justify-between px-10 py-3 font-medium leading-8 bg-gray-50 rounded-md shadow-md dark:text-gray-400 dark:bg-gray-800 font-heading">
                                        <span>Total</span>
                                        <span class="flex items-center text-blue-500 dark:text-blue-400">
                                            <span class="ml-3 mr-1 text-sm">$</span>
                                            <span class="text-base">{{ $pedido->subtotal }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('pedido.informacion', $pedido->id) }}"
                                class='flex items-center px-2 py-2 mb-2  text-sm text-gray-100 bg-blue-500 rounded-md md:mb-0 hover:bg-blue-600 dark:text-gray-100 dark:hover:bg-blue-500 dark:bg-blue-400'>
                                <div class='mx-3'>
                                    <div class="hover:underline">Ver Detalles</div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>

            </div>
        </section>

    </div>
@endsection
