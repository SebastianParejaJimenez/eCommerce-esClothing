@extends('layouts.appcatalogo')

@section('title', 'Página de inicio')
<div x-data="{ cartOpen: false, isOpen: false }" class="bg-white">
    @section('content')

        <style>
            @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
        </style>
        <div class="min-w-screen min-h-screen bg-gray-100 flex items-center p-5 lg:p-10 overflow-hidden relative">

            <x-productos.carrito-header />

            <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 md:text-left">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row -mx-4">
                        <div class="md:flex-1 px-4">
                            <div class="h-[490px] rounded-lg bg-gray-300 mb-4">
                                <img class="w-full h-full object-cover"
                                    src="{{ url('productos_subidos') }}/{{ $producto->imagen }}" alt="Producto Imagen">
                            </div>
                        </div>
                        <div class="md:flex-1 px-4 m-auto">
                            <h2 class="text-2xl font-bold mb-2">{{ $producto->nombre }}</h2>
                            <span class="font-bold text-gray-700">Categoria:</span>
                            <p class="text-gray-600 text-sm mb-4">{{ $producto->categoria }}</p>
                            <div class="flex mb-4">
                                <div class="mr-4">
                                    <span class="font-bold text-gray-700">Precio:</span>
                                    <span class="text-gray-600">${{ number_format($producto->precio, 0, ',', '.') }}</span>
                                </div>
                                <div>
                                    @if ($producto->estado == 'Activo')
                                        <span
                                            class="text-green-400  py-1 px-3 font-semibold rounded-full text-sm">Disponible</span>
                                    @else
                                        <span
                                            class="text-red-400  py-1 px-3 font-semibold rounded-full text-sm">Agotado</span>
                                    @endif
                                </div>
                            </div>
                            <form action="{{ route('agregaritem') }}" method="POST">
                                @csrf
                                <input name="producto_id" type="hidden" value="{{ $producto->id }}">

                                @if ($producto->categoria != "Accesorios")
                                <div class="mb-4">
                                    <span class="font-bold text-gray-700">Seleccionar Talla:</span>
                                    <div class="flex items-center my-3">
                                        @foreach ($producto->tallas as $talla)
                                            <div>
                                                <input type="radio" name="talla" id="{{ $talla->talla }}"
                                                    value="{{ $talla->talla }}" class="peer hidden" />
                                                <label for="{{ $talla->talla }}"
                                                    class=" bg-gray-300 text-gray-700 py-2 px-3 rounded-lg font-bold mr-2 hover:bg-gray-400 cursor-pointer select-none border-solid border-2 border-indigo-200 p-2 mx-1 text-center  peer-checked:font-bold peer-checked:border-green-400  peer-checked:bg-green-300">{{ $talla->talla }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @else
                                <input type="text" name="talla" id="Unico" value="Unico" class="peer hidden" />
                                @endif

                                <div>

                                    @if (Auth::user() && $producto->estado == 'Activo')
                                        <div class="inline-block align-bottom mt-4">
                                            <button type="submite"
                                                class="tracking-wide mt-2 text-white capitalize transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600 px-10 py-2 font-semibold"><i
                                                    class="mdi mdi-cart -ml-2 mr-2"></i> Añadir al Carrito </button>
                                        </div>
                                    @else
                                    <div class="hover:red-yellow-500 w-full my-4  select-none rounded-l-lg border-l-4 border-red-400 bg-red-100 p-4 font-medium">El producto actualmente se encuenta Agotado!</div>

                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

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
