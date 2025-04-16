<?php

namespace TwenyCode\BladeMorph\Components\Navigation;

use Illuminate\View\Component;
use Illuminate\Support\Str;

/**
 * Dropdown Navigation Component
 *
 * This component renders a Bootstrap-compatible dropdown menu.
 * It supports regular and split button dropdowns with various customization options.
 */
class Dropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string|null $id Unique ID for the dropdown (auto-generated if null)
     * @param string $label Text label for the dropdown button
     * @param string|null $icon Optional icon class for the button
     * @param string $alignment Dropdown direction (dropdown, dropup, dropend, dropstart)
     * @param string|null $color Bootstrap button color variant
     * @param string|null $size Button size (sm, lg)
     * @param bool $split Whether to use a split button dropdown
     * @param bool $dark Whether to use dark theme for dropdown menu
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
        // Generate a random ID if none provided
        $this->id = $id ?? 'dropdown_' . Str::random(8);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('blademorph::components.navigation.dropdown');
    }

    /**
     * Get the dropdown CSS class based on alignment.
     *
     * @return string CSS class for dropdown container
     */
    public function dropdownClass(): string
    {
        $validAlignments = ['dropdown', 'dropup', 'dropend', 'dropstart'];

        return in_array($this->alignment, $validAlignments)
            ? $this->alignment
            : 'dropdown';
    }

    /**
     * Get the button CSS classes based on color and size.
     *
     * @return string CSS classes for the dropdown button
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
     * Get the dropdown menu CSS classes.
     *
     * @return string CSS classes for the dropdown menu
     */
    public function menuClass(): string
    {
        return $this->dark ? 'dropdown-menu dropdown-menu-dark' : 'dropdown-menu';
    }
}