<div class="bg-white" id="Tienda">
    <div class="mx-auto grid max-w-2xl grid-cols-1 items-center gap-x-8 gap-y-16 px-4 py-24 sm:px-6 sm:py-12 lg:max-w-7xl lg:grid-cols-2 lg:px-8">
      <div>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Nuestra Empresa</h2>
        <p class="mt-4 text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod eligendi aut reprehenderit </p>

        <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Origen</dt>
            <dd class="mt-2 text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod eligendi aut reprehenderit </dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Nuestros Productos</dt>
            <dd class="mt-2 text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod eligendi aut reprehenderit </dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Dedicacion</dt>
            <dd class="mt-2 text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod eligendi aut reprehenderit </dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Nuestras Categorias</dt>
            <dd class="mt-2 text-sm text-gray-500">Hand sanded and finished with natural oil</dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Metodos de Pagos</dt>
            <dd class="mt-2 text-sm text-gray-500">Wood card tray and 3 refill packs</dd>
          </div>
          <div class="border-t border-gray-200 pt-4">
            <dt class="font-medium text-gray-900">Metodos de Envio</dt>
            <dd class="mt-2 text-sm text-gray-500">Made from natural materials. Grain and color vary with each item.</dd>
          </div>
        </dl>
      </div>
      <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
        @foreach ($productos as $producto_randoms)
        <img src="{{ url('productos_subidos') }}/{{ $producto_randoms->imagen }}" alt="{{$producto_randoms->nombre}}." class="rounded-lg bg-gray-100">
        @endforeach
    </div>
    </div>
  </div>
