@extends('layouts.app')
    @section ('content')
        <div class="container-fluid custom-center custom-center-caption container__doctors">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-md-push-3 right-column-menu">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="caption-block-doc">
                                <div class="caption-block_info-doc" @if($page -> id == 3) style="color:rgba(255,255,255,0.8)!important;" @endif>
                                    {{--@include('parts.breadcrumb',['bread'=>isset($bread)?$bread:[]])--}}
                                    <h1>{{ $page->title }}</h1>
                                    {!! $page->small_content !!}
                                    @if($page -> id == 3)
                                        <div class="director-rew">
                                            <a class="review-director" data-toggle="modal" data-target="#btn-review_director">Написать директору</a>
                                        </div>
                                    @endif

                                </div>
                                @if(isset($page->pictures_top[0]))
                                    <img src="{{ $page->pictures_top[0]->file }}" alt="{{ $page->pictures_top }}">
                                @endif

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="text-content" style="margin-top: 20px;margin-bottom: 20px;">
                                {!! $page->content !!}
                            </div>
                        </div>

                        <div class="col-lg-12">
                            @if(isset($page->certificates))
                                <div class="doctor-sert">
                                    <h2>Сертификаты</h2>
                                    <div class="owl-carousel sert-carousel owl-theme">
                                        @foreach($page->certificates as $cert)
                                            <div class="item">
                                                <div class="table-block">
                                                    <a href="{{ $cert->file }}" data-lc-options='{"maxWidth":800}'  data-rel="lightcase:myCollection:slideshow" title="{{ $cert->title }}">
                                                        <img src="{{ $cert->file }}" alt="{{ $cert->title }}">
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-lg-12">
                            @if(isset($page->experiences))
                                <div class="doctor-work">
                                    <div class="owl-carousel work-carousel owl-theme">
                                        @foreach($page->experiences as $exp)
                                            <div class="item">
                                                <div class="work-carousel_item">
                                                    <h3>{{ $exp->title }}</h3>
                                                    {!! $exp->content !!}
                                                </div>
                                                <div class="work-carousel_img">
                                                    @if(isset($exp->pictures[0]))
                                                        <img src="{{ $exp->pictures[0]->file }}" alt="">
                                                        <div class="before-after">
                                                            <a href="#" class="before">До</a>
                                                            <a href="#" class="after">После</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            @endif
                        </div>

                        <div class="col-lg-12">
                            <div class="reg-treatment-block" style="margin-top: 20px;">
                                <img src="/img_new/treatment.svg" alt="">
                                <div id="reg-treatment-block_wrap">
                                    <div class="center">
                                        <h2>Записаться на лечение зубов</h2>
                                    </div>
                                    <form id="reg-treatment-block" class="send_form" action="/send_reg-treatment">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="name">Ваше имя</label>
                                                    <input type="text" id="name" name="name" placeholder="Имя">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="name">Ваш телефон</label>
                                                    <input type="tel" spellcheck="false" id="tel" name="tel" placeholder="Телефон">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="recapt" style="transform-origin:left top"></div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <div class="pure-checkbox">
                                                    <input required id="checkbox_reg-treatment" name="checkbox" type="checkbox" checked>
                                                    <label for="checkbox_reg-treatment">
                                                        Cогласен на обработку персональных данных в соответствии с <a target="_blank" href="/docs/politics.pdf">политикой конфиденциальности</a>
                                                    </label>
                                                    <button id="submitBtn_gift_reg-treatment" class="btn purple">Записаться</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-12 col-md-3 col-md-pull-9 left-column-menu">
                    {{--@include('parts.left-block')--}}
                    @include('parts.left-block-menu')
                </div>
            </div>
        </div>


        {{-- MODAL REVIEW--}}
        <div class="modal fade modal_form" id="btn-review_director" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h3>Написать директору</h3>
                    </div>
                    <div class="modal-body">
                        <form id="director" class="send_form" action="/send-director">
                            {{csrf_field()}}

                            <div class="input-group">
                                <label>Представьтесь</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="input-group">
                                <label>Ваше обращение</label>
                                <textarea  type="text" name="text" id="text"  placeholder="Вопрос или сообщение"></textarea>
                            </div>

                            <div class="pure-checkbox">
                                <input  required id="checkbox_recommendation" name="checkbox" type="checkbox" checked>
                                <label for="checkbox_recommendation">Я согласен на обработку персональной информации в соответствии с
                                    <a target="_blank" href="/docs/politics.pdf">Политикой конфиденциальности</a></label>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="submitBtn_recommendation" type="submit" form="director" class="btn purple">Отправить</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection