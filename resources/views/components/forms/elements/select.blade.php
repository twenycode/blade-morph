<select
        name="{{ $name }}{{ $multiple ? '[]' : '' }}"
        id="{{ $id }}"
        {{ $attributes->merge(['class' => 'form-select']) }}
        {{ $multiple ? 'multiple' : '' }}
        {{ $required ? 'required' : '' }}
>
    @if($placeholder)
        <option value="" {{ is_null($selected) ? 'selected' : '' }} disabled>{{ $placeholder }}</option>
    @endif

    @foreach($options as $key => $option)
        @if(is_array($option) && isset($option['label'], $option['options']))
            {{-- Option group --}}
            <optgroup label="{{ $option['label'] }}">
                @foreach($option['options'] as $groupKey => $groupOption)
                    @php
                        $value = is_array($groupOption) || is_object($groupOption)
                            ? $valueField ? data_get($groupOption, $valueField) : $groupKey
                            : $groupKey;

                        $label = is_array($groupOption) || is_object($groupOption)
                            ? $labelField ? data_get($groupOption, $labelField) : $groupOption
                            : $groupOption;
                    @endphp
                    <option value="{{ $value }}" {{ $isSelected($value) ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </optgroup>
        @else
            {{-- Regular option --}}
            @php
                $value = is_array($option) || is_object($option)
                    ? $valueField ? data_get($option, $valueField) : $key
                    : $key;

                $label = is_array($option) || is_object($option)
                    ? $labelField ? data_get($option, $labelField) : $option
                    : $option;
            @endphp
            <option value="{{ $value }}" {{ $isSelected($value) ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endif
    @endforeach
</select>