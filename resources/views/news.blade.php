@extends('layouts.app')
    @section ('content')
        <div class="container-fluid custom-center container__news">
            <div class="row" style="margin-bottom: 40px;">
                {{-- ПРАВОЕ БОКОВОЕ МЕНЮ --}}
                <div class="col-sm-12 col-md-9 col-md-push-3">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('parts.caption-block')
                        </div>

                        <div class="col-lg-12">
                            <div class="news-wrapper">
                                @foreach($news as $new)
                                    <div class="item item-news">
                                        <div id="{{ $new->id . '-' . str_slug($new->title) }}" class="anchor-offset"></div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="news-carousel_img" @if(isset($new->pictures[0])) style="background-image:url('{{ $new->pictures[0]->file }}')" @endif></div>
                                                <p class="news-date">{!! $new->date->format('d.m.Y') !!}</p>
                                            </div>
                                            <div class="col-lg-8">
                                                <h3>{{ $new->title }}</h3>
                                                {!!  $new->content !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if(isset($news))
                        {{ $news->links() }}
                    @endif
                    @include('parts.asking-block')
                </div>
                {{-- ЛЕВОЕ БОКОВОЕ МЕНЮ --}}
                <div class="col-sm-12 col-md-3 col-md-pull-9 left-column-menu">
                    @include('parts.left-block')
                    @include('parts.left-block-menu')
                    @include('parts.left-block-modules')
                    {{----}}
                </div>



            </div>
        </div>
    @endsection