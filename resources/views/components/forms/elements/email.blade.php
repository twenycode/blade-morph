{{-- Email input element blade template --}}
<input
        name="{{ $name }}"
        type="email"
        id="{{ $id }}"
        @if($value)value="{{ $value }}"@endif
        {{ $attributes->merge(['class' => 'form-control']) }}
/>