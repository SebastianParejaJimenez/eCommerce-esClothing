    <!-- component -->

    <div class="my-4 mx-4 flex flex-col col-span-full sm:col-span-3 xl:col-span-4 bg-white dark:bg-slate-800 shadow-lg rounded-sm border border-slate-200 dark:border-slate-700">
        <div class="py-3 px-5 bg-gray-50 dark:bg-slate-800">Productos vendidos en el mes Actual</div>
        <div class="w-full">
            <canvas class="p-10" id="canvas"></canvas>
        </div>
    </div>


  <!-- Required chart.js -->

<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Chart doughnut -->
  <script>

    $(document).ready(function() {
        const cData = JSON.parse(`<?php echo $data; ?> `)
        const ctx = document.getElementById('canvas').getContext('2d')

/*         console.log(cData)
 */
        const dataDoughnut = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: cData.label, //["Red", "Yellow", "Blue"],
                datasets:[{
                label: 'Cantidad de Ventas',
                data: cData.data, //[100,200,300],
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
                        display: false,
                    },
                    x: {
                        display: false,
                    },
                }
            }
        })
    })



  </script>
