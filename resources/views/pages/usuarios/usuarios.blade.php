    <x-app-layout>
        <section class="container px-4 mx-auto">
            <div class="flex flex-col">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <x-dashboard.banners.usuarios-inactivo-banner />

                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <x-dashboard.spinner-loading />
                            <form action="{{route('usuarios.search')}}" method="GET">  
                                <div class="my-2 flex sm:flex-row flex-col ">
                                    <div class="block relative">
                                        <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                                            <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                                <path
                                                    d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                                </path>
                                            </svg>
                                        </span>
                                            <input placeholder="Buscar" name="q" class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                                    </div>
                                
                                    <button type="submit" class=" ml-3 px-3 btn bg-indigo-500 hover:bg-indigo-600 text-white" type="submit">Buscar</button>
                                    
{{--                                     <select name="rol" class="mx-3">
                                        <option value="">Todos los Roles</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Cliente">Cliente</option>
                                    </select> --}}
{{--                                     <select name="estado">
                                        <option value="*">Todos los Estados</option>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    </select> --}}
                                    </div>


                            </form>
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
                                @foreach ($usuario as $usuario)

                                    <tr>
                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"> {{\Carbon\Carbon::parse($usuario->created_at)->formatLocalized('%d %B %Y %I:%M %p');}}</td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 
                                        dark:bg-gray-800
                                        @switch(true)
                                            @case($usuario->estado == "Activo")
                                                text-green-500 bg-green-100/60
                                                @break
                                            
                                            @case($usuario->estado == "Inactivo")
                                                text-red-500 bg-red-200
                                                @break
                                            @endswitch
                                            ">

                                        @switch(true)
                                            @case($usuario->estado == "Activo")
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                            @break
            
                                        @case($usuario->estado == "Inactivo")
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                            @break
                                        @endswitch

                                                <h2 class="text-sm font-normal">{{$usuario->estado}}</h2>
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
                                                <input type="hidden" value="{{$usuario->id}}">
                                                <a href="{{route('edit', [ 'id'=> $usuario->id ])}}" type="submit" class="text-blue-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-none">
                                                    Editar
                                                </a>
                                        @if($usuario->estado == 'Inactivo')
                                        <div class="flex items-center gap-x-6">
                                            <input type="hidden" value="">
                                            <a href="{{ route('users.restore', $usuario->id) }}" type="submit" class="text-green-500 transition-colors duration-200 dark:hover:text-green-500 dark:text-gray-300 hover:text-green-500 focus:outline-none">
                                                ACTIVAR
                                            </a>
                                        </div>
                                        @else
                                                                                        
                                        <form method="POST" action="{{ route('usuarios.destroy', ['id' => $usuario->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                                <button type="submit" class="text-red-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none dark:hover:text-red-500 dark:text-red-300">
                                                    Desactivar
                                                </button>
                                        </form>
                                        @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </x-app-layout>
