<?php

namespace TwenyCode\LaravelBladeKit\Components\Table;

use Illuminate\View\Component;

class TableCell extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $align = null,
        public bool $nowrap = false,
        public ?string $width = null,
        public ?int $colspan = null,
        public ?int $rowspan = null,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.tables.table-cell');
    }

    /**
     * Get the cell class based on alignment and wrapping.
     */
    public function cellClass(): string
    {
        $classes = [];

        if ($this->align) {
            $alignments = [
                'left' => 'text-start',
                'center' => 'text-center',
                'right' => 'text-end',
            ];

            if (isset($alignments[$this->align])) {
                $classes[] = $alignments[$this->align];
            }
        }

        if ($this->nowrap) {
            $classes[] = 'text-nowrap';
        }

        return implode(' ', $classes);
    }
}