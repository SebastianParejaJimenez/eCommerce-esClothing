@if (count(Cart::content()))
    <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'"
        class="z-50 fixed right-0 top-0 max-w-md w-screen h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-2 border-gray-300">

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 ">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full">
                    <div class="pointer-events-auto w-screen max-w-md ">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Resumen de Compra</h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button  @click="cartOpen = !cartOpen"
                                            class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                            <span class="absolute -inset-0.5"></span>
                                            <span class="sr-only">Close panel</span>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>

                                    </div>
                                </div>

                                <div class="mt-8">
                                    <div class="flow-root">
                                        <ul role="list" class="-my-6 divide-y divide-gray-200">
                                            @foreach (Cart::content() as $item)
                                            <li class="flex py-6">
                                                <div
                                                    class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                    <img src="{{ url('productos_subidos') }}/{{ $item->options->urlfoto }}"
                                                        alt="Imagen Producto"
                                                        class="h-full w-full object-cover object-center">
                                                </div>

                                                <div class="ml-4 flex flex-1 flex-col">
                                                    <div>
                                                        <div
                                                            class="flex justify-between text-base font-medium text-gray-900">
                                                            <h3>
                                                                <a href="#">{{$item->name}}</a>
                                                            </h3>
                                                            <p class="ml-4">${{number_format($item->price, 0, ',', '.')}}</p>
                                                        </div>
                                                        <p class="mt-1 text-sm text-gray-500">Categoria: {{$item->options->categoria}}</p>

                                                        <p class="mt-1 text-sm text-gray-500">Talla: {{$item->options->talla}}</p>
                                                    </div>
                                                    <div class="flex flex-1 items-end justify-between text-sm">
                                                        <p class="text-gray-500">Cantidad: {{$item->qty}}</p>

                                                        <div class="flex">
                                                            <a href="{{route('eliminaritem', $item->rowId)}}" type="button"
                                                                class="font-medium text-indigo-600 hover:text-indigo-500">Eliminar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                            <!-- More products... -->
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Total</p>
                                    <p>${{Cart::subtotal()}}</p>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                <div class="mt-6">
                                    <a href="{{route('carrito_detalles')}}"
                                        class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Continuar Compra</a>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                    <p>
                                        o
                                        <a href="{{route('eliminarcarrito')}}" type="button"
                                            class="font-medium text-gray-600 hover:text-gray-500">
                                            Eliminar Carrito
                                            <span aria-hidden="true"> &rarr;</span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
