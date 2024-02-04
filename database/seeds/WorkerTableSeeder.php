<?php

use Illuminate\Database\Seeder;

class WorkerTableSeeder extends Seeder {

    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('workers')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('workers')->insert(
            array(
                array('id' => '3','clinic_id' => '1','name' => 'Архипенко Андрей Юрьевич','sort' => '1','public' => '1','position' => 'Основатель и руководитель «Кремлёвской стоматологии», врач-стоматолог, терапевт, хирург, имплантонолог','content' => '<style type="text/css">.quote {
margin-top: -50px;
}
</style>
<div class="quote">
<blockquote>Пациент всегда доверяет врачу, к которому обратился, поэтому врач обязан оправдать это доверие качеством своей работы</blockquote>
</div>

<h4>Профессиональные навыки:</h4>

<ul class="page-content">
	<li>Имплантация зубов</li>
	<li>Удаления зубов (в том числе сложные случаи)M</li>
	<li>Лечение кариеса</li>
	<li>Лечение пульпита</li>
	<li>Лечение периодонтита</li>
	<li>Cложная эндодонтия</li>
	<li>Эстетическая реставрация зубов</li>
	<li>Перелечивание каналов</li>
	<li>Отбеливание зубов ZOOM</li>
</ul>
','small_content' => '<p>В профессии стоматолога специалист высочайшего класса, с более чем двадцатилетним опытом работы. Обладает уникальнейшими практическими знаниями и навыками в терапии, хирургии и имплантологии.</p>

<p>Одним из первых начал применять на практике современную дентальную имплантацию. Постоянно совершенствует свой профессиональный уровень и требует того же от коллег по клинике.</p>
','url' => 'arkhipenko-andrey-yurevich','link' => 'arkhipenko-andrey-yurevich'),
                array('id' => '9','clinic_id' => '1','name' => 'Антонова Валерия Олеговна','sort' => '2','public' => '1','position' => 'Врач-стоматолог, терапевт','content' => '<style type="text/css">.quote {
margin-top: -50px;
}
</style>
<div class="quote">
<blockquote>Каждый человек уникален. Характер и темперамент, понятие о красоте и эстетике, настроение и прошлый стоматологический опыт. Все эти факторы я учитываю в своей работе, что позволяет мне подобрать индивидуальный подход к каждому пациенту</blockquote>
</div>

<h4>Профессиональные навыки:<!--4--></h4>

<ul class="page-content">
	<li>Лечение кариеса и некариозных поражений</li>
	<li>Эндодонтическое лечение и перелечивание корневых каналов</li>
	<li>Профессиональная гигиена полости рта</li>
	<li>Консервативное лечение заболеваний пародонта</li>
	<li>Эстетическая и малоинвазивная реставрация</li>
</ul>
','small_content' => '<p>Целеустремлённый и дотошный специалист. В работе использует только современные методы и протоколы лечения. Благодаря своей серьёзности и ответственности на первое место ставит качество лечения и создание комфортных условий для пациента</p>
','url' => 'antonova-valeriya-olegovna','link' => 'antonova-valeriya-olegovna'),
                array('id' => '10','clinic_id' => '1','name' => 'Афонина Елена Викторовна','sort' => '3','public' => '0','position' => 'Врач-стоматолог','content' => NULL,'small_content' => NULL,'url' => 'afonina-elena-viktorovna','link' => 'afonina-elena-viktorovna'),
                array('id' => '11','clinic_id' => '1','name' => 'Барабанова Юлия Анатольевна','sort' => '4','public' => '1','position' => 'Врач-стоматолог, терапевт, детский стоматолог','content' => '<style type="text/css">.quote {
margin-top: -50px;
}
</style>
<div class="quote">
<blockquote>Врач учится всю жизнь, поэтому я постоянно корректирую свои знания и умения в соответствии с новыми разработками и современными материалами</blockquote>
</div>

<h4>Профессиональные навыки:</h4>

<ul class="page-content">
	<li>Лечение кариеса</li>
	<li>Лечение пульпита</li>
	<li>Лечения периодонтита Б/li&gt;</li>
	<li>Удаление временных (молочных) зубов</li>
	<li>Герметизация фиссур (инвазивная, неинвазивная)</li>
	<li>Лечение травм временных зубов</li>
	<li>Витальные методы лечения пульпитов временных и постоянных несформированных зубов</li>
</ul>
','small_content' => '<p>Юлия Анатольевна сохраняет присутствие духа даже в самых сложных ситуациях и находит подход как к большим, так и к маленьким пациентам. Считает особенно важным использовать в своей работе современные психологические подходы, помогающие ослабить или снять страхи и тревоги, связанные с лечением зубов. Вот уже более 20 лет юные пациенты Юлии Анатольевны говорят после лечения: &laquo;Когда я вырасту, я хочу быть как Вы, стоматологом!&raquo;</p>
','url' => 'barabanova-yuliya-anatolevna','link' => 'barabanova-yuliya-anatolevna'),
                array('id' => '12','clinic_id' => '1','name' => 'Гусев Дмитрий Сергеевич','sort' => '5','public' => '1','position' => 'Врач-стоматолог, терапевт','content' => '<style type="text/css">.quote {
margin-top: -50px;
}
</style>
<div class="quote">
<blockquote>У меня есть, как минимум, 32 причины ценить свое дело</blockquote>
</div>

<h4>Профессиональные навыки:</h4>

<ul class="page-content">
	<li>Лечение кариеса</li>
	<li>Лечение пульпита</li>
	<li>Лечения периодонтита Б/li&gt;</li>
	<li>Эстетическая реставрация</li>
	<li>Профессиональная гигиена полости рта</li>
	<li>Лечение заболеваний зубов с применением операционного микроскопа</li>
</ul>
','small_content' => '<p>Дмитрий Сергеевич владеет современными методиками лечения зубов, с использованием новейших материалов, что позволяет добиться высоких результатов. Благодаря индивидуальному подходу и коммуникабельности, он легко находит общий язык с пациентами. Постоянно совершенствует свои навыки, посещает научные конференции и мастер-классы.</p>
','url' => 'gusev-dmitriy-sergeevich','link' => 'gusev-dmitriy-sergeevich'),
                array('id' => '13','clinic_id' => '1','name' => 'Дрангой Инна Николаевна','sort' => '6','public' => '0','position' => 'Врач-стоматолог','content' => NULL,'small_content' => NULL,'url' => 'drangoy-inna-nikolaevna','link' => 'drangoy-inna-nikolaevna'),
                array('id' => '14','clinic_id' => '1','name' => 'Друзякина Мария Владимировна','sort' => '7','public' => '0','position' => 'Врач-стоматолог','content' => NULL,'small_content' => NULL,'url' => 'druzyakina-mariya-vladimirovna','link' => 'druzyakina-mariya-vladimirovna'),
                array('id' => '15','clinic_id' => '1','name' => 'Дубовицкая Алифтина Ивановна','sort' => '8','public' => '0','position' => 'Врач-стоматолог','content' => NULL,'small_content' => NULL,'url' => 'dubovitskaya-aliftina-ivanovna','link' => 'dubovitskaya-aliftina-ivanovna'),
                array('id' => '16','clinic_id' => '1','name' => 'Захарова Елена Сергеевна','sort' => '9','public' => '0','position' => 'Врач-стоматолог','content' => NULL,'small_content' => NULL,'url' => 'zakharova-elena-sergeevna','link' => 'zakharova-elena-sergeevna'),
                array('id' => '17','clinic_id' => '1','name' => 'Кулаева Екатерина Сергеевна','sort' => '10','public' => '1','position' => 'Врач-стоматолог, хирург, челюстно-лицевой хирург','content' => '<style type="text/css">.quote {
margin-top: -50px;
}
</style>
<div class="quote">
<blockquote>Делай хорошо, или не делай вообще</blockquote>
</div>

<h4>Профессиональные навыки:</h4>

<ul class="page-content">
	<li>Удаления зубов (в том числе сложные случаи)</li>
	<li>Костно-реконструктивная хирургия полости рта</li>
	<li>Консервативное лечение заболеваний тканей пародонта</li>
	<li>Мукогингивальная хирургия (пластические операции в полости рта)</li>
	<li>Удаление доброкачественных образований в полости рта( в том числе с помощью лазера)</li>
	<li>Хирургия под дентальным микроскопом</li>
</ul>
','small_content' => '<p>Екатерина Сергеевна в полном объёме владеет всеми знаниями и навыками амбулаторной и стационарной хирургической стоматологии. Уровень подготовки подтверждается как государственными сертификатами, так и свидетельствами ведущих мировых производителей систем имплантации. Успешно сочетает клиническую практику с преподавательской деятельностью.</p>
','url' => 'kulaeva-ekaterina-sergeevna','link' => 'kulaeva-ekaterina-sergeevna'),
                array('id' => '18','clinic_id' => '1','name' => 'Ловягина Надежда Владиславовна','sort' => '11','public' => '1','position' => 'Врач-стоматолог, терапевт','content' => '<style type="text/css">.quote {
margin-top: -50px;
}
</style>
<div class="quote">
<blockquote>Здравый перфекционизм, внимание к деталям и стремление к достижению идеального результата в сжатые сроки &mdash; не утопия, а вполне достижимая цель</blockquote>
</div>

<h4>Профессиональные навыки:</h4>

<ul class="page-content">
	<li>Лечение кариеса</li>
	<li>Лечение пульпита</li>
	<li>Лечение периодонтита</li>
	<li>Профессиональная гигиена полости рта</li>
	<li>Реминерализующая терапия</li>
	<li>Фторирование</li>
</ul>
','small_content' => '<p>Ловягина Надежда Владиславовна внимательный и отзывчивый специалист, который относится к работе старательно и выполняет ее на высоком профессиональном уровне. Надежда Владиславовна умеет выслушать, вникнуть в проблему и дать полезный совет.</p>

<p>В практике использует новейшие медицинские технологии. Ей присущи такие профессиональные качества, как целеустремленность, трудолюбие и особая аккуратность.</p>
','url' => 'lovyagina-nadezhda-vladislavovna','link' => 'lovyagina-nadezhda-vladislavovna'),
                array('id' => '19','clinic_id' => '1','name' => 'Новиков  Сергей Анатольевич','sort' => '12','public' => '1','position' => 'Кандидат медицинских наук, врач-стоматолог, имплантолог','content' => '<style type="text/css">.quote {
margin-top: -50px;
}
</style>
<div class="quote">
<blockquote>Настоящий профессионал должен не только знать свое дело, но и уметь общаться с пациентами, прислушиваться к ним и детально вникать в проблему</blockquote>
</div>

<h4>Профессиональные навыки:</h4>

<ul class="page-content">
	<li>Челюстно-лицевая хирургия</li>
	<li>Дентальная имплантология</li>
	<li>Костно-реконструктивные операции на челюстях</li>
</ul>
','small_content' => '<p>Специалист высокого класса, выпускник Московского Государственного Медико-Стоматологического университета Сергей Анатольевич имеет большой опыт имплантации во всех отделах верхней и нижней челюсти, наращивания костной ткани в вертикальном и горизонтальном направлении, поднятия дна верхнечелюстного синуса для последующей установки имплантов и методики &laquo;всё-на-4-х&raquo;.</p>

<p>Постоянно совершенствует свои знания и умения в ведущих имплантологических центрах Европы. Является автором научных статей в стоматологических изданиях.</p>
','url' => 'novikov-sergey-anatolevich','link' => 'novikov-sergey-anatolevich'),
                array('id' => '20','clinic_id' => '1','name' => 'Орехова Ольга Викторовна','sort' => '13','public' => '0','position' => 'Врач-стоматолог','content' => NULL,'small_content' => NULL,'url' => 'orekhova-olga-viktorovna','link' => 'orekhova-olga-viktorovna'),
                array('id' => '21','clinic_id' => '1','name' => 'Половинкина Наталья Юрьевна','sort' => '14','public' => '1','position' => 'Врач-стоматолог, пародонтолог','content' => '<style type="text/css">.quote {
margin-top: -50px;
}
</style>
<div class="quote">
<blockquote>Своими стараниями мы способны значительно улучшить качество жизни человека</blockquote>
</div>

<h4>Профессиональные навыки:</h4>

<ul class="page-content">
	<li>Лечение кариеса</li>
	<li>Лечение пульпита</li>
	<li>Лечение периодонтита</li>
	<li>Консервативная и хирургическая пародонтология (лечение гингивита, пародонтита)</li>
	<li>Микропротезирование</li>
	<li>Эстетическая реставрация</li>
	<li>Профилактика кариеса</li>
	<li>Профгигиена любой сложности</li>
	<li>Работа с отбеливающими системами ZOOM</li>
</ul>
','small_content' => '<p>Опираясь на знания и десятилетний опыт работы после тщательной диагностики способна подобрать и провести оптимальное лечение в каждом конкретном случае.</p>

<p>Внимательна и отзывчива к пациентам, не боится трудностей в работе.</p>
','url' => 'polovinkina-natalya-yurevna','link' => 'polovinkina-natalya-yurevna'),
                array('id' => '22','clinic_id' => '1','name' => 'Рудакова Елена Николаевна','sort' => '15','public' => '0','position' => 'Врач-стоматолог','content' => NULL,'small_content' => NULL,'url' => 'rudakova-elena-nikolaevna','link' => 'rudakova-elena-nikolaevna'),
                array('id' => '23','clinic_id' => '1','name' => 'Сакута Екатерина Юрьевна','sort' => '16','public' => '0','position' => 'Администратор','content' => NULL,'small_content' => NULL,'url' => 'sakuta-ekaterina-yurevna','link' => 'sakuta-ekaterina-yurevna'),
                array('id' => '24','clinic_id' => '1','name' => 'Таранов Роман Серегеевич','sort' => '17','public' => '1','position' => 'Врач-стоматолог, ортопед, ортодонт','content' => '<style type="text/css">.quote {
margin-top: -50px;
}
</style>
<div class="quote">
<blockquote>Внимательность, точность и аккуратность &mdash; основа моего лечения. Всегда ориентируюсь на желания и возможности клиента и предлагаю выбор из нескольких способов лечения, независимо от сложности клинического случая</blockquote>
</div>

<h4>Профессиональные навыки:</h4>

<ul class="page-content">
	<li>Протезирование на имплантатах</li>
	<li>Установка виниров</li>
	<li>Микропротезирование вкладками</li>
	<li>Все виды съемного и несъемного протезирования</li>
	<li>Ортодонтическое лечение съемной техникой (пластиночные аппараты, трейнеры)</li>
	<li>Ортодонтическое лечение несъемными брекет-системами</li>
	<li>Расчет и анализ диагностических моделей челюстей и составление плана лечения</li>
</ul>
','small_content' => '<p>Владеет современными методами съёмного и несъёмного протезирования, в том числе протезирования на имплантах и безметаловой керамики. Так же специализируется на ортодонтическом лечении взрослых и детей.</p>

<p>Уже более 15 лет Роман Сергеевич заботится как о красивой улыбке, так и о правильной функции зубов своих пациентов. В итоге его работы происходит полная эстетическая реабилитация пациента.</p>
','url' => 'taranov-roman-seregeevich','link' => 'taranov-roman-seregeevich'),
                array('id' => '25','clinic_id' => '1','name' => 'Тарасова Татьяна Алексеевна','sort' => '18','public' => '1','position' => 'Врач-стоматолог, ортопед','content' => '<style type="text/css">.quote {
margin-top: -50px;
}
</style>
<div class="quote">
<blockquote>Моими главными приоритетами в работе являются достижение наилучших результатов и создание комфортных условий для пациента в ходе всего лечения</blockquote>
</div>

<h4>Профессиональные навыки:</h4>

<ul class="page-content">
	<li>Все виды съемного и несъемного протезирования</li>
	<li>Установка металлокерамических и керамических коронок</li>
</ul>
','small_content' => '<p>Работает в &laquo;Кремлёвской стоматологии&raquo; с момента основания. Уже более 35 лет Татьяна Алексеевна ведёт ортопедический приём и выполняет протезирование любой степени сложности на съёмных и несъёмных конструкциях.</p>

<p>К лечению своих пациентов подходит творчески и с твердой уверенностью в успехе.</p>
','url' => 'tarasova-tatyana-alekseevna','link' => 'tarasova-tatyana-alekseevna'),
                array('id' => '26','clinic_id' => '1','name' => 'Швецова Кристина Владимировна','sort' => '19','public' => '1','position' => 'Врач–стоматолог, терапевт','content' => '<style type="text/css">.quote {
margin-top: -50px;
}
</style>
<div class="quote">
<blockquote>С большой ответственностью отношусь к повышению своей квалификации и регулярно посещаю специализированные курсы, мастер-классы и конференции. Моя задача &ndash; оказать пациенту самое качественное лечение</blockquote>
</div>

<h4>Профессиональные навыки:</h4>

<ul class="page-content">
	<li>Профгигиена любой сложности</li>
	<li>Отбеливание зубов ZOOM</li>
	<li>Лечение кариеса</li>
	<li>Лечение пульпита</li>
	<li>Лечение периодонтита</li>
	<li>Cложная эндодонтия</li>
	<li>Эстетическая реставрация зубов</li>
</ul>
','small_content' => '<p>Особое внимание в своей работе уделяет эндодонтии и эстетической реставрации зубов. Благодаря профессиональным навыкам, современным методикам и использованию новейших материалов добивается высоких результатов в лечении.</p>

<p>Является постоянным участником семинаров и мастер классов по терапевтической стоматологии</p>
','url' => 'shvetsova-kristina-vladimirovna','link' => 'shvetsova-kristina-vladimirovna')
            )
        );
    }
}