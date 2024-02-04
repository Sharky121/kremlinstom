<?php

use Illuminate\Database\Seeder;

class DiseaseServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disease_service')->truncate();

        DB::table('disease_service')->insert(
            array(
                array('service_id' => '1','disease_id' => '1'),
                array('service_id' => '2','disease_id' => '5')
            )
        );
    }
}
