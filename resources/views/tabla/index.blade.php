<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style>
    .datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #991821; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #991821), color-stop(1, #80141C) );background:-moz-linear-gradient( center top, #991821 5%, #80141C 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#991821', endColorstr='#80141C');background-color:#991821; color:#FFFFFF; font-size: 15px; font-weight: bold; border-left: 1px solid #B01C26; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #80141C; border-left: 1px solid #F7CDCD;font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #F7CDCD; color: #80141C; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #991821;background: #F7CDCD;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }.datagrid table tfoot  li { display: inline; }.datagrid table tfoot li a { text-decoration: none; display: inline-block;  padding: 2px 8px; margin: 1px;color: #FFFFFF;border: 1px solid #991821;-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #991821), color-stop(1, #80141C) );background:-moz-linear-gradient( center top, #991821 5%, #80141C 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#991821', endColorstr='#80141C');background-color:#991821; }.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #80141C; color: #FFFFFF; background: none; background-color:#991821;}
</style>
<x-app-layout>
<center><h1>Datos Históricos</h1></center>
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-withe overflow-hidden shadow-xl sm:rounded-lg">
            <center>
                <div class="datagrid">
                    <table>
                        <thead>
                            <th colspan="2"><center>Temperatura</center></th>
                            <th colspan="2"><center>Proximidad</center></th>
                            <th colspan="2"><center>Presión</center></th>
                            <th colspan="2"><center>Húmedad</center></th>
                            <th colspan="2"><center>Fecha de registro</center></th>
                            <th colspan=""><center>Acciones</center></th>
                        </thead>
                        @foreach($datos as $d)
                        <tr>
                            <td colspan="2"><center>{{$d->temperature}}°C</center></td>
                            <td colspan="2"><center>{{$d->proximity}} cm</center></td>
                            <td colspan="2"><center>{{$d->pressure}} lúmenes</center></td>
                            <td colspan="2"><center>{{$d->humidity}} RH</center></td>
                            <td colspan="2"><center>{{$d->fecha_hora}}</center></td>
                            <td colspan="2">
                                <center>
                                <a href="{{ route('index', $d->id) }}" class="badge-md badge-pill badge-success">Ver</a>
                                <a href="{{ route('index', $d->id) }}" class="badge-md badge-pill badge-primary">Editar</a>
                                <a href="{{ route('index'),$d->id }}" class="badge-md badge-pill badge-danger">Eliminar</a>
                                </center>
                            </td>
                        </tr>
                        @endforeach
                    </table>    
                </div>
            </div>
        </div>
        {{ $datos->links() }}
        </center>
    </div>
</x-app-layout>