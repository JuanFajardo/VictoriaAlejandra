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
          'id'=>'1', 'horario'=>'Contador', 'ingreso_am'=>'08:00:00', 'salida_am'=>'08:00:00', 'ingreso_pm'=>'08:00:00', 'salida_pm'=>'08:00:00', 'salida_pm'=>'08:00:00', 'tolerancia'=>'00:15:00', 'user_id'=>'1'
        ));
    }
}
