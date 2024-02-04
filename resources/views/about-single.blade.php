@extends('layouts.app')
@section ('content')
    <div class="container-fluid custom-center custom-center-caption container__about">
        <div class="row caption-wrapper">
            <div class="col-sm-12 col-md-9 col-md-push-3 right-column-menu">
                <div class="caption-block caption-block_background_service" style="background-image:url('{{ isset($page->pictures[0]) ? $page->pictures[0]->file : '/img_new/background-about.jpg' }}')" {{--@if(isset($page->pictures[0])) style="background-image: url('{{ $page->pictures[0]->file }}')" @endif--}}>
                    {{--@include('parts.breadcrumb',['bread'=>isset($bread)?$bread:[]])--}}
                    <div class="white-overlay"></div>
                    <div class="caption-block_info">
                        <h1>{{ $page->title }}</h1>
                        {!! $page->small_content !!}
                    </div>
                </div>
                <div class="text-content">
                    {!! $page->content !!}
                </div>

                {{--<div class="row features">
                    <div class="features-item col-md-4 col-lg-3">
                        <div class="features-item-wrap">
                            <img src="/images/happy-little-boy.svg" alt="" style="width: 100px;height: auto;">
                            <h3>25 384</h3>
                            <p>Благодарных пациентов, познакомившихся с нашей клиникой</p>
                        </div>
                    </div>
                    <div class="features-item col-md-4 col-lg-3">
                        <div class="features-item-wrap">
                            <img src="/images/people.svg" alt="" style="width: 100px;height: auto;">
                            <h3>21 212</h3>
                            <p>Обратившихся пациентов, улучшивших качество жизни</p>
                        </div>
                    </div>
                    <div class="features-item col-md-4 col-lg-3">
                        <div class="features-item-wrap">
                            <img src="/images/clock.svg" alt="" style="width: 100px;height: auto;">
                            --}}{{--13 april 2007 begin--}}{{--
                            <h3><span id="date"></span> лет</h3>
                            <p><span id="month"></span>Успешной работы клиники</p>
                        </div>
                    </div>
                    <div class="features-item col-md-4 col-lg-3">
                        <div class="features-item-wrap">
                            <img src="/images/implants.svg" alt="" style="width: 100px;height: auto;">
                            <h3>18 253</h3>
                            <p>Успешных имплантаций</p>
                        </div>
                    </div>
                    <div class="features-item col-md-4 col-lg-3">
                        <div class="features-item-wrap">
                            <img src="/images/molar.svg" alt="" style="width: 100px;height: auto;">
                            <h3>70 824</h3>
                            <p>Поставленных коронок</p>
                        </div>
                    </div>
                    <div class="features-item col-md-4 col-lg-3">
                        <div class="features-item-wrap">
                            <img src="/images/braces.svg" alt="" style="width: 100px;height: auto;">
                            <h3>1 183</h3>
                            <p>Количество пациентов, исправивших свой прикус</p>
                        </div>
                    </div>
                    <div class="features-item col-md-4 col-lg-3">
                        <div class="features-item-wrap">
                            <img src="/images/folder.svg" alt="" style="width: 100px;height: auto;">
                            <h3>2 574</h3>
                            <p>Сделанных компьютерных томографий</p>
                        </div>
                    </div>
                    --}}{{--<div class="features-item col-md-4 col-lg-3">--}}{{--
                        --}}{{--<div class="features-item-wrap">--}}{{--
                            --}}{{--<img src="/images/consult.svg" alt="" style="width: 100px;height: auto;">--}}{{--
                            --}}{{--<h3>ORTHOPHOS SL 3D</h3>--}}{{--
                            --}}{{--<p>Единственный в городе рентген</p>--}}{{--
                        --}}{{--</div>--}}{{--
                    --}}{{--</div>--}}{{--
                </div>--}}

                <div class="row features-new">
                    <div class="features-new__item"><img src="/img_new/features/1.svg" alt=""><div>Работаем с 2007 года</div></div>
                    <div class="features-new__item"><img src="/img_new/features/2.svg" alt=""><div>Все виды стоматологических услуг</div></div>
                    <div class="features-new__item"><img src="/img_new/features/3.svg" alt=""><div>Индивидуальный подход</div></div>
                    <div class="features-new__item"><img src="/img_new/features/4.svg" alt=""><div>Без очередей и ожидания</div></div>
                    <div class="features-new__item"><img src="/img_new/features/5.svg" alt=""><div>Высокий профессионализм</div></div>
                    <div class="features-new__item"><img src="/img_new/features/6.svg" alt=""><div>Лучшее оборудование и технологии</div></div>
                    <div class="features-new__item"><img src="/img_new/features/7.svg" alt=""><div>Гарантия на выполненную работу</div></div>
                    <div class="features-new__item"><img src="/img_new/features/8.svg" alt=""><div>Безупречная репутация</div></div>
                </div>

                <div id="certificates" class="anchor-offset"></div>
                <div class="text-content sertificats">
                    <div class="title">Наши лицензии</div>
    <div style="clear:both;"></div>
                    <div class="owl-carousel owl-theme license-carousel">
                        <a href="/images/031218/1.jpg" data-rel="lightcase:myCollection:slideshow" class="item"><img src="/images/031218/1.jpg"></a>
                        <a href="/images/031218/2.jpg" data-rel="lightcase:myCollection:slideshow" class="item"><img src="/images/031218/2.jpg"></a>
                        <a href="/images/031218/3.jpg" data-rel="lightcase:myCollection:slideshow" class="item"><img src="/images/031218/3.jpg"></a>
                        <a href="/images/031218/1.jpg" data-rel="lightcase:myCollection:slideshow" class="item"><img src="/images/031218/1.jpg"></a>
                        <a href="/images/031218/2.jpg" data-rel="lightcase:myCollection:slideshow" class="item"><img src="/images/031218/2.jpg"></a>
                        <a href="/images/031218/3.jpg" data-rel="lightcase:myCollection:slideshow" class="item"><img src="/images/031218/3.jpg"></a>
                    </div>
                </div>

               @include('parts.asking-block')
            </div>

            <div class="col-sm-12 col-md-3 col-md-pull-9 left-column-menu">
                @include('parts.left-block-menu')
                @include('parts.left-block-modules')
            </div>
        </div>
    </div>
@endsection