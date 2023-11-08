@php
    use App\Models\User;
    use App\Models\Producto;
    use App\Models\EmailSubscriptions;

    $cont_sub = EmailSubscriptions::count();
    $cont_user = User::count();
    $cont_clientes = User::where('rol_id', '2')->count();

    $cont_prod = Producto::count();
@endphp

<div class="relative bg-gray-50 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700  dark:bg-slate-800 p-4 sm:p-6 overflow-hidden mb-8">

    <div class="min-w-[375px] md:min-w-[700px] xl:min-w-[800px] mt-3 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-3 3xl:grid-cols-6">

        <div
            class="relative flex flex-grow !flex-row flex-col items-center rounded-[10px] rounded-[10px] border-[1px] border-gray-200 bg-white bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-gray-800 dark:bg-slate-900 dark:text-white dark:shadow-none">
            <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
                <div class="rounded-full bg-lightPrimary p-3 dark:bg-navy-700">
                    <span class="flex items-center text-brand-500 dark:text-white">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                            class="h-6 w-6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                <p class="font-dm text-sm font-medium text-gray-600">Venta Semanal</p>
                <h4 class="text-xl font-bold text-navy-700 dark:text-white">$1,000</h4>
            </div>
        </div>
        <div
            class="relative flex flex-grow !flex-row flex-col items-center rounded-[10px] rounded-[10px] border-[1px] border-gray-200 bg-white bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-gray-800 dark:bg-slate-900 dark:text-white dark:shadow-none">
            <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
                <div class="rounded-full bg-lightPrimary p-3 dark:bg-navy-700">
                    <span class="flex items-center text-brand-500 dark:text-white">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                            class="h-7 w-7" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M4 9h4v11H4zM16 13h4v7h-4zM10 4h4v16h-4z"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                <p class="font-dm text-sm font-medium text-gray-600">Pedidos Esta Semana</p>
                <h4 class="text-xl font-bold text-navy-700 dark:text-white">145</h4>
            </div>
        </div>
        <div
            class="relative flex flex-grow !flex-row flex-col items-center rounded-[10px] rounded-[10px] border-[1px] border-gray-200 bg-white bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-gray-800 dark:bg-slate-900 dark:text-white dark:shadow-none">
            <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
                <div class="rounded-full bg-lightPrimary p-3 dark:bg-navy-700">
                    <span class="flex items-center text-brand-500 dark:text-white">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                            class="h-6 w-6" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M208 448V320h96v128h97.6V256H464L256 64 48 256h62.4v192z"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                <p class="font-dm text-sm font-medium text-gray-600">Total Productos</p>
                <h4 class="text-xl font-bold text-navy-700 dark:text-white">$2433</h4>
            </div>
        </div>
    </div>

</div>
