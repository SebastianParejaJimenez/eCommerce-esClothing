@extends('layouts.appstore')

@section('title', 'Página de inicio')

@section('content')

<style>@import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);</style>
<div class="min-w-screen min-h-screen bg-gray-300 flex items-center p-5 lg:p-10 overflow-hidden relative">
    <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
        <div class="md:flex items-center -mx-10">
            <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                <div class="relative">
                    <img src="{{ url('productos_subidos') }}/{{$producto->imagen}}" class="w-full relative z-10" alt="">
                    <div class="border-4 border-sky-200 absolute top-5 bottom-5 left-5 right-5 z-0"></div>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-10">
                <div class="mb-10">
                    <h1 class="font-bold uppercase text-2xl mb-4 underline decoration-sky-500">{{$producto->nombre}} </h1>
                    <p class="text-l mb-2 font-bold">Categoria: {{$producto->categoria}}</p>
                    <p class="text-sm">Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Eos, voluptatum dolorum! Laborum blanditiis consequatur, voluptates, sint enim fugiat saepe, dolor fugit, magnam explicabo eaque quas id quo porro dolorum facilis...
                    </p>
                </div>
                <div>
                    <div class="inline-block align-bottom mr-5 mb-5">
                        <span class="text-2xl leading-none align-baseline">$</span>
                        <span class="font-bold text-5xl leading-none align-baseline">{{ number_format($producto->precio , 2, ',', '.') }}</span>
                    </div>

                    <form action="{{route('agregaritem')}}" method="POST">
                        @csrf
                        <input name="producto_id" type="hidden" value="{{$producto->id}}">

                    <div class="inline-block align-bottom mt-5">
                        <button type="submite" class="bg-sky-300 opacity-75 hover:opacity-100 text-sky-900 hover:text-gray-900 rounded-full px-10 py-2 font-semibold"><i class="mdi mdi-cart -ml-2 mr-2"></i> Añadir al Carrito </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
