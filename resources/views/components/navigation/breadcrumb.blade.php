{{--
  Breadcrumb Navigation View

  This template renders Bootstrap-compatible breadcrumb navigation with proper
  accessibility attributes.
--}}
<nav {{ $attributes }} aria-label="breadcrumb">
    <ol class="{{ $breadcrumbClass() }}">
        @if($items)
            {{-- Render from the provided items array --}}
            @foreach($items as $key => $item)
                <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}" {{ $loop->last ? 'aria-current="page"' : '' }}>
                    @if($loop->last || empty($item['url']))
                        {{-- Last item or items without URL are not clickable --}}
                        @if(is_array($item) && isset($item['label']))
                            {{ $item['label'] }}
                        @elseif(is_string($item))
                            {{ $item }}
                        @else
                            {{ $key }}
                        @endif
                    @else
                        {{-- Linked items --}}
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
            {{-- Use slot content if no items provided --}}
            {{ $slot }}
        @endif
    </ol>
</nav>