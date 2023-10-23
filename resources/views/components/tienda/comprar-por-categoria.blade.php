      <!-- This example requires Tailwind CSS v2.0+ -->
      <section id="#categorias" class="bg-white">
        <div class="py-2 sm:py-4 xl:max-w-7xl xl:mx-auto xl:px-8">
            <div class="px-4 sm:px-6 sm:flex sm:items-center sm:justify-between lg:px-8 xl:px-0">
                <h2 class="text-2xl font-bold tracking-tight ">Comprar por Categoria</h2>
                <a href="{{ route('catalogo') }}"
                    class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 sm:block">Consulta todas las Categorias<span aria-hidden="true"> &rarr;</span></a>
            </div>

            <div class="mt-4 flow-root">
                <div class="-my-2">
                    <div class="box-content py-2 relative h-80 overflow-x-auto xl:overflow-visible">
                        <div
                            class="absolute min-w-screen-xl px-4 flex space-x-8 sm:px-6 lg:px-8 xl:relative xl:px-0 xl:space-x-0 xl:grid xl:grid-cols-5 xl:gap-x-8">
                            <a href="{{ route('catalogo_categoria', ['categoria' => 'Camisas']) }}"
                                class="relative w-56 h-80 rounded-lg p-6 flex flex-col overflow-hidden hover:opacity-75 xl:w-auto">
                                <span aria-hidden="true" class="absolute inset-0">
                                    <img src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1887&q=80"
                                        alt="" class="w-full h-full object-center object-cover">
                                </span>
                                <span aria-hidden="true"
                                    class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                                <span class="relative mt-auto text-center text-xl font-bold text-white">Camisas</span>
                            </a>

                            <a href="{{ route('catalogo_categoria', ['categoria' => 'Conjuntos']) }}"
                                class="relative w-56 h-80 rounded-lg p-6 flex flex-col overflow-hidden hover:opacity-75 xl:w-auto">
                                <span aria-hidden="true" class="absolute inset-0">
                                    <img src="https://images.unsplash.com/photo-1467043237213-65f2da53396f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1887&q=80"
                                        alt="" class="w-full h-full object-center object-cover">
                                </span>
                                <span aria-hidden="true"
                                    class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                                <span
                                    class="relative mt-auto text-center text-xl font-bold text-white">Conjuntos</span>
                            </a>

                            <a href="{{ route('catalogo_categoria', ['categoria' => 'Chaquetas-Buzos']) }}"
                                class="relative w-56 h-80 rounded-lg p-6 flex flex-col overflow-hidden hover:opacity-75 xl:w-auto">
                                <span aria-hidden="true" class="absolute inset-0">
                                    <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1935&q=80"
                                        alt="" class="w-full h-full object-center object-cover">
                                </span>
                                <span aria-hidden="true"
                                    class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                                <span
                                    class="relative mt-auto text-center text-xl font-bold text-white">Chaquetas Y Buzos</span>
                            </a>

                            <a href="{{ route('catalogo_categoria', ['categoria' => 'Accesorios']) }}"
                                class="relative w-56 h-80 rounded-lg p-6 flex flex-col overflow-hidden hover:opacity-75 xl:w-auto">
                                <span aria-hidden="true" class="absolute inset-0">
                                    <img src="https://images.unsplash.com/photo-1553062407-98eeb64c6a62?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1887&q=80"
                                        alt="" class="w-full h-full object-center object-cover">
                                </span>
                                <span aria-hidden="true"
                                    class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                                <span
                                    class="relative mt-auto text-center text-xl font-bold text-white">Accessorios</span>
                            </a>

                            <a href="{{ route('catalogo') }}"
                                class="relative w-56 h-80 rounded-lg p-6 flex flex-col overflow-hidden hover:opacity-75 xl:w-auto">
                                <span aria-hidden="true" class="absolute inset-0">
                                    <img src="https://plus.unsplash.com/premium_photo-1664202526047-405824c633e7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDh8fHxlbnwwfHx8fHw%3D&auto=format&fit=crop&w=500&q=60"
                                        alt="" class="w-full h-full object-center object-cover">
                                </span>
                                <span aria-hidden="true"
                                    class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                                <span class="relative mt-auto text-center text-xl font-bold text-white">Todos los Productos</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 px-4 sm:hidden">
                <a href="{{ route('catalogo') }}" class="block text-sm font-semibold text-indigo-600 hover:text-indigo-500">Consulta todas las Categorias<span aria-hidden="true"> &rarr;</span></a>
            </div>
        </div>
    </section>
