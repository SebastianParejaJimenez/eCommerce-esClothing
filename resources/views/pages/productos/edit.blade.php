
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">



        <div class="container max-w-screen-xl">
            <div>

                <div class="rounded shadow-lg p-4 px-4 md:p-8 mb-6 bg-white dark:bg-gray-800 ">
                    @if ($errors->any())
                    <x-dashboard.alert.alert />
                    @endif

                    <div class="  grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600 dark:text-white">
                            <p class="font-medium text-lg">Editar Producto</p>
                            <p>Por favor llene todos los campos con la informacion requerida.</p>
                        </div>

                        <div class="lg:col-span-2" x-data="{ selectedCategory: '{{$producto->categoria}}' }">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('productos.update', ['producto' => $producto->id]) }}"
                                class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                @csrf
                                @method('PUT')
                                <div class="md:col-span-5 dark:text-white mb-3">
                                    <label for="full_name">Nombre del Producto</label>
                                    <input type="text" id="nombre" name="nombre" value="{{$producto->nombre}}"
                                        placeholder="Ingrese el Nombre que tendra este Producto"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="md:col-span-5 dark:text-white mb-3">
                                    <label for="precio">Precio</label>
                                    <input value="{{$producto->precio}}" type="number" id="precio" name="precio"
                                        placeholder="Ingrese el Precio que tendra este Producto"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                </div>

                                <div class="md:col-span-2 dark:text-white mb-3">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" id="cantidad" name="cantidad" value="{{$producto->cantidad}}"
                                        placeholder="Ingrese las Cantidades que tenga del Producto"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="md:col-span-2 dark:text-white mb-3">
                                    <label for="categoria"class="block text-sm font-medium text-gray-900 dark:text-white">Categoria</label>

                                    <select x-model="selectedCategory" type="text" id="categoria" name="categoria"  placeholder="Ingrese La categoria que tendra este Producto"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        <option value="{{$producto->categoria}}" selected>{{$producto->categoria}}</option>
                                        {!! $producto->categoria != "Camisas" ? '<option value="Camisas">Camisas</option>' : '' !!}
                                        {!! $producto->categoria != "Chaquetas-Buzos" ? '<option value="Chaquetas-Buzos">Chaquetas y Buzos</option>' : '' !!}
                                        {!! $producto->categoria != "Pantalones" ? '<option value="Pantalones">Pantalones</option>' : '' !!}
                                        {!! $producto->categoria != "Accesorio" ? '<option value="Accesorios">Accesorios</option>' : '' !!}
                                        {!! $producto->categoria != "Vestidos" ? '<option value="Vestidos">Vestidos</option>' : '' !!}
                                        {!! $producto->categoria != "Conjuntos" ? '<option value="Conjuntos">Conjuntos</option>' : '' !!}
                                    </select>
                                </div>
                                <div class="md:col-span-1 dark:text-white mb-3">
                                    <label for="categoria"class="block text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                                    <select type="text" id="categoria" name="estado"  placeholder="Ingrese el Estado que tendra este Producto"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="{{$producto->estado}}" selected>{{$producto->estado}}</option>
                                        {!! $producto->estado != "Activo" ? '<option value="Activo">Activo</option>' : '' !!}
                                        {!! $producto->estado != "Inactivo" ? '<option value="Inactivo">Inactivo</option>' : '' !!}
                                    </select>


                                </div>
                                <div class="md:col-span-5 dark:text-white mb-3"  >
                                    <label
                                        for="imagen"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subir
                                        Imagen
                                        del Producto</label>
                                    <img src="{{ url('productos_subidos') }}/{{$producto->imagen}}" alt="Foto actual" width="100" class="py-2 px-2">

                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  id="imagen"
                                        aria-describedby="file_input_help" id="file_input" type="file"
                                        name="imagen" accept="image/png, image/jpeg, image/jpg">

                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300 bold" id="file_input_help">Unicamente tipos de Archivos: PNG, JPG o JPEG(MAX. 10MB).</p>

                                </div>

                                <div class="md:col-span-5 mb-3 " x-show="selectedCategory !== 'Accesorios'">
                                    <label
                                        for="image"class="inline-block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tallas
                                        Disponibles</label>
                                    <div class='flex  gap-6'>
                                        @foreach ($tallas as $talla)

                                        <div class='flex flex-row'>
                                            <input type="checkbox" name="tallas[]" id="{{$talla->talla}}" value="{{$talla->id}}"
                                                class='
                                                    appearance-none h-6 w-6 bg-gray-400 rounded-full
                                                    checked:bg-green-300 checked:scale-75
                                                    transition-all duration-200 peer'
                                                    {{ in_array($talla->id, $tallasSeleccionadas) ? 'checked="checked"' : '' }}
                                                    />

                                            <div
                                                class='h-6 w-6 absolute rounded-full pointer-events-none
                                                peer-checked:border-green-300 peer-checked:border-2
                                                '>
                                            </div>
                                            <label for='{{$talla->talla}}'
                                                class='flex flex-col justify-center px-2 peer-checked:text-green-400  select-none'>{{$talla->talla}}</label>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>


                        </div>


                        <div class="md:col-span-5 text-right">
                            <div class="inline-flex items-end">
                                <a href="{{ route('productos') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mx-3">Cancelar</a>
                                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mx-3">Guardar</button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <x-slot:js>

    </x-slot:js>

</x-app-layout>
