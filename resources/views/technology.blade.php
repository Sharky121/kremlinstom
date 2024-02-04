@extends('layouts.app')
    @section ('content')
        <div class="container-fluid custom-center tech custom-center-caption">
            <div class="row">

                <div class="col-sm-12 col-md-9 col-md-push-3 right-column-menu">
                    <div class="caption-block caption-block_background_service" style="background-image:url('{{ isset($page->pictures[0]) ? $page->pictures[0]->file : '/img_new/background-about.jpg' }}')" {{--@if(isset($page->pictures[0])) style="background-image: url('{{ $page->pictures[0]->file }}')" @endif--}}>
                        <div class="caption-block_info">
                            {{--@include('parts.breadcrumb',['bread'=>isset($bread)?$bread:[]])--}}
                            {{--<h1>{{ $page->title }}</h1>--}}
                            <h1>Оборудование и технологии</h1>
                            <p>{!! $page->small_content !!}</p>
                        </div>
                        {{--<div class="caption-background"></div>--}}
                    </div>
                    <div class="row tech-items">
                    @if(isset($technologies))
                        <?php $image_index = 0; ?> {{-- TODO: It's temporary. Change image names in database. --}}
                    @foreach($technologies as $technology)
                        <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
                            <a href="{{ $technology_url.$technology->url() }}" class="tech-item">
                                @if(isset($technology->pictures[0]))
                                {{--<img src="{{ $technology->pictures[0]->file }}" alt="{{ $technology->title }}">--}}
                                <img src="/img_new/tech/{{ ++$image_index }}.jpg" alt="{{ $technology->title }}"> {{-- TODO: It's temporary. Change image names in database. --}}
                                @endif
                                <div class="tech-item_info">
                                    <h3>{{ $technology->title }}</h3>
                                    <p>{{ $technology->small_content }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    @endif

                    </div>
                    @include('parts.asking-block')
                </div>
                <div class="col-sm-12 col-md-3 col-md-pull-9 left-column-menu">
                    @include('parts.left-block')
                    @include('parts.left-block-menu')
                    @include('parts.left-block-modules')
                    {{--  --}}
                </div>
            </div>
        </div>
    @endsection