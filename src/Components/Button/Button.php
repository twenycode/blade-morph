<?php

namespace TwenyCode\BladeMorph\Components\Button;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'button',       // button, submit, reset
        public ?string $id = null,            // Optional ID attribute
        public string $label = 'Submit',      // Button text
        public ?string $color = 'primary',    // Bootstrap color
        public ?string $size = null,          // sm, lg, or null for default
        public bool $outline = false,         // Outlined style
        public bool $loading = false,         // Loading state
        public ?string $loadingText = null,   // Text when loading
        public ?string $icon = null,          // Icon class (FontAwesome)
        public ?string $iconPosition = 'left', // Icon position
    ) {
        $this->id = $id ?? uniqid('btn_');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('blademorph::components.button.button');
    }

    /**
     * Get the button class based on the color and size.
     */
    public function buttonClass(): string
    {
        $classes = ['btn'];

        // Add color class
        if ($this->color) {
            $classes[] = $this->outline
                ? "btn-outline-{$this->color}"
                : "btn-{$this->color}";
        }

        // Add size class
        if ($this->size) {
            $classes[] = "btn-{$this->size}";
        }

        // Add loading class
        if ($this->loading) {
            $classes[] = 'disabled';
        }

        return implode(' ', $classes);
    }
}