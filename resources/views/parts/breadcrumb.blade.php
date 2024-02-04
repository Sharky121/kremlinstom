<ul class="breadcrumb" itemscope="" itemtype="http://schema.org/WebPage">
    @if($bread)
        @for($i=0;$i<count($bread)-1;$i++)
            <li itemprop="breadcrumb"><a href="{{ $bread[$i]['link'] }}">{{ $bread[$i]['title'] }}</a></li>
        @endfor
        {{--<li>{{ $bread[count($bread)-1]['title'] }}</li>--}}
    @endif
</ul>