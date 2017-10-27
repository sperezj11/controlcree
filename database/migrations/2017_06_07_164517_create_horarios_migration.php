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
            $table->string('dia');
            $table->string('horaInicio');
            $table->string('horaFin');
            $table->timestamps();

         
            
        });

        DB::table('horarios')->insert([
                    ['dia' => 'LUNES', 'horaInicio' => '0630', 'horaFin' => '0729'],
                    ['dia' => 'LUNES', 'horaInicio' => '0730', 'horaFin' => '0829'],
                    ['dia' => 'LUNES', 'horaInicio' => '0830', 'horaFin' => '0929'],
                    ['dia' => 'LUNES', 'horaInicio' => '0930', 'horaFin' => '1029'],
                    ['dia' => 'LUNES', 'horaInicio' => '1030', 'horaFin' => '1129'],
                    ['dia' => 'LUNES', 'horaInicio' => '1130', 'horaFin' => '1229'],
                    ['dia' => 'LUNES', 'horaInicio' => '1230', 'horaFin' => '1329'],
                    ['dia' => 'LUNES', 'horaInicio' => '1330', 'horaFin' => '1429'],
                    ['dia' => 'LUNES', 'horaInicio' => '1430', 'horaFin' => '1529'],
                    ['dia' => 'LUNES', 'horaInicio' => '1530', 'horaFin' => '1629'],
                    ['dia' => 'LUNES', 'horaInicio' => '1630', 'horaFin' => '1729'],
                    ['dia' => 'LUNES', 'horaInicio' => '1730', 'horaFin' => '1829'],
                    ['dia' => 'LUNES', 'horaInicio' => '1830', 'horaFin' => '1929'],
                    ['dia' => 'MARTES', 'horaInicio' => '0630', 'horaFin' => '0729'],
                    ['dia' => 'MARTES', 'horaInicio' => '0730', 'horaFin' => '0829'],
                    ['dia' => 'MARTES', 'horaInicio' => '0830', 'horaFin' => '0929'],
                    ['dia' => 'MARTES', 'horaInicio' => '0930', 'horaFin' => '1029'],
                    ['dia' => 'MARTES', 'horaInicio' => '1030', 'horaFin' => '1129'],
                    ['dia' => 'MARTES', 'horaInicio' => '1130', 'horaFin' => '1229'],
                    ['dia' => 'MARTES', 'horaInicio' => '1230', 'horaFin' => '1329'],
                    ['dia' => 'MARTES', 'horaInicio' => '1330', 'horaFin' => '1429'],
                    ['dia' => 'MARTES', 'horaInicio' => '1430', 'horaFin' => '1529'],
                    ['dia' => 'MARTES', 'horaInicio' => '1530', 'horaFin' => '1629'],
                    ['dia' => 'MARTES', 'horaInicio' => '1630', 'horaFin' => '1729'],
                    ['dia' => 'MARTES', 'horaInicio' => '1730', 'horaFin' => '1829'],
                    ['dia' => 'MARTES', 'horaInicio' => '1830', 'horaFin' => '1929'],
                    ['dia' => 'MIÉRCOLES', 'horaInicio' => '0630', 'horaFin' => '0729'],
                    ['dia' => 'MIÉRCOLES', 'horaInicio' => '0730', 'horaFin' => '0829'],
                    ['dia' => 'MIÉRCOLES', 'horaInicio' => '0830', 'horaFin' => '0929'],
                    ['dia' => 'MIÉRCOLES', 'horaInicio' => '0930', 'horaFin' => '1029'],
                    ['dia' => 'MIÉRCOLES', 'horaInicio' => '1030', 'horaFin' => '1129'],
                    ['dia' => 'MIÉRCOLES', 'horaInicio' => '1130', 'horaFin' => '1229'],
                    ['dia' => 'MIÉRCOLES', 'horaInicio' => '1230', 'horaFin' => '1329'],
                    ['dia' => 'MIÉRCOLES', 'horaInicio' => '1330', 'horaFin' => '1429'],
                    ['dia' => 'MIÉRCOLES', 'horaInicio' => '1430', 'horaFin' => '1529'],
                    ['dia' => 'MIÉRCOLES', 'horaInicio' => '1530', 'horaFin' => '1629'],
                    ['dia' => 'MIÉRCOLES', 'horaInicio' => '1630', 'horaFin' => '1729'],
                    ['dia' => 'MIÉRCOLES', 'horaInicio' => '1730', 'horaFin' => '1829'],
                    ['dia' => 'MIÉRCOLES', 'horaInicio' => '1830', 'horaFin' => '1929'],
                    ['dia' => 'JUEVES', 'horaInicio' => '0630', 'horaFin' => '0729'],
                    ['dia' => 'JUEVES', 'horaInicio' => '0730', 'horaFin' => '0829'],
                    ['dia' => 'JUEVES', 'horaInicio' => '0830', 'horaFin' => '0929'],
                    ['dia' => 'JUEVES', 'horaInicio' => '0930', 'horaFin' => '1029'],
                    ['dia' => 'JUEVES', 'horaInicio' => '1030', 'horaFin' => '1129'],
                    ['dia' => 'JUEVES', 'horaInicio' => '1130', 'horaFin' => '1229'],
                    ['dia' => 'JUEVES', 'horaInicio' => '1230', 'horaFin' => '1329'],
                    ['dia' => 'JUEVES', 'horaInicio' => '1330', 'horaFin' => '1429'],
                    ['dia' => 'JUEVES', 'horaInicio' => '1430', 'horaFin' => '1529'],
                    ['dia' => 'JUEVES', 'horaInicio' => '1530', 'horaFin' => '1629'],
                    ['dia' => 'JUEVES', 'horaInicio' => '1630', 'horaFin' => '1729'],
                    ['dia' => 'JUEVES', 'horaInicio' => '1730', 'horaFin' => '1829'],
                    ['dia' => 'JUEVES', 'horaInicio' => '1830', 'horaFin' => '1929'],
                    ['dia' => 'VIERNES', 'horaInicio' => '0630', 'horaFin' => '0729'],
                    ['dia' => 'VIERNES', 'horaInicio' => '0730', 'horaFin' => '0829'],
                    ['dia' => 'VIERNES', 'horaInicio' => '0830', 'horaFin' => '0929'],
                    ['dia' => 'VIERNES', 'horaInicio' => '0930', 'horaFin' => '1029'],
                    ['dia' => 'VIERNES', 'horaInicio' => '1030', 'horaFin' => '1129'],
                    ['dia' => 'VIERNES', 'horaInicio' => '1130', 'horaFin' => '1229'],
                    ['dia' => 'VIERNES', 'horaInicio' => '1230', 'horaFin' => '1329'],
                    ['dia' => 'VIERNES', 'horaInicio' => '1330', 'horaFin' => '1429'],
                    ['dia' => 'VIERNES', 'horaInicio' => '1430', 'horaFin' => '1529'],
                    ['dia' => 'VIERNES', 'horaInicio' => '1530', 'horaFin' => '1629'],
                    ['dia' => 'VIERNES', 'horaInicio' => '1630', 'horaFin' => '1729'],
                    ['dia' => 'VIERNES', 'horaInicio' => '1730', 'horaFin' => '1829'],
                    ['dia' => 'VIERNES', 'horaInicio' => '1830', 'horaFin' => '1929'],
                    ['dia' => 'SÁBADO', 'horaInicio' => '0630', 'horaFin' => '0729'],
                    ['dia' => 'SÁBADO', 'horaInicio' => '0730', 'horaFin' => '0829'],
                    ['dia' => 'SÁBADO', 'horaInicio' => '0830', 'horaFin' => '0929'],
                    ['dia' => 'SÁBADO', 'horaInicio' => '0930', 'horaFin' => '1029'],
                    ['dia' => 'SÁBADO', 'horaInicio' => '1030', 'horaFin' => '1129'],
                    ['dia' => 'SÁBADO', 'horaInicio' => '1130', 'horaFin' => '1229'],
                    ['dia' => 'SÁBADO', 'horaInicio' => '1230', 'horaFin' => '1329'],
                    ['dia' => 'SÁBADO', 'horaInicio' => '1330', 'horaFin' => '1429'],
                    ['dia' => 'SÁBADO', 'horaInicio' => '1430', 'horaFin' => '1529'],
                    ['dia' => 'SÁBADO', 'horaInicio' => '1530', 'horaFin' => '1629'],
                    ['dia' => 'SÁBADO', 'horaInicio' => '1630', 'horaFin' => '1729'],
                    ['dia' => 'SÁBADO', 'horaInicio' => '1730', 'horaFin' => '1829'],
                    ['dia' => 'SÁBADO', 'horaInicio' => '1830', 'horaFin' => '1929']

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
