<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function($table)
        {
            $table->integer('id',1);          
            $table->string('horaInicio');
            $table->string('horaFin');
            $table->timestamps();

         
            
        });

        DB::table('horarios')->insert([
                    ['horaInicio' => '0630', 'horaFin' => '0729'],
                    ['horaInicio' => '0730', 'horaFin' => '0829'],
                    ['horaInicio' => '0830', 'horaFin' => '0929'],
                    ['horaInicio' => '0930', 'horaFin' => '1029'],
                    ['horaInicio' => '1030', 'horaFin' => '1129'],
                    ['horaInicio' => '1130', 'horaFin' => '1229'],
                    ['horaInicio' => '1230', 'horaFin' => '1329'],
                    ['horaInicio' => '1330', 'horaFin' => '1429'],
                    ['horaInicio' => '1430', 'horaFin' => '1529'],
                    ['horaInicio' => '1530', 'horaFin' => '1629'],
                    ['horaInicio' => '1630', 'horaFin' => '1729'],
                    ['horaInicio' => '1730', 'horaFin' => '1829'],
                    ['horaInicio' => '1830', 'horaFin' => '1929']

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
        schema::drop('horarios');
    }
}
