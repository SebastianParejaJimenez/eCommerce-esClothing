<div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 md:text-left">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[490px] rounded-lg bg-gray-300 mb-4">
                    <img class="w-full h-full object-cover"
                        src="{{ url('productos_subidos') }}/{{ $producto->imagen }}" alt="Producto Imagen">
                </div>
            </div>
            <div class="md:flex-1 px-4 m-auto">
                <h2 class="text-2xl font-bold mb-2">{{ $producto->nombre }}</h2>
                <span class="font-bold text-gray-700">Categoria:</span>
                <p class="text-gray-600 text-sm mb-4">{{ $producto->categoria }}</p>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-gray-700">Precio:</span>
                        <span class="text-gray-600">${{ number_format($producto->precio, 0, ',', '.') }}</span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700">Disponibilidad:</span>
                        <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-sm">Disponible</span>
                    </div>
                </div>

                    <div class="mb-4">
                        <span class="font-bold text-gray-700">Tallas Disponibles:</span>
                        <div class="flex items-center my-3">
                            @foreach ($producto->tallas as $talla)
                                <div>
                                    <input type="radio" name="talla" id="{{ $talla->talla }}"
                                        value="{{ $talla->talla }}" class="peer hidden" />
                                    <label for="{{ $talla->talla }}"
                                        class=" bg-gray-300 text-gray-700 py-2 px-4 rounded-full font-bold mr-2 hover:bg-gray-400  select-none border-solid border-2 border-indigo-200  p-2 mx-2 text-center  peer-checked:font-bold ">{{ $talla->talla }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

            </div>
        </div>

    </div>
</div>
