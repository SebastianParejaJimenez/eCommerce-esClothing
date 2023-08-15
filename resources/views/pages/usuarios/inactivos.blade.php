<x-app-layout>
    <x-dashboard.spinner-loading />
    <x-dashboard.banners.usuarios-inactivo-banner />

    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-800">
            <tr>

                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Fecha de Creacion
                </th>

                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Estado
                </th>

                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Usuario
                </th>
                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Datos
                </th>

                <th scope="col" class="relative py-3.5 px-4">
                    <span class="sr-only">Actions</span>
                </th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">

            @foreach($usuarios_inactivos as $usuario)

            <tr>
                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">{{$usuario->created_at}}</td>
                <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                    <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-red-500 bg-red-100/60 dark:bg-gray-800">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <h2 class="text-sm font-normal">Inactivo</h2>
                    </div>
                </td>
                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                    <div class="flex items-center gap-x-2">
                        <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" width="32" height="32" alt="{{$usuario->name}}" />

                        <div>
                            <h2 class="text-sm font-medium text-gray-800 dark:text-white ">{{$usuario->name}}</h2>
                            <p class="text-xs font-normal text-gray-600 dark:text-gray-400">{{$usuario->email}}</p>
                            <p class="text-xs font-normal text-gray-600 dark:text-gray-400">{{$usuario->numero_telefono}}</p>
                            <p class="text-xs font-normal text-gray-600 dark:text-gray-400">{{$usuario->rol->rol}}</p>

                        </div>
                    </div>
                </td>
                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                    <div class="flex items-center gap-x-2">

                        <div>
                            <h2 class="text-sm font-medium text-gray-800 dark:text-white ">{{$usuario->pais}}</h2>
                            <p class="text-xs font-normal text-gray-600 dark:text-gray-400">{{$usuario->ciudad}}</p>
                            <p class="text-xs font-normal text-gray-600 dark:text-gray-400">{{$usuario->codigo_postal}}</p>
                            <p class="text-xs font-normal text-gray-600 dark:text-gray-400">{{$usuario->direccion}}</p>

                        </div>
                    </div>
                </td>
                <td class="px-4 py-4 text-sm whitespace-nowrap">
                    <div class="flex items-center gap-x-6">
                        <input type="hidden" value="">
                        <a href="{{ route('users.restore', $usuario->id) }}" type="submit" class="text-green-500 transition-colors duration-200 dark:hover:text-green-500 dark:text-gray-300 hover:text-green-500 focus:outline-none">
                            ACTIVAR
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</x-app-layout>