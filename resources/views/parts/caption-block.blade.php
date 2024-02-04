<div class="caption-block caption-block_background_service"
     @if(isset($page->pictures[0])) style="background-image:url('{{ $page->pictures[0]->file }}')" @else style="background-image:url('/img_new/{{ isset($bg) ? $bg : 'background-about' }}.jpg')" @endif >
    <div class="white-overlay"></div>
    <div class="caption-block_info">
        @if(isset($page))
        <h1>{{ $page->title }}</h1>
        <p>{!! $page->small_content !!}</p>
        @endif
    </div>
</div>