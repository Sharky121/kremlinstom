@extends('layouts.app')
    @section ('content')
        <div class="container-fluid custom-center custom-center-caption container__discount">
            <div class="row" style="margin-bottom: 40px;">
                {{-- ПРАВОЕ БОКОВОЕ МЕНЮ --}}
                <div class="col-sm-12 col-md-9 col-md-push-3 right-column-menu">
                    @include('parts.caption-block', array('bg' => 'background-discount'))
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="">
                                    <div class="container-fluid action-wrapper">
                                        @foreach($discounts as $dis)
                                        <div class="anchor-offset" id="{{ $dis->id . '-' . str_slug($dis->title) }}"></div>
                                        <div class="row action-separate">
                                            <div class="col-sm-4 col-md-4 action-item">
                                                <div class="action-item_img">
                                                    @if(isset($dis->pictures[0]))
                                                        <img class="hidden-xs" src="{{ $dis->pictures[0]->file }}" alt="{{ $dis->title }}">
                                                    @endif
                                                </div>
                                                {{--<p class="action-item_date">{{ $dis->period }}</p>--}}
                                            </div>
                                            <div class="col-sm-8 col-md-8 action-item_text">
                                                <h3>{{ $dis->title }}</h3>
                                                {!! $dis->content !!}
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
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
    @endsection