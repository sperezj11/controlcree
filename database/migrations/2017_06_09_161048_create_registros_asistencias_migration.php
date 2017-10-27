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
            $table->integer('horarioAsignado');
            $table->integer('asistencia');
            $table->timestamps();
            $table->foreign('horarioAsignado')->references('id')->on('asignaciones_horarios');
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
