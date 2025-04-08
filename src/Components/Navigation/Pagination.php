<?php

namespace TwenyCode\LaravelBladeKit\Components\Navigation;

use Illuminate\View\Component;

/**
 * Pagination Navigation Component
 *
 * This component renders Bootstrap-compatible pagination for Laravel collections.
 * It supports different sizes, alignments, and optional status text.
 */
class Pagination extends Component
{
    /**
     * Create a new component instance.
     *
     * @param mixed $collection Laravel paginator instance
     * @param string $size Pagination size (sm, lg, or empty for default)
     * @param bool $withText Whether to show status text below pagination
     * @param string $align Alignment of pagination (start, center, end, between, around)
     * @param bool $simple Whether to use simple pagination
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
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('tweny-bladekit::components.navigation.pagination');
    }

    /**
     * Get the pagination size CSS class.
     *
     * @return string CSS class for pagination size
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
     * Get the alignment CSS class.
     *
     * @return string CSS class for pagination alignment
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
     *
     * @return string Rendered pagination HTML
     */
    public function links(): string
    {
        if (!$this->collection || !method_exists($this->collection, 'links')) {
            return '';
        }

        if ($this->simple) {
            return $this->collection->simplePaginate()->links('pagination::simple-bootstrap-5');
        }

        return $this->collection->links('pagination::bootstrap-5');
    }
}