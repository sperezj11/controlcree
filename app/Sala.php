<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
            protected $table = 'salas';

    protected $fillable = [
    	'id',
    	'nombre',
    	'ubicacion',
    	'capacidad'
    ];
}
