<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
   protected $table = 'periodos';

    protected $fillable = [
    	'id',
    	'nombre',
    	'fechaInicio',
    	'fechaFin'
    ];
}
