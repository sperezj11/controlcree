<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('usuarios', function($table)
        {
            $table->integer('id',1);           
            $table->string('nombre');
            $table->timestamps();

     
          });

        DB::table('usuarios')->insert([
            ['nombre' => 'MONITOR'],
            ['nombre' => 'TUTOR'],
            ['nombre' => 'TUTOR MENTOR'],
            ['nombre' => 'TUTOR DE IDIOMAS'],
            ['nombre' => 'PAR PADRINO'],
            ['nombre' => 'ADMINISTRATIVO']

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
       Schema::drop('usuarios');
    }
}
