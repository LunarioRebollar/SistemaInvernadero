<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sensors;

class GraficasController extends Controller
{
    public function showGraphic1(Request $request){
        
        // eliminamos validaciones innecesarias y ponemos la fecha de hoy por defecto en ambas variables
        $fecha_i = $fecha_f = date('d-m-Y');
        
        $query=trim($request->get('search'));
        if($request){
            $data=sensors::select("sensors.id","sensors.created_at","sensors.temperature")
            ->selectRaw("DATE_FORMAT(created_at,'%d/%m/%Y') as fecha_hora")
            ->whereBetween('sensors.created_at',[$fecha_i,$fecha_f])
            ->orwhere('sensors.temperature','LIKE','%'.$query.'%')
            ->orderby("sensors.id","ASC")
            ->get();
             return view("graphics.grafica1",['data'=>$data,"query"=>$query,"fecha_inicio"=>$fecha_i,"fecha_final"=>$fecha_f]);
        }else{
             $data=sensors::select("sensors.id","sensors.created_at","sensors.temperature")
             ->selectRaw("DATE_FORMAT(created_at,'%d/%m/%Y') as fecha_hora")
             ->orwhere('sensors.temperature','LIKE','%'.$query.'%')
             ->orderby("sensors.id","ASC")
             ->get();
             return view("graphics.grafica1",['data'=>$data]);
        }
     }
 
     public function showGraphic2(Request $request){
         $query=trim($request->get('fecha_inicio'));
         $fecha_f=trim($request->get('fecha_final'));
         if($request){
              $data=sensors::select("sensors.id","sensors.created_at","sensors.humidity")
              ->selectRaw("DATE_FORMAT(created_at,'%d/%m/%Y') as fecha_hora")
              ->orderby("sensors.id","DESC")
              ->get();
              return view("graphics.grafica2",['data'=>$data,"fecha_inicio"=>$query,"fecha_final"=>$fecha_f]);
         }else{
              $data=sensors::select("sensors.id","sensors.created_at","sensors.humidity")
              ->selectRaw("DATE_FORMAT(created_at,'%d/%m/%Y') as fecha_hora")
              ->orderby("sensors.id","DESC")
              ->get();
              return view("graphics.grafica2",['data'=>$data]);
         }
     }
}
