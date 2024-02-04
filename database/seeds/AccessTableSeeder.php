<?php

use Illuminate\Database\Seeder;

class AccessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('access')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('access')->insert(
            array(
                array('user_id' => '1','menu_id' => '1','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '3','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '4','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '5','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '7','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '8','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '9','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '10','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '11','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '13','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '14','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '15','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '16','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '17','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '18','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '19','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '20','read' => '1','write' => '1','delete' => '1'),
                array('user_id' => '1','menu_id' => '21','read' => '1','write' => '1','delete' => '1')
            )
        );
    }
}
