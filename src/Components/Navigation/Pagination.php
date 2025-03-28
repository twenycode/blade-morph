<?php

namespace TwenyCode\LaravelBladeKit\Components\Navigation;

use Illuminate\View\Component;

class Pagination extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $collection,
        public string $size = '',
        public bool $withText = true,
        public string $align = 'center',
        public bool $simple = false,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.navigation.pagination');
    }

    /**
     * Get the pagination size class.
     */
    public function sizeClass(): string
    {
        if ($this->size === 'sm') {
            return 'pagination-sm';
        }

        if ($this->size === 'lg') {
            return 'pagination-lg';
        }

        return '';
    }

    /**
     * Get the alignment class.
     */
    public function alignmentClass(): string
    {
        $alignments = [
            'start' => 'justify-content-start',
            'center' => 'justify-content-center',
            'end' => 'justify-content-end',
            'between' => 'justify-content-between',
            'around' => 'justify-content-around',
        ];

        return $alignments[$this->align] ?? $alignments['center'];
    }

    /**
     * Render the pagination links.
     */
    public function links(): string
    {
        if (!$this->collection || !method_exists($this->collection, 'links')) {
            return '';
        }

        $options = [];

        if ($this->simple) {
            return $this->collection->simplePaginate()->links('pagination::simple-bootstrap-5');
        }

        return $this->collection->links('pagination::bootstrap-5');
    }
}