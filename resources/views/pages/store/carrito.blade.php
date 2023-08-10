@extends('layouts.appstore')

@section('title', 'Carrito de Compras')

@section('content')

    <div class="bg-gray-100 dark:bg-slate-700">
        <div class="mx-auto max-w-2xl px-3 py-0.5 sm:px-6 sm:py-0.5 lg:max-w-7xl lg:px-5">

            <style>
                @layer utilities {

                    input[type="number"]::-webkit-inner-spin-button,
                    input[type="number"]::-webkit-outer-spin-button {
                        -webkit-appearance: none;
                        margin: 0;
                    }
                }
            </style>

            <body>
                @if (session('success'))
                <div class="mt-5 px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
                    <p class="font-bold">Se ha procesado el pago con exito!</p>
                  </div>
                @endif
                @if (session('canceled'))
                <div class=" mt-5 px-4 py-3 leading-normal text-red-100 bg-red-700 rounded-lg" role="alert">
                    <p>El Pago ha sido cancelado o ha ocurrido algun error!</p>
                  </div>
                @endif

            <div class="h-screen bg-gray-100 pt-10">
                    <h1 class="mb-10 text-center text-2xl font-bold">Carrito de Compras</h1>
                    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                        <div class="rounded-lg md:w-2/3">
                            @foreach (Cart::content() as $item)
                                <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                    <img src="{{ url('productos_subidos') }}/{{ $item->options->urlfoto }}" width="100"
                                        height="100" alt="IMAGEN" class="w-full rounded-lg sm:w-20 sm:h-30" />
                                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                        <div class="mt-5 sm:mt-0">
                                            <h2 class="text-lg font-bold text-gray-900">{{ $item->name }}</h2>
                                            <p class="mt-1 text-xs text-gray-700">{{ $item->options->categoria }}</p>
                                        </div>
                                        <div
                                            class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                            <div class="flex items-center border-gray-100">
                                                <a href="{{ route('decrementarcantidad', ['id' => $item->rowId]) }}"
                                                    class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                    - </a>
                                                <input disabled   class="h-8 w-10 border bg-white text-center text-xs outline-none"
                                                    type="number" value="{{ $item->qty }}" min="1" />
                                                <a href="{{ route('incrementarcantidad', ['id' => $item->rowId]) }}"
                                                    class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                    + </a>

                                            </div>
                                            <div class="flex items-center space-x-5">
                                                <p class="text-sm">{{ number_format($item->qty * $item->price, 2) }}</p>

                                                <a href="{{ route('eliminaritem', ['id' => $item->rowId]) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="h-7 w-7 cursor-pointer duration-150 hover:text-red-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if (!Cart::content()->count())
                                <div
                                    class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                        <div class="mt-5 sm:mt-0 ">
                                            <h2 class="text-xl font-bold text-gray-900 ">No existen productos dentro del
                                                Carrito.</h2>
                                            <p class=" mt-1 text-s text-gray-700">¡Ve a la <a href="{{ route('tienda') }}"
                                                    class="underline text-sky-400/100">Tienda</a> y empieza a agregar
                                                productos a tu carrito!</p>
                                        </div>
                                    </div>
                                </div>
                            @endif



                        </div>


                        <!-- Sub total -->
                        @if (Cart::content()->count())
                            <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                                <div class="mb-2 flex justify-between">
                                    <p class="text-gray-700">Subtotal</p>
                                    <p class="text-gray-700">${{ Cart::subtotal() }}</p>
                                </div>
                                <hr class="my-4" />
                                <div class="flex justify-between">
                                    <p class="text-lg font-bold">Total</p>
                                    <div class="">
                                        <p class="mb-1 text-lg font-bold">${{ Cart::subtotal() }}</p>
                                    </div>
                                </div>

                                @auth
                                <form action="{{ url('/session') }}" method="POST">
                                    @csrf
                                    <button
                                        class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Continuar Compra
                                    </button>
                                </form>

                                    <form action="{{ route('eliminarcarrito') }}">
                                        <button class="mt-6 w-full rounded-md bg-gray-500 py-1.5 font-medium text-blue-50 hover:bg-gray-600">Vaciar
                                            Carrito
                                        </button>
                                    </form>

                                @else
                                    <form action="{{ route('login') }}">
                                        <button
                                            class="bg-white w-full mt-2 hover:bg-gray-100 text-gray-800 font-semibold py-2 px-3 border border-gray-400 rounded shadow">
                                            Inicia Sesión
                                        </button>
                                    </form>
                                    <p class="text-sm mt-2 text-gray-700">¡Para hacer un pedido debes antes Iniciar Sesión!</p>
                                @endauth


                            </div>
                        @endif
                    </div>

                </div>
            </body>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous">
            </script>


        </div>
    </div>

@endsection
