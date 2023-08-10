$(document).ready(function() {
    const cData = JSON.parse(`<?php echo $data; ?> `)

    const ctx = document.getElementById('canvas').getContext('2d')

    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: cData.label,
            datasets: [{
                label: 'cant ordenes',
                data: cData.data,
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks:{
                        beginAtZero: true
                    }
                }]
            }
        }
    })
})
