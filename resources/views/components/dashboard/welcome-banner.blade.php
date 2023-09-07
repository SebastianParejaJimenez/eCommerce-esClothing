@php
use App\Models\User;
use App\Models\Producto;
$cont_user = User::count();
$cont_prod = Producto::count();
@endphp

<div class="relative bg-indigo-200 dark:bg-indigo-500 p-4 sm:p-6 rounded-sm overflow-hidden mb-8">

    <!-- Background illustration -->

    <!-- Content -->
    <div class="relative">
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-2 mx-auto">
              <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 sm:w-1/4 w-1/2">
                  <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">{{$cont_user}}</h2>
                  <p class="leading-relaxed">Usuarios</p>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                  <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">1.8K</h2>
                  <p class="leading-relaxed">Subscriptores</p>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                  <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">35</h2>
                  <p class="leading-relaxed">Clientes Activos</p>
                </div>
                <div class="p-4 sm:w-1/4 w-1/2">
                  <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">{{$cont_prod}}</h2>
                  <p class="leading-relaxed">Productos</p>
                </div>
              </div>
            </div>
          </section>
    </div>

</div>
