<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sensors extends Model
{
    use HasFactory;

    protected $fillable=['id','temperature','proximity','pressure','humidity','created_at','updated_at'];
}
