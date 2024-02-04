@extends('layouts.app')
@section ('content')
    <div class="container-fluid custom-center container__photos" style="margin-top: 40px;">
        <div class="row">
            {{-- ПРАВОЕ БОКОВОЕ МЕНЮ --}}
            <div class="col-sm-12 col-md-9 col-md-push-3">
                <div class="row" style="padding-top: 0">
                    <div class="col-lg-12 news">
                        @include('parts.caption-block',array('bg' => 'background-photo'))
                    </div>

                    <div class="col-lg-12">
                        <div class="photo-wrapper">
                            @if(isset($gallery))
                                <div class="">
                                      <div class="row">
                                        @foreach($gallery as $photo)
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 item">
                                                <a href="{{ $photo->file }}" data-lc-options='{"maxWidth":800}'  data-rel="lightcase:myCollection:slideshow" title="{{ $photo->title }}">
                                                    <img src="{{ $photo->small_file }}" alt="{{ $photo->title }}" style="max-width: 100%;">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if(isset($gallery))
                    {{ $gallery->links() }}
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