<?php

namespace TwenyCode\LaravelBladeKit\Components\Div;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Modal extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string $id Unique identifier for the modal
     * @param string|null $modalTitle Optional title for the modal header
     * @param string|null $modalFooter Optional footer content
     * @param string|null $size Size variant (sm, lg, xl)
     * @param bool $centered Whether to vertically center the modal
     * @param bool $scrollable Whether the modal body is scrollable
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
     * Get the modal dialog class based on component properties.
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