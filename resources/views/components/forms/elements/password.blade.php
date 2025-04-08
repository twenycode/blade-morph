{{-- Password input element blade template --}}
<input
        name="{{ $name }}"
        type="password"
        id="{{ $id }}"
        {{ $attributes->merge(['class' => 'form-control']) }}
/>