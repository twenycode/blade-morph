<?php

namespace TwenyCode\LaravelBladeKit\Components\Navigation;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?array $items = null,
        public string $divider = '/',
        public bool $withBackground = false,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.navigation.breadcrumb');
    }

    /**
     * Get the breadcrumb class.
     */
    public function breadcrumbClass(): string
    {
        return $this->withBackground ? 'breadcrumb p-2 rounded bg-light' : 'breadcrumb';
    }
}