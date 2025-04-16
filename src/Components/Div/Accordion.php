<?php

namespace TwenyCode\BladeMorph\Components\Div;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Accordion extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string|null $id Unique identifier for the accordion
     * @param array|null $items Optional array of accordion items
     * @param bool $flush Whether to use the flush style (no outer borders)
     * @param bool $alwaysOpen Whether multiple items can be open simultaneously
     */
    public function __construct(
        public ?string $id = null,
        public ?array $items = null,
        public bool $flush = false,
        public bool $alwaysOpen = false,
    ) {
        // Generate a random ID if none provided
        $this->id = $id ?? 'accordion_' . Str::random(8);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('blade-morph::components.div.accordion');
    }

    /**
     * Get the accordion class with flush variant if needed.
     */
    public function accordionClass(): string
    {
        return $this->flush ? 'accordion accordion-flush' : 'accordion';
    }
}