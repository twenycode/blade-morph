{{-- Card component: A flexible container with optional header and buttons --}}
<div {{ $attributes->merge(['class' => 'card']) }} >
    {{-- Card header with title (only renders if title is provided) --}}
    @if(!is_null($cardTitle))
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="card-title">
                    {!! $cardTitle !!}
                </div>
                {{-- Optional action buttons at the top of card body --}}
                @if(!is_null($cardButtons))
                    <div class="card-buttons">
                        {!! $cardButtons !!}
                    </div>
                @endif
            </div>
        </div>
    @endif

    <div class="card-body">
        {{-- Main card content --}}
        {{ $slot }}
    </div>
</div>