@extends('layouts.app')
@section ('content')
    <div class="container-fluid custom-center custom-center-visit" style="background-color:#f5f7fa;margin-top:-10px">
        {{ $page->title }}
        <div class="appointment">
            <h2>Записаться на приём</h2>
            <small>Заполнение формы займёт не более 1 минуты.</small>
            <form class="send_form" action="/send_appointment">
                {{csrf_field()}}

                <div class="input-group">
                    <label for="name">Представьтесь*</label>
                    <input type="text" id="name" name="name" class="obligatory">
                </div>

                <div class="input-group">
                    <label for="tel">Ваш телефон*</label>
                    <input type="tel" spellcheck="false" id="tel" name="tel" class="obligatory">
                </div>

                <div class="input-group">
                    <label for="email">Ваш e-mail</label>
                    <input type="text" id="email" name="email">
                </div>

                <div class="input-group">
                    <label for="service">Выберите услугу</label>
                    <select name="service" id="service">
                        <option selected="selected"></option>
                        @if(isset($services))
                            @foreach($services as $service)
                                <option rel="{{ $service->id }}">{{ $service->title }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="input-group">
                    <label for="doctors">Выберите врача</label>
                    <select name="doctors" id="doctors">
                        <option rel="{{ $services->pluck('id')->implode(',') }}" selected="selected"></option>
                        @if(isset($workers))
                            @foreach($workers as $worker)
                                <option rel="{{ $worker->services->pluck('id')->implode(',') }}">{{ $worker->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="input-group input-group__two-inputs">
                    <label for="date">Выберите дату и время</label>
                    <input type="text" id="date" name="date" class="date_calendar">
                    <input type="text" id="time" name="time">
                </div>

                <div class="pisanina">Нажимая на кнопку ЗАПИСАТЬСЯ я даю свое согласие на обработку компанией ООО &laquo;Кремлёвская стоматология&raquo; моих персональных данных в соответствии с требованиями Федерального закона от 27.07.2006г. № 152-ФЗ &laquo;О&nbsp;персональных данных&raquo; и <a href="/docs/politics.pdf" target="_blank">Политикой обработки и защиты персональных данных</a>.</div>

                <div class="input-group">
                    <input type="submit" value="Записаться">
                    <small class="invalid-note">Не заполнены обязательные поля (со звёздочкой)!</small>
                </div>

            </form>
        </div>
    </div>

    <div id="not-filled">
        <div class="icon"></div>
        <small>Не заполнены обязательные поля (со звёздочкой)!</small>
        <div class="close"></div>
    </div>
@endsection