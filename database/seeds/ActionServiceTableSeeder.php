<?php

use Illuminate\Database\Seeder;

class ActionServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('action_service')->truncate();

        DB::table('action_service')->insert(
            []
        );
    }
}
