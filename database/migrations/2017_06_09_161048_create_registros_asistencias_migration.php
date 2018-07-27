<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosAsistenciasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('registros_asistencias', function($table)
        {
            $table->integer('id',1);   
            $table->string('sala');
            $table->date('fecha');   
            $table->string('codigo');  
            $table->string('monitor');    
            $table->string('asignatura'); 
            $table->string('horario');
            $table->integer('asistencia');
            $table->string('descripcion');
            $table->timestamps();
            $table->foreign('asistencia')->references('id')->on('estados_asistencias');
            });
  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::drop('registros_asistencias');
    }
}
