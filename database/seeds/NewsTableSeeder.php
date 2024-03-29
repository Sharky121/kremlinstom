<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->truncate();

        DB::table('news')->insert(
            array(
                array('id' => '4','date' => '2017-08-02','title' => 'Лечение на передовом оборудовании','content' => '<p>ORTHOPHOS SL 3D Ceph -универсальный рентгеновский аппарат.<br />
Именно он обеспечивает идеально точную и безопасную диагностику &ndash; мы получаем резкие и контрастные панорамные 2D снимки и даже 3D изображения челюсти.<br />
&nbsp;</p>
','small_content' => 'ORTHOPHOS SL 3D Ceph -универсальный рентгеновский аппарат.
Именно он обеспечивает идеально точную и безопасную диагностику ...','public' => '1'),
                array('id' => '5','date' => '2017-08-02','title' => 'Развеиваем миф, что восстановление зубов - это долго','content' => '<p>&laquo;Часто сталкиваюсь с тем, что человек объясняет свое нежелание идти к врачу на протезирование зубов отсутствием времени. Скорее всего, это просто отговорка, за которой прячется страх перед вмешательством, &mdash; рассуждает Андрей Архипенко, врач-стоматолог, имплантолог, директор &laquo;Кремлевской стоматологии&raquo; (Рязань).</p>
','small_content' => 'На РБК вышла статья нашего врача-стоматолога, имплантолога и директора клиники "Кремлёвская стоматология" Архипенко Андрея Юрьевича.','public' => '1'),
                array('id' => '6','date' => '2017-08-15','title' => 'Nobel Biocare Symposium 2017','content' => '<p>С 9 по 11 июня 2017 года в Москве прошло грандиозное событие в стоматологической отрасли! Nobel Biocare Symposium собрал лучших лекторов и практиков со всего мира! &quot;Кремлевская стоматология&quot;- единственный в Рязани и Рязанской области центр клинического мастерства по имплантации Nobel Biocare! Мы стали частью этого масштабного проекта! https://www.nobelbiocare.com/ru/ru/home/events/sympos.</p>
','small_content' => 'С 9 по 11 июня 2017 года в Москве прошло грандиозное событие в стоматологической отрасли!
Nobel Biocare Symposium собрал лучших лекторов и практиков со всего мира!','public' => '1')
            )
        );
    }
}
