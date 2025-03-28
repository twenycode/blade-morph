@if($divider)
    <li><hr class="dropdown-divider"></li>
@elseif($header)
    <li>
        <h6 class="dropdown-header">
            @if($icon)
                <i class="{{ $icon }} me-1"></i>
            @endif
            {{ $label ?? $slot }}
        </h6>
    </li>
@else
    <li>
        <a
                {{ $attributes->merge(['class' => $itemClass()]) }}
                href="{{ $href ?? '#' }}"
                @if($disabled)
                    tabindex="-1"
                aria-disabled="true"
                onclick="return false;"
                @endif
        >
            @if($icon)
                <i class="{{ $icon }} me-1"></i>
            @endif
            {{ $label ?? $slot }}
        </a>
    </li>
@endif