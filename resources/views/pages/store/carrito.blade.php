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
                <section class="flex items-center py-16 bg-gray-100 lg:h-screen font-poppins dark:bg-gray-800 ">
                    <div
                        class="justify-center flex-1 max-w-6xl px-6 py-6 mx-auto bg-white border rounded-md shadow dark:border-gray-900 dark:bg-gray-900 lg:py-10 md:px-7">
                        <div class="mb-8 text-center">
                            <h1
                                class="mb-4 text-3xl font-semibold leading-7 tracking-wide text-blue-800 dark:text-gray-300 lg:leading-9">
                                Thank you for your Purchase!</h1>
                            <p class="text-gray-500 dark:text-gray-400">your order number is: 012736373737</p>
                        </div>
                        <div
                            class="flex flex-col items-start justify-start w-full mt-4 mb-4 border-b border-gray-200 dark:border-gray-700 md:mt-6 md:flex-row md:items-center md:space-x-6 xl:space-x-8">
                            <div class="w-full pb-4 md:pb-6 md:w-40">
                                <img class="hidden w-full h-[150px] object-cover md:block"
                                    src="https://i.postimg.cc/wBrssYjn/pexels-timothy-paule-ii-2002717.jpg " alt="dress">
                                <img class="object-cover w-full  h-[450px] md:hidden"
                                    src="https://i.postimg.cc/wBrssYjn/pexels-timothy-paule-ii-2002717.jpg " alt="dress">
                            </div>
                            <div class="flex flex-col items-start justify-between w-full pb-6 space-y-2 md:flex-row md:space-y-0">
                                <div class="flex flex-col items-start justify-start w-full space-y-4">
                                    <h2 class="text-xl font-semibold leading-6 text-gray-800 dark:text-gray-400 xl:text-2xl">
                                        Long Coat for women</h2>
                                    <div class="flex flex-col items-start justify-start space-y-3">
                                        <p class="text-sm leading-none text-gray-800 dark:text-gray-400"><span
                                                class="text-gray-400 dark:text-gray-400">Style: </span> French Minimal
                                            Design</p>
                                        <p class="text-sm leading-none text-gray-800 dark:text-gray-400">
                                            <span class="text-gray-400 dark:text-gray-400">Size: </span> medium
                                        </p>
                                        <p class="text-sm leading-none text-gray-800 dark:text-gray-400"><span
                                                class="text-gray-400 dark:text-gray-400">Color: </span> Light yellow</p>
                                    </div>
                                </div>
                                <div class="flex items-start justify-between w-full space-x-8">
                                    <p class="text-base leading-6 dark:text-gray-400 xl:text-lg">$36.00 <span
                                            class="text-blue-300 line-through"> $45.00</span></p>
                                    <p class="text-base leading-6 text-gray-800 dark:text-gray-400 xl:text-lg">01</p>
                                    <p class="text-base font-semibold leading-6 text-gray-800 dark:text-gray-400 xl:text-lg">
                                        $36.00</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="inline-flex items-center text-sm font-medium dark:text-gray-400 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="w-4 h-4 mr-2 text-blue-500 dark:hover:text-gray-300 dark:text-gray-400 hover:text-blue-600 bi bi-envelope"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg>
                            we have sent confirmation email to abc@gmail.com with the order details.
                        </a>
                        <div class="flex flex-wrap items-center justify-between gap-4 mt-6 ">
                            <button
                                class="w-full px-4 py-2 text-blue-500 border border-blue-500 rounded-md md:w-auto hover:text-gray-100 hover:bg-blue-600 dark:border-gray-700 dark:hover:bg-gray-700 dark:text-gray-300">
                                Go back shopping
                            </button>
                            <button
                                class="w-full px-4 py-2 bg-blue-500 rounded-md text-gray-50 md:w-auto hover:bg-blue-600 dark:hover:bg-gray-700 dark:bg-gray-600">
                                Track Order
                            </button>
                        </div>
                    </div>
                </section>
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
            </body>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
                integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>


        </div>
    </div>

@endsection
