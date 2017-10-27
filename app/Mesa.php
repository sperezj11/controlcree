<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
             protected $table = 'mesas';

    protected $fillable = [
    	'id',
    	'nombre',
    	'sala',
    	'cupo'
    ];
}
