@php
    use App\Models\Producto;
    $cont_prod = Producto::count();
@endphp

@extends('layouts.appcatalogo')

@section('title', 'Catalogo')

<div x-data="{ cartOpen: false, isOpen: false }" class="bg-white">
    @section('content')
        <x-productos.carrito-header />

        <div class="bg-white">
            <div x-data="{ open: false }">
                <div class="fixed inset-0 flex z-40 lg:hidden" role="dialog" aria-modal="true" x-show="open"
                    @click.outside="open = false" x-transition:enter="transition-opacity ease-linear duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" x-cloak class="py-1" role="none">

                    <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

                    <div
                        class="ml-auto relative max-w-xs w-full h-full bg-white shadow-xl py-4 pb-12 flex flex-col overflow-y-auto">
                        <div class="px-4 flex items-center justify-between">
                            <h2 class="text-lg font-medium text-gray-900">Filtros</h2>
                            <button @click="open = false" type="button"
                                class="-mr-2 w-10 h-10 bg-white p-2 rounded-md flex items-center justify-center text-gray-400">
                                <span class="sr-only">Close menu</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div class="mt-4 border-t border-gray-200">
                            <h3 class="sr-only">Categorias</h3>
                            <ul role="list" class="font-medium text-gray-900 px-2 py-3">
                                <li>
                                    <a href="#" class="block px-2 py-3"> Todos los Productos </a>
                                </li>
                                <li>
                                    <a href="{{ route('catalogo_categoria', ['categoria' => 'Accesorios']) }}"
                                        class="block @if (Request::segment(2) === 'Accesorios') {{ 'text-blue-600 ' }} @endif px-2 py-3">
                                        Accesorios </a>
                                </li>
                                <li>
                                    <a href="{{ route('catalogo_categoria', ['categoria' => 'Chaquetas-Buzos']) }}"
                                        class="block @if (Request::segment(2) === 'Chaquetas-Buzos') {{ 'text-blue-600 ' }} @endif px-2 py-3">
                                        Chaquetas y Buzos </a>
                                </li>

                                <li>
                                    <a href="{{ route('catalogo_categoria', ['categoria' => 'Camisas']) }}"
                                        class="block px-2 py-3 @if (Request::segment(2) === 'Camisas') {{ 'text-blue-600 ' }} @endif">
                                        Camisas </a>
                                </li>

                                <li>
                                    <a href="{{ route('catalogo_categoria', ['categoria' => 'Vestidos']) }}"
                                        class="block px-2 py-3 @if (Request::segment(2) === 'Vestidos') {{ 'text-blue-600 ' }} @endif">
                                        Vestidos </a>
                                </li>

                                <li>
                                    <a href="{{ route('catalogo_categoria', ['categoria' => 'Shorts']) }}"
                                        class="block px-2 py-3 @if (Request::segment(2) === 'Shorts') {{ 'text-blue-600 ' }} @endif">
                                        Shorts </a>
                                </li>
                                <li>
                                    <a href="{{ route('catalogo_categoria', ['categoria' => 'Pantalones']) }}"
                                        class="block px-2 py-3 @if (Request::segment(2) === 'Pantalones') {{ 'text-blue-600 ' }} @endif">
                                        Pantalones </a>
                                </li>
                                <li>
                                    <a href="{{ route('catalogo_categoria', ['categoria' => 'Conjuntos']) }}"
                                        class="block px-2 py-3 @if (Request::segment(2) === 'Conjuntos') {{ 'text-blue-600 ' }} @endif">
                                        Conjuntos </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <main class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="relative flex items-baseline justify-between pt-16 pb-6 border-b border-gray-200">
                        <p class="text-3xl font-extrabold tracking-tight text-gray-700">Nuestros Productos</p>

                        <div class="flex items-center">


                            <button type="button" class="p-2 -m-2 ml-5 sm:ml-7 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">View grid</span>
                                <!-- Heroicon name: solid/view-grid -->
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                            </button>

                            <button @click="open = true" type="button"
                                class="p-2 -m-2 ml-4 sm:ml-6 text-gray-400 hover:text-gray-500 lg:hidden">
                                <span class="sr-only">Filters</span>
                                <!-- Heroicon name: solid/filter -->
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <section x-data="{ selectedSizes: [] }" aria-labelledby="products-heading" class="pt-6 pb-24">
                        <h2 id="products-heading" class="sr-only">Productos</h2>

                        <div class="grid grid-cols-1 lg:grid-cols-4 gap-x-8 gap-y-10">
                            <!-- Filters web -->
                            <form class="hidden lg:block">
                                <h3 class="sr-only">Categorias</h3>
                                <ul role="list"
                                    class="text-sm font-medium text-gray-900 space-y-4 pb-6 border-b border-gray-200">
                                    <li>
                                        <a href="{{ route('catalogo') }}" class="block px-2 py-3"> Todos los Productos
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('catalogo_categoria', ['categoria' => 'Accesorios']) }}"
                                            class="block @if (Request::segment(2) === 'Accesorios') {{ 'text-blue-600 ' }} @endif px-2 py-3">
                                            Accesorios </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('catalogo_categoria', ['categoria' => 'Chaquetas-Buzos']) }}"
                                            class="block @if (Request::segment(2) === 'Chaquetas-Buzos') {{ 'text-blue-600 ' }} @endif px-2 py-3">
                                            Chaquetas y Buzos </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('catalogo_categoria', ['categoria' => 'Camisas']) }}"
                                            class="block px-2 py-3 @if (Request::segment(2) === 'Camisas') {{ 'text-blue-600 ' }} @endif">
                                            Camisas </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('catalogo_categoria', ['categoria' => 'Vestidos']) }}"
                                            class="block px-2 py-3 @if (Request::segment(2) === 'Vestidos') {{ 'text-blue-600 ' }} @endif">
                                            Vestidos </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('catalogo_categoria', ['categoria' => 'Shorts']) }}"
                                            class="block px-2 py-3 @if (Request::segment(2) === 'Shorts') {{ 'text-blue-600 ' }} @endif">
                                            Shorts </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('catalogo_categoria', ['categoria' => 'Pantalones']) }}"
                                            class="block px-2 py-3 @if (Request::segment(2) === 'Pantalones') {{ 'text-blue-600 ' }} @endif">
                                            Pantalones </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('catalogo_categoria', ['categoria' => 'Conjuntos']) }}"
                                            class="block px-2 py-3 @if (Request::segment(2) === 'Conjuntos') {{ 'text-blue-600 ' }} @endif">
                                            Conjuntos </a>
                                    </li>
                                </ul>

                                <!-- Filters talla web -->
                                {{--         <div  x-data="{ openSizes: false }" class="border-b border-gray-200 py-6">
                                    <h3 class="-my-3 flow-root">
                                        <!-- Expand/collapse section button -->
                                        <button  @click="openSizes = ! openSizes" type="button"
                                            class="py-3 bg-white w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500"
                                            aria-controls="filter-section-2" aria-expanded="false">
                                            <span class="font-medium text-gray-900"> Talla </span>
                                            <span class="ml-6 flex items-center">
                                                <!--
                                                Expand icon, show/hide based on section open state.
                          
                                                Heroicon name: solid/plus-sm
                                              -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <!--
                                                Collapse icon, show/hide based on section open state.
                          
                                                Heroicon name: solid/minus-sm
                                              -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                
                                            </span>
                                        </button>
                                    </h3>
                                  
                                    <div x-show="openSizes" 
                                    x-transition:enter="transition ease-out duration-200 "
                                    x-transition:enter-start="opacity-0 " x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0" x-cloak class="pt-6" id="filter-section-2">
                                        <div class="space-y-4">
                                            <div class="flex items-center">
                                                <input id="filter-size-0" name="size[]" value="S" type="checkbox"
                                                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500" x-on:change="selectedSizes.includes('S') ? selectedSizes = selectedSizes.filter(size => size !== 'S') : selectedSizes.push('S')">
                                                <label for="filter-size-0" class="ml-3 text-sm text-gray-600"> S </label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="filter-size-1" name="size[]" value="M" type="checkbox"
                                                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500" x-on:change="selectedSizes.includes('M') ? selectedSizes = selectedSizes.filter(size => size !== 'M') : selectedSizes.push('M')">
                                                <label for="filter-size-1" class="ml-3 text-sm text-gray-600"> M </label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="filter-size-2" name="size[]" value="L" type="checkbox"
                                                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500" x-on:change="selectedSizes.includes('L') ? selectedSizes = selectedSizes.filter(size => size !== 'L') : selectedSizes.push('L')">
                                                <label for="filter-size-2" class="ml-3 text-sm text-gray-600"> L
                                                </label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="filter-size-3" name="size[]" value="XL" type="checkbox"
                                                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500" x-on:change="selectedSizes.includes('XL') ? selectedSizes = selectedSizes.filter(size => size !== 'XL') : selectedSizes.push('XL')">
                                                <label for="filter-size-3" class="ml-3 text-sm text-gray-600"> XL
                                                </label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="filter-size-4" name="size[]" value="XXL" type="checkbox"
                                                    class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-size-4" class="ml-3 text-sm text-gray-600"> XXL
                                                </label>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div> --}}
                            </form>

                            <!-- Product grid -->
                            <div class="lg:col-span-3">
                                <div class="w-full rounded-lg h-96 lg:h-full">
                                    <x-tienda.producto-reciente :productoReciente='$productoReciente' :selectedSize= />
                                    <x-tienda.productos-por-categoria :productos='$productos_categoria' />
                                </div>
                            </div>

                        </div>


                    </section>
                </main>
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
