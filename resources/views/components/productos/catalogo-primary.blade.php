<main class="my-8">
    <div class="container mx-auto px-6">


        {{-- ITEM PRINCIPAL --}}

        <div class="md:flex md:items-center">
            <div class="w-full h-64 md:w-1/2 lg:h-96">
                <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto"
                    src="{{ url('productos_subidos') }}/{{ $productoReciente->imagen }}"
                    alt="{{$productoReciente->nombre}}">
            </div>
            <div class="w-full max-w-lg mx-auto mt-5 md:ml-8 md:mt-0 md:w-1/2">
                <h3 class="text-gray-700 uppercase text-lg">{{$productoReciente->nombre}}</h3>
                <span class="text-gray-500 mt-3">${{ number_format($productoReciente->precio, 0, ',', '.') }}
                </span>
                <hr class="my-3">
                <form class="flex items-center mt-6" action="{{route('agregaritem')}}" method="POST">
                    <input name="producto_id" type="hidden" value="{{$productoReciente->id}}">
                    @csrf
                    <button type="submit" class="px-8 py-2 bg-sky-600 text-white text-sm font-medium rounded hover:bg-sky-500 focus:outline-none focus:bg-sky-500">Añadir al Carrito</button>
                </form>
            </div>
        </div>
        {{-- ITEM PRINCIPAL --}}

        {{-- PRODUCTOS --}}
        <div class="mt-16">
            <h3 class="text-gray-600 text-2xl font-medium"></h3>
            <section class="py-10  ">
                <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

            @foreach ($productos as $producto)
                  <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                    <a href="#">
                      <div class="relative flex items-end overflow-hidden rounded-xl">
                        <img src="{{ url('productos_subidos') }}/{{ $producto->imagen }}" alt="PRODUCTO" />
                        <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                          </svg>

                          <button class="text-sm">Añadir al Carrito</button>
                        </div>
                      </div>
                      <div class="mt-1 p-2">
                        <h2 class="text-slate-700">{{ $producto->nombre }}</h2>
                        <p class="mt-1 text-sm text-slate-400">{{ $producto->categoria }}</p>

                        <div class="mt-3 flex items-end justify-between">
                            <p class="text-sm font-bold text-blue-500">${{ number_format($producto->precio, 0, ',', '.') }}
                            </p>
                        </div>
                        <form action="{{route('agregaritem')}}" class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-3 py-1.5 mt-3 text-white duration-100 hover:bg-blue-600" method="POST">
                            @csrf
                            <input name="producto_id" type="hidden" value="{{$producto->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                              </svg>

                              <button type="submit" class="text-sm">Añadir al Carrito</button>
                          </form>
                      </div>
                    </a>
                  </article>
            @endforeach

              </section>
        </div>
        {{-- PRODUCTOS --}}

    </div>
</main>
