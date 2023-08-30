@extends('layouts.appstore')

@section('title', 'Página de inicio')
<div x-data="{ cartOpen: false, isOpen: false }" class="bg-white">
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
                            <form action="{{ route('catalogo') }}">
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

                <x-productos.top-productos :productos='$producto_randoms' />

            </div>

            <x-footers.footer-store />


        </div>
    </div>
    </div>
@endsection
