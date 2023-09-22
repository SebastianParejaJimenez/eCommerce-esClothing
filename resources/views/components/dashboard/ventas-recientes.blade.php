<div class="col-span-full xl:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <header class="px-5 py-4 border-b border-slate-100 dark:border-slate-700">
        <h2 class="font-semibold text-slate-800 dark:text-slate-100">Ventas Recientes</h2>
    </header>
    <div class="p-3">
        <div>
            <header class="text-xs uppercase text-slate-400 dark:text-slate-500 bg-slate-50 dark:bg-slate-700 dark:bg-opacity-50 rounded-sm font-semibold p-2">Hoy</header>
            <ul class="my-1">

            @foreach ($ventasRecientes as $venta )

                <li class="flex px-2">
                    <div class="w-9 h-9 rounded-full shrink-0 bg-emerald-500 my-2 mr-3">
                        <svg class="w-9 h-9 fill-current text-emerald-50" viewBox="0 0 36 36">
                            <path d="M18.3 11.3l-1.4 1.4 4.3 4.3H11v2h10.2l-4.3 4.3 1.4 1.4L25 18z" />
                        </svg>
                    </div>
                    <div class="grow flex items-center border-b border-slate-100 dark:border-slate-700 text-sm py-2">
                        <div class="grow flex justify-between">
                            <div class="self-center"><a class="font-medium text-slate-800 hover:text-slate-900 dark:text-slate-100 dark:hover:text-white" href="{{route('detalles.pedidos', ['id' => $venta->id, ])}}">Venta</a>  <p class="underline"> {{ $venta->user->name }}</p></div>
                            <div class="shrink-0 self-start ml-2">
                                <span class="font-medium text-emerald-500">+{{ $venta->subtotal }}</span>
                            </div>

                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        {{ $ventasRecientes->links() }}
    
    </div>
</div>
