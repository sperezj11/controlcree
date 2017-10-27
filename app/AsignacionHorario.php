<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionHorario extends Model
{
  protected $table = 'asignaciones_horarios';

    protected $fillable = [
    	'id',
        'semana',
    	'fechainicio',
        'fechafin',
        'horario',
        'mesa',
        'usuario',
        'monitor',
        'asignatura',
        'estrategia',
    ];
}
