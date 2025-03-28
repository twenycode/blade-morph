<?php

namespace TwenyCode\LaravelBladeKit\Components\Div;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Accordion extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $id = null,
        public ?array $items = null,
        public bool $flush = false,
        public bool $alwaysOpen = false,
    ) {
        $this->id = $id ?? 'accordion_' . Str::random(8);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.div.accordion');
    }

    /**
     * Get the accordion class.
     */
    public function accordionClass(): string
    {
        return $this->flush ? 'accordion accordion-flush' : 'accordion';
    }
}