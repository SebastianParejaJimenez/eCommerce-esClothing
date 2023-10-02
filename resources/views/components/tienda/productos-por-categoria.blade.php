<div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
    @foreach ($productos as $producto)
        <form action="{{ route('agregaritem') }}" method="POST" id="">
            @csrf
            <input name="producto_id" type="hidden" value="{{ $producto->id }}">
            <div class="relative">
                <div class="relative w-full h-72 rounded-lg overflow-hidden">
                    <img src="{{ url('productos_subidos') }}/{{ $producto->imagen }}"
                        alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls."
                        class="w-full h-full object-center object-cover">
                </div>
                <div class="relative mt-4">
                    <h3 class="text-sm font-medium text-gray-900">{{$producto->nombre}}</h3>
                    <p class="mt-1 text-sm text-gray-500">{{$producto->categoria}}</p>
                </div>
                <div class="relative mt-4">
                    <p class="mt-1 text-sm text-gray-500">Seleccione una talla</p>
                    <select name="talla"
                        class=" w-full rounded border appearance-none border-gray-400 py-1 hover:border-green-400 focus:outline-none focus:border-green-400 text-sm">
                        @foreach ($producto->tallas as $talla)
                            <option value="{{ $talla->talla }}">{{ $talla->talla }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="absolute top-0 inset-x-0 h-72 rounded-lg p-4 flex items-end justify-end overflow-hidden">
                    <div aria-hidden="true"
                        class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                    <p class="relative text-lg font-semibold text-white">${{ number_format($producto->precio, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="relative flex bg-gray-100 border border-transparent rounded-md py-2 px-8 items-center justify-center text-sm font-medium text-gray-900 hover:bg-gray-200">Añadir al Carrito</button>

            </div>
        </form>
    @endforeach
</div>
{{ $productos->links() }}
