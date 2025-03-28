<div class="accordion-item">
    <h2 class="accordion-header" id="heading_{{ $id }}">
        <button
                class="accordion-button {{ $open ? '' : 'collapsed' }}"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapse_{{ $id }}"
                aria-expanded="{{ $open ? 'true' : 'false' }}"
                aria-controls="collapse_{{ $id }}"
                data-bs-parent="#{{ $accordionId }}"
        >
            @if($icon)
                <i class="{{ $icon }} me-2"></i>
            @endif
            {{ $title }}
        </button>
    </h2>
    <div
            id="collapse_{{ $id }}"
            class="accordion-collapse collapse {{ $open ? 'show' : '' }}"
            aria-labelledby="heading_{{ $id }}"
            data-bs-parent="#{{ $accordionId }}"
    >
        <div class="accordion-body">
            {{ $slot }}
        </div>
    </div>
</div>