<div class="grid grid-cols-1 mt-3 sm:grid-cols-4 md:grid-cols-2">
    <div class="flex flex-col col-span-4">
        <div class="flex flex-col space-y-4  p-6 text-gray-600">
            <span class="font-semibold mr-2 text-xs uppercase text-center">Datos de
                Envio:</span>
            <div class="flex flex-row text-sm">
                <span class="mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        enable-background="new 0 0 24 24" height="20px"
                        viewBox="0 0 24 24" width="20px" fill="#64748b">
                        <g>
                            <rect fill="none" height="24" width="24" />
                        </g>
                        <g>
                            <path
                                d="M20,7h-5V4c0-1.1-0.9-2-2-2h-2C9.9,2,9,2.9,9,4v3H4C2.9,7,2,7.9,2,9v11c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V9 C22,7.9,21.1,7,20,7z M9,12c0.83,0,1.5,0.67,1.5,1.5S9.83,15,9,15s-1.5-0.67-1.5-1.5S8.17,12,9,12z M12,18H6v-0.75c0-1,2-1.5,3-1.5 s3,0.5,3,1.5V18z M13,9h-2V4h2V9z M18,16.5h-4V15h4V16.5z M18,13.5h-4V12h4V13.5z" />
                        </g>
                    </svg>
                </span>
                <p class="flex items-center  text-gray-500">
                    <span class="font-semibold mr-2 text-xs uppercase">Nombre:</span>
                    <span class="@if (!auth()->user()->name)
                        {{ 'bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300'}}
                    @endif">{{ auth()->user()->name ?? 'Indefinido'  }}</span>
                </p>
            </div>

            <div class="flex flex-row text-sm">
                <span class="mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="#64748b">
                        <path
                            d="M12 14c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2z">
                        </path>
                        <path
                            d="M11.42 21.814a.998.998 0 0 0 1.16 0C12.884 21.599 20.029 16.44 20 10c0-4.411-3.589-8-8-8S4 5.589 4 9.995c-.029 6.445 7.116 11.604 7.42 11.819zM12 4c3.309 0 6 2.691 6 6.005.021 4.438-4.388 8.423-6 9.73-1.611-1.308-6.021-5.294-6-9.735 0-3.309 2.691-6 6-6z">
                        </path>
                    </svg>
                </span>
                <p class="flex items-center  text-gray-500">
                    <span class="font-semibold mr-2 text-xs uppercase">Ciudad:</span>
                    <span class="@if (!auth()->user()->ciudad)
                        {{ 'bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300'}}
                    @endif">{{ auth()->user()->ciudad ?? 'Indefinido'   }}</span>
                </p>
            </div>

            <div class="flex flex-row text-sm">
                <span class="mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="#64748b">
                        <path
                            d="M12 14c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2z">
                        </path>
                        <path
                            d="M11.42 21.814a.998.998 0 0 0 1.16 0C12.884 21.599 20.029 16.44 20 10c0-4.411-3.589-8-8-8S4 5.589 4 9.995c-.029 6.445 7.116 11.604 7.42 11.819zM12 4c3.309 0 6 2.691 6 6.005.021 4.438-4.388 8.423-6 9.73-1.611-1.308-6.021-5.294-6-9.735 0-3.309 2.691-6 6-6z">
                        </path>
                    </svg>
                </span>
                <p class="flex items-center  text-gray-500">
                    <span class="font-semibold mr-2 text-xs uppercase">Codigo
                        Postal:</span>
                    <span class="@if (!auth()->user()->codigo_postal)
                        {{ 'bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300'}}
                    @endif">{{ auth()->user()->codigo_postal ?? 'Indefinido'  }}</span>
                </p>
            </div>

            <div class="flex flex-row text-sm">
                <span class="mr-3">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="#64748b">
                        <path
                            d="M12 14c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.103 0 2 .897 2 2s-.897 2-2 2-2-.897-2-2 .897-2 2-2z">
                        </path>
                        <path
                            d="M11.42 21.814a.998.998 0 0 0 1.16 0C12.884 21.599 20.029 16.44 20 10c0-4.411-3.589-8-8-8S4 5.589 4 9.995c-.029 6.445 7.116 11.604 7.42 11.819zM12 4c3.309 0 6 2.691 6 6.005.021 4.438-4.388 8.423-6 9.73-1.611-1.308-6.021-5.294-6-9.735 0-3.309 2.691-6 6-6z">
                        </path>
                    </svg>
                </span>
                <p class="flex items-center  text-gray-500">
                    <span class="font-semibold mr-2 text-xs uppercase">Direccion:</span>
                    <span class="@if (!auth()->user()->direccion)
                        {{ 'bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300'}}
                    @endif">{{ auth()->user()->direccion ?? 'Indefinido'  }}</span>
                </p>
            </div>
        </div>
        <div class="flex flex-col w-full relative bottom-0">
            <div
                class="grid grid-cols-2 border-t divide-x text-indigo-600  bg-gray-50 dark:bg-transparent py-3">
                <p class="flex items-center  text-gray-500">
                    ¿Deseas Cambiar los Datos de Envio?
                </p>
                <a  @click="userInfo = true"
                    class=" cursor-pointer uppercase text-xs flex flex-row items-center justify-center font-semibold">
                    <div class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px"
                            viewBox="0 0 24 24" width="20px" fill="rgb(79 70 229)">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                        </svg>
                    </div>
                    Actualizar
                </a>


            </div>
        </div>
    </div>
</div>
