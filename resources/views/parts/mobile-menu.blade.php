<div id="mobile-menu">



    <ul>
        <?php $i = 0; ?>
        @foreach($menu->where('page_id',0) as $pitem)
            @if($pitem->url()==$blog_url && !$show_blog)
                @continue
            @endif
            @if($menu->where('page_id',$pitem->id)->count()>0)
                <li><span data-submenu="{{ $i++ }}">{{ $pitem->title }}</span></li>
            @else
                <li><a href="{{ $pitem->url() }}">{{ $pitem->title == 'Награды клиники' ? 'Награды' : $pitem->title }}</a></li>
            @endif
        @endforeach
    </ul>

    @foreach($menu->where('page_id',0) as $pitem)
        @if($pitem->url()==$blog_url && !$show_blog)
            @continue
        @endif
        @if($menu->where('page_id',$pitem->id)->count()>0)
            <ul class="submenu">
                @foreach($menu->where('page_id',$pitem->id) as $item)
                    @if($item->url()==$blog_url && !$show_blog)
                        @continue
                    @endif
                    <li><a href="{{ $item->url() }}">{{$item->title}}</a></li>
                @endforeach
                <div class="submenu-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                    <div>назад</div>
                </div>
            </ul>
        @endif
    @endforeach

    <a href="/visit" class="btn btn-purple">Записаться на приём</a>
    <div class="mobile-menu__contacts">
        <div>8 (4912) 50-50-40</div>
        <div>с 8:00-20:00, без выходных</div>
    </div>
    <div class="mobile-menu__close">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
        <div>Меню</div>
    </div>
</div>

<script type="text/javascript">
    document.querySelector('.header__menu').addEventListener('click',function() {
        document.body.setAttribute('data-mobile-menu',true);
    });
    document.querySelector('.mobile-menu__close').addEventListener('click',function() {
        document.body.removeAttribute('data-mobile-menu');
    });

    let submenus = [].slice.call(document.querySelectorAll('#mobile-menu ul.submenu'));

    function expand(event) {
        let index = event.currentTarget.getAttribute('data-submenu') * 1;
        submenus[index].classList.add('expanded');
    }

    function collapse() {
        submenus.forEach(submenu => {
            submenu.classList.remove('expanded');
        });
    }

    [].slice.call(document.querySelectorAll('span[data-submenu]')).forEach(submenu => {
        submenu.addEventListener('click',expand);
    });

    [].slice.call(document.getElementsByClassName('submenu-close')).forEach(close => {
        close.addEventListener('click',collapse);
    });
</script>