<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroAsistencia extends Model
{
    protected $table = 'registros_asistencias';

    protected $fillable = [
        'id',   
       'sala',   
       'fecha',
       'codigo',
       'monitor',
       'asignatura',
       'horario',
       'asistencia',
       'descripcion'

    ];
}
