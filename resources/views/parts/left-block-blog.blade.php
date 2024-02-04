<div class="filter-block filter-block_doctors clearfix">
    <a href="#" class="active active-tab">Блог</a>
</div>
<div class="doctors-block doctors-blog">
    <ul>
    @foreach($blog_menu as $blog)
        <li>
            <a href="{{ $blog_url.$blog->url() }}">
                <div class="service-block_inner">
                    @if(isset($blog->gallery[0]))
                        <img src="{{ $blog->gallery[0]->file }}" alt="{{ $blog->title }}">
                    @endif
                    <div class="doctors-block_item-text">
                        <h3>{{ $blog->title }}</h3>
                    </div>
                </div>
            </a>
        </li>
    @endforeach
    </ul>
</div>

