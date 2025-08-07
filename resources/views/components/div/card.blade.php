{{-- Card component: A flexible container with optional header and buttons --}}
<div {{ $attributes->merge(['class' => 'card']) }} >
    {{-- Card header with title and buttons (only renders if title is provided) --}}
    @if(!is_null($cardTitle) || !is_null($cardButtons) )
        <div class="card-header pb-3">
            <div class="row">
                <div class="col-md-6 text-start">
                    @if(!is_null($cardTitle))
                        <div class="card-title">
                            {!! $cardTitle !!}
                        </div>
                    @endif
                </div>
                <div class="col-md-6 text-end pe-0">
                    @if(!is_null($cardButtons))
                        {!! $cardButtons !!}
                    @endif
                </div>
            </div>
        </div>
    @endif

    <div class="card-body">
        {{-- Main card content --}}
        {{ $slot }}
    </div>
</div>