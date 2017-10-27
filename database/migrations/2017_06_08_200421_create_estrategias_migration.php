<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstrategiasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('estrategias', function($table)
        {
            $table->integer('id',1);           
            $table->string('nombre');
            $table->timestamps();

            
          });

DB::table('estrategias')->insert([


    ['nombre' => 'TUTORÍA EN SALA'],
    ['nombre' => 'MONITORIA ACADÉMICA'],
    ['nombre' => 'TALLER REPASO DE EXÁMENES'],
    ['nombre' => 'TUTOR MENTOR'],
    ['nombre' => 'TUTORÍA DE IDIOMAS'],
    ['nombre' => 'PAR PADRINO'],
    ['nombre' => 'REUNIÓN'],

          
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
        Schema::drop('estrategias');
    }
}
