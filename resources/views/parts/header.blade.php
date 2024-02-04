<header>
    <div class="wrapper clearfix">
        <div class="left-block-menu">
            {{--LOGO BLOCK--}}
            <div class="logo-block">


<div itemscope itemtype="http://schema.org/Organization" style="display:none;">
<a itemprop="url" href="https://www.kremlinstom.ru/">Главная</a>
<img itemprop="logo" src="/img/logo.svg">
<span itemprop="name">ООО «Кремлевская стоматология»</span>
<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
<span itemprop="streetAddress">пл.Соборная, д.9</span>
<span itemprop="postalCode"> 390000</span>
<span itemprop="addressLocality">Рязань</span>,
</div>
<span itemprop="telephone">8 (800) 77-525-77</span>
</div>

                <div class="header__menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="19" viewBox="0 0 25 19"><path d="M0 0h25v3h-25zM0 8h25v3h-25zM0 16h25v3h-25z"/></svg>
                    <div>Меню</div>
                </div>

                <a href="/" class="logo-block_logo-img"></a>
                <p class="logo-block_logo-text">Исключительная забота<br>о&nbsp;здоровье ваших зубов</p>

                <a href="tel:+74912505040" class="header__call">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20 22.621l-3.521-6.795c-.008.004-1.974.97-2.064 1.011-2.24 1.086-6.799-7.82-4.609-8.994l2.083-1.026-3.493-6.817-2.106 1.039c-7.202 3.755 4.233 25.982 11.6 22.615.121-.055 2.102-1.029 2.11-1.033z"/></svg>
                    <div>Звонок</div>
                </a>
            </div>

        </div>

        <div class="right-block-menu">

            <a href="/visit" class="btn btn-head purple">Записаться на приём</a>

            <div>
                <div class="callback-block__phone-number">8 (4912) 50-50-40</div>
                <div style="background-image:url('/icons/clock.svg')">с 8:00-20:00, без выходных</div>
            </div>

            <div>
                <div style="background-image:url('/icons/landmark.svg')">г. Рязань, пл. Соборная, д. 9</div>
                <div style="background-image:url('/icons/landmark.svg')">г. Рязань, ул. Садовая, д. 36</div>
            </div>

        </div>
    </div>

</header>

<nav>
    @if(isset($menu))
        <ul class="menu">
            @foreach($menu->where('page_id',0) as $pitem)
                @if($pitem->url()==$blog_url && !$show_blog)
                    @continue
                @endif
                @if($menu->where('page_id',$pitem->id)->count()>0)
                    <li class="dropdown">
                        <a href="#">{{ $pitem->title }}</a>
                        <ul class="dropdown-content">
                            @foreach($menu->where('page_id',$pitem->id) as $item)
                                @if($item->url()==$blog_url && !$show_blog)
                                    @continue
                                @endif
                                <li><a href="{{ $item->url() }}">{{$item->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li><a href="{{ $pitem->url() }}">{{$pitem->title}}</a></li>
                @endif
            @endforeach
        </ul>
    @endif
</nav>

<script type="text/javascript">
    let
        nav = document.getElementsByTagName('nav')[0],
        button = document.querySelector('.header__menu');

    function onWindowScrollResize() {
        let scrollY = (window.pageYOffset || document.documentElement.scrollTop) - (document.documentElement.clientTop || 0);
        DOMTokenList.prototype[scrollY>50 ? 'add' : 'remove'].call(document.body.classList,'scrolled');
    }

    window.addEventListener('scroll',onWindowScrollResize);
    window.addEventListener('resize',onWindowScrollResize);

    button.addEventListener('click',event => {
        let
            scrolled = document.body.classList.contains('scrolled'),
            viewportWidth = Math.max(document.documentElement.clientWidth,window.innerWidth || 0);
        if (scrolled && viewportWidth>799) {
            nav.classList.toggle('menu-line-shown');
        } else {
            if (nav.hasAttribute('style')) nav.removeAttribute('style'); else nav.setAttribute('style','height:50px;padding-top:15px');
        }
        event.preventDefault();
    });
</script>