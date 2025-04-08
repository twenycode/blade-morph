<?php

namespace TwenyCode\LaravelBladeKit\Components\Table;

use Illuminate\View\Component;

/**
 * TableHead Component
 *
 * Renders a table header cell with support for sorting and alignment.
 */
class TableHead extends Component
{
    /**
     * Create a new component instance.
     *
     * @param bool $sortable     Whether this column is sortable
     * @param string|null $sortBy Custom sort key for this column
     * @param string|null $width  Width of the column (e.g., '100px', '10%')
     * @param string|null $align  Text alignment ('left', 'center', 'right')
     */
    public function __construct(
        public bool $sortable = true,
        public ?string $sortBy = null,
        public ?string $width = null,
        public ?string $align = null,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.tables.table-head');
    }

    /**
     * Get the CSS class for text alignment.
     *
     * @return string Bootstrap text alignment class
     */
    public function alignClass(): string
    {
        // Map alignment keywords to Bootstrap classes
        $alignments = [
            'left' => 'text-start',
            'center' => 'text-center',
            'right' => 'text-end',
        ];

        return $this->align ? ($alignments[$this->align] ?? '') : '';
    }
}