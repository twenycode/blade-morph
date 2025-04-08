<?php

namespace TwenyCode\LaravelBladeKit\Components\Div;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Card extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $cardTitle = null,
        public ?string $cardButtons = null
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('tweny-bladekit::components.div.card');
    }
}