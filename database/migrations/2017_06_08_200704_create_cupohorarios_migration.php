<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCupohorariosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
             Schema::create('cupohorarios', function($table)
        {
            $table->integer('id',1);           
            $table->string('nombre');
            $table->date('fecha');
            $table->string('horario');
            $table->string('conteo');
            $table->timestamps();
           
          });

        DB::table('cupohorarios')->insert([
          
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
         Schema::drop('cupohorarios');
    }
}
