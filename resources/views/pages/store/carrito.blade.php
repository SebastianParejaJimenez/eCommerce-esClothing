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

                .animated {
                    -webkit-animation-duration: 1s;
                    animation-duration: 1s;
                    -webkit-animation-fill-mode: both;
                    animation-fill-mode: both;
                }

                .animated.faster {
                    -webkit-animation-duration: 500ms;
                    animation-duration: 500ms;
                }

                .fadeIn {
                    -webkit-animation-name: fadeIn;
                    animation-name: fadeIn;
                }

                .fadeOut {
                    -webkit-animation-name: fadeOut;
                    animation-name: fadeOut;
                }

                @keyframes fadeIn {
                    from {
                        opacity: 0;
                    }

                    to {
                        opacity: 1;
                    }
                }

                @keyframes fadeOut {
                    from {
                        opacity: 1;
                    }

                    to {
                        opacity: 0;
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
                            <p class="text-gray-600 my-2">Gracias por realizar tu compra, te contactaremos via tu correo
                                para mas informacion sobre tu pedido.</p>
                            <p> Ten un buen dia! </p>
                            <div class="py-10 text-center">
                                <a href="{{ route('pedidos_hechos') }}"
                                    class="px-12 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-3">
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
                                <div
                                    class=" relative justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                    <a href="{{ route('eliminaritem', ['id' => $item->rowId]) }}"
                                        class="absolute top-2 right-2 text-gray-300  hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="w-6 h-6 bi bi-x-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </a>

                                    <img src="{{ url('productos_subidos') }}/{{ $item->options->urlfoto }}" width="100"
                                        height="100" alt="IMAGEN" class="w-full rounded-lg sm:w-20 sm:h-30" />
                                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                        <div class="w-full px-4 mb-6 md:w-auto xl:mb-0">
                                            <a href=""
                                                class="block mb-5 text-xl font-medium dark:text-gray-400 hover:underline"
                                                href="#">
                                                {{ $item->name }}</a>
                                            <div class="flex flex-wrap">
                                                <p class="mr-4 text-sm font-medium">
                                                    <span class="dark:text-gray-400">Categoria:</span>
                                                    <span
                                                        class="ml-2 text-gray-400 dark:text-gray-400">{{ $item->options->categoria }}</span>
                                                </p>
                                                <p class="text-sm font-medium dark:text-gray-400">
                                                    <span>Talla:</span>
                                                    <span class="ml-2 text-gray-400"> {{ $item->options->talla }}</span>
                                                </p>
                                            </div>
                                        </div>


                                        <div class="mt-4 flex justify-between  sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
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

                                <div class="grid grid-cols-1 mt-3 sm:grid-cols-4 md:grid-cols-2">
                                    <div class="flex flex-col col-span-4">
                                        <div class="flex flex-col space-y-4  p-6 text-gray-600">
                                            <span class="font-semibold mr-2 text-xs uppercase text-center">Datos de
                                                Envio:</span>
                                            <div class="flex flex-row text-sm">
                                                <span class="mr-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        enable-background="new 0 0 24 24" height="20px" viewBox="0 0 24 24"
                                                        width="20px" fill="#64748b">
                                                        <g>
                                                            <rect fill="none" height="24" width="24" />
                                                        </g>
                                                        <g>
                                                            <path
                                                                d="M20,7h-5V4c0-1.1-0.9-2-2-2h-2C9.9,2,9,2.9,9,4v3H4C2.9,7,2,7.9,2,9v11c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V9 C22,7.9,21.1,7,20,7z M9,12c0.83,0,1.5,0.67,1.5,1.5S9.83,15,9,15s-1.5-0.67-1.5-1.5S8.17,12,9,12z M12,18H6v-0.75c0-1,2-1.5,3-1.5 s3,0.5,3,1.5V18z M13,9h-2V4h2V9z M18,16.5h-4V15h4V16.5z M18,13.5h-4V12h4V13.5z" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <p class="flex items-center  text-gray-500">
                                                    <span class="font-semibold mr-2 text-xs uppercase">Nombre:</span>
                                                    <span>{{ auth()->user()->name }}</span>
                                                </p>
                                            </div>

                                            <div class="flex flex-row text-sm">
                                                <span class="mr-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="#64748b">
                                                        <path
                                                            d="M12 14c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2z">
                                                        </path>
                                                        <path
                                                            d="M11.42 21.814a.998.998 0 0 0 1.16 0C12.884 21.599 20.029 16.44 20 10c0-4.411-3.589-8-8-8S4 5.589 4 9.995c-.029 6.445 7.116 11.604 7.42 11.819zM12 4c3.309 0 6 2.691 6 6.005.021 4.438-4.388 8.423-6 9.73-1.611-1.308-6.021-5.294-6-9.735 0-3.309 2.691-6 6-6z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <p class="flex items-center  text-gray-500">
                                                    <span class="font-semibold mr-2 text-xs uppercase">Ciudad:</span>
                                                    <span>{{ auth()->user()->ciudad }}</span>
                                                </p>
                                            </div>

                                            <div class="flex flex-row text-sm">
                                                <span class="mr-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="#64748b">
                                                        <path
                                                            d="M12 14c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2z">
                                                        </path>
                                                        <path
                                                            d="M11.42 21.814a.998.998 0 0 0 1.16 0C12.884 21.599 20.029 16.44 20 10c0-4.411-3.589-8-8-8S4 5.589 4 9.995c-.029 6.445 7.116 11.604 7.42 11.819zM12 4c3.309 0 6 2.691 6 6.005.021 4.438-4.388 8.423-6 9.73-1.611-1.308-6.021-5.294-6-9.735 0-3.309 2.691-6 6-6z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <p class="flex items-center  text-gray-500">
                                                    <span class="font-semibold mr-2 text-xs uppercase">Codigo
                                                        Postal:</span>
                                                    <span>{{ auth()->user()->codigo_postal }}</span>
                                                </p>
                                            </div>

                                            <div class="flex flex-row text-sm">
                                                <span class="mr-3">

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="#64748b">
                                                        <path
                                                            d="M12 14c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2z">
                                                        </path>
                                                        <path
                                                            d="M11.42 21.814a.998.998 0 0 0 1.16 0C12.884 21.599 20.029 16.44 20 10c0-4.411-3.589-8-8-8S4 5.589 4 9.995c-.029 6.445 7.116 11.604 7.42 11.819zM12 4c3.309 0 6 2.691 6 6.005.021 4.438-4.388 8.423-6 9.73-1.611-1.308-6.021-5.294-6-9.735 0-3.309 2.691-6 6-6z">
                                                        </path>
                                                    </svg>
                                                </span>
                                                <p class="flex items-center  text-gray-500">
                                                    <span class="font-semibold mr-2 text-xs uppercase">Direccion:</span>
                                                    <span>{{ auth()->user()->direccion }}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex flex-col w-full relative bottom-0">
                                            <div
                                                class="grid grid-cols-2 border-t divide-x text-indigo-600  bg-gray-50 dark:bg-transparent py-3">
                                                <p class="flex items-center  text-gray-500">
                                                    ¿Deseas Cambiar los Datos de Envio?
                                                </p>
                                               <a onclick="openModal()"
                                                    class=" cursor-pointer uppercase text-xs flex flex-row items-center justify-center font-semibold">
                                                    <div class="mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="20px"
                                                            viewBox="0 0 24 24" width="20px" fill="rgb(79 70 229)">
                                                            <path d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                                                        </svg>
                                                    </div>
                                                    Actualizar
                                                </a>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>
            @endif

            <div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-auto flex justify-center items-center animated fadeIn faster"
            style="background: rgba(0,0,0,.7);">
            <div
                class="border border-teal-500 shadow-lg modal-container bg-white w-7/12 h-auto  mx-auto rounded shadow-lg z-50 overflow-auto	">
                <div class="modal-content py-4 text-left px-6">
                    <!--Title-->
                    <div class="flex justify-between items-center pb-3">
                        <p class="text-2xl font-bold">Cambiar Informacion de Usuario</p>
                        <div class="modal-close cursor-pointer z-50">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <!--Body-->
                    <div class="my-5">
                        @livewire('profile.update-profile-information-form')

                    </div>
                </div>
            </div>
        </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
                integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
                <script>
                    const modal = document.querySelector('.main-modal');
                    const closeButton = document.querySelectorAll('.modal-close');

                    const modalClose = () => {
                        modal.classList.remove('fadeIn');
                        modal.classList.add('fadeOut');
                        setTimeout(() => {
                            modal.style.display = 'none';
                        }, 500);
                        window.setTimeout(function(){
                        location.reload();
                        } ,300);
                    }

                    const modalOff = () => {
                        modal.classList.remove('fadeIn');
                        modal.classList.add('fadeOut');
                        setTimeout(() => {
                            modal.style.display = 'none';
                        }, 500);
                    }

                    const openModal = () => {
                        modal.classList.remove('fadeOut');
                        modal.classList.add('fadeIn');
                        modal.style.display = 'flex';
                    }

                    for (let i = 0; i < closeButton.length; i++) {

                        const elements = closeButton[i];

                        elements.onclick = (e) => modalClose();

                        modal.style.display = 'none';

                        window.onclick = function (event) {
                            if (event.target == modal) modalOff();
                        }
                    }
                </script>

        </div>
    </div>

@endsection
