<?php

use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gallery')->truncate();

        DB::table('gallery')->insert(
            array(
                array('id' => '1','sort' => '0','title' => 'Галерея1','content' => NULL,'public' => '1'),
                array('id' => '2','sort' => '0','title' => 'Лицензии','content' => NULL,'public' => '1')
            )
        );
    }
}
