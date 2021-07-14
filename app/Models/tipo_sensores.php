<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_sensores extends Model
{
    use HasFactory;

    protected $fillable=['ID_tipo','Sensor'];
}
