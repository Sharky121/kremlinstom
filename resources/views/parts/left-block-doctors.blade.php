<div class="filter-block filter-block_doctors clearfix">
    <a href="#" class="active active-tab">Врачи&nbsp;<span class="doctors-count">({{ $all_workers->count() }})</span></a>
</div>
<div class="doctors-block">
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