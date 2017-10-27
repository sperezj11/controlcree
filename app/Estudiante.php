<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
     protected $table = 'estudiantes';

    protected $fillable = [
    	'id',
    	'nombre',
    	'celular',
    	'email1',
    	'email2'
    ];
}
