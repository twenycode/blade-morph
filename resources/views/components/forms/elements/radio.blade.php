{{-- Radio input element blade template --}}
<div class="{{ $formCheckClass() }}">
    <input
            type="radio"
            name="{{ $name }}"
            id="{{ $id }}"
            value="{{ $value }}"
            class="form-check-input"
            {{ $checked ? 'checked' : '' }}
            {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            {{ $attributes }}
    >

    <label class="form-check-label" for="{{ $id }}">
        {{ $slot }}
    </label>
</div>