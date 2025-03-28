<?php

namespace TwenyCode\LaravelBladeKit\Components\Table;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class Table extends Component
{
    /**
     * Create a new component instance.
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
        $this->id = $id ?? 'table_' . Str::random(8);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('tweny-bladekit::components.tables.table');
    }

    /**
     * Get the table class.
     */
    public function tableClass(): string
    {
        $classes = ['table'];

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
     */
    public function responsiveClass(): string
    {
        if (!$this->responsive) {
            return '';
        }

        return $this->responsiveBreakpoint
            ? "table-responsive-{$this->responsiveBreakpoint}"
            : 'table-responsive';
    }
}