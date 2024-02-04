@extends('layouts.app')
@section ('content')
    <div class="container-fluid custom-center" style="margin-top: 40px;">
        <div class="row" style="margin-bottom: 40px;">
            {{-- ПРАВОЕ БОКОВОЕ МЕНЮ --}}
            <div class="col-sm-12 col-md-9 col-md-push-3">
                <div class="row">
                    <div class="col-lg-12 news">
                        @include('parts.caption-block')
                    </div>

                    <div class="col-lg-12">
                        @if(isset($gallery))
                            <div class="license-block" style="margin-bottom: 20px;">
                                <div class="owl-carousel license-carousel owl-theme">
                                    @foreach($gallery as $photo)
                                        <div class="item">
                                            <div class="round">
                                                <a href="{{ $photo->file }}" data-lc-options='{"maxWidth":1200}'  data-rel="lightcase:myCollection:slideshow" title="{{ $photo->title }}">
                                                    <img  src="{{ $photo->file }}" alt="{{ $photo->title }}" max-width="100%">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
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
