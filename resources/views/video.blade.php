@extends('layouts.app')
    @section ('content')
        <div class="container-fluid custom-center container__videos" style="margin-top: 40px;">
            <div class="row" style="margin-bottom: 40px;">
                {{-- ПРАВОЕ БОКОВОЕ МЕНЮ --}}
                <div class="col-sm-12 col-md-9 col-md-push-3">
                    <div class="row">
                        <div class="col-lg-12 news">
                            @include('parts.caption-block')
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

                @if(isset($videos))
                    <div class="tech-block" style="margin-bottom: 20px;">
                        <div class="center">
                            @foreach($videos2 as $video)
                                <div class="tech-block_item">
                                    <iframe width="100%" height="145px" src="{{ $video->link }}"></iframe>
                                    <h3>{{ $video->title }}</h3>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endsection