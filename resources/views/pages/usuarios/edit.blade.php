<x-app-layout>

    @if($errors->any())
        <x-dashboard.alert.alert />
    @endif
    <div class="min-h-full p-6 bg-gray-100 flex items-center justify-center dark:bg-gray-800 dark:border-gray-700">
        <div class="container max-w-screen-xl">
          <div>

            <div class="rounded shadow-lg p-4 px-4 md:p-8 mb-6 ">
              <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                <div class="text-gray-600 dark:text-white">
                  <p class="font-medium text-lg">Datos Personales</p>
                  <p>Por favor llene todos los campos con la informacion requerida.</p>
                </div>
                <div class="lg:col-span-2">
                  <form method="POST" action="{{ route('user.update', ['id' => $usuario->id]) }}"  class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                    @csrf
                    @method('PUT')

                    <div class="md:col-span-5 dark:text-white">
                      <label for="full_name">Nombre Completo</label>
                      <input type="text" value="{{$usuario->name}}"name="name" placeholder="Nombre Completo" id="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="" />
                    </div>

                    <div class="md:col-span-5 dark:text-white">
                      <label for="email">Correo</label>
                      <input type="text" value="{{$usuario->email}}" name="email" placeholder="Correo Electronico" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="" placeholder="email@domain.com" />
                    </div>

                    <div class="md:col-span-5 dark:text-white mb-3">
                        <label
                            for="text"class="">Rol</label>
                        <select type="text" id="rol_id" name="rol_id"
                            placeholder="Ingrese el Rol del usuario"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled>Seleccione una Opcion</option>
                            <option value="2" @if ($usuario->rol_id == 2) {{'selected'}} @endif>Cliente</option>
                            <option value="1" @if ($usuario->rol_id == 1) {{'selected'}} @endif>Administrador</option>
                        </select>
                    </div>
   {{--                  <div class="md:col-span-3 dark:text-white">
                      <label for="address">Password</label>
                      <input type="password" placeholder="Contraseña" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="" placeholder="" />
                    </div>

                    <div class="md:col-span-2 dark:text-white">
                      <label for="city">Confirm Password</label>
                      <input type="password" name="password-confirm" placeholder="Confirmar Contraseña" id="password-confirm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="" placeholder="" />
                    </div> --}}

                    <div class="md:col-span-5 text-right">
                      <div class="inline-flex items-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                        <a href="{{ route('usuarios') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mx-3">Cancelar</a>

                        </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
</x-app-layout>
