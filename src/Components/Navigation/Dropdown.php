<?php

namespace TwenyCode\LaravelBladeKit\Components\Navigation;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Dropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $id = null,
        public string $label = 'Dropdown',
        public ?string $icon = null,
        public string $alignment = 'dropdown',
        public ?string $color = 'secondary',
        public ?string $size = null,
        public bool $split = false,
        public bool $dark = false,
    ) {
        $this->id = $id ?? 'dropdown_' . Str::random(8);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.navigation.dropdown');
    }

    /**
     * Get the dropdown class.
     */
    public function dropdownClass(): string
    {
        $validAlignments = ['dropdown', 'dropup', 'dropend', 'dropstart'];

        return in_array($this->alignment, $validAlignments)
            ? $this->alignment
            : 'dropdown';
    }

    /**
     * Get the button class based on color and size.
     */
    public function buttonClass(): string
    {
        $classes = ['btn'];

        if ($this->color) {
            $classes[] = "btn-{$this->color}";
        }

        if ($this->size) {
            $classes[] = "btn-{$this->size}";
        }

        return implode(' ', $classes);
    }

    /**
     * Get the menu class.
     */
    public function menuClass(): string
    {
        return $this->dark ? 'dropdown-menu dropdown-menu-dark' : 'dropdown-menu';
    }
}