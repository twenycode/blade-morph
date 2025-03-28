<button
        type="{{ $type }}"
        id="{{ $id }}"
        {{ $attributes->merge(['class' => $buttonClass()]) }}
        @if($loading) disabled @endif
>
    @if($loading)
        <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
        {{ $loadingText ?? $label }}
    @else
        @if($icon && $iconPosition === 'left')
            <i class="{{ $icon }} me-1"></i>
        @endif

        {!! $label !!}

        @if($icon && $iconPosition === 'right')
            <i class="{{ $icon }} ms-1"></i>
        @endif
    @endif
</button>