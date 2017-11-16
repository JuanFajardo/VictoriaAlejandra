<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        \DB::table('users')->insert( [ 'id' => '1', 'name'=>'Federacion Empresarios Privados', 'username'=> 'admin', 'password'=> \Hash::make('123'), 'email'=> 'fepp@correo.com', 'grupo'=> 'Administrador', 'estado'=> '1' ]);

        /*
        \DB::table('horarios')->insert(array(
          'id'=>'1', 'horario'=>'Normal', 'descripcion'=>'Horario de oficina', 'ingreso_am'=>'08:00:00', 'salida_am'=>'12:00:00', 'ingreso_pm'=>'14:00:00', 'salida_pm'=>'18:00:00', 'tolerancia'=>'15', 'fijo'=>'SI', 'user_id'=>'1' ));
        \DB::table('horarios')->insert(array(
          'id'=>'2', 'horario'=>'Tarde', 'descripcion'=>'Horario solo por la tarde', 'ingreso_am'=>'00:00:00', 'salida_am'=>'00:00:00', 'ingreso_pm'=>'14:00:00', 'salida_pm'=>'18:00:00', 'tolerancia'=>'15', 'fijo'=>'SI', 'user_id'=>'1' ));
        \DB::table('horarios')->insert(array(
          'id'=>'3', 'horario'=>'Mañana', 'descripcion'=>'Horario solo por la mañana', 'ingreso_am'=>'08:00:00', 'salida_am'=>'12:00:00', 'ingreso_pm'=>'00:00:00', 'salida_pm'=>'00:00:00', 'tolerancia'=>'15', 'fijo'=>'SI', 'user_id'=>'1' ));
        \DB::table('horarios')->insert(array(
          'id'=>'4', 'horario'=>'Feria Expositorires', 'descripcion'=>'Horario para el ingreso y salidad de los expositores', 'ingreso_am'=>'00:00:00', 'salida_am'=>'00:00:00', 'ingreso_pm'=>'15:00:00', 'salida_pm'=>'23:59:59', 'tolerancia'=>'15', 'fijo'=>'NO', 'user_id'=>'1' ));
        \DB::table('horarios')->insert(array(
          'id'=>'5', 'horario'=>'Feria Fin de semana', 'descripcion'=>'Horario para el ingreso y salidad de los expositores en fin de semana', 'ingreso_am'=>'00:00:00', 'salida_am'=>'00:00:00', 'ingreso_pm'=>'12:00:00', 'salida_pm'=>'23:59:59', 'tolerancia'=>'15', 'fijo'=>'NO', 'user_id'=>'1' ));
          */
        \DB::table('horarios')->insert(array(
          'id'=>'1', 'horario'=>'FEIPOBOL', 'descripcion'=>'Horario disponible en que los visitantes pueden ingresar a la feria', 'ingreso_am'=>'00:00:00', 'salida_am'=>'00:00:00', 'ingreso_pm'=>'12:00:00', 'salida_pm'=>'23:59:59', 'tolerancia'=>'0', 'fijo'=>'NO', 'user_id'=>'1' ));
        /*
        \DB::table('preventa')->insert([
          'id'=>'1', 'nombres'=>'Guido Alberto','apellidos'=>'Lopez Meriles', 'correo'=>'adyctto@gmail.com','carnet'=>'8600518', 'fecha_nacimiento'=>'1992-06-10', 'telefono'=>'79443613','genero'=>'masculino', 'imagen'=>'', 'reserva'=>'0', 'persona_id'=>'1']);
        \DB::table('preventa')->insert([
          'id'=>'2', 'nombres'=>'Juan Alberto','apellidos'=>'Fajardo Canaza', 'correo'=>'bett0@gmail.com','carnet'=>'12345678', 'fecha_nacimiento'=>'1990-01-01', 'telefono'=>'77889944','genero'=>'masculino', 'imagen'=>'',  'reserva'=>'0', 'persona_id'=>'1']);
        */
        \DB::table('cargos')->insert(['id' =>'1', 'cargo'   =>'Empleado', 'descripcion'=>'Empleado de la FEPP', 'horario_id' =>'1', 'user_id' =>'1']);


        \DB::table('stands')->insert(array(
          'id'            =>'1',
          'nom_empresa'   =>'FEIPOBOL',
          'cant_personal' =>'10000',
          'descripcion'   =>'Feria Internacional Potosi - Bolivia',
          'encargado'     =>'Lic. Rommel',
          'direccion'     =>'Por ahis',
          'telefono'      =>'62-62653',
          'logo'          =>'data:image/png;base64,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',
          'user_id'       =>'1'
        ));


        \DB::table('stands')->insert(array(
            'id'            =>'3',
            'nom_empresa'   =>'PEDRO PUCHOS',
            'cant_personal' =>'3',
            'descripcion'   =>'MiPyMEs',
            'encargado'     =>'PEDRO COLQUE',
            'direccion'     =>'LA PAZ',
            'telefono'      =>'73889877',
            'logo'          =>'','user_id'       =>'1'
          ));

\DB::table('stands')->insert(array(
  'id'            =>'4',
  'nom_empresa'   =>'ROXANA CHULOS',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'ROXANA ARENAS',
  'direccion'     =>'LA PAZ',
  'telefono'      =>'70118595',
  'logo'          =>'','user_id'       =>'1'
));

\DB::table('stands')->insert(array(
  'id'            =>'5',
  'nom_empresa'   =>'OLIMPIKUS',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'EVA ZAPATILLOS',
  'direccion'     =>'BRASIL',
  'telefono'      =>'75626212',
  'logo'          =>'','user_id'       =>'1'
));

\DB::table('stands')->insert(array(
  'id'            =>'6',
  'nom_empresa'   =>'BELLA',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'ALEIDA MAMANI',
  'direccion'     =>'LA PAZ',
  'telefono'      =>'68301679',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'7',
  'nom_empresa'   =>'SHOW DE LA ALEGRIA',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'77470496',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'8',
  'nom_empresa'   =>'FASHION GIRL',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'76177266',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'9',
  'nom_empresa'   =>'ART ROCK NAOMI',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'10',
  'nom_empresa'   =>'CHIKITINES',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'MARIA SANDRA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'73881131',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'11',
  'nom_empresa'   =>'PSA',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'DANIEL',
  'direccion'     =>'SANTA CRUZ',
  'telefono'      =>'72885050',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'12',
  'nom_empresa'   =>'VIVE SANO',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'LA PAZ',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'13',
  'nom_empresa'   =>'PRODUCTOS TV',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CASIANO HUANCA',
  'direccion'     =>'LA PAZ',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'14',
  'nom_empresa'   =>'SPORT',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'GITTZIA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'65178700',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'15',
  'nom_empresa'   =>'UNO',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'GITTZIA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'65178700',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'16',
  'nom_empresa'   =>'CHERRYS',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'GITTZIA',
  'direccion'     =>'COCHABAMBA',
  'telefono'      =>'65178700',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'17',
  'nom_empresa'   =>'ZAPATOS ZHARLON',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'MARIA TERAN',
  'direccion'     =>'SUCRE',
  'telefono'      =>'77901391',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'18',
  'nom_empresa'   =>'TORTAS LILI',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'GITTZIA',
  'direccion'     =>'SUCRE',
  'telefono'      =>'75459449',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'19',
  'nom_empresa'   =>'HELADOS DE VINO',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'OSCAR CASTRO',
  'direccion'     =>'TARIJA',
  'telefono'      =>'3875535518',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'20',
  'nom_empresa'   =>'MULTI',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'LA PAZ',
  'telefono'      =>'76161020',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'21',
  'nom_empresa'   =>'P3C20	COLORS',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'LA PAZ',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'22',
  'nom_empresa'   =>'KARAOKE',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'GOREM',
  'direccion'     =>'COCHABAMBA',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'23',
  'nom_empresa'   =>'P3C22	F ',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'24',
  'nom_empresa'   =>'P3C23	F ',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'25',
  'nom_empresa'   =>'P3C24	F ',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'26',
  'nom_empresa'   =>'P3C25	F ',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'27',
  'nom_empresa'   =>'P3C26	F ',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'28',
  'nom_empresa'   =>'CRISMART',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'PATRICIA FLORES',
  'direccion'     =>'POTOSI',
  'telefono'      =>'72885459',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'29',
  'nom_empresa'   =>'CHOCOQUIN',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'GITTZIA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'30',
  'nom_empresa'   =>'COMENAT',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'RUBEN ARIÑEZ',
  'direccion'     =>'POTOSI',
  'telefono'      =>'79431044',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'31',
  'nom_empresa'   =>'ELIO',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'70315664',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'32',
  'nom_empresa'   =>'SERIGRAFIA',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'JOSE LUIS GUTI',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'33',
  'nom_empresa'   =>'BIJUTERIA',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'XIME',
  'direccion'     =>'POTOSI',
  'telefono'      =>'72430296',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'34',
  'nom_empresa'   =>'OLAN',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CREMAS',
  'direccion'     =>'POTOSI',
  'telefono'      =>'71778796',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'35',
  'nom_empresa'   =>'INDRA',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'INDRANAT',
  'direccion'     =>'INDIA',
  'telefono'      =>'75438631',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'36',
  'nom_empresa'   =>'LA TORRE',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'TARIJA',
  'telefono'      =>'72781580',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'37',
  'nom_empresa'   =>'MILENIUM',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'LA PAZ',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'38',
  'nom_empresa'   =>'EXPO GO',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'LA PAZ',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'39',
  'nom_empresa'   =>'NIEVES Y MELO',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARAs',
  'direccion'     =>'LA PAZ',
  'telefono'      =>'74455200',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'40',
  'nom_empresa'   =>'B&B',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'41',
  'nom_empresa'   =>'LIBRERÍA',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'42',
  'nom_empresa'   =>'P3E44	COLORS',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'43',
  'nom_empresa'   =>'CREMAS',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'COCHABAMBA',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'44',
  'nom_empresa'   =>'EPI',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'45',
  'nom_empresa'   =>'MAQUINAS',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'LA PAZ',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'46',
  'nom_empresa'   =>'NORA NOR',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'NORHA SUAREZ',
  'direccion'     =>'CBBA',
  'telefono'      =>'78112232',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'47',
  'nom_empresa'   =>'FEXPO',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'PERU',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'48',
  'nom_empresa'   =>'P3F51	VIDRIERIA',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'49',
  'nom_empresa'   =>'JOYA BELLA',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'50',
  'nom_empresa'   =>'STEFF',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'51',
  'nom_empresa'   =>'ACC',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'52',
  'nom_empresa'   =>'VIGOR',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'SERGIO FLORES',
  'direccion'     =>'POTOSI',
  'telefono'      =>'73449295',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'53',
  'nom_empresa'   =>'VINOS',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'TARIJA',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'54',
  'nom_empresa'   =>'SAN GABRIEL',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'55',
  'nom_empresa'   =>'P3G58	VIDRIERIA',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'56',
  'nom_empresa'   =>'GRANO DE ORO',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'UYUNI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'57',
  'nom_empresa'   =>'ACC',
  'cant_personal' =>'3',
  'descripcion'   =>'PRODUCTOS NATURALES',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'58',
  'nom_empresa'   =>'SEPAS',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'TARIJA',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'59',
  'nom_empresa'   =>'RENUEVATE',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'60',
  'nom_empresa'   =>'P3H63	PRODUCTOS',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'TELEVICION',
  'direccion'     =>'LA PAZ',
  'telefono'      =>'78667505',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'61',
  'nom_empresa'   =>'P3H64	PRODUCTOS',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'GITTZIA',
  'direccion'     =>'',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'62',
  'nom_empresa'   =>'P3H65	ESTEVIA',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'COCHABAMBA',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'63',
  'nom_empresa'   =>'SPA',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'GABRIELA NAVIA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'71864148',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'64',
  'nom_empresa'   =>'SISTEMAS',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'BELINDA SALAS',
  'direccion'     =>'POTOSI',
  'telefono'      =>'72417561',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'65',
  'nom_empresa'   =>'P3H68	ESTEVIA',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'COCHABAMBA',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'66',
  'nom_empresa'   =>'DERMA STETIC',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'67',
  'nom_empresa'   =>'EID',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'LA PAZ',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'68',
  'nom_empresa'   =>'WIN',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'69',
  'nom_empresa'   =>'SARAHI',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'70',
  'nom_empresa'   =>'DIAMONS',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'JOSE COPACABA',
  'direccion'     =>'BRASIL',
  'telefono'      =>'72624887',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'71',
  'nom_empresa'   =>'MONTE VERDE',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'72',
  'nom_empresa'   =>'CALZART',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'CLARA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'73',
  'nom_empresa'   =>'IMPORT FERNANDEZ',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'MIGUEL FERNANDEZ',
  'direccion'     =>'POTOSI',
  'telefono'      =>'70454769',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'74',
  'nom_empresa'   =>'GAS JAMES',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'ALEJANDRA SALAMANCA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'76164621',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'75',
  'nom_empresa'   =>'ROCK AND POP',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'MARCELA',
  'direccion'     =>'POTOSI',
  'telefono'      =>'69607122',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'76',
  'nom_empresa'   =>'CASA CORONADO',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'GONZALO',
  'direccion'     =>'SUCRE',
  'telefono'      =>'72866603',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'77',
  'nom_empresa'   =>'PAPAS',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'PABLO',
  'direccion'     =>'SUCRE',
  'telefono'      =>'',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'78',
  'nom_empresa'   =>'JUEGOS VIRTUALES',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'LIMBER',
  'direccion'     =>'POTOSI',
  'telefono'      =>'65490350',
  'logo'          =>'','user_id'       =>'1'
));
\DB::table('stands')->insert(array(
  'id'            =>'79',
  'nom_empresa'   =>'ESCUELA 6 DE JUNIO',
  'cant_personal' =>'3',
  'descripcion'   =>'MiPyMEs',
  'encargado'     =>'OMAR RIOS ',
  'direccion'     =>'POTOSI',
  'telefono'      =>'69603455',
  'logo'          =>'','user_id'       =>'1'
));


        /*
        \DB::table('personas')->insert(array(
          'id'        =>'1',
          'nombres'   =>'Juan Fajardo',
          'direccion' =>'Calle La Paz 123',
          'telefono'  =>'626262',
          'carnet'    =>'1234567',
          'estado_civil'  =>'soltero',
          'profesion' =>'Informatico',
          'genero'    =>'masculino',
          'clave'     =>'123',
          'tarjeta'   =>'0006385906',
          'encargado'     =>'NO',
          'reserva'       =>'NO',
          'imagen'    =>'data:image/jpeg;base64,/9j/4AAQSkZJRgABAgAAAQABAAD/2wBDAAUDBAQEAwUEBAQFBQUGBwwIBwcHBw8KCwkMEQ8SEhEPERATFhwXExQaFRARGCEYGhwdHx8fExciJCIeJBweHx7/2wBDAQUFBQcGBw4ICA4eFBEUHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh4eHh7/wAARCABkAGQDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD64ooooAKg1C8tdPspr2+uIra2gQvLLKwVUUdSSegqevjH9ur4rakdb/4VxpE3kWUMaS6i6H5pnPIQ/wCyBg+5+lVFXZMnYvfHD9rG4jvZdG+G0UPlRkrJqlwm7cen7tfT3P5V846x8VviPqs8st5411tjISSqXjovPoFIAFc1pekarqhIsbKe5/3FJraPw78Z+T5q+H71l/2UyatzitEVGjOSva5Y0b4q/EbR126d401uFc52m7Zx+TE16R4A/aq+JPh+8T+2riHxDZZ+eK4UJJj/AGXUcH6g15bovw98Xat5/wBm0e4UwcOJVKHPoM1DrHgXxXpNv9ovtFuo4gMlguQPyrP2l3uV7Cdr8p+j/wAHPi54V+J+kfatFuPJvIx/pFjMwE0R9cd19xXoG4V+UPwz8W3/AIH8b6b4jsXkV7SZWlRWx5kefmQ/UV+n3hfxDZ+IfD1hrenyb7W9gSaM+zDNUo82xhKTidCGFGR61RFzx1FOFxx1o5GJVTmvGq7tWjP/AExH82opPFJEuoo2f+WQHX3NFdUI+6jGTuzs6KKK4jsAnAye1flv8XdTbxR8ZPEV/PISs+pyKp9EVio/QCv1FnUtBIo6lSB+VfmN4c8Lyax8Xr7SLksn2e9meY98I54/OtItRg5PoKMXOpGK6n0N8MPDlhpvh2z8m3Rd0YJOOTXfwwxCMAL+Vebv41t9HkFjaaRqF5FANrSQQllGOw9a6Hwd8RdE1u4a0a3uradTjbNHtNeRGjOXvM+odSK91dDo3hjG4iMAnrx1rO1O2guISkkYIIxgjiuiupLWO2M7EbAMk15x4g+I2ixXRs7Oy1C8uBwVgtywH1NUqEnsL2yR4B8ffBkGhaouq2EXl29w+HRR8qt7V9P/ALGOtyaj8GLa3mkZ2sbqS3Gey8ED9a8j+IZPivwpewXFhc2dxGhljSVcEkDIIr0T9iW1ktvhNPM4wJ9QkZfoAo/pXoYKUtpbo8PNKSjJSjsz6E87Hel8/jrVEMcUu44ruPKRX1Ys9ypGD8g/maKLj5nzgHiirFZHc0UUV552FPW7t7DSLq8ijEjwxF1U9yK+N/Dvhx7X49eJNSmRAL63+1KFGApkfJH5g19n3cazWssTLuDoVI9civnHVbM2/jWe/wDK2hrZYCfQqx4/WsK0nHToz0sBThO8rapnN+MYvEkCta+H4oIdsTMjMhIZ+y8evrVHQtN1iHT7O91yOL+0nGZxHHgIc8DPevTLd4tm5hkjpWZ4hmItyxXJPQCud25LWPVjfmuMe7WXSUU5I6fWvNdcsPGI1O0k0COBIJJit1vjOY1zwRzz3r0ZAy6KGWPpyOKvaVIsturqByMN9aKa11Vxzj7rtocTFa6jdaXNHq0aGVAyK4H3h61pfs16jf6Xpln4Zkhi+y4mkVlUhgQ56+tbusLGImxwcVQ+CNhJDrNy0g3LCJNp9Nz5xW1ByVRJdTmxUIToylNbI9lDGlzUIPenBjxXrHyw5xk9qKYW96KsNTuqKKK886gry34o+FjFbXGsWkhO1t7R49etepVma5BHdWUttIMpIhUijkU9GXTxEqMk0eDabcF0Usccc1j+L70PA0VvIwlxgbOTT72UaZr11pztgxyFRWB4ie7Mn+hypHnqcZNee2ldM+mp3k011J4JtXOli38+QLt/4FW/4cvEjhEblhI3XcMHNcPE13uWEaw28dsDP0rZ0uS9hYG7mSRR0YDBqrpG1Sm4rc6XVX+0SrAp+dyAK7PwVon9j2UhkcNNMcsRXE+E5I9U8TpGWUrEpf616ipCqAOlduEgmuc8DM67j+6XzJw3vRu71W384zTt+R1rtPFLG73oqvvoq0wPRqKR3VELuyqoGSScAV5p4/8Ajh8P/CCSJcasl/dpkfZ7MiRs+hPQVxRi5bI6JSUdz0tiApJOBXk/xo+LnhTwTod+0msWcuqpC3kWaShpGfHGQOnNfLPxm/aV8aeKlmstEkOhaYxKhYGPnMv+0/8AhXz/AHVxPczPPcTSTSucs7sWZj7k1pb2b13M/wCJr0PqLU5tSn0zTfEUkrzSajapcu5PViMkU3SfEVpcAR3JxMDhlarv7Pt1b+M/hOmi3Tj7Rp7mFW7r3U/lWL4m8ImDUXs77fbTg/LKnG4eoNcGLw3LLn6M+kwOK9pBR6o62D+xyyzkR5xWV4h1+ztiI7dwXbgKDXOnwZqccGV1yYxduecVu+CPAYuLsTztJJEh+eWQ5LewrGNP2jUVudLq8i5pbDvtGpaJ4SvvGMTFJrPbJCpOA+CCQfYjivQvAnxo8E+Kbe3jGqxWN86jdb3J2Hd6Ang155+0tq8Gi/DsaRbYja8kWFUH9wcmvlMEg5Bwa9RJUIqCPnMVV+sVHNn6ZJMrqHRgykZBBzTt9fB3w++MPjLwe0cMF81/YqRm2umLLj0B6ivojwT+0F4N1xYodSkk0e7YAMs/+rz7P/jWkZpnM4HtO8etFZdjqlne2yXNpdwzwuMq8bhlP4iitLkWPmH4j/FHxrr8tza3+u3P2bzGXyY32IRn0HWvKb2QszMzEk+pre19t17NgcF2/nXPXoKrwK7JJLRHmxbk9TEvmy+Ox61TYDPFWblgWbP3s/pVU9a86tY9WmrI9Z/Zd8TPofxBTT5JStrqS+Wyk8bxyp/nX098Rb/w1HpSrrckayN/q+cOPcGvhPQ76TTNYtNQhJD28yyDHsc16z8aTrN/PH4htLmaW3ubdN6ZJCKehHoOa0o2nCzV7GvM4O6PTvDWoeGZ9Yis31xpYZWxGP4c+hPSvVJTb2lsIoAqIo+UDivj/wAL6NcaPpranqN3KjzqfLt1PfsT717Z4F8VX8vg6Ua4dt5aQl8ngsgHBOe9aUqEIK8VY0q4mdX42eMftF+JG1zx09ojk2+nr5SjPG7qx/lXmVXNbvH1DV7u9cktPMzkn3NU64qkuaTZkgoooqBmnYa/ren2/wBnsdWvbaHOdkczKufoDRWZRVc0u4rHo2tki6mIP8Z/nWNcjg0UV7E9zxKe5z9+oD/jVQ9aKK8yt8TPXp/ChtfTfguOPUfhvpK3aCQPZGJv90cCiirwnxM0lscp4BVdW8QabBfjzktVl2A99pwM+td38VFS28D6nPBGiSfZ2XcBg4IxRRXdVIjsfKlFFFeOaBRRRQAUUUUAf//Z',
          'fecha_nacimiento'  =>'1990-01-01',
          'fecha_inscripcion' =>date('Y-m-d'),
          'horario_id'=>'1',
          'stand_id'  =>'1',
          'user_id'   =>'1'
        ));*/

        /*
        \DB::table('repetitivos')->insert( [ 'id' => '1', 'fecha' => '2017-07-18', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '2', 'fecha' => '2017-07-11', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '3', 'fecha' => '2017-07-28', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '4', 'fecha' => '2017-07-13', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '5', 'fecha' => '2017-07-29', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '6', 'fecha' => '2017-07-29', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '7', 'fecha' => '2017-07-30', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '8', 'fecha' => '2017-07-30', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '9', 'fecha' => '2017-07-6', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '10', 'fecha' => '2017-07-23', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '11', 'fecha' => '2017-07-2', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '12', 'fecha' => '2017-07-6', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '13', 'fecha' => '2017-07-14', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '14', 'fecha' => '2017-07-1', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '15', 'fecha' => '2017-07-1', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '16', 'fecha' => '2017-07-3', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '17', 'fecha' => '2017-07-12', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '18', 'fecha' => '2017-07-17', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '19', 'fecha' => '2017-07-10', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '20', 'fecha' => '2017-07-6', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '21', 'fecha' => '2017-07-4', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '22', 'fecha' => '2017-07-19', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '23', 'fecha' => '2017-07-25', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '24', 'fecha' => '2017-07-16', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '25', 'fecha' => '2017-07-11', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '26', 'fecha' => '2017-07-30', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '27', 'fecha' => '2017-07-29', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '28', 'fecha' => '2017-07-19', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '29', 'fecha' => '2017-07-7', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '30', 'fecha' => '2017-07-29', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '31', 'fecha' => '2017-07-18', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '32', 'fecha' => '2017-07-17', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '33', 'fecha' => '2017-07-12', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '34', 'fecha' => '2017-07-10', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '35', 'fecha' => '2017-07-6', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '36', 'fecha' => '2017-07-24', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '37', 'fecha' => '2017-07-1', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '38', 'fecha' => '2017-07-10', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '39', 'fecha' => '2017-07-19', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '40', 'fecha' => '2017-07-13', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '41', 'fecha' => '2017-07-22', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '42', 'fecha' => '2017-07-24', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '43', 'fecha' => '2017-07-9', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '44', 'fecha' => '2017-07-28', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '45', 'fecha' => '2017-07-22', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '46', 'fecha' => '2017-07-30', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '47', 'fecha' => '2017-07-4', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '48', 'fecha' => '2017-07-11', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '49', 'fecha' => '2017-07-19', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '50', 'fecha' => '2017-07-21', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '51', 'fecha' => '2017-07-16', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '52', 'fecha' => '2017-07-8', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '53', 'fecha' => '2017-07-19', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '54', 'fecha' => '2017-07-5', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '55', 'fecha' => '2017-07-12', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '56', 'fecha' => '2017-07-19', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '57', 'fecha' => '2017-07-10', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '58', 'fecha' => '2017-07-7', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '59', 'fecha' => '2017-07-4', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '60', 'fecha' => '2017-07-2', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '61', 'fecha' => '2017-07-28', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '62', 'fecha' => '2017-07-4', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '63', 'fecha' => '2017-07-20', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '64', 'fecha' => '2017-07-15', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '65', 'fecha' => '2017-07-3', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '66', 'fecha' => '2017-07-20', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '67', 'fecha' => '2017-07-11', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '68', 'fecha' => '2017-07-17', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '69', 'fecha' => '2017-07-28', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '70', 'fecha' => '2017-07-3', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '71', 'fecha' => '2017-07-4', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '72', 'fecha' => '2017-07-6', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '73', 'fecha' => '2017-07-5', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '74', 'fecha' => '2017-07-7', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '75', 'fecha' => '2017-07-13', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '76', 'fecha' => '2017-07-1', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '77', 'fecha' => '2017-07-26', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '78', 'fecha' => '2017-07-10', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '79', 'fecha' => '2017-07-4', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '80', 'fecha' => '2017-07-30', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '81', 'fecha' => '2017-07-23', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '82', 'fecha' => '2017-07-6', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '83', 'fecha' => '2017-07-19', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '84', 'fecha' => '2017-07-21', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '85', 'fecha' => '2017-07-30', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '86', 'fecha' => '2017-07-3', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '87', 'fecha' => '2017-07-26', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '88', 'fecha' => '2017-07-4', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '89', 'fecha' => '2017-07-6', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '90', 'fecha' => '2017-07-25', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '91', 'fecha' => '2017-07-6', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '92', 'fecha' => '2017-07-25', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '93', 'fecha' => '2017-07-16', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '94', 'fecha' => '2017-07-19', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '95', 'fecha' => '2017-07-17', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '96', 'fecha' => '2017-07-25', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '97', 'fecha' => '2017-07-20', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '98', 'fecha' => '2017-07-10', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '99', 'fecha' => '2017-07-11', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '100', 'fecha' => '2017-07-20', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '101', 'fecha' => '2017-07-23', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '102', 'fecha' => '2017-07-6', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '103', 'fecha' => '2017-07-16', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '104', 'fecha' => '2017-07-12', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '105', 'fecha' => '2017-07-13', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '106', 'fecha' => '2017-07-30', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '107', 'fecha' => '2017-07-13', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '108', 'fecha' => '2017-07-15', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '109', 'fecha' => '2017-07-27', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '110', 'fecha' => '2017-07-1', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '111', 'fecha' => '2017-07-30', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '112', 'fecha' => '2017-07-1', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '113', 'fecha' => '2017-07-23', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '114', 'fecha' => '2017-07-3', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '115', 'fecha' => '2017-07-18', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '116', 'fecha' => '2017-07-15', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '117', 'fecha' => '2017-07-7', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '118', 'fecha' => '2017-07-12', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '119', 'fecha' => '2017-07-5', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '120', 'fecha' => '2017-07-30', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '121', 'fecha' => '2017-07-27', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '122', 'fecha' => '2017-07-24', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '123', 'fecha' => '2017-07-4', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '124', 'fecha' => '2017-07-30', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '125', 'fecha' => '2017-07-30', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '126', 'fecha' => '2017-07-16', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '127', 'fecha' => '2017-07-11', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '128', 'fecha' => '2017-07-16', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '129', 'fecha' => '2017-07-3', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '130', 'fecha' => '2017-07-13', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '131', 'fecha' => '2017-07-9', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '132', 'fecha' => '2017-07-5', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '133', 'fecha' => '2017-07-13', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '134', 'fecha' => '2017-07-21', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '135', 'fecha' => '2017-07-24', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '136', 'fecha' => '2017-07-28', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '137', 'fecha' => '2017-07-18', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '138', 'fecha' => '2017-07-5', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '139', 'fecha' => '2017-07-9', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '140', 'fecha' => '2017-07-10', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '141', 'fecha' => '2017-07-24', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '142', 'fecha' => '2017-07-4', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '143', 'fecha' => '2017-07-21', 'hora' => '18:24:18', 'categoria' => 'niños', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '144', 'fecha' => '2017-07-12', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'F', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '145', 'fecha' => '2017-07-20', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '146', 'fecha' => '2017-07-10', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '147', 'fecha' => '2017-07-13', 'hora' => '18:24:18', 'categoria' => 'mayor', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '148', 'fecha' => '2017-07-21', 'hora' => '18:24:18', 'categoria' => 'hombres', 'sexo' => 'M', 'marcado' => 'ingreso', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('repetitivos')->insert( [ 'id' => '149', 'fecha' => '2017-07-10', 'hora' => '18:24:18', 'categoria' => 'mujeres', 'sexo' => 'F', 'marcado' => 'salida', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);


        \DB::table('registros')->insert( [ 'id' => '1', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '2', 'persona_id' => '2', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '2', 'fecha' => '2017-07-4', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '0', 'persona_id' => '1', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '3', 'fecha' => '2017-07-22', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '5', 'persona_id' => '4', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '4', 'fecha' => '2017-07-14', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '1', 'persona_id' => '4', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '5', 'fecha' => '2017-07-9', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '1', 'persona_id' => '2', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '6', 'fecha' => '2017-07-10', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '4', 'persona_id' => '4', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '7', 'fecha' => '2017-07-29', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '8', 'persona_id' => '2', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '8', 'fecha' => '2017-07-8', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '4', 'persona_id' => '4', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '9', 'fecha' => '2017-07-2', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '7', 'persona_id' => '3', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '10', 'fecha' => '2017-07-10', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '10', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '11', 'fecha' => '2017-07-11', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '4', 'persona_id' => '4', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '12', 'fecha' => '2017-07-2', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '5', 'persona_id' => '1', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '13', 'fecha' => '2017-07-4', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '1', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '14', 'fecha' => '2017-07-13', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '10', 'persona_id' => '1', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '15', 'fecha' => '2017-07-5', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '6', 'persona_id' => '3', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '16', 'fecha' => '2017-07-1', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '8', 'persona_id' => '3', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '17', 'fecha' => '2017-07-21', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '9', 'persona_id' => '2', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '18', 'fecha' => '2017-07-26', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '8', 'persona_id' => '1', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '19', 'fecha' => '2017-07-18', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '6', 'persona_id' => '4', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '20', 'fecha' => '2017-07-15', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '4', 'persona_id' => '4', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '21', 'fecha' => '2017-07-2', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '10', 'persona_id' => '2', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '22', 'fecha' => '2017-07-27', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '6', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '23', 'fecha' => '2017-07-28', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '6', 'persona_id' => '4', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '24', 'fecha' => '2017-07-19', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '7', 'persona_id' => '3', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '25', 'fecha' => '2017-07-13', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '7', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '26', 'fecha' => '2017-07-23', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '6', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '27', 'fecha' => '2017-07-12', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '10', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '28', 'fecha' => '2017-07-23', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '8', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '29', 'fecha' => '2017-07-3', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '4', 'persona_id' => '2', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '30', 'fecha' => '2017-07-21', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '1', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '31', 'fecha' => '2017-07-9', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '9', 'persona_id' => '4', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '32', 'fecha' => '2017-07-3', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '10', 'persona_id' => '4', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '33', 'fecha' => '2017-07-8', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '3', 'persona_id' => '2', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '34', 'fecha' => '2017-07-30', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '3', 'persona_id' => '4', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '35', 'fecha' => '2017-07-24', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '6', 'persona_id' => '3', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '36', 'fecha' => '2017-07-27', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '6', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '37', 'fecha' => '2017-07-6', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '7', 'persona_id' => '1', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '38', 'fecha' => '2017-07-26', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '6', 'persona_id' => '1', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '39', 'fecha' => '2017-07-7', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '3', 'persona_id' => '4', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '40', 'fecha' => '2017-07-12', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '8', 'persona_id' => '2', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '41', 'fecha' => '2017-07-6', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '7', 'persona_id' => '2', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '42', 'fecha' => '2017-07-17', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '1', 'persona_id' => '4', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '43', 'fecha' => '2017-07-25', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '3', 'persona_id' => '2', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '44', 'fecha' => '2017-07-26', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '9', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '45', 'fecha' => '2017-07-13', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '6', 'persona_id' => '2', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '46', 'fecha' => '2017-07-10', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '0', 'persona_id' => '2', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '47', 'fecha' => '2017-07-24', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '10', 'persona_id' => '1', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '48', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '0', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '49', 'fecha' => '2017-07-6', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '7', 'persona_id' => '1', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '50', 'fecha' => '2017-07-14', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '8', 'persona_id' => '3', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '51', 'fecha' => '2017-07-13', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '4', 'persona_id' => '1', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '52', 'fecha' => '2017-07-20', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '7', 'persona_id' => '2', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '53', 'fecha' => '2017-07-22', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '2', 'persona_id' => '4', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '54', 'fecha' => '2017-07-6', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '5', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '55', 'fecha' => '2017-07-28', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '9', 'persona_id' => '1', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '56', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '9', 'persona_id' => '4', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '57', 'fecha' => '2017-07-9', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '4', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '58', 'fecha' => '2017-07-22', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '5', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '59', 'fecha' => '2017-07-18', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '7', 'persona_id' => '4', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '60', 'fecha' => '2017-07-10', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '9', 'persona_id' => '1', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '61', 'fecha' => '2017-07-4', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '6', 'persona_id' => '4', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '62', 'fecha' => '2017-07-11', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '10', 'persona_id' => '4', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '63', 'fecha' => '2017-07-20', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '10', 'persona_id' => '1', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '64', 'fecha' => '2017-07-11', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '0', 'persona_id' => '4', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '65', 'fecha' => '2017-07-15', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '10', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '66', 'fecha' => '2017-07-10', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '1', 'persona_id' => '2', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '67', 'fecha' => '2017-07-12', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '1', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '68', 'fecha' => '2017-07-25', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '6', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '69', 'fecha' => '2017-07-19', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '7', 'persona_id' => '2', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '70', 'fecha' => '2017-07-27', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '3', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '71', 'fecha' => '2017-07-30', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '3', 'persona_id' => '4', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '72', 'fecha' => '2017-07-1', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '8', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '73', 'fecha' => '2017-07-24', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '1', 'persona_id' => '3', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '74', 'fecha' => '2017-07-8', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '8', 'persona_id' => '2', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '75', 'fecha' => '2017-07-23', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '8', 'persona_id' => '2', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '76', 'fecha' => '2017-07-5', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '8', 'persona_id' => '1', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '77', 'fecha' => '2017-07-7', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '5', 'persona_id' => '2', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '78', 'fecha' => '2017-07-23', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '7', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '79', 'fecha' => '2017-07-28', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '9', 'persona_id' => '4', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '80', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '9', 'persona_id' => '3', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '81', 'fecha' => '2017-07-6', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '0', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '82', 'fecha' => '2017-07-17', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '3', 'persona_id' => '4', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '83', 'fecha' => '2017-07-22', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '7', 'persona_id' => '4', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '84', 'fecha' => '2017-07-11', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '4', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '85', 'fecha' => '2017-07-27', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '0', 'persona_id' => '4', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '86', 'fecha' => '2017-07-29', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '10', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '87', 'fecha' => '2017-07-14', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '6', 'persona_id' => '4', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '88', 'fecha' => '2017-07-27', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '5', 'persona_id' => '2', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '89', 'fecha' => '2017-07-20', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '7', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '90', 'fecha' => '2017-07-6', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '9', 'persona_id' => '1', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '91', 'fecha' => '2017-07-9', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '9', 'persona_id' => '3', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '92', 'fecha' => '2017-07-12', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '5', 'persona_id' => '1', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '93', 'fecha' => '2017-07-21', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '2', 'persona_id' => '4', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '94', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '3', 'persona_id' => '2', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '95', 'fecha' => '2017-07-17', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '6', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '96', 'fecha' => '2017-07-3', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '6', 'persona_id' => '2', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '97', 'fecha' => '2017-07-7', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '0', 'persona_id' => '3', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '98', 'fecha' => '2017-07-5', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '4', 'persona_id' => '2', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '99', 'fecha' => '2017-07-14', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '2', 'persona_id' => '1', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '100', 'fecha' => '2017-07-8', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '0', 'persona_id' => '4', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '101', 'fecha' => '2017-07-17', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '2', 'persona_id' => '2', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '102', 'fecha' => '2017-07-13', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '5', 'persona_id' => '2', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '103', 'fecha' => '2017-07-8', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '9', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '104', 'fecha' => '2017-07-5', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '1', 'persona_id' => '2', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '105', 'fecha' => '2017-07-27', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '1', 'persona_id' => '2', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '106', 'fecha' => '2017-07-15', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '9', 'persona_id' => '1', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '107', 'fecha' => '2017-07-7', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '8', 'persona_id' => '4', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '108', 'fecha' => '2017-07-30', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '1', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '109', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '10', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '110', 'fecha' => '2017-07-20', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '8', 'persona_id' => '2', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '111', 'fecha' => '2017-07-17', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '2', 'persona_id' => '2', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '112', 'fecha' => '2017-07-1', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '2', 'persona_id' => '4', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '113', 'fecha' => '2017-07-20', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '9', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '114', 'fecha' => '2017-07-5', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '3', 'persona_id' => '3', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '115', 'fecha' => '2017-07-17', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '5', 'persona_id' => '2', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '116', 'fecha' => '2017-07-17', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '7', 'persona_id' => '1', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '117', 'fecha' => '2017-07-18', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '3', 'persona_id' => '2', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '118', 'fecha' => '2017-07-8', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '10', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '119', 'fecha' => '2017-07-14', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '9', 'persona_id' => '1', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '120', 'fecha' => '2017-07-23', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '7', 'persona_id' => '2', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '121', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '4', 'persona_id' => '3', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '122', 'fecha' => '2017-07-5', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '8', 'persona_id' => '4', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '123', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '5', 'persona_id' => '4', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '124', 'fecha' => '2017-07-29', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '6', 'persona_id' => '3', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '125', 'fecha' => '2017-07-22', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '4', 'persona_id' => '2', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '126', 'fecha' => '2017-07-5', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '1', 'persona_id' => '2', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '127', 'fecha' => '2017-07-29', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '8', 'persona_id' => '4', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '128', 'fecha' => '2017-07-11', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '7', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '129', 'fecha' => '2017-07-14', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '7', 'persona_id' => '4', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '130', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '2', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '131', 'fecha' => '2017-07-2', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '8', 'persona_id' => '2', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '132', 'fecha' => '2017-07-6', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '0', 'persona_id' => '2', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '133', 'fecha' => '2017-07-30', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '3', 'persona_id' => '3', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '134', 'fecha' => '2017-07-14', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '2', 'persona_id' => '2', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '135', 'fecha' => '2017-07-1', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '9', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '136', 'fecha' => '2017-07-23', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '1', 'persona_id' => '2', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '137', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '6', 'persona_id' => '3', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '138', 'fecha' => '2017-07-7', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '6', 'persona_id' => '2', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '139', 'fecha' => '2017-07-6', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '2', 'persona_id' => '4', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '140', 'fecha' => '2017-07-9', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '10', 'persona_id' => '1', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '141', 'fecha' => '2017-07-10', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '9', 'persona_id' => '2', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '142', 'fecha' => '2017-07-2', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '3', 'persona_id' => '1', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '143', 'fecha' => '2017-07-22', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '1', 'persona_id' => '1', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '144', 'fecha' => '2017-07-1', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '0', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '145', 'fecha' => '2017-07-20', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '2', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '146', 'fecha' => '2017-07-8', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '9', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '147', 'fecha' => '2017-07-27', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '9', 'persona_id' => '1', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '148', 'fecha' => '2017-07-7', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '4', 'persona_id' => '2', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '149', 'fecha' => '2017-07-23', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '1', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '150', 'fecha' => '2017-07-1', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '4', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '151', 'fecha' => '2017-07-30', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '7', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '152', 'fecha' => '2017-07-5', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '4', 'persona_id' => '4', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '153', 'fecha' => '2017-07-27', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '7', 'persona_id' => '3', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '154', 'fecha' => '2017-07-19', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '2', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '155', 'fecha' => '2017-07-7', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '8', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '156', 'fecha' => '2017-07-1', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '2', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '157', 'fecha' => '2017-07-9', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '1', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '158', 'fecha' => '2017-07-10', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '4', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '159', 'fecha' => '2017-07-26', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '4', 'persona_id' => '2', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '160', 'fecha' => '2017-07-3', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '2', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '161', 'fecha' => '2017-07-6', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '8', 'persona_id' => '3', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '162', 'fecha' => '2017-07-11', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '5', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '163', 'fecha' => '2017-07-4', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '9', 'persona_id' => '4', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '164', 'fecha' => '2017-07-20', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '6', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '165', 'fecha' => '2017-07-27', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '8', 'persona_id' => '2', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '166', 'fecha' => '2017-07-30', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '5', 'persona_id' => '3', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '167', 'fecha' => '2017-07-9', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '3', 'persona_id' => '1', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '168', 'fecha' => '2017-07-27', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '5', 'persona_id' => '3', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '169', 'fecha' => '2017-07-19', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '6', 'persona_id' => '2', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '170', 'fecha' => '2017-07-13', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '7', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '171', 'fecha' => '2017-07-19', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '1', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '172', 'fecha' => '2017-07-4', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '3', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '173', 'fecha' => '2017-07-19', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '2', 'persona_id' => '4', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '174', 'fecha' => '2017-07-29', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '4', 'persona_id' => '2', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '175', 'fecha' => '2017-07-11', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '5', 'persona_id' => '3', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '176', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '3', 'persona_id' => '3', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '177', 'fecha' => '2017-07-4', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '1', 'persona_id' => '2', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '178', 'fecha' => '2017-07-26', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '9', 'persona_id' => '2', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '179', 'fecha' => '2017-07-22', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '7', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '180', 'fecha' => '2017-07-13', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '6', 'persona_id' => '4', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '181', 'fecha' => '2017-07-13', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '4', 'persona_id' => '1', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '182', 'fecha' => '2017-07-10', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '4', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '183', 'fecha' => '2017-07-30', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '9', 'persona_id' => '1', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '184', 'fecha' => '2017-07-1', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '6', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '185', 'fecha' => '2017-07-22', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '4', 'persona_id' => '1', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '186', 'fecha' => '2017-07-18', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '0', 'persona_id' => '2', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '187', 'fecha' => '2017-07-13', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '4', 'persona_id' => '4', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '188', 'fecha' => '2017-07-18', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '3', 'persona_id' => '1', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '189', 'fecha' => '2017-07-10', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '2', 'persona_id' => '3', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '190', 'fecha' => '2017-07-30', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '3', 'persona_id' => '3', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '191', 'fecha' => '2017-07-7', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '5', 'persona_id' => '3', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '192', 'fecha' => '2017-07-11', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '3', 'persona_id' => '3', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '193', 'fecha' => '2017-07-13', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '3', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '194', 'fecha' => '2017-07-21', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '2', 'persona_id' => '1', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '195', 'fecha' => '2017-07-21', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '4', 'persona_id' => '4', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '196', 'fecha' => '2017-07-18', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '6', 'persona_id' => '3', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '197', 'fecha' => '2017-07-10', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '9', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '198', 'fecha' => '2017-07-1', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '1', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '199', 'fecha' => '2017-07-2', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '3', 'persona_id' => '1', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '200', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '5', 'persona_id' => '2', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '201', 'fecha' => '2017-07-7', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '0', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '202', 'fecha' => '2017-07-5', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '3', 'persona_id' => '2', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '203', 'fecha' => '2017-07-18', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '6', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '204', 'fecha' => '2017-07-13', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '2', 'persona_id' => '1', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '205', 'fecha' => '2017-07-13', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '1', 'persona_id' => '1', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '206', 'fecha' => '2017-07-12', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '0', 'persona_id' => '1', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '207', 'fecha' => '2017-07-15', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '4', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '208', 'fecha' => '2017-07-17', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '1', 'persona_id' => '2', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '209', 'fecha' => '2017-07-4', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '5', 'persona_id' => '3', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '210', 'fecha' => '2017-07-29', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '4', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '211', 'fecha' => '2017-07-2', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '0', 'persona_id' => '2', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '212', 'fecha' => '2017-07-4', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '4', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '213', 'fecha' => '2017-07-18', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '2', 'persona_id' => '1', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '214', 'fecha' => '2017-07-3', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '9', 'persona_id' => '1', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '215', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '7', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '216', 'fecha' => '2017-07-12', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '2', 'persona_id' => '3', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '217', 'fecha' => '2017-07-3', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '6', 'persona_id' => '1', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '218', 'fecha' => '2017-07-3', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '5', 'persona_id' => '2', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '219', 'fecha' => '2017-07-4', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '6', 'persona_id' => '2', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '220', 'fecha' => '2017-07-20', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '10', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '221', 'fecha' => '2017-07-27', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '10', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '222', 'fecha' => '2017-07-5', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '6', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '223', 'fecha' => '2017-07-4', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '1', 'persona_id' => '2', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '224', 'fecha' => '2017-07-3', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '9', 'persona_id' => '1', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '225', 'fecha' => '2017-07-6', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '4', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '226', 'fecha' => '2017-07-17', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '5', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '227', 'fecha' => '2017-07-24', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '5', 'persona_id' => '3', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '228', 'fecha' => '2017-07-1', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '0', 'persona_id' => '2', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '229', 'fecha' => '2017-07-8', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '4', 'persona_id' => '2', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '230', 'fecha' => '2017-07-17', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '4', 'persona_id' => '4', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '231', 'fecha' => '2017-07-10', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '10', 'retraso_pm' => '9', 'persona_id' => '3', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '232', 'fecha' => '2017-07-20', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '9', 'persona_id' => '3', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '233', 'fecha' => '2017-07-11', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '0', 'persona_id' => '2', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '234', 'fecha' => '2017-07-11', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '5', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '235', 'fecha' => '2017-07-2', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '5', 'persona_id' => '3', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '236', 'fecha' => '2017-07-8', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '4', 'retraso_pm' => '6', 'persona_id' => '1', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '237', 'fecha' => '2017-07-22', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '6', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '238', 'fecha' => '2017-07-9', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '1', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '239', 'fecha' => '2017-07-5', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '1', 'retraso_pm' => '8', 'persona_id' => '4', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '240', 'fecha' => '2017-07-2', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '6', 'retraso_pm' => '4', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '241', 'fecha' => '2017-07-18', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '3', 'persona_id' => '1', 'horario_id' => '4', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '242', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '2', 'retraso_pm' => '5', 'persona_id' => '1', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '243', 'fecha' => '2017-07-27', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '0', 'retraso_pm' => '9', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '244', 'fecha' => '2017-07-9', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '6', 'persona_id' => '3', 'horario_id' => '2', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '245', 'fecha' => '2017-07-8', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '9', 'retraso_pm' => '5', 'persona_id' => '3', 'horario_id' => '1', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '246', 'fecha' => '2017-07-12', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '8', 'retraso_pm' => '8', 'persona_id' => '2', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '247', 'fecha' => '2017-07-16', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '5', 'retraso_pm' => '10', 'persona_id' => '1', 'horario_id' => '3', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '248', 'fecha' => '2017-07-9', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '3', 'retraso_pm' => '4', 'persona_id' => '3', 'horario_id' => '5', 'user_id' => '1' ]);
        \DB::table('registros')->insert( [ 'id' => '249', 'fecha' => '2017-07-29', 'ingreso_am' => '05:00:45', 'salida_am' => '05:00:45', 'ingreso_pm' => '05:00:45', 'salida_pm' => '05:00:45', 'justificacion' => 'Nada', 'retraso_am' => '7', 'retraso_pm' => '3', 'persona_id' => '3', 'horario_id' => '3', 'user_id' => '1' ]);
      */

    }
}
