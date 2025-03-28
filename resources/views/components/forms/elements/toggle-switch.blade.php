<div class="form-check form-switch {{ $colorClass() }}">
    <input
            type="checkbox"
            name="{{ $name }}"
            id="{{ $id }}"
            class="form-check-input"
            value="{{ $value }}"
            {{ $checked ? 'checked' : '' }}
            {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            {{ $readonly ? 'readonly' : '' }}
            {{ $attributes }}
    >

    <label class="form-check-label" for="{{ $id }}">
        <span class="switch-on">{{ $labelOn }}</span>
        <span class="switch-off">{{ $labelOff }}</span>

        {{ $slot }}
    </label>
</div>

@once
    <style>
        .form-switch {
            position: relative;
            padding-left: 3.5rem;
        }

        .form-switch .form-check-input {
            width: 3rem;
            margin-left: -3.5rem;
        }

        .form-check-input:checked ~ .form-check-label .switch-off {
            display: none;
        }

        .form-check-input:not(:checked) ~ .form-check-label .switch-on {
            display: none;
        }

        /* Custom colors for switches */
        .form-switch-success .form-check-input:checked {
            background-color: var(--bs-success);
            border-color: var(--bs-success);
        }

        .form-switch-danger .form-check-input:checked {
            background-color: var(--bs-danger);
            border-color: var(--bs-danger);
        }

        .form-switch-warning .form-check-input:checked {
            background-color: var(--bs-warning);
            border-color: var(--bs-warning);
        }

        .form-switch-info .form-check-input:checked {
            background-color: var(--bs-info);
            border-color: var(--bs-info);
        }
    </style>
@endonce