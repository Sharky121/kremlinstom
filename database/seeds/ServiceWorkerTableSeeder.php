<?php

use Illuminate\Database\Seeder;

class ServiceWorkerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_worker')->truncate();

        DB::table('service_worker')->insert(
            array(
                array('service_id' => '6','worker_id' => '17'),
                array('service_id' => '7','worker_id' => '21'),
                array('service_id' => '7','worker_id' => '26'),
                array('service_id' => '2','worker_id' => '9'),
                array('service_id' => '2','worker_id' => '11'),
                array('service_id' => '2','worker_id' => '12'),
                array('service_id' => '2','worker_id' => '18'),
                array('service_id' => '2','worker_id' => '21'),
                array('service_id' => '2','worker_id' => '26'),
                array('service_id' => '3','worker_id' => '9'),
                array('service_id' => '3','worker_id' => '11'),
                array('service_id' => '3','worker_id' => '12'),
                array('service_id' => '3','worker_id' => '18'),
                array('service_id' => '3','worker_id' => '21'),
                array('service_id' => '3','worker_id' => '26'),
                array('service_id' => '9','worker_id' => '9'),
                array('service_id' => '9','worker_id' => '11'),
                array('service_id' => '9','worker_id' => '12'),
                array('service_id' => '9','worker_id' => '18'),
                array('service_id' => '9','worker_id' => '21'),
                array('service_id' => '9','worker_id' => '26'),
                array('service_id' => '4','worker_id' => '24'),
                array('service_id' => '4','worker_id' => '25'),
                array('service_id' => '1','worker_id' => '9'),
                array('service_id' => '1','worker_id' => '11'),
                array('service_id' => '1','worker_id' => '12'),
                array('service_id' => '1','worker_id' => '18'),
                array('service_id' => '1','worker_id' => '21'),
                array('service_id' => '1','worker_id' => '26'),
                array('service_id' => '10','worker_id' => '19'),
                array('service_id' => '6','worker_id' => '3'),
                array('service_id' => '7','worker_id' => '3'),
                array('service_id' => '2','worker_id' => '3'),
                array('service_id' => '3','worker_id' => '3'),
                array('service_id' => '9','worker_id' => '3'),
                array('service_id' => '1','worker_id' => '3'),
                array('service_id' => '10','worker_id' => '3'),
                array('service_id' => '5','worker_id' => '24'),
                array('service_id' => '12','worker_id' => '21'),
                array('service_id' => '8','worker_id' => '11')
            )
        );
    }
}
