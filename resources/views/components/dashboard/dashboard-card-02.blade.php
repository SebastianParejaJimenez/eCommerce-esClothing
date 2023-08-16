<div class="flex flex-col col-span-full sm:col-span-12 xl:col-span-6 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <div class="px-5 pt-5">
        <header class="flex justify-between items-start mb-2">
            <!-- Icon -->
            <img src="{{ asset('images/icon-02.svg') }}" width="32" height="32" alt="Icon 02" />
        </header>
        <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-2">Ventas</h2>
        <div class="text-xs font-semibold text-slate-400 dark:text-slate-500 uppercase mb-1">Ventas
            Generadas</div>
        <div class="flex items-start">
            <div class="text-3xl font-bold text-slate-800 dark:text-slate-100 mr-2">${{number_format($ventasTotales, 2, ',', '.') }}</div>
            <div class="text-sm font-semibold text-white px-1.5 bg-amber-500 rounded-full">-14%</div>
        </div>
    </div>
    <div class="grow max-sm:max-h-[100%] xl:max-h-[90%] w-full">
        <canvas id="canvas"></canvas>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    $(document).ready(function() {
        const cData = JSON.parse(`<?php echo $data; ?> `)

        const ctx = document.getElementById('canvas').getContext('2d')

        const chartAreaBg = {
            light: '#f8fafc',
            dark: '#f1f5f9'
        };

        const tooltipBodyColor = {
            light: '#1e293b',
            dark: '#f1f5f9'
        };

        const tooltipBgColor = {
            light: '#ffffff',
            dark: '#334155'
        };

        const tooltipBorderColor = {
            light: '#e2e8f0',
            dark: '#475569'
        };

        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: cData.label,
                datasets: [{
                    data: cData.data,
                    fill: true,
                    borderWidth: 3,
                    tension: 0,
                    pointRadius: 3,
                    pointHoverRadius: 3,
                    pointBorderWidth: 0,
                    pointHoverBorderWidth: 0,
                    clip: 20,
                    backgroundColor: "rgba(102, 126, 234, 0.2)",
                    borderColor: "rgba(102, 126, 234, 1)",
                    pointBackgroundColor: "rgba(102, 126, 234, 1)",
                    pointHoverBackgroundColor: "rgba(102, 126, 234, 1)",
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            title: () => false,

                        },
                        bodyColor: tooltipBodyColor.light,
                        backgroundColor: tooltipBgColor.light,
                        borderColor: tooltipBorderColor.light,

                    },
                    legend: {
                        display: false,
                    },
                },
                interaction: {
                    intersect: false,
                    mode: 'nearest',
                },
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        display: false,
                        beginAtZero: true,
                    },
                    x: {
                        display: false,
                    },

                }
            }
        })
    })
</script>
