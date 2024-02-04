<div class="filter-block filter-block_service">
    <a href="#service" class="active active-tab" data-toggle="tab">Услуги&nbsp;<span class="doctors-count">({{ $all_services->count() }})</span></a>
    {{--<a href="#ill" data-toggle="tab">Заболевания</a>--}}
</div>
{{-- БЛОК УСЛУГ --}}
<div class="tab-content">
    <div class="service-block tab-pane active" id="service">
        <ul>
        @foreach($all_services as $service)
            <li>
                <a href="{{ $service_url.$service->url() }}">
                    <div class="service-block_inner">
                        @if(isset($service->ico[0]))
                            <img src="{{ $service->ico[0]->file }}" alt="{{ $service->title }}">
                        @endif
                        <h3>{{ $service->title }}</h3>
                    </div>
                </a>
            </li>
        @endforeach
        </ul>
    </div>

    {{--<div class="service-block tab-pane" id="ill">--}}
        {{--<ul>--}}
            {{--@foreach($diseases as $disease)--}}
                {{--@if(isset($disease->services[0]))--}}
                {{--<li>--}}
                    {{--<a href="{{ $service_url.$disease->services->first()->url() }}">--}}
                        {{--<div class="service-block_inner">--}}
                            {{--@if(isset($disease->ico[0]))--}}
                                {{--<img src="{{ $disease->ico[0]->file }}" alt="{{ $disease->title }}">--}}
                            {{--@endif--}}
                            {{--<h3>{{ $disease->title }}</h3>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--@endif--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</div>--}}
</div>
