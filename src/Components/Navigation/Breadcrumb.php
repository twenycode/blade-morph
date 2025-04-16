<?php

namespace TwenyCode\BladeMorph\Components\Navigation;

use Illuminate\View\Component;

/**
 * Breadcrumb Navigation Component
 *
 * This component renders a Bootstrap-compatible breadcrumb navigation.
 * It supports an array of items or custom content via slot.
 */
class Breadcrumb extends Component
{
    /**
     * Create a new component instance.
     *
     * @param array|null $items Array of breadcrumb items, where each item can be a string or an array with 'label' and 'url' keys
     * @param string $divider Character used as divider between breadcrumb items
     * @param bool $withBackground Whether to show a light background and rounded corners
     */
    public function __construct(
        public ?array $items = null,
        public string $divider = '/',
        public bool $withBackground = false,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('blade-morph::components.navigation.breadcrumb');
    }

    /**
     * Get the breadcrumb CSS classes based on configuration.
     *
     * @return string CSS class string for the breadcrumb
     */
    public function breadcrumbClass(): string
    {
        return $this->withBackground ? 'breadcrumb p-2 rounded bg-light' : 'breadcrumb';
    }
}