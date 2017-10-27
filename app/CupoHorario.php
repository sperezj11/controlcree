<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupoHorario extends Model
{
 protected $table = 'cupohorarios';

    protected $fillable = [
    	'id',
    	'nombre',
    	'fecha',
    	'horario',
    	'conteo'
    ];
}
