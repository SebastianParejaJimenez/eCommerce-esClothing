@extends('layouts.appcatalogo')

@section('title', 'Vista Productos')



<div x-data="{ cartOpen: false, isOpen: false }" class="bg-white">
    @section('content')
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
        <style>
            @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
        </style>

        <div class="min-w-screen min-h-screen bg-gray-100 flex items-center p-5 lg:p-10 overflow-hidden relative">
            <x-productos.carrito-header />
            <div class="container mx-auto bg-white rounded-md p-8">
                <div class="md:flex md:items-center">
                    <div class="w-full h-64 md:w-1/2 lg:h-96">
                        <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto"
                            src="{{ url('productos_subidos') }}/{{ $producto->imagen }}" alt="{{ $producto->nombre }}">
                    </div>
                    <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                        <h3 class="text-gray-700 uppercase text-lg">{{ $producto->nombre }}</h3>
                        <span class="text-gray-500 mt-3">${{ number_format($producto->precio, 0, ',', '.') }}</span>
                        <hr class="my-3">

                        <div class="mt-3">
                            <label class="text-gray-700 text-sm" for="count">Disponibilidad:</label>
                            <div class="flex items-center mt-1">
                                @if ($producto->estado == 'Activo')
                                    <span
                                        class="text-green-400 bg-green-50 py-1 px-3 font-semibold rounded-full text-sm">Disponible</span>
                                @else
                                    <span class="text-red-400 py-1 px-3 font-semibold rounded-full text-sm">Agotado</span>
                                @endif
                            </div>
                        </div>
                        <form action="{{ route('agregaritem') }}" method="POST" class=" items-center mt-6">
                            @csrf
                            <input name="producto_id" type="hidden" value="{{ $producto->id }}">

                            @if ($producto->categoria != 'Accesorios' && $producto->estado == 'Activo')
                                <div class="mb-4">
                                    <span class=" text-gray-700">Seleccionar Talla:</span>
                                    <div class="flex items-center my-3">
                                        @foreach ($producto->tallas as $talla)
                                            <div>
                                                <input type="radio" name="talla" id="{{ $talla->talla }}"
                                                    value="{{ $talla->talla }}" class="peer hidden" />
                                                <label for="{{ $talla->talla }}"
                                                    class=" bg-gray-100 text-gray-700 py-2 px-3 rounded-full font-bold mr-2 hover:bg-gray-300 cursor-pointer select-none border-solid border-2 border-indigo-200 p-2 mx-1 text-center peer-checked:font-bold peer-checked:border-gray-400  peer-checked:bg-gray-300">{{ $talla->talla }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <input type="text" name="talla" id="Unico" value="Unico" class="peer hidden" />
                            @endif

                            @if (Auth::user() && $producto->estado == 'Activo')
                                <div class="inline-block align-bottom mt-4">
                                    <button type="submite"
                                        class="tracking-wide mt-2 text-white capitalize transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600 px-6 py-2 font-semibold"><i
                                            class="mdi mdi-cart -ml-2 mr-2"></i> Añadir al Carrito </button>
                                </div>
                            @else
                                <div class="hover:red-yellow-500 w-full my-4  select-none rounded-l-lg border-l-4 border-red-400 bg-red-100 p-4 font-medium">El producto actualmente se encuenta Agotado!</div>
                            @endif

                        </form>
                    </div>
                </div>

                <div class="mt-16 splide">
                    <h3 class="text-gray-600 text-2xl font-medium mb-6 ">Más Productos</h3>
                    <div class="splide__track">
                        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4  splide__list mt-6">
                            @foreach ($productosAll as $producto_more)
                                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden splide__slide">
                                    <div class="flex items-end justify-end h-96 w-full bg-cover splide__slide__container"
                                        style="background-image: url('/productos_subidos/{{ $producto_more->imagen }}')">
                                        <a href="{{ route('productos.show', ['id' => $producto_more->id, 'slug' => $producto_more->slug]) }}"
                                            class="p-3 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="px-5 py-3">
                                        <h3 class="text-gray-700 uppercase">{{ $producto_more->nombre }}</h3>
                                        <span
                                            class="text-gray-500 mt-2">${{ number_format($producto_more->precio, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>

            </div>


        </div>

        <x-footers.footer-store />
</div>

@endsection

@section('scripts')
    <script>
        new Splide('.splide').mount();
    </script>

    @if (session('error') == 'talla')
        <script>
            Swal.fire({
                title: 'Faltan Datos',
                text: "Necesitas seleccionar una talla para poder agregar al Carrito!",
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar'
            })
        </script>
    @endif
@endsection
