<?php

namespace TwenyCode\BladeMorph\Components\Div;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Card extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string|null $cardTitle Optional title for the card header
     * @param string|null $cardButtons Optional buttons to display in the card body
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
        return view('blade-morph::components.div.card');
    }
}