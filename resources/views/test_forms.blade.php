@extends('layouts.app')
    @section ('content')

        <div class="container-fluid custom-center" style="margin-top: 40px;">
            <div class="row" style="margin-bottom: 40px;">
                {{-- ПРАВОЕ БОКОВОЕ МЕНЮ --}}
                <div class="col-sm-12 col-md-9 col-md-push-3">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('parts.caption-block')
                        </div>

                        <div class="col-lg-12">
                            <div class="news-wrapper">
                                <form  method="POST" action="/send_test">
                                    {{csrf_field()}}
                                    <input type="text" id="name" name="name" placeholder="Имя">
                                    <input type="text" id="tel" name="tel" placeholder="Телефон">
                                    <textarea type="text" name="text" id="text"  placeholder="Вопрос или сообщение"></textarea>

                                    <div class="pure-checkbox">
                                        <input required id="checkbox_faq" name="checkbox" type="checkbox" checked>
                                        <label for="checkbox_faq">
                                            Cогласен на обработку <a target="_blank" href="/docs/politics.pdf">Персональных данных.</a>
                                        </label>
                                    </div>
                                    <div class="recapt"></div>
                                    <div class="col-xs-12 mess_ok">
                                        {{Session::has('send_ok')?Session::get('send_ok'):''}}
                                    </div>
                                    <div class="col-xs-12 error_mess">
                                        @if($errors->has())
                                            @foreach ($errors->all() as $message)
                                                {{ $message }}<br>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button type="submit"  class="btn purple">Отправить</button>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="news-wrapper">
                                <form class="send_form" method="POST" action="/send_test2">
                                    {{csrf_field()}}
                                    <input type="text" id="name" name="name" placeholder="Имя">
                                    <input type="text" id="tel" name="tel" placeholder="Телефон">
                                    <textarea type="text" name="text" id="text"  placeholder="Вопрос или сообщение"></textarea>

                                    <div class="pure-checkbox">
                                        <input required id="checkbox_faq" name="checkbox" type="checkbox" checked>
                                        <label for="checkbox_faq">
                                            Cогласен на обработку <a target="_blank" href="/docs/politics.pdf">Персональных данных.</a>
                                        </label>
                                    </div>
                                    <div class="recapt"></div>
                                    <div class="col-xs-12 mess_ok">
                                        {{Session::has('send_ok')?Session::get('send_ok'):''}}
                                    </div>
                                    <div class="col-xs-12 error_mess">
                                        @if($errors->has())
                                            @foreach ($errors->all() as $message)
                                                {{ $message }}<br>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button type="submit"  class="btn purple">Отправить</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
