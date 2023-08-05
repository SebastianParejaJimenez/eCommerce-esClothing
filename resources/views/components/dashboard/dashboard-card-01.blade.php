<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <div class="px-5 pt-5">
        <header class="flex justify-between items-start mb-2">
            <!-- Icon -->
            <img src="{{ asset('images/icon-01.svg') }}" width="32" height="32" alt="Icon 01" />
            <!-- Menu button -->


        </header>
        <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-2">Clientes Nuevos</h2>
        <div class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase mb-1">Numeros de clientes nuevos durante la semana</div>

        <div class="flex items-start">
            <div class="text-3xl font-bold text-slate-800 dark:text-slate-100 mr-2">1</div>
{{--             <div class="text-sm font-semibold text-white px-1.5 bg-emerald-500 rounded-full">+49%</div>
 --}}        </div>

    </div>
    <!-- Chart built with Chart.js 3 -->
    <!-- Check out src/js/components/dashboard-card-01.js for config -->
    <div class="grow max-sm:max-h-[128px] xl:max-h-[128px]">
        <!-- Change the height attribute to adjust the chart height -->
        <canvas id="dashboard-card-01" width="389" height="128"></canvas>
    </div>
</div>
