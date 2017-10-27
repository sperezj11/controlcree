<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semanas', function($table)
        {
            $table->increments('id');
            $table->integer('year');
            $table->integer('no_semana');
            $table->string('inicio_semana',20);
            $table->string('fin_semana',20);
            $table->timestamps();
        });

        DB::table('semanas')->insert([
            ['year'=> 2017, 'no_semana'=>1, 'inicio_semana'=>'2 enero 2017','fin_semana'=>'8 enero 2017'],
            ['year'=> 2017, 'no_semana'=>2, 'inicio_semana'=>'9 enero 2017','fin_semana'=>'15 enero 2017'],
            ['year'=> 2017, 'no_semana'=>3, 'inicio_semana'=>'16 enero 2017','fin_semana'=>'22 enero 2017'],
            ['year'=> 2017, 'no_semana'=>4, 'inicio_semana'=>'23 enero 2017','fin_semana'=>'29 enero 2017'],
            ['year'=> 2017, 'no_semana'=>5, 'inicio_semana'=>'30 enero 2017','fin_semana'=>'5 febrero 2017'],
            ['year'=> 2017, 'no_semana'=>6, 'inicio_semana'=>'6 febrero 2017','fin_semana'=>'12 febrero 2017'],
            ['year'=> 2017, 'no_semana'=>7, 'inicio_semana'=>'13 febrero 2017','fin_semana'=>'19 febrero 2017'],
            ['year'=> 2017, 'no_semana'=>8, 'inicio_semana'=>'20 febrero 2017','fin_semana'=>'26 febrero 2017'],
            ['year'=> 2017, 'no_semana'=>9, 'inicio_semana'=>'27 febrero 2017','fin_semana'=>'5 marzo 2017'],
            ['year'=> 2017, 'no_semana'=>10, 'inicio_semana'=>'6 marzo 2017','fin_semana'=>'12 marzo 2017'],
            ['year'=> 2017, 'no_semana'=>11, 'inicio_semana'=>'13 marzo 2017','fin_semana'=>'19 marzo 2017'],
            ['year'=> 2017, 'no_semana'=>12, 'inicio_semana'=>'20 marzo 2017','fin_semana'=>'26 marzo 2017'],
            ['year'=> 2017, 'no_semana'=>13, 'inicio_semana'=>'27 marzo 2017','fin_semana'=>'2 abril 2017'],
            ['year'=> 2017, 'no_semana'=>14, 'inicio_semana'=>'3 abril 2017','fin_semana'=>'9 abril 2017'],
            ['year'=> 2017, 'no_semana'=>15, 'inicio_semana'=>'10 abril 2017','fin_semana'=>'16 abril 2017'],
            ['year'=> 2017, 'no_semana'=>16, 'inicio_semana'=>'17 abril 2017','fin_semana'=>'23 abril 2017'],
            ['year'=> 2017, 'no_semana'=>17, 'inicio_semana'=>'24 abril 2017','fin_semana'=>'30 abril 2017'],
            ['year'=> 2017, 'no_semana'=>18, 'inicio_semana'=>'1 mayo 2017','fin_semana'=>'7 mayo 2017'],
            ['year'=> 2017, 'no_semana'=>19, 'inicio_semana'=>'8 mayo 2017','fin_semana'=>'14 mayo 2017'],
            ['year'=> 2017, 'no_semana'=>20, 'inicio_semana'=>'15 mayo 2017','fin_semana'=>'21 mayo 2017'],
            ['year'=> 2017, 'no_semana'=>21, 'inicio_semana'=>'22 mayo 2017','fin_semana'=>'28 mayo 2017'],
            ['year'=> 2017, 'no_semana'=>22, 'inicio_semana'=>'29 mayo 2017','fin_semana'=>'4 junio 2017'],
            ['year'=> 2017, 'no_semana'=>23, 'inicio_semana'=>'5 junio 2017','fin_semana'=>'11 junio 2017'],
            ['year'=> 2017, 'no_semana'=>24, 'inicio_semana'=>'12 junio 2017','fin_semana'=>'18 junio 2017'],
            ['year'=> 2017, 'no_semana'=>25, 'inicio_semana'=>'19 junio 2017','fin_semana'=>'25 junio 2017'],
            ['year'=> 2017, 'no_semana'=>26, 'inicio_semana'=>'26 junio 2017','fin_semana'=>'2 julio 2017'],
            ['year'=> 2017, 'no_semana'=>27, 'inicio_semana'=>'3 julio 2017','fin_semana'=>'9 julio 2017'],
            ['year'=> 2017, 'no_semana'=>28, 'inicio_semana'=>'10 julio 2017','fin_semana'=>'16 julio 2017'],
            ['year'=> 2017, 'no_semana'=>29, 'inicio_semana'=>'17 julio 2017','fin_semana'=>'23 julio 2017'],
            ['year'=> 2017, 'no_semana'=>30, 'inicio_semana'=>'24 julio 2017','fin_semana'=>'30 julio 2017'],
            ['year'=> 2017, 'no_semana'=>31, 'inicio_semana'=>'31 julio 2017','fin_semana'=>'6 agosto 2017'],
            ['year'=> 2017, 'no_semana'=>32, 'inicio_semana'=>'7 agosto 2017','fin_semana'=>'13 agosto 2017'],
            ['year'=> 2017, 'no_semana'=>33, 'inicio_semana'=>'14 agosto 2017','fin_semana'=>'20 agosto 2017'],
            ['year'=> 2017, 'no_semana'=>34, 'inicio_semana'=>'21 agosto 2017','fin_semana'=>'27 agosto 2017'],
            ['year'=> 2017, 'no_semana'=>35, 'inicio_semana'=>'28 agosto 2017','fin_semana'=>'3 septiembre 2017'],
            ['year'=> 2017, 'no_semana'=>36, 'inicio_semana'=>'4 septiembre 2017','fin_semana'=>'10 septiembre 2017'],
            ['year'=> 2017, 'no_semana'=>37, 'inicio_semana'=>'11 septiembre 2017','fin_semana'=>'17 septiembre 2017'],
            ['year'=> 2017, 'no_semana'=>38, 'inicio_semana'=>'18 septiembre 2017','fin_semana'=>'24 septiembre 2017'],
            ['year'=> 2017, 'no_semana'=>39, 'inicio_semana'=>'25 septiembre 2017','fin_semana'=>'1 octubre 2017'],
            ['year'=> 2017, 'no_semana'=>40, 'inicio_semana'=>'2 octubre 2017','fin_semana'=>'8 octubre 2017'],
            ['year'=> 2017, 'no_semana'=>41, 'inicio_semana'=>'9 octubre 2017','fin_semana'=>'15 octubre 2017'],
            ['year'=> 2017, 'no_semana'=>42, 'inicio_semana'=>'16 octubre 2017','fin_semana'=>'22 octubre 2017'],
            ['year'=> 2017, 'no_semana'=>43, 'inicio_semana'=>'23 octubre 2017','fin_semana'=>'29 octubre 2017'],
            ['year'=> 2017, 'no_semana'=>44, 'inicio_semana'=>'30 octubre 2017','fin_semana'=>'5 noviembre 2017'],
            ['year'=> 2017, 'no_semana'=>45, 'inicio_semana'=>'6 noviembre 2017','fin_semana'=>'12 noviembre 2017'],
            ['year'=> 2017, 'no_semana'=>46, 'inicio_semana'=>'13 noviembre 2017','fin_semana'=>'19 noviembre 2017'],
            ['year'=> 2017, 'no_semana'=>47, 'inicio_semana'=>'20 noviembre 2017','fin_semana'=>'26 noviembre 2017'],
            ['year'=> 2017, 'no_semana'=>48, 'inicio_semana'=>'27 noviembre 2017','fin_semana'=>'3 diciembre 2017'],
            ['year'=> 2017, 'no_semana'=>49, 'inicio_semana'=>'4 diciembre 2017','fin_semana'=>'10 diciembre 2017'],
            ['year'=> 2017, 'no_semana'=>50, 'inicio_semana'=>'11 diciembre 2017','fin_semana'=>'17 diciembre 2017'],
            ['year'=> 2017, 'no_semana'=>51, 'inicio_semana'=>'18 diciembre 2017','fin_semana'=>'24 diciembre 2017'],
            ['year'=> 2017, 'no_semana'=>52, 'inicio_semana'=>'25 diciembre 2017','fin_semana'=>'31 diciembre 2017']
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
        Schema::drop('semanas');
    }
}
