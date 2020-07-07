<div class="col-md-12">
    <div class="card">

        <canvas id="myChart"></canvas>
    </div>
    <!-- /.card -->
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        //labels: [{{ implode(',', $labelDatas)}}],
        labels: ['{{$labelDatas[0]}}', '{{$labelDatas[1]}}','{{$labelDatas[2]}}',
         '{{$labelDatas[3]}}','{{$labelDatas[4]}}', '{{$labelDatas[5]}}',
         '{{$labelDatas[6]}}', '{{$labelDatas[7]}}','{{$labelDatas[8]}}',
          '{{$labelDatas[9]}}','{{$labelDatas[10]}}', 'ONTEM'],
        datasets: [{
            label: 'Saldo últimos 12 Dias',

            data: [ {{implode(',',$saldoLast12Days)}}],

            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

@section('plugins.Datatables', true)
@section('plugins.Chartjs', true)
@section('plugins.Select2', true)
@section('plugins.Pace', true)
@section('plugins.Sweetalert2', true)