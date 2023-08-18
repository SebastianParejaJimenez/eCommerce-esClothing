@extends('layouts.appcatalogo')

@section('title', 'Página de inicio')
<div x-data="{ cartOpen: false, isOpen: false }" class="bg-white">
    @section('content')

        <style>
            @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
        </style>
        <div class="min-w-screen min-h-screen bg-gray-300 flex items-center p-5 lg:p-10 overflow-hidden relative">

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
                                    class="font-bold text-5xl leading-none align-baseline">{{ number_format($producto->precio, 2, ',', '.') }}</span>
                            </div>

                            <form action="{{ route('agregaritem') }}" method="POST">
                                @csrf
                                <input name="producto_id" type="hidden" value="{{ $producto->id }}">

                                @if(Auth::user())
                                <div class="inline-block align-bottom mt-5">
                                    <button type="submite"
                                        class="tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700 px-10 py-2 font-semibold"><i
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
