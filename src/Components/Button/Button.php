<?php

namespace TwenyCode\LaravelBladeKit\Components\Button;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $type = 'button',
        public ?string $id = null,
        public string $label = 'Submit',
        public ?string $color = 'primary',
        public ?string $size = null,
        public bool $outline = false,
        public bool $loading = false,
        public ?string $loadingText = null,
        public ?string $icon = null,
        public ?string $iconPosition = 'left',
    ) {
        $this->id = $id ?? uniqid('btn_');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('tweny-bladekit::components.button.button');
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