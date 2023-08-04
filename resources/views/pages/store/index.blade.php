@extends('layouts.appstore')

@section('title', 'Página de inicio')

@section('content')

    <div class="bg-gray-100 dark:bg-slate-700">
        <div class="mx-auto max-w-2xl px-2 py-12 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                    <x-productos.contexto-empresa />

                    <x-productos.categorias-home />

                    <x-productos.top-productos />

                    <x-footers.footer-store />


        </div>
    </div>

@endsection
