<x-app-layout>
    <div class="sm:flex sm:items-center sm:justify-between my-8 mx-5">
        <div>
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Estadisticas Relacionadas a Productos</h2>

                <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400"></span>
            </div>
             <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">En el siguiente modulo podra ver todas aquellas estadisticas que se pueden generar segun sus productos y ventas.</p>
       </div>

      {{--   <div class="flex items-center mt-4 gap-x-3">
            <a  href="{{ route('users.restore.all') }}"  class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-green-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-green-600 dark:hover:bg-green-500 dark:bg-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <span>Activar todos los Usuarios</span>
            </a>
        </div> --}}
      </div>

    <div id="content-main" class="grid grid-cols-12 gap-8">

    <x-dashboard.dashboard-card-03 :data="$data" />
    <x-dashboard.dashboard-card-04 :data="$data_barras"/>


    </div>
    <x-slot:js>
    </x-slot:js>

</x-app-layout>
