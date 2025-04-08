{{-- 
    Display a field error message if validation fails
    Parameters:
    - $field: The field name to check for errors
    - $bag: The error bag to use (default: 'default')
    - Custom attributes merged with class="field-error text-danger"
    
    Usage:
    <x-forms.error field="email" />
    <x-forms.error field="password" class="my-custom-class" />
--}}

@error($field, $bag)
<span {{$attributes->merge(['class' => 'field-error text-danger'])}} role="alert">
        @if ($slot->isEmpty())
        {{ $message }}
    @else
        {{ $slot }}
    @endif
    </span>
@enderror