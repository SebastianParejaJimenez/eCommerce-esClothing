@extends('layouts.appstore')
    @section('title', 'Página de inicio')
<div x-data="{ cartOpen: false, isOpen: false }" class="bg-white">
    @section('content')
        <x-productos.carrito-header />
        <div class="mx-auto max-w-2xl px-2 py-12 sm:px-6 sm:py-8 lg:max-w-7xl lg:px-8">

            <x-productos.contexto-empresa :productos='$producto_randoms' />

            <x-productos.top-productos :productos='$producto_randoms' />

            <x-tienda.comprar-por-categoria />
        </div>
        <x-footers.footer-store />

</div>
@endsection
