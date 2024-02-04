{{-- БЛОК ВРАЧИ --}}
@if(!isset($no_worker))
<div class="doctors-block_collapse">
    <a href="#">Врачи клиники</a>
    <ul>
    @foreach($all_workers as $worker)
        <li>
            <a href="{{ $worker_url.$worker->url() }}">
                <div class="doctors-block-inner">
                    @if(isset($worker->pictures[0]))
                    <img src="{{ $worker->pictures[0]->file }}" alt="{{ $worker->name }}">
                    @endif
                    <div class="doctors-block_item-text">
                        <h3>{{ $worker->name }}</h3>
                        <p>{{ $worker->position }}</p>
                    </div>
                </div>
            </a>
        </li>
    @endforeach
    </ul>
</div>
@endif

{{-- БЛОК УСЛУГ --}}
@if(!isset($no_service))
<div class="service-block_collapse">
    <a href="#">Услуги</a>
    <ul>
    @foreach($all_services as $i => $service)
        <li>
            <a href="{{ $service_url.$service->url() }}">
                <div class="service-block_inner">
                    @if(isset($service->ico[0]))
                    {{--<img src="{{ $service->ico[0]->file }}" alt="{{ $service->title }}">--}}
                    <img src="{{ sprintf('/img_new/service%02d.png',$i+1) }}" alt="{{ $service->title }}">
                    @endif
                    <div class="doctors-block_item-text">
                        <h3>{{ $service->title }}</h3>
                    </div>
                </div>
            </a>
        </li>
        @if($i==4) @break @endif {{-- TODO: this should be done more graceful way --}}
    @endforeach
        <li class="with-button"><a href="{{ $service_url }}">Показать всё</a></li>
    </ul>
</div>
@endif

{{-- БЛОК БЛОГ --}}
{{--@if(!isset($no_blog) && $show_blog)
    <div class="doctors-block_collapse doctors-blog_collapse">
        <a href="#">Блог</a>
        <ul>
            @foreach($blog_menu as $i => $blog)
                <li>
                    <a href="{{ $blog_url.$blog->url() }}">
                        <div class="doctors-block-inner">
                            --}}{{--@if(isset($blog->gallery[0]))
                                <img src="{{ $blog->gallery[0]->file }}" alt="{{ $blog->title }}">
                            @endif--}}{{--
                            <div class="doctors-block_item-text">
                                <h3>{{ $blog->title }}</h3>
                            </div>
                        </div>
                    </a>
                </li>
                @if($i==4) @break @endif --}}{{-- TODO: this should be done more graceful way --}}{{--
            @endforeach
                <li class="with-button"><a href="{{ $blog_url }}">Показать всё</a></li>
        </ul>
    </div>
@endif--}}

@if(!isset($no_discounts) && $show_discounts)
    <div class="doctors-block_collapse doctors-blog_collapse">
        <a href="#">Акции</a>
        <ul>
            @foreach($discounts_menu as $i => $dis)
                <li>
                    <a href="{{ $dis_url. '#' . $dis->id . '-' . str_slug($dis->title) }}">
                        <div class="doctors-block-inner">
                            <div class="doctors-block_item-text">
                                <h3>{{ $dis->title }}</h3>
                            </div>
                        </div>
                    </a>
                </li>
                @if($i==4) @break @endif {{-- TODO: this should be done more graceful way --}}
            @endforeach
                <li class="with-button"><a href="{{ $dis_url }}">Показать всё</a></li>
        </ul>
    </div>
@endif

{{-- БЛОК ТЕХНОЛОГИИ --}}
{{--@if(!isset($no_technology))
<div class="tech-block_collapse" style="margin-bottom: 20px;">
    <a href="#">Технологии</a>
    <ul>
        @foreach($all_technologies as $technology)
            <li>
                <a href="{{ $technology_url.$technology->url() }}">
                    <div class="service-block_inner service-block_inner-tech">
                        @if(isset($technology->pictures[0]))
                            <div class="border-tech_left-menu">
                                <img src="{{ $technology->pictures[0]->file }}" alt="{{ $technology->title }}">
                                <h3 class="tech-left-menu_cap">{{ $technology->title }}</h3>
                            </div>
                        @endif
                    </div>
                </a>
            </li>
        @endforeach
        <a class="gallery-link" href="/about/ispolzuemye-tekhnologii">Все технологии</a>
    </ul>

</div>
@endif--}}