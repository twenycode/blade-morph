{{--
  Main Table Component View

  This view renders a complete table with search functionality,
  sorting capabilities, and pagination support.
--}}

<div class="{{ $responsiveClass() }}">
    {{-- Search input field (if enabled) --}}
    @if($searchable)
        <div class="mb-3">
            <input
                    type="text"
                    class="form-control"
                    id="{{ $id }}_search"
                    placeholder="Search..."
                    autocomplete="off"
            >
        </div>
    @endif

    {{-- Main table element --}}
    <table
            id="{{ $id }}"
            {{ $attributes->merge(['class' => $tableClass()]) }}
            {{ $sortable ? 'data-sortable' : '' }}
    >
        <thead class="table-light">
        <tr>
            {!! $thead !!}
        </tr>
        </thead>

        <tbody>
        {{ $slot }}
        </tbody>
    </table>

    {{-- Pagination links (if collection is paginated) --}}
    @if(!is_null($collection) && $collection->hasPages())
        <div class="d-flex justify-content-end mt-3">
            {{ $collection->links() }}
        </div>
    @endif
</div>

{{-- JavaScript for search and sorting functionality --}}
@if($searchable || $sortable)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.getElementById('{{ $id }}');

            {{-- Search functionality --}}
            @if($searchable)
            const searchInput = document.getElementById('{{ $id }}_search');
            if (searchInput && table) {
                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const rows = table.querySelectorAll('tbody tr');

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }
            @endif

                    {{-- Sorting functionality --}}
                    @if($sortable)
            if (table) {
                const headers = table.querySelectorAll('thead th');

                headers.forEach((header, index) => {
                    if (!header.classList.contains('no-sort')) {
                        header.classList.add('sortable');
                        header.setAttribute('role', 'button');
                        header.innerHTML += '<span class="sort-icon ms-1"></span>';

                        header.addEventListener('click', function() {
                            const direction = this.getAttribute('data-sort-direction') === 'asc' ? 'desc' : 'asc';

                            // Reset all headers
                            headers.forEach(h => {
                                h.removeAttribute('data-sort-direction');
                                h.querySelector('.sort-icon')?.classList.remove('asc', 'desc');
                            });

                            // Set current header
                            this.setAttribute('data-sort-direction', direction);
                            this.querySelector('.sort-icon').classList.add(direction);

                            // Sort rows
                            const rows = Array.from(table.querySelectorAll('tbody tr'));

                            rows.sort((a, b) => {
                                const aValue = a.cells[index].textContent.trim();
                                const bValue = b.cells[index].textContent.trim();

                                // Check if numeric
                                if (!isNaN(aValue) && !isNaN(bValue)) {
                                    return direction === 'asc'
                                        ? parseFloat(aValue) - parseFloat(bValue)
                                        : parseFloat(bValue) - parseFloat(aValue);
                                }

                                // String comparison
                                return direction === 'asc'
                                    ? aValue.localeCompare(bValue)
                                    : bValue.localeCompare(aValue);
                            });

                            // Reorder table
                            const tbody = table.querySelector('tbody');
                            rows.forEach(row => tbody.appendChild(row));
                        });
                    }
                });
            }
            @endif
        });
    </script>

    {{-- CSS for sort indicators --}}
    @if($sortable)
        <style>
            th.sortable {
                cursor: pointer;
                position: relative;
            }

            .sort-icon {
                display: inline-block;
                width: 0;
                height: 0;
                margin-left: 0.3em;
                vertical-align: middle;
                content: "";
                border-top: 4px solid;
                border-right: 4px solid transparent;
                border-bottom: 0;
                border-left: 4px solid transparent;
                opacity: 0.3;
            }

            .sort-icon.asc {
                border-bottom: 4px solid;
                border-top: 0;
                opacity: 1;
            }

            .sort-icon.desc {
                border-top: 4px solid;
                border-bottom: 0;
                opacity: 1;
            }
        </style>
    @endif
@endif