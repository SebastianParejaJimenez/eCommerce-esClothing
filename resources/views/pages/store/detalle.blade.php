@foreach ($pedido as $pedido)
@endforeach

@extends('layouts.appstore')

@section('title', 'Página de inicio')
<div x-data="{ cartOpen: false, isOpen: false }" class="bg-white">

    @section('content')
    <x-productos.carrito-header />
    <section class="flex items-center py-16 bg-white font-poppins dark:bg-gray-800 ">
        <div
            class="justify-center flex-1 max-w-4xl px-6 py-6 mx-auto bg-gray-100 rounded-md shadow-md dark:border-gray-900 dark:bg-gray-900 lg:py-10 lg:px-10">
            <div class="mb-16 text-center">
                <h1
                    class="mb-6 text-2xl font-semibold leading-7 tracking-wide text-gray-700 lg:text-4xl dark:text-gray-300 lg:leading-9">
                    Detalles de tu pedido, {{Auth::user()->name;}}</h1>
                <p class="text-lg text-gray-500 dark:text-gray-400">Numero de orden: 012736373737</p>
            </div>

            <div class="max-w-4xl mx-auto mb-10">
                <h2 class="mb-4 text-xl font-medium dark:text-gray-400">Informacion del Pedido:</h2>
            @foreach ($pedido->productos as $producto)
                <div class="p-9 mb-8 bg-white rounded-md shadow dark:bg-gray-800 sm:flex sm:items-center xl:py-5 xl:px-12 relative">
                    <a href="#" class="mr-6 md:mr-12">
                        <img class=" w-full lg:w-[80px] h-[200px] lg:h-[80px]  object-cover  mx-auto mb-6 sm:mb-0 "
                            src="{{ url('productos_subidos') }}/{{ $producto->imagen }} "
                            alt="dress">
                    </a>

                    <p
                        class="btn p-2 bg-indigo-400 hover:bg-indigo-500 text-white absolute -top-3 -left-3 rounded-full">
                        <span class="">
                            #{{$cont++}}
                        </span>
                    </p>


                    <div>
                        <a href="{{ route('productos.show', ['id' => $producto->id, 'slug' => $producto->slug]) }}" class="inline-block mb-1 text-lg font-medium hover:underline dark:text-gray-400" >
                            {{ $producto->nombre }}</a>
                        <div class="flex flex-wrap">

                            <p class="mr-4 text-sm font-medium">
                                <span class="font-medium dark:text-gray-400">Talla:</span>
                                <span class="ml-2 text-gray-400 dark:text-gray-400"> {{$producto->pivot->talla}}</span>
                            </p>
                            <p class="mr-4 text-sm font-medium">
                                <span class="font-medium dark:text-gray-400">Cantidad:</span>
                                <span class="ml-2 text-gray-400 dark:text-gray-400"> {{$producto->pivot->cantidad}}</span>
                            </p>
                            <p class="text-sm font-medium dark:text-gray-400">
                                <span>Total Unitario:</span>
                                <span class="ml-2 text-gray-400">${{$producto->pivot->precio}}</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="max-w-4xl mx-auto ">
                <h2 class="mb-4 text-xl font-medium dark:text-gray-400 ">Detalles:</h2>
                <div class="grid grid-cols-1 gap-8 mb-10 lg:grid-cols-2">
                    <div
                        class="relative flex items-center justify-between px-10 py-3 font-medium leading-8 bg-white bg-opacity-50 rounded-md shadow dark:text-gray-400 dark:bg-gray-800">
                        <div
                            class="absolute right-0 flex items-center justify-center bg-indigo-500 rounded-md w-14 h-14 dark:bg-gray-600">
                            <div
                                class="flex items-center justify-center text-lg font-bold text-indigo-500 bg-gray-100 rounded-full dark:text-gray-300 dark:bg-gray-700 w-11 h-11">
                                {{$pedido->productos->count()}}</div>
                        </div>
                        <span class="mr-16">Productos</span>
                    </div>
                    <div
                        class="flex items-center justify-between px-10 py-3 font-medium leading-8 bg-white rounded-md shadow dark:text-gray-400 dark:bg-gray-800 font-heading">
                        <span>Total</span>
                        <span class="flex items-center text-indigo-500 dark:text-indigo-400">
                            <span class="ml-3 mr-1 text-sm">$</span>
                            <span class="text-xl">{{$pedido->subtotal}}</span>
                        </span>
                    </div>
                </div>
                <div class="flex flex-wrap items-center justify-between gap-4 ">
                    <a href="{{route('tienda')}}"
                        class="w-full px-6 py-3 text-indigo-500 border border-indigo-500 rounded-md md:w-auto hover:text-gray-100 hover:bg-indigo-600 dark:border-gray-800 dark:hover:bg-gray-800 dark:text-gray-300">
                        Volver a la Tienda
                    </a>

                </div>
            </div>

        </div>
    </section>
    @endsection

