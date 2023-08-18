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
        <a type="button" href="{{ route('producto_crear') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M10.75 6.75a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z"></path>
        </svg>
          Agregar
        </a>
      </span>
    </div>
    <div class="mt-5 flex lg:ml-4 lg:mt-0">
      <span class="sm:ml-3">
        <a type="button" href="{{route('productos.inactivos')}}" class="inline-flex items-center rounded-md bg-indigo-400 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
          </svg>
          
          
          Productos Inactivos
        </a>
      </span>
    </div>
  </div>
