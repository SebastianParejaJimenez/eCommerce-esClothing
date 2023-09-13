@php
    use App\Models\Producto;
    $cont_prod = Producto::count();
@endphp

@extends('layouts.appcatalogo')

@section('title', 'Catalogo')

<!-- tailwind.config.js -->


<div x-data="{ cartOpen: false, isOpen: false }" class="bg-white">
    @section('content')
        <x-productos.carrito-header />
        <!-- component -->


        <section class="bg-white dark:bg-gray-900">
            @if ($cont_prod)
                <div class="container px-6 py-8 mx-auto">
                    <div class="lg:flex lg:-mx-2">
                        <x-tienda.categorias />
                        <div class="mt-6 lg:mt-0 lg:px-2 lg:w-4/5 ">
                            <x-dashboard.spinner-loading />
                            <div id="content-main">
                                <x-tienda.producto-reciente :productoReciente='$productoReciente' />
                                <x-tienda.productos-por-categoria :productos='$productos_categoria' />
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <x-tienda.no-existe />
            @endif
    </section>
    <x-footers.footer-store />

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
