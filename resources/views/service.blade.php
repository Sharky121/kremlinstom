@extends('layouts.app')
    @section ('content')
        <div class="container-fluid custom-center custom-center-caption container__services">
            <div class="row" style="margin-bottom: 40px;">
                {{-- ПРАВОЕ БОКОВОЕ МЕНЮ --}}
                <div class="col-sm-12 col-md-9 col-md-push-3 right-column-menu">
                    {{-- БЛОК ЗАГОЛОВКА --}}
                        @include('parts.caption-block')

                    {{-- БЛОК УСЛУГ --}}
                    @if(isset($services))
                    <div class="service-list" style="margin-top: 20px;">
                        <div class="row">
                        @foreach($services as $service)
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                <a href="{{ $page->url().$service->url() }}">
                                    <div class="service-item">
                                        {{--@if(isset($service->ico[0]))
                                        <img src="{{ $service->ico[0]->file }}" alt="{{ $service->title }}">
                                        @endif--}}
                                        <div class="service-item__image" style="background-image:url('{{ isset($service->ico[0]) ? $service->ico[0]->file : '/pictures/89.png' }}')"></div>
                                        <h3 class="border-bottom_color--blue">{{ $service->title }}</h3>
                                        <p>{{ $service->dop_content }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- БЛОК ЗАПИСАТЬСЯ --}}
                    <div class="reg-treatment-block reg-treatment-block_service" style="margin-bottom: 20px;">
                        <div id="reg-treatment-block_service-wrap">
                            <div class="center">
                                <h2>У меня острая боль или воспаление</h2>
                            </div>
                            <form class="send_form" action="/send_pain">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="name">Ваше имя</label>
                                            <input type="text" id="name" name="name" placeholder="Имя">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="tel">Ваш телефон</label>
                                            <input type="tel" spellcheck="false" id="tel" name="tel" placeholder="Телефон">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label for="time" class="select-time">Удобное время приёма</label>
                                            <input type="text" id="time" name="time" placeholder="Время">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="text-align:center">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="recapt" style="transform-origin:left top"></div>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="pure-checkbox">
                                            <input required id="checkbox_pain" name="checkbox" type="checkbox" checked>
                                            <label for="checkbox_pain">я согласен на обработку персональных данных в соответствии с <a target="_blank" href="/docs/politics.pdf">политикой конфиденциальности</a></label>
                                        </div>
                                        <button id="submitBtn_pain" type="submit" class="btn purple" class="btn purple">Записаться</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    {{-- БЛОК ОСТАЛИСЬ ВОПРОСЫ --}}
                    @include('parts.asking-block')
                </div>
                {{-- ЛЕВОЕ БОКОВОЕ МЕНЮ --}}
                <div class="col-sm-12 col-md-3 col-md-pull-9 left-column-menu">
                    {{--@include('parts.left-block')--}}
                    @include('parts.left-block-menu')
                    @include('parts.left-block-modules')
                    {{----}}
                </div>
            </div>
        </div>
    @endsection