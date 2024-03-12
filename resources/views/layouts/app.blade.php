@php

$features = [
    array(
        "title" => "Успешно работаем с 2007 года",
        "ico" => "like"
    ),
    array(
        "title" => "Все виды стоматологических услуг",
        "ico" => "like"
    ),
    array(
        "title" => "Индивидуальный подход",
        "ico" => "crown"
    ),
    array(
        "title" => "Без очередей и ожидания",
        "ico" => "clock"
    ),
    array(
        "title" => "Высокий профессионализм",
        "ico" => "star"
    ),
    array(
        "title" => "Лучшее оборудование и технологии",
        "ico" => "microscope"
    ),
    array(
        "title" => "Гарантия на выполненную работу",
        "ico" => "shield"
    ),
    array(
        "title" => "Безупречная репутация",
        "ico" => "star-badge"
    )
];

$reviews = [
    array(
        'id' => 1,
        'name' => 'Вячеслав', 
        'profession' => 'Преподаватель РГУ им. С.А.Есенина', 
        'url' => 'P84MSVsCGJg', 
        'poster' => 'vyacheslav.jpg'
    ),
    array(
        'id' => 2,
        'name' => 'Евгений', 
        'profession' => 'Артист', 
        'url' => 'RlSoIXlUq7k', 
        'poster' => 'evgeny.jpg'
    ),
    array(
        'id' => 3,
        'name' => 'Жанна', 
        'profession' => 'Госслужащий', 
        'url' => '4x52U8XEzuo', 
        'poster' => 'zhanna.jpg'
    ),
    array(
        'id' => 4,
        'name' => 'Ирина', 
        'profession' => 'Директор мед. центра', 
        'url' => 'CAWjaQPYoRc', 
        'poster' => 'irina.jpg'
    ),
    array(
        'id' => 5,
        'name' => 'Николай', 
        'profession' => 'Маркетолог', 
        'url' => '9s4u_r9WYD8',
        'poster' => 'nikolay.jpg'
    ),
    array(
        'id' => 6,
        'name' => 'Яна', 
        'profession' => 'Инженер МЧС', 
        'url' => '4UooETdRlgQ', 
        'poster' => 'yana.jpg'
    )
];

$ratings = [
    array(
        'id' => 1,
        'title' => 'Логотип компании Yell', 
        'rate' => 5, 
        'url' => 'https://www.yell.ru/ryazan/com/kremlevskaya-stomatologiya-na-sadovoj_11955470', 
        'poster' => 'yell.png'
    ),
    array(
        'id' => 2,
        'title' => 'Логотип компании 32top', 
        'rate' => 5, 
        'url' => 'https://ryazan.32top.ru/clinics/27043', 
        'poster' => '32top.png'
    ),
    array(
        'id' => 3,
        'title' => 'Логотип компании Zoon', 
        'rate' => 4.9, 
        'url' => 'https://ryazan.zoon.ru/medical/kremlevskaya_stomatologiya_na_sadovoj_ulitse', 
        'poster' => 'zoon.png'
    ),
    array(
        'id' => 4,
        'title' => 'Логотип компании СПР', 
        'rate' => 4.9, 
        'url' => 'https://cfo.spr.ru/ryazan-i-ryazanskiy-rayon/kremlevskaya-stomatologiya.html', 
        'poster' => 'spr.png'
    ),
    array(
        'id' => 5,
        'title' => 'Логотип компании Yandex', 
        'rate' => 4.5, 
        'url' => 'https://yandex.ru/maps/org/kremlevskaya_stomatologiya/199825052187/?ll=39.754260%2C54.627386&oid=199825052187&ol=biz&z=17.78', 
        'poster' => 'yandex.png'
    ),
    array(
        'id' => 6,
        'title' => 'Логотип компании Prodoctorov', 
        'rate' => 5, 
        'url' => 'https://prodoctorov.ru/ryazan/set/1735-kremlevskaya-stomatologiya/', 
        'poster' => 'prodoctors.png'
    )
]

@endphp

<!DOCTYPE html>
<html lang="ru">
    @include('parts.head')
    <body class="page">
        @include('parts.header', ["cssClass" => "page__header"])

        <main class="page__main main">
            <section class="main__welcome welcome">
                <h2 class="visually-hidden">Приветственное видео</h2>
                <div class="welcome__container container">
                    <h3 class="welcome__title">Добро пожаловать <br> в Кремлёвскую <br> стоматологию!</h3>
                    <p class="welcome__subtitle">В стоматологию для всей семьи! :)</p>
                    <a class="welcome__video" href="/">
                        <svg viewBox="0 0 24 24" width="60" height="60" aria-hidden="true" focusable="false" role="img">
                            <use xlink:href="#ico-play"></use>
                        </svg>
                        <span class="visually-hidden">Посмотреть видео</span>
                    </a>
                    <a class="welcome__btn btn btn--danger" href="">
                        <svg class="btn__icon" viewBox="-2 -2 21 21" width="20" height="20" aria-hidden="true" focusable="false" role="img">
                            <use xlink:href="#ico-edit"></use>
                        </svg>
                        <span class="btn__text">Записаться на приём</span>
                    </a>
                    <a class="welcome__skill-btn btn btn--skill" href="">
                        <img class="btn__icon" src="/master/images/ico-n.png" width="24" height="24" alt="Иконка кнопки">
                        <span class="btn__text">Центр клинического мастерства</span>
                    </a>
                </div>
            </section>

            <!-- СЕКЦИЯ НАШИ ПРЕИМУЩЕСТВА -->
            <section class="main__features features">
                <div class="features__container container">
                    <h2 class="features__title">Наши преимущества</h2>

                    <ul class="features__list">
                        @foreach($features as $feature)
                            <li class="features__item feature feature--{{ $feature['ico'] }}">
                                <h3 class="feature__title">{{ $feature['title'] }}</h3>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <!-- СЕКЦИЯ О КОМПАНИИ -->
            <section class="main__about about">
                <div class="about__container container">
                    <div class="about__wrapper">
                        <h2 class="about__title">О нашей стоматологии</h2>
                        <p class="about__text">
                            Наш стоматологический центр с командой опытных врачей различных специальностей — терапевтов, хирургов, имплантологов, ортопедов, ортодонтов — позаботится о красоте и здоровье ваших зубов!
                        </p>
                        <p class="about__text">Стоматологи занимаются вопросами восстановления функций и эстетики зубного ряда с применением современных технологий и нового оборудования.</p>
                        <p class="about__text">Оказываем стоматологическую помощь детям и взрослым в Рязани.</p>
                        <ul class="about__list">
                            <li class="about__item">
                                <a class="btn btn--outline-danger" href="">
                                    <svg class="btn__icon" viewBox="0 0 20 20" width="20" height="20" aria-hidden="true" focusable="false" role="img">
                                        <use xlink:href="#ico-play-list"></use>
                                    </svg>
                                    <span class="btn__text">Виртуальный тур</span>
                                </a>
                            </li>
                            <li class="about__item">
                                <a class="btn btn--danger" href="">
                                    <svg class="btn__icon" viewBox="0 0 20 20" width="20" height="20" aria-hidden="true" focusable="false" role="img">
                                        <use xlink:href="#ico-nav-arrow"></use>
                                    </svg>
                                    <span class="btn__text">Как добраться</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="about__img">
                        <img src="/master/images/about.jpg" alt="О клинике">
                    </div>
                </div>
            </section>

            <!-- СЕКЦИЯ ОТЗЫВЫ -->
            <section class="main__reviews reviews">
                <div class="reviews__container container">
                    <div class="reviews__header">
                        <h2 class="reviews__title">Отзывы наших клиентов</h2>
                        <a class="reviews__more" href="/">Смотреть все отзывы</a>
                    </div>

                    <div class="reviews__swiper swiper" id="reviews-swiper">
                        <div class="reviews__wrapper swiper-wrapper">
                            @foreach($reviews as $review)
                                <div class="reviews__slide review swiper-slide">
                                    <a class="review__link" href="{{ $review['url'] }}">
                                        <img class="review__img" src="/master/images/{{ $review['poster'] }}" width="307" height="173" alt="Превью постер к видео отзыва">
                                    </a>
                                    <h3 class="review__title">{{ $review['name'] }}</h3>
                                    <p class="review__subtitle">{{ $review['profession'] }}</p>
                                </div>                            
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <section class="main__ratings ratings">
                <div class="ratings__container container">
                    <h2 class="visually-hidden">Рейтинги</h2>
                    <div class="ratings__swiper swiper" id="ratings-swiper">
                        <div class="ratings__wrapper swiper-wrapper">
                            @foreach($ratings as $rating)
                                <div class="ratings__slide rating swiper-slide">
                                    <a class="rating__link" href="{{ $rating['url'] }}" target="_blank">
                                        <img class="rating__img" src="/master/images/{{ $rating['poster'] }}" width="92" alt="{{ $rating['title'] }}">
                                        <ul class="rating__list">
                                            @for ($i = 0; $i < 5; $i++)
                                                <li class="rating__item">
                                                    <svg class="rating__icon" viewBox="0 0 20 20" width="15" height="15" aria-hidden="true" focusable="false" role="img">
                                                        <use xlink:href="#ico-star"></use>
                                                    </svg>
                                                    <span class="visually-hidden">Звездочка рейтинга</span>
                                                </li>
                                            @endfor
                                        </ul>
                                        <h3 class="rating__title">Рейтинг клиники {{ $rating['rate'] }}</h3>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="page__footer footer">
            <div class="footer__container container">
                <div class="footer__navbar navbar">
                    <ul class="navbar__list">
                        <li class="navbar__item navbar-item">
                            <a class="navbar-item__link"id="mobile-menu-trigger">
                                <svg class="navbar-item__icon" viewBox="0 0 20 19" width="20" height="18" aria-hidden="true" focusable="false" role="img">
                                    <use xlink:href="#ico-menu"></use>
                                </svg>
                                <span class="navbar-item__title">Меню</span>
                            </a>
                        </li>
                        <li class="navbar__item navbar-item">
                            <a class="navbar-item__link" href="">
                                <svg class="navbar-item__icon" viewBox="0 0 20 20" width="20" height="20" aria-hidden="true" focusable="false" role="img">
                                    <use xlink:href="#ico-service"></use>
                                </svg>
                                <span class="navbar-item__title">Услуги</span>
                            </a>
                        </li>
                        <li class="navbar__item navbar-item">
                            <a class="navbar-item__link" href="">
                                <svg class="navbar-item__icon" viewBox="0 0 17 20" width="20" height="20" aria-hidden="true" focusable="false" role="img">
                                    <use xlink:href="#ico-calc"></use>
                                </svg>
                                <span class="navbar-item__title">Рассчитать</span>
                            </a>
                        </li>
                        <li class="navbar__item navbar-item navbar-item--success">
                            <a class="navbar-item__link" href="">
                                <svg class="navbar-item__icon" viewBox="0 0 20 19" width="20" height="20" aria-hidden="true" focusable="false" role="img">
                                    <use xlink:href="#ico-whatsapp"></use>
                                </svg>
                                <span class="navbar-item__title">Написать</span>
                            </a>
                        </li>
                        <li class="navbar__item navbar-item navbar-item--danger">
                            <a class="navbar-item__link" href="">
                                <svg class="navbar-item__icon" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false" role="img">
                                    <use xlink:href="#ico-phone"></use>
                                </svg>
                                <span class="navbar-item__title">Позвонить</span>
                            </a>
                        </li>
                    </ul> 
                </div>
            </div>
        </footer>

        <div class="page__icons" style="height: 0; width: 0; position: absolute; visibility: hidden">
            @include('parts.svg')
        </div>

        <script src="/master/bundle.js"></script>
    </body>
</html>