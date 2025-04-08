{{-- Input element blade template --}}
<input
        name="{{ $name }}"
        type="{{ $type }}"
        id="{{ $id }}"
        @if($value)value="{{ $value }}"@endif
        {{ $attributes->merge(['class' => 'form-control']) }}
/>