{{-- Modal component: Bootstrap modal dialog --}}
<div class="modal fade" id="{{ $id }}" role="dialog" aria-hidden="true">
    <div {{ $attributes->merge(['class' => 'modal-dialog']) }} role="document">
        <div class="modal-content">
            {{-- Modal header with title and close button --}}
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{-- Modal body content --}}
            <div class="modal-body">
                {{ $slot }}
            </div>

            {{-- Optional modal footer --}}
            @if(!is_null($modalFooter))
                <div class="modal-footer">
                    {{ $modalFooter }}
                </div>
            @endif
        </div>
    </div>
</div>