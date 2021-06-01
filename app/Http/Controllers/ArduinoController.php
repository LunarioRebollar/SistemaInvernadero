<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\sensors;
use Illuminate\Support\Facades\DB;

class ArduinoController extends Controller
{
    public function showIndex(){
        $datos=sensors::select("sensors.id","sensors.temperature","sensors.proximity","sensors.pressure","sensors.humidity")
        ->selectRaw("DATE_FORMAT(created_at,'%d/%m/%Y') as fecha_hora")
        ->orderby("sensors.id","DESC")
        ->paginate(15);
        return view ("tabla.index",['datos'=>$datos]);
    }

    public function showGraphic1(Request $request){
       $query=trim($request->get('fecha_inicio'));
       $fecha_f=trim($request->get('fecha_final'));
       if($request){
            $data=sensors::select("sensors.id","sensors.created_at","sensors.temperature")
            ->selectRaw("DATE_FORMAT(created_at,'%d/%m/%Y') as fecha_hora")
            ->orderby("sensors.id","DESC")
            ->get();
            return view("graphics.grafica1",['data'=>$data,"fecha_inicio"=>$query,"fecha_final"=>$fecha_f]);
       }else{
            $data=sensors::select("sensors.id","sensors.created_at","sensors.temperature")
            ->selectRaw("DATE_FORMAT(created_at,'%d/%m/%Y') as fecha_hora")
            ->orderby("sensors.id","DESC")
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

    public function destroy($id)
    {
        $datos = sensors::findOrFail($id)->delete();
        return redirect()->route('tablas.index');
    }
}
