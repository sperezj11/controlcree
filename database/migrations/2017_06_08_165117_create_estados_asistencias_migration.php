<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosAsistenciasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('estados_asistencias', function($table)
        {
            $table->integer('id',1);            
            $table->string('estado');
            $table->timestamps();

         
          });

DB::table('estados_asistencias')->insert([
            ['estado' => 'PENDIENTE'],
            ['estado' => 'SI'],
            ['estado' => 'NO'],
            ['estado' => 'EXCUSADO']
        ]);

        DB::commit();



     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          schema::drop('estados_asistencias');
    }
}
