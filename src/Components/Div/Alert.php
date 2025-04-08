<?php

namespace TwenyCode\LaravelBladeKit\Components\Div;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string|null $type Alert type (primary, secondary, success, etc.)
     * @param bool $dismissible Whether the alert can be dismissed
     * @param string|null $icon Optional icon class
     */
    public function __construct(
        public ?string $type = 'info',  // primary, secondary, success, danger, warning, info, light, dark
        public bool $dismissible = false,
        public ?string $icon = null
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('tweny-bladekit::components.div.alert');
    }

    /**
     * Get the alert classes based on component properties.
     */
    public function alertClass(): string
    {
        $classes = ['alert', "alert-{$this->type}"];

        if ($this->dismissible) {
            $classes[] = 'alert-dismissible fade show';
        }

        return implode(' ', $classes);
    }
}