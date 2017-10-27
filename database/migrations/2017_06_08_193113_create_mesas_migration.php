<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMesasMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('mesas', function($table)
        {

            $table->integer('id',1);
            $table->string('nombre');           
            $table->string('sala');
            $table->string('cupo');
             $table->timestamps();

          });

DB::table('mesas')->insert([
              ['nombre' => 'MESA 1', 'sala' => '2', 'cupo' => '5'],
              ['nombre' => 'MESA 2', 'sala' => '2', 'cupo' => '5'],
              ['nombre' => 'MESA 3', 'sala' => '2', 'cupo' => '5'],
              ['nombre' => 'MESA 4', 'sala' => '3', 'cupo' => '5'],
              ['nombre' => 'MESA 5', 'sala' => '3', 'cupo' => '5'],
              ['nombre' => 'MESA 6', 'sala' => '3', 'cupo' => '5'],
              ['nombre' => 'MESA 7', 'sala' => '3', 'cupo' => '5'],
              ['nombre' => 'MESA 8', 'sala' => '1', 'cupo' => '8']



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
    Schema::drop('mesas');
    }
}

