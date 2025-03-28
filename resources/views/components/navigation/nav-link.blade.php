<a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => 'nav-link ' . $getActiveClass()]) }}
>
    @if($icon)
        <i class="{{ $icon }} me-1"></i>
    @endif

    {!! $label !!}

    @if($badge)
        <span class="badge bg-{{ $badgeColor }} ms-1">{{ $badge }}</span>
    @endif
</a>