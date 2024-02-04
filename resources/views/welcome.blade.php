@extends('layouts.app')
    @section ('content')
        <div class="container-fluid mobile-screen">
            <div class="row">
                <div class="col-xs-12 mobile-screen_info">
                    <a href="tel:88007752577" class="bigblack-text">8 (4912) 50-50-40</a><br>
                    {{--<span class="grey-text">Звонок бесплатный</span>--}}
                    <p>Рязань, пл. Соборная, д.9</p>
                    <span class="grey-text">с 8:00 до 20:00, без выходных</span>
                    <a href="mailto:info@kremlinstom.ru" class="mobile-screen_mail">info@kremlinstom.ru</a>
                </div>
            </div>

            {{--<div class="row mobile-screen_service">
                <div class="col-xs-6 mobile-screen_service-blocks">
                    <a id="color" href="/uslugi-i-tseny/services" style="background-color: rgba(225, 0, 92, 1);">Услуги и цены</a>
                </div>

                <div class="col-xs-6 mobile-screen_service-blocks">
                    <a id="color" href="/about/doctors" style="background-color: #30c1ee;">Наши врачи</a>
                </div>

                <div class="col-xs-6 mobile-screen_service-blocks mobile-screen_service-blocks_tour">
                    <a id="color" href="/tourism" style="background-color: rgba(169, 170, 174, 1);">Стоматологический <br>туризм</a>
                </div>

                <div class="col-xs-6 mobile-screen_service-blocks">
                    <a id="color" data-toggle="modal" data-target="#btn-review" style="background-color:rgba(202, 216, 102, 1);">Оставить отзыв</a>
                </div>
            </div>--}}

            {{-- MODAL REVIEW--}}
            <div class="modal fade modal_form" id="btn-review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h3>Оставить отзыв</h3>
                        </div>
                        <div class="modal-body">
                            <div id="callback-wrap">
                                <form id="review" class="send_form" action="/send_faq">
                                    {{csrf_field()}}

                                    <div class="input-group">
                                        <label>Представьтесь</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="input-group">
                                        <label>Ваш e-mail</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>

                                    <div class="input-group">
                                        <label>Ваш отзыв</label>
                                        <textarea type="text" name="text" id="text"  placeholder="Вопрос или сообщение"></textarea>
                                    </div>

                                    <div class="input-group">
                                        <div class="recapt" data-size="compact"></div>
                                    </div>
                                    <div class="pure-checkbox">
                                        <input  required id="checkbox_recommendation" name="checkbox" type="checkbox" checked>
                                        <label for="checkbox_recommendation">Я согласен на обработку персональной информации в соответствии с
                                            <a target="_blank" href="/docs/politics.pdf">Политикой конфиденциальности</a></label>
                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <button id="submitBtn_recommendation" type="submit" form="review" class="btn purple">Отправить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($banners))
            <style>
                .slide-discount p {
                    display: block!important;
                }
            </style>
        @endif

        <div class="container-fluid custom-center mobile-wrap">
                <div class="col-md-12 col-lg-12 main-banner">
                        <div class="slide-preloader"><div class="md-preloader"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="75" width="75" viewbox="0 0 75 75"><circle cx="37.5" cy="37.5" r="33.5" stroke-width="8"/></svg></div></div>
                        <div class="owl-carousel banner-carousel owl-theme">
                                @if(isset($banners))
                                        @foreach($banners as $banner)
                                        <div class="item">
                                            {{--<div class="mask"></div>--}}
                                            <div class="container-fluid banner-container">
                                                <div class="row">
                                                    <div class="col-xs-12 col-xs-offset-0 col-sm-12 col-sm-offset-0 col-md-6 col-md-offset-6 col-lg-5 col-lg-offset-6 table-container">
                                                        <div class="table-row">
                                                            <div class="table-cell">
                                                                <div class="slide-text">
                                                                    <h2 class="slide-caption__title">{{ $banner->title }}</h2>
                                                                    <div class="slide-discount">{!! $banner->content !!}</div>
                                                                    @if(!empty($banner->link))
                                                                        <a class="banner-link" href="{{ $banner->link }}">Подробнее</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-background item-background__desktop"@if(isset($banner->pictures[0])) style="background-image: url('{{ $banner->pictures[0]->file }}')" @endif></div>
                                            <div class="item-background item-background__mobile"@if(isset($banner->pictures[0])) style="background-image: url('{{ $banner->pictures[1]->file }}')" @endif></div>
                                        </div>
                                        @endforeach
                                @endif
                        </div>
                </div>

                {{--<div class="col-sm-12 col-md-6 col-lg-3" >
                    <div class="price_main-page">
                        <h2>Цены</h2>
                        <p>Стоимость основана на отличном качестве лечения и предоставлении гарантии на выполненные работы</p>
                        <a href="{{ isset($pages[28])?$pages[28]->url():'' }}" class="full_price">Полный прайс-лист</a>
                        @if(isset($services))
                            <p>или</p>
                            <a href="#" class="service_select">Выберите услугу</a>
                            <ul>
                                @foreach($services as $service)
                                    <li><a href="{{ $service_url.$service->url() }}">{{ $service->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>--}}

            <div class="row welcome-block">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <h1>Добро пожаловать в &laquo;Кремлёвскую стоматологию&raquo;!</h1>
                    <p>Наш стоматологический центр с командой опытных врачей различных специальностей — терапевтов, хирургов, имплантологов, ортопедов, ортодонтов — позаботится о красоте и здоровье ваших зубов!</p>
                    <p>Оказываем стоматологическую помощь детям и взрослым в Рязани и ближайших городах. Стоматологи занимаются вопросами восстановления функций и эстетики зубного ряда с применением современных технологий и нового оборудования. Мы предлагаем лечение зубов под микроскопом, терапию десен на аппарате Vector. Предварительная запись на прием помогает сэкономить время.</p>
                    <div class="welcome-block__links">
                        <a href="/about/roliki-o-klinike" style="background-image:url('/img_new/w-video.svg')">Видео о клинике</a>
                        <a href="/3d/" style="background-image:url('/img_new/w-tour.svg')">Виртуальный тур</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="owl-carousel welcome-carousel owl-theme">
                        @for($i=0; $i<4; $i++)
                            @if($i==2) @continue @endif {{-- nahuj vtoruju fotku --}}
                            <div class="item"><img src="/img_new/welcome{{$i+1}}.jpg" alt=""></div>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="col-lg-12 uslugi-container">
                <div class="uslugi">
                <h2>Услуги клиники</h2>
                <div style="clear:both;"></div>
                    <a href="/uslugi-i-tseny/implantaciya-zubov" class="vol"><img class="no_color_img" src="/img_new/service222.jpg"><div><span>Имплантация зубов</span></div></a>
                    <a href="/uslugi-i-tseny/ispravlenie-prikusa" class="vol"><img class="no_color_img" src="/img_new/service13.jpg"><div><span>Брекеты</span></div></a>
                    <a href="/uslugi-i-tseny/detskaya-stomatologiya" class="vol"><img class="no_color_img" src="/img_new/service15.jpg"><div><span>Детская стоматология</span></div></a>
                    <a href="/uslugi-i-tseny/rentgen-diagnostika" class="vol"><img class="no_color_img" src="/img_new/service01.jpg"><div><span>Рентген-диагностика</span></div></a>
                    <a href="/uslugi-i-tseny/chistka-zubov" class="vol"><img class="no_color_img" src="/img_new/service02.jpg"><div><span>Профессиональная чистка зубов</span></div></a>
                    <a href="/uslugi-i-tseny/otbelivanie-zubov" class="vol"><img class="no_color_img" src="/img_new/service03.jpg"><div><span>Отбеливание зубов</span></div></a>
                    <a href="/uslugi-i-tseny/lechenie-kariesa" class="vol"><img class="no_color_img" src="/img_new/service04.jpg"><div><span>Лечение кариеса зубов</span></div></a>
                    <a href="/uslugi-i-tseny/lechenie-zubov" class="vol"><img class="no_color_img" src="/img_new/service05.jpg"><div><span>Лечение каналов зуба</span></div></a>
                    <a href="/uslugi-i-tseny/restavraciya-zubov" class="vol"><img class="no_color_img" src="/img_new/service06.jpg"><div><span>Реставрация зубов</span></div></a>
                    <a href="/uslugi-i-tseny/protezirovanie" class="vol"><img class="no_color_img" src="/img_new/service111.jpg"><div><span>Протезирование зубов</span></div></a>
                    <a href="/uslugi-i-tseny/cerec" class="vol"><img class="no_color_img" src="/img_new/service08.jpg"><div><span>Протезирование CEREC</span></div></a>
                    <a href="/uslugi-i-tseny/udalenie-zubov" class="vol"><img class="no_color_img" src="/img_new/service09.jpg"><div><span>Удаление зубов</span></div></a>
                    <a href="/uslugi-i-tseny/udalenie-zubov-mudrosti" class="vol"><img class="no_color_img" src="/img_new/service10.jpg"><div><span>Удаление зуба мудрости</span></div></a>
                    <a href="/uslugi-i-tseny/hirurgicheskaya-stomatologiya" class="vol"><img class="no_color_img" src="/img_new/service12.jpg"><div><span>Хирургическая стоматология</span></div></a>
                    <a href="/uslugi-i-tseny/parodontologiya" class="vol"><img class="no_color_img" src="/img_new/service14.jpg"><div><span>Лечение дёсен</span></div></a>
                </div>
            </div>

            <div class="video-row-background">
                <div class="row video-row">
                    <h2>Отзывы о нашей работе</h2>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9" style="margin-bottom:20px">
                        <div class="owl-carousel video-carousel owl-theme" style="opacity:0;pointer-events:none">

                            <?php
                                $videos = array(
                                    (object)array('name' => 'Вячеслав', 'profession' => 'Преподаватель РГУ им. С.А.Есенина', 'youtube' => 'P84MSVsCGJg', 'preview' => 'vyacheslav.jpg'),
                                    (object)array('name' => 'Евгений', 'profession' => 'Артист', 'youtube' => 'RlSoIXlUq7k', 'preview' => 'evgeny.jpg'),
                                    (object)array('name' => 'Жанна', 'profession' => 'Госслужащий', 'youtube' => '4x52U8XEzuo', 'preview' => 'zhanna.jpg'),
                                    (object)array('name' => 'Ирина', 'profession' => 'Директор мед. центра', 'youtube' => 'CAWjaQPYoRc', 'preview' => 'irina.jpg'),
                                    (object)array('name' => 'Николай', 'profession' => 'Маркетолог', 'youtube' => '9s4u_r9WYD8', 'preview' => 'nikolay.jpg'),
                                    (object)array('name' => 'Яна', 'profession' => 'Инженер МЧС', 'youtube' => '4UooETdRlgQ', 'preview' => 'yana.jpg')
                                );
                            ?>

                            @foreach($videos as $video)
                                <div class="item">
                                    {{--<iframe width="1280" height="720" src="https://www.youtube.com/embed/{{$video->youtube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                                    <div class="youtube-preview" data-youtube-video="{{$video->youtube}}" style="background-image:url('/img_new/youtube/{{$video->preview}}')"></div>
                                    <div>
                                        <div class="video__name">{{$video->name}}</div>
                                        <div class="video__profession">{{$video->profession}}</div>
                                        {{--<a href="https://youtube.com" target="_blank" class="video__youtube"></a>--}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                        <div class="video__channel">
                            <a href="https://www.youtube.com/channel/UCG1o5j_gJKdhVFJG7GqAXZQ" target="_blank" class="video__channel-logo"></a>
                            <a href="https://www.youtube.com/channel/UCG1o5j_gJKdhVFJG7GqAXZQ" target="_blank" class="video__channel-go">Перейти на Youtube канал</a>
                            <a href="https://www.youtube.com/channel/UCG1o5j_gJKdhVFJG7GqAXZQ" target="_blank" class="video__channel-link">www.youtube.com/kremlinstom</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-12 ratings">
                <div class="width-wrapper">
                    <div>
                        <a href="https://yandex.ru/maps/org/kremlevskaya_stomatologiya/199825052187/?ll=39.754260%2C54.627386&oid=199825052187&ol=biz&z=17.78" target="_blank"><img src="/img_new/r-yandex.png" alt="Яндекс"></a>
                        <div>Рейтинг клиники 4.5/5</div>
                        <div data-rating="4.5"></div>
                    </div>
                    <div>
                        <a href="https://www.google.ru/maps/place/%D0%9A%D1%80%D0%B5%D0%BC%D0%BB%D0%B5%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D1%81%D1%82%D0%BE%D0%BC%D0%B0%D1%82%D0%BE%D0%BB%D0%BE%D0%B3%D0%B8%D1%8F/@54.6273982,39.7519167,17z/data=!4m12!1m6!3m5!1s0x4149e33d162d33fb:0xcbf41556c447dda4!2z0JrRgNC10LzQu9C10LLRgdC60LDRjyDRgdGC0L7QvNCw0YLQvtC70L7Qs9C40Y8!8m2!3d54.6273951!4d39.7541054!3m4!1s0x4149e33d162d33fb:0xcbf41556c447dda4!8m2!3d54.6273951!4d39.7541054" target="_blank"><img src="/img_new/r-google.png" alt="Google"></a>
                        <div>Рейтинг клиники 4.9/5</div>
                        <div data-rating="4.9"></div>
                    </div>
                    <div>
                        <a href="https://ryazan.zoon.ru/medical/kremlevskaya_stomatologiya_na_sadovoj_ulitse/" target="_blank"><img src="/img_new/r-zoon.png" alt="Zoon"></a>
                        <div>Рейтинг клиники 4.9/5</div>
                        <div data-rating="4.9"></div>
                    </div>
                    <div>
                        <a href="https://www.yell.ru/ryazan/com/kremlevskaya-stomatologiya-na-sadovoj_11955470/" target="_blank"><img src="/img_new/r-yell.png" alt="Yell"></a>
                        <div>Рейтинг клиники 5/5</div>
                        <div data-rating="5"></div>
                    </div>
                    <div>
                        <a href="https://ryazan.32top.ru/clinics/27043/" target="_blank"><img src="/img_new/r-32top.png" alt="32top"></a>
                        <div>Рейтинг клиники 5/5</div>
                        <div data-rating="5"></div>
                    </div>
                    <div>
                        <a href="https://cfo.spr.ru/ryazan-i-ryazanskiy-rayon/kremlevskaya-stomatologiya.html" target="_blank"><img src="/img_new/r-spr.png" alt="СПР"></a>
                        <div>Рейтинг клиники 4.9/5</div>
                        <div data-rating="4.9"></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-12">
                @if(isset($news))
                <div class="main-box main-box_news">
                    <h2>Новости</h2>
                    <div class="owl-carousel news-carousel owl-theme">
                        @foreach($news as $new)
                        <div class="item">
                            <a href="{{ $news_url . '#' . $new->id . '-' . str_slug($new->title) }}">
                                <div class="news-carousel_img" @if(isset($new->pictures[0])) style="background-image:url('{{ $new->pictures[0]->file }}')" @endif></div>
                                <p class="news-date">{{ $new->date->format('d.m.Y') }}</p>
                                <h3>{{ $new->title }}</h3>
                                <p class="block-with-text">{{ $new->small_content }}</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <a class="gallery-link welcome-news" href="{{ $news_url }}">Все новости</a>
                </div>
                @endif
            </div>

<div style="clear:both;"></div>

            {{--<div class="main-box main-text">
                <h1>Добро пожаловать в «Кремлевскую стоматологию»</h1>
                <p>Добро пожаловать в наш стоматологический центр! Команда опытных врачей различных специальностей — терапевтов, хирургов, имплантологов, ортопедов, ортодонтов — позаботится о красоте и здоровье ваших зубов!</p>
                <h2> Услуги стоматологии</h2>
                <p>Мы оказываем стоматологическую помощь детям и взрослым в Рязани и ближайших городах. Стоматологи занимаются вопросами восстановления функций и эстетики зубного ряда с применением современных технологий и нового оборудования. Мы предлагаем лечение зубов под микроскопом, терапию десен на аппарате Vector. Предварительная запись на прием помогает сэкономить время.</p>
                <p><span style="font-weight:bold">Направления оказания помощи в «Кремлевской стоматологии»:</span></p>
                <ul class="ul">
                    <li>диагностика (прицельные, панорамные снимки, 3D-томография);</li>
                    <li>лечение зубов (в т. ч. эндодонтическое);</li>
                    <li>профессиональная чистка и отбеливание зубов;</li>
                    <li>лечение болезней десен;</li>
                    <li>реставрация;</li>
                    <li>стоматологическая помощь детям;</li>
                    <li>удаление зубов, хирургические манипуляции;</li>
                    <li>коррекция прикуса брекетами;</li>
                    <li>протезирование;</li>
                    <li>имплантация.</li>
                </ul>
                <p>Услугами стоматологов можно воспользоваться недорого: мы работаем со страховыми компаниями (по ДМС) и оформляем необходимые документы для налогового вычета. </p>
                <p>Полный перечень стоматологических работ и цены смотрите в нашем прайсе.</p>
                <p>Вы у нас впервые? Получите подарочный сертификат на сумму в 1000 рублей при записи на прием!</p>
            </div>--}}

            <div class="col-sm-12 col-md-12 col-lg-12 recommendation" style="margin-bottom: 20px;">
                <div class="main-box advice">
                    <div class="row">
                        <div class="col-md-4 col-lg-3 advice-item">
                            <img src="/img_new/recommendation.svg" alt="">
                        </div>
                        <div class="col-md-8 col-lg-9 advice-item">
                            <h2 class="green-bottom">Получите рекомендации по уходу за полостью рта</h2>
                            <p>В нашей клинике разработана памятка по уходу за полостью рта.<br>Написав нам, вы можете получить её абсолютно бесплатно.</p>
                            <button data-toggle="modal" data-target="#btn-recommendation" class="btn purple">Получить</button>
                        </div>
                    </div>
                </div>
            </div>

         {{--MODAL RECOMMENDATION--}}
            @include('parts.modal-recomendation')

    @endsection