<?php

use Illuminate\Database\Seeder;

class ServiceTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_technology')->truncate();

        DB::table('service_technology')->insert(
            array(
                array('service_id' => '2','technology_id' => '2'),
                array('service_id' => '2','technology_id' => '1'),
                array('service_id' => '6','technology_id' => '1'),
                array('service_id' => '6','technology_id' => '2')
            )
        );
    }
}
