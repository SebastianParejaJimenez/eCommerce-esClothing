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
<div
    class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
        <div class="mt-5 sm:mt-0 ">
            <h2 class="text-xl font-bold text-gray-900 ">No existen productos en esta
                Categoria.</h2>
        </div>
    </div>
</div>
@endif
