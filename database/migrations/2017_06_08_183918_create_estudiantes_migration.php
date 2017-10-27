<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function($table)
        {
            $table->integer('id')->unique();           
            $table->string('nombre');
            $table->string('celular');
            $table->string('email1');
            $table->string('email2');
             $table->timestamps();

            $table->primary('id');
          });


        DB::table('estudiantes')->insert([
['id' => '200056158', 'nombre' => 'JORGE PEÑA LAZARO', 'celular' => '3175151206', 'email1' => 'ajlazaro@uninorte.edu.co', 'email2' => 'jorgepena03@gmail.com'],
['id' => '200070915', 'nombre' => 'ALBERTO MOROS MARCILLO', 'celular' => '3014894582', 'email1' => 'amarcillo@uninorte.edu.co', 'email2' => 'morosmarcillo98@hotmail.com'],
['id' => '200073103', 'nombre' => 'REINEL RODRIGUEZ CASTILLO', 'celular' => '3016365006', 'email1' => 'reinelr@uninorte.edu.co', 'email2' => 'rey_rodriguez16@hotmail.com'],
['id' => '200046217', 'nombre' => 'CARLOS ARTETA CHEDRAUY', 'celular' => '3176638931', 'email1' => 'cchedrauy@uninorte.edu.co', 'email2' => 'cajoarche@hotmail.com'],
['id' => '200089854', 'nombre' => 'MASIEL CAMACHO ROCHA', 'celular' => '3014140477', 'email1' => 'masielc@uninorte.edu.co', 'email2' => 'masielcamacho86@gmail.com'],
['id' => '200004667', 'nombre' => 'JAIRO SILVA PINTO', 'celular' => '3103755228', 'email1' => 'jairos@uninorte.edu.co', 'email2' => 'jairojr_95@hotmail.com'],
['id' => '200055261', 'nombre' => 'MARIA RESTREPO TORRES', 'celular' => '3116428957', 'email1' => 'mrestrepof@uninorte.edu.co', 'email2' => 'maferestrepot@gmail.com'],
['id' => '200054668', 'nombre' => 'GISSELLE TORRES OLIVARES', 'celular' => '3016694693', 'email1' => 'tgisselle@uninorte.edu.co', 'email2' => 'giselle.torres96@gmail.com'],
['id' => '200063214', 'nombre' => 'MARIA SILVA PAREJO', 'celular' => '3014464397', 'email1' => 'amparejo@uninorte.edu.co', 'email2' => 'marysilva9622@gmail.com'],
['id' => '200052213', 'nombre' => 'DAYANA OÑORO LOPEZ', 'celular' => '30177965884', 'email1' => 'dconoro@uninorte.edu.co', 'email2' => 'dayanaonoro@hotmail.com'],
['id' => '200062894', 'nombre' => 'JOSE DORIA GARCIA', 'celular' => '3046487087', 'email1' => 'jdoriad@uninorte.edu.co', 'email2' => 'yoshapj@hotmail.com'],
['id' => '200054976', 'nombre' => 'JESUS ARBELAEZ RODELO', 'celular' => '3143184636', 'email1' => 'jdarbelaez@uninorte.edu.co', 'email2' => 'jesusdavid_arodelo@hotmail.com'],
['id' => '200054748', 'nombre' => 'JOSE MUÑOZ ANGULO', 'celular' => '3043901110', 'email1' => 'anguloaj@uninorte.edu.co', 'email2' => 'josealejandromu@gmail.com'],
['id' => '200072027', 'nombre' => 'JUAN DUQUE ORDOÑEZ', 'celular' => '3004851018', 'email1' => 'pjduque@uninorte.edu.co', 'email2' => 'juan-pablo-duque@hotmail.com'],
['id' => '200038162', 'nombre' => 'LINA CORONELL ALEMAN', 'celular' => '3016502406', 'email1' => 'lmcoronell@uninorte.edu.co', 'email2' => 'lina_lmca@hotmail.com'],
['id' => '200064254', 'nombre' => 'DANIELA DONADO OLMOS', 'celular' => '3015942505', 'email1' => 'didonado@uninorte.edu.co', 'email2' => 'nanadonado@gmail.com'],
['id' => '200063535', 'nombre' => 'MARIA ALVAREZ CAMELO', 'celular' => '3004636300', 'email1' => 'camelop@uninorte.edu.co', 'email2' => 'manaalvarezcamelo@gmail.com'],
['id' => '200064817', 'nombre' => 'CAMILO GONZALEZ OLIER', 'celular' => '3007726337', 'email1' => 'colier@uninorte.edu.co', 'email2' => 'camilolier@gmail.com'],
['id' => '200072538', 'nombre' => 'JESUS PEREZ REALES', 'celular' => '3225833334', 'email1' => 'arealesj@uninorte.edu.co', 'email2' => 'jesusaperez11@gmail.com'],
['id' => '200061748', 'nombre' => 'ANDREA ARAGON SALCEDO', 'celular' => '3147860359', 'email1' => 'caaragon@uninorte.edu.co', 'email2' => 'andreaaragon@gmail.com'],
['id' => '200048989', 'nombre' => 'SARAH BUELVAS ESPINOSA', 'celular' => '3014508874', 'email1' => 'sarahb@uninorte.edu.co', 'email2' => 'sarahbuelvas@gmail.com'],
['id' => '200064249', 'nombre' => 'MILENA MARTINEZ PICHON', 'celular' => '3012039454', 'email1' => 'pichons@uninorte.edu.co', 'email2' => 'milenamartinezp9@gmail.com'],
['id' => '200063536', 'nombre' => 'LUIS PEÑA PACHECO', 'celular' => '3205685884', 'email1' => 'lpenaf@uninorte.edu.co', 'email2' => 'GARUFELIPE@HOTMAIL.COM'],
['id' => '200068426', 'nombre' => 'SEBASTIAN CHEGWIN CRISMATT', 'celular' => '3145197645', 'email1' => 'sebastianchegwin@uninorte.edu.co', 'email2' => 'sebaschegwin@hotmail.com'],
['id' => '200044973', 'nombre' => 'JOSEPH JIMENEZ RAMIREZ', 'celular' => '3145428359', 'email1' => 'josephj@uninorte.edu.co', 'email2' => 'josephj@uninorte.edu.co'],
['id' => '200063254', 'nombre' => 'ANDY CASTILLO COLON', 'celular' => '3145428359', 'email1' => 'candy@uninorte.edu.co', 'email2' => 'castilloandy224@gmail.com'],
['id' => '200071910', 'nombre' => 'ADRIAN BARRANCO CARLOS', 'celular' => '3008137564', 'email1' => 'aobarranco@uninorte.edu.co', 'email2' => 'adribarranco@uninorte.edu.co'],
['id' => '200063381', 'nombre' => 'MANUEL AGUILERA ROMERO', 'celular' => '3234150823', 'email1' => 'mdaguilera@uninorte.edu.co', 'email2' => 'mdjar0608@hotmail.com'],
['id' => '200056125', 'nombre' => 'JOEL DE LA ESPRIELLA DIAZ', 'celular' => '3016583414', 'email1' => 'ajdelaespriella@uninorte.edu.co', 'email2' => 'delaj453@hotmail.com'],
['id' => '200082754', 'nombre' => 'LAUREN MERCADO MANOTAS', 'celular' => '3147732890', 'email1' => 'dmercadol@uninorte.edu.co', 'email2' => 'laumercadomanotas@gmail.com'],
['id' => '200087265', 'nombre' => 'LAURA GUTIERREZ PEREZ', 'celular' => '3015946810', 'email1' => 'sgutierrezl@uninorte.edu.co', 'email2' => 'lagupe03@hotmail.com'],
['id' => '200055395', 'nombre' => 'LUIS LLACH ROLONG', 'celular' => '3003100702', 'email1' => 'lallach@uninorte.edu.co', 'email2' => 'alejo.llach@gmail.com'],
['id' => '200087246', 'nombre' => 'WILLIAN GARCIA BOVEA', 'celular' => '3017685349', 'email1' => 'wbovea@uninorte.edu.co', 'email2' => 'wgarcia1309@hotmail.com'],
['id' => '200071179', 'nombre' => 'JUAN DA CAMARA MALDONADO', 'celular' => '3008835984', 'email1' => 'jdacamara@uninorte.edu.co', 'email2' => 'juanpablodam@gmail.com'],
['id' => '200054974', 'nombre' => 'GUSTAVO ARAUJO RODRIGUEZ', 'celular' => '3022331870', 'email1' => 'gaaraujo@uninorte.edu.co', 'email2' => 'gaaraujor@gmail.com'],
['id' => '200045418', 'nombre' => 'RANDY CONSUEGRA ORTEGA', 'celular' => '3016060337', 'email1' => 'randyc@uninorte.edu.co', 'email2' => 'rsconsuegra95@gmail.com'],
['id' => '200071776', 'nombre' => 'YULEIDY VILLAR RODRIGUEZ', 'celular' => '3013934980/3185007300', 'email1' => 'yvillar@uninorte.edu.co', 'email2' => 'yula1998@hotmail.com'],
['id' => '200072861', 'nombre' => 'FREDDY MARRUGO VERGARA', 'celular' => '3013889641', 'email1' => 'fjmarrugo@uninorte.edu.co', 'email2' => 'fjmarrugo@uninorte.edu.co'],
['id' => '200062279', 'nombre' => 'LORAINE BRUGES MARTINEZ', 'celular' => '3117002494', 'email1' => 'lsbruges@uninorte.edu.co', 'email2' => 'freelore@hotmail.com'],
['id' => '200088735', 'nombre' => 'ADRIAN ACOSTA HERRERA', 'celular' => '3008138894', 'email1' => 'faacosta@uninorte.edu.co', 'email2' => 'faacosta@uninorte.edu.co'],
['id' => '200089487', 'nombre' => 'ARIANA PEÑA GARCIA', 'celular' => '3005431980', 'email1' => 'arianag@uninorte.edu.co', 'email2' => 'arianajudith1605@gmail.com'],
['id' => '200087081', 'nombre' => 'LEONARDO PACHECO CABARCAS', 'celular' => '3006353483', 'email1' => 'lpachecod@uninorte.edu.co', 'email2' => 'leonardopc_99@hotmail.com'],
['id' => '200068877', 'nombre' => 'MARIA OCHOA ROMERO', 'celular' => '3126630836', 'email1' => 'omariaa@uninorte.edu.co', 'email2' => 'maleja-8a@hotmail.com'],
['id' => '200080166', 'nombre' => 'GERARDO GENTIL OROZCO', 'celular' => '3135799075', 'email1' => 'gentilg@uninorte.edu.co', 'email2' => 'gerardogentilo@gmail.com'],
['id' => '200070796', 'nombre' => 'ANA NARANJO CORTES', 'celular' => '3135169256', 'email1' => 'manaranjo@uninorte.edu.co', 'email2' => 'ANANARANJO1997@HOTMAIL.COM'],
['id' => '200072251', 'nombre' => 'RAMIRO RANAURO ARGUMEDO', 'celular' => '3157572380', 'email1' => 'rranauro@uninorte.edu.co', 'email2' => 'rdja27@gmail.com'],
['id' => '200053672', 'nombre' => 'RAFAEL ARIZA RODRIGUEZ', 'celular' => '3017916422', 'email1' => 'rdariza@uninorte.edu.co', 'email2' => 'rafaelj_ariza@hotmail.com'],
['id' => '200062112', 'nombre' => 'MELANIE ANAYA RODRIGUEZ', 'celular' => '3004012753', 'email1' => 'melaniea@uninorte.edu.co', 'email2' => 'melaniea@uninorte.edu.co'],
['id' => '200024036', 'nombre' => 'LUIS GULFO HERNANDEZ', 'celular' => '3172618349', 'email1' => 'lfgulfo@uninorte.edu.co', 'email2' => 'luis.gulfo@hotmail.com'],
['id' => '200067804', 'nombre' => 'ANDREA MOLINARES GARCIA', 'celular' => '3128228236', 'email1' => 'damolinares@uninorte.edu.co', 'email2' => 'andrea2497@hotmail.com'],
['id' => '200080897', 'nombre' => 'JUAN GUZMAN CARDONA', 'celular' => '3015816339', 'email1' => 'jguzmanj@uninorte.edu.co', 'email2' => 'jjgc97@hotmail.com'],
['id' => '200056051', 'nombre' => 'ELMER PEREZ SARABIA', 'celular' => '3117145896', 'email1' => 'elmers@uninorte.edu.co', 'email2' => 'elmerpsarabia@hotmail.com'],
['id' => '200053852', 'nombre' => 'SEBASTIAN CONSUEGRA JIMENEZ', 'celular' => '3008755934', 'email1' => 'sebastianconsuegra@uninorte.edu.co', 'email2' => 'sebastian951810@gmail.com'],
['id' => '200031510', 'nombre' => 'IVONNE FORERO PRIETO', 'celular' => '3134291444', 'email1' => 'iprieto@uninorte.edu.co', 'email2' => 'iprieto@uninorte.edu.co'],
['id' => '200092454', 'nombre' => 'ELY IZQUIERDO HERAZO', 'celular' => '3226607453', 'email1' => 'izquierdoe@uninorte.edu.co', 'email2' => 'eji.h@hotmail.com'],
['id' => '200055216', 'nombre' => 'JAILYN VILLA COMAS', 'celular' => '3015483049', 'email1' => 'jailynv@uninorte.edu.co', 'email2' => 'jailynvilla73@gmail.com'],
['id' => '200060047', 'nombre' => 'ANDREA RODRIGUEZ CABALLERO', 'celular' => '3007648196', 'email1' => 'acaballeroc@uninorte.edu.co', 'email2' => 'andrea.rodriguez9@hotmail.com'],
['id' => '200052595', 'nombre' => 'MARYORI SANJUANELO BONEU', 'celular' => '3106476564', 'email1' => 'mboneu@uninorte.edu.co', 'email2' => 'msboneu@gmail.com'],
['id' => '200021517', 'nombre' => 'MARTHA HERRERA QUINTERO', 'celular' => '3158255545', 'email1' => 'marthaherrera@uninorte.edu.co', 'email2' => 'marthaherreraq17@gmail.com'],
['id' => '200087811', 'nombre' => 'ANGELICA ACOSTA OLIVEROS', 'celular' => '3187710160', 'email1' => 'aoliverosm@uninorte.edu.co', 'email2' => 'aoliverosm@uninorte.edu.co'],
['id' => '200069442', 'nombre' => 'TATIANA PRADA VILLEGAS', 'celular' => '3012306866', 'email1' => 'tprada@uninorte.edu.co', 'email2' => 'tatyprado14@hotmail.com'],
['id' => '200062621', 'nombre' => 'KELLY DE ARMAS CALDERON', 'celular' => '3216733153', 'email1' => 'kjdearmas@uninorte.edu.co', 'email2' => 'septiembrekj32@gmail.com'],
['id' => '200073126', 'nombre' => 'YASMIR ARROYO BITAR', 'celular' => '3043896434', 'email1' => 'ybitar@uninorte.edu.co', 'email2' => 'tomygatoo@gmail.com'],
['id' => '200053943', 'nombre' => 'ANDREA GUZMAN GALVEZ', 'celular' => '3043812292', 'email1' => 'acgalvez@uninorte.edu.co', 'email2' => 'acgalvez@uninorte.edu.co'],
['id' => '200063807', 'nombre' => 'THANA MERCADO RUEDA', 'celular' => '3014617780', 'email1' => 'thanaisabelm@uninorte.edu.co', 'email2' => 'thanaisabelm@uninorte.edu.co'],
['id' => '200063767', 'nombre' => 'KEVIN ACUÑA RECIO', 'celular' => '3006598756', 'email1' => 'krecio@uninorte.edu.co', 'email2' => 'kevin_hos23@hotmail.com'],
['id' => '200077302', 'nombre' => 'LUIS BARRETO GUERRA', 'celular' => '3117962059', 'email1' => 'lgbarreto@uninorte.edu.co', 'email2' => 'luisgbarretogue@gmail.com'],
['id' => '200053984', 'nombre' => 'GERMAN MONSALVE LUNA', 'celular' => '3046347730', 'email1' => 'gamonsalve@uninorte.edu.co', 'email2' => 'g.pardo.2705@hotmail.com'],
['id' => '200087046', 'nombre' => 'JURIS PEREZ VIANA', 'celular' => '3022611194', 'email1' => 'pjuris@uninorte.edu.co', 'email2' => 'perezisaac2010@gmail.com'],
['id' => '200056252', 'nombre' => 'CAROLINA SALCEDO QUINTERO', 'celular' => '3135333686', 'email1' => 'salcedoca@uninorte.edu.co', 'email2' => 'CSALCEDOQ@GMAIL.COM'],
['id' => '200063567', 'nombre' => 'CARLOS CANCHILA MARTINEZ', 'celular' => '3014508961', 'email1' => 'cacanchila@uninorte.edu.co', 'email2' => 'cacanchila@uninorte.edu.co'],
['id' => '200058922', 'nombre' => 'TAWNY MORENO BALOCO', 'celular' => '3012896758', 'email1' => 'tbaloco@uninorte.edu.co', 'email2' => 'TAWNYMORENOB@GMAIL.COM'],
['id' => '200063950', 'nombre' => 'MARIA MARTINEZ VEGA', 'celular' => '3007265893', 'email1' => 'martinezmp@uninorte.edu.co', 'email2' => 'MARYPAZ_317@HOTMAIL.COM'],
['id' => '200064420', 'nombre' => 'DAVID TATIS POSADA', 'celular' => '3045852937', 'email1' => 'davidtatis@uninorte.edu.co', 'email2' => 'david-tapo@hotmail.com'],
['id' => '200071165', 'nombre' => 'YASMINE CAMARGO SANCHEZ', 'celular' => '3042045263', 'email1' => 'yasminec@uninorte.edu.co', 'email2' => 'YASMINECS1R@GMAIL.COM'],
['id' => '200062900', 'nombre' => 'ALEJANDRO DUARTE VENDRIES', 'celular' => '3046763579', 'email1' => 'ayduarte@uninorte.edu.co', 'email2' => 'Alejandroduarte@hotmail.com'],
['id' => '200063274', 'nombre' => 'ALBERTO OROZCO JIMENEZ', 'celular' => '3126319506', 'email1' => 'albertojo@uninorte.edu.co', 'email2' => 'albertoj-orozco@hotmail.com'],
['id' => '200073658', 'nombre' => 'KAROLINA AVILA BELTRAN', 'celular' => '3215954627', 'email1' => 'karolinab@uninorte.edu.co', 'email2' => 'ktavila@live.com'],
['id' => '200064289', 'nombre' => 'DIANA MAURY FERNANDEZ', 'celular' => '3008325850', 'email1' => 'dcmaury@uninorte.edu.co', 'email2' => 'dmaury17@hotmail.com'],
['id' => '200053847', 'nombre' => 'NATALIA SAMPER RUIZ', 'celular' => '3184000726', 'email1' => 'samper@uninorte.edu.co', 'email2' => 'natysamper95@hotmail.com'],
['id' => '200054225', 'nombre' => 'ANDRES RINCON BLANCO', 'celular' => '3043640335', 'email1' => 'farincon@uninorte.edu.co', 'email2' => 'andresfrb-97@hotmail.com'],
['id' => '200075965', 'nombre' => 'LEANDRO PUELLO BARRIOS', 'celular' => '3046651760', 'email1' => 'leandrob@uninorte.edu.co', 'email2' => 'puelloman@gmail.com'],
['id' => '200057366', 'nombre' => 'LINA MEJIA DE LOS REYES', 'celular' => '3014358237', 'email1' => 'lrmejia@uninorte.edu.co', 'email2' => 'linamejiad@gmail.com'],
['id' => '200064350', 'nombre' => 'KEVIN FAWCETT QUINTANA', 'celular' => '3017008057', 'email1' => 'kfawcett@uninorte.edu.co', 'email2' => 'kfawcett_10@gmail.com'],
['id' => '200054038', 'nombre' => 'ANDRES TORREGROZA CASTRO', 'celular' => '3157701033', 'email1' => 'amtorregroza@uninorte.edu.co', 'email2' => 'amtorregroza@gmail.com'],
['id' => '200074674', 'nombre' => 'ANA RUEDA VECINO', 'celular' => '3045362668', 'email1' => 'vecinoc@uninorte.edu.co', 'email2' => 'anacaro9507@hotmail.com'],
['id' => '200082770', 'nombre' => 'GERMAN PARDO GOMEZ', 'celular' => '3172474453', 'email1' => 'egpardo@uninorte.edu.co', 'email2' => 'german0917@gmail.com'],
['id' => '200055156', 'nombre' => 'DIANA JARAMILLO CURVELO', 'celular' => '3005135194', 'email1' => 'curvelod@uninorte.edu.co', 'email2' => 'curvelod@uninorte.edu.co'],
['id' => '200068996', 'nombre' => 'JUAN MAYORGA CHAVEZ', 'celular' => '3126915746', 'email1' => 'jmayorga@uninorte.edu.co', 'email2' => 'js.mayorga96@gmail.com'],
['id' => '200088562', 'nombre' => 'LEIRY MAZA ZAPATEIRO', 'celular' => '3014173083', 'email1' => 'leirym@uninorte.edu.co', 'email2' => 'leirymaza@gmail.com'],
['id' => '200046590', 'nombre' => 'FERNANDO REDONDO MILIAN', 'celular' => '3175179963', 'email1' => 'fmillian@uninorte.edu.co', 'email2' => 'ferchoskl@hotmail.com'],
['id' => '200062822', 'nombre' => 'KEVEN PINILLA SILVA', 'celular' => '3152369291', 'email1' => 'kevenp@uninorte.edu.co', 'email2' => 'kevenpsilva@hotmail.com'],
['id' => '200064187', 'nombre' => 'CARLOS HOYOS PONTON', 'celular' => '3015020542', 'email1' => 'pontonc@uninorte.edu.co', 'email2' => 'tounhpoker@gmail.com'],
['id' => '200056345', 'nombre' => 'HERNANDO GUTIERREZ JARAMILLO', 'celular' => '3013115667', 'email1' => 'jhgutierrez@uninorte.edu.co', 'email2' => 'auxsalud_0971@hotmail.com']


            
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
       Schema::drop('estudiantes');
    }
}
