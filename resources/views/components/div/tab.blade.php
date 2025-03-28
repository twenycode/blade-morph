@if($vertical)
    <div class="d-flex align-items-start">
        <div class="nav {{ $navClass() }} me-3" id="{{ $id }}-nav" role="tablist" aria-orientation="vertical">
            @if($tabs)
                @foreach($tabs as $key => $tab)
                    <button
                            class="nav-link {{ $isActive($key) ? 'active' : '' }}"
                            id="{{ $getTabId($key) }}-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#{{ $getTabId($key) }}"
                            type="button"
                            role="tab"
                            aria-controls="{{ $getTabId($key) }}"
                            aria-selected="{{ $isActive($key) ? 'true' : 'false' }}"
                    >
                        @if(is_array($tab) && isset($tab['icon']))
                            <i class="{{ $tab['icon'] }} me-1"></i>
                        @endif
                        {{ is_array($tab) && isset($tab['label']) ? $tab['label'] : $tab }}
                    </button>
                @endforeach
            @endif
        </div>

        <div class="tab-content flex-grow-1" id="{{ $id }}-content">
            {{ $slot }}
        </div>
    </div>
@else
    <div>
        <ul class="nav {{ $navClass() }} mb-3" id="{{ $id }}-nav" role="tablist">
            @if($tabs)
                @foreach($tabs as $key => $tab)
                    <li class="nav-item" role="presentation">
                        <button
                                class="nav-link {{ $isActive($key) ? 'active' : '' }}"
                                id="{{ $getTabId($key) }}-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#{{ $getTabId($key) }}"
                                type="button"
                                role="tab"
                                aria-controls="{{ $getTabId($key) }}"
                                aria-selected="{{ $isActive($key) ? 'true' : 'false' }}"
                        >
                            @if(is_array($tab) && isset($tab['icon']))
                                <i class="{{ $tab['icon'] }} me-1"></i>
                            @endif
                            {{ is_array($tab) && isset($tab['label']) ? $tab['label'] : $tab }}
                        </button>
                    </li>
                @endforeach
            @else
                {{ $navSlot ?? '' }}
            @endif
        </ul>

        <div class="tab-content" id="{{ $id }}-content">
            {{ $slot }}
        </div>
    </div>
@endif