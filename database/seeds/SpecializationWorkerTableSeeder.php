<?php

use Illuminate\Database\Seeder;

class SpecializationWorkerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialization_worker')->truncate();

        DB::table('specialization_worker')->insert(
            array(
                array('specialization_id' => '1','worker_id' => '9'),
                array('specialization_id' => '1','worker_id' => '28'),
                array('specialization_id' => '2','worker_id' => '28'),
                array('specialization_id' => '6','worker_id' => '28'),
                array('specialization_id' => '7','worker_id' => '28'),
                array('specialization_id' => '2','worker_id' => '3'),
                array('specialization_id' => '6','worker_id' => '3'),
                array('specialization_id' => '7','worker_id' => '3')
            )
        );
    }
}
