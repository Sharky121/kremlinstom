<?php

use Illuminate\Database\Seeder;

class DiseasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('diseases')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('diseases')->insert(
            array(
                array('id' => '1','sort' => '0','title' => 'Кариес'),
                array('id' => '2','sort' => '0','title' => 'Пульпит'),
                array('id' => '3','sort' => '0','title' => 'Периодонтит'),
                array('id' => '4','sort' => '0','title' => 'Гингивит'),
                array('id' => '5','sort' => '0','title' => 'Пародонтит')
            )
        );
    }
}
