{{-- Label element blade template --}}
<label for="{{$for}}" {{ $attributes->merge(['class' => 'form-label']) }}>
    {{$fallback}} {!! $star ? '<span class="text-danger">*</span>' : '' !!}
</label>