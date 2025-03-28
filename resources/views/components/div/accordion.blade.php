<div class="{{ $accordionClass() }}" id="{{ $id }}">
    @if($items)
        @foreach($items as $key => $item)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading_{{ $id }}_{{ $loop->index }}">
                    <button
                            class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse_{{ $id }}_{{ $loop->index }}"
                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                            aria-controls="collapse_{{ $id }}_{{ $loop->index }}"
                            {{ $alwaysOpen ? 'data-bs-parent=""' : 'data-bs-parent="#' . $id . '"' }}
                    >
                        @if(is_array($item) && isset($item['title']))
                            @if(isset($item['icon']))
                                <i class="{{ $item['icon'] }} me-2"></i>
                            @endif
                            {{ $item['title'] }}
                        @else
                            {{ $item }}
                        @endif
                    </button>
                </h2>
                <div
                        id="collapse_{{ $id }}_{{ $loop->index }}"
                        class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                        aria-labelledby="heading_{{ $id }}_{{ $loop->index }}"
                        {{ $alwaysOpen ? '' : 'data-bs-parent="#' . $id . '"' }}
                >
                    <div class="accordion-body">
                        @if(is_array($item) && isset($item['content']))
                            {!! $item['content'] !!}
                        @else
                            {{ $item ?? '' }}
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @else
        {{ $slot }}
    @endif
</div>