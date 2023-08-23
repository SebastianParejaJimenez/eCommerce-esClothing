@if (count(Cart::content()))

<div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed right-0 top-0 max-w-xs w-full h-4/5 px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-2 border-gray-300">
    <div class="flex items-center justify-between">
        <h3 class="text-2xl font-medium text-gray-700">Resumen Carrito de Compras</h3>
        <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
    <hr class="my-3">

    @foreach (Cart::content() as $item)
    <div class="flex justify-between mt-6">
        <div class="flex">
            <img class="h-20 w-20 object-cover rounded" src="{{ url('productos_subidos') }}/{{ $item->options->urlfoto }}" alt="">
            <div class="mx-3">
                <h3 class="text-sm text-gray-600">{{$item->name}}</h3>
                <p class="text-sm">Cantidad. {{$item->qty}}</p>
            </div>
        </div>
        <span class="text-gray-600">${{number_format($item->price, 0, ',', '.')}}</span>
    </div>
    @endforeach

    <a href="{{route('carrito_detalles')}}" class="flex items-center justify-center mt-4 px-3 py-2 bg-sky-600 text-white text-sm uppercase font-medium rounded hover:bg-sky-500 focus:outline-none focus:bg-sky-500">
        <span>Ir a Comprar</span>
        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
    </a>
    <a href="{{route('eliminarcarrito')}}" class="flex items-center justify-center mt-4 px-3 py-2 bg-gray-600 text-white text-sm uppercase font-medium rounded hover:bg-gray-500 focus:outline-none focus:bg-gray-500">
        <span>Eliminar Carrito</span>
    </a>
</div>
@endif
