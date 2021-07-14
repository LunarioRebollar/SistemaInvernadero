<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\sensors;
use Illuminate\Support\Facades\DB;

class ArduinoController extends Controller
{
    public function index(){
        $datos=sensors::select("sensors.id","sensors.temperature","sensors.proximity","sensors.pressure","sensors.humidity")
        ->selectRaw("DATE_FORMAT(created_at,'%d/%m/%Y') as fecha_hora")
        ->orderby("sensors.id","DESC")
        ->paginate(20);
        return view ("tabla.index",['datos'=>$datos]);
    }

    public function store(Request $request){
        $campos=['temperature'=>'required|string|max:100',
        'proximity'=>'required|string|max:100',
        'pressure'=>'required|string|max:100',
        'humidity'=>'required|string|max:100'];

        $Mensaje=["required"=>':campo requerido'];
        
        $this->validate($request,$campos,$Mensaje);

        $datosSensor=request()->except(['_token','_method']);

        sensors::insert($datosSensor);
        return redirect('tabla')->with('Mensaje','Datos insertados correctamente');
    }

    public function update(Request $request, $id){

        $campos=['temperature'=>'required|string|max:100',
        'proximity'=>'required|string|max:100',
        'pressure'=>'required|string|max:100',
        'humidity'=>'required|string|max:100'];

        $Mensaje=["required"=>':campo requerido'];
        
        $this->validate($request,$campos,$Mensaje);

        $datosSensor=request()->except(['_token','_method']);

        sensors::where('id','=',$id)->update($datosSensor);
        
        return redirect('tabla')->with('Mensaje','Dato o datos son modificados con exito');
    }

    public function edit($id)
    {
        $datos=sensors::findOrFail($id);
        return view('tabla.edit',compact('datos'));
    }

    public function destroy($id)
    {
        $datos = sensors::findOrFail($id)->delete();
        return redirect()->route('tabla.index');
    }
}
