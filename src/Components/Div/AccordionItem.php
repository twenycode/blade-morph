<?php

namespace TwenyCode\LaravelBladeKit\Components\Div;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class AccordionItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $accordionId,
        public string $title,
        public ?string $id = null,
        public ?string $icon = null,
        public bool $open = false,
    ) {
        $this->id = $id ?? 'item_' . Str::random(8);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.div.accordion-item');
    }
}