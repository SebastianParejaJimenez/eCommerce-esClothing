<x-app-layout>
    <div class="relative overflow-x-auto px-4 sm:px-6 lg:px-8 py-4 w-full max-w-9xl mx-auto">
        <x-dashboard.spinner-loading />

        @if(!$ordenes->count())
        <div class="w-full grid place-items-center">
        <div class="w-9/12 overflow-hidden rounded-lg bg-white shadow-md duration-300 hover:scale-105 hover:shadow-xl">
            <h1 class="mt-3 text-center text-2xl font-bold text-gray-500">¡No existen Pedidos!</h1>
            <p class="my-4 text-center text-sm text-gray-500">Actualmente no existen pedidos.</p>
        </div>
        </div>

        @endif


        @if($ordenes->count())
        <table class=" w-full text-sm text-left  divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <div class="flex items-center gap-x-3">
                            <button class="flex items-center gap-x-2">
                                <span>Pedido</span>
                            </button>
                        </div>
                    </th>

                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Fecha
                    </th>

                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Estado
                    </th>

                    <th scope="col" class="px-5 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Cliente
                    </th>

                    <th scope="col" class="px-5 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Productos
                    </th>
                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        Total
                    </th>

                    <th scope="col" class="relative py-3.5 px-4">
                        <span class="sr-only">Acciones</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                @foreach ($ordenes as $orden)
                <tr>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                        <div class="inline-flex items-center gap-x-3">
                            <span>#{{ $orden->id }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{
                        \Carbon\Carbon::parse($orden->created_at)->formatLocalized('%d %B %Y %I:%M %p');}}

                    </td>
                    <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2
                        @switch(true)
                        @case($orden->estado == "PAGADO")
                        text-cyan-500 bg-blue-100/60 dark:bg-gray-800
                            @break

                        @case($orden->estado == "CANCELADO")
                            text-red-500 bg-red-200 dark:bg-gray-800
                            @break
                        @case($orden->estado == "PENDIENTE")
                            text-gray-500 bg-gray-200 dark:bg-gray-800
                            @break

                        @case($orden->estado == "COMPLETADO")
                            text-green-500 bg-green-100/60 dark:bg-gray-800
                            @break
                        @endswitch
                        ">
                            @switch(true)
                                @case($orden->estado == "PAGADO")
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                                @break
                            @case($orden->estado == "PENDIENTE")
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.5 7L2 4.5M2 4.5L4.5 2M2 4.5H8C8.53043 4.5 9.03914 4.71071 9.41421 5.08579C9.78929 5.46086 10 5.96957 10 6.5V10" stroke="#667085" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            @break

                            @case($orden->estado == "CANCELADO")
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                                @break
                            @endswitch
                            <h2 class="text-sm font-normal">{{$orden->estado}}</h2>
                        </div>


                    </td>

                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                        <div class="flex items-center gap-x-2">
                            <img class="object-cover w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="">
                            <div>
                                <h2 class="text-sm font-medium text-gray-800 dark:text-white ">{{$orden->user->name}}
                                </h2>
                                <p class="text-xs font-normal text-gray-600 dark:text-gray-400">{{$orden->user->email}}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                        @foreach ($orden->productos as $producto)
                            <p class="underline underline-offset-8 uppercase "> {{$producto->nombre}}</p>
                            <br>
                        @endforeach

                    </td>
                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                        ${{number_format($orden->subtotal, 0, ',', '.')}}
                    </td>
                    <td class="px-4 py-4 text-sm whitespace-nowrap">

                        <div class="flex items-center gap-x-6">
                        <form action="{{route('detalles.pedidos', ['id' => $orden->id, ])}}">
                            <input type="hidden" value="{{$orden->id}}">
                            <button class="text-green-500 transition-colors duration-200 hover:text-gray-500 focus:outline-none">
                                Ver Detalles
                            </button>
                        </form>
                        <button class="text-blue-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none" onclick="onclickexample({{$orden->id}})">
                            Cambiar Estado
                        </button>
                        </div>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{ $ordenes->links() }}
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>

function onclickexample(id_pedido){

    (async() => {
        const {value: estado} = await Swal.fire({
        title: 'Cambio de Estado',
        text: 'Selecciona el estado que deseas darle al pedido,',
        icon: 'question',
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,

        input: 'select',
        inputPlaceholder: 'Seleccione el Nuevo estado',
        inputOptions: {
            PENDIENTE: 'Pendiente',
            COMPLETADO: 'Completado',
            CANCELADO: 'Cancelado'
        }
        })

        if (estado) {
            const estadoNuevo = estado;
            const pedidoSeleccionado = id_pedido;

            $.ajax({
                type: 'GET',
                url: '{{ route("pedido.estado", ["id" => ":id", "estado" => ":estado"]) }}'
                    .replace(':id', pedidoSeleccionado)
                    .replace(':estado', estadoNuevo),
                error: () => {
                    Swal.fire(
                        'Something went wrong!',
                        'record was not deleted.',
                        'error',
                    );
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Estado Cambiado',
                            showConfirmButton: false,

                        });
                        window.setTimeout(function(){
                        location.reload();
                        } ,900);
                    }
                } ,
            });
        }

    }) ()


}


</script>

</x-app-layout>
