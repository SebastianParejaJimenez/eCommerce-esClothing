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
                    <span class="flex items-center text-indigo-500 dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                          </svg>
                    </span>
                </div>
            </div>
            <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                <p class="font-dm text-sm font-medium text-gray-600">Venta Semanal</p>
                <h4 class="text-xl font-bold text-navy-700 dark:text-white">${{ number_format($totalVentasSemana, 2, '.', ',') }}</h4>

            </div>
        </div>
        <div
            class="relative flex flex-grow !flex-row flex-col items-center rounded-[10px] rounded-[10px] border-[1px] border-gray-200 bg-white bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-gray-800 dark:bg-slate-900 dark:text-white dark:shadow-none">
            <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
                <div class="rounded-full bg-lightPrimary p-3 dark:bg-navy-700">
                    <span class="flex items-center text-indigo-500 dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24"><path fill="currentColor" d="M19 6h-2c0-2.76-2.24-5-5-5S7 3.24 7 6H5c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-7-3c1.66 0 3 1.34 3 3H9c0-1.66 1.34-3 3-3zm7 17H5V8h14v12zm-7-8c-1.66 0-3-1.34-3-3H7c0 2.76 2.24 5 5 5s5-2.24 5-5h-2c0 1.66-1.34 3-3 3z"/></svg>
                    </span>
                </div>
            </div>
            <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                <p class="font-dm text-sm font-medium text-gray-600">Pedidos Esta Semana</p>
                <h4 class="text-xl font-bold text-navy-700 dark:text-white">{{$ordenesSemana}}</h4>
            </div>
        </div>
        <div
            class="relative flex flex-grow !flex-row flex-col items-center rounded-[10px] rounded-[10px] border-[1px] border-gray-200 bg-white bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-gray-800 dark:bg-slate-900 dark:text-white dark:shadow-none">
            <div class="ml-[18px] flex h-[90px] w-auto flex-row items-center">
                <div class="rounded-full bg-lightPrimary p-3 dark:bg-navy-700">
                    <span class="flex items-center text-indigo-500 dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 256 256"><path fill="currentColor" d="m246.15 133.18l-99.32-99.32A19.85 19.85 0 0 0 132.69 28H40a12 12 0 0 0-12 12v92.69a19.85 19.85 0 0 0 5.86 14.14l99.32 99.32a20 20 0 0 0 28.28 0l84.69-84.69a20 20 0 0 0 0-28.28Zm-98.83 93.17L52 131V52h79l95.32 95.32ZM100 84a16 16 0 1 1-16-16a16 16 0 0 1 16 16Z"/></svg>
                    </span>
                </div>
            </div>
            <div class="h-50 ml-4 flex w-auto flex-col justify-center">
                <p class="font-dm text-sm font-medium text-gray-600">Total Productos</p>
                <h4 class="text-xl font-bold text-navy-700 dark:text-white">{{$cantidadProductos}}</h4>
            </div>
        </div>
    </div>

</div>
