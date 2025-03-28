<div
        class="progress"
        {{ $attributes }}
        @if($height) style="height: {{ $height }};" @endif
>
    <div
            class="{{ $progressBarClass() }}"
            role="progressbar"
            style="width: {{ $percentage() }}%;"
            aria-valuenow="{{ $value }}"
            aria-valuemin="{{ $min }}"
            aria-valuemax="{{ $max }}"
    >
        @if($showLabel)
            {{ $formatLabel() }}
        @endif
    </div>
</div>