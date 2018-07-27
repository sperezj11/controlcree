<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('periodos', function($table)
        {
            $table->integer('id',1);           
            $table->string('nombre');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->timestamps();

     
          });
           DB::table('periodos')->insert([
              ['nombre' => '201810', 'fechaInicio' => '2018-01-08', 'fechaFin' => '2018-05-30'],
              ['nombre' => '201820', 'fechaInicio' => '2018-06-12', 'fechaFin' => '2018-07-13'],
              ['nombre' => '201830', 'fechaInicio' => '2018-07-09', 'fechaFin' => '2018-11-30']


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
        Schema::drop('periodos'); 
    }
}
