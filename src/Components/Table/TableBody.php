<?php

namespace TwenyCode\BladeMorph\Components\Table;

use Illuminate\View\Component;

/**
 * TableBody Component
 *
 * Renders the <tbody> element with a custom ID.
 * Used primarily for proper DOM targeting in JavaScript.
 */
class TableBody extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string|null $id  Unique identifier for the table body
     */
    public function __construct(
        public ?string $id = null,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('blade-morph::components.tables.table-body');
    }
}