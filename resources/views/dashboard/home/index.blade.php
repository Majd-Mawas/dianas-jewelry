@extends('dashboard.index')

@section('content')
    <div class="user-dashboard">
        <h1>Hello, {{ auth()->user()->name }}</h1>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 gutter">

                <div class="sales">
                    <div id="piechart1" style="width: 300px; height: 200px;margin-inline: auto"></div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 gutter">

                <div class="sales">
                    <div id="piechart2" style="width: 300px; height: 200px;margin-inline: auto"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data1 = new google.visualization.DataTable();
            data1.addColumn('string', 'Topping');
            data1.addColumn('number', 'Slices');
            data1.addRows([
                @foreach ($top_orders as $order)
                    ["{{ $order->serial }}", {{ $order->total_amount }}],
                @endforeach
            ]);
            var options1 = {
                title: 'Top Orders'
            };

            var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));

            chart1.draw(data1, options1);

            var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Topping');
            data2.addColumn('number', 'Slices');
            data2.addRows([
                @foreach ($products as $product)
                    ["{{ $product->name }}", {{ $product->order_count }}],
                @endforeach
            ]);

            var options2 = {
                title: 'Top Ordered Products'
            };

            var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart2.draw(data2, options2);
        }
    </script>
    <script type="text/javascript"></script>
@endsection
