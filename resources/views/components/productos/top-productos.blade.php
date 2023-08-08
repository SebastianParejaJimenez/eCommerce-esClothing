<div class="bg-white dark:bg-gray-200 border rounded-md">
    <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-100 mb-2">Productos Mas Comprados <h2>
                <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                    @foreach ($productostop as $productostop)
                        <div href="#" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                <div class="h-full w-full object-cover object-center group-hover:opacity-75">
                                    <img src="{{ url('productos_subidos') }}/{{$productostop->imagen}}"
                                    alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                                    class="">
                                </div>
                            </div>
                            <h3 class=" underline decoration-sky-500 mt-4 mb-4 text-sm text-gray-700">{{$productostop->nombre}}</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">${{ number_format($productostop->precio , 2, ',', '.') }}</p>

                            <form action="{{route('agregaritem')}}" method="POST" class="mt-3 flex items-end justify-between">
                                @csrf
                                <div class="flex items-center space-x-0.5 rounded-lg bg-white-500 px-4 py-1.5 text-black border-2 border-black duration-100 hover:bg-gray-200">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                  </svg>
                                  <input name="producto_id" type="hidden" value="{{$productostop->id}}">
                                <button type="submit" class="text-sm">Añadir al Carrito</button>
                                </div>
                              </form>
                        </div>
                    @endforeach

                </div>
    </div>
</div>
