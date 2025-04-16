<?php

namespace TwenyCode\BladeMorph\Components\Button;

use Illuminate\View\Component;

class ButtonGroup extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $size = '',    // '', 'sm', 'lg'
        public bool $vertical = false, // Vertical stack instead of horizontal
        public bool $toolbar = false,  // Button toolbar (container for button groups)
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('blade-morph::components.button.button-group');
    }

    /**
     * Get the button group class.
     */
    public function groupClass(): string
    {
        $classes = $this->toolbar ? ['btn-toolbar'] : ['btn-group'];

        if ($this->vertical && !$this->toolbar) {
            $classes = ['btn-group-vertical'];
        }

        if ($this->size && !$this->toolbar) {
            $classes[] = "btn-group-{$this->size}";
        }

        return implode(' ', $classes);
    }
}