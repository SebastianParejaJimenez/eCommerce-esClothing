
@if (Cart::content()->count())
<div class="bg-white">
    <div class="max-w-2xl mx-auto pt-10 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h1 class="text-xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Carrito de Compras </h1>
        <div class="mt-12 lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">
            <section aria-labelledby="cart-heading" class="lg:col-span-7">
                <h2 id="cart-heading" class="sr-only">Items del carrito de Compras</h2>

                <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                    @foreach (Cart::content() as $item)
                        <li class="flex py-6 sm:py-10">
                            <div class="flex-shrink-0">
                                <img src="{{ url('productos_subidos') }}/{{ $item->options->urlfoto }}"
                                    alt="imagen."
                                    class="w-24 h-24 rounded-md object-center object-cover sm:w-48 sm:h-48">
                            </div>

                            <div class="ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                                <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                    <div>
                                        <div class="flex justify-between">
                                            <h3 class="text-sm">
                                                <a href="#"
                                                    class="font-medium text-gray-700 hover:text-gray-800">
                                                    {{ $item->name }} </a>
                                            </h3>
                                        </div>
                                        <div class="mt-1 flex text-sm">
                                            <p class="text-gray-500">{{ $item->options->categoria }}</p>

                                            <p class="ml-4 pl-4 border-l border-gray-200 text-gray-500">
                                                {{ $item->options->talla }}</p>
                                        </div>
                                        <p class="mt-1 text-sm font-medium text-gray-900">
                                            ${{ number_format($item->qty * $item->price, 2) }}</p>
                                    </div>

                                    <div class=" block mt-4 sm:mt-0 sm:pr-9">
                                        <label for="quantity-0" class="sr-only">Cantidad</label>

                                        <div class="flex items-center border-gray-100">
                                            <a href="{{ route('decrementarcantidad', ['id' => $item->rowId]) }}"
                                                class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                - </a>
                                            <input disabled
                                                class="h-8 w-12  bg-white  text-xs outline-none border border-gray-300 text-base focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                type="number" value="{{ $item->qty }}" min="1" >

                                            <a href="{{ route('incrementarcantidad', ['id' => $item->rowId]) }}"
                                                class="cursor-pointer rounded-r bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                + </a>
                                        </div>
                                        <div class="absolute top-0 right-0">
                                            <a href="{{ route('eliminaritem', ['id' => $item->rowId]) }}"
                                                type="button"
                                                class="-m-2 p-2 inline-flex text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Eliminar</span>
                                                <!-- Heroicon name: solid/x -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <p class="mt-4 flex text-sm text-gray-700 space-x-2">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="flex-shrink-0 h-5 w-5 text-green-500"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>In stock</span>
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </section>

            <!-- Order summary -->
                <section aria-labelledby="summary-heading"
                    class="mt-16 bg-gray-50 rounded-lg px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-5">
                    <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Resumen Compra</h2>

                    <dl class="mt-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <dt class="text-sm text-gray-600">Subtotal</dt>
                            <dd class="text-sm font-medium text-gray-900">${{ Cart::subtotal() }}</dd>
                        </div>

                        <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
                            <dt class="flex text-sm text-gray-600">
                                <span>IVA 19%</span>
                                <a href="#"
                                    class="ml-2 flex-shrink-0 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Learn more about how tax is calculated</span>
                                </a>
                            </dt>
                            <dd class="text-sm font-medium text-gray-900">${{ Cart::tax() }}</dd>
                        </div>
                        <div class="border-t border-gray-200 pt-4 flex items-center justify-between">
                            <dt class="text-base font-medium text-gray-900">Total de la Compra</dt>
                            <dd class="text-base font-medium text-gray-900">${{ Cart::total() }}</dd>
                        </div>
                    </dl>


                    @switch(True)
                        @case(Auth::check())
                            @if (auth()->user()->direccion &&
                                    auth()->user()->ciudad &&
                                    auth()->user()->pais &&
                                    auth()->user()->codigo_postal &&
                                    auth()->user()->numero_telefono)
                                <form action="{{ url('/session') }}" method="POST">
                                    @csrf
                                    <button
                                        class="mt-6 w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-50 focus:ring-indigo-500">Continuar
                                        Compra
                                    </button>
                                </form>
                                <form action="{{ route('eliminarcarrito') }}">
                                    <button
                                        class="mt-6 w-full bg-gray-600 border border-transparent rounded-md shadow-sm py-2 px-4 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-gray-500">Vaciar
                                        Carrito
                                    </button>
                                </form>

                                <x-tienda.datos-envio />
                            @else
                                <button onclick="openModal()"
                                    class="bg-white w-full mt-3 hover:bg-gray-100 text-gray-800 font-medium py-2 px-3 border border-gray-400 rounded shadow">
                                    Completa tu Informacion de Usuario
                                </button>
                                <p class="text-sm mt-2 text-gray-700">¡Para hacer un pedido debes tener todos tus
                                    datos
                                    de
                                    usuarios!</p>

                                <x-tienda.datos-envio />
                            @endif
                        @break

                        @default
                            <form action="{{ route('login') }}">
                                <button
                                    class="bg-white w-full mt-3 hover:bg-gray-100 text-gray-800 font-semibold py-2 px-3 border border-gray-400 rounded shadow">
                                    Inicia Sesión
                                </button>
                            </form>
                            <p class="text-sm mt-2 text-gray-700">¡Para hacer un pedido debes antes Iniciar Sesión!
                            </p>
                    @endswitch

                </section>

        </div>
    </div>
</div>
@else
<div class="bg-white border border-gray-200 flex flex-col items-center justify-center px-2 md:px-8 lg:px-24 py-8 rounded-lg shadow-2xl content-center mt-20 ">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><path d="M7.5 18a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3Zm9 0a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3Z"/><path stroke-linecap="round" d="m11.5 12.5l3-3m0 3l-3-3M2 3l.261.092c1.302.457 1.953.686 2.325 1.231c.372.545.372 1.268.372 2.715V9.76c0 2.942.063 3.912.93 4.826c.866.914 2.26.914 5.05.914H12m4.24 0c1.561 0 2.342 0 2.894-.45c.551-.45.709-1.214 1.024-2.743l.5-2.424c.347-1.74.52-2.609.076-3.186c-.443-.577-1.96-.577-3.645-.577h-6.065m-6.066 0H7"/></g></svg>
    <p class="text-xl md:text-1xl lg:text-2xl font-bold tracking-wider text-gray-500 mt-4">Carrito de Compras Vacío</p>
    <p class="text-gray-500 mt-4 pb-4 border-b-2 text-center">Vuelve a la tienda para añadir productos al carrito.</p>
    <a href="{{ url()->previous() }}" class="flex items-center space-x-2 bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 mt-6 rounded transition duration-150" title="Return Home">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
        </svg>
        <span>Volver</span>
    </a>
</div>
@endif
