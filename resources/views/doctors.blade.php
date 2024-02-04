@extends('layouts.app')
    @section ('content')
        <div class="container-fluid custom-center custom-center-caption container__doctors">
            <div class="row" style="margin-bottom: 40px;">
                {{-- ПРАВОЕ БОКОВОЕ МЕНЮ --}}

                <div class="col-sm-12 col-md-9 col-md-push-3 right-column-menu">
                    <div class="caption-block caption-block_background_our-doctors" style="background-image:url('{{ isset($page->pictures[0]) ? $page->pictures[0]->file : '/img_new/background-about.jpg' }}')" {{--@if(isset($page->pictures[0])) style="background-image: url('{{ $page->pictures[0]->file }}')" @endif--}}>
                        <div class="white-overlay"></div>
                        <div class="caption-block_info">
                            {{--@include('parts.breadcrumb',['bread'=>isset($bread)?$bread:[]])--}}
                            <h1>{{ $page->title }}</h1>
                            {!! $page->small_content !!}
                        </div>
                        {{--<div class="caption-background"></div>--}}
                    </div>

                    <div class="doctors-list" style="margin-top: 20px;margin-bottom: 20px;">
                        <div class="row">
                        @foreach($workers as $worker)
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3" data-clinic="{{$worker->clinic_id}}" data-spec="{{ $worker->specializations->implode('title',', ') }}">
                                <div class="doctor-item">
                                    <a href="{{ $worker_url.$worker->url() }}">
                                        <div class="photo-border">
                                            <div class="doctor-image" @if(isset($worker->pictures[0])) style="background-image:url('{{ $worker->pictures[0]->file }}')" @endif></div>
                                            {{--@if(isset($worker->pictures[0]))
                                                <img src="{{ $worker->pictures[0]->file }}" alt="{{ $worker->name }}" >
                                            @endif--}}
                                        </div>
                                        <h3>{{ $worker->name }}</h3>
                                        <p>{{ $worker->position }}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    @if(isset($workers))
                        {{ $workers->links() }}
                    @endif
                    @include('parts.asking-block')
                </div>
                {{-- ЛЕВОЕ БОКОВОЕ МЕНЮ --}}
                <div class="col-sm-12 col-md-3 col-md-pull-9 left-column-menu">
                    {{--@include('parts.left-block')--}}
                    @include('parts.left-block-menu')
                    @include('parts.left-block-modules')
                    {{----}}
                </div>
            </div>


        </div>
    @endsection