@extends('layouts.app')
    @section ('content')
        <div class="container-fluid custom-center custom-center-caption">
            <div class="contacts__head">
                <div class="white-overlay"></div>
                <h1>Контакты</h1>
                <div>
                    <span>Директор: <b>Архипенко Андрей Юрьевич</b></span>
                    <span><b>8 (4912) 50-50-40, 8 (800) 77-525-77</b></span>
                </div>
            </div>

            {{-- ЭТО SEO --}}
            <div style="display:none;" itemscope itemtype="http://schema.org/Organization">
                <span itemprop="name">ООО «Кремлевская стоматология»</span>
                <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <span itemprop="streetAddress">пл.Соборная, д.9</span>
                    <span itemprop="postalCode"> 390000</span>
                    <span itemprop="addressLocality">Рязань</span>,
                </div>
                <span itemprop="telephone">8 (800) 77-525-77</span>
                <span itemprop="email">info@kremlinstom.ru</span>
            </div>

            <div class="contacts__body">
                @if(isset($clinics))
                    <script src="//api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
                    @foreach($clinics as $clinic)
                        <div class="contacts__clinic">
                            <div class="contacts__clinic-photo" style="background-image: url('{{ "/images/251119/{$clinic->id}.jpg" }}')"></div>
                            <div class="contacts__clinic-info">
                                <div style="background-image:url('/img_new/clinic-landmark.svg')">{!! $clinic->address !!}</div>
                                <div style="background-image:url('/img_new/clinic-clock.svg')">{!! $clinic->grafik !!}</div>
                                <div style="background-image:url('/img_new/clinic-mail.svg')"><b>info@kremlinstom.ru</b></div>
                                <div style="background-image:url('/img_new/clinic-phone.svg')"><b>{!! $clinic->phone !!}</b></div>
                                <div class="contacts__clinic-taxi">
                                    <div class="btn btn-purple">Вызвать такси</div>
                                    <div class="ya-taxi-widget" data-size="xs" data-use-location="true" data-theme="normal" data-title="Вызвать такси" data-point-a="" data-point-b="{{ preg_replace('#([^,]+),(.+)#', '$2,$1', $clinic->coords) }}" data-ref="https%3A%2F%2Fwww.kremlinstom.ru%2F" data-proxy-url="https://3.redirect.appmetrica.yandex.com/route?start-lat={start-lat}&amp;start-lon={start-lon}&amp;end-lat={end-lat}&amp;end-lon={end-lon}&amp;ref={ref}&amp;appmetrica_tracking_id=1178268795219780156" data-description="{!! $clinic->address !!}"></div>
                                </div>
                            </div>
                            <div class="contacts__clinic-map" id="map_canvas{{ $clinic->id }}"></div>
                            <script type="text/javascript">
                                window.clinics = window.clinics || [];
                                window.clinics.push(JSON.parse('{!! $clinic->toJson() !!}'))
                            </script>
                        </div>
                    @endforeach
                @endif

                <script src="//yastatic.net/taxi-widget/ya-taxi-widget.js"></script>

                <script type="text/javascript">
                    ymaps.ready(function(){
                        window.clinics.forEach(function(item, i, arr) {
                            init('map_canvas' + item.id,item.address,item.coords.split(",").map(function(item) {
                                return item.trim();
                            }));
                        });

                        function callTaxi(event) {
                            event.currentTarget.parentNode.querySelector('div + div > a').click();
                        }

                        [].slice.call(document.querySelectorAll('.contacts__clinic-taxi div:first-of-type')).forEach(div => {
                            div.addEventListener('click',callTaxi);
                        });
                    });
                </script>
            </div>

    @endsection