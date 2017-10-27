<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estrategia extends Model
{
     protected $table = 'estrategias';

    protected $fillable = [
    	'id',
    	'nombre'
    ];
}
