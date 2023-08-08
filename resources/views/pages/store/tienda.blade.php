@extends('layouts.appstore')

@section('title', 'Página de inicio')
@section('content')

<div x-data="{ cartOpen: false , isOpen: false }">

    <div x-data="{ cartOpen: false , isOpen: false }" class="bg-gray-100">
        <div class="mx-auto max-w-2xl px-2 py-12 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">

                    <x-productos.contexto-empresa :productos='$producto_randoms' />

{{--                     <x-productos.categorias-home />
 --}}
{{--                     <x-productos.top-productos  :productostop='$productos_top'  />
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
                        <div class="p-2 w-12"><img src="https://dummyimage.com/50x50/bababa/0011ff&amp;text=50x50" alt="img product"></div>
                        <div class="flex-auto text-sm w-32">
                            <div class="font-bold">{{$item->name}}</div>
                            <div class="truncate">{{$item->categoria}}</div>
                            <div class="text-gray-400">Qty: {{number_format($item->qty)}}</div>
                        </div>
                        <div class="flex flex-col w-18 font-medium items-end">
                            <div class="w-4 h-4 mb-6 hover:bg-red-200 rounded-full cursor-pointer text-red-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 ">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
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
