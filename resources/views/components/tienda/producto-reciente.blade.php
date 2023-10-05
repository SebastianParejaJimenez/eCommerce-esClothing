@if ($productoReciente)
<div class="md:flex md:items-center">
    <div class="w-full h-64 md:w-1/2 lg:h-96">
        <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto"
            src="{{ url('productos_subidos') }}/{{ $productoReciente->imagen }}"
            alt="{{ $productoReciente->nombre }}">
    </div>
    <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
        <h3 class="text-gray-700 uppercase text-lg">{{ $productoReciente->nombre }}</h3>
        <span
            class="text-green-500 mt-3">${{ number_format($productoReciente->precio, 0, ',', '.') }}</span>
        <hr class="my-3">
        {{--                                             <div class="mt-2">
            <label class="text-gray-700 text-sm" for="count">Count:</label>


        </div> --}}

        <form class="" action="{{ route('agregaritem') }}"
            method="POST" id="form-talla">
            @csrf
            <div class="mt-3">
                <label class="text-gray-700 text-sm" for="count">Seleccionar una talla:</label>
                <div class="flex items-center mt-3">
                    @foreach ($productoReciente->tallas as $talla)
                    <div>
                        <input type="radio" name="talla" id="{{$talla->talla}}" value="{{$talla->talla}}" class="peer hidden" />
                        <label for="{{$talla->talla}}" class=" border-solid border-2 border-indigo-200 cursor-pointer select-none rounded-md p-2 mx-2 text-center peer-checked:bg-indigo-300 peer-checked:font-bold peer-checked:text-gray-600  hover:bg-indigo-200">{{$talla->talla}}</label>
                    </div>
                    @endforeach

                </div>
            </div>

            <div class="flex items-center mt-6">
                <input name="producto_id" type="hidden"
                    value="{{ $productoReciente->id }}">

                <button type="submit"
                    class="flex gap-2 px-5 py-2 bg-green-400 text-white text-sm font-medium rounded hover:bg-green-500 focus:outline-none focus:bg-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" class="w-5 h-5">
                            <path
                                d="M1 1.75A.75.75 0 011.75 1h1.628a1.75 1.75 0 011.734 1.51L5.18 3a65.25 65.25 0 0113.36 1.412.75.75 0 01.58.875 48.645 48.645 0 01-1.618 6.2.75.75 0 01-.712.513H6a2.503 2.503 0 00-2.292 1.5H17.25a.75.75 0 010 1.5H2.76a.75.75 0 01-.748-.807 4.002 4.002 0 012.716-3.486L3.626 2.716a.25.25 0 00-.248-.216H1.75A.75.75 0 011 1.75zM6 17.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15.5 19a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                        </svg>
                    Agregar al Carrito</button>

                <a href="{{route('productos.show', ['id' => $productoReciente->id, 'slug' => $productoReciente->slug])}}"
                    class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>

                </a>
            </div>

        </form>
    </div>
</div>
@else
<div class="text-center mt-12 bg-white py-20 rounded-md dark:bg-slate-500">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-200" style="fill: rgba(23, 23, 23, 0.756);transform: ;msFilter:;">
        <path d="M22 8a.76.76 0 0 0 0-.21v-.08a.77.77 0 0 0-.07-.16.35.35 0 0 0-.05-.08l-.1-.13-.08-.06-.12-.09-9-5a1 1 0 0 0-1 0l-9 5-.09.07-.11.08a.41.41 0 0 0-.07.11.39.39 0 0 0-.08.1.59.59 0 0 0-.06.14.3.3 0 0 0 0 .1A.76.76 0 0 0 2 8v8a1 1 0 0 0 .52.87l9 5a.75.75 0 0 0 .13.06h.1a1.06 1.06 0 0 0 .5 0h.1l.14-.06 9-5A1 1 0 0 0 22 16V8zm-10 3.87L5.06 8l2.76-1.52 6.83 3.9zm0-7.72L18.94 8 16.7 9.25 9.87 5.34zM4 9.7l7 3.92v5.68l-7-3.89zm9 9.6v-5.68l3-1.68V15l2-1v-3.18l2-1.11v5.7z"></path>
    </svg>
    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No Hay Productos Disponibles</h3>
    <p class="mt-1 text-sm text-gray-500  dark:text-white">Actualmente la tienda no tiene productos disponibles a la venta.</p>
</div>
@endif
