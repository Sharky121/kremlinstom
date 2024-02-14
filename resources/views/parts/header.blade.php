@php

$menu = [
    array(
        "title" => "Клиника",
        "link" => "",
        "submenu" => [
            array(
                "title" => "О клинике",
                "link" => "",
            ),
            array(
                "title" => "Оборудование и технологии",
                "link" => "",
            ),
            array(
                "title" => "Видео о клинике",
                "link" => "",
            ),
            array(
                "title" => "Фотогалерея",
                "link" => "",
            ),
            array(
                "title" => "Фото наших работ",
                "link" => "",
            ),
            array(
                "title" => "Отзывы",
                "link" => "",
            ),
            array(
                "title" => "Вакансии",
                "link" => "",
            ),
        ]
    ),
    array(
        "title" => "Акции",
        "link" => ""
    ),
    array(
        "title" => "Услуги",
        "link" => "",
        "submenu" => [
            array(
                "title" => "Имплантация зубов",
                "link" => "",
            ),
            array(
                "title" => "Протезирование зубов",
                "link" => "",
            ),
            array(
                "title" => "Детская стоматология",
                "link" => "",
            ),
            array(
                "title" => "Ортодонтия. Исправление прикуса",
                "link" => "",
            ),
            array(
                "title" => "Рентгенодиагностика зубов",
                "link" => "",
            ),
            array(
                "title" => "Лечение кариеса зубов",
                "link" => "",
            ),
            array(
                "title" => "Удаление зубов",
                "link" => "",
            ),
            array(
                "title" => "Удаление зуба мудрости",
                "link" => "",
            ),
            array(
                "title" => "Лечение каналов зуба",
                "link" => "",
            ),
            array(
                "title" => "Реставрация зубов",
                "link" => "",
            ),
            array(
                "title" => "Лечение зубов под микроскопом",
                "link" => "",
            ),
            array(
                "title" => "Чистка зубов",
                "link" => "",
            ),
            array(
                "title" => "Отбеливание зубов",
                "link" => "",
            ),
            array(
                "title" => "Лечение дёсен",
                "link" => "",
            ),
            array(
                "title" => "Хирургическая стоматология",
                "link" => "",
            ),
            array(
                "title" => "Элайнеры",
                "link" => "",
            ),
        ]
    ),
    array(
        "title" => "Специалисты",
        "link" => ""
    ),
    array(
        "title" => "Награды",
        "link" => ""
    ),
    array(
        "title" => "Новости",
        "link" => ""
    ),
    array(
        "title" => "Пациентам",
        "link" => "",
        "submenu" => [
            array(
                "title" => "Медицинское страхование",
                "link" => "",
            ),
            array(
                "title" => "Льготный кредит на лечение от Почта Банка",
                "link" => "",
            ),
            array(
                "title" => "Справка на налоговый вычет",
                "link" => "",
            ),
            array(
                "title" => "Документы",
                "link" => "",
            ),
            array(
                "title" => "Вопрос-ответ",
                "link" => "",
            ),
            array(
                "title" => "Стоматологический туризм",
                "link" => "",
            )
        ]
    ),
];
@endphp

<header class="{{$cssClass}} header" id="page-header">
    <div class="header__container container">
        <a class="header__logo logo" href="/">
            <img class="logo__img" src="/master/images/logo.svg" width="151" height="40" alt="Логотип Кремлевская стоматология">
        </a>

        <nav class="mobile-menu">
            <div class="mobile-menu__wrapper">
                <form class="mobile-menu__search-form search-form" action="">
                    <div class="form-field form-field--search">
                        <label class="visually-hidden form-field__label" for="">Поиск по сайту</label>
                        <input class="form-field__input" name="search" type="text" placeholder="Поиск по сайту">
                    </div>
                </form>

                <ul class="mobile-menu__list">
                    @foreach($menu as $item)
                        <li class="mobile-menu__item">
                            <a class="mobile-menu__link" href="">
                                {{ $item['title'] }}
                            </a>

                            @if(isset($item['submenu']))
                                <ul class="mobile-menu__sublist">
                                    @foreach($item['submenu'] as $subitem)
                                        <li class="mobile-menu__subitem">
                                            <a class="mobile-menu-sublink" href="">
                                                {{ $subitem['title'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>

                <div class="mobile-menu__copyright menu-copyright">
                    <ul class="menu-copyright__list">
                        <li class="menu-copyright__item">
                            <a class="menu-copyright__link" href="">Политика конфиденциальности</a>
                        </li>
                        <li class="menu-copyright__item">
                            <a class="menu-copyright__link" href="">Карта сайта</a>
                        </li>
                    </ul>
                </div>

                <a class="mobile-menu__logo logo" href="/">
                    <img class="logo__img" src="/master/images/logo.svg" width="151" height="40" alt="Логотип Кремлевская стоматология">
                </a>

                <div class="mobile-menu__contacts">
                    <a class="mobile-menu__phone" href="tel:+74912505040">+7 (4912) 50-50-40</a>
                    <a class="mobile-menu__mail" href="mailto:info@kremlinstom.ru">info@kremlinstom.ru</a>
                    <p class="mobile-menu__schedule">с 8:00 — 20:00, без выходных</p>
                </div>
            </div>
        </nav>

        <!-- <nav class="header__nav main-nav">
            <div class="main-nav__wrapper">
                <ul class="main-nav__list">
                    <li class="main-nav__item">
                        <a class="main-nav__link" href="">Клиника</a>
                    </li>
                </ul>
            </div>
        </nav> -->

        <div class="header__callback header-callback">
            <div class="header-callback__wrapper">
                <a class="header-callback__whatsapp" href="whatsapp://send/?phone=+79679615080">
                    <span class="visually-hidden">+79679615080</span>
                </a>
                <a class="header-callback__phone" href="tel:+74912505040">+7 (491) 250-50-40</a>
                <p class="header-callback__note">Единый контактный центр</span>
            </div>
        </div>
        <a class="btn btn--danger" href="">
            <svg class="btn__icon" viewBox="0 0 20 19" width="20" height="20" aria-hidden="true" focusable="false" role="img">
                <use xlink:href="#ico-tooth"></use>
            </svg>
            <span class="btn__text">У меня острая боль</span>
        </a>
    </div>
</header>