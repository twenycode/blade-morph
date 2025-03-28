<th
        {{ $attributes->merge(['class' => $alignClass()]) }}
        {{ !$sortable ? 'class=no-sort' : '' }}
        {{ $sortBy ? 'data-sort-by=' . $sortBy : '' }}
        {{ $width ? 'width=' . $width : '' }}
>
    {{ $slot }}
</th>