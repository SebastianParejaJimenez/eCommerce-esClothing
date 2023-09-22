<div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($productos as $producto)
        <div class=" p-6 bg-white rounded-xl shadow-xl hover:shadow-2xl hover:scale-105 transition-all transform duration-500">
            <img class="w-64 object-cover rounded-t-md"
                src="{{ url('productos_subidos') }}/{{ $producto->imagen }}"
                alt="{{ $producto->nombre }}">
            <div class="mt-4">
                <h1 class="text-2xl font-bold text-gray-700">{{ $producto->nombre }}</h1>
                <p class="text-sm mt-2 text-gray-700">Seleccionar Talla:</p>
                <form class="mx-2 -mb-4" action="{{ route('agregaritem') }}"
                    method="POST" id="">
                    <div class="mt-3 space-x-4 flex p-1">
                        <div class="flex items-center">
                            <div class="relative">
                                <select name="talla"
                                    class=" w-full rounded border appearance-none border-gray-400 py-2 hover:border-green-400 focus:outline-none focus:border-green-400 text-sm">
                                    @foreach ($producto->tallas as $talla)
                                        <option value="{{$talla->talla}}">{{$talla->talla}}</option>
                                    @endforeach
                                </select>
                                <span
                                    class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                    <svg fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" class="w-4 h-4"
                                        viewBox="0 0 24 24">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 mb-2 flex justify-between pl-4 pr-2">
                        <button
                            class="block text-xl font-semibold text-gray-700 cursor-auto">${{ number_format($producto->precio, 0, ',', '.') }}</button>
                        <input name="producto_id" type="hidden"
                            value="{{ $producto->id }}">
                        @csrf
                        <button
                            class="text-lg block font-semibold py-2 px-6 text-green-100 hover:text-white bg-green-400 rounded-lg shadow hover:shadow-md transition duration-300"><svg
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" class="w-5 h-5">
                                <path
                                    d="M1 1.75A.75.75 0 011.75 1h1.628a1.75 1.75 0 011.734 1.51L5.18 3a65.25 65.25 0 0113.36 1.412.75.75 0 01.58.875 48.645 48.645 0 01-1.618 6.2.75.75 0 01-.712.513H6a2.503 2.503 0 00-2.292 1.5H17.25a.75.75 0 010 1.5H2.76a.75.75 0 01-.748-.807 4.002 4.002 0 012.716-3.486L3.626 2.716a.25.25 0 00-.248-.216H1.75A.75.75 0 011 1.75zM6 17.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15.5 19a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                        </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $productos->links() }}
