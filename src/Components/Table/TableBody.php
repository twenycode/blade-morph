<?php

namespace TwenyCode\LaravelBladeKit\Components\Table;

use Illuminate\View\Component;

class TableBody extends Component
{
    /**
     * Create a new component instance.
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
        return view('tweny-bladekit::components.tables.table-body');
    }
}