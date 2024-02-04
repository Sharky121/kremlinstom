<?php

use Illuminate\Database\Seeder;

class BanerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('baners')->truncate();

        DB::table('baners')->insert(
            array(
                array('id' => '1','sort' => '0','title' => 'Добро пожаловать в кремлевскую стоматологию','link' => '/about/o-klinike','public' => '1','type' => '1','content' => '<p>В &laquo;Кремлёвской стоматологии&raquo; Вы можете получить полноценную диагностику и все виды стоматологического лечения.</p>
'),
                array('id' => '2','sort' => '0','title' => 'Центр клинического мастерства Nobel Biocare','link' => '','public' => '1','type' => '1','content' => '<p>Зубные имплантаты Nobel по праву считаются самыми качественными и популярными на сегодняшний день.</p>
'),
                array('id' => '3','sort' => '0','title' => 'Дентальный микроскоп Carl Zeiss','link' => '/about/ispolzuemye-tekhnologii/lechenie-zubov-pod-mikroskopom','public' => '1','type' => '1','content' => '<p>Операционный микроскоп Carl Zeiss OPMI Pico с 30-кратным ступенчатым увеличением и бестеневым освещением позволяет увидеть неразличимые невооруженным глазом детали и тонкие структуры;</p>
'),
                array('id' => '4','sort' => '0','title' => 'ОПТГ, ТРГ и КТ (3D снимки) зубов','link' => '/about/ispolzuemye-tekhnologii/tekhnologiya-2','public' => '1','type' => '1','content' => '<p>Совершенные рентгенодиагностические решения для любой первоклассной клиники &ndash; 3D-рентгеновские аппараты ORTHOPHOS SL 3D Ceph и GALILEOS, система HELIODENTPLUS.</p>
'),
                array('id' => '5','sort' => '0','title' => 'Скоро открытие новой клиники','link' => '','public' => '1','type' => '1','content' => '<p>Совсем скоро все желающие смогут посетить нашу новую клинику на улице Садовая, дом 36 напротив Городского парка.</p>
')
            )
        );
    }
}
