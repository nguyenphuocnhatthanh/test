@extends('layout')

@section('content')
    <h1>Daily Reports</h1>
    <canvas id="daily-reports" width="600" height="300"></canvas>
@stop

@section('footer')
    {!!HTML::script('js/chart.min.js')!!}
    <script>
        (function() {
            var ctx = document.getElementById('daily-reports').getContext('2d');
            var chart = {
                labels : {!!json_encode($dates)!!},
                datasets: [{
                    data: {!! json_encode($totals) !!}
                }]
            };
            var temp =new Chart(ctx).Bar(chart);
        })();
    </script>
@stop