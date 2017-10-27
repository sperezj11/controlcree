<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
   protected $table = 'asignaturas';

    protected $fillable = [
    	'id',
    	'Codmateria',
    	'nombre',
    	'departamento'
    ];
}
