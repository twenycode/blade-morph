<?php

namespace TwenyCode\LaravelBladeKit\Components\Navigation;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class NavLink extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string  $href,
        public string  $label,
        public ?string $icon = null,
        public ?string $badge = null,
        public ?string $badgeColor = 'primary',
        public ?string $activeClass = 'active',
        public bool    $exact = false,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('tweny-bladekit::components.navigation.nav-link');
    }

    /**
     * Check if the current route matches the link.
     */
    public function isActive(): bool
    {
        $currentRoute = url()->current();
        $linkRoute = url($this->href);

        if ($this->exact) {
            return $currentRoute === $linkRoute;
        }

        // Check if current route starts with the link route
        // This handles nested routes
        return str_starts_with($currentRoute, $linkRoute) && $linkRoute !== url('/');
    }

    /**
     * Get the active class if the route is active.
     */
    public function getActiveClass(): string
    {
        return $this->isActive() ? $this->activeClass : '';
    }
}