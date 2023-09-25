@php
use App\Models\Producto;
$cont_prod= Producto::where('estado','activo')->count();

@endphp
<div class="lg:flex lg:items-center lg:justify-between py-7">
    <div class="min-w-0 flex-1">
      <div class="flex items-center gap-x-3">
        <h2 class="text-lg font-medium text-gray-800 dark:text-white">Productos</h2>

        <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{$cont_prod}}</span>
    </div>
     <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Aca podras consultar y crear los productos que tienes en tu tienda disponibles.</p>

    </div>
    <div class="mt-5 flex lg:ml-4 lg:mt-0">
      <span class="sm:ml-3">
        <a  onclick="openModal()" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M10.75 6.75a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z"></path>
        </svg>
          Agregar
        </a>
      </span>
    </div>

  </div>
