<?php

namespace TwenyCode\LaravelBladeKit\Components\Button;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Delete extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $action,
        public string $label = '<i class="fa fa-trash-alt"></i> Delete',
        public string $confirmMessage = 'Do you want to delete this item?'
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('tweny-bladekit::components.button.delete');
    }
}