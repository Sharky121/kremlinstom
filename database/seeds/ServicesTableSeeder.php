<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('services')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('services')->insert(
            array(
                array('id' => '1','service_id' => '0','link' => 'lechenie-kariesa','title' => 'Лечение каналов зуба','public' => '1','sort' => '0','content' => '<p>Кариес - заболевание твёрдых тканей зуба &ndash; эмали и дентина, - которое проявляется изменением цвета зуба, в дальнейшем размягчением (деминерализацией) и разрушением его структуры и образованием дефекта в виде полости. Основной причиной возникновения и развития кариеса являются бактерии того самого мягкого зубного налёта, который необходимо удалять во время ежедневной чистки зубов, о чём всегда твердят врачи-стоматологи своим пациентам.</p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'url' => 'lechenie-kariesa','dop_content' => 'Все виды лечения зубов под анестезией, терапевтическая стоматология на качественном оборудовании по новейшим методикам.'),
                array('id' => '2','service_id' => '0','link' => 'implantatsiya','title' => 'Лечение кариеса','public' => '1','sort' => '0','content' => '<p>Кариес - заболевание твёрдых тканей зуба &ndash; эмали и дентина, - которое проявляется изменением цвета зуба, в дальнейшем размягчением (деминерализацией) и разрушением его структуры и образованием дефекта в виде полости. Основной причиной возникновения и развития кариеса являются бактерии того самого мягкого зубного налёта, который необходимо удалять во время ежедневной чистки зубов, о чём всегда твердят врачи-стоматологи своим пациентам.</p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'url' => 'implantatsiya','dop_content' => 'Передовые методы восстановления твёрдых тканей зуба и его функций – безболезненно и абсолютно безопасно.'),
                array('id' => '3','service_id' => '0','link' => 'usluga-3','title' => 'Реставрация','public' => '1','sort' => '0','content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'url' => 'usluga-3','dop_content' => 'Установка виниров, люминиров, композитная реставрация эмали, устранение сколов и другие способы сделать Вашу улыбку привлекательной.'),
                array('id' => '4','service_id' => '0','link' => 'usluga-4','title' => 'Протезирование','public' => '1','sort' => '0','content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'url' => 'usluga-4','dop_content' => 'Восстановление внешнего вида и функций зубов, имплантация, все виды протезирования – только качественные зарубежные материалы!'),
                array('id' => '5','service_id' => '0','link' => 'usluga-5','title' => 'Исправление прикуса','public' => '1','sort' => '0','content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'url' => 'usluga-5','dop_content' => 'Качественная ортодонтия, установка брекетов, коррекция зубного ряда и эстетика улыбки – оптимально быстро и комфортно.'),
                array('id' => '6','service_id' => '0','link' => 'usluga-6','title' => 'Удаление зубов','public' => '1','sort' => '0','content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'url' => 'usluga-6','dop_content' => 'Любые операции по удалению зубов, включая удаление зуба мудрости, максимально безболезненная хирургия.'),
                array('id' => '7','service_id' => '0','link' => 'otbelivanie','title' => 'Отбеливание','public' => '1','sort' => '0','content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'url' => 'otbelivanie','dop_content' => 'Современные технологии отбеливания Zoom – лёгкий путь к белоснежной улыбке. Эффект сохраняется на несколько лет!'),
                array('id' => '8','service_id' => '0','link' => 'detskaya-stomatologiya','title' => 'Детская стоматология','public' => '1','sort' => '0','content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'url' => 'detskaya-stomatologiya','dop_content' => 'Визит к нашему детскому стоматологу оставит у Вашего ребенка исключительно приятные впечатления!'),
                array('id' => '9','service_id' => '0','link' => 'professionalnaya-chistka','title' => 'Профессиональная чистка','public' => '1','sort' => '0','content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'url' => 'professionalnaya-chistka','dop_content' => 'Профилактическая гигиена заболеваний полости рта с помощью новейшей аппаратной техники.'),
                array('id' => '10','service_id' => '0','link' => 'implantatsiya-zubov','title' => 'Имплантация зубов','public' => '1','sort' => '0','content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'url' => 'implantatsiya-zubov','dop_content' => 'Восстановление зубного ряда, высококвалифицированная имплантация по системе Nobel Biocare – мирового лидера в области имплантов.'),
                array('id' => '11','service_id' => '0','link' => 'rentgen-diagnostika','title' => 'Рентген-диагностика','public' => '1','sort' => '0','content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'url' => 'rentgen-diagnostika','dop_content' => 'Интраоральная рентген-диагностика на радиовизиографе Heliodent Plus и 3D-диагностика на аппарате Orthophos SL 3D – залог высокого качества лечения.'),
                array('id' => '12','service_id' => '0','link' => 'parodontologiya','title' => 'Пародонтология','public' => '1','sort' => '0','content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'url' => 'parodontologiya','dop_content' => 'Лечение и профилактика болезней пародонта, лечение дёсен ультрасовременным лазером SIROLaser Advance.')
            )
        );
    }
}
