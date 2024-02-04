<footer>

    <div class="prefooter">
        <div class="prefooter__width-wrapper">
            <a href="/" class="logo-block_logo-img"></a>
            <div class="prefooter__phones">
                <a href="tel:84912505040">8 (4912) 50-50-40</a>
                <a href="tel:84912284050">8 (4912) 28-40-50</a>
                <a href="tel:88007752577">8 (800) 77-525-77</a>
            </div>
            <div class="prefooter__buttons">
                <a data-toggle="modal" data-target="#btn-callback" class="btn purple">Обратный звонок</a>
                <a href="/visit" class="btn purple">Записаться на приём</a>
            </div>
        </div>
    </div>

    {{--large screen--}}
    <div class="container-fluid custom-center footer-large-screen">

        <div class="row footer-row_one">
            <div class="col-lg-3 footer-col footer-col_one">
                @if(isset($services))
                    <h3 style="margin-top:0" data-mobile-expand="false">Услуги</h3>
                    <ul>
                        @foreach($services as $service)
                            <li><a href="{{ $service_url.$service->url() }}">{{ $service->title }}</a></li>
                        @endforeach
                    </ul>
                @endif

            </div>


            <div class="col-lg-3 footer-col footer-col_two">
                <h3 style="margin-top:0" data-mobile-expand="false">О клинике</h3>
                <ul>
                    <li><a href="{{ isset($pages[2])?$pages[2]->url():'' }}">{{ $pages[2]->title }}</a></li>
                    <li><a href="{{ isset($pages[3])?$pages[3]->url():'' }}">{{ $pages[3]->title }}</a></li>
                    <li><a href="{{ isset($pages[4])?$pages[4]->url():'' }}">{{ $pages[4]->title }}</a></li>
                    <li><a href="{{ isset($pages[7])?$pages[7]->url():'' }}">{{ $pages[7]->title }}</a></li>
                </ul>
                <h3 data-mobile-expand="false">Информация</h3>
                <ul>
                    <li><a href="{{ isset($pages[19])?$pages[19]->url():'' }}">{{ $pages[19]->title }}</a></li>
                    <li><a href="{{ isset($pages[18])?$pages[18]->url():'' }}">{{ $pages[18]->title }}</a></li>
                    {{--<li><a href="{{ isset($pages[20])?$pages[20]->url():'' }}">{{ $pages[20]->title }}</a></li>--}}
                    {{--<li><a href="{{ isset($pages[6])?$pages[6]->url():'' }}">{{ $pages[6]->title }}</a></li>--}}
                    <li><a href="{{ isset($pages[17])?$pages[17]->url():'' }}">{{ $pages[17]->title }}</a></li>
                </ul>
            </div>

            <div class="col-lg-3 footer-col footer-col_three">

                {{--<div class="footer-tel">
                    <a href="tel:88007752577" class="bigblack-text">8 (4912) 50-50-40</a><br> <a href="tel:84912284050" class="bigblack-text">8 (4912) 28-40-50</a><br> <a href="tel:88007752577" class="bigblack-text">8 (800) 77 525 77</a><br>
                    --}}{{--<span>Звонок бесплатный</span>--}}{{--
                    <a href="/visit" class="btn purple">Записаться на приём</a>
                </div>
                <br>--}}
                <div class="footer-callback">
                    {{--<a data-toggle="modal" data-target="#btn-callback">Обратный звонок</a>--}}
                    <p>Режим работы</p>
                    <span>с 8:00 до 20:00, без выходных</span>
                </div>

                <div class="loc">
                    <p>Адреса</p>
                    <span>Рязань, пл. Соборная, д.9</span>
                    <span>Рязань, ул. Садовая, д.36</span>
                    <a href="/kontakty"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-4.198 0-8 3.403-8 7.602 0 4.198 3.469 9.21 8 16.398 4.531-7.188 8-12.2 8-16.398 0-4.199-3.801-7.602-8-7.602zm0 11c-1.657 0-3-1.343-3-3s1.343-3 3-3 3 1.343 3 3-1.343 3-3 3z"/></svg><span>Как добраться</span></a>
                    <br>
                </div>

                <div class="footer-social">
                    <h3>Социальные сети</h3>
                    <a href="https://vk.com/kremlinstom" target="_blank" class="svg hvr-pop">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path class="st0" d="M13.162 18.994c.609 0 .858-.406.851-.915-.031-1.917.714-2.949 2.059-1.604 1.488 1.488 1.796 2.519 3.603 2.519h3.2c.808 0 1.126-.26 1.126-.668 0-.863-1.421-2.386-2.625-3.504-1.686-1.565-1.765-1.602-.313-3.486 1.801-2.339 4.157-5.336 2.073-5.336h-3.981c-.772 0-.828.435-1.103 1.083-.995 2.347-2.886 5.387-3.604 4.922-.751-.485-.407-2.406-.35-5.261.015-.754.011-1.271-1.141-1.539-.629-.145-1.241-.205-1.809-.205-2.273 0-3.841.953-2.95 1.119 1.571.293 1.42 3.692 1.054 5.16-.638 2.556-3.036-2.024-4.035-4.305-.241-.548-.315-.974-1.175-.974h-3.255c-.492 0-.787.16-.787.516 0 .602 2.96 6.72 5.786 9.77 2.756 2.975 5.48 2.708 7.376 2.708z"/></svg>
                    </a>
                    <a href="https://www.youtube.com/channel/UCG1o5j_gJKdhVFJG7GqAXZQ" target="_blank" class="svg hvr-pop">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                    </a>
                    <a href="https://instagram.com/kremlinstom.rzn/" target="_blank" class="svg hvr-pop">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21.231 0h-18.462c-1.529 0-2.769 1.24-2.769 2.769v18.46c0 1.531 1.24 2.771 2.769 2.771h18.463c1.529 0 2.768-1.24 2.768-2.771v-18.46c0-1.529-1.239-2.769-2.769-2.769zm-9.231 7.385c2.549 0 4.616 2.065 4.616 4.615 0 2.549-2.067 4.616-4.616 4.616s-4.615-2.068-4.615-4.616c0-2.55 2.066-4.615 4.615-4.615zm9 12.693c0 .509-.413.922-.924.922h-16.152c-.511 0-.924-.413-.924-.922v-10.078h1.897c-.088.315-.153.64-.2.971-.05.337-.081.679-.081 1.029 0 4.079 3.306 7.385 7.384 7.385s7.384-3.306 7.384-7.385c0-.35-.031-.692-.081-1.028-.047-.331-.112-.656-.2-.971h1.897v10.077zm0-13.98c0 .509-.413.923-.924.923h-2.174c-.511 0-.923-.414-.923-.923v-2.175c0-.51.412-.923.923-.923h2.174c.511 0 .924.413.924.923v2.175z" fill-rule="evenodd" clip-rule="evenodd"/></svg>
                    </a>
                </div>

                <div class="credit">
                    <p>Принимаем к оплате</p>
                    <span class="hvr-buzz-out"><img src="/img_new/visa.png"></span>
                    <span class="hvr-buzz-out"><img src="/img_new/mastercard.png"></span>
                    <span class="hvr-buzz-out"><img src="/img_new/maestro.png"></span>
                    <span class="hvr-buzz-out"><img src="/img_new/mir.png"></span>
                </div>
            </div>

            <div class="col-lg-3 footer-col footer-col_four">
                {{--*/ @$randomImage = rand(1,2)  /*--}}
                    {{--@if ($randomImage == 1)--}}
                        {{--<img src="/img/consult1.jpg" alt="">--}}
                    {{--<p>Если у Вас остались вопросы, вы можете получить консультацию нашего администратора--}}
                        {{--<br><span>Екатерины Сакута</span>--}}
                    {{--</p>--}}
                    @if ($randomImage == 1)
                        <img src="/img/consult2.jpg" alt="">
                    <p>Если у Вас остались вопросы, вы можете получить консультацию нашего администратора
                        <br><span>Ольги Ореховой</span>
                    </p>
                    @else
                        <img src="/img/consult3.jpg" alt="">
                    <p>Если у Вас остались вопросы, вы можете получить консультацию нашего администратора
                        <br><span>Елены Захаровой</span>
                    </p>
                    {{--@else--}}
                        {{--<img src="/img/consult4.jpg" alt="">--}}
                    {{--<p>Если у Вас остались вопросы, вы можете получить консультацию нашего администратора--}}
                        {{--<br><span>Марии Друзякиной</span>--}}
                    {{--</p>--}}
                    @endif

                <a href="/patsientam/vopros-otvet" class="btn grey-btn">Задать вопрос</a>
            </div>
        </div>

    </div>

    <div class="footer__bottom">
        <div>
            <span>&copy; 2020 ООО &laquo;Кремлёвская стоматология&raquo;</span>
            <a href="/sitemap">Карта сайта</a>
            <span>Создание сайта: cherryline.ru</span>
        </div>
        <div>
            <span>Некоторые виды лечения имеют противопоказания, необходима консультация врача.</span>
            <span>Лицензия ЛО-62-01-001478 от 24.12.2015 г.</span>
            <span>Лицензия ЛО-62-01-001933 от 26.12.2018 г.</span>
        </div>
        <div>
            <a href="/about/o-klinike#certificates">Лицензии</a>
            <a href="/docs/politics.pdf">Политика конфиденциальности</a>
        </div>
    </div>

</footer>


<!-- Modal Call -->
<div class="modal fade modal_form" id="btn-callback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h3>Мы вам перезвоним!</h3>
            </div>
            <div class="modal-body">
                <form id="call_back" class="send_form call_back" action="/send_callback">
                    {{csrf_field()}}
                    <div class="input-group">
                        <label>Номер телефона</label>
                        <input type="text" name="tel" class="form-control">
                    </div>
                    <div class="input-group">
                        <label>Представьтесь</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="recapt" data-size="compact" style="height:74px;margin:20px 0"></div>

                    <div class="pure-checkbox">
                        <input required id="checkbox_callback" name="checkbox" type="checkbox" checked>
                        <label for="checkbox_callback">Я согласен на обработку персональной информации в соответствии с
                            <a target="_blank" href="/docs/politics.pdf">Политикой конфиденциальности</a></label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="submitBtn_callback" type="submit" form="call_back" class="btn purple">Отправить</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    (function(h3s) {

        function toggle(event) {
            /*h3s.forEach(h3 => {
                h3.setAttribute('data-mobile-expand',event.currentTarget===h3 ? 'true' : 'false');
            });*/
            let e = event.currentTarget;
            e.setAttribute('data-mobile-expand',e.getAttribute('data-mobile-expand')==='false' ? 'true' : 'false');
        }

        h3s.forEach(h3 => {
            h3.addEventListener('click',toggle);
        });

    })([].slice.call(document.querySelectorAll('h3[data-mobile-expand]')));
</script>


<!-- Module Stylesheets -->
    <link rel="stylesheet" type="text/css" href="/css/review.css">
    <link rel="stylesheet" type="text/css" href="/css/doctors-collapse.css">
    <link rel="stylesheet" type="text/css" href="/css/doctors-list.css">
    <link rel="stylesheet" type="text/css" href="/css/service-collapse.css">
    <link rel="stylesheet" type="text/css" href="/css/tech-collapse.css">
    <link rel="stylesheet" type="text/css" href="/css/doctors-carousel.css">
    <link rel="stylesheet" type="text/css" href="/css/visit-doctor.css">
    <link rel="stylesheet" type="text/css" href="/css/media.css">
    <link rel="stylesheet" type="text/css" href="/css/price-main-module.css">
    <link rel="stylesheet" type="text/css" href="/css/forms.css">
    <link rel="stylesheet" type="text/css" href="/css/asking-block.css">
    <link rel="stylesheet" type="text/css" href="/css/caption-block.css">
    <link rel="stylesheet" type="text/css" href="/css/video-block.css">
    <link rel="stylesheet" type="text/css" href="/css/news-block.css">
    <link rel="stylesheet" type="text/css" href="/css/doctors-block.css">
    <link rel="stylesheet" type="text/css" href="/css/service-block.css">
    <link rel="stylesheet" type="text/css" href="/css/tech-block.css">
    <link rel="stylesheet" type="text/css" href="/css/sert-block.css">
    <link rel="stylesheet" type="text/css" href="/css/reg-treatment-block.css">
    <link rel="stylesheet" type="text/css" href="/css/contacts.css">
    <link rel="stylesheet" type="text/css" href="/css/faq-block.css">
    <link rel="stylesheet" type="text/css" href="/css/service.css">
    <link rel="stylesheet" type="text/css" href="/css/page-content.css">
    <link rel="stylesheet" type="text/css" href="/css/technology.css">
    <link rel="stylesheet" type="text/css" href="/css/item-block.css">
    <link rel="stylesheet" type="text/css" href="/css/about-single.css">
    <link rel="stylesheet" type="text/css" href="/css/news.css">
    <link rel="stylesheet" type="text/css" href="/css/action.css">