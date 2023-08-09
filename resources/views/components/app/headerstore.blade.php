<header>
    <nav class=" top-0 bg-white dark:bg-[#182235] border-b border-slate-200 dark:border-slate-700 z-30 px-4 lg:px-6 py-2.5">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="#" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">esClothing</span>
            </a>
            <div class="flex items-center lg:order-2">

                <button  @click="cartOpen = !cartOpen" class="px-4 bg-white">
                    <div class="relative scale-75">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                      </svg>
                      @if (Cart::content()->count())
                      <span class="absolute -top-2 left-4 rounded-full bg-red-500 p-0.5 px-2 text-sm text-red-50">
                        {{Cart::content()->count()}}
                      </span>
                      @else

                      @endif

                    </div>
                  </button>

                @if (Auth::user())
                <x-dropdown-profile align="right" />

                @else
                <a href="{{route('login')}}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Inicia Sesión</a>
                @endif
            </div>

            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="{{url('/tienda')}}" class="block py-2 pr-4 pl-3 text-gray-700 rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Inicio</a>
                    </li>
                    @if (Auth::user() && Auth::user()->rol_id == 1)
                    <li>
                        <a href="{{url('/dashboard')}}" class="block py-2 pr-4 pl-3 text-gray-700 rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Dashboard</a>
                    </li>
                    @endif

                    <li>
                        <a href="{{route('catalogo')}}" class="block py-2 pr-4 pl-3 text-gray-700 rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Catálogo</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
