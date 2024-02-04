@extends('layouts.app')
    @section ('content')
        <div class="container-fluid custom-center custom-center-caption container__reviews" >
            <div class="row" style="margin-bottom: 40px;">
                {{-- ПРАВОЕ БОКОВОЕ МЕНЮ --}}
                <div class="col-sm-12 col-md-9 col-md-push-3 right-column-menu">
                    <div class="row">
                        <div class="col-lg-12">
                            @include('parts.caption-block', array('bg' => 'background-feedback'))
                        </div>

                        <div class="col-lg-12">
                            @if(isset($reviews))
                            <div class="review-wrapper">
                                <a data-toggle="modal" data-target="#btn-review" class="btn btn-purple">Оставить отзыв</a>
                               @foreach($reviews as $review)
                                  <div class="review-block">

                                          {!! $review->content !!}
                                      <h4>{{$review->author}}</h4>
                                  </div>
                               @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                    @if(isset($reviews))
                        {{ $reviews->links() }}
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

        {{-- MODAL REVIEW--}}
        <div class="modal fade modal_form" id="btn-review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" id="modal-review">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h3>Оставить отзыв</h3>
                    </div>
                    <div class="modal-body">
                        <div id="callback-wrap">
                            <form id="review" class="send_form" action="/send_review">
                                {{csrf_field()}}

                                <div class="input-group">
                                    <label>Представьтесь</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="input-group">
                                    <label>Ваш e-mail</label>
                                    <input type="text" name="email" class="form-control">
                                </div>

                                <div class="input-group">
                                    <label>Ваш отзыв</label>
                                    <textarea type="text" name="text" id="text"  placeholder="Вопрос или сообщение"></textarea>
                                </div>
                                <div class="pure-checkbox">
                                    <input  required id="checkbox_recommendation" name="checkbox" type="checkbox" checked>
                                    <label for="checkbox_recommendation">Я согласен на обработку персональной информации в соответствии с
                                        <a target="_blank" href="/docs/politics.pdf">Политикой конфиденциальности</a></label>
                                </div>
                                <div class="input-group">
                                    <div class="recapt" data-size="compact"></div>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button id="submitBtn_recommendation" type="submit" form="review" class="btn purple">Отправить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
