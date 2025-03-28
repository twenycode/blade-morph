<div {{ $attributes->merge(['class' => $dropdownClass()]) }}>
    @if($split)
        <div class="btn-group">
            <button type="button" class="{{ $buttonClass() }}">
                @if($icon)
                    <i class="{{ $icon }} me-1"></i>
                @endif
                {{ $label }}
            </button>
            <button
                    type="button"
                    class="{{ $buttonClass() }} dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    id="{{ $id }}"
            >
                <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="{{ $menuClass() }}" aria-labelledby="{{ $id }}">
                {{ $slot }}
            </ul>
        </div>
    @else
        <button
                class="{{ $buttonClass() }} dropdown-toggle"
                type="button"
                id="{{ $id }}"
                data-bs-toggle="dropdown"
                aria-expanded="false"
        >
            @if($icon)
                <i class="{{ $icon }} me-1"></i>
            @endif
            {{ $label }}
        </button>
        <ul class="{{ $menuClass() }}" aria-labelledby="{{ $id }}">
            {{ $slot }}
        </ul>
    @endif
</div>