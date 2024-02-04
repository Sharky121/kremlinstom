<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('menu')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('menu')->insert(
            array(
                array('id' => '1','title' => 'Страницы','url' => 'pages','sort' => '1','created_at' => NULL,'updated_at' => NULL),
                array('id' => '3','title' => 'Акции','url' => 'actions','sort' => '3','created_at' => NULL,'updated_at' => NULL),
                array('id' => '4','title' => 'Сотрудники','url' => 'workers','sort' => '4','created_at' => NULL,'updated_at' => NULL),
                array('id' => '5','title' => 'Новости','url' => 'news','sort' => '5','created_at' => NULL,'updated_at' => NULL),
                array('id' => '7','title' => 'Услуги','url' => 'services','sort' => '7','created_at' => NULL,'updated_at' => NULL),
                array('id' => '8','title' => 'Отзывы','url' => 'reviews','sort' => '8','created_at' => NULL,'updated_at' => NULL),
                array('id' => '9','title' => 'Банер на главной','url' => 'baners','sort' => '9','created_at' => NULL,'updated_at' => NULL),
                array('id' => '10','title' => 'Вопрос-ответ','url' => 'questions','sort' => '10','created_at' => NULL,'updated_at' => NULL),
                array('id' => '11','title' => 'Загрузка/выгрузка цен','url' => 'prices','sort' => '11','created_at' => NULL,'updated_at' => NULL),
                array('id' => '13','title' => 'Список заболеваний','url' => 'diseases','sort' => '13','created_at' => NULL,'updated_at' => NULL),
                array('id' => '14','title' => 'Галерея на главной','url' => 'gallery','sort' => '14','created_at' => NULL,'updated_at' => NULL),
                array('id' => '15','title' => 'Специализации','url' => 'specializations','sort' => '15','created_at' => NULL,'updated_at' => NULL),
                array('id' => '16','title' => 'Клиники','url' => 'clinics','sort' => '16','created_at' => NULL,'updated_at' => NULL),
                array('id' => '17','title' => 'Опыт','url' => 'experience','sort' => '17','created_at' => NULL,'updated_at' => NULL),
                array('id' => '18','title' => 'Пользователи','url' => 'users','sort' => '18','created_at' => NULL,'updated_at' => NULL),
                array('id' => '19','title' => 'Технологии','url' => 'technologies','sort' => '19','created_at' => NULL,'updated_at' => NULL),
                array('id' => '20','title' => 'Видео','url' => 'video','sort' => '20','created_at' => NULL,'updated_at' => NULL),
                array('id' => '21','title' => 'Блог','url' => 'blog','sort' => '21','created_at' => NULL,'updated_at' => NULL)
            )
        );
    }
}
