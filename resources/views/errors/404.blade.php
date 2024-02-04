@extends('layouts.app')

@section ('content')
    <div class="container-fluid custom-center custom-center-caption container__about">
        <div class="row caption-wrapper">
            <div class="col-sm-12 col-md-9 col-md-push-3 right-column-menu">
                <div class="text-content">
                    <img src="/img_new/404.png" alt="Страница не найдена">
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