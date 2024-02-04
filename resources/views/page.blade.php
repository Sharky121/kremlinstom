@extends('layouts.app')
@section ('content')
    <div class="container-fluid custom-center custom-center-caption">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-md-push-3 right-column-menu">
                @include('parts.caption-block')

                @if($page -> id == 19)
                    <div class="text-content text-content__tourism">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- <div class="col-sm-12 col-md-6">
                                    <a class="tourizm" data-lc-href="/video/tour.mp4" data-rel="lightcase">
                                        <img src="/img/video-tourism.jpg" style="max-width:100%;" alt="">
                                    </a>
                                </div> -->
                                <div class="col-sm-12 col-md-12">
                                        <div id="we_can">
                                        <div class="col-sm-12">
                                            <div class="we_can_video">                          
                                                <div class="video-container">
                                                    <video width="100%" tabindex="0"><source src="/video/main.mp4"></video>
                                                    <div class="video-play"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 22v-20l18 10-18 10z"/></svg></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <ul class="we_can_list">
                                                <li>Составим план лечения с учетом Вашего графика</li>
                                                <li>Возможность трансфера до/из ЖД и авто- вокзалов<br>или места проживания (во время лечения в нашейклинике). </li>
                                                <li>Бронирование отелей для проживания в<br>непосредственной близости от нашей клиники  </li>
                                                <li>Мы находимся в историческом центре<br>г.Рязани - Рязанском Кремле</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <p>«Кремлевская Стоматология» станет лучшим выбором для вас, предлагая самый широкий спектр стоматологических услуг
                                        по оптимальным ценам.
                                    </p>

                                    <p>Вы будете очень приятно удивлены качеством и стоимостью наших услуг, а посещение расположенного через дорогу
                                        от нас музея-заповедника Рязанский Кремль превратит вашу поездку в интереснейшую экскурсию.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{--<section id="our_services" class="blue">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="services_title">Наши услуги и цены</h2>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="bx-services_slider">
                            <ul class="services_slider">
                                <li class="service_slide s_s-1">
                                    <div class="col-sm-4">
                                        <img src="/img/slides/1.jpg" alt="">
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                        <h3>Имплантация зубов</h3>
                                        <p>
                                            Где в Рязани лучше всего имплантировать зубы? «Кремлевская стоматология» не только качественно, безопасно и с минимальным дискомфортом осуществляет имплантацию утраченных зубов, но и обеспечивает 10-летнюю гарантию качества. Мы сотрудничаем с мировым лидером в сфере зубопротезирования и имплантации – известной компанией Nobel Boicare, и обладаем эксклюзивными правами на предоставление гарантии на комплектующие и имплантанты в виде гарантийной карты производителя с персональным кодом и голограммой. Компания Nobel Biocare выбрала "Кремлёвскую стоматологию" единственным центром клинического мастерства по имплантации в Рязани.
                                        </p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в нашей клинике:</h4>
                                                <div class="price_we">от 26 000 руб.</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в московской клинике:</h4>
                                                <div class="price_moscow">от 60 000 руб.</div>
                                            </div>
                                        </div>
                                    </div>      
                                </li>
                                <li class="service_slide s_s-2">
                                    <div class="col-sm-4">
                                        <img src="/img/slides/1.jpg" alt="">
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                        <h3>Отбеливание</h3>
                                        <p>Технология Zoom!, разработанная американской компанией Discus Dental, позволяет выполнять отбеливание зубов как в клинических, так и в домашних условиях. Специалисты клиники «Кремлевская стоматология» имеют богатый опыт и высокую квалификацию в предоставлении услуг по отбеливанию. Процедура начинается с предварительной чистки поверхности зубов. Далее следуют нанесение геля на основе перекиси водорода и обработка специальной лампой. Если Вы решили отбелить зубы дома, мы советуем воспользоваться способом Zoom! Take-Home Weekender System.</p>
                                        <p>Обратившись к нам в Рязани, Вы гарантированно получите безупречное качество этого сервиса.</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в нашей клинике:</h4>
                                                <div class="price_we">от 18 000 руб.</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в московской клинике:</h4>
                                                <div class="price_moscow">от 30 000 руб.</div>
                                            </div>
                                        </div>
                                    </div>      
                                </li>
                                <li class="service_slide s_s-3">
                                    <div class="col-sm-4">
                                        <img src="/img/slides/1.jpg" alt="">
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                        <h3>Протезирование</h3>
                                        <p>Мы предлагаем комплекс услуг по художественной реставрации зубов: от коррекции зуба в следствие различных  деформаций до полного его восстановления с нуля. Мы применяем самые прогрессивные методы, высококачественное безопасное оборудование и лучшие материалы, присутствующие сегодня на рынке.</p>
                                        <p>Что касается классификации протезов по материалу и форме изготовления, то в этой категории выделяются следующие разновидности: коронки одиночного типа, мосты, которые одновременно заменяют несколько поврежденных или отсутствующих зубов, а так же керамические и культевые вкладки, которые являются основанием для последующей установки коронок и мостов.</p>
                                        <p>Персональный подход к каждому пациенту и высокий уровень мастерства гарантируют отменные результаты.</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в нашей клинике:</h4>
                                                <div class="price_we">от 800 руб(пласт. коронка).</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в московской клинике:</h4>
                                                <div class="price_moscow">от 2 000 руб.</div>
                                            </div>
                                        </div>
                                    </div>      
                                </li>
                                <li class="service_slide s_s-4">
                                    <div class="col-sm-4">
                                        <img src="/img/slides/1.jpg" alt="">
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                        <h3>Удаление зубов</h3>
                                        <p>Удаление зубов в клинике «Кремлевская стоматология» в Рязани имеет массу преимуществ, среди которых можно отметить следующие:</p>
                                        <ul>
                                            <li>Высокая квалификация всех специалистов.</li>
                                            <li>Доступные расценки, приемлемые для широкого круга пациентов.</li>
                                            <li>Удобный график работы, позволяющий попасть на прием всем желающим.</li>
                                            <li>Бесплатные консультации хирургов и других врачей.</li>
                                        </ul>
                                        <p>Все это создает максимальные предпосылки для выбора именно нашей клиники.</p>                                    
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в нашей клинике:</h4>
                                                <div class="price_we">от 15 000 руб.</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в московской клинике:</h4>
                                                <div class="price_moscow">от 3 000 руб.</div>
                                            </div>
                                        </div>
                                    </div>      
                                </li>
                                <li class="service_slide s_s-5">
                                    <div class="col-sm-4">
                                        <img src="/img/slides/1.jpg" alt="">
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                        <h3>Терапевтическая стоматология</h3>
                                        <p>Зубная боль может иметь самую различную и даже непредсказуемую природу. В одних ситуациях, незначительные приступы могут быть вызваны достаточно серьезным и опасным заболеванием, а в других - резкая и острая боль в зубах может на самом деле не иметь никакого отношения к стоматологии.</p>
                                        <p>При появлении постоянных или периодических болей в зубах рекомендуется обратиться к стоматологу. Только профессиональная диагностика позволит определить истинную причину и назначить необходимое лечение.</p>
                                        <p>Специалисты «Кремлевской Стоматологии» с максимальной точностью определят причину и предпримут все возможные меры для полного выздоровления пациентов.</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в нашей клинике:</h4>
                                                <div class="price_we">от 1500 руб.(одноканальный)</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в московской клинике:</h4>
                                                <div class="price_moscow">от 6 000 руб.</div>
                                            </div>
                                        </div>
                                    </div>      
                                </li>
                                <li class="service_slide s_s-6">
                                    <div class="col-sm-4">
                                        <img src="/img/slides/1.jpg" alt="">
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                        <h3>Лечение кариеса</h3>
                                        <p>Кариес представляет собой длительный процесс разрушения зубных тканей изнутри. Мы точно определяем природу возникновения заболевания и подбираем оптимальную методику лечения.</p>
                                        <p>В «Кремлёвской стоматологии» применяются новейшие методики лечения кариеса в Рязани на высокотехнологичном стоматологическом оборудовании. Теперь процедура лечения стала безболезненна и безопасна как никогда прежде! Лечение кариеса, как правило, завершается установкой пломбы. </p>
                                        <p>В нашей стоматологии используются все виды лечения зубов под анестезией – от местной до наркоза, которые подбираются с учётом индивидуальных особенностей клиента.</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в нашей клинике:</h4>
                                                <div class="price_we">от 1500 руб.</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в московской клинике:</h4>
                                                <div class="price_moscow">от 3400 руб.</div>
                                            </div>
                                        </div>
                                    </div>      
                                </li>
                                <li class="service_slide s_s-3">
                                    <div class="col-sm-4">
                                        <img src="/img/slides/1.jpg" alt="">
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                        <h3>Исправление прикуса</h3>
                                        <p>Мы предоставляем услуги по детской и взрослой ортодонтии. Работаем как с врожденными, так и с приобретенными аномалиями. Если у Вас наблюдается смещение зубных дуг, изменение их формы и размеров, а также нарушения положения отдельных зубов, записывайтесь к нам на бесплатную консультацию. Ежемесячно мы будем наблюдать за ходом лечения и вносить коррективы, если понадобится.  </p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в нашей клинике:</h4>
                                                <div class="price_we">от 7 140 руб.</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в московской клинике:</h4>
                                                <div class="price_moscow">от 11 350 руб.</div>
                                            </div>
                                        </div>
                                    </div>      
                                </li>
                                <li class="service_slide s_s-4">
                                    <div class="col-sm-4">
                                        <img src="/img/slides/1.jpg" alt="">
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                        <h3>Профессиональная чиста</h3>
                                        <p>Профессиональная чистка зубов ультразвуком на швейцарском оборудовании PiezonMinimaster®Piezon. В ходе процедуры удаляют твердые зубные отложения и налет с эмали зуба. Далее наносят фторсодержащую пасту и полируют зубы. Таким способом специалист возвращает поверхности зубов ее естественный блеск. Процедура не доставляет дискомфортных ощущений.</p>                                    
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в нашей клинике:</h4>
                                                <div class="price_we">от 1800 руб.</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в московской клинике:</h4>
                                                <div class="price_moscow">от 4 000 руб.</div>
                                            </div>
                                        </div>
                                    </div>      
                                </li>
                                <li class="service_slide s_s-5">
                                    <div class="col-sm-4">
                                        <img src="/img/slides/1.jpg" alt="">
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                        <h3>Рентген-диагностика</h3>
                                        <p>«Кремлёвская стоматология» оснащена совершенным рентгенодиагностическим аппаратом ORTHOPHOS SL 3D Ceph для получения компьютерной томографии. Он позволяет определить проблемы с зубами или патологии на самых ранних стадиях. </p>
                                        <p>С помощью компьютерной томографии (КТ) Вы получаете фотографию обоих челюстей в объемном 3D-формате, что дает возможность рассмотреть структуру с разных сторон, под любым углом и в любом разрезе. Именно эта информация является важной для исследования и постановки верного диагноза. Достаточно лишь одного снимка. КТ совершено безопасна. Ее можно повторять несколько раз в день, так как доза облучения минимальная.</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в нашей клинике:</h4>
                                                <div class="price_we">от 1200 руб.</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в московской клинике:</h4>
                                                <div class="price_moscow">от 4 000 руб.</div>
                                            </div>
                                        </div>
                                    </div>      
                                </li>
                                <li class="service_slide s_s-6">
                                    <div class="col-sm-4">
                                        <img src="/img/slides/1.jpg" alt="">
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                        <h3>Реставрация</h3>
                                        <p>Мы предлагаем комплекс услуг по художественной реставрации: выравниваем зубов, устраняем сколы, изменяем ширину промежутков, шлифуем и прочее. В этой работе мы используем высококачественное безопасное оборудование, лучшие материалы, присутствующие сегодня на рынке, а также персональный подход к каждому пациенту. Процедуры осуществляются при первом же визите к врачу.</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в нашей клинике:</h4>
                                                <div class="price_we">от 3500 руб.</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в московской клинике:</h4>
                                                <div class="price_moscow">от 4500 руб.</div>
                                            </div>
                                        </div>
                                    </div>      
                                </li>
                                <li class="service_slide s_s-7">
                                    <div class="col-sm-4">
                                        <img src="/img/slides/1.jpg" alt="">
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                        <h3>Пародонтология</h3>
                                        <p>Мы осуществляем лечение десен при помощи ультрасовременного лазера от немецкой компании Sirona – SIROLaser Advance. Лазер работает исключительно с пораженными тканями, не травмируя здоровые. Мы избавим вас от любых болезней пародонта: гингивита, пародонтита и пародонтоза.</p>
                                        <p>Преимущества лазерной пародонтологии: безболезненность процедуры, высокие темпы заживления тканей, уничтожение болезнетворной микрофлоры, бесконтактность методики, то есть невозможно занести инфекцию инструментами. </p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в нашей клинике:</h4>
                                                <div class="price_we">от 4200 руб.</div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h4 class="servise_price">Цена в московской клинике:</h4>
                                                <div class="price_moscow">от 8000 руб.</div>
                                            </div>
                                        </div>
                                    </div>      
                                </li>
                            </ul>
                        </div>
                    </div>  
                </div>
                
                
                
                
                
                
            </div>
        </section>--}}
                @endif

                <div class="text-content text-content__tourism">
                    {!! $page->content !!}
                </div>

                @if($page->childs->where('public',1)->count()>0)
                    @foreach($page->childs->where('public',1) as $child)
                        <a href="{{ $child->url() }}">{{ $child->title }}</a><br>
                    @endforeach
                @endif
                {{--@if(isset($page->video_link))--}}
                {{--<div class="video-content" style="margin-bottom: 20px;">--}}
                   {{--<iframe src="{{ $page->video_link }}"></iframe>--}}
                {{--</div>--}}
                {{--@endif--}}
                @include('parts.asking-block')
            </div>
            <div class="col-sm-12 col-md-3 col-md-pull-9 left-column-menu">
                @include('parts.left-block-menu')
                @include('parts.left-block-modules')
                {{--  --}}
            </div>
        </div>
    </div>
@endsection