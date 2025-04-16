<?php

namespace TwenyCode\BladeMorph\Components\Table;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

/**
 * Table Component
 *
 * A flexible Bootstrap-compatible table component with built-in features
 * like sorting, searching, responsive behavior, and pagination support.
 */
class Table extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string|null $id            Unique identifier for the table (auto-generated if not provided)
     * @param string|null $thead         HTML content for the table header
     * @param object|null $collection    Data collection for pagination support
     * @param bool $striped              Whether to apply striped rows styling
     * @param bool $bordered             Whether to apply borders to the table
     * @param bool $hover                Whether to apply hover effect to rows
     * @param bool $small                Whether to use condensed table layout
     * @param bool $responsive           Whether the table should be responsive
     * @param string|null $responsiveBreakpoint  Responsive breakpoint (sm, md, lg, xl)
     * @param bool $sortable             Whether columns can be sorted
     * @param bool $searchable           Whether to include a search input
     */
    public function __construct(
        public ?string $id = null,
        public ?string $thead = null,
        public ?object $collection = null,
        public bool $striped = false,
        public bool $bordered = false,
        public bool $hover = false,
        public bool $small = false,
        public bool $responsive = true,
        public ?string $responsiveBreakpoint = null,
        public bool $sortable = false,
        public bool $searchable = false,
    ) {
        // Generate a random ID if none provided
        $this->id = $id ?? 'table_' . Str::random(8);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('blade-morph::components.tables.table');
    }

    /**
     * Get the table class based on the configured options.
     *
     * @return string CSS classes for the table
     */
    public function tableClass(): string
    {
        $classes = ['table']; // Base Bootstrap table class

        // Add optional styling classes
        if ($this->striped) {
            $classes[] = 'table-striped';
        }

        if ($this->bordered) {
            $classes[] = 'table-bordered';
        }

        if ($this->hover) {
            $classes[] = 'table-hover';
        }

        if ($this->small) {
            $classes[] = 'table-sm';
        }

        return implode(' ', $classes);
    }

    /**
     * Get the responsive wrapper class.
     *
     * @return string CSS class for responsive behavior
     */
    public function responsiveClass(): string
    {
        if (!$this->responsive) {
            return '';
        }

        // Add breakpoint-specific responsive class if provided
        return $this->responsiveBreakpoint
            ? "table-responsive-{$this->responsiveBreakpoint}"
            : 'table-responsive';
    }
}