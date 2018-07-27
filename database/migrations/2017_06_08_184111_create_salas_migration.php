<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('salas', function($table)
        {

            $table->integer('id',1);
            $table->string('nombre');    
            $table->string('ubicacion');         
            $table->string('capacidad');
            $table->timestamps();

          });

DB::table('salas')->insert([ 
              ['nombre' => 'SALA F'        , 'ubicacion' => 'BLOQUE F 2 PISO', 'capacidad' => '40'],
              ['nombre' => 'SALA KONDER'   , 'ubicacion' => 'BLOQUE J 1 PISO', 'capacidad' => '40'],
              ['nombre' => 'SALA MULTIPLE' , 'ubicacion' => 'BLOQUE K 5 PISO', 'capacidad' => '25']
             



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
         Schema::drop('salas'); 
    }
}
