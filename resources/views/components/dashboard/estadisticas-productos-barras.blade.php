<!-- component -->
<div class=" mx-4 my-4 flex flex-col col-span-full sm:col-span-12 xl:col-span-8 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
    <div class="py-3 px-5 bg-gray-50 dark:bg-slate-800">Cantidad de Productos Vendidos Por Mes</div>
    <div class="w-full h-full">
        <canvas class="p-10" id="canvas2"></canvas>
    </div>
</div>
  <!-- Required chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Chart bar -->
  <script>
   $(document).ready(function() {
        const cData = JSON.parse(`<?php echo $data; ?> `)
        const ctx = document.getElementById('canvas2').getContext('2d')

         console.log(cData)

        const dataBar = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: cData.label_barras,
                datasets:[{
                label: 'Cantidad de Ventas',
                data: cData.data_barras,
                backgroundColor: [
                "rgb(133, 105, 241)",
                "rgb(164, 101, 241)",
                "rgb(101, 143, 241)",
                ],
            }]
        },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        display: true,
                    },
                    x: {
                        display: true,
                    },
                }
            }
        })
    })
  </script>

