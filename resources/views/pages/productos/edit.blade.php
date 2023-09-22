
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">


        @if ($errors->any())
            <x-dashboard.alert.alert />
        @endif


        <div class="container max-w-screen-xl">
            <div>
                <div class="rounded shadow-lg p-4 px-4 md:p-8 mb-6 bg-white dark:bg-gray-800 ">
                    <div class="  grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600 dark:text-white">
                            <p class="font-medium text-lg">Registro de Producto</p>
                            <p>Por favor llene todos los campos con la informacion requerida.</p>
                        </div>

                        <div class="lg:col-span-2">
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
                                    <label for="email">Precio</label>
                                    <input value="{{$producto->precio}}"  type="number" id="precio" name="precio"
                                        placeholder="Ingrese el Precio que tendra este Producto"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                </div>

                                <div class="md:col-span-3 dark:text-white mb-3">
                                    <label for="address">Cantidad</label>
                                    <input type="number" id="cantidad" name="cantidad" value="{{$producto->cantidad}}"
                                        placeholder="Ingrese las Cantidades que tenga del Producto"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="md:col-span-2 dark:text-white mb-3">
                                    <label
                                        for="text"class="block text-sm font-medium text-gray-900 dark:text-white">Categoria</label>

                                    <select type="text" id="categoria" name="categoria"
                                        placeholder="Ingrese La categoria que tendra este Producto"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                        <option value="{{$producto->categoria}}" selected>{{$producto->categoria}}</option>
                                        {!! $producto->categoria != "Camisas" ? '<option value="Camisas">Camisas</option>' : '' !!}
                                        {!! $producto->categoria != "Chaquetas-Buzos" ? '<option value="Chaquetas-Buzos">Chaquetas y Buzos</option>' : '' !!}
                                        {!! $producto->categoria != "Pantalones" ? '<option value="Pantalones">Pantalones</option>' : '' !!}
                                        {!! $producto->categoria != "Vestidos" ? '<option value="Vestidos">Vestidos</option>' : '' !!}
                                        {!! $producto->categoria != "Conjuntos" ? '<option value="Conjuntos">Conjuntos</option>' : '' !!}
                                    </select>


                                </div>
                                <div class="md:col-span-5 dark:text-white mb-3">
                                    <label
                                        for="image"class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subir
                                        Imagen
                                        del Producto</label>
                                    <img src="{{ url('productos_subidos') }}/{{$producto->imagen}}" alt="Foto actual" width="100" class="py-2 px-2">

                                    <input
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                        aria-describedby="file_input_help" id="file_input" type="file"
                                        name="imagen">

                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> PNG,
                                        JPG or GIF(MAX.
                                        ).</p>

                                </div>

                                <div class="md:col-span-5 mb-3 ">
                                    <label
                                        for="image"class="inline-block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tallas
                                        Disponibles</label>
                                    <div class='flex flex-col gap-6'>
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
                                <button type="submit"
                                    class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mx-3">Guardar</button>
                                <a href="{{ route('productos') }}"
                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mx-3">Cancelar</a>
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
         <script>
            $('form').submit(function(e) {
                e.preventDefault();


                let hayAlMenosUnCheckboxCheckeado = false;

                $('input[type="checkbox"]:checked').each(function(index, checkbox) {
                    if (checkbox.checked) {
                        hayAlMenosUnCheckboxCheckeado = true;
                        return;
                    }
                });

                console.log(hayAlMenosUnCheckboxCheckeado)

                if (!hayAlMenosUnCheckboxCheckeado) {
                    Swal.fire({
                        title: 'Faltan Datos',
                        text: "Necesitas seleccionar una talla para poder agregar al Carrito!",
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Aceptar'
                    })
                } else {
                    this.submit();
                }
            });
        </script>
    </x-slot:js>

</x-app-layout>
