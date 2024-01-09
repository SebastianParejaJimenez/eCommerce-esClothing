<div id="resultado-pedido" x-data="{ open: false }" class="bg-white border-t border-b border-gray-300 shadow-sm sm:rounded-lg sm:border">
    <div class="flex items-center p-4 border-b border-gray-200 sm:p-6 sm:grid sm:grid-cols-4 sm:gap-x-6">
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
                <dt class="font-medium text-gray-900">Total (Más IVA) </dt>
                <dd class="mt-1 font-medium text-gray-900">
                    ${{ number_format($pedido->total, 0, ',', '.') }}</dd>
            </div>
        </dl>

        {{-- Menus desplegables --}}
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

        {{-- Menus desplegables --}}
        <div class="hidden lg:col-span-2 lg:flex lg:items-center lg:justify-end lg:space-x-4">
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

    @switch(True)
        @case($pedido->estado == "PENDIENTE")
            @break
        @case($pedido->estado == "PAGADO")
            @break
        @case($pedido->estado == "ACEPTADO")

            @break
        @case($pedido->estado == "COMPLETADO")
            @break

        @default

    @endswitch

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

        <nav aria-label="Progress">
            @if ($pedido->estado !== "CANCELADO")

            <ol role="list" class=" rounded-md divide-y divide-gray-300 md:flex md:divide-y-0">
                <li class="relative md:flex-1 md:flex">

                    @if ($pedido->estado == "PENDIENTE" || $pedido->estado == "PAGADO" || $pedido->estado == "ACEPTADO" || $pedido->estado == "COMPLETADO")
                    <a href="#" class="group flex items-center w-full">
                        <span class="px-6 py-4 flex items-center text-sm font-medium">
                            <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                            <!-- Heroicon name: solid/check -->
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-900">Pendiente</span>
                        </span>
                        </a>
                    @else
                    <a href="#" class="px-6 py-4 flex items-center text-sm font-medium" aria-current="step">
                        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                            <span class="text-indigo-600">01</span>
                        </span>
                        <span class="ml-4 text-sm font-medium text-indigo-600">Pendiente</span>
                    </a>
                    @endif
                    <div class="hidden md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                    </svg>
                    </div>
                </li>

                <li class="relative md:flex-1 md:flex">
                    <!-- Current Step -->
                    @if ($pedido->estado == "PAGADO" || $pedido->estado == "ACEPTADO" || $pedido->estado == "COMPLETADO")
                    <a href="#" class="group flex items-center w-full">
                        <span class="px-6 py-4 flex items-center text-sm font-medium">
                            <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                            <!-- Heroicon name: solid/check -->
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-900">Pagado</span>
                        </span>
                        </a>
                    @else

                    <a href="#" class="px-6 py-4 flex items-center text-sm font-medium" aria-current="step">
                        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                            <span class="text-indigo-600">02</span>
                        </span>
                        <span class="ml-4 text-sm font-medium text-indigo-600">Pagado</span>
                    </a>

                    @endif



                    <!-- Arrow separator for lg screens and up -->
                    <div class="hidden md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                    </svg>
                    </div>
                </li>
                <li class="relative md:flex-1 md:flex">
                    <!-- Current Step -->
                    @if ($pedido->estado == "ACEPTADO" || $pedido->estado == "COMPLETADO")
                    <a href="#" class="group flex items-center w-full">
                        <span class="px-6 py-4 flex items-center text-sm font-medium">
                            <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                            <!-- Heroicon name: solid/check -->
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-900">Aceptado</span>
                        </span>
                        </a>
                    @else
                    <a href="#" class="px-6 py-4 flex items-center text-sm font-medium" aria-current="step">
                        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                            <span class="text-indigo-600">03</span>
                        </span>
                        <span class="ml-4 text-sm font-medium text-indigo-600">Aceptado</span>
                    </a>
                    @endif


                    <!-- Arrow separator for lg screens and up -->
                    <div class="hidden md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                    </svg>
                    </div>
                </li>

                <li class="relative md:flex-1 md:flex">
                    @if ($pedido->estado == "COMPLETADO")
                    <a href="#" class="group flex items-center">
                        <span class="px-6 py-4 flex items-center text-sm font-medium">
                            <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                            <!-- Heroicon name: solid/check -->
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-900">Enviado</span>
                        </span>
                        </a>
                    @else
                    <a href="#" class="group flex items-center">
                    <span class="px-6 py-4 flex items-center text-sm font-medium">
                        <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                        <span class="text-indigo-600">04</span>
                        </span>
                        <span class="ml-4 text-sm font-medium text-indigo-600">Enviado</span>
                    </span>
                    </a>
                    @endif
                </li>
            </ol>
            @endif


        </nav>

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
                            <span>
                                <h5>{{ $producto->nombre }}</h5>
                                <h2 class="text-gray-400">(x{{$producto->pivot->cantidad}})</h2>
                            </span>
                            <span>
                                <p class="mt-2 sm:mt-0"> Valor Unitario: ${{ number_format($producto->pivot->precio, 0, ',', '.') }}</p>
                                <p class="mt-2 sm:mt-0">Total: ${{ number_format($producto->pivot->precio * $producto->pivot->cantidad, 0, ',', '.') }}</p>

                            </span>

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
    <section class="flex items-center p-2 border-t border-gray-200 sm:p-3 sm:grid sm:grid-cols-4 sm:gap-x-6">
        <div class="mt-1 sm:flex sm:justify-between">
            <div class="flex items-center">
                <!-- Heroicon name: solid/check-circle -->
                <svg class="w-5 h-5
                    @switch($pedido->estado)
                    @case('PAGADO')
                        text-blue-500 hover:text-blue-600
                        @break
                    @case('ACEPTADO')
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
    </section>

</div>
