{{--
  Pagination Navigation View

  This template renders Bootstrap-compatible pagination links with optional
  status text showing current items and total count.
--}}
<div {{ $attributes }}>
    @if($collection && $collection->hasPages())
        {{-- Pagination links --}}
        <div class="d-flex {{ $alignmentClass() }}">
            {{ $collection->appends(request()->except('page'))->links('pagination::bootstrap-5', [
                'class' => $sizeClass()
            ]) }}
        </div>

        {{-- Optional status text --}}
        @if($withText)
            <div class="pagination-info mt-2 text-muted small text-center">
                Showing {{ $collection->firstItem() ?? 0 }} to {{ $collection->lastItem() ?? 0 }} of {{ $collection->total() }} entries
            </div>
        @endif
    @endif
</div>