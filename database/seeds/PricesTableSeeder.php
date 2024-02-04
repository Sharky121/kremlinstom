<?php

use Illuminate\Database\Seeder;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('prices')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('prices')->insert(
            array(
                array('id' => '4','sort' => NULL,'title' => 'Консультация врача-терапевта','content' => NULL,'price' => 'бесплатно','price_max' => 'бесплатно','service_id' => '1'),
                array('id' => '5','sort' => NULL,'title' => 'Изготовление винира на один зуб (прямой метод)','content' => NULL,'price' => 'от 4000 руб.','price_max' => NULL,'service_id' => '3'),
                array('id' => '6','sort' => NULL,'title' => 'Реставрация зуба','content' => NULL,'price' => 'от 3500 руб.','price_max' => NULL,'service_id' => '3'),
                array('id' => '8','sort' => NULL,'title' => 'Консультация стоматолога-ортопеда','content' => NULL,'price' => 'бесплатно','price_max' => 'бесплатно','service_id' => '4'),
                array('id' => '9','sort' => NULL,'title' => 'Пластмассовая коронка','content' => NULL,'price' => 'от 800 руб.','price_max' => NULL,'service_id' => '4'),
                array('id' => '10','sort' => NULL,'title' => 'Цельнолитая коронка','content' => NULL,'price' => 'от 2800 руб.','price_max' => NULL,'service_id' => '4'),
                array('id' => '11','sort' => NULL,'title' => 'Консультация стоматолога-пародонтолога','content' => NULL,'price' => 'бесплатно','price_max' => NULL,'service_id' => '12'),
                array('id' => '12','sort' => NULL,'title' => 'Лечение с применением аппарата Vector','content' => NULL,'price' => 'от 4200 руб.','price_max' => NULL,'service_id' => '12'),
                array('id' => '13','sort' => NULL,'title' => 'Рентгеновский снимок одного зуба','content' => NULL,'price' => '190 руб.','price_max' => NULL,'service_id' => '11'),
                array('id' => '14','sort' => NULL,'title' => 'Рентгеновский снимок всех зубов(ОПТГ)','content' => NULL,'price' => '350 руб.','price_max' => NULL,'service_id' => '11'),
                array('id' => '15','sort' => NULL,'title' => 'Компьютерная томограмма','content' => NULL,'price' => '1200 руб.','price_max' => NULL,'service_id' => '11'),
                array('id' => '18','sort' => NULL,'title' => 'Профессиональная гигиена зубов','content' => NULL,'price' => 'от 18000 руб.','price_max' => NULL,'service_id' => '9'),
                array('id' => '19','sort' => NULL,'title' => 'Консультация детского стоматолога','content' => NULL,'price' => 'бесплатно','price_max' => NULL,'service_id' => '8'),
                array('id' => '21','sort' => NULL,'title' => 'Удаление молочного зуба','content' => NULL,'price' => 'от 600 руб.','price_max' => NULL,'service_id' => '8'),
                array('id' => '22','sort' => NULL,'title' => 'Лечение кариеса молочных зубов','content' => NULL,'price' => 'от 1500 руб.','price_max' => NULL,'service_id' => '8'),
                array('id' => '23','sort' => NULL,'title' => 'Отбеливание зубов ZOOM 4 (White Speed)','content' => NULL,'price' => 'от 18 000 руб.','price_max' => NULL,'service_id' => '7'),
                array('id' => '24','sort' => NULL,'title' => 'Консультация хирурга','content' => NULL,'price' => 'бесплатно','price_max' => NULL,'service_id' => '6'),
                array('id' => '26','sort' => NULL,'title' => 'Удаление молочного зуба','content' => NULL,'price' => 'от 600 руб.','price_max' => NULL,'service_id' => '6'),
                array('id' => '27','sort' => NULL,'title' => 'Удаление постоянного зуба','content' => NULL,'price' => 'от 1500 руб.','price_max' => NULL,'service_id' => '6'),
                array('id' => '28','sort' => NULL,'title' => 'Консультация стоматолога-ортодонта','content' => NULL,'price' => 'бесплатно','price_max' => NULL,'service_id' => '5'),
                array('id' => '29','sort' => NULL,'title' => 'Рентгеновский снимок всех зубов(ОПТГ)','content' => NULL,'price' => '350 руб.','price_max' => NULL,'service_id' => '5'),
                array('id' => '30','sort' => NULL,'title' => 'Компьютерная томограмма (КТ)','content' => NULL,'price' => '1200 руб.','price_max' => NULL,'service_id' => '5'),
                array('id' => '31','sort' => NULL,'title' => 'Ортодонтическое лечение(установка, корректировки, снятие)','content' => NULL,'price' => 'от 7140 руб.','price_max' => NULL,'service_id' => '5'),
                array('id' => '32','sort' => NULL,'title' => 'Консультация врача-терапевта','content' => NULL,'price' => 'бесплатно','price_max' => NULL,'service_id' => '2'),
                array('id' => '33','sort' => NULL,'title' => 'Лечение кариеса молочных зубов','content' => NULL,'price' => 'от 1500 руб.','price_max' => NULL,'service_id' => '2'),
                array('id' => '34','sort' => NULL,'title' => 'Лечение поверхностного и среднего кариеса','content' => NULL,'price' => 'от 1800 руб.','price_max' => NULL,'service_id' => '2'),
                array('id' => '35','sort' => NULL,'title' => 'Лечение глубокого кариеса','content' => NULL,'price' => 'от 2000 руб.','price_max' => NULL,'service_id' => '2'),
                array('id' => '36','sort' => NULL,'title' => 'Лечение кариеса депульпированного зуба, без лечения каналов зуба','content' => NULL,'price' => 'от 2000 руб.','price_max' => NULL,'service_id' => '2'),
                array('id' => '37','sort' => NULL,'title' => 'Лечение одноканального зуба','content' => NULL,'price' => 'от 1500 руб.','price_max' => NULL,'service_id' => '1'),
                array('id' => '38','sort' => NULL,'title' => 'Лечение двухканального зуба','content' => NULL,'price' => 'от 2500 руб.','price_max' => NULL,'service_id' => '1'),
                array('id' => '39','sort' => NULL,'title' => 'Лечение трехканального зуба','content' => NULL,'price' => 'от 3500 руб.','price_max' => NULL,'service_id' => '1'),
                array('id' => '40','sort' => NULL,'title' => 'Металлокерамическая коронка','content' => NULL,'price' => 'от 4700 руб.','price_max' => NULL,'service_id' => '4'),
                array('id' => '41','sort' => NULL,'title' => 'Безметалловая коронка на оксиде циркония (Procera)','content' => NULL,'price' => 'от 14000 руб.','price_max' => NULL,'service_id' => '4'),
                array('id' => '42','sort' => NULL,'title' => 'Керамические виниры, ламиниры, люминиры','content' => NULL,'price' => 'от 16000 руб.','price_max' => NULL,'service_id' => '4'),
                array('id' => '43','sort' => NULL,'title' => 'Лечение каналов зуба под микроскопом','content' => NULL,'price' => 'от 4200 руб.','price_max' => NULL,'service_id' => '1'),
                array('id' => '44','sort' => NULL,'title' => 'Удаление зуба мудрости','content' => NULL,'price' => 'от 2000 руб.','price_max' => NULL,'service_id' => '6'),
                array('id' => '45','sort' => NULL,'title' => 'Лечение с помощью импланта Nobel Groovy  (США, Швеция)','content' => NULL,'price' => 'от 26000 руб.','price_max' => NULL,'service_id' => '10'),
                array('id' => '46','sort' => NULL,'title' => 'Лечение с помощью импланта Nobel Replace  Conical Connection (США, Швеция)','content' => NULL,'price' => 'от 35000 руб.','price_max' => NULL,'service_id' => '10'),
                array('id' => '47','sort' => NULL,'title' => 'Лечение с помощью импланта Nobel Active  (США, Швеция)','content' => NULL,'price' => 'от 350000 руб.','price_max' => NULL,'service_id' => '10'),
                array('id' => '48','sort' => NULL,'title' => 'Лечение с помощью импланта Nobel Parallel  (США, Швеция)','content' => NULL,'price' => 'от 38000 руб.','price_max' => NULL,'service_id' => '10'),
                array('id' => '49','sort' => NULL,'title' => 'Компьютерная томограмма (КТ)','content' => NULL,'price' => '1200 руб.','price_max' => NULL,'service_id' => '11')
            )
        );
    }
}
