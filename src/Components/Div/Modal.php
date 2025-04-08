<?php

namespace TwenyCode\LaravelBladeKit\Components\Div;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Modal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public ?string $modalTitle = null,
        public ?string $modalFooter = null,
        public ?string $size = null, // sm, lg, xl
        public bool $centered = false,
        public bool $scrollable = false
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('tweny-bladekit::components.div.modal');
    }

    /**
     * Get the modal dialog class.
     */
    public function dialogClass(): string
    {
        $classes = ['modal-dialog'];

        if ($this->size) {
            $classes[] = "modal-{$this->size}";
        }

        if ($this->centered) {
            $classes[] = 'modal-dialog-centered';
        }

        if ($this->scrollable) {
            $classes[] = 'modal-dialog-scrollable';
        }

        return implode(' ', $classes);
    }
}