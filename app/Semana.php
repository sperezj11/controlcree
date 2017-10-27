<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semana extends Model
{
    protected $table = 'semanas';

    protected $fillable = [
    	'id',
    	'year',
    	'no_semana',
    	'inicio_semana',
    	'fin_semana'
    ];
}
