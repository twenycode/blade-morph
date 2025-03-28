<?php

namespace TwenyCode\LaravelBladeKit\Components\Div;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Tab extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $id = null,
        public ?array $tabs = null,
        public ?string $activeTab = null,
        public string $type = 'tabs', // tabs, pills, underline
        public string $alignment = 'left', // left, center, right, justified
        public bool $vertical = false,
        public bool $fade = true,
    ) {
        $this->id = $id ?? 'tabs_' . Str::random(8);
        $this->activeTab = $activeTab ?? ($tabs && count($tabs) > 0 ? array_key_first($tabs) : null);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('tweny-bladekit::components.div.tab');
    }

    /**
     * Get CSS class for nav tabs.
     */
    public function navClass(): string
    {
        $classes = ['nav'];

        // Tab style
        if ($this->type === 'pills') {
            $classes[] = 'nav-pills';
        } elseif ($this->type === 'underline') {
            $classes[] = 'nav-underline';
        } else {
            $classes[] = 'nav-tabs';
        }

        // Alignment
        if ($this->alignment === 'center') {
            $classes[] = 'justify-content-center';
        } elseif ($this->alignment === 'right') {
            $classes[] = 'justify-content-end';
        } elseif ($this->alignment === 'justified') {
            $classes[] = 'nav-justified';
        }

        // Vertical
        if ($this->vertical) {
            $classes[] = 'flex-column';
        }

        return implode(' ', $classes);
    }

    /**
     * Generate a tab ID.
     */
    public function getTabId(string $key): string
    {
        return Str::slug("{$this->id}-{$key}");
    }

    /**
     * Check if a tab is active.
     */
    public function isActive(string $key): bool
    {
        return $key === $this->activeTab;
    }
}