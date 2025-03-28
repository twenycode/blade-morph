<select
        name="{{ $name }}[]"
        id="{{ $id }}"
        {{ $attributes->merge(['class' => 'form-select']) }}
        multiple
        {{ $size ? 'size=' . $size : '' }}
        {{ $required ? 'required' : '' }}
>
    @if($placeholder)
        <option value="" disabled>{{ $placeholder }}</option>
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

@once
    <style>
        /* Custom styling for multiselect */
        select[multiple] {
            overflow-y: auto;
            min-height: 120px;
        }

        select[multiple] option {
            padding: 0.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        select[multiple] option:checked {
            background-color: var(--bs-primary);
            color: white;
        }
    </style>
@endonce