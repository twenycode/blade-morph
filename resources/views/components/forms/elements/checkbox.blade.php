{{-- Checkbox input element blade template --}}
<input
        name="{{ $name }}"
        type="checkbox"
        id="{{ $id }}"
        @if($value)value="{{ $value }}"@endif
        {{ $checked ? 'checked' : '' }}
        {{ $attributes }}
/>