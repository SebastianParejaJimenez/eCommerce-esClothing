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
                <div class="md:flex items-center -mx-10">
                    <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                        <div class="">
                            <img src="{{ url('productos_subidos') }}/{{ $producto->imagen }}" class="w-full z-10"
                                alt="">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-10">
                        <div class="mb-10">
                            <h1 class="font-bold uppercase text-2xl mb-4 ">
                                {{ $producto->nombre }} </h1>
                            <p class="text-l mb-2 font-bold">Categoria: {{ $producto->categoria }}</p>
                            <p class="text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Eos, voluptatum
                                dolorum! Laborum blanditiis consequatur, voluptates, sint enim fugiat saepe, dolor fugit,
                                magnam explicabo eaque quas id quo porro dolorum facilis...
                            </p>
                        </div>
                        <div>
                            <div class="inline-block align-bottom mr-5 mb-5">
                                <span class="text-2xl leading-none align-baseline">$</span>
                                <span
                                    class="font-bold text-5xl leading-none align-baseline">{{ number_format($producto->precio, 0, ',', '.') }}</span>
                            </div>

                            <form action="{{ route('agregaritem') }}" method="POST">

                                <div class="mt-3">
                                    <label class="text-gray-700 text-sm" for="count">Seleccionar una talla:</label>
                                    <div class="flex items-center mt-2">
                                        @foreach ($producto->tallas as $talla)
                                        <div>
                                            <input type="radio" name="talla" id="{{$talla->talla}}" value="{{$talla->talla}}" class="peer hidden" />
                                            <label for="{{$talla->talla}}" class=" cursor-pointer select-none border-solid border-2 border-indigo-200  rounded-md p-2 mx-2 text-center peer-checked:bg-gray-300 peer-checked:font-bold peer-checked:text-gray-600  hover:bg-indigo-200">{{$talla->talla}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                @csrf
                                <input name="producto_id" type="hidden" value="{{ $producto->id }}">

                                @if (Auth::user())
                                    <div class="inline-block align-bottom mt-5">
                                        <button type="submite"
                                            class="tracking-wide mt-2 text-white capitalize transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600 px-10 py-2 font-semibold"><i
                                                class="mdi mdi-cart -ml-2 mr-2"></i> Añadir al Carrito </button>
                                    </div>
                                @endif


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

@if(session('error')== "talla")
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
