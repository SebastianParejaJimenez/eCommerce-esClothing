@extends('layouts.appstore')

@section('title', 'Página de inicio')
<div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
    @section('content')
    <x-productos.carrito-header />
    <div class="mx-auto max-w-2xl px-2 py-12 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">

        <x-productos.contexto-empresa :productos='$producto_randoms' />


        <!-- Componente categoria y prods -->
        <div class="container mx-auto px-6">
            <div class="h-64 rounded-md overflow-hidden bg-cover bg-center"
                style="background-image: url('https://images.unsplash.com/photo-1577655197620-704858b270ac?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&q=144')">
                <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                    <div class="px-10 max-w-xl">
                        <h2 class="text-2xl text-white font-semibold">Categorias</h2>
                        <p class="mt-2 text-gray-400">Si quieres conocer sobre nuestros productos por favor dirigete
                            hacia el catalogo</p>
                        <form action="{{route('catalogo')}}">
                            <button href="#"
                                class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <span>Catalogo</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </form>

                    </div>
                </div>
            </div>


            <div class="my-14">
                <h3 class="text-gray-600 text-2xl font-medium">Novedades</h3>

                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    @foreach($producto_randoms as $producto)
                    <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover"
                            style="background-image: url('{{ url('productos_subidos') }}/{{ $producto->imagen }}')">

                            <a href="{{ route('productos.show', ['id' => $producto->id, 'slug' => $producto->slug]) }}"
                                class="p-2 rounded-full bg-blue-600 text-white mx-2 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <form class="mx-2 -mb-4" action="{{ route('agregaritem') }}" method="POST">
                                <input name="producto_id" type="hidden" value="{{ $producto->id }}">
                                @csrf
                                <button type="submit"
                                    class="p-2 rounded-full bg-blue-600 text-white  hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </button>
                            </form>

                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">{{ $producto->nombre }}</h3>
                            <span class="text-gray-500 mt-2">${{ $producto->precio }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="md:flex mt-8 md:-mx-4">
                <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2"
                    style="background-image: url('https://images.unsplash.com/photo-1547949003-9792a18a2601?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">Accesorios</h2>
                            <p class="mt-2 text-gray-400">Da click aca para conocer nuestros mejores accesorios.</p>
                        <form action="{{ route('catalogo_categoria', ['categoria' => 'conjuntos']) }}"> 
                            
                            <button
                                class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                <span>Accesorios</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </form>

                        </div>
                    </div>
                </div>
                <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2"
                    style="background-image: url('')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">Moda</h2>
                            <p class="mt-2 text-gray-400">Da click aca para conocer nuestras mejores prendas para vestir.</p>
                            <button
                                class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                <span>Moda</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        {{-- <x-productos.categorias-home />
        --}}
        {{-- <x-productos.top-productos :productostop='$productos_top' />
        --}}
        <x-footers.footer-store />


    </div>
</div>
</div>
@endsection


{{-- @if (count(Cart::content()))
<div class="flex h-64 justify-center">
    <div class="relative">
        <div class="absolute w-full  rounded-b border-t-0 z-10">

            <div class="shadow-xl w-64">
                @foreach (Cart::content() as $item)

                <div class="p-2 flex bg-white hover:bg-gray-100 cursor-pointer border-b border-gray-100" style="">
                    <div class="p-2 w-12"><img src="https://dummyimage.com/50x50/bababa/0011ff&amp;text=50x50"
                            alt="img product"></div>
                    <div class="flex-auto text-sm w-32">
                        <div class="font-bold">{{$item->name}}</div>
                        <div class="truncate">{{$item->categoria}}</div>
                        <div class="text-gray-400">Qty: {{number_format($item->qty)}}</div>
                    </div>
                    <div class="flex flex-col w-18 font-medium items-end">
                        <div class="w-4 h-4 mb-6 hover:bg-red-200 rounded-full cursor-pointer text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-trash-2 ">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                        </div>
                        <div class="text-gray-400">{{number_format($item->price,2)}}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif --}}