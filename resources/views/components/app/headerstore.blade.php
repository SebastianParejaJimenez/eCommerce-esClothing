<header>
    <nav class="sticky top-0 bg-white dark:bg-[#182235] border-b border-slate-200 dark:border-slate-700 z-30 px-4 lg:px-6 py-2.5">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="#" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">esClothing</span>
            </a>
            <div class="flex items-center lg:order-2">

                @if (Auth::user())
                <x-dropdown-profile align="right" />

                @else
                <a href="{{route('login')}}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Inicia Sesión</a>

                @endif
            </div>

            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Inicio</a>
                    </li>
                    <li>
                        <a href="{{route('dashboard')}}" class="block py-2 pr-4 pl-3 text-gray-700 rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Dashboard</a>
                    </li>
                    </li>
                    <x-theme-toggle />
                </ul>
            </div>
        </div>
    </nav>
</header>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css"  rel="stylesheet" />
