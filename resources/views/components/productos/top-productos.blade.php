<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap w-full mb-20">
            <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                <h2 class="sm:text-3xl text-2xl font-bold title-font mb-2">Productos Mas Comprados</h2>
                <div class="h-1 w-20 bg-indigo-500 rounded"></div>
            </div>
            <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">A continuación podra consultar aquellos productos
                top de nuestra tienda y los que los clientes prefieren.</p>
        </div>

        <div class="flex flex-wrap -m-4">
            @foreach ($productos as $producto)
                <div class="xl:w-1/4 md:w-1/2 p-4 relative">
                    <a href="{{ route('productos.show', ['id' => $producto->id, 'slug' => $producto->slug]) }}"
                        class="btn bg-indigo-400 hover:bg-indigo-500 text-white absolute top-0 right-2 rounded-full">
                        <span class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </span>
                    </a>
                    <div class="bg-slate-50 p-7 rounded-lg">
                        <img class="h-40 rounded w-full object-cover object-center mb-6"
                            src="{{ url('productos_subidos') }}/{{ $producto->imagen }}" alt="content">
                        <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">
                            {{ $producto->categoria }}</h3>
                        <div class="flex flex-wrap ">
                            <div class="flex items-center w-full justify-between min-w-0 ">
                                <a href="{{ route('productos.show', ['id' => $producto->id, 'slug' => $producto->slug]) }}"
                                    class="text-lg text-gray-900 font-medium title-font mb-4 hover:text-indigo-500">{{ $producto->nombre }}</a>
                                <div
                                    class="flex items-center bg-green-400 text-white text-xs px-2 py-1 ml-3 rounded-lg">
                                    STOCK</div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
</section>
