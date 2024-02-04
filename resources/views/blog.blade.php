@extends('layouts.app')
@section ('content')
    <div class="container-fluid custom-center custom-center-caption">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-md-push-3 right-column-menu our-blog">
                @include('parts.caption-block',array(/*'fullwidth' => !isset($blog_childs), */'bg' => 'background-blog'/*, 'adaptiveHeight' => true*/))

                @if(isset($blog_childs))
                    @foreach($blog_childs as $blog)
                    <a class="text-content" href="{{ $blog_url.$blog->url() }}">
                        <div class="container-fluid">
                            <div class="row">
                                {{--@if(isset($blog->gallery[0]))
                                <div class="col-sm-12 col-md-6">
                                    <img src="{{ $blog->gallery[0]->file }}" style="max-width:100%;" alt="{{ $blog->title }}">
                                </div>
                                @endif--}}

                                <div class="col-sm-12 {{--@if(isset($blog->gallery[0])) col-md-6 @endif--}}">
                                    <small>{{$blog->date->format("d.m.Y")}}</small>
                                    <h3>{{ $blog->title }}</h3>
                                    {!! $blog->small_content !!}
                                    <br>
                                    {{--<a class="gallery-link" href="{{ $blog_url.$blog->url() }}">Читать далее</a>--}}
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                @else
                    <div class="text-content text-content__blog" style="margin-top: 20px;margin-bottom: 20px;">
                        <small class="pull-right">{{$page->date->format("d.m.Y")}}</small>
                        {!! $page->content !!}

                        @if(isset($page->gallery))
                            <div class="container-fluid">
                                <div class="owl-carousel sert-carousel owl-theme">
                                    @foreach($page->gallery as $cert)
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






                @endif

                @include('parts.asking-block')
            </div>
            <div class="col-sm-12 col-md-3 col-md-pull-9 left-column-menu">
                {{--@include('parts.left-block')--}}
                @include('parts.left-block-menu')
                @include('parts.left-block-modules')
                {{--  --}}
            </div>
        </div>
    </div>
@endsection