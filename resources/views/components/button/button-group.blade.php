<div {{ $attributes->merge(['class' => $groupClass()]) }} role="{{ $toolbar ? 'toolbar' : 'group' }}" aria-label="{{ $toolbar ? 'Toolbar' : 'Button group' }}">
    {{ $slot }}
</div>