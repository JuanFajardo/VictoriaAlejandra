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
        
        \DB::table('horarios')->insert(array(
          'id'=>'1', 'horario'=>'Contador', 'ingreso_am'=>'08:00:00', 'salida_am'=>'08:00:00', 'ingreso_pm'=>'08:00:00', 'salida_pm'=>'08:00:00', 'salida_pm'=>'08:00:00', 'tolerancia'=>'15', 'user_id'=>'1'
        ));

        \DB::table('cargos')->insert(array(
          'id'      =>'1',
          'cargo'   =>'Empleado',
          'descripcion'=>'Empleado de la FEPP',
          'horario_id' =>'1',
          'user_id' =>'1'
        ));

        \DB::table('personas')->insert(array(
          'id'        =>'1',
          'nombres'   =>'Juan Fajardo',
          'direccion' =>'Calle La Paz 123',
          'telefono'  =>'626262',
          'carnet'    =>'1234567',
          'estado_civil'  =>'Soltero',
          'profesion' =>'Informatico',
          'genero'    =>'masculino',
          'clave'     =>'123',
          'imagen'    =>'data:image/jpeg;base64,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',
          'fecha_nacimiento'  =>'1990-01-01',
          'fecha_inscripcion' =>date('Y-m-d'),
          'cargo_id'  =>'1',
          'horario_id'=>'1',
          'stand_id'  =>'1',
          'user_id'   =>'1'
        ));

    }
}
