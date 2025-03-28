<?php

namespace TwenyCode\LaravelBladeKit\Components\Navigation;

use Illuminate\View\Component;

class DropdownItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $href = null,
        public ?string $label = null,
        public ?string $icon = null,
        public bool $divider = false,
        public bool $header = false,
        public bool $active = false,
        public bool $disabled = false,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.navigation.dropdown-item');
    }

    /**
     * Get the item class.
     */
    public function itemClass(): string
    {
        if ($this->divider) {
            return 'dropdown-divider';
        }

        if ($this->header) {
            return 'dropdown-header';
        }

        $classes = ['dropdown-item'];

        if ($this->active) {
            $classes[] = 'active';
        }

        if ($this->disabled) {
            $classes[] = 'disabled';
        }

        return implode(' ', $classes);
    }
}