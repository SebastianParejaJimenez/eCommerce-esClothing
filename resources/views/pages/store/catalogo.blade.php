@extends('layouts.appcatalogo')

@section('title', 'Catalogo')

<!-- tailwind.config.js -->


<div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
@section('content')
<x-productos.carrito-header />

<x-productos.catalogo-primary :productos='$productos_orden' :producto-reciente="$productoReciente"/>


    <footer class="bg-gray-200">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="#" class="text-xl font-bold text-gray-500 hover:text-gray-400">Brand</a>
            <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
        </div>
    </footer>
</div>

@endsection
