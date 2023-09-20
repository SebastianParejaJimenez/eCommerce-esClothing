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

                <!-- component -->
            @if (session('success'))

                <div class="bg-gray-100 h-screen p-32 z-50">
                    <div class="bg-white p-6  md:mx-auto">
                      <svg viewBox="0 0 24 24" class="text-green-500 w-16 h-16 mx-auto my-6">
                          <path fill="currentColor"
                              d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                          </path>
                      </svg>
                        <div class="text-center">
                            <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">¡Pago Realizado!</h3>
                            <p class="text-gray-600 my-2">Gracias por realizar tu compra, te contactaremos via tu correo para mas informacion sobre tu pedido.</p>
                            <p> Ten un buen dia!  </p>
                            <div class="py-10 text-center">
                                <a href="{{route('pedidos_hechos')}}" class="px-12 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-3">
                                    Ir a ver tus Pedidos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                 @elseif (session('canceled'))
                    <div class=" mt-5 px-4 py-3 leading-normal text-red-100 bg-red-700 rounded-lg" role="alert">
                        <p>El Pago ha sido cancelado o ha ocurrido algun error!</p>
                    </div>
                @else
                <div class="h-screen bg-gray-100 pt-10">

                    <h1 class="mb-10 text-center text-2xl font-bold">Carrito de Compras</h1>
                    <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                        <div class="rounded-lg md:w-2/3">
                            @foreach (Cart::content() as $item)
                                <div class=" relative justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                <a href="{{ route('eliminaritem', ['id' => $item->rowId]) }}" class="absolute top-2 right-2 text-gray-300  hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="w-6 h-6 bi bi-x-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </a>

                                    <img src="{{ url('productos_subidos') }}/{{ $item->options->urlfoto }}" width="100"
                                        height="100" alt="IMAGEN" class="w-full rounded-lg sm:w-20 sm:h-30" />
                                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                        <div class="w-full px-4 mb-6 md:w-auto xl:mb-0">
                                            <a href="" class="block mb-5 text-xl font-medium dark:text-gray-400 hover:underline" href="#">
                                                {{ $item->name }}</a>
                                            <div class="flex flex-wrap">
                                                <p class="mr-4 text-sm font-medium">
                                                    <span class="dark:text-gray-400">Categoria:</span>
                                                    <span class="ml-2 text-gray-400 dark:text-gray-400">{{ $item->options->categoria }}</span>
                                                </p>
                                                <p class="text-sm font-medium dark:text-gray-400">
                                                    <span>Talla:</span>
                                                    <span class="ml-2 text-gray-400"> {{ $item->options->talla}}</span>
                                                </p>
                                            </div>
                                        </div>


                                        <div
                                            class="mt-4 flex justify-between  sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                            <div class="mt-4 flex items-center border-gray-100">
                                                <a href="{{ route('decrementarcantidad', ['id' => $item->rowId]) }}"
                                                    class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                    - </a>
                                                <input disabled
                                                    class="h-8 w-10 border bg-white text-center text-xs outline-none"
                                                    type="number" value="{{ $item->qty }}" min="1" />
                                                <a href="{{ route('incrementarcantidad', ['id' => $item->rowId]) }}"
                                                    class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                    + </a>

                                            </div>
                                            <div class="flex items-center space-x-5">
                                                <span class="text-lg font-medium text-gray-500 dark:text-gray-400 ">
                                                    <span class="text-sm">$</span>
                                                    <span>{{ number_format($item->qty * $item->price, 2) }}</span>
                                                </span>
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
                                <div class="mb-2 flex justify-between">
                                    <p class="text-gray-700">IVA 19%</p>
                                    <p class="text-gray-700">{{ Cart::tax() }}</p>
                                </div>
                                <hr class="my-4" />
                                <div class="flex justify-between">
                                    <p class="text-lg font-bold">Total</p>
                                    <div class="">
                                        <p class="mb-1 text-lg font-bold text-right	 ">${{ Cart::total() }}</p>
                                        <p class="text-sm text-gray-700">Incluyendo IVA</p>
                                    </div>
                                </div>

                                @auth
                                    <form action="{{ url('/session') }}" method="POST">
                                        @csrf
                                        <button
                                            class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Continuar
                                            Compra
                                        </button>
                                    </form>

                                    <form action="{{ route('eliminarcarrito') }}">
                                        <button
                                            class="mt-6 w-full rounded-md bg-gray-500 py-1.5 font-medium text-blue-50 hover:bg-gray-600">Vaciar
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
                 @endif


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
                integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>


        </div>
    </div>

@endsection
