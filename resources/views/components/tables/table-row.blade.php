<tr
        {{ $attributes->merge(['class' => $rowClass()]) }}
        @if($href)
            data-href="{{ $href }}"
        data-target="{{ $target ?? '_self' }}"
        onclick="window.open(this.dataset.href, this.dataset.target)"
        style="cursor: pointer;"
        @endif
>
    {{ $slot }}
</tr>