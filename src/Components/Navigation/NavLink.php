<?php

namespace TwenyCode\LaravelBladeKit\Components\Navigation;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * NavLink Navigation Component
 *
 * This component renders a Bootstrap-compatible navigation link.
 * It supports icons, badges, and automatic active state detection.
 */
class NavLink extends Component
{
    /**
     * Create a new component instance.
     *
     * @param string $href URL for the link
     * @param string $label Link text
     * @param string|null $icon Optional icon class to display before the label
     * @param string|null $badge Optional badge text to display after the label
     * @param string|null $badgeColor Bootstrap color variant for the badge
     * @param string|null $activeClass CSS class to apply when link is active
     * @param bool $exact Whether to match the route exactly for active state
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
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render(): View
    {
        return view('tweny-bladekit::components.navigation.nav-link');
    }

    /**
     * Check if the current route matches the link.
     *
     * @return bool Whether the link is currently active
     */
    public function isActive(): bool
    {
        $currentRoute = url()->current();
        $linkRoute = url($this->href);

        if ($this->exact) {
            // For exact matching, URLs must be identical
            return $currentRoute === $linkRoute;
        }

        // For non-exact matching, check if current route starts with the link route
        // This handles nested routes, but avoid false matches with the root route
        return str_starts_with($currentRoute, $linkRoute) && $linkRoute !== url('/');
    }

    /**
     * Get the active class if the route is active.
     *
     * @return string CSS class string for active state
     */
    public function getActiveClass(): string
    {
        return $this->isActive() ? $this->activeClass : '';
    }
}