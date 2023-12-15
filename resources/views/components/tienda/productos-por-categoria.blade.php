<div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">

    @foreach ($productos as $producto)
        <form action="{{ route('agregaritem') }}" method="POST">
            @csrf
            <input name="producto_id" type="hidden" value="{{ $producto->id }}">
            <a href="{{ route('productos.show', ['id' => $producto->id, 'slug' => $producto->slug]) }}" class="relative">
                <div class="relative w-full h-72 rounded-lg overflow-hidden">
                    <img src="{{ url('productos_subidos') }}/{{ $producto->imagen }}"
                        alt="{{$producto->nombre}}."
                        class="w-full h-full object-center object-cover">
                </div>
                <div class="relative mt-4">
                    <h3 class="text-sm font-medium text-gray-900">{{$producto->nombre}}</h3>
                    <p class="mt-1 text-sm text-gray-500">Cantidad: {{$producto->cantidad}}</p>
                </div>
                @if ($producto->categoria != "Accesorios")
                    <div class="relative mt-4">
                        <p class="mt-1 text-sm text-gray-500">Seleccione una talla</p>
                        <select name="talla"
                            class=" w-full rounded border appearance-none border-gray-400 py-1 hover:border-green-400 focus:outline-none focus:border-green-400 text-sm">
                            @foreach ($producto->tallas as $talla)
                                <option value="{{ $talla->talla }}">{{ $talla->talla }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                <div class=" hidden relative mt-4">
                    <p class="mt-1 text-sm text-gray-500">Seleccione una talla</p>
                    <select name="talla" class=" w-full rounded border appearance-none border-gray-400 py-1 hover:border-green-400 focus:outline-none focus:border-green-400 text-sm">
                            <option value="Unico" selected>Único</option>
                    </select>
                </div>
                @endif

                <div class="absolute top-0 inset-x-0 h-72 rounded-lg p-4 flex items-end justify-end overflow-hidden">
                    <div aria-hidden="true"
                        class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                    <p class="relative text-lg font-semibold text-white">${{ number_format($producto->precio, 0, ',', '.') }}</p>
                </div>
            </a>
            <div class="mt-6 items">
                <button type="submit" class=" flex gap-2  bg-green-400 text-white text-sm font-medium hover:bg-green-500 focus:outline-none focus:bg-green-500 border border-transparent rounded-md py-1.5 px-6 items-center justify-center "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" class="w-5 h-5">
                    <path
                        d="M1 1.75A.75.75 0 011.75 1h1.628a1.75 1.75 0 011.734 1.51L5.18 3a65.25 65.25 0 0113.36 1.412.75.75 0 01.58.875 48.645 48.645 0 01-1.618 6.2.75.75 0 01-.712.513H6a2.503 2.503 0 00-2.292 1.5H17.25a.75.75 0 010 1.5H2.76a.75.75 0 01-.748-.807 4.002 4.002 0 012.716-3.486L3.626 2.716a.25.25 0 00-.248-.216H1.75A.75.75 0 011 1.75zM6 17.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15.5 19a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                </svg>Añadir al Carrito</button>
            </div>
        </form>
    @endforeach

</div>
{{ $productos->links() }}
