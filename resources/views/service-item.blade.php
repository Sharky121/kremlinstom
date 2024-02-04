@extends('layouts.app')
    @section ('content')
        <div class="container-fluid custom-center custom-center-caption">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-md-push-3 right-column-menu" itemscope itemtype="https://schema.org/Product">
                    <div class="caption-block caption-block_background_service"
                         style="background-image: url('{{ isset($parent_page->pictures[0]) ? $parent_page->pictures[0]->file : '/img_new/background-about.jpg' }}')">
                        <div class="white-overlay"></div>
                        <div class="caption-block_info">
                            {{--@include('parts.breadcrumb',['bread'=>isset($bread)?$bread:[]])--}}
                            <h1 itemprop="name">{{ $page->title }}</h1>
                            <p itemprop="description">{{ $page->dop_content }}</p>
                        </div>
                    </div>

                    @if(isset($page->prices))
                        <div class="info-block white-box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table>
                                        <tbody>
                                            {{--<tr>
                                                <th>Услуги</th>
                                                <th>Цены</th>
                                            </tr>--}}
                                            @foreach($page->prices as $price)
                                                <tr itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                                                    <td itemprop="name">{{ $price->title }}</td>
                                                    <td><span>{{ $price->price }}</span><span style="display:none;" itemprop="priceCurrency" content="RUB"></span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                        <div style="display:none;" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                            <div itemprop="name">{{ $page->title }}</div>
                            <div itemprop="price" content="0">0</div>
                            <div itemprop="priceCurrency" content="RUB"></div>
                        </div>
                    @endif

                    @if(isset($page->workers)&&$page->workers->count()>0)
                        <div class="info-block you-take-block white-box" style="margin-top: 20px;">
                            <h2>Вас принимают</h2>
                            <div class="owl-carousel doctors-carousel_service owl-theme">
                                @foreach($page->workers as $worker)
                                    <div class="item">
                                        <div class="doctor-item">
                                            <a href="{{ $worker_url.$worker->url() }}">
                                                @if(isset($worker->pictures[0]))
                                                    <div class="photo-border" style="background-image:url('{{ $worker->pictures[0]->file }}')">
                                                        {{--<img src="{{ $worker->pictures[0]->file }}" alt="{{ $worker->name }}">--}}
                                                    </div>
                                                @endif

                                                <h3>{{ $worker->name }}</h3>
                                                <p>{{ $worker->position }}</p>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                @if(isset($page->content_blocks) && $page->content_blocks->count()>0)
                    @foreach($page->content_blocks as $block)
                    <div class="info-block white-box" style="margin-top: 20px;background-size: cover;
                    @if(isset($block->pictures[0])) background-image: url('{{ $block->pictures[0]->file }}') @endif ">
                        <h2>{{ $block->title }}</h2>
                        {{-- контент блока --}}
                        {!! $block->content !!}
                    </div>
                    @endforeach
                @endif
                    <div class="reg-treatment-block" style="margin-top: 20px;">
                        <img src="/img_new/treatment.svg" alt="">
                        <div id="reg-treatment-block_wrap">
                            <div class="center">
                                <h2>Записаться на лечение зубов</h2>
                            </div>
                            <form id="reg-treatment-block" class="send_form" action="/send_reg-treatment">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Ваше имя</label>
                                            <input type="text" id="name" name="name" placeholder="Имя">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Ваш телефон</label>
                                            <input type="tel" spellcheck="false" id="tel" name="tel" placeholder="Телефон">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="recapt" style="transform-origin:left top"></div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="pure-checkbox">
                                            <input required id="checkbox_reg-treatment" name="checkbox" type="checkbox" checked>
                                            <label for="checkbox_reg-treatment">
                                                Cогласен на обработку персональных данных в соответствии с <a target="_blank" href="/docs/politics.pdf">политикой конфиденциальности</a>
                                            </label>
                                            <button id="submitBtn_gift_reg-treatment" class="btn purple">Записаться</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-md-pull-9 left-column-menu">
                    @include('parts.left-block')
                    @include('parts.left-block-menu')
                    @include('parts.left-block-modules')
                </div>
            </div>
        </div>
    @endsection