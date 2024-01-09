@extends('layouts.appstore')

@section('title', 'Página de inicio')

<div x-data="{ cartOpen: false, isOpen: false }" class="bg-white">
    @section('content')
        <x-productos.carrito-header />
        <!-- component -->
        <section class="bg-white">

            <div class="py-8 sm:py-16">

                <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
                    <div class="max-w-2xl mx-auto px-4 lg:max-w-4xl lg:px-0">
                        <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">Historial de Ordenes
                        </h1>
                        <p class="mt-2 text-sm text-gray-500">Acá podras consultar tus ordenes hechas</p>
                    </div>
                </div>

                {{-- Lista --}}
                <div class="mt-16">
                    <h2 class="sr-only">Ordenes Recientes</h2>
                    <div class="max-w-7xl mx-auto  sm:px-2 md:px-3 lg:px-8 px-1">
                        <div class="max-w-2xl mx-auto space-y-8  sm:px-4 lg:max-w-4xl lg:px-0 px-1">
                            <div class="mt-6 md:flex md:items-center md:justify-between">
                                <div class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                                    <a href="{{ route('pedidos_hechos') }}" type="button"
                                        class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200
                                        @if ($buscarPedido == false) {{ 'bg-gray-100' }} @endif sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                                        Ver Todos
                                    </a>

                                    <button
                                        class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm @if ($buscarPedido == true) {{ ' bg-gray-100' }} @endif dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                                        Filtrando
                                    </button>
                                </div>
                                <form action="{{ route('buscar-pedido') }}" method="POST"
                                    class="relative flex items-center mt-4 md:mt-0">
                                    @csrf
                                    <span class="absolute">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                        </svg>
                                    </span>
                                    <input id="id-pedido" name="id-pedido" type="text"
                                        placeholder="Buscar por ID de Pedido"
                                        class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">

                                    <button type="submit"
                                        class="inline-flex items-center py-1.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg
                                            class="-ml-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            @if ($buscarPedido == true)
                                <x-tienda.pedidos-detalle :pedido="$pedido"/>

                            @else
                                @foreach ($pedidos as $pedido)
                                    <x-tienda.pedidos-detalle :pedido="$pedido"/>
                                @endforeach
                            @endif

                            {{ $pedidos->links() }}
                        </div>
                    </div>

                </div>

                @if (!$pedidos->count())
                    <x-tienda.no-pedidos/>
                @endif

            </div>


            <x-footers.footer-store />

        </section>
</div>



@endsection

@section('scripts')
    @if (session('error') == 'not_found')
        <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Pedido no Encontrado.',
                    text: "No se encontro algun pedido que tenga este ID.",

                    showConfirmButton: false,
                    timer: 5000
                })
        </script>
    @endif
@endsection
