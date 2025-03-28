<td
        {{ $attributes->merge(['class' => $cellClass()]) }}
        {{ $width ? 'width=' . $width : '' }}
        {{ $colspan ? 'colspan=' . $colspan : '' }}
        {{ $rowspan ? 'rowspan=' . $rowspan : '' }}
>
    {{ $slot }}
</td>