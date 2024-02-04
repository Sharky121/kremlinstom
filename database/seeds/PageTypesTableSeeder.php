<?php

use Illuminate\Database\Seeder;

class PageTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_types')->truncate();
        App\PageType::insert(
            array(
                array('id' => '1','title' => 'текст','layout' => 'text'),
                array('id' => '2','title' => 'Все услуги','layout' => 'services'),
                array('id' => '3','title' => 'Все врачи','layout' => 'workers'),
                array('id' => '4','title' => 'Все технологии','layout' => 'technologies'),
                array('id' => '5','title' => 'Вопросы','layout' => 'questions'),
                array('id' => '6','title' => 'Цены','layout' => 'prices'),
                array('id' => '7','title' => 'Контакты','layout' => 'contacts'),
                array('id' => '8','title' => 'Все новости','layout' => 'news'),
                array('id' => '9','title' => 'Все отзывы','layout' => 'reviews'),
                array('id' => '10','title' => 'О клинике','layout' => 'about_single'),
                array('id' => '11','title' => 'Акции и скидки','layout' => 'discount'),
                array('id' => '12','title' => 'Видео','layout' => 'video'),
                array('id' => '13','title' => 'Все фото','layout' => 'photos'),
                array('id' => '14','title' => 'Лицензии','layout' => 'license'),
                array('id' => '15','title' => 'Блог','layout' => 'blog')
            )
        );
    }
}
