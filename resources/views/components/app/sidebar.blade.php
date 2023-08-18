<div>
    <!-- Sidebar backdrop (mobile only) -->
    <div
        class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'"
        aria-hidden="true"
        x-cloak
    ></div>

    <!-- Sidebar -->
    <div
        id="sidebar"
        class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 dark:bg-slate-800 bg-gray-200 p-4 transition-all duration-200 ease-in-out"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'"
        @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false"
        x-cloak="lg"
>

        <!-- Sidebar header -->
        <div class="flex justify-between mb-10 pr-3 sm:px-2">
            <!-- Close button -->
            <button class="lg:hidden text-slate-500 hover:text-slate-400" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="{{ route('dashboard') }}">
                <h1>esClothing.</h1>
            </a> 
        </div>

        <!-- Links -->
        <div class="space-y-6">
            <!-- Pages group -->

            <div class="mt-6">
                    <!-- Dashboards links -->
                    <div x-data="{ isActive: {{ in_array(Request::segment(1), ['dashboard']) ? 1 : 0 }}, open: {{ in_array(Request::segment(1), ['dashboard']) ? 1 : 0 }}}">
                      <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                      <a
                        href="#"
                        @click="$event.preventDefault(); open = !open"
                        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-300 dark:hover:bg-indigo-600"
                        :class="{'bg-indigo-100 dark:bg-indigo-600 dark:text-white': isActive || open}"
                        role="button"
                        aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'"
                      >
                        <span aria-hidden="true">
                          <svg
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                            />
                          </svg>
                        </span>
                        <span class="ml-2 text-sm"> Pagina Principal </span>
                        <span class="ml-auto" aria-hidden="true">
                          <!-- active class 'rotate-180' -->
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
                      <div role="menu" x-show="open" class="my-2 space-y-2 px-7" aria-label="Dashboards">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a
                          href="{{route('dashboard')}}"
                          role="menuitem"
                          class="@if(in_array(Request::segment(1), ['dashboard'])){{ 'bg-indigo-300 font-semibold dark:bg-indigo-500' }}@endif block p-2 text-sm  transition-colors duration-200 rounded-md text-gray-500 dark:text-white dark:hover:text-light hover:text-gray-800"
                        >
                          Inicio
                        </a>
                      </div>
                    </div>
        

                    <div x-data="{ isActive: {{ in_array(Request::segment(1), ['productos', 'pedidos']) ? 1 : 0 }}, open: {{ in_array(Request::segment(1), ['productos', 'pedidos']) ? 1 : 0 }}}">
                      <!-- active classes 'bg-indigo-100 dark:bg-indigo-600' -->
                      <a
                        href="#"
                        @click="$event.preventDefault(); open = !open"
                        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-300 dark:hover:bg-indigo-600"
                        :class="{ 'bg-indigo-100 dark:bg-indigo-600 dark:text-white': isActive || open }"
                        role="button"
                        aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'"
                      >
                        <span aria-hidden="true">
                          <svg
                            class="w-5 h-5"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                            />
                          </svg>
                        </span>
                        <span class="ml-2 text-sm"> Gestion de Tienda </span>
                        <span aria-hidden="true" class="ml-auto">
                          <!-- active class 'rotate-180' -->
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
                      <div x-show="open" class="my-2  space-y-2 px-7" role="menu" arial-label="Components">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a
                        href="{{route('productos')}}"
                        role="menuitem"
                          class="@if(in_array(Request::segment(1), ['productos'])){{ 'bg-indigo-300 font-semibold dark:bg-indigo-500' }}@endif block p-2 text-sm transition-colors duration-200 rounded-md text-gray-500 dark:text-white dark:hover:text-light hover:text-gray-700"
                        >
                          Gestionar Productos
                        </a>
                        <a
                          href="{{route('pedidos')}}"
                          role="menuitem"
                          class="@if(in_array(Request::segment(1), ['pedidos'])){{ 'bg-indigo-300 font-semibold dark:bg-indigo-500' }}@endif block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-white dark:hover:text-light hover:text-gray-700"
                        >
                          Gestionar Pedidos
                        </a>
                      </div>
                    </div>
                            <!-- Authentication links -->
                            <div x-data="{ isActive: {{ in_array(Request::segment(1), ['usuarios']) ? 1 : 0 }}, open: {{ in_array(Request::segment(1), ['usuarios']) ? 1 : 0 }}}">
                                <!-- active & hover classes 'bg-indigo-100 dark:bg-indigo-600' -->
                                <a
                                  href="#"
                                  @click="$event.preventDefault(); open = !open"
                                  class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-300 dark:hover:bg-indigo-600"
                                  :class="{'bg-indigo-100 dark:bg-indigo-600 dark:text-white': isActive || open}"
                                  role="button"
                                  aria-haspopup="true"
                                  :aria-expanded="(open || isActive) ? 'true' : 'false'"
                                >
                                  <span aria-hidden="true">
                                    <svg
                                      class="w-5 h-5"
                                      xmlns="http://www.w3.org/2000/svg"
                                      fill="none"
                                      viewBox="0 0 24 24"
                                      stroke="currentColor"
                                    >
                                      <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                      />
                                    </svg>
                                  </span>
                                  <span class="ml-2 text-sm"> Gestion Usuarios </span>
                                  <span aria-hidden="true" class="ml-auto">
                                    <!-- active class 'rotate-180' -->
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
                                <div x-show="open" class="my-2  space-y-2 px-7" role="menu" aria-label="Authentication">
                                  <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                                  <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                                  <a
                                     href="{{route('usuarios')}}"
                                    role="menuitem"
                                    class="@if(in_array(Request::segment(1), ['usuarios'])){{ 'bg-indigo-300 font-semibold dark:bg-indigo-500' }}@endif  block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:hover:text-light dark:text-white hover:text-gray-700"
                                  >
                                    Usuarios Registrados
                                  </a>
                                </div>
                              </div>

                    <!-- Pages links -->
                    <div x-data="{ isActive: {{ in_array(Request::segment(1), ['estadisticas']) ? 1 : 0 }}, open: {{ in_array(Request::segment(1), ['estadisticas']) ? 1 : 0 }}}">
                        <!-- active classes 'bg-indigo-100 dark:bg-indigo-600' -->
                      <a
                        href="#"
                        @click="$event.preventDefault(); open = !open"
                        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-indigo-300 dark:hover:bg-indigo-600"
                        :class="{ 'bg-indigo-100 dark:bg-indigo-600 dark:text-white': isActive || open }"
                        role="button"
                        aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'"
                      >
                        <span aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                              </svg>                              
                        </span>
                        <span class="ml-2 text-sm"> Estadisticas </span>
                        <span aria-hidden="true" class="ml-auto">
                          <!-- active class 'rotate-180' -->
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
                      <div x-show="open" class="my-2  space-y-2 px-7" role="menu" arial-label="Pages">
                        <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                        <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                        <a
                          href="{{route('productos.estadisticas')}}"
                          role="menuitem"
                          class="@if(in_array(Request::segment(1), ['estadisticas']) && in_array(Request::segment(2), ['productos'])){{ 'bg-indigo-300 font-normal dark:bg-indigo-500' }}@endif block p-2 text-sm text-gray-500 transition-colors duration-200 rounded-md dark:text-white dark:hover:text-light hover:text-gray-700"
                        >
                          Estadisticas Productos
                        </a>
                      </div>
                    </div>
            </div>
        </div>
    </div>
</div>
