<div class="bg-white dark:bg-gray-200 border rounded-md">
    <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-100 mb-2">Productos Mas Comprados <h2>
                <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                    @foreach ($productostop as $productostop)
                        <a href="#" class="group">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                <div class="h-full w-full object-cover object-center group-hover:opacity-75">
                                    <img src="{{ url('productos_subidos') }}/{{$productostop->imagen}}"
                                    alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                                    class="">
                                </div>
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">{{$productostop->nombre}}</h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">${{ number_format($productostop->precio , 2, ',', '.') }}</p>
                        </a>
                    @endforeach

                    <!-- More products... -->
                </div>
    </div>
</div>
