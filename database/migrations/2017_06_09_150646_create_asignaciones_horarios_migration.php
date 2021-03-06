<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionesHorariosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         Schema::create('asignaciones_horarios', function($table)
        {
            $table->integer('id',1); 
            $table->integer('sala');  
            $table->integer('periodo');        
            $table->date('fecha');
            $table->integer('horario');
            $table->integer('mesa');
            $table->integer('usuario');
            $table->integer('monitor');
            $table->integer('asignatura');
            $table->integer('estrategia');
            $table->timestamps();
            
            $table->foreign('sala')->references('id')->on('salas');
            $table->foreign('periodo')->references('id')->on('periodos');
            $table->foreign('horario')->references('id')->on('horarios');           
            $table->foreign('mesa')->references('id')->on('mesas');
            $table->foreign('usuario')->references('id')->on('usuarios');
            $table->foreign('monitor')->references('id')->on('estudiantes');
            $table->foreign('asignatura')->references('id')->on('asignaturas');
            $table->foreign('estrategia')->references('id')->on('estrategias');
          });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
  
   Schema::drop('asignaciones_horarios'); 
    }

}
