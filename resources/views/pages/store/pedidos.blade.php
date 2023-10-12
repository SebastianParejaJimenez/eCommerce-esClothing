@extends('layouts.appstore')

@section('title', 'Página de inicio')

<div x-data="{ cartOpen: false, isOpen: false }" class="bg-white">
    @section('content')
        <x-productos.carrito-header />
        <!-- component -->
        <section class="bg-white">

            <div class="py-8 sm:py-16">

                <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
                    <div class="max-w-2xl mx-auto px-4 lg:max-w-4xl lg:px-0">
                        <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Historial de Ordenes
                        </h1>
                        <p class="mt-2 text-sm text-gray-500">Acá podras consultar tus ordenes hechas</p>
                    </div>
                </div>

                {{-- Lista --}}
                <div class="mt-16">
                    <h2 class="sr-only">Ordenes Recientes</h2>
                    <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
                        <div class="max-w-2xl mx-auto space-y-8 sm:px-4 lg:max-w-4xl lg:px-0">
                            <div class="mt-6 md:flex md:items-center md:justify-between">
                                <div
                                    class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                                    <a href="{{ route('pedidos_hechos') }}" type="button"
                                        class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200
                                        @if ($buscarPedido == false) {{ 'bg-gray-100' }} @endif sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                                        Ver Todos
                                    </a>

                                    <button
                                        class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm @if ($buscarPedido == true) {{ ' bg-gray-100' }} @endif dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                                        Filtrando
                                    </button>
                                </div>
                                <form action="{{ route('buscar-pedido') }}" method="POST"
                                    class="relative flex items-center mt-4 md:mt-0">
                                    @csrf
                                    <span class="absolute">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                        </svg>
                                    </span>
                                    <input id="id-pedido" name="id-pedido" type="text"
                                        placeholder="Buscar por ID de Pedido"
                                        class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">

                                    <button type="submit"
                                        class="inline-flex items-center py-1.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg
                                            class="-ml-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            @if ($buscarPedido == true)
                                <div id="resultado-pedido" x-data="{ open: false }"
                                    class="relative bg-white border-t border-b border-gray-300 shadow-sm sm:rounded-lg sm:border">
                                    <h3 class="sr-only">Order placed on <time datetime="2021-07-06">Jul 6, 2021</time></h3>

                                    <div
                                        class="flex items-center p-4 border-b border-gray-200 sm:p-6 sm:grid sm:grid-cols-4 sm:gap-x-6">
                                        <dl
                                            class="flex-1 grid grid-cols-2 gap-x-6 text-sm sm:col-span-3 sm:grid-cols-3 lg:col-span-2">
                                            <div>
                                                <dt class="font-medium text-gray-900">Orden</dt>
                                                <dd class="mt-1 text-gray-500">#{{ $pedido->id }}</dd>
                                            </div>
                                            <div class="hidden sm:block">
                                                <dt class="font-medium text-gray-900">Fecha</dt>
                                                <dd class="mt-1 text-gray-500">
                                                    <time
                                                        datetime="2021-07-06">{{ \Carbon\Carbon::parse($pedido->created_at)->diffForHumans() }}</time>
                                                </dd>
                                            </div>
                                            <div>
                                                <dt class="font-medium text-gray-900">Total amount</dt>
                                                <dd class="mt-1 font-medium text-gray-900">
                                                    ${{ number_format($pedido->total, 0, ',', '.') }}</dd>
                                            </div>
                                        </dl>

                                        <div x-data="{ openMenu: false }" class="relative flex justify-end lg:hidden">
                                            <div class="flex items-center">
                                                <button @click="open = ! open" type="button"
                                                    class="-m-2 p-2 flex items-center text-gray-400 hover:text-gray-500"
                                                    id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                                                    <span class="sr-only">Ver detalles del pedido</span>

                                                    <span class="inline-block mx-2">
                                                        <svg class="w-4 h-4 transition-transform transform"
                                                            :class="{ 'rotate-180': open }"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M19 9l-7 7-7-7" />
                                                        </svg>
                                                    </span>
                                                </button>

                                                <button @click="openMenu = true" type="button"
                                                    class="-m-2 p-2 flex items-center text-gray-400 hover:text-gray-500"
                                                    id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                                                    <span class="sr-only">Options for order WU88191111</span>
                                                    <!-- Heroicon name: outline/dots-vertical -->
                                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                    </svg>
                                                </button>
                                            </div>

                                            <div @click.outside="openMenu = false" x-show="openMenu"
                                                x-transition:enter="transition ease-out duration-100"
                                                x-transition:enter-start="transform opacity-0 scale-95"
                                                x-transition:enter-end="transform opacity-100 scale-100"
                                                x-transition:leave="transition ease-in duration-75"
                                                x-transition:leave-start="transform opacity-100 scale-100"
                                                x-transition:leave-end="transform opacity-0 scale-95" x-cloak
                                                class="origin-bottom-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                role="menu" aria-orientation="vertical"
                                                aria-labelledby="menu-0-button" tabindex="-1">
                                                <div class="py-1" role="none">
                                                    <a href="{{ route('pedido-pdf', $pedido->id) }}"
                                                        class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                        tabindex="-1" id="menu-0-item-1"> Descargar Detalles </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="hidden lg:col-span-2 lg:flex lg:items-center lg:justify-end lg:space-x-4">

                                            <a @click="open = ! open"
                                                class="flex items-center justify-center bg-white py-2 px-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <span> Detalles </span>
                                                <span class="inline-block mx-2">
                                                    <svg class="w-4 h-4 transition-transform transform"
                                                        :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <a href="{{ route('pedido-pdf', $pedido->id) }}"
                                                class="flex items-center justify-center bg-white py-2 px-2.5 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <span>Descargar Detalles</span>
                                                <span class="sr-only">Para la orden {{ $pedido->id }}</span>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Productos -->
                                    <h4 class="sr-only">Items</h4>
                                    <ul x-show="open" x-transition:enter="transition ease-out duration-200 "
                                    x-transition:enter-start="opacity-0 " x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0" x-cloak role="list" class="divide-y divide-gray-200">
                                        <li class="p-4 sm:p-6">
                                            @foreach ($pedido->productos as $producto)
                                                <div class="flex items-center sm:items-start py-3">
                                                    <div
                                                        class="flex-shrink-0 w-20 h-20 bg-gray-200 rounded-lg overflow-hidden sm:w-22 sm:h-22 ">
                                                        <img src="{{ url('productos_subidos') }}/{{ $producto->imagen }}"
                                                            alt="{{ $producto->nombre }}."
                                                            class="w-full h-full object-center object-cover">
                                                    </div>

                                                    <div class="flex-1 ml-6 text-sm">
                                                        <div class="font-medium text-gray-900 sm:flex sm:justify-between">
                                                            <h5>{{ $producto->nombre }}</h5>
                                                            <p class="mt-2 sm:mt-0">
                                                                ${{ number_format($producto->pivot->precio, 0, ',', '.') }}
                                                            </p>
                                                        </div>
                                                        <p class="hidden text-gray-500 sm:block sm:mt-2">Talla:
                                                            {{ $producto->pivot->talla }}.</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </li>
                                        <!-- More products... -->
                                    </ul>

                                    <!-- Estado -->

                                    <div
                                        class="flex items-center p-2 border-t border-gray-200 sm:p-3 sm:grid sm:grid-cols-4 sm:gap-x-6">
                                        <div class="mt-2 sm:flex sm:justify-between">
                                            <div class="flex items-center">
                                                <!-- Heroicon name: solid/check-circle -->
                                                <svg class="w-5 h-5
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
                                                "
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <p class="ml-2 text-sm font-medium text-gray-500">Estado del Pedido:
                                                    {{ $pedido->estado }}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @else
                                @foreach ($pedidos as $pedido)
                                    <div id="resultado-pedido" x-data="{ open: false }"
                                        class="bg-white border-t border-b border-gray-300 shadow-sm sm:rounded-lg sm:border">
                                        <div
                                            class="flex items-center p-4 border-b border-gray-200 sm:p-6 sm:grid sm:grid-cols-4 sm:gap-x-6">
                                            <dl
                                                class="flex-1 grid grid-cols-2 gap-x-6 text-sm sm:col-span-3 sm:grid-cols-3 lg:col-span-2">
                                                <div>
                                                    <dt class="font-medium text-gray-900">Orden</dt>
                                                    <dd class="mt-1 text-gray-500">#{{ $pedido->id }}</dd>
                                                </div>
                                                <div class="hidden sm:block">
                                                    <dt class="font-medium text-gray-900">Fecha</dt>
                                                    <dd class="mt-1 text-gray-500">
                                                        <time
                                                            datetime="2021-07-06">{{ \Carbon\Carbon::parse($pedido->created_at)->diffForHumans() }}</time>
                                                    </dd>
                                                </div>
                                                <div>
                                                    <dt class="font-medium text-gray-900">Total </dt>
                                                    <dd class="mt-1 font-medium text-gray-900">
                                                        ${{ number_format($pedido->total, 0, ',', '.') }}</dd>
                                                </div>
                                            </dl>

                                            <div x-data="{ openMenu: false }" class="relative flex justify-end lg:hidden">
                                                <div class="flex items-center">
                                                    <button @click="open = ! open" type="button"
                                                        class="-m-2 p-2 flex items-center text-gray-400 hover:text-gray-500"
                                                        id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                                                        <span class="sr-only">Ver detalles del pedido</span>

                                                        <span class="inline-block mx-2">
                                                            <svg class="w-4 h-4 transition-transform transform"
                                                                :class="{ 'rotate-180': open }"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M19 9l-7 7-7-7" />
                                                            </svg>
                                                        </span>
                                                    </button>

                                                    <button @click="openMenu = true" type="button"
                                                        class="-m-2 p-2 flex items-center text-gray-400 hover:text-gray-500"
                                                        id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                                                        <span class="sr-only">Opciones</span>
                                                        <!-- Heroicon name: outline/dots-vertical -->
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                            aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                        </svg>
                                                    </button>
                                                </div>

                                                <div @click.outside="openMenu = false" x-show="openMenu"
                                                    x-transition:enter="transition ease-out duration-100"
                                                    x-transition:enter-start="transform opacity-0 scale-95"
                                                    x-transition:enter-end="transform opacity-100 scale-100"
                                                    x-transition:leave="transition ease-in duration-75"
                                                    x-transition:leave-start="transform opacity-100 scale-100"
                                                    x-transition:leave-end="transform opacity-0 scale-95" x-cloak
                                                    class="origin-bottom-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                    role="menu" aria-orientation="vertical"
                                                    aria-labelledby="menu-0-button" tabindex="-1">
                                                    <div class="py-1" role="none">
                                                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                                        <a href="{{ route('pedido-pdf', $pedido->id) }}"
                                                            class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                                                            tabindex="-1" id="menu-0-item-0"> Descargar Detalles </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="hidden lg:col-span-2 lg:flex lg:items-center lg:justify-end lg:space-x-4">

                                                <a @click="open = ! open"
                                                    class="flex items-center justify-center bg-white py-2 px-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    <span> Detalles </span>
                                                    <span class="inline-block mx-2">
                                                        <svg class="w-4 h-4 transition-transform transform"
                                                            :class="{ 'rotate-180': open }"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M19 9l-7 7-7-7" />
                                                        </svg>
                                                    </span>
                                                </a>
                                                <a href="{{ route('pedido-pdf', $pedido->id) }}"
                                                    class="flex items-center justify-center bg-white py-2 px-2.5 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    <span>Descargar Detalles</span>
                                                    <span class="sr-only">Para la orden {{ $pedido->id }}</span>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Productos -->
                                        <h4 class="sr-only">Items</h4>
                                        <ul x-show="open" 
                                        x-transition:enter="transition ease-out duration-200 "
                                        x-transition:enter-start="opacity-0 " 
                                        x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-150" 
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0" 
                                        x-cloak 
                                        role="list" class="divide-y divide-gray-200">
                                            <li class="p-4 sm:p-6">
                                                @foreach ($pedido->productos as $producto)
                                                    <div class="flex items-center sm:items-start py-3">
                                                        <div
                                                            class="flex-shrink-0 w-20 h-20 bg-gray-200 rounded-lg overflow-hidden sm:w-22 sm:h-22 ">
                                                            <img src="{{ url('productos_subidos') }}/{{ $producto->imagen }}"
                                                                alt="{{ $producto->nombre }}."
                                                                class="w-full h-full object-center object-cover">
                                                        </div>

                                                        <div class="flex-1 ml-6 text-sm">
                                                            <div
                                                                class="font-medium text-gray-900 sm:flex sm:justify-between">
                                                                <h5>{{ $producto->nombre }}</h5>
                                                                <p class="mt-2 sm:mt-0">
                                                                    ${{ number_format($producto->pivot->precio, 0, ',', '.') }}
                                                                </p>
                                                            </div>
                                                            <p class="hidden text-gray-500 sm:block sm:mt-2">Talla:
                                                                {{ $producto->pivot->talla }}.</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </li>
                                            <!-- More products... -->
                                        </ul>

                                        <!-- Estado -->

                                        <div
                                            class="flex items-center p-2 border-t border-gray-200 sm:p-3 sm:grid sm:grid-cols-4 sm:gap-x-6">
                                            <div class="mt-2 sm:flex sm:justify-between">
                                                <div class="flex items-center">
                                                    <!-- Heroicon name: solid/check-circle -->
                                                    <svg class="w-5 h-5
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
                                            "
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <p class="ml-2 text-sm font-medium text-gray-500">Estado del Pedido:
                                                        {{ $pedido->estado }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @endif

                            {{ $pedidos->links() }}
                        </div>
                    </div>

                </div>

                @if (!$pedidos->count())
                    <x-tienda.no-pedidos/>
                @endif

            </div>



        </section>
</div>



@endsection

@section('scripts')
    @if (session('error') == 'not_found')
        <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Pedido no Encontrado.',
                    text: "No se encontro algun pedido que tenga este ID.",

                    showConfirmButton: false,
                    timer: 5000
                })
        </script>
    @endif
@endsection
