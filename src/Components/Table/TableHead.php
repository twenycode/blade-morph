<?php

namespace TwenyCode\LaravelBladeKit\Components\Table;

use Illuminate\View\Component;

class TableHead extends Component
{
    /**
     * Create a new component instance.
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
     * Get the CSS class for alignment.
     */
    public function alignClass(): string
    {
        $alignments = [
            'left' => 'text-start',
            'center' => 'text-center',
            'right' => 'text-end',
        ];

        return $this->align ? ($alignments[$this->align] ?? '') : '';
    }
}