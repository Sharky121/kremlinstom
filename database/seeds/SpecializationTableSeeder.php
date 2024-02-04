<?php

use Illuminate\Database\Seeder;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('specializations')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('specializations')->insert(
            array(
                array('id' => '1','title' => 'Терапевт','sort' => '0'),
                array('id' => '2','title' => 'Хирург','sort' => '0'),
                array('id' => '3','title' => 'Ортопед','sort' => '0'),
                array('id' => '4','title' => 'Ортодонт','sort' => '0'),
                array('id' => '5','title' => 'Пародонтолог','sort' => '0'),
                array('id' => '6','title' => 'Имплантолог','sort' => '0'),
                array('id' => '7','title' => 'Врач - стоматолог','sort' => '0')
            )
        );
    }
}
