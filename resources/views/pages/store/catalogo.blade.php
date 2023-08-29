@php
    use App\Models\Producto;
    $cont_prod = Producto::count();
@endphp

@extends('layouts.appcatalogo')

@section('title', 'Catalogo')

<!-- tailwind.config.js -->


<div x-data="{ cartOpen: false, isOpen: false }" class="bg-white">
    @section('content')
        <x-productos.carrito-header />
        <!-- component -->


        <section class="bg-white dark:bg-gray-900">
            @if ($cont_prod)
                <div class="container px-6 py-8 mx-auto">
                    <div class="lg:flex lg:-mx-2">

                        <x-tienda.categorias />

                        {{-- Producto mas Reciente de la Categoria --}}



                        <div class="mt-6 lg:mt-0 lg:px-2 lg:w-4/5 ">
                            <div id="spinner-loading" class='flex items-center justify-center min-h-screen'>

                                <div class="flex space-x-2 animate-pulse">
                                    <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                                    <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                                    <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                                </div>
                            </div>

                            <div id="content-main">

                                @if ($productoReciente)
                                <p class="text-gray-500 dark:text-gray-300">Producto mas Reciente</p>
                                    <div class="md:flex md:items-center mt-5">
                                        <div class="w-full h-64 md:w-1/2 lg:h-96">
                                            <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto"
                                                src="{{ url('productos_subidos') }}/{{ $productoReciente->imagen }}"
                                                alt="{{ $productoReciente->nombre }}">
                                        </div>
                                        <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                                            <h3 class="text-gray-700 uppercase text-lg">{{ $productoReciente->nombre }}</h3>
                                            <span
                                                class="text-green-500 mt-3 ">${{ number_format($productoReciente->precio, 0, ',', '.') }}
                                            </span>

                                            <div class="my-5">


                                            <div class="flex-1 inline-flex items-center">
                                                <span class="text-secondary whitespace-nowrap mr-3">Tallas Disponibles</span>
                                                <div class="grid grid-cols-4 gap-2 rounded-xl bg-gray-100 p-2">
                                                    <div>
                                                        <input type="radio" name="option" id="1" value="1" class="peer hidden" checked />
                                                        <label for="1" class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">S</label>
                                                    </div>

                                                    <div>
                                                        <input type="radio" name="option" id="2" value="2" class="peer hidden" />
                                                        <label for="2" class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">L</label>
                                                    </div>

                                                    <div>
                                                        <input type="radio" name="option" id="3" value="3" class="peer hidden" />
                                                        <label for="3" class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">M</label>
                                                    </div>

                                                    <div>
                                                        <input type="radio" name="option" id="4" value="3" class="peer hidden" />
                                                        <label for="4" class="block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white">XL</label>
                                                    </div>
                                                </div>
                                            </div>
                                            </ul>
                                            </div>

                                            <hr class="my-3">
                                            <form class="flex items-center mt-6" action="{{ route('agregaritem') }}"
                                                method="POST">
                                                <input name="producto_id" type="hidden"
                                                    value="{{ $productoReciente->id }}">
                                                @csrf
                                                <button
                                                    class="flex items-center justify-center px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                                    </svg>
                                                    <span class="mx-1">Añadir al carrito</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div
                                        class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                            <div class="mt-5 sm:mt-0 ">
                                                <h2 class="text-xl font-bold text-gray-900 ">No existen productos en esta Categoria.</h2>
                                            </div>
                                        </div>
                                    </div>
                                @endif

            {{-- Productos de la Categoria --}}

            <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($productos_categoria as $producto)
                    <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                        <a href="" class="group-hover:opacity-100">
                            <img class="object-cover w-full rounded-md h-72 xl:h-80"
                                src="{{ url('productos_subidos') }}/{{ $producto->imagen }}" alt="T-Shirt">
                        </a>
                        <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">
                            {{ $producto->nombre }}</h4>
                        <p class="text-blue-500">${{ number_format($producto->precio, 0, ',', '.') }}
                        </p>

                        <form action="{{ route('agregaritem') }}" method="POST"
                            class="mt-3 flex items-end justify-between">
                            @csrf
                            <input name="producto_id" type="hidden" value="{{ $producto->id }}">
                            <button type="submit"
                                class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                </svg>
                                <span class="mx-1">Añadir al carrito</span>
                            </button>
                        </form>

                    </div>
                @endforeach

            </div>
            {{ $productos_categoria->links() }}
    </div>

    </div>
    </div>
    </div>
@else
    <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
        <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
            <div class="mt-5 sm:mt-0 ">
                <h2 class="text-xl font-bold text-gray-900 ">No existen productos en la Tienda.</h2>
            </div>
        </div>
    </div>
    @endif
    </section>
    </div>
    <script>
        window.onload = function() {
            // Ocultar el spinner
            document.getElementById('spinner-loading').style.display = 'none';
            // Mostrar la tabla
            document.getElementById('content-main').style.display = 'block';
        };
    </script>
@endsection
