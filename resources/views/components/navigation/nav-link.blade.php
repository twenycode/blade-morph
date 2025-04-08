{{--
  NavLink Navigation View

  This template renders a Bootstrap-compatible navigation link with optional
  icon and badge elements.
--}}
<a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => 'nav-link ' . $getActiveClass()]) }}
>
        {{-- Optional icon --}}
        @if($icon)
                <i class="{{ $icon }} me-1"></i>
        @endif

        {{-- Link label (unescaped to allow HTML) --}}
        {!! $label !!}

        {{-- Optional badge --}}
        @if($badge)
                <span class="badge bg-{{ $badgeColor }} ms-1">{{ $badge }}</span>
        @endif
</a>