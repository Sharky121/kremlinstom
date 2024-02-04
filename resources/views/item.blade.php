@extends('layouts.app')
    @section ('content')
        <div class="container-fluid custom-center" style="margin-top: 40px;">
            <div class="row" style="margin-bottom: 40px;">
                {{-- ПРАВОЕ БОКОВОЕ МЕНЮ --}}
                <div class="col-sm-12 col-md-9 col-md-push-3">
                    {{-- БЛОК ЗАГОЛОВКА --}}
                    @include('parts.caption-block')
                    {{-- БЛОК ЗАПИСАТЬСЯ --}}
                    <div class="reg-treatment-block reg-treatment-block_service" style="margin-bottom: 20px;">
                        <div class="center">
                            <h2>У меня <span>острая боль</span> или <span>воспаление</span></h2>
                        </div>
                        <form action="">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Ваше имя</label>
                                        <input type="text" id="name" placeholder="Имя">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Ваш телефон</label>
                                        <input type="text" id="tel" placeholder="Телефон">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="time" class="select-time">Удобное время приёма</label>
                                        <select>
                                            <option value="volvo">12:00</option>
                                            <option value="saab">12:30</option>
                                            <option value="mercedes">13:00</option>
                                            <option value="audi">13:30</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 center">
                                    <button class="btn purple">Записаться</button>
                                </div>

                            </div>
                        </form>
                        <p>Поле обязательное для заполнения</p>
                    </div>
                    {{-- БЛОК УСЛУГ --}}
                    @if(isset($services))
                    <div class="service-list" style="margin-top: 20px;">
                        <div class="row">
                        @foreach($services as $service)
                            <div class="col-lg-4">
                                <a href="{{ $page->url().$service->url() }}">
                                    <div class="service-item">
                                        @if(isset($service->ico[0]))
                                        <img src="{{ $service->ico[0]->file }}" alt="{{ $service->title }}">
                                        @endif
                                        <h3 class="border-bottom_color--blue">{{ $service->title }}</h3>
                                        <p>{{ $service->dop_content }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    @endif
                    {{-- БЛОК ОСТАЛИСЬ ВОПРОСЫ --}}
                    @include('parts.asking-block')
                </div>

                {{-- ЛЕВОЕ БОКОВОЕ МЕНЮ --}}
                <div class="col-sm-12 col-md-3 col-md-pull-9">
                    @include('parts.left-block')
                    @include('parts.left-block-menu')
                    @include('parts.left-block-modules')
                    {{----}}
                </div>
            </div>
        </div>
    @endsection
