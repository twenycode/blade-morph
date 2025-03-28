<div
        class="{{ $panelClass() }}"
        id="{{ $id }}"
        role="tabpanel"
        aria-labelledby="{{ $id }}-tab"
        tabindex="0"
        {{ $attributes }}
>
    {{ $slot }}
</div>