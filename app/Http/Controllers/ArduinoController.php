<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\sensors;
use Illuminate\Support\Facades\DB;

class ArduinoController extends Controller
{
    public function showIndex(){
        $datos=DB::table('sensors')->paginate(15);
        return view ("tabla.index",['datos'=>$datos]);
    }
}       
