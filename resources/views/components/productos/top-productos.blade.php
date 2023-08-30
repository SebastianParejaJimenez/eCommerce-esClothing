<div class="my-14">
    <h3 class="text-gray-600 text-2xl font-medium">Novedades</h3>
    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
        @foreach ($productos as $producto)
            <div class="max-w-md w-full shadow-lg rounded-xl p-6">
                <div class="flex flex-col ">
                    <div class="">
                        <div class="relative h-62 w-full mb-3">
                            <img src="{{ url('productos_subidos') }}/{{ $producto->imagen }}"
                                alt="Just a flower" class=" w-full   object-fill  rounded-2xl">
                        </div>
                        <div class="flex-auto justify-evenly">
                            <div class="flex flex-wrap ">
                                <div class="flex items-center w-full justify-between min-w-0 ">
                                    <a href="{{ route('productos.show', ['id' => $producto->id, 'slug' => $producto->slug]) }}"
                                        class="text-lg mr-auto cursor-pointer text-gray-500 hover:text-purple-500">{{ $producto->nombre }}</a>
                                    <div
                                        class="flex items-center bg-green-400 text-white text-xs px-2 py-1 ml-3 rounded-lg">
                                        STOCK</div>
                                </div>
                            </div>
                            <div class="text-xl text-gray-500 font-semibold mt-1">$240.00</div>

                            <div class="flex space-x-2 mt-2 text-sm font-medium justify-start">
                                <button
                                    class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-indigo-400 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-indigo-500 ">
                                    <span>Consultar</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
