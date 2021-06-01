<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<x-app-layout>
  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('grafica1') }}" >
                <div class="input-group">
                    <div class="form-group">
                        <span class="input-group-text">Introduce el rango de fechas</span>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">{{'Fecha Inicial'}}</label>
                        <input type="date" name="fecha_inicial" class="form-control" placeholder="Fecha inicial" id="fecha_inicial">
                    </div>
                    <div class="form-group">
                        <label class="control-label">{{'Fecha Inicial'}}</label>
                        <input type="date" name="fecha_final" class="form-control" placeholder="Fecha final" id="fecha_final">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success mb-2" name="buscar">Consultar</button>
                    </div>
                </div>
            </form>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div id="chart_div" style="width: 1000px; height: 600px;"></div>
            </div>
        </div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha de registro', 'Temperatura'],
          @foreach($data as $dir)
          ['{{$dir->fecha_hora}}',{{$dir->temperature}}],
          @endforeach
          ]);

        var options = {
          title: 'Reporte Temperatura, Humedad, Gas LP y Distancia (cm) con Arduino',
          subtitle: 'ITTol Microcontroladores',
          legend: { position: 'center' },
          colors: ['#5C3292'],
          interpolateNulls: false,
        };

        var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

</x-app-layout>