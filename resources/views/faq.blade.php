@extends('layouts.app')
    @section ('content')
        <div class="container-fluid custom-center custom-center-caption">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-9 col-lg-push-3 right-column-menu">
                    @include('parts.caption-block',array('bg' => 'background-faq'))
                    <div class="row">
                        @if(isset($faq_quests) && $faq_quests->count()>0)
                        <div class="col-lg-12" style="margin-bottom: 40px;">
                            <div class="often-question">
                                {{--@include('parts.breadcrumb',['bread'=>isset($bread)?$bread:[]])--}}
                                {{--<h1>Часто задаваемые вопросы</h1>--}}
                                @foreach($faq_quests as $fquest)
                                <div class="question-item flag">
                                    {!! $fquest->content !!}
                                    @if($fquest->dop_content)
                                        {!! $fquest->dop_content !!}
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>

                        @endif
                        @if(isset($quests) && $quests->count()>0)
                        <div class="col-lg-12">
                            <div class="your-question">
                                <h2>Ваши вопросы</h2>
                                @foreach($quests as $quest)
                                <div class="question-item flag">
                                    <a href="#">{!! $quest->content !!}</a>
                                    <span class="author">{{ $quest->author }}, {{ $quest->date->format('d.m.Y') }}</span>
                                    <p>{!! $quest->dop_content !!}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-12" style="margin-bottom: 40px;">
                            @include('parts.asking-block')
                        </div>
                    </div>
                </div>

                {{-- ЛЕВОЕ БОКОВОЕ МЕНЮ --}}
                <div class="col-sm-12 col-md-3 col-md-pull-9 left-column-menu">
                    @include('parts.left-block')
                    @include('parts.left-block-menu')
                    @include('parts.left-block-modules')
                </div>

            </div>
        </div>
    @endsection