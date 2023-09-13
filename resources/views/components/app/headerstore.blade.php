<header>
    <section class="relative bg-gray-50 border-b font-poppins dark:bg-gray-800 dark:border-gray-800">
        <div class="container mx-auto py-3" x-data="{ open: false }">
            <nav class="flex justify-between ">
                <div class="flex items-center justify-between w-full px-4 py-2 lg:px-2 ">
                    <a href="{{route('tienda')}}" class="text-2xl text-gray-700 dark:text-gray-400">esClothing.</a>
                    <div class="flex items-center lg:hidden ">

                        @if (Auth::user())
                        <x-dropdown-profile  />
                        @endif
                        <a href="" class="mx-4 dark:text-gray-400 hover:text-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-heart" viewBox="0 0 16 16">
                                <path
                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                            </svg>
                        </a>

                        <button @click="cartOpen = !cartOpen" class="flex items-center mr-4 dark:text-gray-400 hover:text-indigo-500">
                            <div class="relative mr-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class=" bi bi-cart" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                                @if (Cart::content()->count())
                                    <span
                                        class="absolute -top-2 left-4 rounded-full bg-red-500 p-0.5 px-2 text-sm text-red-50">
                                        {{ Cart::content()->count() }}
                                    </span>
                                @else
                                @endif
                            </div>
                        </button>

                        <button
                            class="flex items-center px-3 py-2 text-blue-600 border border-blue-200 rounded dark:text-gray-400 hover:text-blue-800 hover:border-blue-300 lg:hidden"
                            @click="open =true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </button>
                    </div>
                    <ul class="hidden font-medium lg:flex">
                        @if (Auth::user() && Auth::user()->rol_id == 1)
                            <li class="mr-12"><a href="{{route('dashboard')}}"
                                    class="text-gray-700 hover:text-indigo-500 dark:text-gray-400">Dashboard</a>
                            </li>
                        @endif
                        <li class="mr-12"><a href="{{route('pedidos_hechos')}}"
                                class="text-gray-700 hover:text-indigo-500 dark:text-gray-400">Historial de Pedidos</a>
                        </li>
                        <li class="mr-12"><a href="{{route('catalogo')}}"
                                class="text-gray-700 hover:text-indigo-500 dark:text-gray-400">Catalogo</a>
                        </li>

                    </ul>
                    <div class="items-center justify-end hidden lg:flex dark:text-gray-400">
                        <a href="" class="mr-7 hover:text-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-heart" viewBox="0 0 16 16">
                                <path
                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z">
                                </path>
                            </svg>
                        </a>
                        <button @click="cartOpen = !cartOpen" class="flex items-center mr-6 dark:text-gray-400 hover:text-indigo-500">
                            <div class="relative ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                    class="bi bi-cart" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                                @if (Cart::content()->count())
                                <span
                                    class="absolute -top-2 left-4 rounded-full bg-red-500  px-2 text-sm text-red-50">
                                    {{ Cart::content()->count() }}
                                </span>
                                @else
                                @endif
                            </div>
                        </button>
                        @if (Auth::user())
                            <x-dropdown-profile align="right" />
                        @else
                            <a href="{{ route('login') }}"
                                class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Inicia
                                Sesión</a>
                        @endif
                    </div>
                </div>
            </nav>
            <!-- Mobile Sidebar -->
            <div class="fixed inset-0 w-full bg-gray-800 opacity-25 lg:hidden dark:bg-gray-400"
                :class="{ 'translate-x-0 ease-in-opacity-100': open === true, '-translate-x-full ease-out opacity-0': open ===
                        false }">
            </div>
            <div class="fixed inset-0 z-10 h-screen p-3 text-gray-700 duration-500 transform shadow-md dark:bg-gray-800 bg-blue-50 w-80 lg:hidden lg:transform-none lg:relative"
                :class="{ 'translate-x-0 ease-in-opacity-100': open === true, '-translate-x-full ease-out opacity-0': open ===
                        false }">
                <div class="flex justify-between">
                    <a class="p-2 text-2xl font-bold dark:text-gray-400" href="#">esClothing.</a>
                    <button class="p-2 rounded-md hover:text-blue-300 lg:hidden dark:text-gray-300" @click="open=false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                </div>

                <ul class="px-5 text-left mt-7">
                    @if (Auth::user() && Auth::user()->rol_id == 1)
                        <li class="pb-3">
                            <a href="{{route('dashboard')}}" class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-100">Dashboard</a>
                        </li>
                    @endif
                    <li class="pb-3">
                        <a href="{{route('catalogo')}}" class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400">Catalogo</a>
                    </li>
                    <li class="pb-3">
                        <a href="{{route('pedidos_hechos')}}"
                            class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400">Historial de Pedidos</a>
                    </li>
                    @if (!Auth::user())
                    <a href="{{ route('login') }}"
                        class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400">Inicia
                        Sesión</a>
                    @endif
                </ul>
            </div>
        </div>
    </section>
</header>
