{{--
  Dropdown Navigation View

  This template renders a Bootstrap dropdown menu with proper accessibility attributes.
  It supports both regular and split button variants.
--}}
<div {{ $attributes->merge(['class' => $dropdownClass()]) }}>
    @if($split)
        {{-- Split button dropdown --}}
        <div class="btn-group">
            {{-- Main action button --}}
            <button type="button" class="{{ $buttonClass() }}">
                @if($icon)
                    <i class="{{ $icon }} me-1"></i>
                @endif
                {{ $label }}
            </button>

            {{-- Dropdown toggle button --}}
            <button
                    type="button"
                    class="{{ $buttonClass() }} dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    id="{{ $id }}"
            >
                <span class="visually-hidden">Toggle Dropdown</span>
            </button>

            {{-- Dropdown menu --}}
            <ul class="{{ $menuClass() }}" aria-labelledby="{{ $id }}">
                {{ $slot }}
            </ul>
        </div>
    @else
        {{-- Regular dropdown button --}}
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

        {{-- Dropdown menu --}}
        <ul class="{{ $menuClass() }}" aria-labelledby="{{ $id }}">
            {{ $slot }}
        </ul>
    @endif
</div>