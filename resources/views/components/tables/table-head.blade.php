{{--
  Table Header Cell Component

  Renders a <th> element with support for:
  - Text alignment
  - Sortable columns
  - Custom sort keys
  - Width specification
--}}

<th
        {{ $attributes->merge(['class' => $alignClass()]) }}
        {{ !$sortable ? 'class=no-sort' : '' }}
        {{ $sortBy ? 'data-sort-by=' . $sortBy : '' }}
        {{ $width ? 'width=' . $width : '' }}
>
    {{ $slot }}
</th>