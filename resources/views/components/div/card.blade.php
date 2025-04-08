{{-- Card component: A flexible container with optional header and buttons --}}
<div {{ $attributes->merge(['class' => 'card']) }} >
    {{-- Card header with title (only renders if title is provided) --}}
    @if(!is_null($cardTitle))
        <div class="card-header">
            <div class="card-title">
                {!! $cardTitle !!}
            </div>
        </div>
    @endif

    <div class="card-body">
        {{-- Optional action buttons at the top of card body --}}
        @if(!is_null($cardButtons))
            <div class="row mb-3">
                <div class="col-sm-12 col-md-12 col-lg-12 text-end">
                    {!! $cardButtons !!}
                </div>
            </div>
        @endif

        {{-- Main card content --}}
        {{ $slot }}
    </div>
</div>