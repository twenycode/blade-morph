<nav {{ $attributes }} aria-label="breadcrumb">
    <ol class="{{ $breadcrumbClass() }}">
        @if($items)
            @foreach($items as $key => $item)
                <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}" {{ $loop->last ? 'aria-current="page"' : '' }}>
                    @if($loop->last || empty($item['url']))
                        @if(is_array($item) && isset($item['label']))
                            {{ $item['label'] }}
                        @elseif(is_string($item))
                            {{ $item }}
                        @else
                            {{ $key }}
                        @endif
                    @else
                        <a href="{{ is_array($item) ? $item['url'] : '#' }}">
                            @if(is_array($item) && isset($item['label']))
                                {{ $item['label'] }}
                            @elseif(is_string($item))
                                {{ $item }}
                            @else
                                {{ $key }}
                            @endif
                        </a>
                    @endif
                </li>
            @endforeach
        @else
            {{ $slot }}
        @endif
    </ol>
</nav>