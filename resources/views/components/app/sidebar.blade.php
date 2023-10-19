<div>
    <!-- Sidebar backdrop (mobile only) -->
    <div
        class="fixed inset-0 bg-gray-50 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'"
        aria-hidden="true"
        x-cloak>
    </div>

    <!-- Sidebar -->
    <div
        id="sidebar"
        class="flex flex-col absolute z-50 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-full lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 dark:bg-slate-800 bg-gray-50 p-4 transition-all duration-200 ease-in-out mt-1"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'"
        @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false"
>

        <!-- Sidebar header -->


        <!-- Links -->
        <div class="">
            <div class="body-content" x-data="{ open: true }">
                <div class="relative lg:block navbar-menu">
                    <nav x-bind:class="! open ? 'w-0' : 'w-[280px]'" class="fixed top-0 transition-all lg:mt-0 z-0  left-0 dark:bg-gray-900 bottom-0 flex flex-col w-[280px] lg:border-none border-r border-gray-200 dark:border-gray-800 bg-gray-50 overflow-hidden "
                        id="sidenav">
                        <div
                            class="flex items-center w-full px-4 pt-4 pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                            <button class="lg:hidden  text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                                <span class="sr-only">Close sidebar</span>
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                                </svg>
                            </button>
                            <a href="{{route('tienda')}}">
                                <div class="flex items-center ml-2">
                                    <h2 class="ml-4 text-lg font-bold text-gray-700 dark:text-gray-400 whitespace-nowrap">
                                        esClothing.</h2>
                                </div>
                            </a>
                        </div>
                        <div class="flex flex-wrap items-center px-4">
                            <div class="px-2">
                                <img src="{{ Auth::user()->profile_photo_url }}" width="32" height="32" alt="{{ Auth::user()->name }}"
                                    class="object-cover object-right w-10 h-10 rounded-full" alt="person">
                            </div>
                            <div class="px-2">
                                <h2 class="text-lg font-medium dark:text-gray-300 ">{{Auth::user()->name}}</h2>
                                <span class="text-sm text-gray-500 dark:text-gray-400 ">{{Auth::user()->email}}</span>
                            </div>
                        </div>
                        <div class="pb-6 mt-4 overflow-x-hidden overflow-y-auto">
                            <ul class="mb-8 text-sm">
                                    <a href="{{route('dashboard')}}"
                                        class="flex items-center px-6 py-4 text-gray-700 @if(in_array(Request::segment(1), ['dashboard'])){{'dark:bg-slate-800 bg-gray-200 '}} @endif dark:text-gray-400 group dark:hover:bg-gray-700 hover:bg-gray-100">
                                        <span class="inline-block mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                              </svg>
                                        </span>
                                        <span>Pagina Principal</span>
                                    </a>
                                </li>
                                <li x-data="{ open: false }">
                                    <a href="#" @click="open = ! open"
                                        class="flex items-center px-6 py-4 text-gray-700 group @if(in_array(Request::segment(1), ['productos', 'pedidos'])){{'dark:bg-slate-800 bg-gray-200 '}} @endif dark:text-gray-400 dark:hover:bg-gray-700 hover:bg-gray-100">
                                        <span class="inline-block mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                              </svg>

                                        </span>
                                        <span> Gestion de Tienda </span>
                                        <span class="inline-block ml-auto sidenav-arrow mr-2">
                                            <svg
                                                class="w-4 h-4 transition-transform transform"
                                                :class="{ 'rotate-180': open }"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="pl-3 ml-3 transition border-gray-500 dropdown-section nested-menu"
                                        x-show="open">
                                        <ul class="text-sm font-medium">
                                            <li>
                                                <a href="{{route('productos')}}"
                                                    class="flex items-center py-3 pl-3 pr-4 text-gray-700 rounded dark:text-gray-400 dark:hover:bg-gray-700 hover:bg-gray-100 ">
                                                    <span class="text-gray-700 dark:text-gray-400 ">Productos</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('pedidos')}}"
                                                    class="flex items-center py-3 pl-3 pr-4 text-gray-700 rounded dark:text-gray-400 dark:hover:bg-gray-700 hover:bg-gray-100 ">
                                                    <span class="text-gray-700 dark:text-gray-400 ">Pedidos</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>


                                <li>
                                    <a href="{{route('usuarios')}}"
                                        class="flex items-center px-6 py-4 text-gray-700 @if(in_array(Request::segment(1), ['usuarios'])){{'dark:bg-slate-800 bg-gray-200 '}} @endif dark:text-gray-400 group dark:hover:bg-gray-700 hover:bg-gray-100">
                                        <span class="inline-block mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                              </svg>
                                        </span>
                                        <span> Gestion de Usuarios </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('productos.estadisticas')}}"
                                        class="flex items-center px-6 py-4 text-gray-700 @if(in_array(Request::segment(1), ['estadisticas'])){{'dark:bg-slate-800 bg-gray-200 '}} @endif dark:text-gray-400 group dark:hover:bg-gray-700 hover:bg-gray-100">
                                        <span class="inline-block mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                                              </svg>

                                        </span>
                                        <span> Graficos </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
