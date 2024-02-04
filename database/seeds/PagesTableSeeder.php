<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->truncate();

        DB::table('pages')->insert(
            array(
                array('id' => '1','page_id' => '0','type_id' => '1','created_at' => '2017-04-12 10:01:36','updated_at' => '2017-08-10 12:27:25','link' => 'about','title' => 'Клиника','bottom' => '0','sort' => '1','content' => '','small_content' => '','seo_content' => '','seo_description' => '','seo_keywords' => '','seo_title' => '','not_delete' => '1','url' => 'about','public' => '1','top_menu' => '1'),
                array('id' => '2','page_id' => '1','type_id' => '10','created_at' => '2017-06-05 09:59:42','updated_at' => '2017-08-31 09:53:04','link' => 'o-klinike','title' => 'О клинике','bottom' => '0','sort' => '1','content' => '<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<h3>История создания</h3>
</div>
</div>

<div class="row" style="margin-bottom: 20px">
<div class="col-sm-12">
<p>Кремлевская стоматология основана ведущим стоматологом города Рязани Архипенко Андреем Юрьевичем в 2007 году.</p>
</div>

<div class="col-sm-12">
<p>Названию бренда способствовало расположение первой клиники в самом центре города Рязань на площади Соборной дом 9 напротив главной достопримечательности Рязанской области музея- заповедника Рязанский Кремль.</p>
</div>

<div class="col-sm-12">
<p>В 2017 году для посетителей в городе Рязани открывается еще одна ультрасовременная и ультракомфортная клиника на улице Садовой дом 36.</p>
</div>
</div>

<div class="row">
<div class="col-md-12">
<h3>Миссия кремлевской стоматологии</h3>
</div>
</div>

<div class="row" style="margin-bottom: 20px">
<div class="col-sm-12">
<p>Предоставление стоматологических услуг самого высокого качества с максимальным комфортом и по разумным ценам.</p>
</div>
</div>

<div class="row">
<div class="col-md-12">
<h3>Наша цель</h3>
</div>
</div>

<div class="row" style="margin-bottom: 20px">
<div class="col-sm-12">
<p>Превосходить ожидания посетителей только в лучшую сторону</p>
</div>
</div>

<div class="row" style="margin-bottom: 20px">
<div class="col-xs-12">
<div class="quote">
<hr />
<blockquote>Мы - стоматология для всей семьи: здесь каждый пациент, маленький и взрослый, получит профессиональное лечение, деликатное отношение и индивидуальный подход.</blockquote>

<hr /></div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<h3>Наши награды</h3>
</div>
</div>

<div class="row">
<div class="col-xs-12 col-md-3" style="float: none; display: inline-block;margin-right: -10px;margin-bottom: 5px;"><a data-rel="lightcase" href="/img/1s.jpg"><img alt="" src="/upload/images/1s%281%29.jpg" style="max-width: 100%;" /></a></div>

<div class="col-xs-12 col-md-3" style="float: none; display: inline-block;margin-right: -10px;margin-bottom: 5px;"><a data-rel="lightcase" href="/img/2s.jpg"><img alt="" src="/upload/images/2s.jpg" style="max-width: 100%;" /></a></div>

<div class="col-xs-12 col-md-3" style="float: none; display: inline-block;margin-right: -10px;margin-bottom: 5px;"><a data-rel="lightcase" href="/img/3s.jpg"><img alt="" src="/upload/images/3s.jpg" style="max-width: 100%;" /></a></div>

<div class="col-xs-12 col-md-3" style="float: none; display: inline-block;margin-right: -10px;margin-bottom: 5px;"><a data-rel="lightcase" href="/img/4s.jpg"><img alt="" src="/upload/images/4s.jpg" style="max-width: 100%;" /></a></div>

<div class="col-xs-12 col-md-3" style="float: none; display: inline-block;margin-right: -10px;margin-bottom: 5px;"><a data-rel="lightcase" href="/img/5s.jpg"><img alt="" src="/upload/images/5s.jpg" style="max-width: 100%;" /></a></div>

<div class="col-xs-12 col-md-3" style="float: none; display: inline-block;margin-right: -10px;margin-bottom: 5px;"><a data-rel="lightcase" href="/img/8s.jpg"><img alt="" src="/upload/images/8s.jpg" style="max-width: 100%;" /></a></div>

<div class="col-xs-12 col-md-3" style="float: none; display: inline-block;margin-right: -10px;margin-bottom: 5px;"><a data-rel="lightcase" href="/img/10s.jpg"><img alt="" src="/upload/images/10s.jpg" style="max-width: 100%;" /></a></div>

<div class="col-xs-12 col-md-3" style="float: none; display: inline-block;margin-right: -10px;margin-bottom: 5px;"><a data-rel="lightcase" href="/img/6s.jpg"><img alt="" src="/upload/images/6s.jpg" style="max-width: 100%;" /></a></div>

<div class="col-xs-12 col-md-3" style="float: none; display: inline-block;margin-right: -10px;margin-bottom: 5px;"><a data-rel="lightcase" href="/img/7s.jpg"><img alt="" src="/upload/images/7s.jpg" style="max-width: 100%;" /></a></div>

<div class="col-xs-12 col-md-3" style="float: none; display: inline-block;margin-right: -10px;margin-bottom: 5px;"><a data-rel="lightcase" href="/img/9s.jpg"><img alt="" src="/upload/images/9s.jpg" style="max-width: 100%;" /></a></div>
</div>
</div>
','small_content' => '<p>Добро пожаловать в Кремлевскую стоматологию!</p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'about/o-klinike','public' => '1','top_menu' => '1'),
                array('id' => '3','page_id' => '1','type_id' => '3','created_at' => '2017-06-05 10:10:21','updated_at' => '2017-08-24 11:44:00','link' => 'nashi-spetsialisty','title' => 'Наши специалисты','bottom' => '0','sort' => '2','content' => NULL,'small_content' => '<p>Клиника &laquo;Кремлевская Стоматология&raquo; в городе Рязань предлагает стоматологические услуги опытных профессионально подготовленных по различным направлениям лечения и коррекции зубов специалистов.</p>

<p>Сотрудники нашей клиники окажут Вам самый широкий спектр услуг практически любого вида.</p>

<p>При этом каждый специалист клиники готов оказать клиентам высококвалифицированную помощь в отдельных сферах лечебной или эстетической стоматологии.</p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'about/nashi-spetsialisty','public' => '1','top_menu' => '1'),
                array('id' => '4','page_id' => '1','type_id' => '4','created_at' => '2017-06-05 10:11:11','updated_at' => '2017-08-24 11:47:25','link' => 'ispolzuemye-tekhnologii','title' => 'Оборудование клиники и используемые технологии','bottom' => '0','sort' => '3','content' => NULL,'small_content' => '<p><span id="mail-clipboard-id-21205171986833941526772733047320" style="background-color: inherit;"><span style="color: #000; font-size: 11pt; font-family: calibri; ">Наши клиники оборудованы самым современнейшим стоматологическим оборудованием. В работе используются исключительно передовые технологии.</span></span></p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'about/ispolzuemye-tekhnologii','public' => '1','top_menu' => '1'),
                array('id' => '5','page_id' => '1','type_id' => '1','created_at' => '2017-06-05 10:12:18','updated_at' => '2017-07-31 03:16:10','link' => 'stomatologicheskiy-diskussionnyy-klub','title' => 'Стоматологический дискуссионный клуб','bottom' => '0','sort' => '4','content' => NULL,'small_content' => '<p>Lorem Ipsum - это текст-&quot;рыба&quot;, часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной &quot;рыбой&quot; для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн.</p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'about/stomatologicheskiy-diskussionnyy-klub','public' => '0','top_menu' => '1'),
                array('id' => '6','page_id' => '1','type_id' => '1','created_at' => '2017-06-05 10:12:43','updated_at' => '2017-08-09 08:48:10','link' => 'vakansii','title' => 'Вакансии','bottom' => '0','sort' => '5','content' => NULL,'small_content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'about/vakansii','public' => '1','top_menu' => '1'),
                array('id' => '7','page_id' => '1','type_id' => '9','created_at' => '2017-06-05 10:24:59','updated_at' => '2017-08-24 11:50:28','link' => 'otzyvy','title' => 'Отзывы','bottom' => '0','sort' => '6','content' => NULL,'small_content' => '<p>Цель нашей клиники - превосходить ожидания посетителей только в лучшую сторону. Обратившись для лечения в Кремлевскую стоматологию, Вы сразу поймете - это не просто слова.</p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'about/otzyvy','public' => '1','top_menu' => '1'),
                array('id' => '8','page_id' => '0','type_id' => '1','created_at' => '2017-06-05 10:26:37','updated_at' => '2017-06-05 10:42:50','link' => 'uslugi-i-tseny','title' => 'Услуги и цены','bottom' => '0','sort' => '2','content' => NULL,'small_content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'uslugi-i-tseny','public' => '1','top_menu' => '1'),
                array('id' => '9','page_id' => '8','type_id' => '2','created_at' => '2017-06-05 10:26:55','updated_at' => '2017-08-24 11:51:37','link' => 'vse-uslugi','title' => 'Все услуги','bottom' => '0','sort' => '1','content' => NULL,'small_content' => '<p>Клиника &laquo;Кремлевская Стоматология&raquo; оказывает услуги по профилактике и лечению зубов в городе Рязань.</p>

<p>Наши стоматологические услуги соответствуют самым высоким требованиям и нормам международного уровня.</p>

<p>Специалисты нашей клиники применяют новейшие технологии, только самое современное оборудование для диагностики и лечения, используют лучшие препараты.</p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'uslugi-i-tseny/vse-uslugi','public' => '1','top_menu' => '1'),
                array('id' => '10','page_id' => '8','type_id' => '1','created_at' => '2017-06-05 10:28:54','updated_at' => '2017-08-31 18:05:20','link' => 'tseny','title' => 'Прайс-лист','bottom' => '0','sort' => '2','content' => '<div class="info-block table-price">
<table>
	<tbody>
		<tr>
			<th>Консультация врача - стоматолога</th>
			<th>Цены</th>
		</tr>
		<tr>
			<td>Терапевта</td>
			<td>бесплатно</td>
		</tr>
		<tr>
			<td>Хирурга</td>
			<td>бесплатно</td>
		</tr>
		<tr>
			<td>Имплантолога</td>
			<td>бесплатно</td>
		</tr>
		<tr>
			<td>Ортопеда</td>
			<td>бесплатно</td>
		</tr>
		<tr>
			<td>Ортодонта</td>
			<td>бесплатно</td>
		</tr>
		<tr>
			<td>Пародонтолога</td>
			<td>бесплатно</td>
		</tr>
		<tr>
			<td>Детского стоматолога</td>
			<td>бесплатно</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Услуги</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Рентгеновский снимок</td>
			<td>190 руб.</td>
		</tr>
		<tr>
			<td>Рентгеновский снимок всех зубов(ОПТГ)</td>
			<td>350 руб.</td>
		</tr>
		<tr>
			<td>Компьютерная томограмма (КТ)</td>
			<td>1200 руб.</td>
		</tr>
		<tr>
			<td>Анестезия инъекционная</td>
			<td>180 руб.</td>
		</tr>
		<tr>
			<td>Профессиональная гигиена зубов</td>
			<td>от 1800 руб.</td>
		</tr>
		<tr>
			<td>Лечение с применением аппарата Vector</td>
			<td>от 4200 руб.</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Лечение кариеса</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Лечение кариеса молочных зубов</td>
			<td>от 1500 руб.</td>
		</tr>
		<tr>
			<td>Лечение поверхностного и среднего кариеса</td>
			<td>от 1800 руб.</td>
		</tr>
		<tr>
			<td>Лечение глубокого кариеса</td>
			<td>от 2000 руб.</td>
		</tr>
		<tr>
			<td>Лечение кариеса депульпированного зуба, без лечения каналов зуба</td>
			<td>от 2000 руб.</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Лечение каналов зуба</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Одноканального</td>
			<td>от 1500 руб.</td>
		</tr>
		<tr>
			<td>Двухканального</td>
			<td>от 2500 руб.</td>
		</tr>
		<tr>
			<td>Трёхканального</td>
			<td>от 4200 руб.</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Удаление зуба</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Удаление молочного зуба</td>
			<td>от 600 руб.</td>
		</tr>
		<tr>
			<td>Удаление постоянного зуба</td>
			<td>от 1500 руб.</td>
		</tr>
		<tr>
			<td>Удаление зуба мудрости</td>
			<td>от 2000 руб.</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Имплантация</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Лечение с помощью импланта Nobel Groovy (США, Швеция)</td>
			<td>от 26 000 руб.</td>
		</tr>
		<tr>
			<td>Лечение с помощью импланта Nobel Replace Conical Connection (США, Швеция)</td>
			<td>от 35 000 руб.</td>
		</tr>
		<tr>
			<td>Лечение с помощью имплантанта Nobel Active (США, Швеция)</td>
			<td>от 35 000 руб.</td>
		</tr>
		<tr>
			<td>Лечение с помощью импланта Nobel Parallel (США, Швеция)</td>
			<td>от 38 000 руб.</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Протезирование зубов</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Пластмассовая коронка</td>
			<td>от 800 руб.</td>
		</tr>
		<tr>
			<td>Цельнолитая коронка</td>
			<td>от 2800 руб.</td>
		</tr>
		<tr>
			<td>Металлокерамическая коронка</td>
			<td>от 4700 руб.</td>
		</tr>
		<tr>
			<td>Безметалловая коронка на оксиде циркония (Procera)</td>
			<td>от 14 000 руб.</td>
		</tr>
		<tr>
			<td>Керамические виниры, ламиниры, люминиры</td>
			<td>от 16 000 руб.</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Ортодонтия</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Ортодонтическое лечение (установка, корректировки, снятие)</td>
			<td>от 7140 руб.</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Эстетическая стоматология</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Отбеливание зубов ZOOM (AP, 4 (White Speed))</td>
			<td>от 18000 руб.</td>
		</tr>
		<tr>
			<td>Изготовление винира на один зуб (прямой метод)</td>
			<td>от 4000 руб.</td>
		</tr>
		<tr>
			<td>Реставрация зуба</td>
			<td>от 3500 руб.</td>
		</tr>
	</tbody>
</table>
</div>

<p style="margin-top:-60px;"><a href="/upload/send_files/Price Kremlinstom.pdf" target="_blank">Скачать полный прайс-лист</a></p>
','small_content' => '<p>Клиника &laquo;Кремлевская Стоматология&raquo; представляет самый широкий комплекс услуг. При этом наши специалисты применяют исключительно индивидуальный подход, что во многом воздействует на конечное формирование расценок.</p>

<p>Предлагаем ознакомиться с особенностями прайса клиники и с принципами ценообразования на услуги &laquo;Кремлевской Стоматологии&raquo;.</p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'uslugi-i-tseny/tseny','public' => '1','top_menu' => '1'),
                array('id' => '11','page_id' => '0','type_id' => '1','created_at' => '2017-06-05 10:39:02','updated_at' => '2017-06-05 10:42:50','link' => 'patsientam','title' => 'Пациентам','bottom' => '0','sort' => '3','content' => NULL,'small_content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'patsientam','public' => '1','top_menu' => '1'),
                array('id' => '12','page_id' => '11','type_id' => '1','created_at' => '2017-06-05 10:40:03','updated_at' => '2017-08-09 08:26:31','link' => 'polezno-znat','title' => 'Полезно знать','bottom' => '0','sort' => '1','content' => '<p>erterter rter tert&nbsp;</p>
','small_content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'patsientam/polezno-znat','public' => '0','top_menu' => '1'),
                array('id' => '13','page_id' => '11','type_id' => '1','created_at' => '2017-06-05 10:40:26','updated_at' => '2017-08-15 13:00:50','link' => 'dms','title' => 'ДМС','bottom' => '0','sort' => '2','content' => '<p>Наша стоматология также оказывает услуги по линии Добровольного медицинского страхования (ДМС). Мы работаем со следующими страховыми компаниями:</p>

<ul class="page-content">
	<li>&laquo;АльфаСтрахование&raquo;</li>
	<li>&laquo;Альянс Жизнь&raquo;</li>
	<li>&laquo;ВСК&raquo;</li>
	<li>&laquo;ВТБ Страхование&raquo;</li>
	<li>&laquo;Ингосстрах&raquo;</li>
	<li>&laquo;МАКС&raquo;</li>
	<li>&laquo;Медэкспресс&raquo;</li>
	<li>&laquo;Росгосстрах&raquo;</li>
	<li>&laquo;Группа Ренессанс страхование&raquo;</li>
	<li>&laquo;РЕСО-Гарантия&raquo; &laquo;СОГАЗ&raquo;</li>
	<li>&laquo;Страховая компания &laquo;Согласие&raquo;</li>
	<li>ООО МСК &laquo;Страж&raquo;</li>
	<li>&laquo;Страховая группа</li>
	<li>&laquo;УралСиб&raquo;</li>
	<li>&laquo;Энергогарант&raquo;</li>
</ul>

<p>У нас предусмотрены скидки владельцам полиса ДМС на услуги, не входящие в программу ДМС:</p>

<p>10% - на терапевтическое и хирургическое лечение.</p>

<p>15% - на ортопедические услуги.</p>

<p>Для лечения по полису ДМС требуются следующие документы:</p>

<p>- паспорт,</p>

<p>- полис ДМС,</p>

<p>- гарантийное письмо.</p>
','small_content' => '<p>Добровольное медицинское страхование (ДМС) &ndash; популярная услуга, в рамках которой можно получить расширенный спектр медицинской помощи, включая стоматологическое лечение.</p>

<p>В отличие от Обязательного медицинского страхования (ОМС), владельцы полисов ДМС имеют возможность выбрать медицинское учреждение самостоятельно, включая частные клиники и медицинские центры, а также получают улучшенный сервис и высокое качество материалов.</p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'patsientam/dms','public' => '1','top_menu' => '1'),
                array('id' => '14','page_id' => '11','type_id' => '1','created_at' => '2017-06-05 10:40:57','updated_at' => '2017-08-09 09:33:15','link' => 'spravka-na-nalogovyy-vychet','title' => 'Справка на налоговый вычет','bottom' => '0','sort' => '3','content' => '<style type="text/css">.no-margin {margin-bottom:0px;}
</style>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<p class="no-margin">Заранее поставьте в известность стоматологическую клинику о том, что Вы планируете возвращать налоговый вычет. Заблаговременное информирование в разы ускорит получение документов. Не теряйте чеки! Лучше прикрепить все чеки на лист А4 и сделать копию. Таким образом Вы защитите информацию, которая может исчезнуть при выгорании чеков.</p>
</div>

<div class="col-md-12">
<p style="margin-bottom:0px;">Для получения необходимых документов для налогового вычета в &laquo;Кремлёвской стоматологии&raquo;, необходимо взять с собой:</p>
</div>

<div class="col-md-12">
<ul class="page-content">
	<li>Паспорт</li>
	<li>Все чеки и квитанции</li>
	<li>Договор с &laquo;Кремлёвской стоматологией&raquo;</li>
</ul>
</div>

<div class="col-md-12">
<p class="no-margin">Оформление справки займёт примерно 20 мин. Можно не ждать: зайти заранее, оставить информацию, а потом зайти и забрать готовую справку.</p>
</div>

<div class="col-md-12">
<p style="margin-bottom:0px;">&laquo;Кремлёвская стоматология&raquo; выдаст Вам пакет документов, в котором будет:</p>
</div>

<div class="col-md-12">
<ul class="page-content">
	<li>Справка об оплате медицинских услуг для предоставления в налоговые органы</li>
	<li>Заверенная копия лицензии ООО &laquo;Кремлёвская стоматология&raquo;</li>
</ul>
</div>

<div class="col-md-12">
<p class="no-margin">Так же туда помещаются все чеки на одном листе А4 и договор с клиникой. Документы подают в год, следующий за годом оплаты. Денежные средства возвращаются Вам в течение двух-четырёх месяцев. При подаче в налоговый орган копий документов, необходимо иметь при себе их оригиналы. Размер вычета на дорогостоящее лечение налогоплательщика и членов его семьи не ограничен. Какой тип лечения является дорогостоящим, указано в &laquo;Справке об оплате медицинских услуг для представления в налоговые органы&raquo;. Код &laquo;1&raquo; &ndash; лечение не является дорогостоящим; Код &laquo;2&raquo; &ndash; дорогостоящее лечение.</p>
</div>

<div class="col-md-12">
<p style="margin-bottom:0px;">&laquo;Кремлёвская стоматология&raquo; выдаст Вам пакет документов, в котором будет:</p>
</div>

<div class="col-md-12">
<ul class="page-content">
	<li>Паспорт</li>
	<li>Договор со стоматологией</li>
	<li>Чек или справка об оплате имплантации</li>
	<li>Копия лицензии стоматологической клиники</li>
	<li>Справка о доходах 2-НДФЛ</li>
	<li>Налоговая декларация 3-НДФЛ</li>
	<li>Заявление на налоговый вычет</li>
	<li>Документы, подтверждающие родство (если налоговый вычет оформляется за лечение родственника)</li>
</ul>
</div>

<div class="col-md-12">
<p class="no-margin">Далее пакет документов необходимо направить в налоговую службу по месту регистрации: лично или через Интернет. Для передачи документов онлайн, необходимо обзавестись электронной цифровой подписью в одном из удостоверяющих центров Рязани (например, центрконсалт.рф ), отсканировать вышеперечисленные документы, зайти на сайт налоговой службы (www.nalog.ru), выбрать соответствующий раздел и отправить документы, скрепив их цифровой подписью.</p>
</div>
</div>
</div>
','small_content' => '<p>Отличная новость для пациентов &laquo;Кремлёвской стоматологии&raquo;: расходы на лечение зубов, протезирование, дентальную имплантацию и многие другие услуги нашей клиники можно сократить! В нашей стране существует налоговый вычет на лечение зубов. Согласно статье 219 Налогового кодекса Российской Федерации, государство возвращает трудоустроенным гражданам 13% от стоимости собственного лечения и лечения родственников.</p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'patsientam/spravka-na-nalogovyy-vychet','public' => '1','top_menu' => '1'),
                array('id' => '15','page_id' => '11','type_id' => '1','created_at' => '2017-06-05 10:41:24','updated_at' => '2017-08-09 08:26:54','link' => 'pravovaya-informatsiya','title' => 'Правовая информация','bottom' => '0','sort' => '4','content' => NULL,'small_content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'patsientam/pravovaya-informatsiya','public' => '0','top_menu' => '1'),
                array('id' => '16','page_id' => '11','type_id' => '5','created_at' => '2017-06-05 10:41:51','updated_at' => '2017-06-05 10:42:33','link' => 'vopros-otvet','title' => 'Вопрос-ответ','bottom' => '0','sort' => '5','content' => NULL,'small_content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'patsientam/vopros-otvet','public' => '1','top_menu' => '1'),
                array('id' => '17','page_id' => '0','type_id' => '7','created_at' => '2017-06-05 10:42:17','updated_at' => '2017-07-11 17:30:29','link' => 'kontakty','title' => 'Контакты','bottom' => '0','sort' => '6','content' => NULL,'small_content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'kontakty','public' => '1','top_menu' => '1'),
                array('id' => '18','page_id' => '0','type_id' => '11','created_at' => '2017-07-11 17:29:07','updated_at' => '2017-08-24 11:58:12','link' => 'aktsii-i-skidki','title' => 'Акции и скидки','bottom' => '0','sort' => '5','content' => NULL,'small_content' => '<p>&laquo;Кремлёвская стоматология&raquo; предлагает своим клиентам накопительную дисконтную систему.</p>

<p>Стоимость каждого оплаченного Вами лечения заносится на Ваш счет автоматически.</p>

<p>После того, как на счете накопится определённая оплаченная сумма, пациенту предоставляется соответствующая скидка.</p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'aktsii-i-skidki','public' => '1','top_menu' => '1'),
                array('id' => '19','page_id' => '0','type_id' => '1','created_at' => '2017-07-11 17:30:19','updated_at' => '2017-08-24 11:57:04','link' => 'stomatologicheskiy-turizm','title' => 'Стоматологический туризм','bottom' => '0','sort' => '4','content' => '<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<h3>Стоматологический тур в Рязань: все маршруты хороши - выбирай на вкус</h3>
</div>
</div>

<div class="row">
<div class="col-md-12">
<p>Добраться из Москвы в стоматологическую клинику &laquo;Кремлевская Стоматология&raquo;, можно разными способами:</p>
</div>
</div>

<div class="row">
<div class="col-md-12">
<h3>Личный автомобиль</h3>
</div>
</div>

<div class="row">
<div class="col-md-12">
<p>После въезда в город Рязань, следует двигаться по указателям в центр города Рязань, по направлению к таким ориентирам, как центральный вход в Рязанский Кремль и/или памятник князю Олегу Рязанскому, повернув направо, и, проехав 500 м, по правую сторону от себя Вы увидите нашу клинику.</p>

<p>Подробности маршрута можно изучить на карте.</p>
</div>
</div>

<div class="row">
<div class="col-md-12">
<h3>Железнодорожный транспорт</h3>
</div>
</div>

<div class="row">
<div class="col-md-12">
<p>Не менее быстрым и удобным способом добраться из Москвы в Рязань является экспресс-электропоезд &laquo;Сергей Есенин&raquo;. Отправляясь с Казанского вокзала столицы, Вы прибываете на железнодорожный вокзал Рязань 1.</p>

<p>Выйдя из здания вокзала, пройдя прямо 500 м, Вы выходите на площадь Победы. Перейдя дорогу, на остановке ожидаете маршрутное такси №41. Следовать до остановки &laquo;Рязанский кремль&raquo;, сразу за остановкой &ndash; наша клиника.</p>

<p>Кроме этого, можно воспользоваться услугами такси, которое менее чем за 20 минут доставит вас непосредственно до нашей клиники. Стоимость проезда на такси от вокзала Рязань 1 до &laquo;Кремлевской стоматологии&raquo; составит порядка 170 рублей.</p>
</div>
</div>

<div class="row">
<div class="col-md-12">
<h3>Автобус</h3>
</div>
</div>

<div class="row">
<div class="col-md-12">
<p>Остановив свой выбор на этом виде транспорта, следует добраться в Москве до автовокзала рядом с метро Котельники.</p>

<p>Автобусы до Рязани отправляются каждые 30 минут. Они прибывают на Центральный автовокзал нашего города, откуда, как и в предыдущем случае, можно добраться либо на такси (20-25 минут), либо общественным транспортом, например, воспользовавшись маршрутным такси №41, до остановки &laquo; Рязанский кремль&raquo;.</p>
</div>

<div class="col-md-12">
<p>Через дорогу от нашей клиники находится главная достопримечательность Рязанской области музей-заповедник Рязанский Кремль.</p>

<p>Посетив который Вы будете переполнены положительными эмоциями. Таким образом Вы совместите посещение стоматолога с экскурсией.</p>
</div>
</div>
</div>
','small_content' => '<p>&laquo;Кремлевская Стоматология&raquo; станет лучшим выбором для вас, предлагая самый широкий спектр стоматологических услуг по оптимальным ценам.</p>

<p>Вы будете очень приятно удивлены качеством и стоимостью наших услуг, а посещение расположенного через дорогу от нас музея-заповедника Рязанский Кремль превратит вашу поездку в интереснейшую экскурсию.</p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'stomatologicheskiy-turizm','public' => '1','top_menu' => '1'),
                array('id' => '20','page_id' => '0','type_id' => '1','created_at' => '2017-08-10 13:21:02','updated_at' => '2017-08-10 13:29:06','link' => 'klientam-srakhovykh-kompaniyitsa','title' => 'Клиентам страховых компаний','bottom' => '0','sort' => '0','content' => NULL,'small_content' => '<p>test</p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'klientam-srakhovykh-kompaniyitsa','public' => '1','top_menu' => '0'),
                array('id' => '21','page_id' => '0','type_id' => '14','created_at' => '2017-08-10 13:27:04','updated_at' => '2017-08-15 07:54:03','link' => 'litsenzii','title' => 'Лицензии','bottom' => '0','sort' => '0','content' => '','small_content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => 'Лицензии','not_delete' => '0','url' => 'litsenzii','public' => '1','top_menu' => '0'),
                array('id' => '22','page_id' => '0','type_id' => '1','created_at' => '2017-08-10 13:28:29','updated_at' => '2017-08-10 13:28:29','link' => 'sertifikaty','title' => 'Сертификаты','bottom' => '0','sort' => '0','content' => NULL,'small_content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'sertifikaty','public' => '1','top_menu' => '0'),
                array('id' => '23','page_id' => '0','type_id' => '1','created_at' => '2017-08-10 13:29:58','updated_at' => '2017-08-10 13:29:58','link' => 'postavshchikam','title' => 'Поставщикам','bottom' => '0','sort' => '0','content' => NULL,'small_content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'postavshchikam','public' => '1','top_menu' => '0'),
                array('id' => '25','page_id' => '0','type_id' => '13','created_at' => '2017-08-13 00:20:17','updated_at' => '2017-08-13 00:20:17','link' => 'foto','title' => 'Фото','bottom' => '0','sort' => '0','content' => NULL,'small_content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'foto','public' => '1','top_menu' => '0'),
                array('id' => '26','page_id' => '0','type_id' => '8','created_at' => '2017-08-13 00:21:03','updated_at' => '2017-08-14 12:38:29','link' => 'novosti','title' => 'Новости','bottom' => '0','sort' => '0','content' => NULL,'small_content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'novosti','public' => '1','top_menu' => '0'),
                array('id' => '27','page_id' => '0','type_id' => '12','created_at' => '2017-08-15 08:32:13','updated_at' => '2017-08-15 08:32:13','link' => 'video','title' => 'Видео','bottom' => '0','sort' => '0','content' => NULL,'small_content' => NULL,'seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'video','public' => '1','top_menu' => '0'),
                array('id' => '28','page_id' => '0','type_id' => '1','created_at' => '2017-08-21 11:37:31','updated_at' => '2017-08-30 22:49:39','link' => 'tseny','title' => 'Цены','bottom' => '0','sort' => '0','content' => '<p>Клиника &laquo;Кремлевская Стоматология&raquo; представляет самый широкий комплекс услуг. При этом наши специалисты применяют исключительно индивидуальный подход, что во многом воздействует на конечное формирование расценок.</p>

<p>Предлагаем ознакомиться с особенностями прайса клиники и с принципами ценообразования на услуги &laquo;Кремлевской Стоматологии&raquo;.</p>

<div class="info-block table-price">
<table>
	<tbody>
		<tr>
			<th>Консультация врача - стоматолога</th>
			<th>Цены</th>
		</tr>
		<tr>
			<td>Терапевта</td>
			<td>бесплатно</td>
		</tr>
		<tr>
			<td>Хирурга</td>
			<td>бесплатно</td>
		</tr>
		<tr>
			<td>Имплантолога</td>
			<td>бесплатно</td>
		</tr>
		<tr>
			<td>Ортопеда</td>
			<td>бесплатно</td>
		</tr>
		<tr>
			<td>Ортодонта</td>
			<td>бесплатно</td>
		</tr>
		<tr>
			<td>Пародонтолога</td>
			<td>бесплатно</td>
		</tr>
		<tr>
			<td>Детского стоматолога</td>
			<td>бесплатно</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Услуги</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Рентгеновский снимок</td>
			<td>190 руб.</td>
		</tr>
		<tr>
			<td>Рентгеновский снимок всех зубов(ОПТГ)</td>
			<td>350 руб.</td>
		</tr>
		<tr>
			<td>Компьютерная томограмма (КТ)</td>
			<td>1200 руб.</td>
		</tr>
		<tr>
			<td>Анестезия инъекционная</td>
			<td>180 руб.</td>
		</tr>
		<tr>
			<td>Профессиональная гигиена зубов</td>
			<td>от 1800 руб.</td>
		</tr>
		<tr>
			<td>Лечение с применением аппарата Vector</td>
			<td>от 4200 руб.</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Лечение кариеса</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Лечение кариеса молочных зубов</td>
			<td>от 1500 руб.</td>
		</tr>
		<tr>
			<td>Лечение поверхностного и среднего кариеса</td>
			<td>от 1800 руб.</td>
		</tr>
		<tr>
			<td>Лечение глубокого кариеса</td>
			<td>от 2000 руб.</td>
		</tr>
		<tr>
			<td>Лечение кариеса депульпированного зуба, без лечения каналов зуба</td>
			<td>от 2000 руб.</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Лечение каналов зуба</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Одноканального</td>
			<td>от 1500 руб.</td>
		</tr>
		<tr>
			<td>Двухканального</td>
			<td>от 2500 руб.</td>
		</tr>
		<tr>
			<td>Трёхканального</td>
			<td>от 4200 руб.</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Удаление зуба</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Удаление молочного зуба</td>
			<td>от 600 руб.</td>
		</tr>
		<tr>
			<td>Удаление постоянного зуба</td>
			<td>от 1500 руб.</td>
		</tr>
		<tr>
			<td>Удаление зуба мудрости</td>
			<td>от 2000 руб.</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Имплантация</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Лечение с помощью импланта Nobel Groovy (США, Швеция)</td>
			<td>от 26 000 руб.</td>
		</tr>
		<tr>
			<td>Лечение с помощью импланта Nobel Replace Conical Connection (США, Швеция)</td>
			<td>от 35 000 руб.</td>
		</tr>
		<tr>
			<td>Лечение с помощью имплантанта Nobel Active (США, Швеция)</td>
			<td>от 35 000 руб.</td>
		</tr>
		<tr>
			<td>Лечение с помощью импланта Nobel Parallel (США, Швеция)</td>
			<td>от 38 000 руб.</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Протезирование зубов</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Пластмассовая коронка</td>
			<td>от 800 руб.</td>
		</tr>
		<tr>
			<td>Цельнолитая коронка</td>
			<td>от 2800 руб.</td>
		</tr>
		<tr>
			<td>Металлокерамическая коронка</td>
			<td>от 4700 руб.</td>
		</tr>
		<tr>
			<td>Безметалловая коронка на оксиде циркония (Procera)</td>
			<td>от 14 000 руб.</td>
		</tr>
		<tr>
			<td>Керамические виниры, ламиниры, люминиры</td>
			<td>от 16 000 руб.</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Ортодонтия</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Ортодонтическое лечение (установка, корректировки, снятие)</td>
			<td>от 7140 руб.</td>
		</tr>
	</tbody>
</table>

<table>
	<tbody>
		<tr>
			<th>Эстетическая стоматология</th>
			<th>Цена</th>
		</tr>
		<tr>
			<td>Отбеливание зубов ZOOM (AP, 4 (White Speed))</td>
			<td>от 18000 руб.</td>
		</tr>
		<tr>
			<td>Изготовление винира на один зуб (прямой метод)</td>
			<td>от 4000 руб.</td>
		</tr>
		<tr>
			<td>Реставрация зуба</td>
			<td>от 3500 руб.</td>
		</tr>
	</tbody>
</table>
</div>
','small_content' => '<p>В нашей клинике Вы можете получить все виды стоматологических услуг, от актуальных методов пломбирования зубов, до дентальной имплантации с использованием новейших технологий и материалов ведущих компаний (Германии, Швейцарии, США).</p>

<p>Наши доктора регулярно проходят курсы по повышению квалификации и обучению новым технологиям.</p>
','seo_content' => NULL,'seo_description' => NULL,'seo_keywords' => NULL,'seo_title' => NULL,'not_delete' => '0','url' => 'tseny','public' => '1','top_menu' => '0')
            )
        );
    }
}
