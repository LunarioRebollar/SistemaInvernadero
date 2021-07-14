<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<x-app-layout>
  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-center card-title font-weight-normal mt-5">Grafica Temperatura</h1>
            <div class="col-4">
                <label>Buscar dato Temperatura °C</label>
                    <form class="form-inline">
                        <input type="search" name="query" placeholder="Buscar Pelicula" class="form-control" arial-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-info btn-round" type="submit">Buscar</button>
                        </div>
                    </form>
            </div>
            <form method="GET" action="{{ route('grafica1') }}" >
                <div class="col-4">
                    <div class="form-group"> 
                        <label class="control-label" for="date">Fecha De Inicio</label>
                        <input class="form-control" id="fecha_inicio" name="fecha_inicio" placeholder="DD/MM/AA" value="{{ old('created_at') }}" type="date"/>
                        <br>
                        <label class="control-label" for="date">Fecha Final</label>
                        <input class="form-control" id="fecha_final" name="fecha_final" placeholder="DD/MM/AA" value="{{old('updated_at')}}" type="date"/>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-success">Buscar</button>
                        </span>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div id="chart_div" style="width: 1000px; height: 600px;"></div>
                </div>
            </form>
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
            legend: { position: 'none' },
            colors: ['#e7711c'],
          };
  
          var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
          chart.draw(data, options);
        }
      </script>  
</x-app-layout>